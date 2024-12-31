<form action="{{ route('team.update', $participants[0]->tim_id) }}" method="POST" enctype="multipart/form-data" class="mx-auto">
    @csrf
    @method('patch')
    <div class="mb-5">
        @include('components.breadcrumb', [
            'links' => [['url' => route('team'), 'label' => 'Tim Kamu'], ['url' => '', 'label' => 'Update Tim']],
        ])
    </div>
    <!-- Tim Header -->
    <div class="p-6 bg-white rounded-md shadow-md border-2 border-accent mb-5">
        <div class="grid grid-cols-1 md:grid-cols-2 items-center justify-center gap-4">
            <input type="text" placeholder="Nama tim kamu" name="tim_name" value="{{ $tim->tim_name ?? '' }}" required
                class="p-0 text-2xl font-bold text-black placeholder-gray-400 border-none placeholder:font-medium focus:outline-none focus:ring-0"/>
            <button type="submit"
                class="bg-primary hover:bg-secondary text-white px-4 py-2 rounded-md md:justify-self-end">
                Simpan
            </button>
        </div>
    </div>
    <div class="space-y-6">
        <div class="p-6 bg-white rounded-md shadow-md border-2 border-accent">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Leader</h2>
            <input type="hidden" name="participant_id[]" value="{{ $participants[0]->id }}">
            <input type="text" class="hidden" name="role[]" value="Leader" />
            <div class="grid grid-cols-1 md:grid-cols-6 lg:grid-cols-10 gap-6">
                <!-- Foto Placeholder dengan Preview -->
                <div class="items-center gap-2">
                    <label for="imageUpload-leader">
                        <div id="profile-preview-leader"
                            class="w-24 h-32 bg-gray-200 rounded-md flex items-center justify-center overflow-hidden border-2 border-gray-400 hover:border-purple-500">
                            <img src="{{ asset('storage/' . $participants[0]->profile) }}" alt="Preview"
                                class="w-full h-full object-cover" id="img-preview-leader">
                        </div>
                    </label>
                    <input type="file" id="imageUpload-leader" name="profile[]" accept="image/*" class="hidden"
                        onchange="previewImage('imageUpload-leader', 'img-preview-leader')">
                </div>
                <!-- Input Fields -->
                <div class="md:col-span-7 lg:col-span-9 space-y-4">
                    <input type="text" placeholder="Nama Lengkap" name="name[]"
                        value="{{ $participants[0]->name ?? '' }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 text-primary" />
                    <input type="email" placeholder="Email" name="email[]" value="{{ $participants[0]->email ?? '' }}"
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 text-primary" />
                    <input type="text" placeholder="Universitas" name="university[]"
                        value="{{ $participants[0]->university ?? '' }}" reaquired
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 text-primary" />
                    <div class="flex flex-col items-start gap-2">
                        <label class="text-sm text-gray-600">Update KTM</label>
                        <input type="file" name="ktm[]"
                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:bg-purple-100 file:text-purple-700 hover:file:bg-purple-200" />
                    </div>
                </div>
            </div>
        </div>
        <div class="p-6 bg-white rounded-md shadow-md border-2 border-accent">
            <input type="hidden" name="participant_id[]" value="{{ $participants[1]->id }}">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Member 1</h2>
            <input type="text" class="hidden" name="role[]" value="Member" required />
            <div class="grid grid-cols-1 md:grid-cols-6 lg:grid-cols-10 gap-6">
                <!-- Foto Placeholder dengan Preview -->
                <div class="items-center gap-2">
                    <label for="imageUpload-member1">
                        <div id="profile-preview-member1"
                            class="w-24 h-32 bg-gray-200 rounded-md flex items-center justify-center overflow-hidden border-2 border-gray-400 hover:border-purple-500">
                            <img src="{{ asset('storage/' . $participants[1]->profile) }}" alt="Preview"
                                class="w-full h-full object-cover" id="img-preview-member1">
                        </div>
                    </label>
                    <input type="file" id="imageUpload-member1" name="profile[]" accept="image/*"
                        class="hidden" onchange="previewImage('imageUpload-member1', 'img-preview-member1')">
                </div>
                <!-- Input Fields -->
                <div class="md:col-span-7 lg:col-span-9 space-y-4">
                    <input type="text" placeholder="Nama Lengkap" name="name[]"
                        value="{{ $participants[1]->name ?? '' }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 text-primary" />
                    <input type="email" placeholder="Email" name="email[]" value="{{ $participants[1]->email ?? '' }}"
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 text-primary" />
                    <input type="text" placeholder="Universitas" name="university[]"
                        value="{{ $participants[1]->university ?? '' }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 text-primary" />
                    <div class="flex flex-col items-start gap-2">
                        <label class="text-sm text-gray-600">Update KTM</label>
                        <input type="file" name="ktm[]"
                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:bg-purple-100 file:text-purple-700 hover:file:bg-purple-200" />
                    </div>
                </div>
            </div>
        </div>
        <div class="p-6 bg-white rounded-md shadow-md border-2 border-accent">
            <input type="hidden" name="participant_id[]" value="{{ $participants[2]->id }}">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Member 2</h2>
            <input type="text" class="hidden" name="role[]" value="Member" />
            <div class="grid grid-cols-1 md:grid-cols-6 lg:grid-cols-10 gap-6">
                <!-- Foto Placeholder dengan Preview -->
                <div class="items-center gap-2">
                    <label for="imageUpload-member2">
                        <div id="profile-preview-member2"
                            class="w-24 h-32 bg-gray-200 rounded-md flex items-center justify-center overflow-hidden border-2 border-gray-400 hover:border-purple-500">
                            <img src="{{ asset('storage/' . $participants[1]->profile) }}" alt="Preview"
                                class="w-full h-full object-cover" id="img-preview-member2">
                        </div>
                    </label>
                    <input type="file" id="imageUpload-member2" name="profile[]" accept="image/*"
                        class="hidden" onchange="previewImage('imageUpload-member2', 'img-preview-member2')">
                </div>
                <!-- Input Fields -->
                <div class="md:col-span-7 lg:col-span-9 space-y-4">
                    <input type="text" placeholder="Nama Lengkap" name="name[]"
                        value="{{ $participants[2]->name ?? '' }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 text-primary" />
                    <input type="email" placeholder="Email" name="email[]"
                        value="{{ $participants[2]->email ?? '' }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 text-primary" />
                    <input type="text" placeholder="Universitas" name="university[]"
                        value="{{ $participants[2]->university ?? '' }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 text-primary" />
                    <div class="flex flex-col items-start gap-2">
                        <label class="text-sm text-gray-600">Update KTM</label>
                        <input type="file" name="ktm[]"
                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:bg-purple-100 file:text-purple-700 hover:file:bg-purple-200" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    function previewImage(inputId, imgId) {
        const input = document.getElementById(inputId);
        const imgPreview = document.getElementById(imgId);

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                imgPreview.src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

