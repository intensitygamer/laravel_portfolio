@extends('templates.default.default')

@section('default-title')Dakay Monitoring - @yield('title')@endsection
@section('default-body-class')@yield('body-class')@endsection

@push('default-styles')
    @stack('styles')
@endpush

@section('default-main')
    @yield('main')
@endsection

@push('default-scripts')
    @stack('scripts')
@endpush
