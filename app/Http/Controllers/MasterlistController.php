<?php

namespace App\Http\Controllers;

use App\Models\Learner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasterlistController extends Controller
{
    //  
    public function index()
    {

        if(Auth()->user()->section == null){
        return redirect('dashboard')->with('success', 'You are not assign on a section yet.');
        }else{
            $learners = Learner::where('section_id', '=', Auth()->user()->section->id)->paginate(25);
            return view('masterlist') ->with('learners', $learners);
              
        }

     
    }
}
