@extends('accueil.master')

@section('navbar')
    @parent
@endsection
@section('content')
    <title>Creation d'un commentaire</title>
    <div class="container">
        <div class="row">
            <form action="{{route('user.store')}}" method="POST">
                {!! csrf_field() !!}
                {{--<h1>Creation d'un commentaire pour le jeu {{$jeu->nom}}</h1>--}}
                <div class="col-md-6">
                    <div class="item">
                        <p>Lieu</p>
                        <div class="name-item">
                            <input type="text" name="lieu" id="lieu" value="{{ old('lieu') }}"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="item">
                        <p>Prix</p>
                        <div class="name-item">
                            <input type="text" name="prix" id="prix" value="{{ old('prix') }}"/>
                        </div>
                    </div>
                </div>
        </div>
        <div>
            <div class="btn-block">
                <a href="{{route("jeux.profil")}}" class="btn-href">Retour</a>
                <button type="submit" href="/">Valider</button>
            </div>
        </div>
        </form>
    </div>


@endsection
