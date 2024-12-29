@props(['id', 'event_name', 'description', 'price', 'banner', 'order'])

<div class="grid grid-cols-1 gap-6 mt-5">
    <div
        class="flex flex-col md:flex-row bg-white shadow-md rounded-lg border-2 border-secondary p-6 items-center gap-6">
        <div class="flex-shrink-0">
            <img src="{{ asset('storage/' . $banner) }}" alt="UI/UX Design" class="w-32 h-32 rounded-lg">
        </div>
        <div class="flex flex-col flex-grow">
            <h3 class="text-2xl font-bold text-gray-800 uppercase">{{ $event_name }}</h3>
            <p class="text-sm text-gray-600 mt-2">
                {{ $description }}
            </p>
            <div class="flex items-center justify-between gap-2 mt-4">
                <span class="text-lg font-bold text-gray-800 border-2 border-dark px-6 py-1 rounded-md">
                    Rp{{ number_format($price, 0, '.', '.') }}
                </span>
                @if (auth()->user()->role == 'admin')
                    <div class="flex gap-2 md:col-span-2 justify-end">
                        <a href="{{ route('event.view', $id) }}">
                            <button class="bg-primary text-white font-medium rounded-lg px-15 py-2 hover:bg-secondary">
                                Edit
                            </button>
                        </a>
                        <form action="{{ route('event.destroy', $id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit"
                                class="bg-red-800 hover:bg-red-700 text-white text-center px-4 py-2 rounded-md">
                                Hapus
                            </button>
                        </form>
                    </div>
                @else
                    <a href="{{ route('event.payment', $id) }}">
                        @if ($order?->payment_status == 'Pending' || $order?->payment_status == 'Success')
                            <button class="bg-slate-400 text-white font-medium rounded-lg px-15 py-2" disabled>
                                Daftar
                            </button>
                        @else
                            <button class="bg-primary text-white font-medium rounded-lg px-15 py-2 hover:bg-secondary">
                                Daftar
                            </button>
                        @endif
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
