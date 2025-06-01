@extends('layouts.app')

@section('content')
    <h1>Lista de Ocorrências</h1>

    @if (session('success'))
        <div class="message-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($ocorrencias->count())
        <a href="{{ route('ocorrencias.create') }}" class="btn-primary">Nova Ocorrência</a>

        <table class="table-zendesk">
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
                            <a href="{{ route('ocorrencias.edit', $ocorrencia->id) }}" class="link-action">Editar</a> |
                            <form action="{{ route('ocorrencias.destroy', $ocorrencia->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?')" class="btn-link-delete">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="message-error">Nenhuma ocorrência cadastrada.</p>
        <a href="{{ route('ocorrencias.create') }}" class="btn-primary">Nova Ocorrência</a>
    @endif
@endsection
