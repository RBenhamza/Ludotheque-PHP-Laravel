@extends('accueil.master')

@section('navbar')
    @parent
@endsection
@section('content')
<html>
    <head>
        <title> Profil </title>
    </head>
    <div>
        <p><strong>Nom  : </strong>{{$user->name}}</p>
        <p><strong>email : </strong>{{$user->email}}</p>
    </div>
</html>
@endsection
