@extends('layouts.app')

@section('content')
    <h1>Nova Conta a Pagar</h1>

    <form action="{{ route('contas-pagar.store') }}" method="POST" class="form-centralizado">
        @csrf

        <label for="funcionario_id">Conta:</label>
        <select name="funcionario_id" required>
            <option value="">-- Selecione --</option>
            @foreach ($funcionarios as $funcionario)
                <option value="{{ $funcionario->id }}">{{ $funcionario->nome }}</option>
            @endforeach
        </select><br>

        <input type="text" name="descricao" placeholder="Descrição"><br>
        <input type="number" name="valor" step="0.01" placeholder="Valor"><br>
        <input type="date" name="data_vencimento" placeholder="Data de Vencimento"><br>

        <label for="status">Status:</label>
        <select name="status" required>
            <option value="pendente">Pendente</option>
            <option value="pago">Pago</option>
        </select><br>

        <button type="submit"class="salvar">Salvar</button>
    </form>
@endsection
