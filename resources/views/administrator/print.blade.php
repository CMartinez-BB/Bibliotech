<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Imprimir reporte') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <h2 class="mb-10 text-center text-sm mt-10 font-bold uppercase">{{ '¡Bienvenido ' . Auth::user()->name .' seleccione que tipo de reporte desea imprimir'}}</h2>

                <div class="md:flex md:justify-center p-5 text-2xl">
                    <livewire:generar-pdf/>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
