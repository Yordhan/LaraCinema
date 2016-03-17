<?php
/**
 * Created by PhpStorm.
 * User: machine
 * Date: 15/03/16
 * Time: 14:25
 */

namespace App\Http\Controllers;
use App\Actors;
use App\Categories;
use App\Directors;
use App\Movies;
use App\Comments;
use App\Users;


class HomeController extends Controller
{
    /**
     * Page d'accueil
     */
    public function homepage(){
        $movie = new Movies();
        $nbMoviesAct = $movie->getNbMoviesActifs();
        $budgetTot = $movie->getBudgetTotal();
        $moyenneNote = $movie->getMoyenneNote();
        $moyenneDuree = $movie->getMoyenneDuree();
        $nbMovies = $movie->getNbMovies();

        $actor = new Actors();
        $nbActors = $actor->getNbActors();
        $ageMoyActors = $actor->getMoyenneAgeActors();
//        $actorByCity = $actor->getActorsByCity();


        $comment = new Comments();
        $nbComments = $comment->getNbComments();

        $user = new Users();
        $nbUsers = $user->getUsers();
        $lastUsers = $user->getLastUsers();

        $director = new Directors();
        $nbDirectors = $director->getNbDirectors();

        $category = new Categories();
        $nbCategories = $category->getNbCategories();


        return view('statique/welcome',
            [
                'nbMoviesAct' => $nbMoviesAct,
                'nbActors' => $nbActors,
                'nbComments' => $nbComments,
                'nbUsers' => $nbUsers,
                'ageMoyActors' => $ageMoyActors,
                'budgetTot' => $budgetTot,
                'moyenneNote' => $moyenneNote,
                'moyenneDuree' => $moyenneDuree,
                'lastUsers' => $lastUsers,
                'nbMovies' => $nbMovies,
                'nbDirectors' =>  $nbDirectors,
                'nbCategories' => $nbCategories,
//                'actorByCity' => $actorByCity
            ]);
    }
}

