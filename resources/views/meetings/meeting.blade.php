<x-app-layout>
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
  
              fetch("{{ route('meetings.invite') }}", {
                  method: "POST",
                  headers: {
                      "Content-Type": "application/json",
                      "X-CSRF-TOKEN": "{{ csrf_token() }}"
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
  </x-app-layout>
  