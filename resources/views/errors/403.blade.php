@extends('index')
@section('content')
    <section class="flex justify-center items-center h-[100vh]">
        <div class="flex flex-col justify-center items-center text-white">
            <img class="w-80" src="{{ asset('assets/error/403.png') }}" alt="">
            <p class="text-xl font-semibold">Anda tidak memiliki hak akses</p>
            <a href="/" class="mt-5 bg-primary hover:bg-secondary text-white px-4 py-2 rounded-md md:justify-self-end">Kembali ke beranda</a>
        </div>
    </section>
@endsection
