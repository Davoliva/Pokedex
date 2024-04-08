@extends('layout/template')

@section('title', 'Pokédex')
@section('content')

<main>
    <div class="">
       {{--  GRID START --}}
       <section class="bg-white dark:bg-gray-900">
        <div class="container px-6 py-10 mx-auto">
            <h1 class="w-48 h-2 mx-auto text-4xl text-2xl font-bold text-white">Pokédex</h1>
            
            <div class="mt-8 mb-2 flex justify-between pl-4 pr-2">
                <a href="{{ url('pokemones/create')}}" class="text-lg block font-semibold py-2 px-6 text-green-100 hover:text-white bg-green-400 rounded-lg shadow hover:shadow-md transition duration-300">Agregar Pokemon</a>
            </div>
    
            <div class="grid grid-cols-1 gap-8 mt-8 xl:mt-12 xl:gap-12 sm:grid-cols-2 xl:grid-cols-4 lg:grid-cols-3">

                @foreach ($pokemones as $pokemon)

                    {{-- CARD --}}
                    <div class="w-full p-6 bg-white rounded-xl shadow-xl hover:shadow-2xl hover:scale-105 transition-all transform duration-500">
                        @if ($pokemon->imagen)
                            <img class="w-full object-cover rounded-t-md" src="/storage/{{ $pokemon->imagen}}" alt="" />
                        @else
                        {{$pokemon->id}}
                        <img class="w-full object-cover rounded-t-md" src="https://images.unsplash.com/photo-1509223197845-458d87318791" alt="" />
                        @endif
                        
                        <div class="mt-4" x-data="app()">
                            <h1 class="text-2xl font-bold text-gray-700">{{ $pokemon->Nombre}}</h1>
                            <p class="text-sm mt-2 text-gray-700">Categoria: {{ $pokemon->categoria->nombre}}</p>
                            <div class="mt-3 space-x-4 flex p-1">
                                 <p class="text-sm mt-2 text-gray-700"><span class="font-bold">PS:</span> {{ $pokemon->Ps}}</p>
                                 <p class="text-sm mt-2 text-gray-700"><span class="font-bold">Ataque:</span> {{ $pokemon->Ataque}}</p>
                                 <p class="text-sm mt-2 text-gray-700"><span class="font-bold">Defensa:</span> {{ $pokemon->Defensa}}</p>
                                 <p class="text-sm mt-2 text-gray-700"><span class="font-bold">Velocidad:</span> {{ $pokemon->Velocidad}}</p>
                            </div>
                            <div class=" space-x-4 flex p-1">
                                <p class="text-sm mt-2 text-gray-700"><span class="font-bold">Tipo:</span> {{ $pokemon->tipo->nombre}}</p>
                                <p class="text-sm mt-2 text-gray-700"><span class="font-bold">Debilidad:</span> {{ $pokemon->debilidad->nombre}}</p>
                           </div>
                            <div class="space-x-4 flex p-1">
                                <p class="text-sm mt-2 text-gray-700"><span class="font-bold">Tipo:</span>  {{ $pokemon->sexo->nombre}}</p>
                            </div>
                            <div class="mt-4 mb-2 flex justify-between pl-4 pr-2">
                                <a href="{{ url('pokemones/'.$pokemon->id.'/edit') }}" class="text-lg block font-semibold py-2 px-6 text-green-100 hover:text-white bg-green-400 rounded-lg shadow hover:shadow-md transition duration-300">Editar</a>
                                <form action="{{ url('pokemones/'.$pokemon->id)}}" method="POST">
                                    @method("DELETE")
                                    @csrf
                                    <button type="submit" class="text-lg block font-semibold py-2 px-6 text-green-100 hover:text-white bg-pink-500 rounded-lg shadow hover:shadow-md transition duration-300">Borrar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    
                @endforeach
          
            </div>
        </div>
    </section>
      {{--  GRID END --}}
      
    </div>
</main>

@endsection