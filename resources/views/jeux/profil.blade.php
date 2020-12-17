@extends('accueil.master')

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

        <p>Mes jeux :</p>     <button type="button" class="btn btn-success"><a href="{{route("achat.create")}}">Ajouter un jeu acheté</a>
        </button>
        @foreach($results as $jeu)
            <p><a href="{{route("achat.delete",['uid'=>$jeu->user_id,'jid'=>$jeu->jeu_id,'px'=>$jeu->prix,'lx'=>$jeu->lieu,'da'=>$jeu->date_achat])}}"><button type="button" class="btn btn-danger" >X</button></a><strong>Nom :</strong>{{$jeu->nom}}<br> <strong>Date d'achat :</strong>{{$jeu->date_achat}} <strong>Prix :</strong>{{$jeu->prix}} <strong>Lieu de stockage :</strong>{{$jeu->lieu}}
        @endforeach
    </div>
</html>
<?php



?>
@endsection




