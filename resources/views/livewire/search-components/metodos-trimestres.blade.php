<div class="py-10 w-full">
    <div class="md:grid md:grid-cols-3 gap-5">
        <!-- Select Plazo -->
        <div class="mb-5">
            <label class="block mb-1 text-sm text-gray-700 uppercase font-bold">Plazo</label>
            <select id="trimestre" class="border-gray-300 p-2 w-full rounded-md" wire:model="plazo">
                <option value="0">Plazo</option>
                <option value="1">Enero - Marzo</option>
                <option value="2">Abril - Junio</option>
                <option value="3">Julio - Septiembre</option>
                <option value="4">Octubre - Diciembre</option>
            </select>
        </div>

        <!-- Select Carrera -->
        <div class="mb-5">
            <label class="block mb-1 text-sm text-gray-700 uppercase font-bold">Carrera</label>
            <select id="carreras" class="border-gray-300 p-2 w-full rounded-md" wire:model="categoria">
                <option value="0">Categoria</option>
                @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                @endforeach
            </select>
        </div>

        <!-- Botón Exportar -->
        <div class="mt-1 flex space-x-3 items-center">
            <button wire:click="export"
                class="bg-indigo-600 hover:bg-indigo-800 transition-colors font-bold text-white text-sm px-5 py-2 rounded-lg uppercase cursor-pointer flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path
                        d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                </svg>
                Descargar
            </button>
        </div>
    </div>
</div>