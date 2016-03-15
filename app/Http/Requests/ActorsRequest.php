<?php
/**
 * Created by PhpStorm.
 * User: machine
 * Date: 11/03/16
 * Time: 09:47
 */

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;


class ActorsRequest extends FormRequest
{
    public function rules(){
        return [
            'firstname' => 'required',
            'lastname' => 'required',
            //'dob' => 'required|date_format:d/m/Y',
            'dob' => ['required', 'regex:[^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$]'],
            'city' => 'required',
            'image' => ['required', 'regex:[^^https?:\/\/[0-9a-zA-Z].+\.jpg$]']
        ];
    }

    public function messages() {
        return [
            'firstname.required' => 'Le prenom est obligatoire',
            'lastname.required' => 'Le nom est obligatoire',
            'dob.required' => 'La date de naissance est obligatoire',
            //'dob.date_format' => 'La date de naissance doit etre au format j/m/A',
            'dob.regex' => 'La date de naissance doit etre au format YYYY-MM-JJ',
            'city.required' => 'La ville de naissance est obligatoire',
            'image.required' => 'Une image est obligatoire',
            'image.regex' => "Le format d'image n'est pas le bon",


        ];
    }

    public function authorize() {
        return true;
    }
}