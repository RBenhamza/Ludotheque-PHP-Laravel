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
    @if (Route::has('login'))
        @auth
            <a href="{{route("jeux.create")}}" style="text-decoration:none;"><button type="button" class="btn btn-success">Ajouter un jeu
                </button></a>
        @endauth
        @else
            <div></div>
        @endif

<br>
    <br>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-xl-4">
                    <form action="{{route('jeux.index')}}" method="GET">
                        <label for="selectTri"><h4>Trier par : </h4></label>
                        <select class="form-control" id="selectTri" name="tri" onchange="this.form.submit()">
                            <option value="none">--Trier par--</option>
                            <option value="nom">nom</option>
                            <option value="nombre_joueurs">nombre de joueurs</option>
                            <option value="duree">durée</option>
                        </select>
                    </form>
                </div>
                <div class="col-sm-12 col-md-4 col-xl-4">
                    <form action="{{route('jeux.index')}}" method="GET">
                        <label for="triEditeur"><h4>Choix de l'éditeur</h4></label>
                        <select class="form-control" id="triEditeur" name="editeur_id" onchange="this.form.submit()">
                            <option value="none">--Editeurs--</option>
                            @foreach($editeurs as $editeur)
                                <option value="{{$editeur->id}}" @if($editeur->id==$editeur_id) selected @endif>{{$editeur->nom}}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
                <div class="col-sm-12 col-md-4 col-xl-4">
                    <form action="{{route('jeux.index')}}" method="GET">
                        <label for="triTheme"><h4>Choix du thème</h4></label>
                        <select class="form-control" id="triTheme" name="themes_id" onchange="this.form.submit()">
                            <option value="none">--Themes--</option>
                            @foreach($themes as $theme)
                                <option value="{{$theme->id}}" @if($theme->id==$themes_id) selected @endif>{{$theme->nom}}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
                <div class="col-sm-12 col-md-4 col-xl-4">
                    <form action="{{route('jeux.index')}}" method="GET">
                        <label for="triMeca"><h4>Choix de la mécanique</h4></label>
                        <select class="form-control" id="triMeca" name="mecanique_id" onchange="this.form.submit()">
                            <option value="none">--Meca--</option>
                            @foreach($meca as $m)
                                    <option value="{{$m->id}}" @if($m->id==$mecanique_id) selected @endif>{{$m->nom}}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
            </div>

        </div>
</div>

<body>
<h2 class="display-4 text-center text-gray p-md-3">La liste des jeux</h2>
    <table border="1px">
        <tr>
            <td>Nom</td><td>Description</td><td>Photo</td><td>Theme</td><td>Durée</td><td>Nombre de joueurs</td><td>Editeur</td><td>Mécanique</td><td>Voir plus</td>
        </tr>
        @foreach($jeux as $jeu)
            <tr>
                <td>{{$jeu->nom}}</td>
                <td> {{$jeu->description}}</td>
                <td><img src="{{$jeu->url_media}}" width="200" height="200"></td>
                <td>{{$jeu->theme->nom}}</td>
                <td>{{$jeu->duree}}</td>
                <td>{{$jeu->nombre_joueurs}}</td>
                <td>{{$jeu->editeur->nom}}</td>
                <td>@foreach($jeu->mecaniques as $meca)
                        {{$meca->nom}} <br>
                    @endforeach</td>∕
                <td><a href = {{route('jeux.show',$jeu->id)}}>Plus d'infos</a></td>
            </tr>
        @endforeach
    </table>
</body>
</html>
@endsection
