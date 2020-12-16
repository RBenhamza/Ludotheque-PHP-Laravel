
<style>

    body {
        padding-top: 60px;
    }
    nav {
    .navbar-brand {font-size: 30px;}
    .navbar-toggle {margin: 13px 15px 13px 0;}
    a {
        font-size: 18px;
        padding-bottom: 20px !important;
        padding-top: 20px !important;
        transition: all 0.3s ease;
    }
    }



    nav.navbar.shrink {
        min-height: 35px;
    .navbar-brand {font-size: 25px;}
    a {
        font-size: 15px;
        padding-bottom: 10px !important;
        padding-top: 10px !important;
    }
    .navbar-toggle {
        margin: 8px 15px 8px 0;
        padding: 4px 5px;
    }
    }

    .logo{
        padding-bottom: 15px;
    }
    .couleur{
        background: #248232;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-dark couleur fixed-top">
    <div class="container">
        <img src=".\images\Logopetit.png">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">

                    <a class="nav-link" href="/"> Accueil <span class="sr-only">(current)</span></a></li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route("jeux.index")}}"> Liste des jeux</a></li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Jeux</a></li>
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href={{ route('profil',['id'=>Auth::id()])}}>Profil</a></li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('dashboard')}}">Déconnexion</a></li>

                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a></li>

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a></li>
                        @endif
                    @endauth
                @endif
            </ul>
        </div>
    </div>
</nav>


