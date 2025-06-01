@extends('layouts.app')

@section('content')
    <h1>Novo Funcionário</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('funcionarios.store') }}" method="POST"class="form-centralizado">
        <label for="funcionario_id">Funcionário:</label><br>
        @csrf
        <input type="text" name="nome" placeholder="Nome" value="{{ old('nome') }}"><br>
        <input type="text" name="cpf" placeholder="CPF" value="{{ old('cpf') }}"><br>
        <input type="text" name="cargo" placeholder="Cargo" value="{{ old('cargo') }}"><br>
        <input type="number" name="salario" placeholder="Salário" value="{{ old('salario') }}"><br>
        <input type="date" name="data_admissao" placeholder="Data de Admissão" value="{{ old('data_admissao') }}"><br>
        <button type="submit" class="salvar">Salvar</button>
    </form>
@endsection
