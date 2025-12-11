<header class="p-6 md:px-9 md:py-6">
    <h1 class="text-xl text-slate-900 font-medium">Programas Academicos</h1>
    <p class="text-slate-600">Gestiona los programas disponibles</p>
</header>

    
<section class="flex flex-col gap-6 p-4 sm:flex-row  sm:justify-start sm:items-center sm:px-8">
        <article class="flex flex-col sm:flex-row gap-2">
            <button class="bg-blue-600 text-white flex justify-center items-center gap-2 p-2 rounded-md w-full sm:w-auto hover:bg-blue-700 transition-all duration-300 ease-in-out cursor-pointer" id="btnOpenModal">
                <svg class="w-6 h-6" viewBox="0 0 24 24">
                    <use href="#plus"></use>
                </svg>
                Agregar Programa
            </button>
        </article>
</section>


<section class="flex flex-row flex-wrap gap-6 p-6 lg:gap-8 w-full justify-center">

    <?php 
        if($programs): 
        foreach($programs as $program):    
    ?>
    <article class="rounded-lg bg-white shadow-md w-11/12 md:max-w-xs">
        <div class="bg-blue-400 px-8 py-6 rounded-t-md text-white font-medium">
            <p class="text-white"><?= htmlspecialchars($program['program_name']); ?></p>
        </div>
        <div class="flex flex-col p-8 gap-4">
            <div class="flex flex-col gap-2 justify-center items-center bg-blue-100 p-4 rounded-3xl border border-blue-300">
                <p class="text-blue-600">2 estudiantes inscritos</p>
            </div>
            <div class="flex flex-row gap-2 justify-center">
                <button  type="button" class="flex-1 p-2 bg-blue-400 text-white cursor-pointer hover:bg-blue-500 transition-all duration-300 ease-in-out rounded-md btnOpenModalEdit" data-id="<?= htmlspecialchars($program['id_program']); ?>" data-name="<?= htmlspecialchars($program['program_name']); ?>">
                    Editar
                </button>
                <a class="flex-1 text-center p-2 bg-red-400 text-white hover:bg-red-500 transition-all duration-300 ease-in-out rounded-md" href="<?= APP_URL ;?>programs/deleteProgram/<?= htmlspecialchars($program['id_program']) ;?>" onclick="return confirm('¿Estas seguro de eliminar este programa?')">
                    Eliminar
                </a>
            </div>
        </div>
       
    </article>
    <?php 
        endforeach; 
        else:
    ?>
        <p class="text-center text-slate-600">No hay programas registrados</p>
    <?php endif; ?>
</section>




<div class="hidden fixed inset-0 items-center justify-center bg-black/50 z-20" id="modal">
        <form class="bg-white  rounded-lg shadow-lg w-11/12 max-w-sm flex flex-col gap-5 transition-all duration-300 ease-out transform translate-y-10 opacity-0"id="modalForm" method="post" action="<?= APP_URL ;?>programs/addProgram">
            <h2 class="w-full bg-blue-600 text-white p-4 rounded-t-md">Agregar Programa</h2>
            <div class="flex flex-col p-4 gap-8">
                <input type="text" placeholder="Nombre del programa" class="border border-gray-300 rounded-md p-2" name="program_name">
                <div class="flex flex-row gap-2 justify-center w-full">
                    <button type="button" class="flex-1 bg-gray-600 text-white p-1 rounded-md hover:bg-gray-700 transition-all duration-300 ease-in-out cursor-pointer" id="btnCloseModal">Cancelar</button>
                    <button type="submit" class="flex-1 bg-gradient-to-r from-blue-600 to-blue-800 text-white p-1 rounded-md hover:bg-blue-900 transition-all duration-300 ease-in-out cursor-pointer">Registrar</button>
                </div>
            </div>
        </form>
</div>
<div class="hidden fixed inset-0 items-center justify-center bg-black/50 z-20" id="modalEdit">
        <form class="bg-white p-6 py-12 rounded-lg shadow-lg w-11/12 max-w-sm flex flex-col gap-5 transition-all duration-300 ease-out transform translate-y-10 opacity-0"id="modalFormEdit" method="post" action="<?= APP_URL ;?>programs/updateProgram">
            <input type="hidden" name="id_program">
            <input type="text" placeholder="Nombre del Programa" class="border border-gray-300 rounded-md p-2" name="program_name">
            <div class="flex flex-row gap-4 justify-end">
                <button type="button" class="bg-gray-600 text-white p-1 rounded-md hover:bg-gray-700 transition-all duration-300 ease-in-out cursor-pointer" id="btnCloseModalEdit">Cancelar</button>
                <button type="submit" class="bg-blue-600 text-white p-1 rounded-md hover:bg-blue-700 transition-all duration-300 ease-in-out cursor-pointer">Actualizar Programa</button>
            </div>
        </form>
    </div>

<div class="hidden fixed inset-0 items-center justify-center bg-black/50 z-40" id="confirmationModal">
    <div class="bg-white  rounded-lg shadow-lg w-11/12 max-w-sm flex flex-col gap-5 p-4">
        <div class="flex flex-col gap-4">
            <p class="text-center" id="confirmationMessage"></p>
            <div class="flex flex-row gap-2 justify-center w-full">
                <button type="button" class="flex-1 bg-blue-600 text-white p-1 rounded-md hover:bg-blue-700 transition-all duration-300 ease-in-out cursor-pointer" id="btnCloseConfirm">Aceptar</button>
            </div>
        </div>
    </div>
</div>