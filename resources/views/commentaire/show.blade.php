@extends('accueil.master')

@section('navbar')
    @parent
@endsection
@section('content')


    <div class="container">
    <div class="row">
        <a href="{{route("jeux.index")}}">Retour</a>
    </div>
    <div class="row">
        <p><strong>Commentaire : </strong>{{$commentaire->commentaire}}</p>
    </div>
    <div class="row">
        <p><strong>Note : </strong>{{$commentaire->note}}</p>
    </div>
    <div class="row">
        <p><strong>Date : </strong>{{$commentaire->date_com}}</p>
    </div>
    <div class="row">
        <p><strong>Jeu_id : </strong>{{$commentaire->jeu_id}}</p>
    </div>
    <div class="row">
        <p><strong>User_id : </strong>{{$commentaire->user_id}}</p>
    </div>
</div>


@endsection
