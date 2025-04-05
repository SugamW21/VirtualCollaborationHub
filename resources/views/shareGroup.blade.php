{{-- <x-app-layout>
    
        <head>
            <link rel="icon" href="images/logo.png" type="image/x-icon">
            <title>Virtual Collaboration Hub</title>
        </head>
    <div class="container mt-4">

        <img src="/{{$groupData->image}}" width="200px" height="200px" alt="">
        <p><b>{{$groupData->name}}</b></p>
        <p><b>Total Members:- </b>{{$totalMembers}}</p>

        @if($available != 0)
            <P>Available for <b>{{ $available }}</b> Members Only!</P>
        @endif

        @if($isOwner)
            <p>You are the <b>ADMIN</b> of this group. So you can't join this group!</p>
        
            @elseif($isJoined > 0)
            <p>You <b>already Joined</b> this group👍👍.</p>

            @elseif($available == 0)
            <p>Member Limit Already Filled💯.</p>

            @else
                <button class="btn btn-primary join-now" data-id="{{ $groupData->id}}">Join Now</button>
        @endif
        
    </div>
    
</x-app-layout> --}}
<x-app-layout>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="images/logo.png" type="image/x-icon">
        <title>Virtual Collaboration Hub</title>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <style>
            /* Modern UI Styles */
            body {
                font-family: 'Inter', sans-serif;
                background-color: #f8fafc;
                color: #333;
            }

            .share-container {
                max-width: 500px;
                margin: 3rem auto;
                padding: 0;
                background: white;
                border-radius: 1rem;
                overflow: hidden;
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            }

            .share-header {
                height: 150px;
                background: linear-gradient(to right, #6366f1, #ec4899);
                position: relative;
            }

            .share-avatar {
                position: absolute;
                bottom: -50px;
                left: 50%;
                transform: translateX(-50%);
                width: 100px;
                height: 100px;
                border-radius: 50%;
                border: 5px solid white;
                object-fit: cover;
                background: white;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            }

            .share-content {
                padding: 4rem 2rem 2rem;
                text-align: center;
            }

            .share-title {
                font-size: 1.5rem;
                font-weight: 700;
                margin-bottom: 0.5rem;
                color: #1e293b;
            }

            .share-info {
                margin-bottom: 1.5rem;
                color: #64748b;
            }

            .share-stats {
                display: flex;
                justify-content: center;
                gap: 2rem;
                margin-bottom: 1.5rem;
            }

            .stat-item {
                text-align: center;
            }

            .stat-value {
                font-size: 1.5rem;
                font-weight: 700;
                color: #1e293b;
                margin-bottom: 0.25rem;
            }

            .stat-label {
                font-size: 0.875rem;
                color: #64748b;
            }

            .progress-container {
                width: 100%;
                height: 0.5rem;
                background-color: #e2e8f0;
                border-radius: 9999px;
                overflow: hidden;
                margin: 0 0 1.5rem;
            }

            .progress-bar {
                height: 100%;
                background: linear-gradient(to right, #6366f1, #ec4899);
                border-radius: 9999px;
                transition: width 0.3s ease;
            }

            .status-box {
                padding: 1rem;
                border-radius: 0.5rem;
                margin-bottom: 1.5rem;
                display: flex;
                align-items: center;
            }

            .status-box.available {
                background-color: rgba(16, 185, 129, 0.1);
                color: #10b981;
            }

            .status-box.unavailable {
                background-color: rgba(239, 68, 68, 0.1);
                color: #ef4444;
            }

            .status-box.joined {
                background-color: rgba(99, 102, 241, 0.1);
                color: #6366f1;
            }

            .status-box.owner {
                background-color: rgba(245, 158, 11, 0.1);
                color: #f59e0b;
            }

            .status-icon {
                margin-right: 0.75rem;
                font-size: 1.25rem;
            }

            .btn {
                display: inline-block;
                padding: 0.75rem 1.5rem;
                border-radius: 0.5rem;
                font-weight: 500;
                transition: all 0.2s;
                font-size: 0.875rem;
                text-align: center;
                cursor: pointer;
                text-decoration: none;
            }

            .btn-primary {
                background: linear-gradient(to right, #6366f1, #ec4899);
                color: white !important;
                border: none;
                box-shadow: 0 4px 6px rgba(99, 102, 241, 0.25);
            }

            .btn-primary:hover {
                transform: translateY(-2px);
                box-shadow: 0 6px 10px rgba(99, 102, 241, 0.3);
            }

            .btn-secondary {
                background: #f1f5f9;
                color: #334155 !important;
                border: 1px solid #e2e8f0;
            }

            .btn-secondary:hover {
                background: #e2e8f0;
            }

            .btn-full {
                width: 100%;
            }

            /* Animation for join button */
            @keyframes pulse {
                0% { transform: scale(1); }
                50% { transform: scale(1.05); }
                100% { transform: scale(1); }
            }

            .btn-join {
                animation: pulse 2s infinite;
            }

            /* Responsive adjustments */
            @media (max-width: 640px) {
                .share-container {
                    margin: 1rem;
                    width: auto;
                }
                
                .share-content {
                    padding: 3.5rem 1.5rem 1.5rem;
                }
                
                .share-stats {
                    gap: 1rem;
                }
            }
            
            /* Fix for icon display */
            .mr-2 {
                margin-right: 0.5rem;
            }
            
            /* Fix for button display */
            .mt-3 {
                margin-top: 0.75rem;
            }
        </style>
    </head>

    <div class="share-container">
        <div class="share-header">
            <img src="/{{$groupData->image}}" class="share-avatar" alt="{{$groupData->name}}">
        </div>
        
        <div class="share-content">
            <h1 class="share-title">{{$groupData->name}}</h1>
            <p class="share-info">Join this group to collaborate with team members</p>
            
            <div class="share-stats">
                <div class="stat-item">
                    <div class="stat-value">{{$totalMembers}}</div>
                    <div class="stat-label">Members</div>
                </div>
                
                <div class="stat-item">
                    <div class="stat-value">{{$groupData->join_limit}}</div>
                    <div class="stat-label">Capacity</div>
                </div>
            </div>
            
            <div class="progress-container">
                <div class="progress-bar" style="width: {{($totalMembers / $groupData->join_limit) * 100}}%"></div>
            </div>
            
            @if($available > 0)
                <div class="status-box available">
                    <i class="fas fa-user-plus status-icon"></i>
                    <span>Available for <strong>{{ $available }}</strong> more {{ $available == 1 ? 'member' : 'members' }}!</span>
                </div>
            @endif

            @if($isOwner)
                <div class="status-box owner">
                    <i class="fas fa-crown status-icon"></i>
                    <span>You are the <strong>Admin</strong> of this group. You cannot join this group!</span>
                </div>
            @elseif($isJoined > 0)
                <div class="status-box joined">
                    <i class="fas fa-check-circle status-icon"></i>
                    <span>You have <strong>already joined</strong> this group! 👍</span>
                </div>
            @elseif($available == 0)
                <div class="status-box unavailable">
                    <i class="fas fa-exclamation-circle status-icon"></i>
                    <span>Member limit already filled. You cannot join this group.</span>
                </div>
            @else
                <button class="btn btn-primary btn-full btn-join join-now" data-id="{{ $groupData->id}}">
                    <i class="fas fa-user-plus mr-2"></i> Join Now
                </button>
            @endif
            
            <a href="{{ url()->previous() }}" class="btn btn-secondary btn-full mt-3">
                <i class="fas fa-arrow-left mr-2"></i> Go Back
            </a>
        </div>
    </div>

    <script>
        // Join group functionality
        document.addEventListener('DOMContentLoaded', function() {
            const joinButton = document.querySelector('.join-now');
            if (joinButton) {
                joinButton.addEventListener('click', function() {
                    const groupId = this.getAttribute('data-id');
                    this.textContent = 'Joining...';
                    this.disabled = true;
                    
                    // Join group via AJAX
                    fetch(`/join-group/${groupId}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Replace button with joined message
                            const statusBox = document.createElement('div');
                            statusBox.className = 'status-box joined';
                            statusBox.innerHTML = `
                                <i class="fas fa-check-circle status-icon"></i>
                                <span>You have <strong>successfully joined</strong> this group! 👍</span>
                            `;
                            
                            joinButton.parentNode.replaceChild(statusBox, joinButton);
                            
                            // Update member count and progress bar
                            const memberValue = document.querySelector('.stat-value');
                            const currentCount = parseInt(memberValue.textContent);
                            memberValue.textContent = currentCount + 1;
                            
                            const progressBar = document.querySelector('.progress-bar');
                            const limit = parseInt(document.querySelectorAll('.stat-value')[1].textContent);
                            const newWidth = ((currentCount + 1) / limit) * 100;
                            progressBar.style.width = `${newWidth}%`;
                        } else {
                            alert(data.message || 'Failed to join group. Please try again.');
                            joinButton.textContent = 'Join Now';
                            joinButton.disabled = false;
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('An error occurred. Please try again.');
                        joinButton.textContent = 'Join Now';
                        joinButton.disabled = false;
                    });
                });
            }
        });
    </script>
</x-app-layout>

