<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['middleware' => ['web']], function () {

    Route::get('/', [
        'as' => 'homepage',
        'uses' => 'HomeController@homepage'
    ]);

    //Route::get('/', function () {
    //    return view('statique/welcome');
    //});
    /**
     * 1ere route
     * Page contact
     * /contact => URI
     */
    Route::get('/contact', function () {
        // retourne la vue contact
        return view('statique/contact');
    });


    Route::get('/concept', function () {
        // retourne la vue concept
        return view('statique/concept');
    });

    Route::get('/apropos', function () {

        return view('statique/apropos');
    });
});


Route::group(['middleware' => ['web']], function () {

    Route::group(['prefix' => 'movies'], function(){


        Route::get('/lister', [
            'as' => 'movies_list',
            'uses' => 'MoviesController@lister'
        ]);

        Route::get('/creer', [
            'as' => 'movies_creer',
            'uses' => 'MoviesController@creer'
        ]);

        //supprimer film
        Route::get('/supprimer/{id}', [
            'as' => 'movies_supprimer',
            'uses' => 'MoviesController@supprimer'
        ]);

        // route en post pour le formulaire
        Route::post('/enregistrer', [
            'as' => 'movies_enregistrer',
            'uses' => 'MoviesController@enregistrer'
        ]);

        Route::get('/visible/{id}', [
            'as' => 'movies_visible',
            'uses' => 'MoviesController@visible'
        ]);

        Route::get('/voir/{id}', [
            'as' => 'movies_voir',
            'uses' => 'MoviesController@voir'
        ])->where('id', '[0-9]+');


        /**
         * Argument qui s'appelle id en URL
         * Argument {id}
         */
        Route::get('/editer/{id}', [
            'as' => 'movies_editer',
            'uses' => 'MoviesController@editer'
        ])
        ->where('id', '[0-9]+');
        //where permet de fixer une restriction au niveau de mon argument en URL
    });

    Route::group(['prefix' => 'actors'], function(){


        Route::get('/lister', [
            'as' => 'actors_list',
            'uses' => 'ActorsController@lister'
        ]);

        Route::get('/creer', [
            'as' => 'actors_creer',
            'uses' => 'ActorsController@creer'
        ]);

        //supprimer acteur
        Route::get('/supprimer/{id}', [
            'as' => 'actors_supprimer',
            'uses' => 'ActorsController@supprimer'
        ]);

        // route en post pour le formulaire
        Route::post('/enregistrer', [
            'as' => 'actors_enregistrer',
            'uses' => 'ActorsController@enregistrer'
        ]);

        Route::get('/voir/{id}', [
            'as' => 'actors_voir',
            'uses' => 'ActorsController@voir'
        ]);

        Route::get('/editer/{id}', [
            'uses' => 'ActorsController@editer'
        ]);
    });

    Route::group(['prefix' => 'directors'], function(){


        Route::get('/lister', [
            'as' => 'directors_list',
            'uses' => 'DirectorsController@lister'
        ]);

        Route::get('/creer', [
            'as' => 'directors_creer',
            'uses' => 'DirectorsController@creer'
        ]);

        //supprimer realisateur
        Route::get('/supprimer/{id}', [
            'as' => 'directors_supprimer',
            'uses' => 'DirectorsController@supprimer'
        ]);

        // route en post pour le formulaire
        Route::post('/enregistrer', [
            'as' => 'directors_enregistrer',
            'uses' => 'DirectorsController@enregistrer'
        ]);

        Route::get('/voir/{id}', [
            'as' => 'directors_voir',
            'uses' => 'DirectorsController@voir'
        ]);



        Route::get('/editer/{id}', [
            'uses' => 'DirectorsController@editer'
        ]);
    });

    Route::group(['prefix' => 'categories'], function(){


        Route::get('/lister', [
            'as' => 'categories_list',
            'uses' => 'CategoriesController@lister'
        ]);

        Route::get('/creer', [
            'as' => 'categories_creer',
            'uses' => 'CategoriesController@creer'
        ]);

        //supprimer acteur
        Route::get('/supprimer/{id}', [
            'as' => 'categories_supprimer',
            'uses' => 'CategoriesController@supprimer'
        ]);

        // route en post pour le formulaire
        Route::post('/enregistrer', [
            'as' => 'categories_enregistrer',
            'uses' => 'CategoriesController@enregistrer'
        ]);

        Route::get('/voir/{id}', [
            'as' => 'categories_voir',
            'uses' => 'CategoriesController@voir'
        ]);

        Route::get('/editer/{id}', [
            'uses' => 'CategoriesController@editer'
        ]);
    });

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

    //
});
