@extends('layouts.app')

@section('content')
    <h1>Funcionários</h1>
    <a href="{{ route('funcionarios.create') }}">Novo Funcionário</a>

    <ul>
        @foreach($funcionarios as $funcionario)
            <li>
                <a href="{{ route('funcionarios.show', $funcionario->id) }}">
                    {{ $funcionario->nome }} - {{ $funcionario->cargo }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection
