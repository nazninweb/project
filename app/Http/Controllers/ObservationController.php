<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ObservationData;
use Excel;


class ObservationController extends Controller
{
    public function index()
    {
        return view('add_monthly_observations');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'number' => 'required|max:32'   
        ]);
        $observation = new ObservationData();
        $observation->date = $request->input('date');
        $observation->number = $request->input('number');
        
        $observation->save();

        // Additional logic or redirection after successful data storage

        return redirect()->back()->with('success', 'data stored successfully!');
    }

    function show(){
        $data=ObservationData::paginate(10);
        return view('number_of_observations',['observations'=>$data]);  
    }

    function chart(){
      
        // Replace this with  actual data later
        $data = [
            'labels' => ['Apr-21', 'May-21', 'Jun-21', 'Jul-21', 'Aug-21','Sep-21', 'May-22', 'Jun-22', 'Jul-22', 'Aug-22','Sep-22', 'Oct-22', 'Nov-22', 'Apr-23', 'May-23', 'Jun-23', 'Jul-23', 'Aug-23', 'Sep-23', 'Oct-23'],
            'data' => [90, 0, 29, 93, 3, 20, 116, 44, 2, 0, 7, 0, 2, 2, 20, 10, 375, 3 ,2, 184],
        ];
        
        return view('summary', compact('data'));
        
    }
 

    public function excel()
    {
        return view('excel_upload');
    }

    public function excel_worker(Request $request)
    {
        Excel::import(new ExcelReader(),$request->file);
    }



    public function download_excel()
    {
        return Excel::download(new ExcelWriter(),"ObservationData.xlsx");
    }

    public function edit($id)
    {
        $edit_obsdata = ObservationData::find($id);
        return view('edit', compact('edit_obsdata'));
    }

    public function update(Request $request, $id)
    {
        $edit_obsdata = ObservationData::find($id);
        $edit_obsdata->date = $request->input('date');
        $edit_obsdata->number = $request->input('number');
       
        $edit_obsdata->update();
        return redirect('/number_of_observations')->with('status',"Data Updated Successfully");
    }

    public function remove($id)
    {
        $remove_obsdata = ObservationData::find($id);
        $remove_obsdata->delete();
        return redirect('/number_of_observations')->with('status',"Data Delete Successfully");


    }

   

   


   
 
}
