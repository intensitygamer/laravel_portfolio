@extends('templates.default.default')

@section('default-title')Dakay Monitoring Print - @yield('title')@endsection
@section('default-body-class')@yield('body-class')@endsection

@push('default-styles')
@stack('styles')
<style>
    body {
        background: transparent;
    }
</style>
@endpush

@section('default-main')
    <div class="container-fluid">
        @yield('main')
    </div>
@endsection

@push('default-scripts')
@stack('scripts')
@endpush
