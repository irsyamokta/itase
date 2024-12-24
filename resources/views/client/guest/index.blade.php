@extends('index')
@section('content')
    @include('components.navbar')
    @include('client.guest.sections.hero')
    @include('client.guest.sections.about')
    @include('client.guest.sections.event')
    @include('client.guest.sections.timeline')
    @include('client.guest.sections.faq')
    @include('components.footer')
@endsection

