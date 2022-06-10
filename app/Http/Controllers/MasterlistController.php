<?php

namespace App\Http\Controllers;

use App\Models\Learner;
use Illuminate\Http\Request;

class MasterlistController extends Controller
{
    //  
    public function index (){
        $learners = Learner::all();
        return view('masterlist', ['learners' => $learners]);
    }

}


