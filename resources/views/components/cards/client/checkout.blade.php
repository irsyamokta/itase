@props(['title', 'price', 'banner', 'phone', 'button', 'readonly', 'snapToken'])

<div class="space-y-6">
    <div class="p-6 bg-white rounded-md shadow-md border-2 border-accent">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">{{ $title }}</h2>
        <div class="grid grid-cols-1 md:grid-cols-6 lg:grid-cols-10 gap-6">
            <!-- Foto Placeholder dengan Preview -->
            <div class="items-center gap-2">
                <label for="imageUpload-leader">
                    <div id="profile-preview-leader"
                        class=" bg-gray-200 rounded-md flex items-center justify-center overflow-hidden border-2 border-gray-400 hover:border-purple-500">
                        <img src="{{ asset('storage/' . $banner) }}" alt="Preview" class="w-full h-full object-cover">
                    </div>
                </label>
            </div>
            <!-- Input Fields -->
            <div class="md:col-span-7 lg:col-span-9 space-y-4">
                <input type="text" placeholder="Nama Lengkap" value="{{ Auth::user()->name }}" readonly
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 text-primary" />
                <input type="email" placeholder="Email" value="{{ Auth::user()->email }}" readonly
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 text-primary" />
                <input type="number" placeholder="Nomor Handphone" name="phone" value="{{ $phone ?? '' }}"
                    {{ $readonly ? 'readonly' : '' }} required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 text-primary" />
                <div class="flex gap-2">
                    <button
                        class="w-full px-4 py-2 border border-primary rounded-md focus:outline-none text-primary cursor-default">
                        Rp{{ number_format($price, 0, ',', '.') }}
                    </button>
                    <button type="submit"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none hover:bg-secondary text-white bg-primary">
                        {{ $button }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
