<x-layout title="Temporadas de {!! $serie->nome !!}">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">                   
                <div class="table-responsive">
                    <table class="table mb-0">
                        Serie: {{$serie->nome}}
                        <thead>
                            <tr>
                            <th></th>
                            <th scope="col">Temporada</th>
                            <th class="text-center" scope="col">Episodios por temporada</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($temporadas as $temporada)
                            <tr>
                            <th>
                                <img src="{{ asset('storage/'. $serie->cover) }}" class="avatar rounded mr-3" alt="Capa da série">
                            </th>
                            <th scope="row">
                                <a href="{{ route('episodios.index', $temporada->id) }}">
                                    Temporada {{$temporada->numero}}
                                </a>
                            </th>
                            <td class="text-center">
                               {{$temporada->numeroEpisodiosAssistidos()}} / {{$temporada->episodios->count()}}</td>
                                <!-- cont() soma a quantidade de episodios tipo um contador -->                        
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a class="btn btn-primary btn-sm" href="{{ url()->previous() }}">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</x-layout>