<?php

namespace App\Http\Controllers;
use App\Categories;
use App\Movies;
use App\Http\Requests\MoviesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


/**
 * Class MoviesController
 * @package App\Http\Controllers
 * Chaque controller doit etre suffixer par le moté clé Controller et doit hériter de ma classe Controller
 */
class MoviesController extends Controller{
    /**
     * Methode de controller
     * <=> Action de controller
     */

    public function lister(){
        // retourne une vue
        // all() recuperer tous mes films
        $movies = Movies::all();

        //dump($movies);
        return view("movies/list", [
            'movies' => $movies

        ]);
    }

    public function editer($id){
        // fonction des debogage des variables
        // debuggue mon id
        //dump($id);
        $movie = Movies::find($id);
        // retourne une vue
        return view("movies/editer" , [
            'id' => $id,
            'movie' => $movie
        ]);
    }

    public function creer(){
        $categories = Categories::all();

        // retourne une vue
        return view("movies/creer", [
            'categories' => $categories
        ]);
    }

    public function voir($id){
        // find() permet de retrouver 1 objet par son id
        $movie = Movies::find($id);

        // retourne une vue
        return view("movies/voir", [
            'id' => $id,
            'movie' => $movie
        ]);
    }

    /**
     * Enregister un film en base de données depuis les données soumises en formulaire
     */
    public function enregistrer(MoviesRequest $request) {
        $title = $request->title;
        $image = $request->image;
        $synopsis = $request->synopsis;
        $categories = $request->categories;


        $movie = new Movies();
        $movie->title = $title;
        $movie->image = $image;
        $movie->synopsis = $synopsis;
        $movie->categories_id = $categories;
        $movie->save(); // save() permet de sauvegarder mon objet en bdd

        //redirection a partir de ma route
        return Redirect::route('movies_list');
    }


    /**
     * Suppression d'un film
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function supprimer(Request $request, $id) {
        $movie = Movies::find($id);
        $movie->delete();

        return Redirect::route('movies_list');
    }


    /**
     * Pour rendre un film visible ou invisible
     * @param Movies $id
     * @return mixed
     */
    public function visible(Movies $id) {
        if($id->visible == 0){
            $id->visible = 1;
        }
        else {
            $id->visible = 0;
        }
        $id->save();

        return Redirect::route('movies_list');
    }


}