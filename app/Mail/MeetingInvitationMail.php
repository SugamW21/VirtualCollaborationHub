<?php
// app/Mail/MeetingInvitationMail.php

namespace App\Mail;

use App\Models\MeetingInvitation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MeetingInvitationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $invitation;

    public function __construct(MeetingInvitation $invitation)
    {
        $this->invitation = $invitation;
    }

    public function build()
    {
        return $this->subject('Meeting Invitation')
                    ->view('emails.meeting_invitation')
                    ->with([
                        'meeting_url' => $this->invitation->meeting_url,
                        'sender_name' => $this->invitation->sender->name,
                        'accept_url' => route('meetings.accept', ['meetingId' => $this->invitation->id]),
                        'reject_url' => route('meetings.reject', ['meetingId' => $this->invitation->id]),
                    ]);
    }
}
