<x-layout title="{{$title}}">
    <div class="col-lg-6">
        @isset($mensagemSucesso)        
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                {{ $mensagemSucesso }}
            </div>
        </div>
        @endisset
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
                            <th scope="col">Nome</th>
                            <th scope="col">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($series as $serie)
                            <tr>
                            <th scope="row">{{$serie->id}}</th>
                            <td>{{$serie->nome}}</td>
                            <td>
                                <form action="{{route('series.destroy', $serie->id) }}" method="post">
                                    @csrf
                                    @method('DELETE');
                                    <button type="submit" class="btn btn-danger">Apagar</button>
                                </form>
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