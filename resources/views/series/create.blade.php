<x-layout title="Nova Série">
    <x-series.form :action="route('series.store')" :nome="old('nome')" :update="false"/>
    <!-- os " : " informa ao blade que é para interpretar como código--> 
</x-layout>