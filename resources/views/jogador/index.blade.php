@extends ("templates.main")

@section ("titulo", "Cadastro de Jogadores")

@section("formulario")
    <br/>
    <h1>Cadastro de Jogadores</h1>
    <form action="/jogador" method="POST" class= "row">
        <div class="form-group col-3">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" class="form-control" value= "{{ $jogador->nome }}" required
            />
        </div>
        <div class="form-group col-2">
            <label for="clube_id">Clube:</label>
            <select name="clube_id" id="clube_id" class="form-control" required>
                <option value=""></option>
                @foreach ($clubes as $clube)
                    <option value=" {{ $clube->id }} ">{{ $clube->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-1">
            <label for="posicao">Posição:</label>
            <select name="posicao" id="posicao" class="form-control" required>
                <option value=""></option>
                <option value="goleiro">goleiro</option>
                <option value="defensor">defensor</option>
                <option value="lateral">lateral</option>
                <option value="volante">volante</option>
                <option value="meia">meia</option>
                <option value="atacante">atacante</option>
            </select>
        </div>
        <div class="form-group col-2">
            <label for="data">Data de nascimento</label>
            <input type="date" id="data" name="data" class="form-control" value= "{{ $jogador->data }}" required
            />
        </div>
        <div class="form-group col-1">
            <label for="possuo">Possuo</label>
            </br>
            <input type="checkbox" name="possuo" value= "{{ $jogador->possuo }}"
            />
        </div>
        <div class="form-group col-2">
            @csrf
            <input type="hidden" id="id" name="id" value="{{ $jogador->id }}"/>
            <a href="/jogador" class="btn btn-primary" style="margin-top: 23px;">
            <i class="bi bi-plus-square"></i>Novo</a>
            <button type="submit" class="btn btn-success" style="margin-top: 23px;">
            <i class="bi bi-save"></i>Salvar</button>
        </div>
    </form>
@endsection