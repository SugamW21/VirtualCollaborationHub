{{-- <x-app-layout>
    <div id="meeting-wrapper" style="width: 100%; height: calc(100vh - 60px); display: flex; flex-direction: column;">
        <script src="https://8x8.vc/vpaas-magic-cookie-e4df4fc3cebf4b93a47c50ed6306af90/external_api.js"></script>
        <style>
            .container {
                background: rgba(255, 255, 255, 0.8); /* Transparent background */
                padding: 20px;
                border-radius: 15px;
                box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
                text-align: center;
                width: 90%;
                max-width: 600px;
                margin: 20px auto;
                backdrop-filter: blur(10px); /* Optional: Adds a blur effect for better readability */
            }
            h2 {
                font-size: 2rem;
                color: #ffffff;
                margin-bottom: 20px;
                font-family: 'Arial', sans-serif;
            }
    
            button {
                background: #4CAF50;
                color: white;
                border: none;
                padding: 12px 24px;
                border-radius: 8px;
                cursor: pointer;
                transition: background 0.3s;
                margin: 10px 0;
                width: 100%;
                font-size: 1rem;
            }
    
            button:hover {
                background: #45a049;
            }

            input {
                width: 100%;
                padding: 12px;
                margin: 10px 0;
                border: 1px solid #ddd;
                border-radius: 8px;
                font-size: 1rem;
                color: #333;
            }
    
            #jaas-container {
                flex-grow: 1;
                width: 100%;
                height: 100%;
                min-height: 500px;
                display: none;
            }
            
            .loading-message {
                display: none;
                text-align: center;
                padding: 20px;
                font-size: 18px;
                color: #000000;
            }

            /* Invite section */
            #inviteSection {
                margin-top: 20px;
            }

            #inviteSection h3 {
                font-size: 1.5rem;
                color: #333;
            }

            /* Added stylish border */
            .border-radius-button {
                border-radius: 10px;
            }
        </style>
        
        <div class="container" id="meeting-controls">
            <h3>Virtual Meeting</h3>
            <button onclick="createMeeting()">Create Meeting</button>
            <input type="text" id="meetingLink" readonly placeholder="Meeting link will appear here">
            
            <div id="inviteSection" style="display: none;">
                <h3>Invite User</h3>
                <input type="email" id="inviteEmail" placeholder="Enter user email">
                <button onclick="sendInvitation()">Send Invite</button>
                <button onclick="joinMeeting()">Join Meeting</button>
            </div>
        </div>
        
        <div class="loading-message" id="loading-message">
            Initializing video call... Please wait.
        </div>
        
        <div id="jaas-container"></div>
        
        <script type="text/javascript">
            let meetingUrl = '';
            let roomName = '';
            let api = null;
            
            // Function to get URL parameters
            function getUrlParameter(name) {
                name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
                var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
                var results = regex.exec(location.search);
                return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
            }
            
            // Create meeting but don't join yet
            function createMeeting() {
                roomName = "vpaas-magic-cookie-e4df4fc3cebf4b93a47c50ed6306af90/SampleApp" + Date.now();
                meetingUrl = window.location.origin + "/meetings?room=" + roomName;
                document.getElementById('meetingLink').value = meetingUrl;
                
                // Show the invite section
                document.getElementById('inviteSection').style.display = "block";
            }
    
            // Join the meeting
            function joinMeeting(customRoomName = null) {
                // Use provided room name or the one created earlier
                const roomToJoin = customRoomName || roomName;
                
                if (!roomToJoin) {
                    alert("Please create a meeting first or provide a room name.");
                    return;
                }
                
                // Show loading message
                document.getElementById("loading-message").style.display = "block";
                
                // Hide the container and show the meeting
                document.getElementById("jaas-container").style.display = "flex";
                document.getElementById("meeting-controls").style.display = "none";
                
                try {
                    // Initialize Jitsi API
                    api = new JitsiMeetExternalAPI("8x8.vc", {
                        roomName: roomToJoin,
                        parentNode: document.querySelector("#jaas-container"),
                        width: "100%",
                        height: "100%",
                    });
                    
                    // Hide loading message when API is ready
                    api.addEventListener('videoConferenceJoined', () => {
                        document.getElementById("loading-message").style.display = "none";
                    });
                    
                    // Handle API errors
                    api.addEventListener('errorOccurred', (error) => {
                        console.error('Jitsi API error:', error);
                        document.getElementById("loading-message").innerHTML = 
                            "Error initializing video call. Please refresh the page and try again.";
                    });
                } catch (error) {
                    console.error('Error initializing Jitsi API:', error);
                    document.getElementById("loading-message").innerHTML = 
                        "Error initializing video call. Please refresh the page and try again.";
                }
            }
    
            function sendInvitation() {
                let email = document.getElementById('inviteEmail').value;
                
                if (!meetingUrl) {
                    alert("Please create a meeting first.");
                    return;
                }
    
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
            
            // Initialize when the page loads
            document.addEventListener('DOMContentLoaded', function() {
                const roomParam = getUrlParameter('room');
                if (roomParam) {
                    // If room parameter exists, automatically join the meeting
                    setTimeout(() => {
                        joinMeeting(roomParam);
                    }, 1000); // Small delay to ensure the API is loaded
                } else {
                    // Hide invite section initially
                    document.getElementById('inviteSection').style.display = "none";
                }
            });
        </script>
    </div>
  </x-app-layout>
  
   --}}

   <x-app-layout>
    <div id="meeting-wrapper" style="width: 100%; height: calc(100vh - 60px); display: flex; flex-direction: column;">
        <script src="https://8x8.vc/vpaas-magic-cookie-e4df4fc3cebf4b93a47c50ed6306af90/external_api.js"></script>
        <style>
            .container {
                background: rgba(255, 255, 255, 0.8); /* Transparent background */
                padding: 20px;
                border-radius: 15px;
                box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
                text-align: center;
                width: 90%;
                max-width: 600px;
                margin: 20px auto;
                backdrop-filter: blur(10px); /* Optional: Adds a blur effect for better readability */
            }
            h2 {
                font-size: 2rem;
                color: #ffffff;
                margin-bottom: 20px;
                font-family: 'Arial', sans-serif;
            }
    
            button {
                background: #4CAF50;
                color: white;
                border: none;
                padding: 12px 24px;
                border-radius: 8px;
                cursor: pointer;
                transition: background 0.3s;
                margin: 10px 0;
                width: 100%;
                font-size: 1rem;
            }
    
            button:hover {
                background: #45a049;
            }

            input {
                width: 100%;
                padding: 12px;
                margin: 10px 0;
                border: 1px solid #ddd;
                border-radius: 8px;
                font-size: 1rem;
                color: #333;
            }
    
            #jaas-container {
                flex-grow: 1;
                width: 100%;
                height: 100%;
                min-height: 500px;
                display: none;
            }
            
            .loading-message {
                display: none;
                text-align: center;
                padding: 20px;
                font-size: 18px;
                color: #000000;
            }

            /* Invite section */
            #inviteSection {
                margin-top: 20px;
            }

            #inviteSection h3 {
                font-size: 1.5rem;
                color: #333;
            }

            /* Added stylish border */
            .border-radius-button {
                border-radius: 10px;
            }
            
            /* Unauthorized message */
            #unauthorized-message {
                display: none;
                background: rgba(255, 0, 0, 0.1);
                border: 1px solid #ff0000;
                color: #ff0000;
                padding: 15px;
                border-radius: 8px;
                margin: 20px auto;
                max-width: 600px;
                text-align: center;
            }
        </style>
        
        <div id="unauthorized-message">
            You are not authorized to join this meeting. Redirecting to dashboard...
        </div>
        
        <div class="container" id="meeting-controls">
            <h3>Hold on a second! 🚀</h3>
            {{-- <h3>Virtual Meeting</h3>
            <button onclick="createMeeting()">Create Meeting</button>
            <input type="text" id="meetingLink" readonly placeholder="Meeting link will appear here">
            
            {{-- <div id="inviteSection" style="display: none;">
                <h3>Invite User</h3>
                <input type="email" id="inviteEmail" placeholder="Enter user email">
                <button onclick="sendInvitation()">Send Invite</button>
                <button onclick="joinMeeting()">Join Meeting</button>
            </div> --}}
        </div> 
        
        <div class="loading-message" id="loading-message">
            Initializing video call... Please wait.
        </div>
        
        <div id="jaas-container"></div>
        
        <script type="text/javascript">
    let meetingUrl = '';
    let roomName = '{{ $roomName ?? "" }}';
    let api = null;
    let isAuthorized = {{ isset($isAuthorized) && $isAuthorized ? 'true' : 'false' }};
    
    // Function to get URL parameters
    function getUrlParameter(name) {
        name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
        var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
        var results = regex.exec(location.search);
        return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
    }
    
    // Extract room name from URL if not provided by server
    if (!roomName) {
        roomName = getUrlParameter('room');
        console.log("Extracted room name from URL:", roomName);
    }
    
    // Create meeting but don't join yet
    function createMeeting() {
        fetch("{{ route('meetings.create') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            }
        })
        .then(response => response.json())
        .then(data => {
            meetingUrl = data.meeting_url;
            // Extract room parameter from the URL
            const urlObj = new URL(meetingUrl);
            roomName = urlObj.searchParams.get('room');
            console.log("Created meeting with room name:", roomName);
            
            document.getElementById('meetingLink').value = meetingUrl;
            
            // Show the invite section
            document.getElementById('inviteSection').style.display = "block";
        })
        .catch(error => {
            console.error('Error creating meeting:', error);
            alert("Error creating meeting. Please try again.");
        });
    }

    // Join the meeting
    function joinMeeting(customRoomName = null) {
        // Use provided room name or the one created earlier
        const roomToJoin = customRoomName || roomName;
        
        console.log("Attempting to join room:", roomToJoin);
        
        if (!roomToJoin) {
            alert("Please create a meeting first or provide a room name.");
            return;
        }
        
        // Verify access before joining
        verifyAccess(roomToJoin, function(authorized) {
            if (!authorized) {
                document.getElementById("unauthorized-message").style.display = "block";
                setTimeout(function() {
                    window.location.href = "{{ route('dashboard') }}";
                }, 3000);
                return;
            }
            
            // Show loading message
            document.getElementById("loading-message").style.display = "block";
            
            // Hide the container and show the meeting
            document.getElementById("jaas-container").style.display = "flex";
            document.getElementById("meeting-controls").style.display = "none";
            
            try {
                console.log("Initializing Jitsi with room:", roomToJoin);
                
                // Format the room name for Jitsi
                // If it already contains the vpaas prefix, use it as is
                let jitsiRoomName = roomToJoin;
                if (!roomToJoin.includes("vpaas-magic-cookie")) {
                    jitsiRoomName = "vpaas-magic-cookie-e4df4fc3cebf4b93a47c50ed6306af90/SampleApp" + roomToJoin;
                }
                
                console.log("Formatted Jitsi room name:", jitsiRoomName);
                
                // Initialize Jitsi API
                api = new JitsiMeetExternalAPI("8x8.vc", {
                    roomName: jitsiRoomName,
                    parentNode: document.querySelector("#jaas-container"),
                    width: "100%",
                    height: "100%",
                });
                
                // Hide loading message when API is ready
                api.addEventListener('videoConferenceJoined', () => {
                    document.getElementById("loading-message").style.display = "none";
                    console.log("Successfully joined video conference");
                });
                
                // Handle API errors
                api.addEventListener('errorOccurred', (error) => {
                    console.error('Jitsi API error:', error);
                    document.getElementById("loading-message").innerHTML = 
                        "Error initializing video call. Please refresh the page and try again.";
                });
            } catch (error) {
                console.error('Error initializing Jitsi API:', error);
                document.getElementById("loading-message").innerHTML = 
                    "Error initializing video call. Please refresh the page and try again. Error: " + error.message;
            }
        });
    }
    
    // Verify if the user has access to the meeting
    function verifyAccess(roomName, callback) {
        // If we already know the user is authorized from server-side check
        if (isAuthorized) {
            callback(true);
            return;
        }
        
        fetch("{{ route('meetings.verify-access') }}?room=" + roomName, {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            credentials: 'same-origin' // Important for cookies
        })
        .then(response => response.json())
        .then(data => {
            callback(data.authorized);
        })
        .catch(error => {
            console.error('Error verifying access:', error);
            callback(false);
        });
    }

    function sendInvitation() {
        let email = document.getElementById('inviteEmail').value;
        
        if (!meetingUrl) {
            alert("Please create a meeting first.");
            return;
        }

        fetch("{{ route('meetings.invite') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({ email: email, meeting_url: meetingUrl }),
            credentials: 'same-origin' // Important for cookies
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
        })
        .catch(error => {
            alert("Error sending invitation.");
        });
    }
    
    // Initialize when the page loads
    document.addEventListener('DOMContentLoaded', function() {
        console.log("DOM loaded, room name from server:", roomName);
        
        const roomParam = getUrlParameter('room');
        console.log("Room parameter from URL:", roomParam);
        
        if (roomParam) {
            // If room parameter exists, automatically join the meeting
            roomName = roomParam; // Make sure we use the URL parameter
            console.log("Using room name from URL:", roomName);
            
            setTimeout(() => {
                joinMeeting(roomParam);
            }, 1000); // Small delay to ensure the API is loaded
        } else {
            // Hide invite section initially
            document.getElementById('inviteSection').style.display = "none";
        }
    });
</script>
    </div>
</x-app-layout>

