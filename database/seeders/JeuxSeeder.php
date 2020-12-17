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
        ],
            [
                'nom' => 'Ligretto Vert',
                'description' => 'Jouer à en faire voler les cartes !  On ne saurait être plus rapide !',
                'regles' => 'Tous les joueurs essaient en même temps de placer autant de cartes de la même couleur que possible en respectant l\'ordre roissant de 1 à 10.',
                'langue'=>'Fr',
                'url_media'=>'https://cdn2.philibertnet.com/389677-thickbox_default/ligretto-vert.jpg',
                'age'=> '8',
                'nombre_joueurs' => '2',
                'categorie' => '',
                'duree' => '30',
                'user_id' => '3',
                'theme_id' =>'8',
                'editeur_id' =>'14',
            ],
            [
                'nom' => 'Tous au Poulailler',
                'description' => 'Vite, vite, trouve un panier et ramasse le plus d’oeufs possible dans le poulailler !',
                'regles' => 'Un premier jeu de cartes pour les enfants dès 3 ans avec des règles évolutives pour les plus grands. Il s’agit de trouver un panier, puis de trouver les oeufs frais, en prenant bien soin d’éviter les oeufs cassés et surtout en évitant les poules qui défendent le poulailler.

À la règle de base viennent ensuite s’ajouter des règles évolutives qui permettent, après le bon apprentissage du jeu, d’introduire de nouvelles règles pour un jeu de mémoire tout d’abord puis pour un jeu de prise de risque du type «stop ou encore ?».

Au final, un jeu simple et évolutif, pour faire le tremplin entre l’univers des jouets et celui des jeux, grâce à un joli thème qui parle à chacun d’entre nous, et qui ravira les plus jeunes.',
                'langue'=>'Fr',
                'url_media'=>'https://cdn3.philibertnet.com/312244-thickbox_default/tous-au-poulailler.jpg',
                'age'=> '3',
                'nombre_joueurs' => '2',
                'categorie' => '',
                'duree' => '30',
                'user_id' => '1',
                'theme_id' =>'9',
                'editeur_id' =>'3',
            ],
            [
                'nom' => 'Chromino',
                'description' => 'Un jeu simple de tactique et d\'observation Chromino est une captivante variante du jeu de domino utilisant les couleurs pour troubler l\'esprit et la réflexion des joueurs',
                'regles' => 'Vous devrez être le premier à vous débarrasser de vos chrominos en trouvant la meilleure place pour les poser, sachant qu\'un chromino doit être relié aux autres par deux point de contact de couleur semblable. Astuce, optimisation, observation, tactique et sang froid seront nécessaires pour vous mener jusqu\'à la victoire.',
                'langue'=>'Fr',
                'url_media'=>'https://cdn2.philibertnet.com/322655-thickbox_default/chromino-.jpg',
                'age'=> '7',
                'nombre_joueurs' => '1',
                'categorie' => '',
                'duree' => '25',
                'user_id' => '7',
                'theme_id' =>'2',
                'editeur_id' =>'7',
            ],
            [
                'nom' => 'Scotland Yard',
                'description' => 'Une course-poursuite mouvementée à travers Londres, en taxi, en bus et en métro.',
                'regles' => 'Une course-poursuite mouvementée à travers Londres, en taxi, en bus et en métro. Les détectives suivent Mixter X de très près. Seuls indices, ses tickets de transport. Réussiront - ils à l\'attraper? Un jeu sans dé ni cartes. Pour retrouver Mister X, il faut de la logique, de l\'observation associées à une bonne stratégie... et un peu de chance!',
                'langue'=>'Fr',
                'url_media'=>'https://cdn1.philibertnet.com/305818-thickbox_default/scotland-yard.jpg',
                'age'=> '8',
                'nombre_joueurs' => '3',
                'categorie' => '',
                'duree' => '30',
                'user_id' => '6',
                'theme_id' =>'2',
                'editeur_id' =>'10',
            ]
        );
    }
}
