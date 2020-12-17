<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Editeur;
use App\Models\Jeu;
use App\Models\Mecanique;
use App\Models\Theme;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JeuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $editeur_id = $request->get('editeur_id',null);
        $theme_id = $request->get('themes_id',null);
        $triPar = $request->get('tri',null);

        $jeux = Jeu::all();
        $themes = Theme::all();
        $editeurs = Editeur::all();

        if(isset($editeur_id)&&$editeur_id!="none"){
            $jeux = Jeu::where('editeur_id',$editeur_id)->get();
        }
        else if(isset($theme_id)&&$theme_id!="none"){
            $jeux = Jeu::where('theme_id',$theme_id)->get();
        }
        else if(isset($triPar)&&$triPar!="none"){
            $jeux = Jeu::orderBy($request->tri, 'asc')->get();
        }

        return view('jeux.index', ['jeux' => $jeux,'themes' => $themes,'editeurs' => $editeurs,'editeur_id'=>$editeur_id, 'themes_id'=>$theme_id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('jeux.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        // validation des données de la requête
        $this->validate(
            $request,
            [
                'nom' => 'required',
                'description' => 'required',
                'regles' => 'required',
                'langue' => 'required',
                'age' => 'required',
                'nombre_joueurs' => 'required',
                'categorie' => 'required',
                'duree' => 'required',
                'editeur'=>'required',
                'theme_id'=>'required',
            ]
        );

        // code exécuté uniquement si les données sont validaées
        // sinon un message d'erreur est renvoyé vers l'utilisateur

        // préparation de l'enregistrement à stocker dans la base de données
        $theme_ids = Theme::all()->pluck('id');
        $editeur_ids = Editeur::all()->pluck('id');
        $faker = Factory::create('fr_FR');
        $editeur=new Editeur;
        $editeur->nom =$request->editeur;
        $editeur->save();
        $jeu = new Jeu;
        $jeu->nom = $request->nom;
        $jeu->description = $request->description;
        $jeu->regles = $request->regles;
        $jeu->langue = $request->langue;
        $jeu->url_media = $request->url_media;
        $jeu->age = $request->age;
        $jeu->nombre_joueurs = $request->nombre_joueurs;
        $jeu->categorie = $request->categorie;
        $jeu->duree = $request->duree;
        $jeu->user_id = Auth::id();
        $jeu->theme_id = $request->theme_id;
        $jeu->editeur_id = $editeur->id;

        // insertion de l'enregistrement dans la base de données
        $jeu->save();

        // redirection vers la page qui affiche la liste des tâches
        return redirect('/jeux');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Request $request,$id) {
        $tricomms = $request->get('tricomms',null);
        $jeux = Jeu::find($id);
        $commentaires = $jeux->commentaires()->get();
        if(isset($tricomms)&&$tricomms!="none"){
            $commentaires = $jeux->commentaires()->orderBy($tricomms,'desc')->get();
        }

        return view('jeux.show', ['jeux' => $jeux,'commentaires' => $commentaires]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     *
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function random(){

    }

    public function elemrdm(){
        $jeux = Jeu::all()->pluck('id');
        $faker = Factory::create('fr_FR');
        $listidjeux = $faker->randomElements($jeux->toArray(),5);
        $res = [];
        foreach($listidjeux as $id)
            $res[] = Jeu::find($id);
        return view('welcome', ['res' => $res]);
    }

//    public function tri(Request $request){
//        $jeux = Jeu::orderBy($request->tri, 'asc')->get();
//        return view('jeux.index', ['jeux' => $jeux]);
//    }
//    public function triE(Request $request){
//        $jeux = Jeu::where('editeur_id',$request->triE)->get();
//        return view('jeux.index', ['jeux' => $jeux]);
//    }

}
