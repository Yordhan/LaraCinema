<?php
/**
 * Created by PhpStorm.
 * User: machine
 * Date: 08/03/16
 * Time: 12:08
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Directors extends Model
{
    protected $table ='directors';

    /**
     * Permet de recuperer le nombres de réalisateurs
     * SELECT COUNT( * )
    FROM directors
     */
    public function getNbDirectors(){
        $nbDirectors = DB::table('directors')
            ->count();

        return  $nbDirectors;
    }
}