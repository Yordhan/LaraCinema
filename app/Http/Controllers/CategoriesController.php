<?php

namespace App\Http\Controllers;
use App\Categories;
use App\Http\Requests\CategoriesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;



/**
 * Class MoviesController
 * @package App\Http\Controllers
 * Chaque controller doit etre suffixer par le moté clé Controller et doit hériter de ma classe Controller
 */
class CategoriesController extends Controller{
    /**
     * Methode de controller
     * <=> Action de controller
     */
    public function lister(){
        $categories = Categories::all();
        // retourne une vue
        return view("categories/list", [
            'categories' => $categories
        ]);
    }

    public function editer(){
        // retourne une vue
        return view("categories/editer");
    }

    public function creer(){
        // retourne une vue
        return view("categories/creer");
    }

    public function voir($id){
        $categories = Categories::find($id);
        // retourne une vue
        return view("categories/voir", [
            'id' => $id,
            'categories' => $categories
        ]);
    }

    public function enregistrer(CategoriesRequest $request) {


        $category = new Categories();

        $file = $request->image;
        // Si ma requete contient un fichier de name "image"

        if($request->hasFile('image')) {
            $filename = $file->getClientOriginalName(); // Récupère le nom original du fichier
            $destinationPath = public_path() . '/uploads/categories'; // Indique ou stocker le fichier
            $file->move($destinationPath, $filename); // Déplace le fichier

            // ma colonne image qui sera le chemin vers mon fichier
            $category->image = asset('uploads/categories/' . $filename);
        }

        $category->title = $request->title;
        $category->description = $request->description;


        $category->save(); // save() permet de sauvegarder mon objet en bdd

        //redirection a partir de ma route
        return Redirect::route('categories_list');
    }

    /**
     * Suppression d'un acteur
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function supprimer(Request $request, $id) {
        $categories = Categories::find($id);
        $categories->delete();

        return Redirect::route('categories_list');
    }




}