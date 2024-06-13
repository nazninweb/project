<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JsonData;
use Illuminate\Support\Facades\Storage;


class JsonFileUploadController extends Controller
{
    public function upload(){

        return view("jsonfile_upload");

    }

    public function uploadPost(Request $request){

        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();

           
           $filename = 'test.'.$extension;

            
            $path = $file->storeAs('public/json',$filename);

            if($file->move($path, $filename))
            {
                return view("jsonfile_upload");
             
                

            }
            else{
                return view("jsonfile_upload");
             
            }
            

    }

    public function uploadJson(){

        return view("json_upload_image");

    }

    public function uploadImage(Request $request){

        
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();

           
           $filename = '.'.$extension;

           
            $path = 'uploads/';

            if($file->move($path, $filename))
            {
                return view("json_upload_image");
             
                

            }
            else{
                return view("json_upload_image");
             
            }
            

    }



}
