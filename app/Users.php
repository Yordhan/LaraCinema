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

class Users extends Model
{
    protected $table ='user';

    /**
     * Permet de recuperer le nombres d'utilisateur actifs
     * SELECT COUNT( * )
        FROM user
     */
    public function getUsers(){
        $nbUsers = DB::table('user')
            ->where('enabled', 1)
            ->count();

        return $nbUsers;
    }

    /**
     * Permet de recuperer les derniers utilisateurs connectés
     * SELECT username, ville
        FROM user
        ORDER BY lastActivity DESC
        LIMIT 5
     */
    public function getLastUsers(){
        $lastUsers = DB::table('user')
            ->orderBy('lastActivity', 'desc')
            ->limit(5)
            ->get();
        return $lastUsers;

    }

}