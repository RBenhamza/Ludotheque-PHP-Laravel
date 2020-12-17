@extends('accueil.master')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

@section('navbar')
    @parent
@endsection
@php
    $results = DB::select(DB::raw('select achats.date_achat,achats.lieu,achats.prix,achats.jeu_id,jeux.nom,achats.date_achat,achats.prix,achats.lieu,achats.user_id from jeux inner join achats on jeux.id=achats.jeu_id where achats.user_id= :var'),array(
   'var' => Auth::id()));
    //$affected = DB::achats('users')
      //        ->where('id', 1)
        //      ->update(['options->enabled' => true]);
    //$achat = DB::table('users')->increment('votes');
@endphp
@section('content')
<html>
    <head>
        <title> Profil </title>
    </head>

    <div>
        <p><strong>Nom  : </strong>{{$user->name}}</p>
        <p><strong>email : </strong>{{$user->email}}</p>

        {{--<a href="{{route("achat.create")}}" class="button">Ajouter l'achat d'un jeu</a>--}}

        <p>Mes jeux :</p>     <a style="text-decoration: none;" href="{{route("achat.create")}}"><button type="button" class="btn btn-success" >Ajouter un jeu acheté
        </button></a>
        @foreach($results as $jeu)
            <p><a href="{{route("achat.delete",['uid'=>$jeu->user_id,'jid'=>$jeu->jeu_id,'px'=>$jeu->prix,'lx'=>$jeu->lieu,'da'=>$jeu->date_achat])}}"><button type="button" class="btn btn-danger" >X</button></a><strong>Nom :</strong>{{$jeu->nom}}<br> <strong>Date d'achat :</strong>{{$jeu->date_achat}} <strong>Prix :</strong>{{$jeu->prix}} <strong>Lieu de stockage :</strong>{{$jeu->lieu}}
        @endforeach
    </div>
</html>
<?php



?>
@endsection




