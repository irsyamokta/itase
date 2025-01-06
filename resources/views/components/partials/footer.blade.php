<footer class="bg-primary text-white">
    <div class="mx-auto w-full p-4 py-6 lg:py-8">
        <div class="md:flex md:justify-between">
            <div class="mb-6 md:mb-0">
                <a href="/" class="flex items-center">
                    <span class="self-center text-2xl sm:text-3xl font-semibold whitespace-nowrap">ITASE 6.0</span>
                </a>
                <div class="flex gap-2 mt-3">
                    <img class="w-8 sm:w-12" src="{{ asset('assets/logo/logo-telkom.png') }}" alt="logo telkom">
                    <img class="w-8 sm:w-12" src="{{ asset('assets/logo/logo-si.png') }}" alt="logo sistem informasi">
                    <img class="w-8 sm:w-12" src="{{ asset('assets/logo/logo-hmsi.png') }}" alt="logo hmsi">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-white uppercase">Navigasi</h2>
                    <ul class="text-gray-300 font-medium">
                        <li class="mb-4">
                            <a href="#home" class="hover:underline">Beranda</a>
                        </li>
                        <li class="mb-4">
                            <a href="#about" class="hover:underline">Tentang</a>
                        </li>
                        <li class="mb-4">
                            <a href="#event" class="hover:underline">Lomba</a>
                        </li>
                        <li>
                            <a href="#timeline" class="hover:underline">Timeline</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-white uppercase">Ikuti Kami</h2>
                    <ul class="text-gray-300 font-medium">
                        <li class="mb-4">
                            <a href="https://www.instagram.com/si_ittelkom" target="_blank" class="hover:underline ">Sistem Informasi</a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/diesnatalies_si/" target="_blank" class="hover:underline">Diesnat SI</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-white uppercase">Kontak</h2>
                    <ul class="text-gray-300 font-medium">
                        <li class="mb-4">
                            <a href="#" class="hover:underline">John Doe</a>
                        </li>
                        <li>
                            <a href="#" class="hover:underline">Albert Doe</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto lg:my-8" />
        <div class="flex justify-center items-center">
            <span class="text-sm text-gray-500 sm:text-center">© {{ date('Y') }} <a href="/"
                    class="hover:underline">ITASE™</a>. All Rights Reserved.
            </span>
        </div>
    </div>
</footer>
