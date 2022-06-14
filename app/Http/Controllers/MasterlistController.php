<?php

namespace App\Http\Controllers;

use App\Models\Learner;
use App\Models\User;
use Illuminate\Http\Request;

class MasterlistController extends Controller
{
    //  
    public function index (){
        // $users = User::all();
        return view('masterlist');
    }

}


