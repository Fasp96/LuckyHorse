<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'name' => ['required', 'string', 'regex:/^([A-Z][A-Za-zÀ-ÿ]* *)*$/', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            
            'gender' => ['required', 'in:male,female,other'],
        'birth_date' => ['required', 'before:-18 years', 'after:-100 years'],
            'phone_number' => ['required', 'string', 'regex:/^([+]?[1-9]\d*|0)$/', 'size:9', 'unique:users'],
            'iban' => ['required', 'string', 'size:9', 'unique:users'],
            'user_photo' =>['required', 'mimes:jpeg,jpg,png,PNG,JPG,JPEG']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'gender' => $data['gender'],
            'birth_date' => $data['birth_date'],
            'phone_number' => $data['phone_number'],
            'iban' => $data['iban'],
            'balance' => 0,
            'file_path' => $data['name'] . '.png'
            /*
            $file = $data->file('user_photo');
            $filename = $data['name'] . ".png";
            
            $file = $file->move('images/user_photos/', $filename);
            $user->file_path = $filename;
            

            $horse->file_path = $request->name . ".png";
            'file_path' => $data['file_path'];
            */
        ]);
    }
}
