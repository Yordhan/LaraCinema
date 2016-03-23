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

class Categories extends Model
{
    protected $table ='categories';

    /**
     * Permet de recuperer le nombres de catégories
     * SELECT COUNT( * )
        FROM categories
     */
    public function getNbCategories(){
        $nbCategories = DB::table('categories')
            ->count();

        return  $nbCategories;
    }
}