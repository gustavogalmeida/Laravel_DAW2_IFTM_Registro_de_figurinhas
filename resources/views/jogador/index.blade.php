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
            <input type="checkbox" name="possuo" value= "X"
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

@section("tabela")
    <br/>
    <h1>Lista de Jogadores</h1>
    <table class="table table-striped">
        <colgroup>
            <col width="250">
            <col width="150">
            <col width="30">
            <col width="80">
            <col width="100">
            <col width="200">
            <col width="80">
            <col width="80">
        </colgroup>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Data de nascimento</th>
                <th>Posição</th>
                <th>Possuo?</th>
                <th>Clube</th>
                <th>Escudo</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jogadors as $jogador)
                <tr>
                    <td>{{ $jogador->nome }}</td>
                    <td>{{ $jogador->data }}</td>
                    <td>{{ $jogador->posicao }}</td>
                    <td>{{ $jogador->possuo }}</td>
                    <td>{{ $clube->nome }}</td>
                    <td>
                        <img src='{{ str_replace("public/", "storage/", $clube->escudo) }}' width="100"></img>
                    </td>
                    <td> 
                        <a href="/jogador/{{ $jogador->id }}/edit" class="btn btn-warning">
                            <i class="bi bi-pencil-square"></i>Editar
                        </a>
                    </td>
                    <td>
                    <form method="POST" action="/jogador/{{ $jogador->id }}">
								@csrf
								<input type="hidden" name="_method" value="DELETE" />
								<button type="button" class="btn btn-danger" onclick="excluir(this);">
									<i class="bi bi-trash"></i> Excluir
								</button>
					</form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection 

<script>
	function excluir(btn) {
		Swal.fire({
			"title": "Deseja realmente excluir?",
			"icon": "warning",
			"showCancelButton": true,
			"cancelButtonText": "Cancelar",
			"confirmButtonText": "Confirmar",
			"confirmButtonColor": "#3085d6",
			"cancelButtonColor": "#d33"
		}).then(function(result) {
			if (result.isConfirmed) {
				$(btn).parents("form").submit();
			}
		});
	}
</script>