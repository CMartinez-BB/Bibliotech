<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Agregar nuevo libro') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="mb-10 text-center text-sm mt-10 font-bold uppercase">{{ '¡Bienvenido ' . Auth::user()->name
                    .' al panel de "Agregar Nuevo Libro"!. Esta sección te permite agregar nuevos libros en línea de una
                    manera fácil y sencilla.'}}</h2>

                <div class="md:flex md:justify-center p-5 text-2xl">
                    <livewire:crear-libro />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>