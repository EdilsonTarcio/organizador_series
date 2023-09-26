<?php

namespace App\Providers;

use App\Repositories\EloquentSeriesRepository;
use App\Repositories\SeriesRepository;
use Illuminate\Support\ServiceProvider;

class SeriesRepositoryProvider extends ServiceProvider
{
    /**
     * Metodo vai ligar uma interface a uma classe concreta 
     */
    public array $bindings = [
        SeriesRepository::class => EloquentSeriesRepository::class
    ];
    
    
    //depois que criar tem que registrar o provider Config->app.php;
}
