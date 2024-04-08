<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemones extends Model
{
    use HasFactory;

    public function tipo(){
        return $this->belongsTo(Tipo::class, 'tipo_id', 'id');
    }

    public function sexo(){
        return $this->belongsTo(Sexo::class, 'sexo_id', 'id');
    }

    public function categoria(){
        return $this->belongsTo(Categoria::class, 'categoria_id', 'id');
    }

    public function debilidad(){
        return $this->belongsTo(Debilidad::class, 'debilidad_id', 'id');
    }

}
