@extends('layouts.app')

@section('content')
<h1>Folhas de Pagamento</h1>

@if(session('success'))
    <div style="color: green; margin-bottom: 20px;">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('folhas-pagamento.create')}}" >
    Gerar Nova Folha
</a>

@if ($folhas->count() > 0)
<table border="1" cellpadding="6" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Competência</th>
            <th>Data de Geração</th>
            <th>Valor Total</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($folhas as $folha)
        <tr>
            <td>{{ $folha->competencia }}</td>
            <td>{{ date('d/m/Y H:i', strtotime($folha->data_geracao)) }}</td>
            <td>R$ {{ number_format($folha->valor_total, 2, ',', '.') }}</td>
            <td>
                <a href="{{ route('folhas-pagamento.show', $folha->id) }}">Ver</a> |
                <form action="{{ route('folhas-pagamento.destroy', $folha->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Confirma exclusão?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-link-delete">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p>Nenhuma folha gerada até o momento.</p>
@endif
@endsection
