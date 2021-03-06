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

    public function lister(Request $request){
        // retourne une vue
        // all() recuperer tous mes films
        $movies = Movies::all();

        $id_movies = $request->session()->get("id_movies");
        //dump($id_movies);

        return view("movies/list", [
            'movies' => $movies

        ]);
    }

    public function editer($id){
        // fonction des debogage des variables
        // debuggue mon id
        //dump($id);
        $movie = Movies::find($id);
        $categories = Categories::all();
        // retourne une vue
        return view("movies/editer" , [
            'id' => $id,
            'movie' => $movie,
            'categories' => $categories
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

        $file = $request->image;
        // Si ma requete contient un fichier de name "image"

        if($request->hasFile('image')) {
            $filename = $file->getClientOriginalName(); // Récupère le nom original du fichier
            $destinationPath = public_path() . '/uploads/movies'; // Indique ou stocker le fichier
            $file->move($destinationPath, $filename); // Déplace le fichier

            // ma colonne image qui sera le chemin vers mon fichier
            $movie->image = asset('uploads/movies/' . $filename);
        }


        $movie->title = $title;
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

    /**
     * Panier
     * @param $id
     */
    public function panier(Request $request, $id) {
        $movie = Movies::find($id);

        // 1. enregistrer en session l'id
        // la requete fait appel a la session

        $tab = $request->session()->get('id_movies', []);

        if(array_key_exists($id, $tab)) {
            unset($tab[$id]);
            // supprime mon élément de tableau
        }
        else {
            $tab[$id] = $movie->title ; // ajouter mon id dans le tableau
        }


        // Enregistrer mon tableau movies

        // put() permet d'enregistrer en session à base d'une clé (id_movies) et d'une valeur ($id)
        $request->session()->put('id_movies', $tab);


        // 2. rediriger vers la liste des films

        return Redirect::route('movies_list');
    }



}