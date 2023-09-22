<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;
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
        $series = Series::query()->orderBy('nome')->get();
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

    public function store(Request $request)
    {
        /*
            $nomeSerie = $request->input('nome');
            $serie = new Series();
            $serie->nome = $nomeSerie;
            $serie->save();
            #DB::insert('INSERT INTO series (nome) VALUES (?)', [$nomeSerie]);
            */

            #dd($request->all());
        Series::create($request->all());
        #dd($request->all());
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
        return view('series.edit')->with('serie', $series);
    }

    public function update(Series $series, Request $request)
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
