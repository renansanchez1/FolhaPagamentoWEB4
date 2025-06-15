@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Ocorrência</h1>

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

    <form action="{{ route('ocorrencias.update', $ocorrencia->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <input type="text" name="descricao" value="{{ old('descricao', $ocorrencia->descricao) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="data" class="form-label">Data</label>
            <input type="date" name="data" value="{{ old('data', $ocorrencia->data) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo</label>
            <select name="tipo" class="form-select" required>
                <option value="Advertência" {{ $ocorrencia->tipo == 'Advertência' ? 'selected' : '' }}>Advertência</option>
                <option value="Suspensão" {{ $ocorrencia->tipo == 'Suspensão' ? 'selected' : '' }}>Suspensão</option>
                <option value="Outro" {{ $ocorrencia->tipo == 'Outro' ? 'selected' : '' }}>Outro</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="funcionario_id" class="form-label">Funcionário</label>
            <select name="funcionario_id" class="form-select" required>
                @foreach($funcionarios as $funcionario)
                    <option value="{{ $funcionario->id }}" {{ $ocorrencia->funcionario_id == $funcionario->id ? 'selected' : '' }}>
                        {{ $funcionario->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('ocorrencias.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
