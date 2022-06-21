<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Brigada;
use App\Models\Learner;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //

    public function searchAccount(Request $request){
        
        if($request->search === null){
            return redirect('account');
        }

        $accounts = User::where('status', '=', 'Active')
                    ->where("type", "LIKE", "%{$request->search}%")
                    ->orWhere("email", "LIKE", "%{$request->search}%")
                    ->orWhere("role", "LIKE", "%{$request->search}%")->paginate(15);
        

        return view('account', ['accounts' => $accounts]);
   
    }

    public function searchRequest (Request $request){
        
        // dd($request);
        if($request->search === null){
            return redirect('request');
        }
        $accounts = User::where('status', '=', 'Pending')
                    ->where("type", "LIKE", "%{$request->search}%")
                    ->orWhere("email", "LIKE", "%{$request->search}%")
                    ->orWhere("role", "LIKE", "%{$request->search}%")->paginate(15);
        

        return view('request', ['accounts' => $accounts]);

    }

    public function searchLearner (Request $request){
        
        
         if($request->search === null){
            return redirect('masterlist');
        }
        $learners = Learner::where('section_id', '=', Auth()->user()->section->id)
                    ->where("fname", "LIKE", "%{$request->search}%")
                    ->orWhere("lname", "LIKE", "%{$request->search}%")
                    ->orWhere("mname", "LIKE", "%{$request->search}%")
                    ->orWhere("gender", "LIKE", "%{$request->search}%")->paginate(15);
        return view('masterlist', ['learners' => $learners]);


    }

    public function searchBrigada (Request $request){
        
        if($request->search === null){
           return redirect('brigada');
       }

       $items = Brigada::where("name", "LIKE", "%{$request->search}%")
                      ->orWhere("donateType", "LIKE", "%{$request->search}%")
                      ->orWhere("donation", "LIKE", "%{$request->search}%")
                      ->orWhere("amount", "LIKE", "%{$request->search}%")
                      ->orWhere("quantity", "LIKE", "%{$request->search}%")->paginate(15);

    return view('brigada')->with('items', $items);

   }
   

   public function searchRegister (Request $request){
    // dd($request);
        
    if($request->search === null){
       return redirect('registrationManage');
   }
   $learners = Learner::where('EnrollmentStatus', '=', 'Pre-Registered')
               ->where("RefNo", "LIKE", "%{$request->search}%")
               ->orwhere("fname", "LIKE", "%{$request->search}%")
               ->orWhere("lname", "LIKE", "%{$request->search}%")
               ->orWhere("mname", "LIKE", "%{$request->search}%")
               ->orWhere("GWA", "LIKE", "%{$request->search}%")
               ->orWhere("glevel", "LIKE", "%{$request->search}%")->paginate(15);
        
               return view ('registerformlist', ['learners' => $learners]);


}


   //Sorting Functions

   //Brigada
   public function sort_bname (){
    $item = Brigada::all();
    $items = $item->sortBy('name');
    return view('brigada')->with('items', $items);
   }

   public function sort_bdate (){
    $item = Brigada::all();
    $items = $item->sortByDesc('date');
    return view('brigada')->with('items', $items);
    }

    }





