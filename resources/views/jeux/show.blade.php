<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

@extends('accueil.master')

@section('navbar')
    @parent
@endsection
@section('content')
    <title>{{$jeu->nom}}</title>
<div class="container">
    <div class="row">
        <a href="{{route("jeux.index")}}">Retour</a>
    </div>
    <div class="row">
        <p><strong>Titre  : </strong>{{$jeu->nom}}</p>
    </div>
    <div class="row">
        <p><strong>Description : </strong>{{$jeu->description}}</p>
    </div>
    <div class="row">
        <p><strong>Themes : </strong>{{$jeu->themes}}</p>
    </div>
    <div class="row">
        <p><strong>Mecaniques : </strong>{{$jeu->mecaniques}}</p>
    </div>
    <div class="row">
        <p><strong>Illustration: : </strong>{{$jeu->url_media}}</p>
    </div>
    <div class="row">
        <p><strong>Regles : </strong>{{$jeu->regles}}</p>
    </div>
    <div class="row">
        <p><strong>langue : </strong>{{$jeu->langue}}</p>
    </div>
    <div class="row">
        <p><strong>Age conseillé : </strong>{{$jeu->age}}</p>
    </div>
    <div class="row">
        <p><strong>Nombre Joueurs : </strong>{{$jeu->nombre_joueurs}}</p>
    </div>
    <div class="row">
        <p><strong>Categorie : </strong>{{$jeu->categorie}}</p>
    </div>
    <div class="row">
        <p><strong>Duree : </strong>{{$jeu->duree}}</p>
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
                <p> Règles de {{$jeu->nom}} </p>
            </div>
            <div class="modal-body">
                <p> {{$jeu->regles}}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer
                </button>
            </div>
        </div>
    </div>
</div>

</br>


{{--<div class="bottom-section">
    <div class="comments-container">
        <h3>Commentaires</h3>
        <hr/>

        <div class="comment-wrapper">
            @if(!empty($commentaire))
                @foreach($commentaires as $commentaire)
                    <tr>
                        <td>{{$commentaire->description}}</td>
                        <td> {{$commentaire->date_com}}</td>
                        <td> {{$commentaire->note}}</td>
                        <td> {{$commentaire->jeu_id}}</td>
                        <td> {{$commentaire->user_id}}</td>
                    </tr>
                @endforeach
            @else
                <p>Aucuns commentaires.</p>
            @endif
        </div>
    </div>--}}

    @foreach($commentaire as $com)
        <table class="table-fill">
            <thead>
            <tr>
                <th class="text-left">Nom</th>
                <th class="text-left">Editeur</th>
                <th class="text-left">Theme</th>
            </tr>

            </thead>
            <tbody class="table-hover">
            <tr>
                <td class="text-left">{{$com->commentaire}}</td>
                <td class="text-left">{{$com->note}}</td>
            </tr>
            </tbody>
        </table>
    @endforeach
    <div class="text-center">
        <a href="{{route("jeux.index")}}" class="btn-href">Retour</a>
    </div>

    <div>
        <a href="{{route('commentaire.create',$jeu->id)}}">Créer un commentaire pour {{$jeu->nom}}</a>
    </div>



@endsection
