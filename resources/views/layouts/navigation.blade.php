<nav x-data="{ open: false }" class="bg-indigo-700 border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="mt-3 mb-3">
                        <x-application-logo class="block h-9 w-auto fill-current text-white" />
                        <h2 class="text-white">ITSNCG</h2>
                    </a>
                </div>

                <!-- Navigation Links -->
                @auth
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    @if (Auth::user()->rol === 1)
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('General') }}
                    </x-nav-link>
                    {{-- Books and settigns --}}
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center px-1 pt-1 border border-transparent text-sm leading-4 font-medium rounded-md text-white   focus:outline-none transition ease-in-out duration-150">
                                    <div>Inventario</div>

                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('dashboard.show')"
                                    :active="request()->routeIs('dashboard.show')">
                                    {{ __('Libros') }}
                                </x-dropdown-link>

                                {{-- Print reports --}}
                                <x-dropdown-link :href="route('dashboard.create')"
                                    :active="request()->routeIs('dashboard.create')">
                                    {{ __('Agregar') }}
                                </x-dropdown-link>

                                <x-dropdown-link :href="route('dashboard.print')"
                                    :active="request()->routeIs('dashboard.print')">
                                    {{ __('Imprimir reportes') }}
                                </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    </div>

                    {{-- Loans --}}
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center px-1 pt-1 border border-transparent text-sm leading-4 font-medium rounded-md text-white focus:outline-none transition ease-in-out duration-150">
                                    <div>Gestión de préstamos</div>

                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('loans.index')"
                                    :active="request()->routeIs('loans.index')">
                                    {{ __('Préstamos') }}
                                </x-dropdown-link>

                                <x-dropdown-link :href="route('loans.create')"
                                    :active="request()->routeIs('loans.create')">
                                    {{ __('Agregar') }}
                                </x-dropdown-link>

                                <x-dropdown-link :href="route('loans.show')" :active="request()->routeIs('loans.show')">
                                    {{ __('Más información') }}
                                </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    </div>

                    @endif

                    @if (Auth::user()->rol === 2)
                    <x-nav-link :href="route('admin.index')" :active="request()->routeIs('dashboard')">
                        {{ __('General') }}
                    </x-nav-link>

                    @endif
                </div>
                @endauth

                @guest
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link href="#categorias">
                        {{ __('Categorías') }}
                    </x-nav-link>
                </div>
                @endguest
            </div>

            <!-- Settings Dropdown -->

            <div class="hidden space-x-8 sm:flex sm:items-center sm:ml-6">
                @auth
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <div class="flex items-center">
                            @if (Auth::user()->image)
                            <img src="{{ asset('storage/users-profile/' . Auth::user()->imagen) }}"
                                class="w-10 h-10 object-cover object-center rounded-full">
                            @endif
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </div>
                    </x-slot>

                    <x-slot name="content">
                        @if (Auth::user()->rol === 2)
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        @endif

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                {{ __('Salir') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
                @endauth
            </div>

            @guest
            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                <x-nav-link :href="route('login')">
                    {{ __('Iniciar sesión') }}
                </x-nav-link>
            </div>
            @endguest

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-indigo-100 focus:outline-none focus:bg-indigo-200 focus:text-gray-500transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        @guest
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')">
                {{ __('Iniciar sesión') }}
            </x-responsive-nav-link>
        </div>
        @endguest
        @auth
        <div class="pb-3 space-y-1 bg-white">
            @if (Auth::user()->rol === 1)
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('General') }}
            </x-responsive-nav-link>
            <div x-data="{ open: false }" class="sm:hidden">
                <button @click="open = !open" class="flex w-full items-center pl-3 pr-4 py-2 border-l-4 border-transparent text-left text-base font-medium text-gray-600
                    dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200 hover:bg-gray-50 
                    hover:border-gray-300 focus:outline-none focus:text-gray-800 dark:focus:text-gray-200
                    focus:bg-gray-50  focus:border-gray-300  transition ease-in-out duration-150">
                    <div>Gestión de Libros</div>
                    <div class="ml-1 flex items-center">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </button>
                <div x-show="open" @click.away="open = false">
                    <x-responsive-nav-link :href="route('dashboard.show')"
                        :active="request()->routeIs('dashboard.show')">
                        {{ __('Libros') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('dashboard.create')"
                        :active="request()->routeIs('dashboard.create')">
                        {{ __('Agregar') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('dashboard.print')"
                        :active="request()->routeIs('dashboard.print')">
                        {{ __('Reportes') }}
                    </x-responsive-nav-link>
                </div>
            </div>

            <div x-data="{ open: false }" class="sm:hidden">
                <button @click="open = !open" class="flex w-full items-center pl-3 pr-4 py-2 border-l-4 border-transparent text-left text-base font-medium text-gray-600
                    dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200 hover:bg-gray-50 
                    hover:border-gray-300 focus:outline-none focus:text-gray-800 dark:focus:text-gray-200
                    focus:bg-gray-50  focus:border-gray-300  transition ease-in-out duration-150">
                    <div>Gestión de préstamos</div>
                    <div class="ml-1 flex items-center">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </button>
                <div x-show="open" @click.away="open = false">
                    <x-responsive-nav-link :href="route('loans.index')" :active="request()->routeIs('loans.index')">
                        {{ __('Préstamos') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('loans.create')" :active="request()->routeIs('loans.create')">
                        {{ __('Agregar') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('loans.create')" :active="request()->routeIs('loans.show')">
                        {{ __('Más información') }}
                    </x-responsive-nav-link>
                </div>
            </div>

            @endif

            @if (Auth::user()->rol === 2)
            <x-responsive-nav-link :href="route('admin.index')" :active="request()->routeIs('dashboard')">
                {{ __('General') }}
            </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t bg-white border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                @if (Auth::user()->rol === 2)
                <x-responsive-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                    {{ __('Perfil') }}
                </x-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                            this.closest('form').submit();">
                        {{ __('Salir') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
        @endauth
    </div>
</nav>