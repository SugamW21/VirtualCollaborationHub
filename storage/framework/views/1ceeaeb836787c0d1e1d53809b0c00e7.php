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
            background: #00509E;
            color: white;
            padding: 20px 0;
        }

        aside h1 {
            text-align: center;
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        nav a {
            display: block;
            padding: 10px 20px;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin: 10px 0;
            background-color: #003366;
            transition: background-color 0.3s;
        }

        nav a:hover {
            background-color: #002244;
        }

        form button {
            width: 90%;
            padding: 10px;
            background-color: #FF5A5F;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin: 20px auto 0;
            display: block;
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
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #f7f7f7;
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
                <a href="<?php echo e(route('admin.dashboard'), false); ?>">Manage Users</a>
                <a href="<?php echo e(route('admin.feedbacks'), false); ?>">Feedbacks</a>
            </nav>
            <form method="POST" action="<?php echo e(route('admin.logout'), false); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit">Log Out</button>
            </form>
        </aside>

        <!-- Main Content -->
        <main>
            <h2>User Feedbacks</h2>
            <table>
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Rating</th>
                        <th>Feedback</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $feedbacks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feedback): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($feedback->user->name, false); ?></td>
                            <td><?php echo e($feedback->rating, false); ?></td>
                            <td><?php echo e($feedback->feedback, false); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </main>
    </div>
</body>
</html>
<?php /**PATH C:\laragon\www\VirtualCollaborationHub\resources\views/admin/feedbacks.blade.php ENDPATH**/ ?>