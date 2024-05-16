@extends('layouts.juego1')

@section('title', 'Juego Musica')

@section('styles')

    <link rel="icon" type="image/svg+xml" href="{{ asset('/vite.svg') }}" />
    <link rel="stylesheet" crossorigin href="{{ asset('Juego1-music/assets/index-BEA8sv_m.css') }}">

@endsection

@section('content')

    <div id="root"></div>

@endsection

@section('scripts')

    <script type="module" src="{{ asset('Juego1-music/assets/index-D5tsXlzF.js') }}"></script>

@endsection
