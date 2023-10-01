<x-layout title="{{$title}}" :mensagem-sucesso="$mensagemSucesso">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">                   
                <div class="row">
                    <h4 class="col-xl-6  header-title mt-0 mb-1">{{$title}}</h4>
                    <a href="series/create" type="button" class="col-xl-6 btn btn-success">Adicionar</a>
                </div>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th>Capa</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($series as $serie)
                            <tr>
                            <th scope="row">{{$serie->id}}</th>
                            <td>
                                <img src="{{ asset('storage/'. $serie->cover) }}" class="avatar rounded mr-3" alt="Capa da série">
                            </td>
                            <td>
                                <a href=" {{ route('temporada.index', $serie->id) }} ">
                                    {{$serie->nome}}</td>
                                </a>
                            <td>
                                <span class="d-flex button-list">
                                    <a href="{{route('series.edit', $serie->id)}}" class="btn btn-primary btn-sm">
                                        editar
                                    </a>
                                    <form action="{{route('series.destroy', $serie->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Apagar</button>
                                    </form>
                                </span>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layout>