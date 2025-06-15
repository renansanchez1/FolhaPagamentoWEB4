@extends('layouts.app')

@section('content')
    <h1>Funcionários</h1>

    @if (session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('funcionarios.create') }}">Novo Funcionário</a>

    <ul>
        @foreach ($funcionarios as $funcionario)
            <li>{{ $funcionario->nome }} - {{ $funcionario->cargo }}</li>
        @endforeach
    </ul>
@endsection
