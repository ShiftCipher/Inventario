<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Cart;
use App\Http\Controllers\Controller;
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
          'username' => 'required|max:255|unique:users',
          'dni' => 'required|max:255|unique:users',
          'email' => 'required|email|max:255|unique:users',
          'password' => 'required|min:6|confirmed',
          'first_name' => 'required|string',
          'last_name' => 'required|string',
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
        $user = User::create([
          'username' => $data['username'],
          'dni' => $data['dni'],
          'email' => $data['email'],
          'first_name' => $data['first_name'],
          'last_name' => $data['last_name'],
          'password' => bcrypt($data['password']),
          'photo' => 'img/users/profile.png'
        ]);

        $user->role_id = 1;
        $user->state_id = 200;

        $cart = Cart::create();
        $cart->user()->save($user);

        $user->saveOrFail();

        return $user;
    }
}
