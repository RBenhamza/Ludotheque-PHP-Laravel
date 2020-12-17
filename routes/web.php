<?php

use Illuminate\Support\Facades\Route;
use App\View\Components\jeux;
use App\Models\Jeu;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[App\Http\Controllers\JeuController::class,'elemrdm'])->name('welcome');

Route::get('/accueil', function () {
    return view('accueil.index');
});

Route::get('/enonce', function () {
    return view('enonce.index');
});

Route::resource('commentaire', 'CommentaireController')->middleware('auth');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::resource('jeux', 'JeuController');

Route::resource('achat', 'AchatController');
Route::get('/ajoutJeux', [\App\Http\Controllers\UserController::class,  'collection'])->name('user.collection');
Route::get('/suppression/{jid}', [\App\Http\Controllers\UserController::class,  'suppression'])->name('user.suppression');
Route::get('/achat/{jid}', [\App\Http\Controllers\UserController::class,  'ajouterAchat'])->name('user.ajouterAchat');
Route::post('/achat/{jid}', [\App\Http\Controllers\UserController::class,  'storeAchat'])->name('user.storeAchat');

//Route::get('jeux.tri', function () {
//    $jeux = Jeu::orderBy('nom', 'asc')->get();
//    return view('jeux.index', ['jeux' => $jeux]);
//})->name('jeux.tri');

Route::get('/user/{id}/profil', function ($id) {
    $user=User::find($id);
    return view('jeux.profil')->with('user', $user);
})->name('profil');

Route::get('/jeux/{id}/commenter','CommentaireController@create')->name('commentaire.create');

Route::get('/achat/{uid}/{jid}/{px}/{lx}/{da}/delete',function($uid,$jid,$px,$lx,$da){
    DB::delete(DB::raw('delete from achats where jeu_id=:jid and user_id=:uid and prix=:px and lieu=:lx and date_achat=:da'),array('jid'=>$jid,'uid'=>$uid,'px'=>$px,'lx'=>$lx,'da'=>$da));
    $user=User::find($uid);
    return redirect('/user/'.$uid.'/profil')->with('user', $user);
})->name("achat.delete");

Route::get('/top',function() {
    return view('jeux.top');
})->name('top5');










