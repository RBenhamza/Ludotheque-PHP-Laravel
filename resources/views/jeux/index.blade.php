<html>
<head>
    <title>Liste des jeux</title>
</head>
<div>
    <a href="{{route("jeux.create")}}" class="button">Ajouter un jeu</a>
    <a href="{{route("jeux.tri")}}" class="button">Trier les jeux a->z </a>
</div>
<body>
<h2>La liste des jeux</h2>
    <table border="1px">
        <tr>
            <td>nom</td><td>description</td><td>url_media</td><td>theme</td><td>durée</td><td>nombre de joueurs</td>
        </tr>
        @foreach($jeux as $jeu)
            <tr>
                <td><a href = {{route('jeux.show',$jeu->id)}}>{{$jeu->nom}}</a></td><td> {{$jeu->description}}</td> <td>{{$jeu->url_media}}</td> <td>{{$jeu->theme_id}}</td><td>{{$jeu->duree}}</td><td>{{$jeu->nombre_joueurs}}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>
