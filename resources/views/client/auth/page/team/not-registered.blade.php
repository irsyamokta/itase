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
                        <section id="home" class="flex justify-center h-[80vh] overflow-hidden lg:px-12">
                            <div class="flex flex-col justify-center items-center">
                                <img src="{{ asset('assets/img/img-register.png') }}" class="w-60 md:w-96" alt="empty">
                                <p class="text-2xl font-semibold tracking-wide text-gray-700 mt-5">Registrasi tim dulu yuuk...</p>
                                <a href="{{ route('team.register') }}"><button class="mt-5 bg-primary hover:bg-secondary text-white px-4 py-2 rounded-md md:justify-self-end">
                                    Registrasi Tim
                                </button></a>
                            </div>
                        </section>
                    </div>
                </main>
            </div>
        </div>
    </section>
@endsection
