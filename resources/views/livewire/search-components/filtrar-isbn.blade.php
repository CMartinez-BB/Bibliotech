<div class="max-w-7xl mx-auto">
    <form wire:submit.prevent='leerDatosFormulario' class="flex flex-wrap justify-between items-center">
        <div class="mb-5 w-full md:w-1/3 md:mr-4">
            <label for="isbn" class="block mb-1 text-sm text-gray-500 uppercase font-bold">{{ $this->labelText
                }}</label>
            <input type="text" placeholder="{{ $this->placeholderText }}"
                class="rounded-md shadow-sm border-indigo-500 focus:border-indigo-400 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
                wire:model="isbn" id="isbn">
        </div>

        <div>
            <input type="submit"
                class="inline-flex items-center w-full px-5 py-2 mb-3 mr-1 text-sm font-bold text-white no-underline align-middle bg-indigo-600 border border-transparent border-solid rounded-md cursor-pointer select-none sm:mb-0 sm:w-auto hover:bg-indigo-700 hover:border-indigo-700 hover:text-white focus-within:bg-indigo-700 focus-within:border-blindigoue-700 text-center"
                value="Buscar" id="buscar">
        </div>
    </form>
</div>


@push('scripts')
{{-- Sweet Alert CDN --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const input = document.querySelector('#isbn');
    const btn = document.querySelector('#buscar');

    btn.addEventListener('click', () => {
        if(input.value === ''){
            Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Ocurrrio un error en su búsqueda, por favor verifique los datos!",
            });
        }
    });
</script>
@endpush