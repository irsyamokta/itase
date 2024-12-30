<form action="{{ route('event.update', $event->id) }}" method="POST" enctype="multipart/form-data" class="mx-auto">
    @csrf
    @method('patch')
    <div class="mb-5">
        @include('components.breadcrumb', [
            'links' => [
                ['url' => route('dashboard.event'), 'label' => 'Event'],
                ['url' => '', 'label' => 'Update Event'],
            ],
        ])
    </div>
    <!-- Tim Header -->
    <div class="p-6 bg-white rounded-md shadow-md border-2 border-accent mb-5">
        <div class="grid grid-cols-1 md:grid-cols-2 items-center justify-center gap-4">
            <input type="text" placeholder="Nama Event" name="event_name" value="{{ $event->event_name }}" required
                class="p-0 text-2xl font-bold text-black placeholder-gray-400 border-none placeholder:font-medium focus:outline-none focus:ring-0" />
            <button class="bg-primary hover:bg-secondary text-white px-4 py-2 rounded-md md:justify-self-end">
                Simpan
            </button>
        </div>
    </div>
    <div class="space-y-6">
        <div class="p-6 bg-white rounded-md shadow-md border-2 border-accent">
            <input type="text" class="hidden" name="role[]" value="Leader" />
            <div class="grid grid-cols-1 md:grid-cols-6 lg:grid-cols-10 gap-6">
                <!-- Foto Placeholder dengan Preview -->
                <div class="items-center gap-2">
                    <label for="imageUpload">
                        <div id="banner-preview"
                            class="bg-gray-200 rounded-md flex items-center justify-center overflow-hidden border-2 border-gray-400 hover:border-purple-500">
                            <img src="{{ asset('storage/' . $event->banner) }}" alt="Preview"
                                class="w-full h-full object-cover" id="img-preview-leader">
                        </div>
                    </label>
                    <input type="file" id="imageUpload" name="banner" accept="image/*" class="hidden"
                        onchange="previewImage('imageUpload', 'img-preview')">
                </div>
                <!-- Input Fields -->
                <div class="md:col-span-7 lg:col-span-9 space-y-4">
                    <input type="number" min="0" placeholder="Harga event" name="price" value="{{ number_format($event->price, '0', ',', '.') }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500" />
                    <textarea name="description" cols="5" rows="5"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500"
                        placeholder="Deskripsi event..." required>{{ $event->description }}</textarea>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const inputs = [{
            inputId: "imageUpload",
            previewId: "banner-preview",
        }];

        inputs.forEach(({ inputId, previewId }) => {
            const fileInput = document.getElementById(inputId);
            const imagePreview = document.getElementById(previewId);

            if (!fileInput || !imagePreview) {
                console.warn(`Element with ID ${inputId} or ${previewId} not found.`);
                return;
            }

            fileInput.addEventListener("change", (event) => {
                const file = event.target.files[0];

                if (file) {
                    if (!file.type.startsWith("image/")) {
                        alert("Harap unggah file gambar.");
                        fileInput.value = "";
                        return;
                    }

                    const maxSizeInBytes = 2 * 1024 * 1024; // 2MB
                    if (file.size > maxSizeInBytes) {
                        alert("Ukuran file maksimum adalah 2MB.");
                        fileInput.value = "";
                        return;
                    }

                    const reader = new FileReader();
                    reader.onload = (e) => {
                        imagePreview.innerHTML =
                            `<img src="${e.target.result}" alt="Preview" class="w-full h-full object-cover">`;
                    };
                    reader.readAsDataURL(file);
                } else {
                    imagePreview.innerHTML =
                        '<span class="text-sm text-gray-400">Klik untuk Unggah Banner</span>';
                }
            });
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const priceInput = document.querySelector('input[name="price"]');

        if (priceInput) {
            priceInput.addEventListener("input", (event) => {

                const value = event.target.value.replace(/\./g, "");

                if (!isNaN(value) && value !== "") {
                    const formattedValue = value.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                    event.target.value = formattedValue;
                } else {
                    event.target.value = "";
                }
            });

            priceInput.addEventListener("blur", (event) => {
                if (!event.target.value) {
                    event.target.value = "0";
                }
            });
        }
    });
</script>
