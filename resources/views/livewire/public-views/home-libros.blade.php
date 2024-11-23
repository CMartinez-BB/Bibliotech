<div>
    {{-- Our collection --}}
    <div class="mt-20 overflow-hidden lg:py-5 bg-white">
        <h3 class="uppercase text-4xl font-bold px-5 w-full md:px-40 text-indigo-700">conoce nuestra colleción</h3>
        <div class="md:flex md:justify-center p-5 text-2xl">
            <div class="w-full">
                <div class="flex flex-wrap justify-center">
                    @foreach ($libros as $libro)
                    <div class="w-56 p-2 mt-10">
                        <article class="overflow-hidden">
                            <div class="max-w-md p-3">
                                <img alt="Imagen {{ $libro->titulo }}"
                                    class="h-40 mx-auto object-contain object-center rounded-md"
                                    src="{{ asset('storage/libros/' . $libro->imagen) }}" />
                            </div>
                            <div class="p-4 md:p-0 h-16">
                                <h3 class="mt-1 text-base text-gray-900 capitalize md:mb-1">
                                    <i class="fa-solid fa-pen-nib text-sm"></i>
                                    {{ Str::limit($libro->titulo, 25) }}
                                </h3>
                            </div>
                            <time class="block text-xs text-gray-500 md:mb-3 px-4 md:px-0 mt-3">
                                <i class="fa-solid fa-calendar-days text-gray-900 text-sm"></i>
                                {{ $libro->created_at->format('d/m/Y') }}
                            </time>
                            <a href="{{ route('show.books', $libro->id) }}"
                                class="inline-block text-gray-500 text-xs px-4 md:px-0 hover:text-indigo-800">
                                Mas información <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </article>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- preview Books--}}
    <div class="py-10 bg-gray-100" id="categorias">
        <h3 class="text-3xl uppercase font-bold text-center">Selecciona tu categoría</h3>
        {{-- Inventory --}}
        <livewire:books-category />
    </div>
</div>