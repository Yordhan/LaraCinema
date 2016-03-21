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


    /**
     * Permet de recuperer les 5 derniers commentaires
     * SELECT username, movies.title, comments.updated_at
        FROM comments
        INNER JOIN movies
        ON movies.id = comments.movies_id
        INNER JOIN user
         ON user.id = comments.user_id
        WHERE state =2
        ORDER BY comments.updated_at
        LIMIT 5
     */
//    public function getLastComments() {
//        $lastComments = DB::table('comments')
//            ->join('movies', 'comments.id', '=','dd' ); // a finir
//
//        return $lastComments;
//    }
}