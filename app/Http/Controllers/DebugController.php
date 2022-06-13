<?php

namespace App\Http\Controllers;

use App\Models\Learner;
use App\Models\User;
use Illuminate\Http\Request;

class DebugController extends Controller
{
    //


    public function index () {
        $learners = Learner::where('EnrollmentStatus', '=' . 'Registered');
        $teachers =  User::where ('type', '=' , 'Teacher');
        return view('debug.section', ['learners' => $learners , 'teachers' , $teachers ]);
    }


}
