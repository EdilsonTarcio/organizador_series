<x-layout title="Nova Série">
    <!-- os " : " informa ao blade que é para interpretar como código--> 
    <form action="{{ route('series.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row md-3">
            <div class="col-8">
                <label for="name">Nome:</label>

                <input type="text"
                autofocus
                id="nome"
                name="nome"
                class="form-control"
                value="{{old('nome')}}">
            </div>
            <div class="col-2">
                <label for="name">Temporadas:</label>
                <input type="text"
                id="qtdTemporadas"
                name="qtdTemporadas"
                class="form-control"
                value="{{old('qtdTemporadas')}}">
            </div>
            <div class="col-2">
                <label for="name">Ep / Temp:</label>
                <input type="text"
                id="epTemp"
                name="epTemp"
                class="form-control"
                value="{{old('epTemp')}}">
            </div>
            <div class="col-12">
                <label for="cover" class="form-label">Capa</label>
                <input type="file"
                    id="cover" 
                    name="cover" 
                    class="form-control"
                    accept="image/jpeg, image/png">
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-success">Enviar</button>
    </form>
</x-layout>