<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
  <html>
  <head>
      <script src="https://8x8.vc/vpaas-magic-cookie-e4df4fc3cebf4b93a47c50ed6306af90/external_api.js" async></script>
      <style>
          * {
              box-sizing: border-box;
              font-family: Arial, sans-serif;
          }
  
          html, body, x-app-layout {
              height: 100vh;
              width: 100%;
              margin: 0;
              padding: 0;
              display: flex;
              flex-direction: column;
              justify-content: center;
              align-items: center;
              background: #f4f4f4;
          }
  
          .container {
              background: white;
              padding: 20px;
              border-radius: 10px;
              box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
              text-align: center;
              width: 90%;
              max-width: 500px;
          }
  
          button {
              background: #007bff;
              color: white;
              border: none;
              padding: 10px 20px;
              border-radius: 5px;
              cursor: pointer;
              transition: background 0.3s;
              margin: 10px 0;
              width: 100%;
          }
  
          button:hover {
              background: #0056b3;
          }
  
          input {
              width: 100%;
              padding: 10px;
              margin: 10px 0;
              border: 1px solid #ccc;
              border-radius: 5px;
          }
  
          #jaas-container {
              flex-grow: 1;
              height: 100vh;
              width: 100%;
              display: none;
          }
      </style>
      <script type="text/javascript">
          let meetingUrl = '';
  
          function startMeeting() {
              document.getElementById("jaas-container").style.display = "flex";
              let roomName = "vpaas-magic-cookie-e4df4fc3cebf4b93a47c50ed6306af90/SampleApp" + Date.now();
              meetingUrl = window.location.origin + "/meetings?room=" + roomName;
  
              const api = new JitsiMeetExternalAPI("8x8.vc", {
                  roomName: roomName,
                  parentNode: document.querySelector("#jaas-container"),
                  width: "100%",
                  height: "100%",
              });
  
              document.getElementById('meetingLink').value = meetingUrl;
          }
  
          function sendInvitation() {
              let email = document.getElementById('inviteEmail').value;
  
              fetch("<?php echo e(route('meetings.invite'), false); ?>", {
                  method: "POST",
                  headers: {
                      "Content-Type": "application/json",
                      "X-CSRF-TOKEN": "<?php echo e(csrf_token(), false); ?>"
                  },
                  body: JSON.stringify({ email: email, meeting_url: meetingUrl })
              })
              .then(response => response.json())
              .then(data => {
                  alert(data.message);
              })
              .catch(error => {
                  alert("Error sending invitation.");
              });
          }
      </script>
  </head>
  <body>
      <div class="container">
          <h2>Virtual Meeting</h2>
          <button onclick="startMeeting()">Create Meeting</button>
          <input type="text" id="meetingLink" readonly placeholder="Meeting link will appear here">
          <h3>Invite User</h3>
          <input type="email" id="inviteEmail" placeholder="Enter user email">
          <button onclick="sendInvitation()">Send Invite</button>
          <button onclick="startMeeting()">Join Meeting</button>
      </div>
      <div id="jaas-container"></div>
  </body>
  </html>
   <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
  <?php /**PATH C:\laragon\www\VirtualCollaborationHub\resources\views/meetings/meeting.blade.php ENDPATH**/ ?>