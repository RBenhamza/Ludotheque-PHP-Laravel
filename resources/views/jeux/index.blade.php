<html>
<head>
    <title>Liste des jeux</title>
</head>
<body>
<h2>La liste des jeux</h2>
    <table border="1px">
        @foreach($jeux as $jeu)
            <tr>
                <td>{{$jeu->nom}}</td><td> {{$jeu->description}}</td> <td>{{$jeu->url_media}}</td> <td>{{$jeu->theme_id}}</td><td>{{$jeu->duree}}</td><td>{{$jeu->nombre_joueurs}}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>
