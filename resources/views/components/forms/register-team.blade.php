<form action="{{ route('team.store') }}" method="POST" enctype="multipart/form-data" class="mx-auto">
    @csrf
    <div class="mb-5">
        @include('components.breadcrumb', [
            'links' => [
                ['url' => route('team'), 'label' => 'Registrasi Tim'],
                ['url' => '', 'label' => 'Form Registrasi Tim'],
            ],
        ])
    </div>
    <!-- Tim Header -->
    <div class="p-6 bg-white rounded-md shadow-md border-2 border-accent mb-5">
        <div class="grid grid-cols-1 md:grid-cols-2 items-center justify-center gap-4">
            <input type="text" placeholder="Nama tim kamu" name="tim_name" required
                class="p-0 text-2xl font-bold text-black placeholder-gray-400 border-none placeholder:font-medium focus:outline-none focus:ring-0" />
            <button class="bg-primary hover:bg-secondary text-white px-4 py-2 rounded-md md:justify-self-end">
                Simpan
            </button>
        </div>
    </div>
    <div class="space-y-6">
        <div class="p-6 bg-white rounded-md shadow-md border-2 border-accent">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Leader</h2>
            <input type="text" class="hidden" name="role[]" value="Leader" />
            <div class="grid grid-cols-1 md:grid-cols-6 lg:grid-cols-10 gap-6">
                <!-- Foto Placeholder dengan Preview -->
                <div class="items-center gap-2">
                    <label for="imageUpload-leader" class="cursor-pointer">
                        <div id="profile-preview-leader"
                            class="w-24 h-32 bg-gray-200 rounded-md flex items-center justify-center overflow-hidden border-2 border-dashed border-gray-400 hover:border-purple-500">
                            <span class="text-sm text-gray-400 text-center">Klik untuk Unggah</span>
                        </div>
                    </label>
                    <input type="file" id="imageUpload-leader" accept="image/*" name="profile[]" class="hidden"
                        required />
                </div>
                <!-- Input Fields -->
                <div class="md:col-span-7 lg:col-span-9 space-y-4">
                    <input type="text" placeholder="Nama Lengkap" name="name[]" value="{{ Auth::user()->name }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 text-primary" />
                    <input type="email" placeholder="Email" name="email[]" value="{{ Auth::user()->email }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 text-primary" />
                    <input type="text" placeholder="Universitas" name="university[]" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 text-primary" />
                    <div class="flex flex-col items-start gap-2">
                        <label class="text-sm text-gray-600">Upload KTM</label>
                        <input type="file" name="ktm[]" required
                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:bg-purple-100 file:text-purple-700 hover:file:bg-purple-200" />
                    </div>
                </div>
            </div>
        </div>
        <div class="p-6 bg-white rounded-md shadow-md border-2 border-accent">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Member 1</h2>
            <input type="text" class="hidden" name="role[]" value="Member" required />
            <div class="grid grid-cols-1 md:grid-cols-6 lg:grid-cols-10 gap-6">
                <!-- Foto Placeholder dengan Preview -->
                <div class="items-center gap-2">
                    <label for="imageUpload-member1" class="cursor-pointer">
                        <div id="profile-preview-member1"
                            class="w-24 h-32 bg-gray-200 rounded-md flex items-center justify-center overflow-hidden border-2 border-dashed border-gray-400 hover:border-purple-500">
                            <span class="text-sm text-gray-400 text-center">Klik untuk Unggah</span>
                        </div>
                    </label>
                    <input type="file" id="imageUpload-member1" accept="image/*" name="profile[]" class="hidden"
                        required />
                </div>
                <!-- Input Fields -->
                <div class="md:col-span-7 lg:col-span-9 space-y-4">
                    <input type="text" placeholder="Nama Lengkap" name="name[]" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 text-primary" />
                    <input type="email" placeholder="Email" name="email[]" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 text-primary" />
                    <input type="text" placeholder="Universitas" name="university[]" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 text-primary" />
                    <div class="flex flex-col items-start gap-2">
                        <label class="text-sm text-gray-600">Upload KTM</label>
                        <input type="file" name="ktm[]" required
                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:bg-purple-100 file:text-purple-700 hover:file:bg-purple-200" />
                    </div>
                </div>
            </div>
        </div>
        <div class="p-6 bg-white rounded-md shadow-md border-2 border-accent">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Member 2</h2>
            <input type="text" class="hidden" name="role[]" value="Member" />
            <div class="grid grid-cols-1 md:grid-cols-6 lg:grid-cols-10 gap-6">
                <!-- Foto Placeholder dengan Preview -->
                <div class="items-center gap-2">
                    <label for="imageUpload-member2" class="cursor-pointer">
                        <div id="profile-preview-member2"
                            class="w-24 h-32 bg-gray-200 rounded-md flex items-center justify-center overflow-hidden border-2 border-dashed border-gray-400 hover:border-purple-500">
                            <span class="text-sm text-gray-400 text-center">Klik untuk Unggah</span>
                        </div>
                    </label>
                    <input type="file" id="imageUpload-member2" accept="image/*" class="hidden" name="profile[]"
                        required />
                </div>
                <!-- Input Fields -->
                <div class="md:col-span-7 lg:col-span-9 space-y-4">
                    <input type="text" placeholder="Nama Lengkap" name="name[]" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 text-primary" />
                    <input type="email" placeholder="Email" name="email[]" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 text-primary" />
                    <input type="text" placeholder="Universitas" name="university[]" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 text-primary" />
                    <div class="flex flex-col items-start gap-2">
                        <label class="text-sm text-gray-600">Upload KTM</label>
                        <input type="file" name="ktm[]" required
                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:bg-purple-100 file:text-purple-700 hover:file:bg-purple-200" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    const inputs = [{
            inputId: 'imageUpload-leader',
            previewId: 'profile-preview-leader'
        },
        {
            inputId: 'imageUpload-member1',
            previewId: 'profile-preview-member1'
        },
        {
            inputId: 'imageUpload-member2',
            previewId: 'profile-preview-member2'
        },
    ];

    inputs.forEach(({
        inputId,
        previewId
    }) => {
        const fileInput = document.getElementById(inputId);
        const imagePreview = document.getElementById(previewId); // Ubah query selector ke getElementById

        fileInput.addEventListener('change', function(event) {
            const file = event.target.files[0];

            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.innerHTML =
                        `<img src="${e.target.result}" alt="Preview" class="w-full h-full object-cover">`;
                };
                reader.readAsDataURL(file);
            } else {
                imagePreview.innerHTML = '<span class="text-sm text-gray-400">Klik untuk Unggah</span>';
            }
        });
    });
</script>
