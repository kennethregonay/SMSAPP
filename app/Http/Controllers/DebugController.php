<?php

namespace App\Http\Controllers;

use App\Models\Learner;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;

class DebugController extends Controller
{
    //

    // the function for the  initilization of the data in the section view
    public function index () {
        $learners =  Learner::where('EnrollmentStatus' , '=' , 'Registered')->get();
        $teachers =  User::where ('type', '=' , 'Teacher')->where('sections_id', '=', null )->where('status', '=', 'Active')->get();
        $advisers =  User::where ('type', '=' , 'Teacher')->where('sections_id', '!=', null )->get();
        $sections =  Section::all();           
        return view('debug.section', ['learners' => $learners , 'teachers'  => $teachers 
        , 'sections' => $sections , 'advisers' => $advisers]);
    }

    // the functionalities for the creation of sections
    public function create (){
        
        // Validation of the inputs
        $info = Request()->validate([
        'section_name' => 'required',
        'section_type' => 'required',
        'glevel'       => 'required',
        'adviser'      => 'required',
        ]);
      

    
        // saving of the section table
        $sections = new Section();
        $sections['name'] = $info ['section_name'];
        $sections['type'] = $info ['section_type'];
        $sections['glevel'] = $info ['glevel'];
        $sections->save();

     // getting and finding the adviser on the users table
       $adviser = User::where ('type', '=' , 'Teacher')->where('name' , '=' , $info['adviser'])->get()->first();
       $adviser->sections_id = $sections['id'];
       $adviser->save();
      return back();
    
}   
// the functionalities for the update of sections details and adviser
    public function update (){
       
    
        $info = Request()->validate([
            'section_name' => 'required',
            'section_type' => 'required',
            'glevel'       => 'required',
            'adviser'      => 'required',
            'checker'      => 'required',
            'section_id'   => 'required',
             ]); 

             // If the adviser was changed
    
        if ($info['checker'] != $info ['adviser']){
           $prev_adviser = User::where ('type', '=' , 'Teacher')->where('name' , '=' , $info['checker'])->get()->first();
           $new_adviser =   User::where ('type', '=' , 'Teacher')->where('name' , '=' , $info['adviser'])->get()->first();


           // Previous Adviser Nullation of Attributes
           $prev_adviser->sections_id = null;
           $prev_adviser->save();

           // New Adviser Assignation
           $new_adviser->sections_id = $info['section_id'];
           $new_adviser->save();

           // Updating the Section Table
            $sections = Section::find($info['section_id']);
            $sections->name = $info['section_name'];
            $sections->type = $info['section_type'];
            $sections->glevel = $info['glevel'];
            $sections->save();

        }else{
        // if Adviser is not changed
            $sections = Section::find($info['section_id']);
            $sections->name = $info['section_name'];
            $sections->type = $info['section_type'];
            $sections->glevel = $info['glevel'];
            $sections->save();
        }

        return back();
    }

    // delete section in the database and make the teacher's foreign key to section null
    public function delete (){
        $info = Request()->all();
        $adviser = User::find($info['adviser_id']);
        $adviser->sections_id = null;
        $adviser->save();
        Section::destroy($info['section_id']);
        return back();
    }

    // the funtionalities for the button of sectioning of learners in the section view
    public function sectionize () {
       $learners = Learner::where('EnrollmentStatus', '=' , 'Registered')->get();
       $sections = Section::all();
 
       $types = [
        '0' => ['Kindergarten', 'Pilot', '>='],
        '1' => ['Grade 1', 'Pilot', '>='],
        '2' => ['Grade 2', 'Pilot', '>='],
        '3' => ['Grade 3', 'Pilot', '>='],
        '4' => ['Grade 4', 'Pilot', '>='],
        '5' => ['Grade 5', 'Pilot', '>='],
        '6' => ['Grade 6', 'Pilot', '>='],
        '7' => ['Kindergarten', 'Regular', '<'],
        '8' => ['Grade 1', 'Regular', '<'],
        '9' => ['Grade 2', 'Regular', '<'],
        '10' => ['Grade 3', 'Regular', '<'],
        '11' => ['Grade 4', 'Regular', '<'],
        '12' => ['Grade 5', 'Regular', '<'],
        '13' => ['Grade 6', 'Regular', '<'],
    ];

    $categorySection = $this->categorizeSections($types, $sections);
    $categoryStudent = $this->categorizeLearners($types, $learners);
    
    $this->assignStudents($categorySection, $categoryStudent);
    dd($categorySection, $categoryStudent);
    }


    // categorizes the sections
    private function categorizeSections ($types, $sections){
        $categorySection = collect([0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]);
        for($i = 0;$i < 14;$i++){
            $categorySection[$i] = $sections->where('glevel', '=', $types[$i][0])->where('type', '=', $types[$i][1]);
        }
        return $categorySection;
    }

    // categorized the learners based on their grade level and final rating
    private function categorizeLearners($types, $students){
        $categoryStudent = collect([0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]);
        for($i = 0;$i < 14;$i++){
            $categoryStudent[$i] = $students->where('glevel', '=', $types[$i][0])->where('GWA', $types[$i][2], 89);
        }
        return $categoryStudent;
    }

    // Assign the learners to the different sections based on their final rating
    private function assignStudents($categorySection, $categoryStudent){
        $sectionedStudents = collect([0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]);
        $sectionKeys = collect([0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]);
        $studentKeys = collect([0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]);
        for($i = 0;$i < 14;$i++){
            if(count($categorySection[$i]) != 0){
                $sectionedStudents[$i] = $categoryStudent[$i]->splitIn(count($categorySection[$i]));
                $studentKeys[$i] = $categoryStudent[$i]->keys();
                $sectionKeys[$i] = $categorySection[$i]->keys();
            }else{
                $sectionedStudents[$i] = null;
                $studentKeys[$i] = null;
                $sectionKeys[$i] = null;
            }
        }
        
        for($i = 0;$i < 14;$i++){
            $pointer = 0;

            if(!is_null($sectionedStudents[$i])){
                for($j = 0;$j < count($sectionedStudents[$i]);$j++){
                    foreach($sectionedStudents[$i][$j] as $student){
                        $key = $sectionKeys[$i][$pointer];
                        $student['section_id'] = $categorySection[$i][$key]->id;
                        $student->save();
                    }
                    $pointer++;
                }

            }
        }

        dd($sectionedStudents);
    }






}
