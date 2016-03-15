<?php
/**
 * Created by PhpStorm.
 * User: machine
 * Date: 15/03/16
 * Time: 14:25
 */

namespace App\Http\Controllers;
use App\Actors;
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
        $nbMovies = $movie->getNbMoviesActifs();
        $budgetTot = $movie->getBudgetTotal();
        $moyenneNote = $movie->getMoyenneNote();

        $actor = new Actors();
        $nbActors = $actor->getNbActors();
        $ageMoyActors = $actor->getMoyenneAgeActors();

        $comment = new Comments();
        $nbComments = $comment->getNbComments();

        $user = new Users();
        $nbUsers = $user->getUsers();

        return view('statique/welcome',
            [
                'nbMovies' => $nbMovies,
                'nbActors' => $nbActors,
                'nbComments' => $nbComments,
                'nbUsers' => $nbUsers,
                'ageMoyActors' => $ageMoyActors,
                'budgetTot' => $budgetTot,
                'moyenneNote' => $moyenneNote
            ]);
    }
}