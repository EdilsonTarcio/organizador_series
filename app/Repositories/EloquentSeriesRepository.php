<?php

namespace App\Repositories;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use App\Models\Episodio;
use App\Models\Temporada;
use Illuminate\Support\Facades\DB;

class EloquentSeriesRepository implements SeriesRepository
{
    public function adicionar(SeriesFormRequest $request): Series //retorna uma Serie já criada
    {
        // DB::transaction -> realizad todas as transações e realiza um commit no final 
        // Caso dê erro em uma transação o Laravel realiza o rolback altomaticamente
        return DB::transaction( function() use ($request){
            $serie = Series::create([
                'nome' => $request->nome,
                'cover' =>$request->coverPath
            ]);
        $temporadas=[];
        for ($i = 1; $i <= $request->qtdTemporadas; $i++){
            $temporadas[] = [
                'series_id' => $serie->id,
                'numero' => $i,
                'created_at' => date("Y-m-d H:i:s")
            ];
        }
        Temporada::insert($temporadas);

        $episodios =[];
        foreach ($serie->temporadas as $temporada) {
            for ($j = 1; $j <= $request->epTemp; $j++){
                $episodios[] = [
                    'numero' => $j,
                    'temporada_id' => $temporada->id,
                    'created_at' => date("Y-m-d H:i:s")
                ];
                
            }
        }
        Episodio::insert($episodios);

        return $serie;

        });
    }
}