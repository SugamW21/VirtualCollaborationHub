<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// class MeetingController extends Controller
// {
//     public function loadMeeting()
//     {
//         return view('meetings.meeting'); // Ensure this matches your Blade file
//     }

// }

namespace App\Http\Controllers;

use App\Models\MeetingInvitation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\MeetingInvitationMail;

class MeetingController extends Controller
{
    public function loadMeeting()
    {
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
    \Log::info('Send invite called'); // Log to check if function is triggered
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


// app/Http/Controllers/MeetingController.php

public function acceptInvite($meetingId)
{
    $meeting = MeetingInvitation::findOrFail($meetingId);

    // Ensure the receiver is the authenticated user
    if ($meeting->receiver_id != Auth::id()) {
        return response()->json(['message' => 'Unauthorized'], 403);
    }

    $meeting->status = 'accepted';
    $meeting->save();

    // Redirect to the meeting URL
    return redirect()->to($meeting->meeting_url);
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
