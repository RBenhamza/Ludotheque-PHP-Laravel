@extends('accueil.master')

@section('navbar')
    @parent
@endsection
@section('content')
<title>Creation d'un jeu</title>
<form action="{{route('jeux.store')}}" method="POST">
    {!! csrf_field() !!}
    <?php
    $themes = App\Models\Theme::all();
    $authid=Auth::id();
    ?>
    <h1>Creation de jeu</h1>
    <div class="form-group">
        <label>Nom du jeu</label>
        <div class="name-item">
            <input  class="form-control" type="text" name="nom" id="nom" value="{{ old('nom') }}"/>
            <small class="form-text text-muted">Entrez le nom d'un jeu.</small>
        </div>

    </div>

    <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" name="description" id="description" rows="5">{{ old('description') }}</textarea>

    </div>

    <div class="item">
        <label>Règles</label>
        <textarea class="form-control"  name="regles" id="regles" value="{{ old('regles') }}"></textarea>
    </div>

    <div class="item">
        <label>Langue</label>
        <input class="form-control" type="text" name="langue" id="langue" value="{{ old('langue') }}">
    </div>

    <div class="item">
        <label>Url_Media</label>
        <input class="form-control" type="text" name="url_media" id="url_media" value="{{ old('url_media') }}">
    </div>

    <div class="item">
        <label>Age minimum</label>
        <input class="form-control" type="text" name="age" id="age" value="{{ old('age') }}">
    </div>


    <div class="item">
        <label>Nombre de joueurs</label>
        <input class="form-control" type="text" name="nombre_joueurs" id="nombre_joueurs" value="{{ old('nombre_joueurs') }}">
    </div><br>
    <div class="item">
        <select class="form-control" id="theme_id" name="theme_id">
            <option value="none">--Theme--</option>
            @foreach($themes as $theme)
                <option value="{{$theme->id}}">{{$theme->nom}}</option>
            @endforeach
        </select>
    </div><br>
    <div class="item">
        <label>Catégorie</label>
        <input class="form-control" type="text" name="categorie" id="categorie" value="{{ old('categorie') }}">
    </div>
    <div class="item">
        <label>Durée</label>
        <input class="form-control" type="text" name="duree" id="duree" value="{{ old('duree') }}">
    </div>
    <div class="item">
        <label>Editeur</label>
        <input class="form-control" type="text" name="editeur" id="editeur" value="{{ old('editeur') }}">
    </div>
<br>
    <div class="btn-block">
        <a href="{{route("jeux.index")}}" class="btn-href"><button type="button" class="btn btn-success">Retour</button>
        </a>
        <button class="btn btn-success" type="submit" href="/" >Valider</button>

    </div>
</form>

@endsection
