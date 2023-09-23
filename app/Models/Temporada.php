<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
    use HasFactory;

    //metodo declarado no singular
    public function serie()
    {
        return $this->belongsTo(Series::class);
        //uma Temporada pertence a uma Serie
    }

    public function episodios()
    {
        return $this->hasMany(Episodio::class);
    }
}
