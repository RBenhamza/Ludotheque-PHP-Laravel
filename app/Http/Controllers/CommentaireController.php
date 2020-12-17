<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Editeur;
use App\Models\Jeu;
use App\Models\Theme;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
//        $comments = Commentaire::all();
//        return view('commentaire.index', ['comms' => $comments]);
    }

    /**
     * Show the form for creating a new resource.
     *test
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('commentaire.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation des données de la requête
        $this->validate(
            $request,
            [
                'commentaire' => 'required',
                'note' => 'required'
            ]
        );

        $jeu_ids = Jeu::all()->pluck('id');
        $faker = Factory::create('fr_FR');
        $commentaire = new Commentaire();
        $commentaire->commentaire = $request->commentaire;
        $commentaire->note = $request->note;
        $commentaire->user_id = Auth::id();
        $commentaire->jeu_id = $faker->randomElement($jeu_ids);

        $commentaire->save();

        return redirect('/jeux');
    }


    public function show(Request $request,$id)
    {
        //
        $action = $request->query('action', 'show');
        $commentaire = Commentaire::findOrFail($id);


        return view('commentaire.show', ['commentaire' => $commentaire, 'action' => $action]);

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
}
