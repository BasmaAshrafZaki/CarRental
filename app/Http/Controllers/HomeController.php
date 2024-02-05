<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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
                //  if(auth()->User()->is_admin == 1){
                    $Users = User::get();

                    return view('Dashboard.index', compact('Users'));
                    // return view('Dashboard.index');
    
            // }
       
       
    }

    
    
//         if(auth()->User()->is_admin == 1){
    
//         return redirect()->route("index");

//     }
// return view('home');

// }

   
 

}