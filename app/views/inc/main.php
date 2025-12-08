<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'app/views/inc/head.php'; ?>
</head>
<body class="h-dvh flex flex-col lg:flex-row">
    <?php require_once 'app/views/inc/sidebar.php'; ?>
    <?= $content; ?>
    <?php require_once 'app/views/inc/scripts.php'; ?>
</body>
</html>