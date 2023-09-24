<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;

class TemporadaController extends Controller
{
    
    public function index(Series $serie)
    {//seleciona a temporada

        //$temporadas = $serie->temporadas;
        //busca todas as temporadas forma lenta muitas querys
        //dd($temporadas);

        //forma mais rápida
        $temporadas = $serie->temporadas()->with('episodios')->get();
      
        return view('temporadas.index')->with('temporadas', $temporadas)->with('serie', $serie);
        //envia as temporadas para a view
    }
}
