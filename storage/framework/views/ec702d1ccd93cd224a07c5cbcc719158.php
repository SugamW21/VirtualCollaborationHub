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
    <div id="meeting-wrapper" style="width: 100%; height: calc(100vh - 60px); display: flex; flex-direction: column;">
        <script src="https://8x8.vc/vpaas-magic-cookie-e4df4fc3cebf4b93a47c50ed6306af90/external_api.js"></script>
        <style>
            .container {
                background: white;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                text-align: center;
                width: 90%;
                max-width: 500px;
                margin: 20px auto;
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
            }
        </style>
        
        <div class="container" id="meeting-controls">
            <h2>Virtual Meeting</h2>
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