<form action="{{ $action }}" method="POST">
    @csrf
    @isset($nome)
        <!-- Se o nome for definido, quer dizer que é uma atualização, com isso muda o method para put -->
        @method('PUT')
    @endisset
    <label for="name">Nome:</label>
    <input type="text"
            id="nome"
            name="nome"
            class="form-control"
            @isset($nome)
                value="{{$nome}}"
            @endisset required>
            <br>
    <button type="submit" class="btn btn-success">Enviar</button>
</form>