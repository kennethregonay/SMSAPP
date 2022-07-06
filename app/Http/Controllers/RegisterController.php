<?php

namespace App\Http\Controllers;

use App\Models\Guardian;
use App\Models\Learner;
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
            'parents_educ-attain' => 'nullable'
        ]);
        return view ('confirmation')->with('request' , $request);
    }

    // Digdi ma save
    public function confirmation()
    {
        $info = Request()->all();

        // create a validation

        // $info = Request()->validate([
        //     'ref_no' => 'required',
        //     'school_type' => 'required',
        //     'prev_grade' => 'required',
        //     'prev_section' => 'required',
        //     'school_id' => 'nullable',
        //     'school_name' => 'required',
        //     'prev_schoolyear' => 'required',
        //     'school_address' => 'required',
        //     'type' => 'required',
        //     'glevel' => 'required',
        //     'fname' => 'required',
        //     'mname' => 'nullable',
        //     'lname' => 'required',
        //     'extension' => 'nullable',
        //     'address' => 'required',
        //     'gwa' => 'required',
        //     'LRN' => 'nullable',
        //     'birthdate' => 'required',
        //     'mothertongue' => 'required',
        //     'gender' => 'required',
        //     'national' => 'required',
        //     'religion' => 'required',
        //     'contact' => 'required',
        //     'email' => 'required',
        //     'PWD' => 'nullable',
        //     'parent_type' => 'required',
        //     'parents_gender' => 'required',
        //     'parents_fname' => 'required',
        //     'parents_mname' => 'nullable',
        //     'parents_lname' => 'required',
        //     'parents_contact' => 'required',
        //     'parents_email' => 'required',
        //     'parents_educ-attain' => 'nullable'
        // ]);

        $parent = new Guardian();
        $parent['type'] = $info['p_type'];
        $parent['fname'] = $info['p_fname'];
        $parent['mname'] = $info['p_mname'];
        $parent['lname'] = $info['p_lname'];
        $parent['gender'] = $info['p_gender'];
        $parent['email'] = $info['p_email'];
        $parent['contactNo'] = $info['p_contact'];
        $parent['educAttain'] = $info['p_educ-attain'];
        $parent->save();

        $learner = new Learner();
          
        $learner['fname']  =  $info['l_fname'];
        $learner['mname']  =  $info['l_mname'];
        $learner['lname']  =  $info['l_lname'];
        $learner['extension']  =  $info['l_extension'];
        $learner['typelearners']  =  $info['l_type'];
        $learner['glevel']  =  $info['l_glevel'];
        $learner['LRN']  =  $info['l_lrn'];
        $learner['contactNo']  =  $info['l_contact'];
        $learner['email']  =  $info['l_email'];
        $learner['gender']  =  $info['l_gender'];
        $learner['birthdate']  =  $info['l_birthdate'];
        $learner['religion']  =  $info['l_mothertongue'];
        $learner['motherTongue']  =  $info['l_mothertongue'];
        $learner['national']  =  $info['l_national'];
        $learner['address']  =  $info['l_address'];
        $learner['PWD']  =  $info['PWD'];
        $learner['EnrollmentStatus']  =  'Pre-Registered';
        $learner['RefNo']  =  $info['ref_no'];
        $learner['guardians_id'] = $parent['id'];
        $learner['GWA'] = $info['gwa'];
        $learner->save();
 
        $school = new School();

        $school['type']= $info['s_type'];
        $school['gradelevel']= $info['s_grade'];
        $school['section']= $info['s_section'];
        $school['schoolID']= $info['s_id'];
        $school['name']= $info['s_name'];
        $school['schoolyear']= $info['s_schoolyear'];
        $school['address']= $info['s_address'];
        $school['learner_id']=$learner['id'];
        $school->save();
        
        session()->flash('registerSuccess', 'Registration Successful');

        return redirect('/');
    }
}


