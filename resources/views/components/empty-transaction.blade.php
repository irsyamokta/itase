@props(['img', 'title', 'link', 'button', 'hidden'])

<section id="home" class="flex justify-center h-[50vh] overflow-hidden lg:px-12">
    <div class="flex flex-col justify-center items-center">
        <img src="{{ asset('assets/img/' . $img) }}" class="w-60" alt="empty">
        <p class="text-2xl font-semibold tracking-wide text-gray-700 mt-5">{{ $title }}</p>
        @if (!$hidden)
            <a href="{{ route('team.register') }}"><button
                    class="mt-5 bg-primary hover:bg-secondary text-white px-4 py-2 rounded-md md:justify-self-end">
                    {{ $button }}
                </button>
            </a>
        @endif
    </div>
</section>
