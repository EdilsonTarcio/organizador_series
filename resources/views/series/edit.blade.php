<x-layout title="Editar Série {{$serie->nome}}">
    <x-series.form :action="route('series.update', $serie->id)" :nome="$serie->nome"/>
    <!-- os " : " informa ao blade que é para interpretar como código--> 
</x-layout>