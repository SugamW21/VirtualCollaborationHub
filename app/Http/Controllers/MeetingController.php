<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeetingController extends Controller
{
    public function loadMeeting()
    {
        return view('meetings.meeting'); // Ensure this matches your Blade file
    }
    // public function generateMeeting()
    // {
    //     $meetingID = uniqid();
    //     $meetingURL = "https://meet.jit.si/" . $meetingID;

    //     return response()->json(['meeting_url' => $meetingURL]);
    // }
}
