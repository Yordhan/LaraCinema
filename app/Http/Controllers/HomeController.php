<?php

namespace App\Http\Controllers;

use App\Actors;
use App\Categories;
use App\Comments;
use App\Directors;
use App\Http\Requests;
use App\Movies;
use App\Users;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function homepage(){
        $movie = new Movies();
        $nbMoviesAct = $movie->getNbMoviesActifs();
        $budgetTot = $movie->getBudgetTotal();
        $moyenneNote = $movie->getMoyenneNote();
        $moyenneDuree = $movie->getMoyenneDuree();
        $nbMovies = $movie->getNbMovies();
        $trailer = $movie->getTrailerRand();

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
                'trailer' => $trailer
//                'actorByCity' => $actorByCity
            ]);
    }
}
