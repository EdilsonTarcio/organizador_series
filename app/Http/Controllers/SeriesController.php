<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
        return view('series.index', ['series'=>$series],['title'=>$title],['mensagemSucesso'=>$mensagemSucesso]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('series.create');
    }

    /**
     * Store a newly created resource in storage.
     */
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
        #return redirect('/series');
        return to_route('series.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        #dd($request->series);
        Series::destroy($request->series);
        $request->session()->flash('menssagem.sucesso', 'Série Removida com sucesso');
        return to_route('series.index');

    }
}
