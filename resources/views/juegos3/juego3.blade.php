@extends('layouts.juego3')

@section('title', 'Juego de Geografia')

@section('styles')

    <link rel="icon" type="image/svg+xml" href="{{ asset('/vite.svg') }}" />
    <link rel="stylesheet" crossorigin href="{{ asset('Juego3-map/assets/index-DXY9jgvh.css') }}">

@endsection

@section('content')

    <div id="root"></div>

@endsection

@section('scripts')

    <script type="module" src="{{ asset('Juego3-map/assets/index-DiiIBXeA.js') }}"></script>

@endsection
