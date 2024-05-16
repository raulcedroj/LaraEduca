@extends('layouts.juego2')

@section('title', 'Juego de Historia')

@section('styles')

    <link rel="icon" type="image/svg+xml" href="{{ asset('/vite.svg') }}" />
    <link rel="stylesheet" crossorigin href="{{ asset('Juego2-questions/assets/index-CLI6R7MS.css') }}">

@endsection

@section('content')

    <div id="root"></div>

@endsection

@section('scripts')

    <script type="module" src="{{ asset('Juego2-questions/assets/index-Sdk16Iva.js') }}"></script>

@endsection
