<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    @include('admin.components.partials.filter')
    <table class="w-full text-sm text-center rtl:text-right text-gray-500">
        <thead class="text-xs text-white uppercase bg-primary">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Profile
                </th>
                <th scope="col" class="px-5 py-3">
                    Nama Tim
                </th>
                <th scope="col" class="px-5 py-3 whitespace-nowrap">
                    Nama Peserta
                </th>
                <th scope="col" class="px-5 py-3 whitespace-nowrap">
                    Email
                </th>
                <th scope="col" class="px-5 py-3 whitespace-nowrap">
                    Universitas
                </th>
                <th scope="col" class="px-5 py-3">
                    Role
                </th>
                <th scope="col" class="px-5 py-3">
                    KTM
                </th>
            </tr>
        </thead>
        <tbody>
            @if (count($participants) <= 0)
                <tr>
                    <td colspan="2" class="text-start py-8">Tidak ada data</td>
                </tr>
            @else
                @foreach ($participants as $row)
                    <tr class="bg-white border-b">
                        <th scope="row" class="flex justify-center px-3 py-4 font-medium whitespace-nowrap">
                            <img src="{{ asset('storage/' . $row->profile) }}" alt="product image" class="w-24 h-24 object-cover">
                        </th>
                        <th scope="row" class="px-3 py-4 font-medium whitespace-nowrap text-start">
                            {{ $row->tim->tim_name }}
                        </th>
                        <th scope="row" class="px-3 py-4 font-medium whitespace-nowrap text-start">
                            {{ $row->name }}
                        </th>
                        <th scope="row" class="px-3 py-4 font-medium text-start">
                            {{ $row->email }}
                        </th>
                        <th scope="row"
                            class="px-3 py-4 font-medium whitespace-nowrap overflow-y-auto max-w-[150px] no-scroll">
                            {{ $row->role }}
                        </th>
                        <th scope="row"
                            class="px-3 py-4 font-medium whitespace-nowrap overflow-y-auto max-w-[150px] no-scroll">
                            {{ $row->university }}
                        </th>
                        <th scope="row" class="px-3 py-4 font-medium whitespace-nowrap">
                            <a href="{{ asset('storage/' . $row->ktm) }}" class="text-purple-600 hover:underline"
                                download>
                                Preview KTM
                            </a>
                        </th>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {{-- <div class="mt-5 mb-5">
        {{ $products->links('vendor.pagination.tailwind') }}
    </div> --}}
</div>
