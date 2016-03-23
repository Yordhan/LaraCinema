<?php

namespace App\Http\Controllers\Auth;

use App\Administrators;
use App\User;
use Illuminate\Support\Facades\Input;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'firstname' => 'required|max:255',
            'description'=> 'required|max:500',
            'photo' => 'required|image',
            'email' => 'required|email|max:255|unique:administrators',
            'password' => 'required|confirmed|min:6',
        ],[
            'name.required' => 'Votre nom est requis',
            'name.max' => 'Votre nom est trop long',
            'firstname.required' => 'Votre prenom est requis',
            'firstname.max' => 'Votre prenom est trop long',
            'description.required' => 'Votre description est requise',
            'description.max' => 'Votre description est trop longue',
            'email.required' => 'Votre email est requis',
            'email.max' => 'Votre email est trop long',
            'password.required' => 'Votre mot de passe est requis',
            'password.min' => 'Votre mot de passe est trop court',
            'password.confirmed' => 'Votre mot de passe doit etre identique',
            'photo.required' => 'Une photo est obligatoire',
            'photo.image' => 'Votre photo n\'est pas au bon format'


        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {

        $file = Input::file('photo');
        // Si ma requete contient un fichier de name "image"

        if(Input::hasFile('photo')) {
            $filename = $file->getClientOriginalName(); // Récupère le nom original du fichier
            $destinationPath = public_path() . '/uploads/administrators'; // Indique ou stocker le fichier
            $file->move($destinationPath, $filename); // Déplace le fichier

            // ma colonne image qui sera le chemin vers mon fichier
            $photo = asset('uploads/administrators/' . $filename);
        }


        return Administrators::create([
            'lastname' => $data['name'],
            'firstname' => $data['firstname'],
            'description' => $data['description'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'photo' => $photo
        ]);


    }
}
