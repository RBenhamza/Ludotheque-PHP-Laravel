@extends('accueil.master')

@section('navbar')
    @parent
@endsection
@section('content')
    <title>Ajout d'un jeu</title>
    <form action="{{route('jeux.store')}}" method="POST">
        {!! csrf_field() !!}

        <h1>Ajout</h1>
        <div class="item">
            <p>Achat</p>
            <input type="achat" name="achat" id="achat" value="{{ old('achat') }}"/>
        </div>

        <div class="item">
            <p>Prix</p>
            <input name="prix" id="prix" value="{{ old('prix') }}"/>
        </div>

        <div class="item">
            <p>Lieu</p>
            <input type="lieu" name="lieu" id="lieu" value="{{ old('lieu') }}">
        </div>

        <div class="item">
            <p>Date_achat</p>
            <input type="text" name="date_achat" id="date_achat" value="{{ old('date_achat') }}">
        </div>
    </form>
@endsection
