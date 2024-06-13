<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Excel;

class AdminNewController extends Controller
{
    public function index()
    {
        return view('add_new_admin');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        $adminNew = new User();
        $adminNew->name = $request->input('name');
        $adminNew->email = $request->input('email');
        $adminNew->password = $request->input('password');
        
        $adminNew->save();

        // Additional logic or redirection after successful data storage

        return redirect()->back()->with('success', 'data stored successfully!');
    }

    //Show Observations data
    function showPlant(){
        $data=User::all();
        return view('individual_observations',['observations'=>$data]);  
    }


   
 
}