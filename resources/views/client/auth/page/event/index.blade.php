@extends('client.index')
@section('content')
    <section x-data="{ page: 'event', 'loaded': true, 'darkMode': true, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }" x-init="darkMode = JSON.parse(localStorage.getItem('darkMode'));
    $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
        :class="{ 'dark text-bodydark bg-boxdark-2': darkMode === true }">
        @include('client.auth.components.partials.preloader')
        <div class="flex h-screen overflow-hidden">
            @include('client.auth.components.partials.sidebar')
            <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
                @include('client.auth.components.partials.header')
                <main>
                    <div class="mx-auto max-w-screen-2xl p-4 md:p-5">
                        @if ($events->isEmpty())
                            <x-empty :title="'Yaaah sayangnya belum ada event...'" :img="'img-no-event.png'" :button="'Kembali ke Dashboard'" />
                        @else
                            @foreach ($events as $item)
                                <x-event :id="$item->id" :event_name="$item->event_name" :description="$item->description" :price="$item->price"
                                    :banner="$item->banner" />
                            @endforeach
                        @endif
                    </div>
                </main>
            </div>
        </div>
    </section>
@endsection
