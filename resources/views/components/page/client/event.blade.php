@if ($data['events']->isEmpty())
    <x-empty :title="'Yaaah sayangnya belum ada event...'" :img="'img-no-event.png'" :button="'Kembali ke Dashboard'" :route="'homepage'" :hidden="false" />
@else
    @foreach ($data['events'] as $item)
        <x-event :id="$item->id" :event_name="$item->event_name" :description="$item->description" :price="$item->price" :banner="$item->banner"
            :order="$data['order']" :timId="$data['timId']" />
    @endforeach
@endif
