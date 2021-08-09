<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>Dashboard</title>
</head>
<body>
    <form action="/logout" method="POST">
        @csrf
        <a 
            href="/logout"
            onclick="
                event.preventDefault(); 
                this.closest('form').submit();
            ">Sair</a>
    </form>

    @if($nivel === "Gestor")
        <a href="/doc/create">Add</a> <br>
    @endif

    Seja Bem-Vindo {{ $user_infos->name }}, O Seu Nível É {{ $nivel }}

    No Sistema, Você Pode:

    @extends('layouts.verification_nivel', [array($nivel), array($users)])    

    @if($nivel === "Bolsista")
        <h1>Editais</h1>

        @foreach($editais as $edital)
            <h5>{{ $edital->name }}</h5>
            <embed src="/editais/docs/{{ $edital->doc }}.{{ $edital->extension }}" width="800px" height="200px">
        @endforeach
    @endif
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>