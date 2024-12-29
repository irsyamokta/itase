<div class="relative overflow-x-auto shadow-md sm:rounded-lg border-2 border-accent">
    <x-searching :title="'Data Peserta Lomba'" :route="'participant.search'"/>
    <div class="px-5">
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
                    <th scope="col" class="px-3 py-3">
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
                        <td colspan="8" class="text-center py-8">Tidak ada data</td>
                    </tr>
                @else
                    @foreach ($participants as $row)
                        <tr class="bg-white border-b">
                            <th scope="row" class="flex justify-center px-3 py-4 font-medium whitespace-nowrap">
                                <img src="{{ asset('storage/' . $row->profile) }}" alt="product image" class="w-24 h-24 object-cover">
                            </th>
                            <th scope="row" class="px-3 py-4 font-medium whitespace-nowrap">
                                {{ $row->tim->tim_name }}
                            </th>
                            <th scope="row" class="px-3 py-4 font-medium whitespace-nowrap">
                                {{ $row->name }}
                            </th>
                            <th scope="row" class="py-4 font-medium">
                                {{ $row->email }}
                            </th>
                            <th scope="row"
                                class="px-3 py-4 font-medium whitespace-nowrap overflow-y-auto max-w-[150px] no-scroll">
                                {{ $row->university }}
                            </th>
                            <th scope="row"
                                class="px-3 py-4 font-medium whitespace-nowrap overflow-y-auto max-w-[150px] no-scroll">
                                {{ $row->role }}
                            </th>
                            <th scope="row" class="px-3 py-4 font-medium whitespace-nowrap">
                                <a href="{{ asset('storage/' . $row->ktm) }}" class="text-purple-600 hover:underline"
                                    download>
                                    Preview
                                </a>
                            </th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <div class="mt-5 mb-5 px-5">
            {{ $participants->links('vendor.pagination.tailwind') }}
        </div>
    </div>
</div>
