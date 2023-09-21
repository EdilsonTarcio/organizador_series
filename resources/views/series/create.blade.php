<x-layout title="Nova Série">
    <form action="{{url('series')}}" method="POST">
        @csrf
        <label for="name">Nome:</label>
        <input type="text" id="nome" name="nome">
        <button type="submit" class="btn btn-success">Cadastrar</button>
    </form>
</x-layout>