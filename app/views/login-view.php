<!DOCTYPE html>
<html lang="es">
<head>
    <?php require_once 'app/views/inc/head.php'; ?>
</head>
<body class="h-dvh flex flex-col justify-center items-center bg-gray-100">
    <form method="post" action="" class="flex flex-col justify-center align-center gap-6 p-5  py-18 rounded-2xl w-11/12 bg-white shadow-2xl max-w-96">
        <h1 class=" text-2xl text-center font-bold">Inicio de Sesión</h1>
        <input type="number" placeholder="Documento de identidad" pattern="[\d+]" name="documento" required class="p-2 border border-gray-500 rounded-md">
        <input type="password" placeholder="Contraseña" name="contraseña" required class="p-2 border border-gray-500 rounded-md">
        <button type="submit" class=" bg-blue-500 text-white h-9 rounded-md cursor-pointer transition-all ease-in-out duration-300 hover:bg-blue-700 ">Iniciar Sesión</button>
        <?php if ($msg): ?>
            <p id="msg" class=" text-red-500 text-center font-semibold"><?= htmlspecialchars($msg) ?></p>
        <?php endif; ?>
    </form>
</body>
</html>
