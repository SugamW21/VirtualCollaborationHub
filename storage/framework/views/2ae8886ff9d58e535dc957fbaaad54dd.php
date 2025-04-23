<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            background: #f0f2f5;
            color: #333;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        aside {
            width: 250px;
            background: linear-gradient(135deg, #003366, #00509E);
            color: white;
            display: flex;
            flex-direction: column;
            padding: 20px 0;
            box-shadow: 2px 0 8px rgba(0, 0, 0, 0.1);
        }

        aside h1 {
            font-size: 1.75rem;
            text-align: center;
            margin-bottom: 20px;
        }

        nav {
            flex-grow: 1;
            padding: 0 10px;
        }

        nav a {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-bottom: 10px;
            background-color: #00509E;
            transition: background-color 0.3s, transform 0.3s;
        }

        nav a:hover {
            background-color: #003366;
            transform: translateX(5px);
        }

        nav a:active {
            background-color: #FF5A5F;
        }

        nav a i {
            margin-right: 10px;
        }

        .button {
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .button-edit {
            background-color: #007BFF;
        }

        .button-edit:hover {
            background-color: #0056b3;
        }

        .button-delete {
            background-color: #FF5A5F;
        }

        .button-delete:hover {
            background-color: #FF3F44;
        }

        main {
            flex-grow: 1;
            padding: 20px;
            background-color: #fff;
            box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
            margin: 20px;
        }

        header {
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            font-size: 2rem;
            margin: 0;
            color: #003366;
        }

        .last-login {
            font-size: 1rem;
            color: gray;
            font-weight: 500;
        }

        .card {
            flex: 1;
            min-width: 200px;
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.1);
        }

        .card h2 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #003366;
        }

        .card p {
            font-size: 1.25rem;
            color: gray;
        }

        .card-container {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .user-table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        .user-table th, .user-table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        .user-table th {
            background-color: #003366;
            color: white;
        }

        .user-table td {
            background-color: #f9f9f9;
        }

        .user-table tr:hover {
            background-color: #f1f1f1;
        }

        .hidden {
            display: none;
        }



    .log-button {
    width: 100%;
    padding: 12px;
    background-color: #FF5A5F;
    color: white;
    border: 5px solid white; /* Adds a large white border */
    border-radius: 8px; /* Adjusted for rounded corners */
    cursor: pointer;
    transition: background-color 0.3s, box-shadow 0.3s;
    font-size: 16px; /* Ensure readability */
    font-weight: bold;
}

log-button:hover {
    background-color: #FF3F44;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2); /* Adds shadow for hover effect */
}

    </style>
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <aside>
            <div style="text-align: center;">
                <h1>Admin Dashboard</h1>
            </div>
            <nav>
                <a href="<?php echo e(route('admin.dashboard'), false); ?>" class="<?php echo e(request()->routeIs('admin.dashboard') ? 'active' : '', false); ?>">
                    Overview
                </a>
                
                <a href="#" id="manageUsersLink">
                    <i class="fas fa-users"></i> Manage Users
                </a>
                <a href="<?php echo e(route('admin.feedbacks'), false); ?>">
                    <i class="fas fa-cogs"></i> Feedbacks
                </a>
            </nav>
            <form method="POST" action="<?php echo e(route('admin.logout'), false); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit" class="log-button">Log Out</button>
            </form>
        </aside>

        <!-- Main Content -->
        <main>
            <header>
                <h1>Welcome, Admin</h1>
                <span class="last-login" id="lastLogin">Last Login: <?php echo e(now()->format('F j, Y'), false); ?> - <?php echo e(now()->format('H:i:s'), false); ?></span>
            </header>
            <section>
                <div class="card-container">
                    <!-- Card 1: Total Users -->
                    <div class="card">
                        <h2>Total Users</h2>
                        <p><?php echo e($totalUsers, false); ?></p>
                    </div>

                    <!-- Card 2: Active Sessions -->
                    <div class="card">
                        <h2>Active Sessions</h2>
                        <p><?php echo e($activeSessionCount, false); ?></p>
                    </div>
                </div>
            </section>

            <!-- User Management Table (Initially Hidden) -->
            <div id="manageUsersTable" class="hidden">
                <h2>User Management</h2>
                <table class="user-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($user->name, false); ?></td>
                            <td><?php echo e($user->email, false); ?></td>
                            <td>
                                <?php
                                    $image = $user->image ? $user->image : 'images/dummy.png';
                                ?>
                                <img src="<?php echo e(asset($image), false); ?>" alt="User Image" style="width: 50px; height: 50px; border-radius: 50%;">
                            </td>
                            <td>
                                <a href="<?php echo e(route('users.edit', $user->id), false); ?>" class="button button-edit" style="margin-right: 10px;">
                                    Edit
                                </a>
                                <form id="delete-form-<?php echo e($user->id, false); ?>" action="<?php echo e(route('users.destroy', $user->id), false); ?>" method="POST" style="display: inline;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="button" class="button button-delete" onclick="confirmDeleteWithToast(<?php echo e($user->id, false); ?>)">
                                        Delete
                                    </button>
                                </form>
                                
                                <!-- Include Toastify CSS and JS -->
                                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
                                <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
                                
                                <script>
                                    function confirmDeleteWithToast(userId) {
                                        if (confirm('Are you sure you want to delete this user?')) {
                                            // Submit the form
                                            document.getElementById('delete-form-' + userId).submit();
                                
                                            // Show a success notification after delete
                                            Toastify({
                                                text: "User deleted successfully!",
                                                duration: 30000, // Dismiss after 3 seconds
                                                close: true, // Show close button
                                                gravity: "top", // Position: top or bottom
                                                position: "right", // Position: left, center, right
                                                backgroundColor: "linear-gradient(to right, #4caf50, #81c784)", // Stylish gradient
                                                stopOnFocus: true, // Pause on hover
                                            }).showToast();
                                        }
                                    }
                                </script>
                                
                                
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <!-- FontAwesome Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <!-- JavaScript for Live Time -->
    <script>
        document.getElementById('manageUsersLink').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default action of the link
            const userTable = document.getElementById('manageUsersTable');
            const isHidden = userTable.classList.contains('hidden');

            if (isHidden) {
                userTable.classList.remove('hidden'); // Show the table
            } else {
                userTable.classList.add('hidden'); // Hide the table
            }
        });

        function updateTime() {
            const now = new Date();
            const lastLoginElement = document.getElementById('lastLogin');
            const formattedDate = now.toLocaleDateString('en-US', {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
            const formattedTime = now.toLocaleTimeString('en-US', { hour12: false });

            lastLoginElement.textContent = `Last Login: ${formattedDate} - ${formattedTime}`;
        }

        setInterval(updateTime, 1000); // Update the last login time every second
    </script>
</body>
</html><?php /**PATH C:\laragon\www\VirtualCollaborationHub\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>