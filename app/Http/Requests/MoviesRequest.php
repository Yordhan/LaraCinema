<?php
/**
 * Created by PhpStorm.
 * User: machine
 * Date: 10/03/16
 * Time: 16:50
 */

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class MoviesRequest extends FormRequest
{
    public function rules(){
        return [
            'title' => 'required|min:10',
            'synopsis' => 'required|min:10|max:500',
            'category' => 'required'
        ];
    }

    public function messages() {
        return [
            'title.required' => 'Le titre est obligatoire',
            'title.min' => 'Le titre doit comporter au moins 10 caractères',
            'synopsis.required' => 'La description est obligatoire',
            'synopsis.min' => 'Le synopsis est trop court (10 caractères minimum)',
            'synopsis.max' => 'Le synopsis est trop long (500 caractères maximum)',
            'category.required' => 'La catégorie est obligatoire'
        ];
    }

    public function authorize() {
        return true;
    }
}