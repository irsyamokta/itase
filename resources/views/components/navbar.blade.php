<nav class="bg-dark fixed w-full z-20 top-0 start-0">
    <div class="flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <p class="text-3xl font-bold text-gradient">ITASE 6.0</p>
        </a>
        <div class="flex md:gap-2 md:order-2 space-x-1 md:space-x-0 rtl:space-x-reverse">
            <a href="{{ route('login') }}">
                <button type="button"
                    class="text-white button-gradient border-2 border-primary font-medium rounded-lg text-sm px-4 py-2 text-center">Masuk</button>
            </a>
            <button data-collapse-toggle="navbar-sticky" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg md:hidden hover:bg-secondary focus:outline-none focus:ring-2 focus:ring-gray-200"
                aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul
                class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent">
                <li>
                    <a href="#home"
                        class="block py-2 px-3 text-primary hover:bg-gray-100 rounded md:hover:bg-transparent md:hover:text-secondary md:text-white md:p-0"
                        aria-current="page">Beranda</a>
                </li>
                <li>
                    <a href="#about"
                        class="block py-2 px-3 text-primary rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-secondary md:text-white md:p-0">Tentang</a>
                </li>
                <li>
                    <a href="#event"
                        class="block py-2 px-3 text-primary rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-secondary md:text-white  md:p-0">Lomba</a>
                </li>
                <li>
                    <a href="#timeline"
                        class="block py-2 px-3 text-primary rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-secondary md:text-white md:p-0">Timeline</a>
                </li>
                <li class="md:hidden block">
                    <a href="{{ route('register') }}"
                        class="block text-center py-2 px-3 text-white rounded button-gradient md:hover:bg-transparent md:hover:text-secondary md:text-white md:p-0">Daftar Sekarang</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
