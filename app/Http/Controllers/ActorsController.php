<?php

namespace App\Http\Controllers;
use App\Actors;
use App\Http\Requests\ActorsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;



/**
 * Class MoviesController
 * @package App\Http\Controllers
 * Chaque controller doit etre suffixer par le moté clé Controller et doit hériter de ma classe Controller
 */
class ActorsController extends Controller{
    /**
     * Methode de controller
     * <=> Action de controller
     */
    public function lister(Request $request){
        $actors = Actors::all();
        //dump($actors);
        // retourne une vue

        $id_actors = $request->session()->get("id_actors");

        return view("actors/list", [
            'actors' => $actors
        ]);
    }

    public function editer($id){
        // retourne une vue
        return view("actors/editer", [
            'id' => $id
        ]);
    }

    public function creer(){
        // retourne une vue
        return view("actors/creer");
    }

    public function voir($id){
        $actors = Actors::find($id);
        // retourne une vue
        return view("actors/voir", [
            'id' => $id,
            'actors' => $actors
        ]);
    }

    /**
     * Enregister un acteur en base de données depuis les données soumises en formulaire
     */
    public function enregistrer(ActorsRequest $request) {
        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $dob = $request->dob;
        $city = $request->city;
        $image = $request->image;
        $nationality = $request->nationality;



        $actor = new Actors();

        $file = $request->image;
        // Si ma requete contient un fichier de name "image"

        if($request->hasFile('image')) {
            $filename = $file->getClientOriginalName(); // Récupère le nom original du fichier
            $destinationPath = public_path() . '/uploads/actors'; // Indique ou stocker le fichier
            $file->move($destinationPath, $filename); // Déplace le fichier

            // ma colonne image qui sera le chemin vers mon fichier
            $actor->image = asset('uploads/actors/' . $filename);
        }

        $actor->firstname = $firstname;
        $actor->lastname = $lastname;
        $actor->dob = $dob;
        $actor->city = $city;
        $actor->nationality = $nationality;
        $actor->save(); // save() permet de sauvegarder mon objet en bdd

        //redirection a partir de ma route
        return Redirect::route('actors_list');
    }

    /**
     * Suppression d'un acteur
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function supprimer(Request $request, $id) {
        $actors = Actors::find($id);
        $actors->delete();

        return Redirect::route('actors_list');
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     * Permet d'ajouter un acteur dans un panier
     */
    public function panier(Request $request, $id) {
        $actor = Actors::find($id);

        // 1. enregistrer en session l'id
        // la requete fait appel a la session

        $tab = $request->session()->get('id_actors', []);

        if(array_key_exists($id, $tab)) {
            unset($tab[$id]);
            // supprime mon élément de tableau
        }
        else {
            $tab[$id] = $actor->firstname . ' ' . $actor->lastname; // ajouter mon id dans le tableau
        }

        // put() permet d'enregistrer en session à base d'une clé (id_actors) et d'une valeur ($id)
        $request->session()->put('id_actors', $tab);

        // pour retirer un acteur des favoris

        // 2. rediriger vers la liste des acteurs

        return Redirect::route('actors_list');
    }


}