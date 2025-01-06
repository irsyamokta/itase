@foreach ($data['events'] as $item)
    <x-event :id="$item->id" :event_name="$item->event_name" :description="$item->description" :price="$item->price" :banner="$item->banner" />
@endforeach
<x-buttons.add-event />
