<header class="p-6 md:px-9 md:py-6">
    <h1 class="text-xl text-slate-900 font-medium">Estudiantes Activos</h1>
    <p class="text-slate-600">Gestiona el listado de estudiantes registrados</p>
</header>

    
<section class="flex flex-col gap-6 p-4 sm:flex-row  sm:justify-start sm:items-center sm:px-8">
        <article class="flex flex-col sm:flex-row gap-2">
            <button class="bg-blue-600 text-white flex justify-center items-center gap-2 p-2 rounded-md w-full sm:w-auto hover:bg-blue-700 transition-all duration-300 ease-in-out cursor-pointer" id="btnOpenModal">
                <svg class="w-6 h-6" viewBox="0 0 24 24">
                    <use href="#plus"></use>
                </svg>
                Agregar Estudiante
            </button>
        </article>
</section>


<section class="flex flex-row flex-wrap gap-6 p-6 lg:gap-8 w-full justify-center">

    <?php 
        if($students): 
        foreach($students as $student):    
    ?>
    <article class="rounded-lg bg-white shadow-md w-11/12 md:max-w-xs">
        <div class="bg-blue-400 px-8 py-6 rounded-t-md text-white font-medium">
            <p class="text-white"><?= htmlspecialchars($student['program_name']); ?></p>
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
        <p class="text-center text-slate-600">No hay estudiantes registrados</p>
    <?php endif; ?>
</section>




<div class="hidden fixed inset-0 items-center justify-center bg-black/50 z-20" id="modal">
        <form class="bg-white  rounded-lg shadow-lg w-11/12 max-w-sm flex flex-col gap-5 transition-all duration-300 ease-out transform translate-y-10 opacity-0 max-h-11/12 overflow-y-auto" id="modalForm" method="post" action="<?= APP_URL ;?>students/addStudent" enctype="multipart/form-data">
            <h2 class="w-full bg-blue-600 text-white p-4 rounded-t-md">Agregar Estudiante</h2>
            <div class="flex flex-col p-4 gap-8">
                <div class="flex flex-col items-center">
                    <label class="w-full border-2 border-dashed border-gray-300 rounded-2xl p-8 text-center cursor-pointer hover:border-green-500 transition-colors bg-gray-50">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-upload w-12 h-12 mx-auto text-gray-400 mb-3" aria-hidden="true"><path d="M12 3v12"></path><path d="m17 8-5-5-5 5"></path><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path></svg>
                        <p class="text-gray-600 mb-1">Haz clic para subir una foto</p>
                        <p class="text-gray-500">JPG o PNG (máx. 1MB)</p>
                        <input type="file" accept="image/jpeg,image/jpg,image/png" class="hidden" name="url_image" id="fileInput">
                    </label>
                </div>
                <input type="number" placeholder="Documento de Idenditad" class="border border-gray-300 rounded-md p-2" name="student_document">
                <input type="text" placeholder="Nombre" class="border border-gray-300 rounded-md p-2" name="student_name">
                <input type="text" placeholder="Apellido" class="border border-gray-300 rounded-md p-2" name="student_lastname">
                <input type="email" placeholder="Correo Electrónico" class="border border-gray-300 rounded-md p-2" name="student_email">
                <select name="program_id" class="border border-gray-300 rounded-md p-2">
                    <option value="" disabled selected>Seleccione un Programa</option>
                    <?php foreach($programs as $program): ?>
                        <option value="<?= htmlspecialchars($program['id_program']); ?>"><?= htmlspecialchars($program['program_name']); ?></option>
                    <?php endforeach; ?>
                </select>
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