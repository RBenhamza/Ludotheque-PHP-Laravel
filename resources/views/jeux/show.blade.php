<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


<a href="{{route("jeux.index")}}">Retour</a>
<div>
    <p><strong>Titre  : </strong>{{$jeu->nom}}</p>
    <p><strong>Description : </strong>{{$jeu->nom}}</p>
    <p><strong>Themes : </strong>{{$jeu->themes}}</p>
    <p><strong>Mecaniquesd : </strong>{{$jeu->mecaniques}}</p>
    <p><strong>Illustration: : </strong>{{$jeu->url_media}}</p>
    <p><strong>Regles : </strong>{{$jeu->regles}}</p>
    <p><strong>langue : </strong>{{$jeu->langue}}</p>
    <p><strong>Age conseillé : </strong>{{$jeu->age}}</p>
    <p><strong>Nombre Joueurs : </strong>{{$jeu->nombre_joueurs}}</p>
    <p><strong>Categorie : </strong>{{$jeu->categorie}}</p>
    <p><strong>Duree : </strong>{{$jeu->duree}}</p>
</div>
<!-- Button -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#popup">
    Afficher les règles
</button>

<!-- Pop-up -->
<div id="popup" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p> Règles de {{$jeu->nom}} </p>
            </div>
            <div class="modal-body">
                <p> {{$jeu->regles}}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer
                </button>
            </div>
        </div>
    </div>
</div>
