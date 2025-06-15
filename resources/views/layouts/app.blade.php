<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/funcionarios.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ocorrencias.css') }}">
    <link rel="stylesheet" href="{{ asset('css/create_ocorrencias.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contas.css') }}">


    <title>Folha de Pagamento</title>
</head>
<body>
    <nav>
        <a href="{{ url('/') }}">Início</a>
        <a href="{{ route('funcionarios.index') }}">Funcionários</a>
        <a href="{{ route('ocorrencias.index') }}">Ocorrências</a>
        <a href="{{ route('contas-pagar.index') }}">Contas a Pagar</a>
        <a href="{{ route('folhas-pagamento.index') }}">Folhas de Pagamento</a>
    </nav>

    <hr>

    @yield('content')
</body>
</html>
