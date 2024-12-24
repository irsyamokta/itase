<section id="home" class="relative flex flex-col-reverse lg:flex-row justify-end lg:justify-center items-center h-[100vh] lg:h-auto overflow-hidden lg:px-12">
    <div class="px-6 w-full max-w-screen-xl py-30 md:py-40 lg:py-56 text-center">
        <h1 class="md:mb-6 text-2xl font-bold tracking-wide text-white md:text-4xl">ITASE 6.0</h1>
        <h1 class="md:mb-4 text-3xl font-semibold tracking-wide text-white lg:px-12 md:text-6xl 2xl:text-7xl">Exploring the Boundaries of Digital Transformation</h1>
        <p class="text-md md:text-lg font-regular mt-5 lg:mt-10 md:px-10 lg:px-70 text-white">Mendorong Perubahan, Menjelajahi Teknologi, dan Melampaui Batas dalam Transformasi Digital Menuju Dunia yang Lebih Cerdas</p>
        <div class="mt-10">
            <a href="{{ route('register') }}" class="mr-1">
                <button type="button"
                    class="text-white button-gradient font-medium rounded-lg text-sm px-5 py-3 text-center">Dafatr Sekarang</button>
            </a>
            <a href="">
                <button type="button"
                    class="text-white border border-2 border-white font-medium rounded-lg text-sm px-5 py-3 text-center">Guidebook</button>
            </a>
        </div>
    </div>
    <div class="absolute bottom-0 lg:-bottom-12 lg:-left-80 -z-10">
        <img src="{{ asset('assets/img/img-robot-1.png') }}" alt="Hero Image" class="hidden lg:block lg:w-[40rem]">
        <img src="{{ asset('assets/img/img-robot-2.png') }}" alt="Hero Image" class="lg:hidden w-[15rem] md:w-[30rem]">
    </div>
</section>