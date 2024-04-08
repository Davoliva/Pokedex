<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categorias = ['Llama'
        ,'Semilla'
        ,'Tortuga'
        ,'Armazon'
        ,'Gusano'
        ,'Ratón'
        ,'Capullo'
        ,'Mariposa'
        ,'Pájaro'
        ,'Serpiente'
        ,'Pin Veneno'
        ,'Hada'
        ,'Globo'
        ,'Zorro'
        ,'Murciélago'
        ,'Hierba'
        ,'Hongo'
        ,'Insecto'
        ,'Topo'
        ,'Gato'
        ,'Mono'
        ,'Pato'
        ,'Perro'
        ];

        foreach ($categorias as $categoria) {
            DB::table('categorias')->insert([
                'nombre' => $categoria
            ]);
            
        }

    }
}
