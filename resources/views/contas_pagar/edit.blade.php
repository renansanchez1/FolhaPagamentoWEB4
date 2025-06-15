@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Conta a Pagar</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Erro!</strong> Verifique os campos abaixo:<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('contas-pagar.update', $conta->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <input type="text" name="descricao" class="form-control" value="{{ old('descricao', $conta->descricao) }}" required>
        </div>

        <div class="mb-3">
            <label for="valor" class="form-label">Valor</label>
            <input type="number" name="valor" class="form-control" step="0.01" value="{{ old('valor', $conta->valor) }}" required>
        </div>

<div class="mb-3">
    <label for="data_vencimento" class="form-label">Data de Vencimento</label>
    <input type="date" name="data_vencimento" class="form-control" 
        value="{{ old('data_vencimento', \Carbon\Carbon::parse($conta->data_vencimento)->format('Y-m-d')) }}" required>
</div>


        <div class="mb-3">
            <label for="funcionario_id" class="form-label">Funcionário</label>
            <select name="funcionario_id" class="form-select" required>
                @foreach ($funcionarios as $funcionario)
                    <option value="{{ $funcionario->id }}" {{ $conta->funcionario_id == $funcionario->id ? 'selected' : '' }}>
                        {{ $funcionario->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('contas-pagar.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
