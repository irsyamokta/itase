@props(['title', 'route', 'events'])

<div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4 py-5 px-5">
    <h1 class="text-xl font-bold text-dark">{{ $title }}</h1>
    <div class="flex items-center gap-2">
        <div class="relative">
            <form action="{{ route($route) }}" method="GET" class="max-w-sm mx-auto">
                <select id="countries" name="event"
                    class="border text-gray-900 text-sm border-gray-300 rounded-lg w-60 bg-gray-50 focus:ring-accent focus:border-accent block p-2"
                    onchange="this.form.submit()">
                    <option selected>{{ request('event') ?? 'Pilih Lomba' }}</option>
                    @foreach ($events as $event)
                        @if ($event->event_name != request('event'))
                            <!-- Pastikan opsi yang dipilih tidak muncul -->
                            <option value="{{ $event->event_name }}">{{ $event->event_name }}</option>
                        @endif
                    @endforeach
                </select>
            </form>
        </div>
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative">
            <form action="{{ route($route) }}" method="GET">
                @csrf
                <div
                    class="absolute inset-y-0 left-0 rtl:inset-r-0 rtl:right-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input name="search" type="search" id="table-search" value="{{ request('search') }}"
                    class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-accent focus:border-accent"
                    placeholder="Cari Data..." />
            </form>
        </div>
    </div>
</div>
