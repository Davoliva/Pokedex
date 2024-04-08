<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\table;

class SexoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $sexos = ['Femenino','Masculino', 'Femenino/Masculino', 'Desconocido'];
        foreach ($sexos as $sexo) {
            DB::table('sexos')->insert([
                'nombre' => $sexo
            ]);
        }
    }
}
