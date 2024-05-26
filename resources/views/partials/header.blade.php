<header x-data="{ open: false }" class="pb-6 bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 lg:pb-0">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <!-- lg+ -->
        <nav class="flex items-center justify-between h-16 lg:h-20">
            <div class="flex-shrink-0">
                <a href="/" title="" class="flex">
                    <img class="w-auto h-8 lg:h-10"
                        src="https://cdn.rareblocks.xyz/collection/celebration/images/logo.svg" alt="" />
                </a>
            </div>

            <button type="button" x-on:click="open = ! open"
                class="inline-flex p-2 text-black transition-all duration-200 rounded-md lg:hidden focus:bg-gray-100 hover:bg-gray-100">
                <!-- Menu open: "hidden", Menu closed: "block" -->
                <svg class="block w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16" />
                </svg>

                <!-- Menu open: "block", Menu closed: "hidden" -->
                <svg class="hidden w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            @auth
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex ms-0 me-auto">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-nav-link>
                <x-nav-link :href="route('projects')" :active="request()->routeIs('projects')">
                    {{ __('Projects') }}
                </x-nav-link>
            </div>
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <div class="relative" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
                        <div @click="open = ! open">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                <div>{{Auth::user()->name}}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </button>
                        </div>

                        <div x-show="open" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                            class="absolute z-50 mt-2 w-48 rounded-md shadow-lg ltr:origin-top-right rtl:origin-top-left end-0"
                            style="display: none;" @click="open = false">
                            <div class="rounded-md ring-1 ring-black ring-opacity-5 py-1 bg-white dark:bg-gray-700">
                                <a class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition duration-150 ease-in-out"
                                    href="http://task-managment.test/profile">Profile</a>

                                <!-- Authentication -->
                                <form method="POST" action="http://task-managment.test/logout">
                                    @csrf
                                    <a class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition duration-150 ease-in-out"
                                        href="http://task-managment.test/logout"
                                        onclick="event.preventDefault();
                                                        this.closest('form').submit();">Log
                                        Out</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                @if (Route::current()->getName() == 'register')
                    <a href="{{ route('login') }}" title=""
                        class="items-center justify-center hidden px-3 py-2 ml-10 text-base font-semibold text-white transition-all duration-200 bg-blue-400 border border-transparent rounded-md lg:inline-flex hover:bg-blue-400 focus:bg-blue-500"
                        role="button">Login</a>
                @elseif(Route::current()->getName() == 'login')
                    <a href="{{ route('register') }}" title=""
                        class="items-center justify-center hidden px-3 py-2 ml-10 text-base font-semibold text-white transition-all duration-200 bg-blue-400 border border-transparent rounded-md lg:inline-flex hover:bg-blue-400 focus:bg-blue-500"
                        role="button">Register</a>
                @else
                    <a href="{{ route('login') }}" title=""
                        class="items-center justify-center hidden px-3 py-2 ml-10 text-base font-semibold text-white transition-all ms-auto me-5 duration-200 bg-blue-400 border border-transparent rounded-md lg:inline-flex hover:bg-blue-400 focus:bg-blue-500"
                        role="button">Login</a>
                    <a href="{{ route('register') }}" title=""
                        class="items-center justify-center hidden px-3 py-2 ml-10 text-base font-semibold text-white transition-all duration-200 bg-blue-400 border border-transparent rounded-md lg:inline-flex hover:bg-blue-400 focus:bg-blue-500"
                        role="button">Register</a>
                @endif
            @endauth
        </nav>

        <!-- xs to lg -->
        <nav class="pt-4 pb-6 bg-white border border-gray-200 rounded-md shadow-md lg:hidden"
            x-bind:class="!open ? 'hidden' : ''">
            <div class="flow-root">
                <div class="flex flex-col px-6 -my-2 space-y-1 justify-end">
                    <a href="#" title=""
                        class="inline-flex py-2 text-base font-medium text-black transition-all duration-200 hover:text-blue-600 focus:text-blue-600">
                        Features </a>

                    <a href="#" title=""
                        class="inline-flex py-2 text-base font-medium text-black transition-all duration-200 hover:text-blue-600 focus:text-blue-600">
                        Solutions </a>

                    <a href="#" title=""
                        class="inline-flex py-2 text-base font-medium text-black transition-all duration-200 hover:text-blue-600 focus:text-blue-600">
                        Resources </a>

                    <a href="#" title=""
                        class="inline-flex py-2 text-base font-medium text-black transition-all duration-200 hover:text-blue-600 focus:text-blue-600">
                        Pricing </a>
                    @auth
                        <a href="/dashboard" title="dashboard"
                            class="inline-flex py-2 text-base font-medium text-black transition-all duration-200 hover:text-blue-600 focus:text-blue-600">
                            Dashboard </a>
                    @else
                        <a href="{{ route('register') }}" title=""
                            class="inline-flex py-2 text-base font-medium text-black transition-all duration-200 hover:text-blue-600 focus:text-blue-600">
                            Register </a>
                        <a href="{{ route('login') }}" title=""
                            class="inline-flex py-2 text-base font-medium text-black transition-all duration-200 hover:text-blue-600 focus:text-blue-600">
                            Login </a>

                    @endauth
                </div>
            </div>
        </nav>
    </div>
</header>
