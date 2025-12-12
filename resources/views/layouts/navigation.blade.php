<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">

    <style>
        /* ===== MATCH INDEX.BLADE STYLING ===== */

        nav a[href*="dashboard"],
        nav a[href*="alumni"],
        nav a[href*="career"] {
            background: linear-gradient(135deg, #60a5fa, #3b82f6, #2563eb) !important;
            color: white !important;
            font-weight: 600 !important;
            padding: 0.75rem 1rem !important;
            border-radius: 0.75rem !important;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1),
                        0 2px 4px -1px rgba(0, 0, 0, 0.06) !important;
            transition: all 0.3s ease !important;
            display: inline-block !important;
            margin: 0.5rem 0.50rem !important;
            text-decoration: none !important;
        }

        nav a[href*="dashboard"]:hover,
        nav a[href*="alumni"]:hover,
        nav a[href*="career"]:hover {
            background: linear-gradient(135deg, #3b82f6, #2563eb, #1d4ed8) !important;
            transform: translateX(5px) scale(1.02) !important;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1),
                        0 4px 6px -2px rgba(0, 0, 0, 0.05) !important;
        }

        /* Remove logo background like index.blade */
        nav .shrink-0 img {
            background: transparent !important;
            box-shadow: none !important;
            padding: 0 !important;
            margin: 0 !important;
        }

        nav .shrink-0 a {
            background: transparent !important;
        }

        nav {
            padding-top: 1.5rem !important;
        }
    </style>

    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- LEFT: Logo + Navigation -->
            <div class="flex">

                <!-- Logo -->
                <div class="shrink-0 flex items-center pt-2">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Menu buttons -->
                <div class="hidden sm:flex items-center ms-6">
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                    <a href="{{ route('alumni.index') }}">Alumni</a>
                    <a href="{{ route('career.index') }}">Career</a>
                </div>
            </div>

            <!-- RIGHT: Profile Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 transition">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger (Mobile) -->
            <div class="flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100">
                    <svg class="h-6 w-6" viewBox="0 0 24 24" stroke="currentColor" fill="none">
                        <path :class="{'hidden': open, 'inline-flex': ! open }"
                              class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }"
                              class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('alumni.index') }}">Alumni</a>
            <a href="{{ route('career.index') }}">Career</a>
        </div>
    </div>

</nav>
