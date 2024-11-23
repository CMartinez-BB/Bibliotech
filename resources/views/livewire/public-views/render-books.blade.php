<div class="p-5 lg:px-48 md:py-24 space-y-10">
    @if($booksCategory->count() > 0)
    @foreach ( $booksCategory as $book)
    <div class="w-full bg-white rounded-md shadow-md p-5">
        <div class="flex flex-row">
            <div class="w-1/4 mr-16">
                <img src="{{ asset('storage/libros/' . $book->imagen) }}" alt="Libro de {{ $book->titulo }}"
                    class="w-full" />
            </div>

            <div class="w-1/2 mt-10">
                <section class="flex items-center gap-3">
                    <div>
                        <h1 class="text-xl capitalize font-bold">{{ $book->titulo }}</h1>
                        <p class="text-md text-gray-600">{{ json_decode($book->autores)[0]->autor }}</p>
                    </div>

                    <div class="flex items-center gap-2 capitalize relative group mb-5">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                        </svg>



                        <!-- Tooltip -->
                        <div
                            class="absolute left-1/2 transform -translate-x-1/2 bottom-10 bg-gray-800 text-white text-sm rounded px-2 py-1 opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                            Estante de {{ $book->estante->estante }}
                        </div>
                    </div>
                </section>

                <section class="mt-10">
                    @if ($book->cantidad > 200)
                    <span
                        class="inline-flex items-center gap-1 rounded-full bg-sea-100 px-2 mt-2 md:mt-0 py-1 text-xs capitalize font-semibold text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.182 15.182a4.5 4.5 0 0 1-6.364 0M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Z" />
                        </svg>

                        {{ $book->cantidad}} disponibles
                    </span>
                    @else
                    <span
                        class="inline-flex items-center gap-1 rounded-full bg-red-100 px-2 mt-2 md:mt-0 py-1 text-xs capitalize font-semibold text-red-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.182 16.318A4.486 4.486 0 0 0 12.016 15a4.486 4.486 0 0 0-3.198 1.318M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Z" />
                        </svg>

                        {{ $book->cantidad}} disponibles
                    </span>
                    @endif
                    <p class="mt-2">
                        {{ $book->descripcion }}
                    </p>
                </section>

                <div class="mt-5 flex justify-end">
                    <a href="{{ route('show.books', $book->id) }}"
                        class="rounded-md py-2 shadow px-4 bg-indigo-700 text-white">
                        Ver Libro
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <div class="mt-10">
        {{ $booksCategory->links() }}
    </div>
    @else
    <h3 class="text-2xl font-bold">No hay libros disponibles</h3>
    @endif
</div>