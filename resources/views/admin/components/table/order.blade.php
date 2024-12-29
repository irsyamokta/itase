<div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5 border-2 border-accent">
    <x-filter :title="'Data Pembayaran Lomba'"/>
    <div class="px-5">
        <table class="w-full text-sm text-center rtl:text-right text-gray-500">
            <thead class="text-xs text-white uppercase bg-primary">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Id Transaksi
                    </th>
                    <th scope="col" class="px-5 py-3">
                        Nama Lengkap
                    </th>
                    <th scope="col" class="px-5 py-3 whitespace-nowrap">
                        Email
                    </th>
                    <th scope="col" class="px-3 py-3">
                        Phone
                    </th>
                    <th scope="col" class="px-5 py-3 whitespace-nowrap">
                        Kategori Lomba
                    </th>
                    <th scope="col" class="px-5 py-3">
                        Total Bayar
                    </th>
                    <th scope="col" class="px-5 py-3">
                        Status Pembayaran
                    </th>
                </tr>
            </thead>
            <tbody>
                @if (count($orders) <= 0)
                    <tr>
                        <td colspan="8" class="text-center py-8">Tidak ada data</td>
                    </tr>
                @else
                    @foreach ($orders as $row)
                        <tr class="bg-white border-b">
                            <th scope="row" class="flex justify-center px-3 py-4 font-medium">
                                {{ $row->transaction_id }}
                            </th>
                            <th scope="row" class="px-3 py-4 font-medium whitespace-nowrap">
                                {{ $row->user->name }}
                            </th>
                            <th scope="row" class="py-4 font-medium text-start">
                                {{ $row->user->email }}
                            </th>
                            <th scope="row"
                                class="px-3 py-4 font-medium whitespace-nowrap overflow-y-auto max-w-[150px] no-scroll">
                                {{ $row->phone }}
                            </th>
                            <th scope="row"
                                class="px-3 py-4 font-medium whitespace-nowrap overflow-y-auto max-w-[150px] no-scroll">
                                {{ $row->event->event_name }}
                            </th>
                            <th scope="row"
                                class="px-3 py-4 font-medium whitespace-nowrap overflow-y-auto max-w-[150px] no-scroll">
                                Rp{{ number_format($row->amount, 0, ',', '.') }}
                            </th>
                            <th scope="row"
                                class="px-3 py-4 font-medium whitespace-nowrap overflow-y-auto max-w-[150px] no-scroll">
                                {{ $row->payment_status }}
                            </th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <div class="mt-5 mb-5 px-5">
            {{ $orders->links('vendor.pagination.tailwind') }}
        </div>
    </div>
</div>
