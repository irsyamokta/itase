<div class="relative overflow-x-auto shadow-md sm:rounded-lg border-2 border-accent">
    <x-filter :title="'Data Submission Lomba'"/>
    <div class="px-5">
        <table class="w-full text-sm text-center rtl:text-right text-gray-500">
            <thead class="text-xs text-white uppercase bg-primary">
                <tr>
                    <th scope="col" class="px-5 py-3">
                        Nama Tim
                    </th>
                    <th scope="col" class="px-5 py-3 whitespace-nowrap">
                        Kategori Lomba
                    </th>
                    <th scope="col" class="px-5 py-3 whitespace-nowrap">
                        Tanggal Submit
                    </th>
                    <th scope="col" class="px-5 py-3">
                        File
                    </th>
                </tr>
            </thead>
            <tbody>
                @if (count($submissions) <= 0)
                    <tr>
                        <td colspan="8" class="text-center py-8">Tidak ada data</td>
                    </tr>
                @else
                    @foreach ($submissions as $row)
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-3 py-4 font-medium whitespace-nowrap">
                                {{ $row->tim->tim_name }}
                            </th>
                            <th scope="row" class="py-4 font-medium">
                                {{ $row->tim->order->event->event_name }}
                            </th>
                            <th scope="row" class="py-4 font-medium">
                                {{ $row->created_at }}
                            </th>
                            <th scope="row" class="px-3 py-4 font-medium whitespace-nowrap">
                                <a href="{{ asset('storage/' . $row->file) }}" class="text-purple-600 hover:underline"
                                    download>
                                    Unduh File
                                </a>
                            </th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <div class="mt-5 mb-5 px-5">
            {{ $submissions->links('vendor.pagination.tailwind') }}
        </div>
    </div>
</div>
