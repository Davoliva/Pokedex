@extends('layout/template')

@section('title', 'Editar Pokemon')
@section('content')

<!-- component -->
<div class="min-h-screen bg-gray-100 py-6 flex items-center flex-col justify-center sm:py-12">
    <div class="relative py-3 w-full max-w-xl">
      <div class="relative px-4 py-10 bg-white mx-8 md:mx-0 shadow rounded-3xl sm:p-10">
        <div class="max-w-md mx-auto">
          <div class="flex items-center space-x-5">
            <div class="h-14 w-14 bg-yellow-200 rounded-full flex flex-shrink-0 justify-center items-center text-yellow-500 text-2xl font-mono">i</div>
            <div class="block pl-2 font-semibold text-xl self-start text-gray-700">
              <h2 class="leading-relaxed">Editar un Pokemon</h2>
              <p class="text-sm text-gray-500 font-normal leading-relaxed">Editar un pokemon aqui.</p>
            </div>
          </div>

          <div class="" id="error">
            @if ($errors->any())
              <div class="font-regular relative block w-full rounded-lg bg-pink-500 p-4 text-base leading-5 text-white opacity-100">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
              </div>
            @endif
          </div>

          <form action="{{ url('pokemones/'.$pokemon->id) }}" method="POST" enctype="multipart/form-data">
            @method("PUT")
            @csrf

            <div class="divide-y divide-gray-200">
                <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                  <div class="flex flex-col">
                    <label class="leading-loose">Nombre del Pokemon</label>
                    <input type="text" name="nombrePokemon" id="nombre_input" required value="{{ $pokemon->Nombre }}" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="">
                  </div>
                  <div class="flex flex-col">
                    <label class="leading-loose">Numero del Pokemon</label>
                    <input type="text" name="Numero" id="numero_input" value="{{ $pokemon->Numero }}" required class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="">
                  </div>
                  <div class="flex flex-col">
                    <label class="leading-loose">Habilidad</label>
                    <input type="text" name="habilidadPokemon" id="habilidad_input" value="{{ $pokemon->Habilidad }}" required class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="">
                  </div>
                  <div class="flex flex-col">
                    <label class="leading-loose">Peso</label>
                    <input type="text" name="pesoPokemon" id="peso_input" value="{{ $pokemon->Peso }}" required class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="">
                  </div>
                  <div class="flex flex-col">
                    <label class="leading-loose">Altura</label>
                    <input type="text" name="alturaPokemon" id="altura_input" value="{{ $pokemon->Altura }}" required class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="">
                  </div>
                  <div class="flex items-center space-x-4">
                    <div class="flex flex-col">
                        <label class="leading-loose">Sexo</label>
                        <select name="sexoPokemon" id="sexo"  required class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                            <option value="">Selecionar los sexos que puede tener el Pokemon</option>
                            @foreach ($sexos as $sexo)
                                <option value="{{ $sexo->id }}" 
                                @if ($pokemon->sexo_id == $sexo->id)
                                    {{ 'selected '}}
                                @endif>{{ $sexo->nombre}}</option>
                            @endforeach
                        </select>
                        <label class="leading-loose">Tipo</label>
                        <select name="tipoPokemon" id="tipo"  required class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                            <option value="">Selecionar Tipo de Pokemon</option>
                            @foreach ($tipos as $tipo)
                                <option value="{{ $tipo->id }}"
                                  @if ($tipo->id == $pokemon->tipo_id)
                                      {{ 'selected' }}
                                  @endif>{{ $tipo->nombre}}</option>
                            @endforeach
                        </select>
                        <label class="leading-loose">Categoria</label>
                        <select name="categoriaPokemon" id="categoria"  required class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                            <option value="">Selecionar la categoria del Pokemon</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}"
                                  @if ($categoria->id == $pokemon->categoria_id)
                                      {{ 'selected' }}
                                  @endif>{{ $categoria->nombre}}</option>
                            @endforeach
                        </select>
                        <label class="leading-loose">Debilidad</label>
                        <select name="debilidadPokemon" id="debilidad"  required class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                          <option value="">Selecionar la debilidad del pokemon Pokemon</option>
                          @foreach ($debilidades as $debilidad)
                              <option value="{{ $debilidad->id }}"
                                @if ( $debilidad->id == $pokemon->debilidad_id)
                                    {{ 'selected' }}
                                @endif>{{ $debilidad->nombre }}
                              </option>
                          @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="flex flex-col">
                    <label class="leading-loose">Ps</label>
                    <input type="text" name="psPokemon" value="{{ $pokemon->Ps }}" id="ps_input" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="">
                  </div>
                  <div class="flex flex-col">
                    <label class="leading-loose">Ataque</label>
                    <input type="text" name="ataquePokemon" value="{{ $pokemon->Ataque }}" id="ataque_input" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="">
                  </div>
                  <div class="flex flex-col">
                    <label class="leading-loose">Defensa</label>
                    <input type="text" name="defensaPokemon" value="{{ $pokemon->Defensa }}" id="defensa_input" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="">
                  </div>
                  <div class="flex flex-col">
                    <label class="leading-loose">Velocidad</label>
                    <input type="text" name="velocidadPokemon" value="{{ $pokemon->Velocidad}}" id="velocidad_input" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="">
                  </div>
                  <div class="flex flex-col">
                    <img src="/storage/{{ $pokemon->imagen}}" alt="">
                  </div>
                  <div class="flex flex-col">
                    <label class="leading-loose" for="image">Imagen</label>
                    <input type="file" name="imagenPokemon" id="file_input" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                  </div>

                </div>
                <div class="pt-4 flex items-center space-x-4">
    
                    <a href="{{ url('pokemones')}}" class="flex justify-center items-center w-full text-gray-900 px-4 py-3 rounded-md focus:outline-none">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg> Cancelar
                    </a>
    
                    <button class="bg-blue-500 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none">Agregar</button>
                </div>
              </div>
          </form>
          
        </div>
      </div>
    </div>
  </div>

  @endsection