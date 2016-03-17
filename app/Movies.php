<?php
/**
 * Created by PhpStorm.
 * User: machine
 * Date: 08/03/16
 * Time: 11:42
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class Movies
 * Modélise toutes mes requetes concernant la table Movies
 * @package App
 */
class Movies extends Model
{
    /**
     * Nom de ma table
     * @var string
     */
    protected $table ='movies';

    /**
     * Permet de recuperer le nombre de films actifs
     * SELECT COUNT( * ) AS nb
        FROM movies
        WHERE visible =1
     */
    public function getNbMoviesActifs(){
        $nbMoviesAct = DB::table('movies')
                ->where('visible', 1)
                ->count();

        return $nbMoviesAct;
    }

    /**
     * Permet de recuperer le nombre de films
     ** SELECT COUNT( * ) AS nb
        FROM movies
     */
    public function getNbMovies(){
        $nbMovies = DB::table('movies')
            ->count();

        return $nbMovies;
    }

    /**
     * Permet de recuperer le budget total des films
     * SELECT SUM( budget )
        FROM movies
     */
    public function getBudgetTotal(){
        $budgetTot = DB::table('movies')
            ->sum(DB::raw('budget'));

        return $budgetTot;
    }

    public function getMoyenneNote(){
        $moyenneNote = DB::table('movies')
            ->avg(DB::raw('note_presse'));
        return $moyenneNote;
    }

    /**
     * Permet de recuperer la durée moyenne des films
     * SELECT AVG(duree)
     * FROM movies
     */
    public function getMoyenneDuree(){
        $moyenneDuree = DB::table('movies')
            ->avg(DB::raw('duree'));
        return $moyenneDuree;
    }

}