<?php

namespace App\Http\Controllers;

use App\Models\MeetingInvitation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\MeetingInvitationMail;

class MeetingController extends Controller
{
    public function loadMeeting(Request $request)
    {
        // Log the request to debug
        \Log::info('Loading meeting with parameters: ' . json_encode($request->all()));
        return view('meetings.meeting');
    }

    public function createMeeting()
    {
        $meetingCode = 'meeting-' . uniqid();
        return response()->json([
            'meeting_url' => route('meetings.meeting', ['room' => $meetingCode])
        ]);
    }

    public function sendInvite(Request $request)
    {
        \Log::info('Send invite called with data: ' . json_encode($request->all()));
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'meeting_url' => 'required|url',
        ]);

        $receiver = User::where('email', $request->email)->first();

        if (!$receiver) {
            \Log::error('User not found: ' . $request->email);
            return response()->json(['message' => 'User not found'], 404);
        }

        try {
            $invitation = MeetingInvitation::create([
                'sender_id' => Auth::id(),
                'receiver_id' => $receiver->id,
                'meeting_url' => $request->meeting_url,
                'status' => 'pending',
            ]);

            \Log::info('Invitation created: ' . $invitation->id);

            // Send email notification
            Mail::to($receiver->email)->send(new MeetingInvitationMail($invitation));

            \Log::info('Email sent to ' . $receiver->email);

            return response()->json(['message' => 'Invitation sent successfully!']);
        } catch (\Exception $e) {
            \Log::error("Invitation failed: " . $e->getMessage());
            return response()->json(['message' => 'Error sending invitation.'], 500);
        }
    }

    public function getInvitations()
    {
        $userId = Auth::id();
        $invitations = MeetingInvitation::where('receiver_id', $userId)
                                        ->where('status', 'pending')
                                        ->get();

        return view('meetings.invitations', compact('invitations'));
    }

    public function acceptInvite($meetingId)
    {
        $meeting = MeetingInvitation::findOrFail($meetingId);

        // Ensure the receiver is the authenticated user
        if ($meeting->receiver_id != Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $meeting->status = 'accepted';
        $meeting->save();

        // Extract room parameter from meeting URL if it exists
        $meetingUrl = $meeting->meeting_url;
        
        // Log the meeting URL for debugging
        \Log::info('Accepting invitation to meeting URL: ' . $meetingUrl);
        
        // Ensure the URL has the room parameter
        if (strpos($meetingUrl, 'room=') === false) {
            // If no room parameter, add a default one
            $separator = (strpos($meetingUrl, '?') !== false) ? '&' : '?';
            $meetingUrl .= $separator . 'room=meeting-' . uniqid();
            \Log::info('Added room parameter to URL: ' . $meetingUrl);
        }

        // Redirect to the meeting URL
        return redirect()->to($meetingUrl);
    }

    public function rejectInvite($meetingId)
    {
        $meeting = MeetingInvitation::findOrFail($meetingId);

        // Ensure the receiver is the authenticated user
        if ($meeting->receiver_id != Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $meeting->status = 'rejected';
        $meeting->save();

        // Close the tab or redirect to a different page (optional)
        echo "<script>window.close();</script>";
    }
}

