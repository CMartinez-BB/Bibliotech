<div>
    <span class="text-xl font-bold">Datos del prestamista y material didáctico</span>
    <hr class="bg-indigo-800 mt-3">

    {{-- Search ISB --}}
    <div class="mt-10">
        <livewire:filtrar-isbn />
    </div>

    {{-- form for librarian--}}
    @if(!empty($isbn) && $isbn->count() > 0)
    <form class="flex flex-col md:flex-row py-6 gap-10">
        <div class="block-primary w-full flex flex-col gap-5">
            {{-- nombre --}}
            <div class="relative z-0 md:w-full">
                <x-text-input id="user_biblio" wire:model="user_biblio"
                    class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0 rounded-none"
                    placeholder=" " :value="$isbn[0]->user_biblio" />
                <x-input-label
                    class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500"
                    :value="__('Nombre del bibliotecario')" />
                @error('user_biblio') <span class="error text-red-500">{{ $message }}</span> @enderror
            </div>
            {{-- folio --}}
            <div class="relative z-0 md:w-full">
                <div class="relative z-0 md:w-full">
                    <x-text-input id="folio" wire:model="folio"
                        class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0 rounded-none"
                        placeholder=" " :value="$isbn[0]->folio" />
                    <x-input-label
                        class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500"
                        :value="__('No. Folio')" />
                    @error('folio') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>
            {{-- date --}}
            <div class="relative z-0 md:w-full">
                <x-text-input id="fecha_inicial" wire:model="fecha_inicial"
                    class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0 rounded-none"
                    placeholder=" " :value="$isbn[0]->fecha_inicial" />
                <x-input-label
                    class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500"
                    :value="__('Fecha')" />
                @error('fecha_inicial') <span class="error text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="block-secondary w-full flex flex-col gap-5">
            {{-- Name Book --}}
            <div class="relative z-0 w-full">
                <x-text-input id="titulo" wire:model="titulo"
                    class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0 rounded-none"
                    placeholder=" " :value="$isbn[0]->titulo" />
                <x-input-label
                    class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500"
                    :value="__('Titulo')" />
                @error('titulo') <span class="error text-red-500">{{ $message }}</span> @enderror
            </div>
            {{-- Autores --}}
            <div class="relative z-0 w-full">
                <x-text-input id="autores" wire:model="autores"
                    class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0 rounded-none"
                    placeholder=" " :value="$isbn[0]->autores" />
                <x-input-label
                    class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500"
                    :value="__('Autor || Autores')" />
                @error('autores') <span class="error text-red-500">{{ $message }}</span> @enderror
            </div>
            {{-- isbn--}}
            <div class="relative z-0 w-full">
                <x-text-input id="identificacion" wire:model="identificacion"
                    class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0 rounded-none"
                    placeholder=" " :value="$isbn[0]->identificacion" />
                <x-input-label
                    class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500"
                    :value="__('isbn')" />
                @error('identificacion') <span class="error text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="block-trhee w-full flex flex-col gap-5">
            {{-- Tipo de prestamo --}}
            <div class="relative z-0 w-full">
                <select id="tipo_prestamo" wire:change="type_loan($event.target.value)"
                    class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0 rounded-none"
                    placeholder=" ">
                    <option value=" ">Tipo préstamo</option>
                    @foreach ($tipo_prestamos as $tipo)
                    <option value="{{ $tipo->id }}" class="rounded-none">{{ $tipo->nombre }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Renovacion --}}
            <div class="relative z-0 w-full">
                <x-text-input id="fecha_limite" wire:model="fecha_limite"
                    class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0 rounded-none"
                    placeholder=" " :value="$isbn[0]->fecha_limite" />
                <x-input-label
                    class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500"
                    :value="__('Fecha de renovacion')" />
                @error('fecha_limite') <span class="error text-red-500">{{ $message }}</span> @enderror
            </div>

            {{-- Cantidad --}}
            <div class="relative z-0 w-full">
                <x-text-input id="cantidad" wire:change="total_books($event.target.value)"
                    class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0 rounded-none"
                    placeholder=" " :value="$this->cantidad_libros" />
                <x-input-label
                    class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500"
                    :value="__('No. de Libros')" />
                @error('total_books') <span class="error text-red-500">{{ $message }}</span> @enderror
            </div>

        </div>
    </form>
    @endif
</div>