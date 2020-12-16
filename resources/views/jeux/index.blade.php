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

    <form action="{{route('jeux.index')}}" method="GET">
        <label for="selectTri">Trier par : </label>
        <select id="selectTri" name="tri" onchange="this.form.submit()">
            <option value="none">--Trier par--</option>
            <option value="nom">nom</option>
            <option value="nombre_joueurs">nombre de joueurs</option>
            <option value="duree">durée</option>
        </select>
    </form>
</div>
<div>
    <form action="{{route('jeux.index')}}" method="GET">
        <label for="triEditeur">Choix de l'éditeur</label>
        <select id="triEditeur" name="editeur_id" onchange="this.form.submit()">
            <option value="none">--Editeurs--</option>
            @foreach($editeurs as $editeur)
                <option value="{{$editeur->id}}" @if($editeur->id==$editeur_id) selected @endif>{{$editeur->nom}}</option>
            @endforeach
        </select>
    </form>
</div>
<div>
    <form action="{{route('jeux.index')}}" method="GET">
        <label for="triTheme">Choix du theme</label>
        <select id="triTheme" name="themes_id" onchange="this.form.submit()">
            <option value="none">--Themes--</option>
            @foreach($themes as $theme)
                <option value="{{$theme->id}}" @if($theme->id==$themes_id) selected @endif>{{$theme->nom}}</option>
            @endforeach
        </select>
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
