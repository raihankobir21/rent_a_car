<?php

namespace App\Http\Controllers;

use App\Models\ModelName;

use Illuminate\Http\Request;
use DB;
use Hash;
use Session;
use Auth;


class AjaxController extends Controller
{



    public function getModelNames( $id = '' )
    {   
       
        $data = [];

        $data = ModelName::where('brand_id', $id) 
        ->where('status', 1)
        ->pluck('name', 'id')
        ->toArray();
            
// dd($data);
      
        return response()->json($data);
    }



   

   
}