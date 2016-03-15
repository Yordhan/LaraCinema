<?php

namespace App\Http\Controllers;
use App\Directors;
use App\Http\Requests\DirectorsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


/**
 * Class MoviesController
 * @package App\Http\Controllers
 * Chaque controller doit etre suffixer par le moté clé Controller et doit hériter de ma classe Controller
 */
class DirectorsController extends Controller{
    /**
     * Methode de controller
     * <=> Action de controller
     */
    public function lister(){
        $directors = Directors::all();
        //dump($directors);
        // retourne une vue
        return view("directors/list", [
            'directors' => $directors
        ]);
    }

    public function editer($id){
        // retourne une vue
        return view("directors/editer", [
            'id' => $id
        ]);
    }

    public function creer(){
        // retourne une vue
        return view("directors/creer");
    }

    public function voir($id){
        $directors = Directors::find($id);
        // retourne une vue
        return view("directors/voir", [
            'id' => $id,
            'directors' => $directors
        ]);
    }

    public function enregistrer(DirectorsRequest $request) {
        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $dob = $request->dob;
        $image = $request->image;



        $director = new Directors();
        $director->firstname = $firstname;
        $director->lastname = $lastname;
        $director->dob = $dob;
        $director->image = $image;
        $director->save(); // save() permet de sauvegarder mon objet en bdd

        //redirection a partir de ma route
        return Redirect::route('directors_list');
    }

    /**
     * Suppression d'un realisateur
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function supprimer(Request $request, $id) {
        $directors = Directors::find($id);
        $directors->delete();

        return Redirect::route('directors_list');
    }


}