<form class="md:w-1/2" wire:submit.prevent='crearLibro'>
    <div>
        <x-input-label for="titulo" :value="__('Título del libro')" class="uppercase" />
        <x-text-input id="titulo" class="block mt-1 w-full" type="text" wire:model="titulo" :value="old('titulo')"
            placeholder="Ej: calculo diferencial" />
        <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
    </div>

    <div class="mt-5">
        <x-input-label for="autores" :value="__('Autores *Recuerda colocar al autor principal primero')"
            class="uppercase" />
        <x-text-input id="autores" class="block mt-1 w-full" type="text" wire:model="autores" :value="old('autores')"
            placeholder="Ej: Isaac Newtoon" />
        <x-input-error :messages="$errors->get('autores')" class="mt-2" />
    </div>

    <div class="mt-5">
        <x-input-label for="edicion" :value="__('Lugar y Editorial')" class="uppercase" />
        <x-text-input id="edicion" class="block mt-1 w-full" type="text" wire:model="edicion" :value="old('edicion')"
            placeholder="Ej: Mexico: Addisson Wesley 1998" />
        <x-input-error :messages="$errors->get('edicion')" class="mt-2" />
    </div>

    <div class="mt-5 flex">
        <div class="w-1/2 mr-2">
            <x-input-label for="tomo" :value="__('Tomo')" class="uppercase" />
            <x-text-input id="tomo" class="block mt-1 w-full" type="text" wire:model="tomo" :value="old('tomo')"
                placeholder="Ej: Tomo 3" />
        </div>

        <div class="w-1/2 mr-2">
            <x-input-label for="paginas" :value="__('Páginas')" class="uppercase" />
            <x-text-input id="paginas" class="block mt-1 w-full" type="text" wire:model="paginas"
                :value="old('paginas')" placeholder="Ej: 564 Páginas" />
            <x-input-error :messages="$errors->get('paginas')" class="mt-2" />
        </div>
    </div>

    <div class="mt-5 flex">
        <div class="w-1/2 mr-2">
            <x-input-label for="categoria" :value="__('categoria')" class="uppercase" />
            <select id="categoria" class="rounded-md  mt-1 w-full border-gray-300" type="text" wire:model="categoria"
                :value="old('categoria')">
                <option> ---Selección--- </option>
                @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('categoria')" class="mt-2" />
        </div>
        {{-- Start estantes --}}
        <div class="w-1/2">
            <x-input-label for="estante" :value="__('Estante')" class="uppercase" />
            <select id="estante" class="rounded-md mt-1 w-full border-gray-300" type="text" wire:model="estante"
                :value="old('estante')">
                <option> ---Selección--- </option>
                @foreach ($estantes as $estante)
                <option value="{{ $estante->id }}">{{ $estante->estante }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('categoría')" class="mt-2" />
        </div>
    </div>

    <div class="mt-5 flex">
        <div class="w-1/2 mr-2">
            <x-input-label for="fecha" :value="__('fecha')" class="uppercase" />
            <x-text-input id="fecha" class="block mt-1 w-full" type="date" wire:model="fecha" />
            <x-input-error :messages="$errors->get('fecha')" class="mt-2" />
        </div>

        <div class="w-1/2">
            <x-input-label for="cantidad" :value="__('cantidad')" class="uppercase" />
            <x-text-input id="cantidad" class="block mt-1 w-full" type="text" wire:model="cantidad"
                :value="old('cantidad')" placeholder="Ej: calculo diferencial" />
            <x-input-error :messages="$errors->get('cantidad')" class="mt-2" />
        </div>
    </div>

    <div class="mt-5">
        <x-input-label for="isbn" :value="__('isbn')" class="uppercase" />
        <x-text-input id="isbn" class="block mt-1 w-full" type="text" wire:model="isbn" :value="old('isbn')"
            placeholder="Ej: 12345BB" />
        <x-input-error :messages="$errors->get('isbn')" class="mt-2" />
    </div>

    <div class="mt-5">
        <x-input-label for="descripcion" :value="__('descripción')" class="uppercase" />
        <textarea wire:model="descripcion" class="rounded-md mt-1 w-full h-72 border-gray-300"></textarea>
        <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
    </div>

    <div class="mt-5">
        <div class="mt-5">
            <x-input-label for="imagen" :value="__('portada')" class="uppercase" />
            <x-text-input id="imagen" class="block text-sm mt-1 w-full" type="file" wire:model="imagen"
                accept="image/*" />

            {{-- Preview image --}}
            <div class="my-5 w-80">
                @if ($imagen)
                Imagen: <img src="{{ $imagen->temporaryUrl() }}">
                @endif
            </div>

            <x-input-error :messages="$errors->get('imagen')" class="mt-2" />
        </div>
    </div>

    <x-primary-button class="mt-5">
        Agregar libro
    </x-primary-button>
</form>