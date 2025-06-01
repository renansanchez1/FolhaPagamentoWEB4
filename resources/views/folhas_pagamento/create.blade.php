@extends('layouts.app')

@section('content')
<h1>Gerar Folha de Pagamento</h1>

@if($errors->any())
    <div style="color: red; margin-bottom: 20px;">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('folhas-pagamento.store') }}" method="POST">
    @csrf
    <label for="competencia">Competência (Ano-Mês):</label>
    <input type="month" name="competencia" id="competencia" required>
    <button type="submit" class="salvar">Gerar</button>
</form>

<a href="{{ route('folhas-pagamento.index') }}" style="margin-top: 20px; display: inline-block;" class="botao-voltar">&laquo; Voltar</a>
@endsection
