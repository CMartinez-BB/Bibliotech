<x-app-layout>
    <div class="py-20 md:py-24 bg-white overflow-hidden">
        <div class="max-w-xl mx-auto px-4 sm:px-6 lg:px-8 lg:my-auto lg:max-w-7xl flex flex-row-reverse mb-32">
            <div class="hidden md:w-full md:flex justify-center items-center ">
                <div class="relative">
                    <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg"
                        class="absolute inset-0 w-full h-full z-10">
                        <path fill="#8A3FFC"
                            d="M36.5,-49.6C47.4,-42.3,56.4,-31.7,65.4,-18C74.4,-4.2,83.4,12.9,80,26.8C76.6,40.7,60.9,51.5,45.5,62.4C30.1,73.4,15.1,84.6,-0.2,85C-15.6,85.3,-31.1,74.8,-37.8,61C-44.5,47.2,-42.3,30.1,-46.2,15.6C-50.1,1.1,-60,-10.8,-57,-18.1C-54,-25.3,-38.1,-27.9,-26.5,-35C-14.8,-42.1,-7.4,-53.7,2.7,-57.4C12.8,-61.1,25.6,-56.9,36.5,-49.6Z"
                            transform="translate(100 100)" />
                    </svg>
                    <img src="{{ asset('imgs/muchacha-sonriendo-isc.webp') }}"
                        alt="Imagend ejemplo de una muchacha sonriendo" class="relative z-20" />
                </div>
            </div>

            <div class="relative w-full md:w-3/4">
                <h2 class="uppercase text-4xl leading-8 font-extrabold tracking-tight sm:text-6xl">hola, somos la nueva
                    biblioteca virtual</span></h2>
                <p class="mt-4 max-w-3xl mx-auto text-sm text-gray-500">La nueva plataforma del ITSNCG que conecta a
                    toda la comunidad escolar</p>

                {{-- Barra de busqueda --}}
                <div class="relative inset-0 bg-opacity-75 z-10 flex items-center space-x-2 md:space-x-4">
                    <div class="flex mt-4 space-x-3 lg:mt-6">
                        <a type="submit" href="{{ route('search.books') }}"
                            class="inline-flex items-center py-2 px-4 text-sm font-medium text-center text-white bg-indigo-700 rounded-lg hover:bg-inidgo-800 focus:ring-4 focus:ring-blue-300 uppercase">Iniciar
                            búsqueda</a>
                    </div>
                    <div class="flex mt-4 space-x-3 lg:mt-6">
                        <a type="submit" href="{{ route('loans.status') }}"
                            class="inline-flex items-center py-2 px-4 text-sm font-medium text-center text-indigo-700 bg-white rounded-lg border border-gray-300 focus:ring-4 focus:ring-gray-300 uppercase">Verificar
                            préstamo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white overflow-hidden md:py-24">
        <h3 class="px-5 md:px-0 text-center font-bold text-3xl md:text-5xl">Nos preocupamos por una mejor navegación
        </h3>
        <p class="px-5 md:px-0 text-lg text-center font-semibold capitalize text-indigo-700 mt-2">Por eso hemos
            incluido</p>
        <div
            class="mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl grid grid-row-3 lg:grid-cols-3 md:gap-10 mt-16 items-center mb-16">
            <div class="col-span-1 py-5 md:py-0 text-center md:text-start">
                <i class="fa-solid fa-mobile mr-3 text-indigo-700 text-4xl items-center"></i>
                <p class="text-lg font-bold capitalize">
                    Multiplataforma
                </p>
                <span class="text-gray-400">Con nuestra plataforma, puedes acceder a la biblioteca desde tu celular y
                    disfrutar de una experiencia de usuario óptima en cualquier dispositivo</span>
            </div>
            <div class="col-span-1 py-5 md:py-0 text-center md:text-start">
                <i class="fa-brands fa-windows mr-3 text-indigo-700 text-4xl"></i>
                <p class="text-xl font-bold capitalize">
                    Mejor interfaz de usuario
                </p>
                <span class="text-gray-400 ">Hemos mejorado la interfaz de usuario de nuestro gestor de biblioteca para
                    proporcionar una experiencia de usuario más intuitiva y fácil de usar.</span>
            </div>
            <div class="col-span-1 py-5 md:py-0 text-center md:text-start">
                <i class="fa-solid fa-brain mr-1 text-indigo-700 text-4xl"></i>
                <p class="text-xl font-bold capitalize">
                    Préstamos Inteligentes
                </p>
                <span class="text-gray-400">La plataforma enviará alertas automáticamente al faltar 3 días para tu plazo
                    máximo, gracias al cálculo automático de la fecha de vencimiento.</span>
            </div>
        </div>
    </div>

    <div class="w-full pt-16 relative bg-white">
        <livewire:home-libros />
    </div>

    <div class="bg-white py-24 px-4 md:px-24 flex flex-col md:flex-row md:gap-20 md:justify-between items-center">
        <div class="w-full md:w-1/3 text-center md:text-left">
            <h3 class="font-bold text-2xl capitalize">Envíanos tus dudas o sugerencias</h3>
            <p class="text-md font-semibold text-gray-500 mt-2">Estamos abiertos a cualquier sugerencia que ayude a
                mejorar la experiencia del usuario, ¡contáctanos ahora mismo!</p>
        </div>
        <div
            class="relative z-0 w-full md:w-2/3 flex flex-col md:flex-row justify-center md:justify-end items-center md:items-start py-6 md:py-0">
            <div class="relative z-0 w-full md:w-3/4">
                <input type="text" name="name"
                    class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0"
                    placeholder=" " />
                <label
                    class="absolute top-3 w-full -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Correo
                    electrónico</label>
            </div>
            <div class="mt-4 md:mt-0 md:ml-4">
                <a href="#_"
                    class="relative inline-flex items-center justify-center md:justify-start py-3 pl-4 pr-12 overflow-hidden font-semibold text-indigo-600 transition-all duration-150 ease-in-out rounded hover:pl-10 hover:pr-6 bg-gray-50 group">
                    <span
                        class="absolute bottom-0 left-0 w-full h-1 transition-all duration-150 ease-in-out bg-indigo-600 group-hover:h-full"></span>
                    <span class="absolute right-0 pr-4 duration-200 ease-out group-hover:translate-x-12">
                        <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </span>
                    <span
                        class="absolute left-0 pl-2.5 -translate-x-12 group-hover:translate-x-0 ease-out duration-200">
                        <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </span>
                    <span
                        class="relative w-full text-left transition-colors duration-200 ease-in-out group-hover:text-white">Enviar</span>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>