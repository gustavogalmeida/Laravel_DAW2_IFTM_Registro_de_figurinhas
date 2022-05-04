@extends("templates.main")

@section("titulo", "Cadastro de Clubes")

@section("formulario")
    <br/>
    <h1>Cadastro de Clubes</h1>
    <form action="/clube" method="POST" class="row">
        <div class="form-group col-10">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" class="form-control" value="" {{ $clube->nome }} "" />
        </div>
        <div class="form-group col-2">
            @csrf
            <input type="hidden" id="id" name="id"/>
            <a href="/clube" class="btn btn-primary" style="margin-top: 23px;">
            <i class="bi bi-plus-square"></i>Novo</a>
            <button type="submit" class="btn btn-success" style="margin-top: 23px;">
            <i class="bi bi-save"></i>Salvar</button>
        </div>
    </form>    
@endsection

@section("tabela")
    <br/>
    <h1>Lista de Clubes</h1>
    <table class="table table-striped">
        <colgroup>
            <col width="400">
            <col width="200">
            <col width="100">
            <col width="100">
        </colgroup>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Escudo</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clubes as $clube)
                <tr>
                    <td>{{ $clube->nome }}</td>
                    <td></td>
                    <td> 
                        <a href="/clube/{{ $clube->id }}/edit" class="btn btn-warning">
                            <i class="bi bi-pencil-square"></i>Editar
                        </a>
                    </td>
                    <td>
                        <form action="POSTO" mehod="/clube/{{ $clube->id }}">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE"/>
                            <button>
                                <i class="bi bi-trash">Excluir</i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection 