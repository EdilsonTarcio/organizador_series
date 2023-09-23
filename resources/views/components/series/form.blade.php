<form action="{{ $action }}" method="POST">
    @csrf
    @if($update)
        <!-- Se o nome for definido, quer dizer que é uma atualização, com isso muda o method para put -->
        @method('PUT')
    @endif
    <label for="name">Nome:</label>
    <input type="text"
            id="nome"
            name="nome"
            class="form-control"
            @isset($nome)
                value="{{$nome}}"
            @endisset>
            <br>
    <button type="submit" class="btn btn-success">Enviar</button>
</form>