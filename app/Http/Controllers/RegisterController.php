<?php

namespace App\Http\Controllers;

use App\Models\Learner;
use App\Models\Parent;
use App\Models\School;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Nullable;

class RegisterController extends Controller
{
    //
    public function index (){
        do{
        $ref_no = rand();
        $learners = Learner::where('RefNo', '=', $ref_no)->get();
       }while(count($learners) > 0);
       
        return view('registration', ['ref_no' => $ref_no]);
    }

    public function register (){
        // dd(Request()->all());
        $request = Request()->validate([
            'ref_no' => 'required',
            'school_type' => 'required',
            'prev_grade' => 'required',
            'prev_section' => 'required',
            'school_id' => 'nullable',
            'school_name' => 'required',
            'prev_schoolyear' => 'required',
            'school_address' => 'required',
            'type' => 'required',
            'glevel' => 'required',
            'fname' => 'required',
            'mname' => 'nullable',
            'lname' => 'required',
            'extension' => 'nullable',
            'address' => 'required',
            'gwa' => 'required',
            'LRN' => 'nullable',
            'birthdate' => 'required',
            'mothertongue' => 'required',
            'gender' => 'required',
            'national' => 'required',
            'religion' => 'required',
            'contact' => 'required',
            'email' => 'required',
            'PWD' => 'nullable',
            'parent_type' => 'required',
            'parents_gender' => 'required',
            'parents_fname' => 'required',
            'parents_mname' => 'nullable',
            'parents_lname' => 'required',
            'parents_contact' => 'required',
            'parents_email' => 'required',
            'parents_educ-attain' => 'nullable',
        ]);
        return view ('confirmation', ['request' => $request]);
    }

    // Digdi ma save
    public function confirmation()
    {
        $school = new School();
        $parent = new Parent();
        $learner = new Learner();


Learner



    }
}
