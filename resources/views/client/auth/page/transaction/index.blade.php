@extends('client.index')
@section('content')
    <section x-data="{ page: 'team', 'loaded': true, 'darkMode': true, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }" x-init="darkMode = JSON.parse(localStorage.getItem('darkMode'));
    $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
        :class="{ 'dark text-bodydark bg-boxdark-2': darkMode === true }">
        @include('client.auth.components.partials.preloader')
        <div class="flex h-screen overflow-hidden">
            @include('client.auth.components.partials.sidebar')
            <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
                @include('client.auth.components.partials.header')
                <main>
                    <div class="mx-auto max-w-screen-2xl p-4 md:p-5">
                        <div class="mb-5">
                        <x-card-payment :title="$event->event_name" :price="$event->price" :banner="$event->banner" />
                    </div>
                </main>
            </div>
        </div>
    </section>
@endsection
