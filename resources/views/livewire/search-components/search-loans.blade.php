<form class="mb-5 flex flex-col justify-center space-y-3" wire:submit.prevent='readFolio'>
    <fieldset>
        <label class="block mb-1 text-xs text-gray-700 uppercase font-bold" for="termino">No. de folio
        </label>
        <input id="folio" type="text" placeholder="Buscar por Término: ej. 90CAB23"
            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-[300px] md:w-[360px]"
            wire:model="folio" />
    </fieldset>

    <div class="w-[300px] md:w-[360px]">
        <button type="submit" id="btnFolio"
            class="bg-indigo-600 hover:bg-indigo-800 transition-colors text-white text-sm font-bold px-10 h-10 rounded cursor-pointer uppercase w-full">
            <i class="fa-solid fa-magnifying-glass fa-flip-horizontal"></i>
            Buscar
        </button>
    </div>
</form>