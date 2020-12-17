<?php

namespace Database\Seeders;

use App\Models\Jeu;
use Illuminate\Database\Seeder;

class JeuxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jeu::create([
            'nom' => 'Dixit',
            'description' => 'Dixit est un jeu de devinettes qui repose sur un univers poétique. Afin de vous aider à créer vos "contes", Dixit vous propose des illustrations originales flirtant entre le fantastique et l\'onirisme. Un parfum de mystère flotte autour de chaque carte dessinée par Marie Cardouat et c\'est ce qui fait l\'intérêt de Dixit. À vous de puiser dans votre inspiration !',
            'regles' => 'Le principe de Dixit est simple : les joueurs doivent deviner et faire deviner des cartes illustrées. À chaque tour, un joueur devient le conteur qui choisit une carte et la décrit avec une phase, un mot ou un son. Mais attention, pour marquer des points, la carte doit être trouvée seulement par une partie des joueurs. Le message doit donc être à la fois clair et crypté. Un certain mystère doit planer. À vous d\'être inventif et malin ! En plus de devoir trouver le bon dessin, les autres joueurs doivent également choisir une carte dans leur main proche de la description du conteur. Le but ici est d\'induire les autres en erreur. Une fois toutes les cartes récupérées, elles sont dévoilées par le conteur. Les joueurs ont la tâche de débusquer l\'image du conteur.',
            'langue'=>'Fr',
            'url_media'=>'https://cdn1.philibertnet.com/307631-thickbox_default/dixit.jpg',
            'age'=> '8',
            'nombre_joueurs' => '3',
            'categorie' => '',
            'duree' => '30',
            'user_id' => '5',
            'theme_id' =>'5',
            'editeur_id' =>'6',
        ]);
    }
}
