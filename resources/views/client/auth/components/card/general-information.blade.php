<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-5">
    <!-- Tim Profil -->
    <div class="bg-white shadow-md rounded-lg p-6 border-2 border-accent">
        <h3 class="text-lg font-bold text-gray-800">Tim Profil</h3>
        <p class="text-lg mb-4">{{ $nameTim ?? '' }} ({{ $eventName ?? 'Belum mendaftar event' }})</p>
        <div class="mb-4">
            <p class="font-semibold text-gray-700">Leader</p>
            <p class="text-sm text-gray-600">Nama: {{ $participants[0]['name'] ?? '' }}</p>
            <p class="text-sm text-gray-600">Univ: {{ $participants[0]['university'] ?? '' }}</p>
        </div>
        <div class="mb-4">
            <p class="font-semibold text-gray-700">Member 1</p>
            <p class="text-sm text-gray-600">Nama: {{ $participants[1]['name'] ?? '' }}</p>
            <p class="text-sm text-gray-600">Univ: {{ $participants[1]['university'] ?? '' }}</p>
        </div>
        <div>
            <p class="font-semibold text-gray-700">Member 2</p>
            <p class="text-sm text-gray-600">Nama: {{ $participants[2]['name'] ?? '' }}</p>
            <p class="text-sm text-gray-600">Univ: {{ $participants[2]['university'] ?? '' }}</p>
        </div>
    </div>

    <!-- Pengumuman -->
    <div class="lg:col-span-2 bg-white shadow-md rounded-lg p-6 border-2 border-accent">
        <h3 class="text-lg font-bold text-gray-800">Pengumuman</h3>
        <p class="text-sm text-gray-600 mt-2">
            <p class="text-sm text-gray-600 mt-2">
                Halo, Peserta Lomba ITASE! 👋
            </p>

            <p class="text-sm text-gray-600 mt-2">
                Kami ingin mengingatkan kembali bahwa tenggat waktu pengumpulan karya untuk semua kategori lomba, yaitu
                <strong>UI/UX Design</strong>, <strong>Web Development</strong>, dan <strong>Design Poster</strong>,
                akan berakhir pada <strong>6 Maret 2025 pukul 23:59 WIB</strong>. Pastikan karya Anda sudah sesuai dengan panduan teknis yang telah diberikan.
            </p>

            <p class="text-sm text-gray-600 mt-2">
                Berikut beberapa poin penting yang perlu diperhatikan:
            </p>

            <ul class="list-disc list-inside text-sm text-gray-600">
                <li>
                    <strong>Format Pengumpulan:</strong>
                    <ul class="list-disc list-inside ml-5">
                        <li>Lomba UI/UX: Kirimkan file prototype dalam format PDF/link ke platform desain Anda (contoh: Figma).</li>
                        <li>Lomba Web Development: Sertakan link repository (GitHub/Bitbucket) dan demo live jika tersedia.</li>
                        <li>Lomba Design Poster: File harus dalam format PNG/JPEG dengan resolusi minimal 300 dpi.</li>
                    </ul>
                </li>
                <li>
                    <strong>Pengumpulan Karya:</strong>
                    Semua karya harus dikirim melalui form yang telah disediakan di website resmi ITASE.
                </li>
                <li>
                    <strong>Batas Waktu:</strong>
                    Keterlambatan dalam pengumpulan akan mengurangi poin penilaian atau berpotensi didiskualifikasi.
                </li>
            </ul>

            <p class="text-sm text-gray-600 mt-2">
                Jika ada pertanyaan, jangan ragu untuk menghubungi kami melalui email atau WhatsApp yang tertera di buku panduan lomba.
                Pastikan juga untuk mengikuti update di media sosial kami untuk informasi terbaru.
            </p>

            <p class="text-sm text-gray-600 mt-2">
                Semangat dan tetap berkreasi! Kami tidak sabar untuk melihat ide-ide luar biasa dari kalian semua. ✨
            </p>
        </p>
    </div>

    <!-- Submission -->
    <div class="lg:col-span-3 bg-white shadow-md rounded-lg p-6 border-2 border-accent">
        @if (isset($submission))
            <p class="text-title-sm md:text-title-lg text-secondary text-center font-semibold">Terima kasih telah mengumpulkan karya tepat waktu</p>
        @elseif(!$timId || !$order || $order->payment_status != 'Success')
            <p class="text-title-sm md:text-title-lg text-secondary text-center font-semibold">Tim Anda belum terdaftar atau belum mendaftar event</p>
        @else
            <h3 class="text-lg font-bold text-gray-800">Submission</h3>
            <p class="text-sm text-gray-600 mt-2">
                Segera submit karya Anda sebelum waktu pengumpulan karya berakhir!
            </p>
            <div class="mt-4 flex flex-col md:flex-row items-start gap-4">
                <form action="{{ route('submission.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file"
                        class="text-sm file:mr-4 file:py-2 file:px-4 file:rounded-md file:bg-purple-100 file:text-purple-700 hover:file:bg-purple-200 file:border-0 "
                        required />
                    <button type="submit"
                        class="bg-primary text-white font-medium rounded-md px-32 py-2 hover:bg-secondary">
                        Submit
                    </button>
                </form>
            </div>
        @endif
    </div>
</div>
