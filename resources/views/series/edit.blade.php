<x-layout title="Editar Série {{$serie->nome}}">
    <form action="{{ route('series.update', $serie->id) }}" method="POST">
        @csrf
        <!-- Se o nome for definido, quer dizer que é uma atualização, com isso muda o method para put -->
        @method('PUT')
        <label for="name">Nome:</label>
        <input type="text"
                id="nome"
                name="nome"
                class="form-control"
                value="{{$serie->nome}}">
        <button type="submit" class="btn btn-success">Enviar</button>
    </form>
</x-layout>