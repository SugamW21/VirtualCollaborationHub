
<!DOCTYPE html>
<html>
<head>
    <title>Meeting Invitation</title>
</head>
<body>
    <h2>You have received a meeting invitation</h2>
    <p>Hi,</p>
    <p><?php echo e($sender_name, false); ?> has invited you to join a meeting.</p>
    <h3>Accept or Reject the Invitation</h3>
    <a href="<?php echo e($meeting_url, false); ?>" style="background-color: green; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Join Meeting</a>
    <a href="<?php echo e($reject_url, false); ?>" style="background-color: red; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Reject</a>
</body>
</html>
<?php /**PATH C:\laragon\www\VirtualCollaborationHub\resources\views/emails/meeting_invitation.blade.php ENDPATH**/ ?>