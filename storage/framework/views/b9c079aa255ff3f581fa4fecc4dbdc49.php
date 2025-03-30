<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale()), false); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token(), false); ?>">

        <title><?php echo e(config('app.name', 'Laravel'), false); ?></title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
        
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="flex flex-col min-h-screen bg-gray-100">
            <div>

            </div>

            <div class="flex flex-col min-h-screen bg-gray-100">
                <?php echo e($slot, false); ?>

            </div>
        </div>
    </body>
</html>
<?php /**PATH C:\laragon\www\VirtualCollaborationHub\resources\views/layouts/guest.blade.php ENDPATH**/ ?>