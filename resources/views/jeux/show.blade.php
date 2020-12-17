<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

@extends('accueil.master')

@section('navbar')
    @parent
@endsection
@section('content')
    <title>{{$jeux->nom}}</title>
<div class="container">
    <div class="row">
        <a href="{{route("jeux.index")}}">Retour</a>
    </div>
    <div class="row">
        <p><strong>Titre  : </strong>{{$jeux->nom}}</p>
    </div>
    <div class="row">
        <p><strong>Description : </strong>{{$jeux->description}}</p>
    </div>
    <div class="row">
        <p><strong>Themes : </strong>{{$jeux->themes}}</p>
    </div>
    <div class="row">
        <p><strong>Mecaniques : </strong>{{$jeux->mecaniques}}</p>
    </div>
    <div class="row">
        <p><strong>Illustration: : </strong>{{$jeux->url_media}}</p>
    </div>
    <div class="row">
        <p><strong>Regles : </strong>{{$jeux->regles}}</p>
    </div>
    <div class="row">
        <p><strong>langue : </strong>{{$jeux->langue}}</p>
    </div>
    <div class="row">
        <p><strong>Age conseillé : </strong>{{$jeux->age}}</p>
    </div>
    <div class="row">
        <p><strong>Nombre Joueurs : </strong>{{$jeux->nombre_joueurs}}</p>
    </div>
    <div class="row">
        <p><strong>Categorie : </strong>{{$jeux->categorie}}</p>
    </div>
    <div class="row">
        <p><strong>Duree : </strong>{{$jeux->duree}}</p>
    </div>
</div>

<!-- Button -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#popup">
    Afficher les règles
</button>

<!-- Pop-up -->
<div id="popup" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p> Règles de {{$jeux->nom}} </p>
            </div>
            <div class="modal-body">
                <p> {{$jeux->regles}}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer
                </button>
            </div>
        </div>
    </div>
</div>

</br>
    @if(!empty($jeux->commentaires))
        <table border="1px">
            <tr>
                <th>auteur</th><th>commentaire</th><th>note</th><th>date du comm</th>
            </tr>
            @foreach($jeux->commentaires as $comm)
                <tr><td>{{$comm->user->name}}</td><td>{{$comm->commentaire}}</td><td>{{$comm->note}}</td><td>{{$comm->date_com}}</td></tr>
            @endforeach
        </table>
    @else
        <h3>aucun smartphone</h3>
    @endif
    <a href="{{route("commentaire.create",['id'=>$jeux->id])}}">Ajouter un commentaire</a>

@endsection
