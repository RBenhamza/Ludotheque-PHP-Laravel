<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

@extends('accueil.master')
@section('navbar')
    @parent
@endsection
@section('content')
@php
    $topjeux = DB::select(DB::raw('select avg(note) as \'moy\',jeu_id from commentaires group by(jeu_id) order by avg(note) desc limit 5;
'));
@endphp
<b>Top 5 des Jeux :</b><br><br>
    <ol>
    @foreach($topjeux as $infojeu)
        @php
            $jeu=App\Models\Jeu::find($infojeu->jeu_id);
        @endphp
            <li><b>Titre :</b> {{$jeu->nom}} <b>Description :</b> {{$jeu->description}} <b>Moyenne :</b>{{$infojeu->moy}}</li><br>
    @endforeach
        </ol>
@endsection
