@extends('layouts.app')

@section('content')
    <h1>Nova Ocorrência</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('ocorrencias.store') }}" method="POST" class="form-centralizado">
        @csrf

        <label for="funcionario_id">Ocorrência:</label><br>
        <select name="funcionario_id" required>
            <option value="">-- Selecione --</option>
            @foreach ($funcionarios as $funcionario)
                <option value="{{ $funcionario->id }}" {{ old('funcionario_id') == $funcionario->id ? 'selected' : '' }}>
                    {{ $funcionario->nome }}
                </option>
            @endforeach
        </select><br><br>

        <input type="text" name="descricao" placeholder="Descrição" value="{{ old('descricao') }}"><br>
        <input type="text" name="tipo" placeholder="Tipo" value="{{ old('tipo') }}"><br>
        <input type="number" name="valor" step="0.01" placeholder="Valor" value="{{ old('valor') }}"><br>
        <input type="date" name="data" value="{{ old('data') }}"><br>

        <button type="submit" class="salvar">Salvar</button>
    </form>
@endsection
