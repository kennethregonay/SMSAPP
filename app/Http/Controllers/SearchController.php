<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //

    public function searchAccount(){
        // dd(Request()->all());

        $accounts = User::where('status' , '=', 'Active')->get();
        $search = Request()->validate([
            'search' => 'required'
        ]);

        if($search){
            
        }
      
    }




}
