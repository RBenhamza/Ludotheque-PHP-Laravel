
@extends('accueil.master')
@php
//variable cadre statistique
    $moynote = DB::select(DB::raw('select avg(commentaires.note) as \'moyenne_note\' from commentaires where jeu_id=:act'),array('act'=>$jeux->id));
    $hautenote = DB::select(DB::raw('select max(commentaires.note) as \'max_note\' from commentaires where jeu_id=:act'),array('act'=>$jeux->id));
    $bassenote = DB::select(DB::raw('select min(commentaires.note) as \'min_note\' from commentaires where jeu_id=:act '),array('act'=>$jeux->id));
    $nbcommjeu =DB::select(DB::raw('select count(commentaires.note) as \'nb_com\' from commentaires where jeu_id=:act '),array('act'=>$jeux->id));
    $nbcommglbl = DB::select(DB::raw('select count(*) as \'nb_comglobal\' from commentaires'));
    $classement =DB::select(DB::raw('SELECT RowNr as \'pos\' FROM (SELECT ROW_NUMBER() OVER (ORDER BY avg(note) desc) AS RowNr,avg(note),jeu_id FROM commentaires inner join jeux on commentaires.jeu_id = jeux.id where jeux.theme_id=(select theme_id from jeux where id = :act)group by jeu_id) sub WHERE sub.jeu_id=:act2'),array('act'=>$jeux->id,'act2'=>$jeux->id));
    $nbcom=DB::select(DB::raw('select count(*) as \'nombre\' from commentaires where jeu_id=:act'),array('act'=>$jeux->id));
//variable cadre tarifaires
    $prix_moy = DB::select(DB::raw('select avg(achats.prix) as \'moy_prix\' from achats where jeu_id=:act'),array('act'=>$jeux->id));
    $prixbas = DB::select(DB::raw('select min(achats.prix) as \'min_prix\' from achats where jeu_id=:act '),array('act'=>$jeux->id));
    $prixhaut = DB::select(DB::raw('select max(achats.prix) as \'max_prix\' from achats where jeu_id=:act '),array('act'=>$jeux->id));
    $nbutils =DB::select(DB::raw('SELECT count(distinct user_id) as \'nbutils\' from achats where jeu_id=:act '),array('act'=>$jeux->id));
    $nbutot =DB::select(DB::raw('select count(*) as \'nb_total_util\' from users'));

@endphp
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

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
        <p><strong>Mecaniques : <br></strong>
            @foreach($jeux->mecaniques as $meca)
                - {{$meca->nom}} <br>
        @endforeach
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
    <div style="width: 600px;  padding-top:10px; padding-bottom:10px;border: 3px solid #A0A0A0; text-align: center;background: #C0C0C0;">
        <li>Note moyenne : {{$moynote[0]->moyenne_note}} </li>
        <li>La note la plus basse :{{$bassenote[0]->min_note}} </li>
        <li>La note la plus haute : {{$hautenote[0]->max_note}}</li>
        <li>Nombre de commentaires sur ce jeu : {{$nbcommjeu[0]->nb_com}}</li>
        <li>Nombre de commentaires sur le site : {{$nbcommglbl[0]->nb_comglobal}}</li>
        @if ($nbcom[0]->nombre>0)
            <li>Position dans le classement (même thème) : {{$classement[0]->pos}} </li>
        @else
            <li>Position dans le classement (même thème) : Inconnu (pas de notes).</li>
        @endif

    </div>

    <div style="width: 600px;  padding-top:10px; padding-bottom:10px;border: 3px solid #A0A0A0; text-align: center;background: #C0C0C0;">
        <li>Prix moyen : {{$prix_moy[0]->moy_prix}} </li>
        <li>Prix le plus haut : {{$prixhaut[0]->max_prix}} </li>
        <li>Prix le plus bas : {{$prixbas[0]->min_prix}} </li>
        <li>Nombre d'utilisateurs possédant le jeu: {{$nbutils[0]->nbutils}}</li>
        <li>Nombre total d'utilisateur inscrit: {{$nbutot[0]->nb_total_util}}</li>
    </div>

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
                <th>auteur</th><th>commentaire</th><th>note</th><th>date du commentaire</th>
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
