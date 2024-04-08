<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DebilidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $debilidades = [
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

        foreach ($debilidades as $debilidad) {
            DB::table('debilidades')->insert([
                'nombre' => $debilidad
            ]);
        }
    }
}
