@props(['participants', 'tim'])

<!-- Tim Header -->
<div class="p-6 bg-white rounded-md shadow-md border-2 border-accent mb-5">
    <div class="grid grid-cols-1 md:grid-cols-3 items-center justify-center gap-4">
        <input type="text" placeholder="Nama tim kamu" name="tim_name" value="{{ $tim->tim_name ?? '' }}" readonly
            class="p-0 text-2xl font-bold text-black placeholder-gray-400 border-none placeholder:font-medium focus:outline-none focus:ring-0" />
        <div class="flex gap-2 md:col-span-2 justify-end">
            <a href="{{ route('team.view', Auth::user()->id) }}"
                class="bg-primary hover:bg-secondary text-white text-center px-4 py-2 rounded-md">
                Update
            </a>
            @if ($tim?->order?->payment_status == null || $tim?->order?->payment_status == 'Canceled')
                <form action="{{ route('team.destroy', Auth::user()->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit"
                        class="bg-red-800 hover:bg-red-700 text-white text-center px-4 py-2 rounded-md">
                        Hapus
                    </button>
                </form>
            @endif
        </div>
    </div>
</div>

<div class="space-y-6">
    <!-- Leader Section -->
    <div class="p-6 bg-white rounded-md shadow-md border-2 border-accent">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Leader</h2>
        <input type="text" class="hidden" name="role[]" value="Leader" />
        <div class="grid grid-cols-1 md:grid-cols-6 lg:grid-cols-10 gap-6">
            <!-- Foto Placeholder dengan Preview -->
            <div class="items-center gap-2">
                <label for="imageUpload-leader">
                    <div id="profile-preview-leader"
                        class="w-24 h-32 bg-gray-200 rounded-md flex items-center justify-center overflow-hidden border-2 border-gray-400 hover:border-purple-500">
                        <img src="{{ asset('storage/' . $participants[0]->profile) }}" alt="Preview"
                            class="w-full h-full object-cover">
                    </div>
                </label>
            </div>
            <!-- Input Fields -->
            <div class="md:col-span-7 lg:col-span-9 space-y-4">
                <input type="text" placeholder="Nama Lengkap" name="name[]"
                    value="{{ $participants[0]->name ?? '' }}" readonly
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500" />
                <input type="email" placeholder="Email" name="email[]" value="{{ $participants[0]->email ?? '' }}"
                    readonly
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500" />
                <input type="text" placeholder="Universitas" name="university[]"
                    value="{{ $participants[0]->university ?? '' }}" readonly
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500" />
                <div class="flex flex-col items-start gap-2">
                    <a href="#" class="text-purple-600 hover:underline" onclick="openPDF('{{ asset('storage/' . $participants[0]->ktm) }}')">
                        Preview
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Members Loop -->
    @foreach ($participants->skip(1) as $key => $participant) <!-- Skip leader (index 0) -->
        <div class="p-6 bg-white rounded-md shadow-md border-2 border-accent">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Member {{ $key + 1 }}</h2>
            <input type="text" class="hidden" name="role[]" value="Member" required />
            <div class="grid grid-cols-1 md:grid-cols-6 lg:grid-cols-10 gap-6">
                <!-- Foto Placeholder dengan Preview -->
                <div class="items-center gap-2">
                    <label for="imageUpload-member{{ $key + 1 }}">
                        <div id="profile-preview-member{{ $key + 1 }}"
                            class="w-24 h-32 bg-gray-200 rounded-md flex items-center justify-center overflow-hidden border-2 border-gray-400 hover:border-purple-500">
                            <img src="{{ asset('storage/' . $participant->profile) }}" alt="Preview"
                                class="w-full h-full object-cover">
                        </div>
                    </label>
                </div>
                <!-- Input Fields -->
                <div class="md:col-span-7 lg:col-span-9 space-y-4">
                    <input type="text" placeholder="Nama Lengkap" name="name[]"
                        value="{{ $participant->name ?? '' }}" readonly
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500" />
                    <input type="email" placeholder="Email" name="email[]"
                        value="{{ $participant->email ?? '' }}" readonly
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500" />
                    <input type="text" placeholder="Universitas" name="university[]"
                        value="{{ $participant->university ?? '' }}" readonly
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500" />
                    <div class="flex flex-col items-start gap-2">
                        <a href="#" class="text-purple-600 hover:underline" onclick="openPDF('{{ asset('storage/' . $participant->ktm) }}')">
                            Preview
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
