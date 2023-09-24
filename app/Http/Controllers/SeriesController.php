<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Episodio;
use App\Models\Temporada;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        //return redirect('https://google.com');
            /*$data['series']=[
                'Onepiece',
                'B.O.',
                'The Whitch',
                'O manupulador',
                'Demolidor'
            ];
            $data['titles'] = 'Séries';*/
            #$series = DB::select('SELECT id, nome FROM series;');
            #$series = Series::all();
        //Ordenando pelo escopo global
        $series = Series::query()->get();
        //dd($series);
        $title = 'Séries';
        $mensagemSucesso = $request->session()->get('mensagem.sucesso');
        $mensagemDelecao = $request->session()->get('mensagem.delecao');
        return view('series.index')->with('series', $series)
        ->with('title', $title)
        ->with('mensagemDelecao', $mensagemDelecao)
        ->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(/*Request*/ SeriesFormRequest $request)
    {
        /*
            $nomeSerie = $request->input('nome');
            $serie = new Series();
            $serie->nome = $nomeSerie;
            $serie->save();
            #DB::insert('INSERT INTO series (nome) VALUES (?)', [$nomeSerie]);
        */

        /* //enviado para o Request SeriesFormRequest
        $request->validate([
            'nome' => ['required', 'min:3']
        ]);*/
        //caso o validate não satisfaça é redirecionado para a ultima rota com os dados em flash messagem
        //Series::create($request->all());
        $serie = Series::create($request->all());
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


        #return redirect('/series');
        #$request->session()->flash('mensagem.sucesso', "Serie '{$request->nome}' adicionada com sucesso");
        return to_route('series.index')
        ->with('mensagem.sucesso', "Serie '{$request->nome}' adicionada com sucesso");
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Series $series)
    {
        //lista todas as temporadas da Serie
        //(temporadas) nome da função de relacionamento em forma de propriedade
        //(temporadas()) nome da função de relacionamento em forma de metodo da acesso ao relacionamento tem que usar o ->get() para pegar a coleção
        //dd($series->temporadas);
        return view('series.edit')->with('serie', $series);
    }

    public function update(Series $series, /*Request*/ SeriesFormRequest $request)
    {
        #$series->nome = $request->nome;
        $series->fill($request->all());
        $series->save();
        return to_route('series.index')->with('mensagem.sucesso', "Série '{$series->nome}' Atualizada com sucesso");
    }
    /*como vem um inteiro da rota passando o nome da model como parametro da função
    o Laravel já busca os dados*/
    public function destroy(Series $series, Request $request)
    {//já entra na funçai fazendo um select na model buscando a serie

        #$serie = Series::find($request->series);
        #Series::destroy($request->series);
        $series->delete();
        #$request->session()->flash('mensagem.delecao', "Série '{$series->nome}' Removida com sucesso");
        return to_route('series.index')
        ->with('mensagem.delecao', "Série '{$series->nome}' Removida com sucesso");

    }
}
