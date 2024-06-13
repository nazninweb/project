<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class ExcelWriter implements FromCollection,WithHeadings {

    public function collection(){
        $d=DB::select("SELECT * FROM `observation_data`");
        $data=[];
        foreach ($d as $v){
            $data[]=["id"=>$v->id,"date"=>$v->date,"number"=>$v->number];

        }
        return collect($data);
    }

    public function headings():array{
        return ["ID","date","number"];
    }
}