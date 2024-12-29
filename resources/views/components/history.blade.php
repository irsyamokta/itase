@props(['orders', 'order', 'snapToken'])

<div class="w-full bg-white border-2 border-accent rounded-lg shadow">
    <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50"
        id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
        <li class="me-2">
            <button id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about"
                aria-selected="true" class="inline-block p-4 rounded-ss-lg hover:bg-gray-100">Belum Bayar</button>
        </li>
        <li class="me-2">
            <button id="services-tab" data-tabs-target="#services" type="button" role="tab"
                aria-controls="services" aria-selected="false" class="inline-block p-4 hover:bg-gray-100">Riwayat
                Transaksi</button>
        </li>
    </ul>
    <div id="defaultTabContent">
        <div class="hidden p-4 bg-white rounded-lg" id="about" role="tabpanel" aria-labelledby="about-tab">
            @if ($order?->payment_status == 'Pending')
                <x-card-payment :title="$order->event->event_name" :price="$order->event->price" :banner="$order->event->banner" :phone="$order->phone"
                    :snapToken="$snapToken" :button="'Bayar Sekarang'" :readonly="true" />
            @else
                <x-empty-transaction :title="'Tidak ada transaksi berjalan...'" :img="'img-transaction.png'" :button="'Kembali ke Dashboard'" :hidden="true" />
            @endif
        </div>
        <div class="hidden p-4 bg-white rounded-lg" id="services" role="tabpanel" aria-labelledby="services-tab">
            @if ($orders->isEmpty())
                <x-empty-transaction :title="'Tidak ada riwayat transaksi...'" :img="'img-transaction.png'" :button="'Kembali ke Dashboard'" :hidden="true" />
            @else
                @foreach ($orders as $item)
                    <x-card-history :title="$item->event->event_name" :price="$item->event->price" :banner="$item->event->banner" :phone="$item->phone"
                        :status="$item->payment_status" />
                @endforeach
            @endif
        </div>
    </div>
</div>
