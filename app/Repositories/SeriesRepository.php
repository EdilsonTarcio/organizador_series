<?php

namespace App\Repositories;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;

interface SeriesRepository
{
    public function adicionar(SeriesFormRequest $request): Series; //retorna uma Serie já criada
    /**
     * A interface extende o uso da classe que irá realizar ações no banco de dados
     * O controler irá olhar para a interface enquanto o repositório faz a tratariva com o banco independente da 
     * tecnologia utilizada, PDO, Eloquent, Doctrine.... qualquer coisa e a interface irá retornar 
     * o que o controller espera consumindo os dados do banco que o repository trouxe.
     * 
     * Para utilizar tem que criar um provider para prover esse serviço de interface
     * php artisan make:provider SeriesRepositoryProvider
     * 
     * ele irá ligar uma interface a uma classe concreta
     */ 

}