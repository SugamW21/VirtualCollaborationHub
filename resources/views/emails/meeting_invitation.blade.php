{{-- resources/views/emails/meeting_invitation.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <title>Meeting Invitation</title>
</head>
<body>
    <h2>You have received a meeting invitation</h2>
    <p>Hi,</p>
    <p>{{ $sender_name }} has invited you to join a meeting.</p>
    <h3>Accept or Reject the Invitation</h3>
    <a href="{{ $accept_url }}" style="background-color: green; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Accept</a>
    <a href="{{ $reject_url }}" style="background-color: red; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Reject</a>
</body>
</html>
