@extends('templates.default.default')

@section('default-title')Dakay Monitoring - @yield('title')@endsection
@section('default-body-class')@yield('body-class')@endsection

@push('default-styles')
    @stack('styles')
@endpush

@section('default-main')
    @include('templates.dmonitoring.includes.header')
    <div class="container-fluid">
        @include('templates.dmonitoring.includes.navigation')
        @yield('main')
    </div>
    @include('templates.dmonitoring.includes.footer')
@endsection

@push('default-scripts')
    @stack('scripts')
@endpush
