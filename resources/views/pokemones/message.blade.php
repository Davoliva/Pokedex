@extends('layout/template')

@section('title', 'Agregar Pokemon')
@section('content')

<main>
    <div>
        <h2>{{ $msg }}</h2>

        <a href="{{ url('pokemones')}}" class="bg-blue-500 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none"> Regresar</a>
    </div>
</main>

@endsection