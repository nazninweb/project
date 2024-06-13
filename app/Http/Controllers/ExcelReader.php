<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use DB;

class ExcelReader implements ToCollection {

    public function collection(Collection $rows){
        foreach ($rows as $row){
            DB::table("plant_data")->insert([
                "name"=>$row[0],
                "number"=>$row[1],
            
            ]);
            

        }
        
    }

    
}