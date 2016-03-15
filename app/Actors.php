<?php
/**
 * Created by PhpStorm.
 * User: machine
 * Date: 08/03/16
 * Time: 12:03
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Actors extends Model
{
    protected $table ='actors';

    /**
     * Permet de recuperer le nombres d'acteurs
     * SELECT COUNT( * )
        FROM actors
     */
    public function getNbActors(){
        $nbActors = DB::table('actors')
            ->count();

        return $nbActors;
    }

    /**
     * SELECT ROUND( AVG( TIMESTAMPDIFF( YEAR, dob, NOW( ) ) ) , 1 )
        FROM actors
        LIMIT 0 , 30
     */
    public function getMoyenneAgeActors(){
        $ageMoyActors = DB::table('actors')
            ->avg(DB::raw('TIMESTAMPDIFF( YEAR, dob, NOW())'));
            return $ageMoyActors;
    }
}