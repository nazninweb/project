<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ObservationData;

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
        return view('home');
    }
    //Show Observations data
    function show(){
        $data=ObservationData::all();
        return view('home',['observations'=>$data]);  
    }

    function chart(){
        
         // Replace this with  actual data later
         $data = [
            'labels' => ['Apr-21', 'May-21', 'Jun-21', 'Jul-21', 'Aug-21','Sep-21', 'May-22', 'Jun-22', 'Jul-22', 'Aug-22','Sep-22', 'Oct-22', 'Nov-22', 'Apr-23', 'May-23', 'Jun-23', 'Jul-23', 'Aug-23', 'Sep-23', 'Oct-23'],
            'data' => [90, 0, 29, 93, 3, 20, 116, 44, 2, 0, 7, 0, 2, 2, 20, 10, 375, 3 ,2, 184],
        ];
         return view('home', compact('data'));
         
     }

}
