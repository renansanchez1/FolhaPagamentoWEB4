@extends('layouts.app')

@section('content')
    <h1>Lista de Ocorrências</h1>

    @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('ocorrencias.create') }}">Nova Ocorrência</a>

    @if ($ocorrencias->count())
        <table border="1" cellpadding="8" cellspacing="0">
            <thead>
                <tr>
                    <th>Funcionário</th>
                    <th>Descrição</th>
                    <th>Tipo</th>
                    <th>Valor</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ocorrencias as $ocorrencia)
                    <tr>
                        <td>{{ $ocorrencia->funcionario->nome ?? 'Não encontrado' }}</td>
                        <td>{{ $ocorrencia->descricao }}</td>
                        <td>{{ $ocorrencia->tipo }}</td>
                        <td>R$ {{ number_format($ocorrencia->valor, 2, ',', '.') }}</td>
                        <td>{{ \Carbon\Carbon::parse($ocorrencia->data)->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('ocorrencias.edit', $ocorrencia->id) }}">Editar</a> |
                            <form action="{{ route('ocorrencias.destroy', $ocorrencia->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Nenhuma ocorrência cadastrada.</p>
    @endif
@endsection
