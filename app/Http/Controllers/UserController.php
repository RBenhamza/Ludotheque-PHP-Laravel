<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Editeur;
use App\Models\Jeu;
use App\Models\Theme;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class UserController extends Controller
{
    public function collection(){
        $uid = Auth::id();
        $user = User::find($uid);
        $ajoutJeux = [];
        foreach ($user->ludo_perso as $achat){
            $jeux = $achat;
            array_push($ajoutJeux, $jeux);
        }
        return view('jeux.ajoutJeux',['ajoutJeux' => $ajoutJeux]);
    }
    public function suppression($jid){
        $user = Auth::user();
        $user->ludo_perso()->detach($jid);
    }
    public function ajouterAchat($jid){
        return view('jeux.ajouterJeu',['jid'=>$jid]);
    }
    public function storeAchat(Request $request ,$jid){
        $user = Auth::user();
        $user->ludo_perso()->attach($jid,['prix'=> $request->prix, 'date_achat'=> $request->dateAchat, 'lieu'=>$request->lieu]);
    }
}
