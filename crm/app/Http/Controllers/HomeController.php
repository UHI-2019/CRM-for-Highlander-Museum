<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the correct home for different user roles.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        switch(Auth::user()->role_id)
        {
            case Config::get('roles.SUPERUSER'):
                return view('home.superuser');
                break;
            case Config::get('roles.ADMINISTRATOR'):
                return view('home.admin');
                break;
            default:
                return view('home.customer');
        }
    }
}

