<div>
    editanto libros

    <div>
        <x-input-label for="titulo" :value="__('Titulo del libro')" class="uppercase" />
        <x-text-input id="titulo" class="block mt-1 w-full" type="text" wire:model="titulo" :value="old('titulo')"
            placeholder="Ej: calculo diferencial" />
        <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
    </div>
</div>