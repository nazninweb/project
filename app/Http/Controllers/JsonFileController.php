<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JsonData;
use Illuminate\Support\Facades\Storage;


class JsonFileController extends Controller
{
    public function saveJsonData(){
        $records=Storage::json('/public/json/test.json');

        foreach($records as $record){
            $jsonD = new JsonData;
            $jsonD->tag=$record['tag'];
            $jsonD->date=$record['date'];
            $jsonD->notes=$record['notes'];
            $jsonD->taxon=$record['taxon'];
            
            $jsonD->altitude=$record['altitude'];
            $jsonD->latitude=$record['latitude'];
            $jsonD->longitude=$record['longitude'];
            $jsonD->answers=$record['answers'];
            $jsonD->images=$record['images'];
           
            $jsonD->save();
        }
        return redirect()->back()->with('success', 'data stored successfully!');
    }

    function showPlant(){
        $data=JsonData::paginate(10);
        return view('json_detail_plant',['observations'=>$data]);  
    }
}
