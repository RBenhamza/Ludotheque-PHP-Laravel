@extends('accueil.master')

@section('navbar')
    @parent
@endsection
@section('content')
<html>
<head>
    <title>Liste des jeux</title>
</head>
<div>
    <a href="{{route("jeux.create")}}" class="button">Ajouter un jeu</a>
{{--    <a href="{{route("jeux.tri")}}" class="button">Trier les jeux a->z </a>--}}

    <form action="{{route('jeux.tri')}}" method="GET">
        <label for="selectTri"> <select id="selectTri" name="tri" onchange="this.form.submit()">
            <option value="#" selected>--Trier par--</option>
            <option value="nom">nom</option>
            <option value="nombre_joueurs">nombre de joueurs</option>
            <option value="duree">durée</option>
        </select></label>
    </form>
</div>


<body>
<h2>La liste des jeux</h2>
    <table border="1px">
        <tr>
            <td>Nom</td><td>Description</td><td>Photo</td><td>Theme</td><td>Durée</td><td>Nombre de joueurs</td><td>Editeur</td><td></td>
        </tr>
        @foreach($jeux as $jeu)
            <tr>
                <td>{{$jeu->nom}}</td>
                <td> {{$jeu->description}}</td>
                <td><img src="{{$jeu->url_media}}"></td>
                <td>{{$jeu->theme->nom}}</td>
                <td>{{$jeu->duree}}</td>
                <td>{{$jeu->nombre_joueurs}}</td>
                <td>{{$jeu->editeur->nom}}</td>
                <td><a href = {{route('jeux.show',$jeu->id)}}>Plus d'infos</a></td>
            </tr>
        @endforeach
    </table>
</body>
</html>
@endsection
