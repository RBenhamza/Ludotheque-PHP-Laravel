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
                <div class="col-md-6">
                    <div class="item">
                        <p>Commentaire</p>
                        <div class="name-item">
                            <input type="text" name="commentaire" id="commentaire" value="{{ old('commentaire') }}"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="name-item">
                    <select id="note" name="note">
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
                <a href="{{route("jeux.index")}}" class="btn-href">Retour</a>
                <button type="submit" href="/">Valider</button>
            </div>
        </div>
        </form>
    </div>


@endsection
