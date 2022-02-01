<?php

namespace App\Http\Controllers\Auth;

use App\Client;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('guest');
        $this->middleware('guest:client');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
        ]);
    }

    public function showClientRegisterForm()
    {
        return view('front.client.create');
    }

    protected function createClient(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:clients'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'contry' => ['required'],
            'city' => ['required'],
            'street' => ['required'],
            'phone' => ['required'],
            'whatsapp'=>['required'],
            'type' => ['required','integer'],
        ],[
            'email.unique'=>'البريد مسجل مسبقاً',
        ]);
        $client = Client::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'whatsapp' => $request['whatsapp'],
            'type' => $request['type'],
            'contry' => $request['contry'],
            'city'=>$request['city'],
            'street'=>$request['street'],
            'image_id' =>1,
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('login/client');
    }


}
