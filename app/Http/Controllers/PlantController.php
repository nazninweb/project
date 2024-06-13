<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlantData;
use Excel;

class PlantController extends Controller
{
    public function index()
    {
        return view('add_individual_observations');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:256',
            'number' => 'max:32',   
            'tag' => 'max:256',
            'date' => 'max:256',   
            'notes' => 'max:256',
            'location' => 'max:32',   
            'altitude' => 'max:256',
            'latitude' => 'max:256',   
            'longitude' => 'max:256',  
            'images' => 'nullable|mimes:png,jpg,jpeg,webp'

            //'images' => 'max:256'
            
        ]);

        $filename = NULL;
        $path = NULL;

        if($request->has('images')){

            $file = $request->file('images');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'uploads/';
            $file->move($path, $filename);
        }

        $plantgroup = new PlantData();
        $plantgroup->name = $request->input('name');
        $plantgroup->number = $request->input('number');
        $plantgroup->tag = $request->input('tag');
        $plantgroup->date = $request->input('date');
        $plantgroup->notes = $request->input('notes');
        $plantgroup->location = $request->input('location');
        $plantgroup->altitude = $request->input('altitude');
        $plantgroup->latitude = $request->input('latitude');
        $plantgroup->longitude = $request->input('longitude');
        $plantgroup->images = $path.$filename;
        
        $plantgroup->save();

        // Additional logic or redirection after successful data storage

        return redirect()->back()->with('success', 'data stored successfully!');
    }


    function showPlant(){
        $data=PlantData::paginate(10);
        return view('individual_observations',['observations'=>$data]);  
    }

    public function edit($id)
    {
        $edit_plant_data = PlantData::find($id);
        return view('edit_plant', compact('edit_plant_data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:256',
            'number' => 'max:32',   
            'tag' => 'max:256',
            'date' => 'max:256',   
            'notes' => 'max:256',
            'location' => 'max:32',   
            'altitude' => 'max:256',
            'latitude' => 'max:256',   
            'longitude' => 'max:256',  
            'images' => 'nullable|mimes:png,jpg,jpeg,webp'

            
        ]);
        
        $edit_plant_data = PlantData::find($id);

        if($request->has('images')){

            $file = $request->file('images');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'uploads/';
            $file->move($path, $filename);

            $edit_plant_data = PlantData::find($id);
            $edit_plant_data->name = $request->input('name');
            $edit_plant_data->number = $request->input('number');
            $edit_plant_data->tag = $request->input('tag');
            $edit_plant_data->date = $request->input('date');
            $edit_plant_data->notes = $request->input('notes');
            $edit_plant_data->location = $request->input('location');
            $edit_plant_data->altitude = $request->input('altitude');
            $edit_plant_data->latitude = $request->input('latitude');
            $edit_plant_data->longitude = $request->input('longitude');
            $edit_plant_data->images = $path.$filename;
            $edit_plant_data->update();
        }


        $edit_plant_data = PlantData::find($id);
        $edit_plant_data->name = $request->input('name');
        $edit_plant_data->number = $request->input('number');
        $edit_plant_data->tag = $request->input('tag');
        $edit_plant_data->date = $request->input('date');
        $edit_plant_data->notes = $request->input('notes');
        $edit_plant_data->location = $request->input('location');
        $edit_plant_data->altitude = $request->input('altitude');
        $edit_plant_data->latitude = $request->input('latitude');
        $edit_plant_data->longitude = $request->input('longitude');

        $edit_plant_data->update();
        return redirect('/individual_observations')->with('status',"Data Updated Successfully");
    }

    public function destroy(int $id)
    {
        $edit_plant_data = PlantData::find($id);
        if(File::exists($edit_plant_data->images)){
            File::delete($edit_plant_data->images);
        }

        $edit_plant_data->delete();

        return redirect()->back()->with('status','Plant data Deleted');
    }

    public function remove($id)
    {
        $remove_plant_data = PlantData::find($id);

      
        $remove_plant_data->delete();
        return redirect('/individual_observations')->with('status',"Data Delete Successfully");

    }


    public function detail($id)
    {
        $detail_plant_data = PlantData::find($id);
        return view('detail_plant', compact('detail_plant_data'));
    }

    public function search(Request $request)
    {
        $output="";

        $search_data=PlantData::where('name','Like','%'.$request->search.'%')->orWhere('number','Like','%'.$request->search.'%')->get();

        foreach($search_data as $search_data)
        {
            $output.=

            '<tr>
            <td>'.$search_data->name.'</td>
            <td>'.$search_data->number.'</td>

            <td>
            '.'
            <a href="/edit_plant_data/'.$search_data->id.'" class="btn btn-success">'.'Edit</a>
            <a href="/delete_plant_data/'.$search_data->id.'" class="btn btn-danger">'.'Delete</a>
            <a href="/detail_plant_data/'.$search_data->id.'" class="btn btn-primary">'.'Detail</a>


            '.'
            </td>
           
            </tr>';
        }
        return response ($output);

    }




   
 
}

