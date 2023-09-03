<div class="w-full bg-lime-500 fixed z-[10]">
    <nav class="w-[90%] mx-auto p-4 flex justify-between items-center">
        <img src="{{ asset('images/happy-recipes.png') }}" class="h-[50px]" alt="">
        <ul class="flex font-bold space-x-16 text-gray-100 text-lg">
            <li>
                <a href="/">Home</a>
            </li>
            <li>
                <a href="/favorites">Favorites</a>
            </li>
            @guest
            <li>
                <a href="{{ route('login') }}">Log In</a>
            </li>
            <li>
                <a href="{{ route('register') }}">Register</a>
            </li>
            @endguest
            @auth
            <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-1.5 border border-transparent text-lg font-bold leading-4 font-medium rounded-md text-white bg-lime-600 hover:text-white focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            <!-- <p>{{ Auth::user()->name }}</p> -->
            @endauth
        </ul>
    </nav>
</div>