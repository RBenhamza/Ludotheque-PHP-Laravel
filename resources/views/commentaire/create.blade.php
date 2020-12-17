@extends('accueil.master')

@section('navbar')
    @parent
@endsection
@section('content')
    <title>Creation d'un commentaire</title>
    <div class="container">
        <div class="row">
            <form action="{{route('commentaire.store')}}" method="POST">
                {!! csrf_field() !!}
                {{--<h1>Creation d'un commentaire pour le jeu {{$jeu->nom}}</h1>--}}
                <div class="col-md-12">
                    <div class="item">
                        <h3>Écrivez votre commentaire</h3>

                        <div class="name-item" >
                            <input class="form-control" type="text" name="commentaire" id="commentaire" value="{{ old('commentaire') }}"/>
                            <small id="emailHelp" class="form-text text-muted">Veuillez écrire votre commentaire.</small>

                        </div>
                    </div>
                </div>
                <br>
                <div class="col-md-12">
                    <div class="name-item">
                    <select class="form-control" id="note" name="note">
                        <option value="0">--Note--</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    </div>
                </div>
{{--                <div class="col-md-6">--}}
{{--                    <div class="item">--}}
{{--                        <p>Note</p>--}}
{{--                        <div class="name-item">--}}
{{--                            <input type="text" name="note" id="note" value="{{ old('note') }}"/>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="col-md-6">
                    <div class="item">
                        <div class="name-item">
                            <input type="hidden" name="jeu_id" id="jeu_id" value="{{$id}}"/>
                        </div>
                    </div>
                </div>
        </div>
        <div>
            <div class="btn-block">
                <a href="{{route("jeux.index")}}" class="btn-href"><button type="button" class="btn btn-success">Retour</button>
                </a>
                <button class="btn btn-success type="submit" href="/jeux">Valider</button>
                <br>
                <br>
            </div>
        </div>
        </form>
    </div>


@endsection
