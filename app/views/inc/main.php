<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'app/views/inc/head.php'; ?>
</head>
<body class="h-dvh flex flex-col lg:flex-row">

    <?php require_once 'app/views/inc/sidebar.php'; ?>
    <?php require_once 'public/icons/icons.svg'; ?>
    <main class="flex-1 flex flex-col gap-4 bg-gray-50 overflow-y-auto">
        <?= $content; ?>
    </main>
    <?php require_once 'app/views/inc/scripts.php'; ?>
</body>
</html>