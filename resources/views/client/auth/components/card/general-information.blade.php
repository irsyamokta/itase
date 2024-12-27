<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-5">
    <!-- Tim Profil -->
    <div class="bg-white shadow-md rounded-lg p-6 border-2 border-accent">
        <h3 class="text-lg font-bold text-gray-800">Tim Profil</h3>
        <p class="text-lg mb-4">{{ $nameTim ?? '' }}</p>
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
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque quis mi tellus. Nullam finibus, erat malesuada posuere ullamcorper, nunc sapien egestas tellus, et bibendum odio odio vel est. Nunc imperdiet sem at sapien lacinia, et feugiat orci viverra. In consectetur auctor turpis, nec blandit purus consequat eu. Nulla interdum ipsum.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque quis mi tellus. Nullam finibus, erat malesuada posuere ullamcorper, nunc sapien egestas tellus, et bibendum odio odio vel est. Nunc imperdiet sem at sapien lacinia, et feugiat orci viverra. In consectetur auctor turpis, nec blandit purus consequat eu. Nulla interdum ipsum.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque quis mi tellus. Nullam finibus, erat malesuada posuere ullamcorper, nunc sapien egestas tellus, et bibendum odio odio vel est. Nunc imperdiet sem at sapien lacinia, et feugiat orci viverra. In consectetur auctor turpis, nec blandit purus consequat eu. Nulla interdum ipsum.
        </p>
    </div>

    <!-- Submission -->
    <div class="lg:col-span-3 bg-white shadow-md rounded-lg p-6 border-2 border-accent">
        <h3 class="text-lg font-bold text-gray-800">Submission</h3>
        <p class="text-sm text-gray-600 mt-2">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc imperdiet sem at sapien lacinia, et feugiat orci viverra.
        </p>
        <div class="mt-4 flex flex-col md:flex-row items-start gap-4">
            <input type="file" class="text-sm file:mr-4 file:py-2 file:px-4 file:rounded-md file:bg-purple-100 file:text-purple-700 hover:file:bg-purple-200 file:border-0 "/>
            <button class="bg-primary text-white font-medium rounded-md px-32 py-2 hover:bg-secondary">
                Submit
            </button>
        </div>
    </div>
</div>
