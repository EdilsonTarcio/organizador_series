<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('temporadas', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('numero');
            //unsignedTinyInteger = inteiro pequeno positivo
            
            //modo atual de ciar a chave estrangeira:
            $table->foreignId('series_id')->constrained()->onDelete('cascade');

            /* modo literal de criar a chave estrangeira:
                $table->unsignedInteger('series_id');
                //unsignedInteger = inteiro grande positivo usado como padrão no auto incremento
                $table->foreign('series_id')->references('id')->on('series');
                //1ª coluna em temporadas 2ª coluna em Series 3ª tabela Series
            */
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temporadas');
    }
};
