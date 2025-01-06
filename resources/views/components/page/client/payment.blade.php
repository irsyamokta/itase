<div class="mx-auto max-w-screen-2xl p-4 md:p-5">
    <div class="mb-5">
        @include('components.breadcrumb', [
            'links' => [
                ['url' => route('event'), 'label' => 'Event'],
                ['url' => '', 'label' => 'Registrasi Event'],
            ],
        ])
    </div>
    <form action="{{ route('event.order', $data['event']->id) }}" method="POST">
        @csrf
        <x-card-checkout :title="$data['event']->event_name" :price="$data['event']->price" :banner="$data['event']->banner" :button="'Lanjut Pembayaran'" :readonly="false" />
    </form>
</div>
