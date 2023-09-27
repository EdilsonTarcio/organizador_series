<?php

namespace App\Http\Controllers;

use App\Models\Episodio;
use App\Models\Temporada;
use Illuminate\Http\Request;

class EpisodesController
{
    public function index(Temporada $temporada)
    {
        return view('episodios.index', [
            'episodios' => $temporada->episodios,
            'mensagemSucesso' => session('mensagem.sucesso')
        ]);
    }

    public function update(Request $request, Temporada $temporada)
    {
        $episodiosAssistidos = $request->episodios;

        $temporada->episodios->each(function(Episodio $episodio) use ($episodiosAssistidos){
            //para cada episodios da temporada irá executar essa função metodo "each()"
            // e a função recebe cada um desses episodios "function(Episodio $episodio){}"

            $episodio->assistido = in_array($episodio->id, $episodiosAssistidos);
            //"assistido' true
        });
        $temporada->push();
        //pega todos os episodios e salva
        return to_route('episodios.index', $temporada->id)
        ->with('mensagem.sucesso', 'Episódios marcados como assisitidos!');
    }
}