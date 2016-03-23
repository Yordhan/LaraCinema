<?php
/**
 * Created by PhpStorm.
 * User: machine
 * Date: 11/03/16
 * Time: 09:47
 */

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;


class DirectorsRequest extends FormRequest
{
    public function rules(){
        return [
            'firstname' => 'required',
            'lastname' => 'required',
            //'dob' => 'required|regex:^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$]',
            'dob' => ['required', 'regex:[^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$]'],
        ];
    }

    public function messages() {
        return [
            'firstname.required' => 'Le prenom est obligatoire',
            'lastname.required' => 'Le nom est obligatoire',
            'dob.required' => 'La date de naissance est obligatoire',
            'dob.regex' => 'La date de naissance doit etre au format YYYY-MM-JJ',

        ];
    }

    public function authorize() {
        return true;
    }
}