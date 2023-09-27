<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nome',
        'series_id'
    ];

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

    public function numeroEpisodiosAssistidos(): int
    {
        return $this->episodios
        ->filter(fn ($episodios) => $episodios->assistido)
        ->count();
    }
}
