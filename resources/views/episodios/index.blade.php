<x-layout title="Episodios" :mensagem-sucesso="$mensagemSucesso">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">                   
                <div class="table-responsive">
                    <form method="POST">
                        @csrf
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Episodios</th>
                            <th class="text-center" scope="col">Visualizado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($episodios as $episodio)
                            <tr>
                            <th scope="row">
                                Episódio {{$episodio->numero}}
                            </th>
                            <td class="text-center">
                                <input type="checkbox" 
                                    name="episodios[]"
                                    value="{{$episodio->id}}"
                                    @if ($episodio->assistido) checked @endif />
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button  class="btn btn-primary btn-sm">Salvar</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>