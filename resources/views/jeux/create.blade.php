<title>Creation d'un jeu</title>
<form action="{{route('jeu.store')}}" method="POST">
    {!! csrf_field() !!}

    <h1>Creation de Smartphone</h1>
    <div class="item">
        <p>Nom du jeu</p>
        <div class="name-item">
            <input type="text" name="nom" id="nom" value="{{ old('nom') }}"/>
        </div>
    </div>

    <div class="item">
        <p>Description</p>
        <textarea  name="description" id="description" rows="5">{{ old('description') }}</textarea>
    </div>

    <div class="item">
        <p>Règles</p>
        <input type="text" name="regles" id="regles" value="{{ old('regles') }}">
    </div>

    <div class="item">
        <p>Langue</p>
        <input type="text" name="langue" id="langue" value="{{ old('langue') }}">
    </div>

    <div class="item">
        <p>Age minimum</p>
        <input type="text" name="age" id="age" value="{{ old('age') }}">
    </div>


    <div class="item">
        <p>Nombre de joueurs</p>
        <input type="text" name="nombre_joueurs" id="nombre_joueurs" value="{{ old('nombre_joueurs') }}">
    </div>

    <div class="item">
        <p>Categorie</p>
        <input type="text" name="categorie" id="categorie" value="{{ old('categorie') }}">
    </div>

    <div class="item">
        <p>Durée</p>
        <input type="text" name="duree" id="duree" value="{{ old('duree') }}">
    </div>

    <div class="btn-block">
        <a href="{{route("jeu.index")}}" class="btn-href">Retour</a>
        <button type="submit" href="/">Valider</button>
    </div>
</form>
