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

class Comments extends Model
{
    protected $table ='comments';

    /**
     * Permet de recuperer le nombres de commentaires
     * SELECT COUNT( * )
    FROM comments
     */
    public function getNbComments(){
        $nbComments = DB::table('comments')
            ->count();

        return $nbComments;
    }
}