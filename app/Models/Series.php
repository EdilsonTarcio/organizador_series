<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'cover'];
    #protected $primarykey = 'id';
    #protected $with = ['temporadas'];
    //metodo traria sempre as temporadas junto com as Series

    //metodo declarado no plural
    public function temporadas()
    {
        return $this->hasMany(Temporada::class);
        //hasMany um para muitos (Uma Serie possui muitas temporadas)
        
        #return $this->hasMany(Temporada::class, 'series_id', 'id');
        /**
         * series_id -> seria a chave estrangeira dentro da tabela de Temporadas
         * id -> seria a chave primaria em Series ou outra coluna da tabela de Series se for o 
         * padrão não precisa passar no return
         */
    }

    //scopo global
    protected static function booted()
    {
        self::addGlobalScope('ordenar', function(Builder $queryBuilder){
            $queryBuilder->orderBy('nome');
        });
    }

    /*  // scopo local
        public function scopeActive(Builder $quary)
        {
            return $query->where('active', 'sim');
        }
        ... no controller...
        $series = Serie::active()->get();
        ...
    */
}
