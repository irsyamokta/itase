@extends('client.index')
@section('content')
    <section x-data="{ page: 'settings', 'loaded': true, 'darkMode': true, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }" x-init="darkMode = JSON.parse(localStorage.getItem('darkMode'));
    $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
        :class="{ 'dark text-bodydark bg-white': darkMode === true }">
        @include('admin.components.partials.preloader')
        <div class="flex h-screen overflow-hidden">
            @include('admin.components.partials.sidebar')
            <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
                @include('admin.components.partials.header')
                <main>
                    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-5">
                        <x-settings/>
                        {{-- <x-reset-password/> --}}
                    </div>
                </main>
            </div>
        </div>
    </section>
@endsection
