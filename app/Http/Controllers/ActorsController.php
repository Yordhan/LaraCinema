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
    public function lister(){
        $actors = Actors::all();
        //dump($actors);
        // retourne une vue
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
        $actor->firstname = $firstname;
        $actor->lastname = $lastname;
        $actor->dob = $dob;
        $actor->city = $city;
        $actor->image = $image;
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


}