@extends('accueil.master')

@section('navbar')
    @parent
@endsection
@php
    $results = DB::select(DB::raw('select jeux.nom,achats.date_achat,achats.prix,achats.lieu from jeux inner join achats on jeux.id=achats.jeu_id where achats.user_id= :var
'),array('var' => Auth::id()));
@endphp
@section('content')
    <html>
    <head>
        <title> Profil </title>
    </head>

    <div>
        <p><strong>Nom  : </strong>{{$user->name}}</p>
        <p><strong>email : </strong>{{$user->email}}</p>
        <p>Mes jeux :</p>
        @foreach($results as $jeu)
            <p><strong>Nom :</strong>{{$jeu->nom}}<br> <strong>Date d'achat :</strong>{{$jeu->date_achat}} <strong>Prix :</strong>{{$jeu->prix}} <strong>Lieu de stockage :</strong>{{$jeu->lieu}}
        @endforeach
    </div>
    </html>
@endsection


