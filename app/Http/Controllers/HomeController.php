<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {  
       // Role::create(['name' => 'admin']);

        return view('home');
    }

    /**
     * login 
     *
     * @return  [type]  [return description]
     */
    public function login(Request $request)

    {  
        return view('home');
    }
}
