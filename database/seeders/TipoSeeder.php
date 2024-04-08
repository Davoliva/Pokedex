<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $tipos = [
            'Fuego'
            ,'Agura'
            ,'Lucha'
            ,'Normal'
            ,'Planta'
            ,'Electrico'
            ,'Planta'
            ,'Tierra'
            ,'Bicho'
            ,'Veneno'
            ,'Volador'
            ,'Hada'
            ,'Roca'
            ,'Acero'
            ,'Hielo'
            ,'Fantasma'
            ,'Psíquico'
        ];

        foreach ($tipos as $tipo) {
            DB::table('tipos')->insert([
                'nombre' => $tipo
            ]);
        }
    }
}
