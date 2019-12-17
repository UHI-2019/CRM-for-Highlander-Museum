<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Customer;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
        $this->middleware('isSuperuserOrGuest');
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
     * Create a new user and customer instance after a valid registration.
     * @param array $data
     * @return mixed
     */
    protected function create(array $data)
    {
        // get role id number using constant
        $roleId = Config::get('roles.' . $data['role_constant']);

        // create user
        $user = User::create([
            'role_id' => $roleId,
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // if user is going to be a customer
        if($roleId == Config::get('CUSTOMER'))
        {
            // create customer
            Customer::create([
                'user_id' => $user->id,
                'username' => $data["username"],
                'address_line_1' => $data["address_line_1"],
                'address_line_2' => $data["address_line_2"],
                'postcode' => $data["postcode"],
                'city' => $data["city"],
                'contact_telephone_number' => $data["contact_telephone_number"],
                'is_newsletter_subscriber' => request()->has('is_newsletter_subscriber'),
                'customer_type' => $data["customer_type"]
            ]);
        }

        // if we are admin or superuser, don't log us into the new account
        if($roleId != Config::get('CUSTOMER'))
        {
            return Auth::user();
        }
        return $user;
    }

    public function showAdminRegistrationForm()
    {
        return view('auth.admin_register');
    }
}
