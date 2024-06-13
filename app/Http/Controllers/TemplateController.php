<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ObservationData;
use App\Models\PlantData;

class TemplateController extends Controller
{
    public function template()
    {
        return view('frontend.citizen_scientists');
    }

    function chart(){

         $data = [
            'labels' => ['Apr-21', 'May-21', 'Jun-21', 'Jul-21', 'Aug-21','Sep-21', 'May-22', 'Jun-22', 'Jul-22', 'Aug-22','Sep-22', 'Oct-22', 'Nov-22', 'Apr-23', 'May-23', 'Jun-23', 'Jul-23', 'Aug-23', 'Sep-23', 'Oct-23'],
            'data' => [90, 0, 29, 93, 3, 20, 116, 44, 2, 0, 7, 0, 2, 2, 20, 10, 375, 3 ,2, 184],
        ];
         return view('frontend.data', compact('data'));
         
     }

     function show(){
        $data=ObservationData::paginate(10);
        return view('frontend.num_observation',['observations'=>$data]);  
    }

    function showPlant(){
        $data=PlantData::paginate(10);
        return view('frontend.ind_observation',['observations'=>$data]);  
    }

    
    public function detail($id)
    {
        $detail_plant_data = PlantData::find($id);
        return view('frontend.cs_detail_plant', compact('detail_plant_data'));
    }

}
