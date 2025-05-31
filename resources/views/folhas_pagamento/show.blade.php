@extends('layouts.app')

@section('content')
<h1>Folha de Pagamento - Competência: {{ $folha->competencia }}</h1>
<p>Gerada em: {{ date('d/m/Y H:i', strtotime($folha->data_geracao)) }}</p>

<a href="{{ route('folhas-pagamento.index') }}" style="margin-bottom: 20px; display: inline-block;">&laquo; Voltar</a>

<table border="1" cellpadding="6" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Funcionário</th>
            <th>Salário Base</th>
            <th>Adicionais</th>
            <th>Descontos</th>
            <th>Contas a Pagar</th>
            <th>Salário Líquido</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($folha->funcionarios as $func)
        <tr>
            <td>{{ $func->funcionario->nome }}</td>
            <td>R$ {{ number_format($func->salario_base, 2, ',', '.') }}</td>
            <td>R$ {{ number_format($func->adicionais, 2, ',', '.') }}</td>
            <td>R$ {{ number_format($func->descontos, 2, ',', '.') }}</td>
            <td>R$ {{ number_format($func->contas_pagar, 2, ',', '.') }}</td>
            <td><strong>R$ {{ number_format($func->salario_liquido, 2, ',', '.') }}</strong></td>
        </tr>
        @endforeach
    </tbody>
</table>

<p><strong>Total Geral: R$ {{ number_format($folha->valor_total, 2, ',', '.') }}</strong></p>
@endsection
