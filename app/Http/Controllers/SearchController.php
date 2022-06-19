<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //

    public function searchAccount(){
        // dd(Request()->all());

        $accounts = User::where('status' , '=', 'Active');
        $search = Request()->validate([
            'search' => 'required'
        ]);

        if($search){
            
           
    
        } 
           
    
    
    }

        
        
        
        
        
           private function getAccount($accounts, $search){
            $acc = $accounts->where('email' , 'like', '%'.$search['search'].'%')
            ->where('role' , 'like', '%'.$search['search'].'%')
            ->where('status' , 'like', '%'.$search['search'].'%')
            ->where('type' , 'like', '%'.$search['search'].'%');         

            return view('account', ['accounts' => $acc]);
            return view('account', ['accounts' => $accounts]);
        }

    }





