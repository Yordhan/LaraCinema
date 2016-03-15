<?php
/**
 * Created by PhpStorm.
 * User: machine
 * Date: 10/03/16
 * Time: 16:50
 */

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class CategoriesRequest extends FormRequest
{
    public function rules(){
        return [
            'title' => 'required|min:10',
            'description' => 'required|min:10|max:250',
        ];
    }

    public function messages() {
        return [
           'title.required' => 'Le titre est obligatoire',
            'title.min' => 'Le titre doit comporter au moins 10 caractères',
            'description.required' => 'La description est obligatoire',
            'description.min' => 'La description doit comporter au moins 10 caractères',
            'description.max' => 'La description ne doit pas faire plus de  250 caractères',
        ];
    }

    public function authorize() {
        return true;
    }
}