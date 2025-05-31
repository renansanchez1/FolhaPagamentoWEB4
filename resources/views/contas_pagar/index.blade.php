@extends('layouts.app')

@section('content')
    <h1>Contas a Pagar</h1>

    <a href="{{ route('contas-pagar.create') }}">Nova Conta</a>

    @if (session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Funcionário</th>
                <th>Descrição</th>
                <th>Valor</th>
                <th>Vencimento</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contas as $conta)
                <tr>
                    <td>{{ $conta->funcionario->nome ?? 'N/D' }}</td>
                    <td>{{ $conta->descricao }}</td>
                    <td>R$ {{ number_format($conta->valor, 2, ',', '.') }}</td>
                    <td>{{ \Carbon\Carbon::parse($conta->data_vencimento)->format('d/m/Y') }}</td>
                    <td>{{ ucfirst($conta->status) }}</td>
                    <td>
                        <a href="{{ route('contas-pagar.edit', $conta->id) }}">Editar</a> |
                        <form action="{{ route('contas-pagar.destroy', $conta->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Excluir conta?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
