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





<div class="hidden fixed inset-0 items-center justify-center bg-black/50 z-20" id="modal">
        <form class="bg-white  rounded-lg shadow-lg w-11/12 max-w-sm flex flex-col gap-5 transition-all duration-300 ease-out transform translate-y-10 opacity-0"id="modalForm" method="post" action="<?= APP_URL ;?>programs/addProgram">
            <h2 class="w-full bg-blue-600 text-white p-4 rounded-t-md">Agregar Programa</h2>
            <div class="flex flex-col p-4 gap-8">
                <input type="text" placeholder="Nombre del programa" class="border border-gray-300 rounded-md p-2" name="program_name">
                <div class="flex flex-row gap-2 justify-center w-full">
                    <button type="button" class="flex-1 bg-gray-600 text-white p-1 rounded-md hover:bg-gray-700 transition-all duration-300 ease-in-out cursor-pointer" id="btnCloseModal">Cancelar</button>
                    <button type="submit" class="flex-1 bg-gradient-to-r from-blue-600 to-blue-800 text-white p-1 rounded-md hover:bg-green-700 transition-all duration-300 ease-in-out cursor-pointer">Registrar</button>
                </div>
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