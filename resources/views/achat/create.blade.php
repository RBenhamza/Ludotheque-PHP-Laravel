@extends('accueil.master')

@section('navbar')
    @parent
@endsection

@section('content')
    <?php
    $jeux = App\Models\Jeu::all();
    $authid=Auth::id();
    ?>
    <title>Achat d'un jeu</title>
    <div class="container">
        <div class="row">
            <form action="{{route('achat.store')}}" method="POST">
                {!! csrf_field() !!}
                {{--<h1>Creation d'un commentaire pour le jeu {{$jeu->nom}}</h1>--}}
    </div>

    <form>
        <div class="form-group">
            <label>Lieu</label>
            <input class="form-control" type="text" name="lieu" id="lieu" value="{{ old('lieu') }}"/>
            <small class="form-text text-muted">Veuillez entrer un lieu.</small>
        </div>
        <div class="form-group">
            <label>Prix</label>
            <input class="form-control" type="text" name="prix" id="prix" value="{{ old('prix') }}"/>
            <small class="form-text text-muted">Veuillez entrer un prix.</small>
        </div>

        <select class="form-control" id="jeu" name="jeu">
            <option value="none">Sélectionnez un jeu : </option>
            @foreach($jeux as $jeu)
                <option value="{{$jeu->id}}">{{$jeu->nom}}</option>
            @endforeach
        </select>
        <br>
        <div>
            <div class="btn-block">
                <a href="{{route("profil",['id'=>$authid])}}" class="btn-href">Retour</a>
                <button type="submit" href="/" class="btn btn-success">Valider</button>
            </div>
        </div>
    </form>


@endsection
