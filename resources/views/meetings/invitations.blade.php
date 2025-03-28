<x-app-layout>
    <h3>Meeting Invitations</h3>
    
    @foreach ($invitations as $invitation)
        <div>
            <p>You have been invited to a meeting by {{ $invitation->sender->name }}</p>
            <p>Meeting URL: <a href="{{ $invitation->meeting_url }}" target="_blank">{{ $invitation->meeting_url }}</a></p>
            @if ($invitation->status == 'pending')
                <form action="{{ route('meetings.respond', $invitation->id) }}" method="POST">
                    @csrf
                    <button type="submit" name="status" value="accepted">Accept</button>
                    <button type="submit" name="status" value="rejected">Reject</button>
                </form>
            @elseif ($invitation->status == 'accepted')
                <p>Accepted the invitation. Redirecting to the meeting...</p>
            @else
                <p>Invitation Rejected.</p>
            @endif
        </div>
    @endforeach
</x-app-layout>
