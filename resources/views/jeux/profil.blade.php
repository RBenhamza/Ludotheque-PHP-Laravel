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


<?php



?>
@endsection


<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-6 col-md-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25"> <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image"> </div>
                                <h6 class="f-w-600">{{$user->name}}</h6>
                                <p>Zebi</p> <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Email</p>
                                        <h6 class="text-muted f-w-400">{{$user->email}}</h6>
                                    </div>

                                </div>
                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Mes jeux</h6>
                                <div class="row">
                                    <a style="text-decoration: none;" href="{{route("achat.create")}}"><button type="button" class="btn btn-success" >Ajouter un jeu acheté
                                        </button></a>
                                    <br>
                                    <br>
                                    <br>
                                    @foreach($results as $jeu)
                                        <p><a href="{{route("achat.delete",['uid'=>$jeu->user_id,'jid'=>$jeu->jeu_id,'px'=>$jeu->prix,'lx'=>$jeu->lieu,'da'=>$jeu->date_achat])}}"><button type="button" class="btn btn-danger" >X</button></a><strong>Nom :</strong>{{$jeu->nom}}<br> <strong>Date d'achat :</strong>{{$jeu->date_achat}} <strong>Prix :</strong>{{$jeu->prix}} <strong>Lieu de stockage :</strong>{{$jeu->lieu}}
                                    @endforeach



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    </html>
