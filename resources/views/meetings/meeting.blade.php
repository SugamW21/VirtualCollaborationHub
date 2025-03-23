{{-- <x-app-layout>
    <h1 style="text-align: center; color: rgb(183, 45, 45);"><b>Welcome to Meetings</b></h1>

    
    <!DOCTYPE html>
    <html>
      <head>
        <script src='https://8x8.vc/vpaas-magic-cookie-e4df4fc3cebf4b93a47c50ed6306af90/external_api.js' async></script>
        <style>html, body, #jaas-container { height: 100%; }</style>
        <script type="text/javascript">
          window.onload = () => {
            const api = new JitsiMeetExternalAPI("8x8.vc", {
              roomName: "vpaas-magic-cookie-e4df4fc3cebf4b93a47c50ed6306af90/SampleAppAlienDocumentationsSponsorTerribly",
              parentNode: document.querySelector('#jaas-container'),
							// Make sure to include a JWT if you intend to record,
							// make outbound calls or use any other premium features!
							// jwt: "eyJraWQiOiJ2cGFhcy1tYWdpYy1jb29raWUtZTRkZjRmYzNjZWJmNGI5M2E0N2M1MGVkNjMwNmFmOTAvYzI0ZGFlLVNBTVBMRV9BUFAiLCJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiJqaXRzaSIsImlzcyI6ImNoYXQiLCJpYXQiOjE3MzkyNjA2MDksImV4cCI6MTczOTI2NzgwOSwibmJmIjoxNzM5MjYwNjA0LCJzdWIiOiJ2cGFhcy1tYWdpYy1jb29raWUtZTRkZjRmYzNjZWJmNGI5M2E0N2M1MGVkNjMwNmFmOTAiLCJjb250ZXh0Ijp7ImZlYXR1cmVzIjp7ImxpdmVzdHJlYW1pbmciOmZhbHNlLCJvdXRib3VuZC1jYWxsIjpmYWxzZSwic2lwLW91dGJvdW5kLWNhbGwiOmZhbHNlLCJ0cmFuc2NyaXB0aW9uIjpmYWxzZSwicmVjb3JkaW5nIjpmYWxzZX0sInVzZXIiOnsiaGlkZGVuLWZyb20tcmVjb3JkZXIiOmZhbHNlLCJtb2RlcmF0b3IiOnRydWUsIm5hbWUiOiJUZXN0IFVzZXIiLCJpZCI6Imdvb2dsZS1vYXV0aDJ8MTE3ODk0ODM2MzAxMzQ5ODgxNjU5IiwiYXZhdGFyIjoiIiwiZW1haWwiOiJ0ZXN0LnVzZXJAY29tcGFueS5jb20ifX0sInJvb20iOiIqIn0.AUnZO7ScB5xkmo5wdRy4D5GPO9eMd15v4D1_Evr8uUweghF98nYlKmR1Hp6SwbAmmPFTB3KUDEVk4l1QToWmOEwnU-D_7G9x-oeuZScfAu81mgjRKO_sBFgJqvMrqIku1_zHwpi9w5n98QzIoxyPGZ7qBc6TDkQstlKL8tn_fb0gdGmxxP1vA49NpgZ0KGPu5P3UaTaJPngpU_x3pkfDNbY_hx6_-hJKOYOpIyGeYQitfr8uPQf0ZSW6NkzHATY7GlJzKloWUhaKehe0PqX4KKkdQ1gsJh7K4VwGC_3G5rt2S7d150SilVHROm1YneJIWhRy6xlVoIbA_VGpjUQYcg"
            });
          }
        </script>
      </head>
      <body><div id="jaas-container" /></body>
    </html>
  
</x-app-layout>


 --}}
 <x-app-layout> 
  <!DOCTYPE html>
  <html>
    <head>
      <script src="https://8x8.vc/vpaas-magic-cookie-e4df4fc3cebf4b93a47c50ed6306af90/external_api.js" async></script>
      <style>
        /* Ensure full height for all necessary elements */
        x-app-layout, html, body {
          height: 100vh;
          width: 100%;
          margin: 0;
          padding: 0;
          display: flex;
          flex-direction: column;
        }

        #jaas-container {
          flex-grow: 1; /* Allows Jitsi container to take up remaining space */
          height: 100vh;
          width: 100%;
        }
      </style>
      <script type="text/javascript">
        function startMeeting() {
          document.getElementById("jaas-container").style.display = "flex";

          const api = new JitsiMeetExternalAPI("8x8.vc", {
            roomName: "vpaas-magic-cookie-e4df4fc3cebf4b93a47c50ed6306af90/SampleAppAlienDocumentationsSponsorTerribly",
            parentNode: document.querySelector("#jaas-container"),
            width: "100%",
            height: "100%",
          });
        }

        window.onload = startMeeting; // Start meeting automatically when page loads
      </script>
    </head>
    <div id="notification-container" class="notification-area"></div>
    <body>
      <div id="jaas-container"></div>
    </body>
  </html>
</x-app-layout>

  
  
  