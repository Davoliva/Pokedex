<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Debilidad;
use App\Models\Pokemones;
use App\Models\Sexo;
use App\Models\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pokemones = Pokemones::all();
        return view('pokemones.index', ['pokemones' => $pokemones]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //recuperamos los campos para mostrarlo en el formulario
        $tipos = Tipo::all();
        $sexos = Sexo::all();
        $categorias = Categoria::all();
        $debilidades = Debilidad::all();
        return view('pokemones.create', [
            'tipos' => $tipos
            ,'sexos' => $sexos
            ,'categorias' => $categorias
            ,'debilidades' => $debilidades
        ]);

    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //vaidaciones del formulario
        $request->validate([
            'Numero' => 'required|unique:pokemones|max:4',
            'nombrePokemon' => 'required|max:255',
            'habilidadPokemon' => 'required|max:255',
            'alturaPokemon' => 'required|max:10',
            'pesoPokemon' => 'required|max:10',
            'psPokemon' => 'required|max:10',
            'ataquePokemon' => 'required|max:10',
            'defensaPokemon' => 'required|max:10',
            'velocidadPokemon' => 'required|max:10',
            'sexoPokemon' => 'required',
            'tipoPokemon' => 'required',
            'categoriaPokemon' => 'required',
            'debilidadPokemon' => 'required',
            'imagenPokemon' => 'required|image|mimes:jpg,jpeg,png,svg|max:1024'
        ]);

        //
        $pokemones = new Pokemones();
        $pokemones->Numero = $request->input('Numero');
        $pokemones->Nombre = $request->input('nombrePokemon');
        $pokemones->Habilidad = $request->input('habilidadPokemon');
        $pokemones->Peso = $request->input('pesoPokemon');
        $pokemones->Altura = $request->input('alturaPokemon');
        $pokemones->Ps = $request->input('psPokemon');
        $pokemones->Ataque = $request->input('ataquePokemon');
        $pokemones->Defensa = $request->input('defensaPokemon');
        $pokemones->velocidad = $request->input('velocidadPokemon');
        $pokemones->tipo_id = $request->input('tipoPokemon');
        $pokemones->categoria_id = $request->input('categoriaPokemon');
        $pokemones->debilidad_id = $request->input('debilidadPokemon');
        $pokemones->sexo_id = $request->input('sexoPokemon');

        /* $pokemones = $request->all(); */
        if ($request->hasFile('imagenPokemon')) {
            /* $file = $request->file('imagenPokemon'); */
            $path = Storage::putFile('public/images', $request->file('imagenPokemon'));
            $nuevoPath = str_replace('public/','', $path);
            $pokemones->imagen = $nuevoPath;
        }
        $pokemones->save();

        return view("pokemones.message",['msg' => "Registro guardado"]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Pokemones $pokemones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $pokemon = Pokemones::find($id);
        $sexo = Sexo::all();
        $tipo = Tipo::all();
        $categoria = Categoria::all();
        $debilidad = Debilidad::all();
        return view('pokemones.edit',[
                'pokemon' => $pokemon
                ,'tipos' => $tipo
                ,'sexos' => $sexo
                ,'categorias' => $categoria
                ,'debilidades' => $debilidad
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        //vaidaciones del formulario
        $request->validate([
            'Numero' => 'required|max:4|unique:pokemones,Numero,'. $id,
            'nombrePokemon' => 'required|max:255',
            'habilidadPokemon' => 'required|max:255',
            'alturaPokemon' => 'required|max:10',
            'pesoPokemon' => 'required|max:10',
            'psPokemon' => 'required|max:10',
            'ataquePokemon' => 'required|max:10',
            'defensaPokemon' => 'required|max:10',
            'velocidadPokemon' => 'required|max:10',
            'sexoPokemon' => 'required',
            'tipoPokemon' => 'required',
            'categoriaPokemon' => 'required',
            'debilidadPokemon' => 'required',
            'imagenPokemon' => 'required|image|mimes:jpg,jpeg,png,svg|max:1024'
        ]);

        //
        $pokemones = Pokemones::find($id);
        $pokemones->Numero = $request->input('Numero');
        $pokemones->Nombre = $request->input('nombrePokemon');
        $pokemones->Habilidad = $request->input('habilidadPokemon');
        $pokemones->Peso = $request->input('pesoPokemon');
        $pokemones->Altura = $request->input('alturaPokemon');
        $pokemones->Ps = $request->input('psPokemon');
        $pokemones->Ataque = $request->input('ataquePokemon');
        $pokemones->Defensa = $request->input('defensaPokemon');
        $pokemones->velocidad = $request->input('velocidadPokemon');
        $pokemones->tipo_id = $request->input('tipoPokemon');
        $pokemones->categoria_id = $request->input('categoriaPokemon');
        $pokemones->debilidad_id = $request->input('debilidadPokemon');
        $pokemones->sexo_id = $request->input('sexoPokemon');

        /* $pokemones = $request->all(); */
        if ($request->hasFile('imagenPokemon')) {
            /* $file = $request->file('imagenPokemon'); */
            $path = Storage::putFile('public/images', $request->file('imagenPokemon'));
            $nuevoPath = str_replace('public/','', $path);
            $pokemones->imagen = $nuevoPath;
        }else {
            unset($pokemones->imagen);
        }
        $pokemones->save();

        return view("pokemones.message",['msg' => "Registro modificado"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $pokemon = Pokemones::find($id);
        $pokemon->delete();

        return redirect("pokemones");
    }
}
