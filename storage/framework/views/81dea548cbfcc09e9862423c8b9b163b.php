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
            padding: 20px 0;
            box-shadow: 2px 0 8px rgba(0, 0, 0, 0.1);
        }

        aside h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.75rem;
        }

        nav a {
            display: block;
            padding: 12px 20px;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin: 10px 0;
            background-color: #00509E;
            transition: background-color 0.3s, transform 0.3s;
        }

        nav a:hover {
            background-color: #003366;
            transform: translateX(5px);
        }

        form button {
            width: 100%;
            padding: 12px;
            background-color: #FF5A5F;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        form button:hover {
            background-color: #FF3F44;
        }

        main {
            flex-grow: 1;
            padding: 20px;
            background-color: white;
            margin: 20px;
            border-radius: 8px;
            box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.05);
        }

        header h1 {
            font-size: 2rem;
            color: #003366;
        }

        header .last-login {
            font-size: 1rem;
            color: gray;
        }

        .container form {
            max-width: 600px;
            margin: 20px auto;
            
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin: 15px 0 5px;
            color: #555;
            font-weight: bold;
        }

        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            
            border-radius: 4px;
            font-size: 16px;
        }

        form button {
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

form button:hover {
    background-color: #FF3F44;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2); /* Adds shadow for hover effect */
}

    </style>
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <aside>
            <h1>Admin Dashboard</h1>
            <nav>
                <a href="<?php echo e(route('admin.dashboard'), false); ?>">Overview</a>
                <a href="#" id="manageUsersLink">Manage Users</a>
                <a href="#">Settings</a>
            </nav>
            <form method="POST" action="<?php echo e(route('admin.logout'), false); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit">Log Out</button>
            </form>
        </aside>

        <!-- Main Content -->
        <main style="position: relative;">
            <a href="<?php echo e(route('admin.dashboard'), false); ?>" class="back-button" 
               style="position: absolute; top: 20px; left: 20px; background-color: #6c757d; color: white; padding: 10px 15px; text-decoration: none; border-radius: 4px; font-size: 14px; transition: background-color 0.3s;">Go Back</a>
            <br>
            <br>
            <header>
                <h1>Welcome, Admin</h1>
                <span class="last-login" id="lastLogin">
                    Last Login: <?php echo e(now()->format('F j, Y'), false); ?> - <?php echo e(now()->format('H:i:s'), false); ?>

                </span>
            </header>
            <form action="<?php echo e(route('users.update', $user->id), false); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <label for="name">Name:</label>
                <input type="text" name="name" value="<?php echo e($user->name, false); ?>" required>

                <label for="email">Email:</label>
                <input type="email" name="email" value="<?php echo e($user->email, false); ?>" required>

                <button type="submit">Save Changes</button>
            </form>
        </main>
    </div>
    <script>
        function updateTime() {
            const now = new Date();
            const lastLoginElement = document.getElementById('lastLogin');
            const formattedDate = now.toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });
            const formattedTime = now.toLocaleTimeString('en-US', { hour12: false });

            lastLoginElement.textContent = `Last Login: ${formattedDate} - ${formattedTime}`;
        }
        setInterval(updateTime, 1000);
    </script>
</body>
</html>
<?php /**PATH C:\laragon\www\VirtualCollaborationHub\resources\views/admin/edit-user.blade.php ENDPATH**/ ?>