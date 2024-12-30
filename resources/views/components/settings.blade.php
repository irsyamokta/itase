<!-- ===== Main Content Start ===== -->
<main>
    <div class="mx-auto max-w-screen-2xl border-2 border-accent rounded-lg">
        <div>
            <!-- ====== Personal Information Section Start -->
            <div class="grid grid-cols-2 gap-8">
                <div class="col-span-5 xl:col-span-3">
                    <div class="rounded-lg">
                        <div class="border-b border-stroke px-7 py-4">
                            <h3 class="font-medium text-black">Informasi Pribadi</h3>
                        </div>
                        <div class="p-7">
                            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <!-- Foto Profile -->
                                <div class="mb-5.5 flex flex-col items-center gap-5.5">
                                    <div class="relative">
                                        <label for="profilePicture" class="cursor-pointer">
                                            <img id="profilePreview" src="{{ asset('storage/' . auth()->user()->profile) }}"
                                                alt="Profile"
                                                class="w-40 h-40 rounded-full object-cover border border-stroke" />
                                        </label>
                                        <input name="profile" type="file" id="profilePicture" class="hidden" accept="image/*"
                                            onchange="previewProfile(event)" />
                                    </div>
                                </div>

                                <!-- Nama Lengkap -->
                                <div class="mb-5.5 flex flex-col gap-5.5 sm:flex-row">
                                    <div class="w-full sm:w-full">
                                        <label class="mb-3 block text-sm font-medium text-black" for="name">Nama
                                            Lengkap</label>
                                        <div class="relative mb-5.5">
                                            <span class="absolute left-4.5 top-4">
                                                <svg class="fill-current" width="20" height="20"
                                                    viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g opacity="0.8">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M3.72039 12.887C4.50179 12.1056 5.5616 11.6666 6.66667 11.6666H13.3333C14.4384 11.6666 15.4982 12.1056 16.2796 12.887C17.061 13.6684 17.5 14.7282 17.5 15.8333V17.5C17.5 17.9602 17.1269 18.3333 16.6667 18.3333C16.2064 18.3333 15.8333 17.9602 15.8333 17.5V15.8333C15.8333 15.1703 15.5699 14.5344 15.1011 14.0655C14.6323 13.5967 13.9964 13.3333 13.3333 13.3333H6.66667C6.00363 13.3333 5.36774 13.5967 4.8989 14.0655C4.43006 14.5344 4.16667 15.1703 4.16667 15.8333V17.5C4.16667 17.9602 3.79357 18.3333 3.33333 18.3333C2.8731 18.3333 2.5 17.9602 2.5 17.5V15.8333C2.5 14.7282 2.93899 13.6684 3.72039 12.887Z" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M9.99967 3.33329C8.61896 3.33329 7.49967 4.45258 7.49967 5.83329C7.49967 7.214 8.61896 8.33329 9.99967 8.33329C11.3804 8.33329 12.4997 7.214 12.4997 5.83329C12.4997 4.45258 11.3804 3.33329 9.99967 3.33329ZM5.83301 5.83329C5.83301 3.53211 7.69849 1.66663 9.99967 1.66663C12.3009 1.66663 14.1663 3.53211 14.1663 5.83329C14.1663 8.13448 12.3009 9.99996 9.99967 9.99996C7.69849 9.99996 5.83301 8.13448 5.83301 5.83329Z" />
                                                    </g>
                                                </svg>
                                            </span>
                                            <input
                                                class="w-full rounded border border-gray-300 bg-white py-3 pl-11.5 pr-4.5 font-medium text-black focus:outline-none focus:ring-2 focus:ring-purple-500"
                                                type="text" name="name" id="name" placeholder="Nama Lengkap"
                                                value="{{ auth()->user()->name }}" />
                                        </div>

                                        <!-- Email -->
                                        <div class="mb-5.5">
                                            <label class="mb-3 block text-sm font-medium text-black"
                                                for="email">Email</label>
                                            <div class="relative">
                                                <span class="absolute left-4.5 top-4">
                                                    <svg class="fill-current" width="20" height="20"
                                                        viewBox="0 0 20 20" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g opacity="0.8">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M3.33301 4.16667C2.87658 4.16667 2.49967 4.54357 2.49967 5V15C2.49967 15.4564 2.87658 15.8333 3.33301 15.8333H16.6663C17.1228 15.8333 17.4997 15.4564 17.4997 15V5C17.4997 4.54357 17.1228 4.16667 16.6663 4.16667H3.33301ZM0.833008 5C0.833008 3.6231 1.9561 2.5 3.33301 2.5H16.6663C18.0432 2.5 19.1663 3.6231 19.1663 5V15C19.1663 16.3769 18.0432 17.5 16.6663 17.5H3.33301C1.9561 17.5 0.833008 16.3769 0.833008 15V5Z"
                                                                fill="" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M0.983719 4.52215C1.24765 4.1451 1.76726 4.05341 2.1443 4.31734L9.99975 9.81615L17.8552 4.31734C18.2322 4.05341 18.7518 4.1451 19.0158 4.52215C19.2797 4.89919 19.188 5.4188 18.811 5.68272L10.4776 11.5161C10.1907 11.7169 9.80879 11.7169 9.52186 11.5161L1.18853 5.68272C0.811486 5.4188 0.719791 4.89919 0.983719 4.52215Z"
                                                                fill="" />
                                                        </g>
                                                    </svg>
                                                </span>
                                                <input
                                                    class="w-full rounded border border-gray-300 bg-white py-3 pl-11.5 pr-4.5 font-medium text-black focus:outline-none focus:ring-2 focus:ring-purple-500"
                                                    type="email" name="email" id="email"
                                                    placeholder="Email" value="{{ auth()->user()->email }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tombol Simpan -->
                                <div class="flex justify-end gap-4.5">
                                    <button
                                        class="flex justify-center rounded bg-primary px-6 py-2 font-medium text-gray hover:bg-opacity-90"
                                        type="submit">
                                        Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ====== Personal Information Section End -->
        </div>
    </div>
    <div class="mx-auto max-w-screen-2xl border-2 border-accent rounded-lg mt-5">
        <div>
            <!-- ====== Reset Password Section Start -->
            <div class="grid grid-cols-2 gap-8">
                <div class="col-span-5 xl:col-span-3">
                    <div class="rounded-lg">
                        <div class="border-b border-stroke px-7 py-4">
                            <h3 class="font-medium text-black">Reset Password</h3>
                        </div>
                        <div class="p-7">
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf
                                @method('put')
                                <div class="mb-5.5 flex flex-col gap-5.5 sm:flex-row">
                                    <div class="w-full sm:w-full">

                                        <!-- Current Password -->
                                        <div>
                                            <label class="mb-3 block text-sm font-medium text-black"
                                                for="update_password_current_password">Password Saat Ini</label>
                                            <div class="relative mb-5.5">
                                                <span class="absolute left-4.5 top-4">
                                                    <svg viewBox="0 0 24 24" fill="none" width="24" height="24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                            stroke-linejoin="round"></g>
                                                        <g id="SVGRepo_iconCarrier">
                                                            <g id="Iconly/Curved/Password">
                                                                <g id="Password">
                                                                    <path id="Stroke 1" fill-rule="evenodd"
                                                                        clip-rule="evenodd"
                                                                        d="M10.6887 11.9999C10.6887 13.0229 9.85974 13.8519 8.83674 13.8519C7.81374 13.8519 6.98474 13.0229 6.98474 11.9999C6.98474 10.9769 7.81374 10.1479 8.83674 10.1479H8.83974C9.86174 10.1489 10.6887 10.9779 10.6887 11.9999Z"
                                                                        stroke="#64748b" stroke-width="1.5"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round"></path>
                                                                    <path id="Stroke 3" d="M10.6918 12H17.0098V13.852"
                                                                        stroke="#64748b" stroke-width="1.5"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round"></path>
                                                                    <path id="Stroke 5" d="M14.182 13.852V12"
                                                                        stroke="#64748b" stroke-width="1.5"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round"></path>
                                                                    <path id="Stroke 7" fill-rule="evenodd"
                                                                        clip-rule="evenodd"
                                                                        d="M2.74988 12C2.74988 5.063 5.06288 2.75 11.9999 2.75C18.9369 2.75 21.2499 5.063 21.2499 12C21.2499 18.937 18.9369 21.25 11.9999 21.25C5.06288 21.25 2.74988 18.937 2.74988 12Z"
                                                                        stroke="#64748b" stroke-width="1.5"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round"></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </span>
                                                <input
                                                    class="w-full rounded border border-gray-300 bg-white py-3 pl-11.5 pr-4.5 font-medium text-black focus:outline-none focus:ring-2 focus:ring-purple-500"
                                                    type="password" name="current_password"
                                                    id="update_password_current_password"
                                                    placeholder="Password Saat Ini" />
                                            </div>
                                            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                                        </div>

                                        <!-- New Password -->
                                        <div>
                                            <label class="mb-3 block text-sm font-medium text-black"
                                                for="update_password_password">Password Baru</label>
                                            <div class="relative mb-5.5">
                                                <span class="absolute left-4.5 top-4">
                                                    <svg viewBox="0 0 24 24" fill="none" width="24" height="24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                            stroke-linejoin="round"></g>
                                                        <g id="SVGRepo_iconCarrier">
                                                            <g id="Iconly/Curved/Password">
                                                                <g id="Password">
                                                                    <path id="Stroke 1" fill-rule="evenodd"
                                                                        clip-rule="evenodd"
                                                                        d="M10.6887 11.9999C10.6887 13.0229 9.85974 13.8519 8.83674 13.8519C7.81374 13.8519 6.98474 13.0229 6.98474 11.9999C6.98474 10.9769 7.81374 10.1479 8.83674 10.1479H8.83974C9.86174 10.1489 10.6887 10.9779 10.6887 11.9999Z"
                                                                        stroke="#64748b" stroke-width="1.5"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round"></path>
                                                                    <path id="Stroke 3" d="M10.6918 12H17.0098V13.852"
                                                                        stroke="#64748b" stroke-width="1.5"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round"></path>
                                                                    <path id="Stroke 5" d="M14.182 13.852V12"
                                                                        stroke="#64748b" stroke-width="1.5"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round"></path>
                                                                    <path id="Stroke 7" fill-rule="evenodd"
                                                                        clip-rule="evenodd"
                                                                        d="M2.74988 12C2.74988 5.063 5.06288 2.75 11.9999 2.75C18.9369 2.75 21.2499 5.063 21.2499 12C21.2499 18.937 18.9369 21.25 11.9999 21.25C5.06288 21.25 2.74988 18.937 2.74988 12Z"
                                                                        stroke="#64748b" stroke-width="1.5"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round"></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </span>
                                                <input
                                                    class="w-full rounded border border-gray-300 bg-white py-3 pl-11.5 pr-4.5 font-medium text-black focus:outline-none focus:ring-2 focus:ring-purple-500"
                                                    type="password" name="password" id="update_password_password"
                                                    placeholder="Password Baru" />
                                            </div>
                                            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                                        </div>

                                        <!-- Password Confirmation -->
                                        <div class="mb-5.5">
                                            <label class="mb-3 block text-sm font-medium text-black"
                                                for="update_password_password_confirmation">Konfirmasi Password</label>
                                            <div class="relative">
                                                <span class="absolute left-4.5 top-4">
                                                    <svg viewBox="0 0 24 24" fill="none" width="24" height="24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                            stroke-linejoin="round"></g>
                                                        <g id="SVGRepo_iconCarrier">
                                                            <g id="Iconly/Curved/Password">
                                                                <g id="Password">
                                                                    <path id="Stroke 1" fill-rule="evenodd"
                                                                        clip-rule="evenodd"
                                                                        d="M10.6887 11.9999C10.6887 13.0229 9.85974 13.8519 8.83674 13.8519C7.81374 13.8519 6.98474 13.0229 6.98474 11.9999C6.98474 10.9769 7.81374 10.1479 8.83674 10.1479H8.83974C9.86174 10.1489 10.6887 10.9779 10.6887 11.9999Z"
                                                                        stroke="#64748b" stroke-width="1.5"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round"></path>
                                                                    <path id="Stroke 3" d="M10.6918 12H17.0098V13.852"
                                                                        stroke="#64748b" stroke-width="1.5"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round"></path>
                                                                    <path id="Stroke 5" d="M14.182 13.852V12"
                                                                        stroke="#64748b" stroke-width="1.5"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round"></path>
                                                                    <path id="Stroke 7" fill-rule="evenodd"
                                                                        clip-rule="evenodd"
                                                                        d="M2.74988 12C2.74988 5.063 5.06288 2.75 11.9999 2.75C18.9369 2.75 21.2499 5.063 21.2499 12C21.2499 18.937 18.9369 21.25 11.9999 21.25C5.06288 21.25 2.74988 18.937 2.74988 12Z"
                                                                        stroke="#64748b" stroke-width="1.5"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round"></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </span>
                                                <input
                                                    class="w-full rounded border border-gray-300 bg-white py-3 pl-11.5 pr-4.5 font-medium text-black focus:outline-none focus:ring-2 focus:ring-purple-500"
                                                    type="password" name="password_confirmation"
                                                    id="update_password_password_confirmation"
                                                    placeholder="Konfirmasi Password" />
                                            </div>
                                            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                                        </div>
                                    </div>
                                </div>

                                <!-- Tombol Simpan -->
                                <div class="flex justify-end gap-4.5">
                                    <button
                                        class="flex justify-center rounded bg-primary px-6 py-2 font-medium text-gray hover:bg-opacity-90"
                                        type="submit">
                                        Save
                                    </button>
                                    @if (session('status') === 'password-updated')
                                        <p x-data="{ show: true }" x-show="show" x-transition
                                            x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">{{ __('Saved.') }}
                                        </p>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ====== Reset Password Section End -->
        </div>
    </div>
</main>
<!-- ===== Main Content End ===== -->

<script>
    function previewProfile(event) {
        const input = event.target;
        const preview = document.getElementById("profilePreview");
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
