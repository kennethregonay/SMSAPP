<?php

namespace App\Http\Controllers;

use App\Models\Learner;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;

class SectioningController extends Controller
{
    //
    public function index (){
        $teachers = User::where('type', '=', 'Teacher')->get();
        $sections = Section::all();
        $learners = Learner::where('EnrollmentStatus', '=', 'Enrolled')->get();


        return view('section', ['sections' => $sections, 'teachers' => $teachers, 'learners' => $learners]);
    }
    public function update (){
        
        dd(Request()->all());

        // $request = Request()->all();
        // $inputs = Request()->validate([  
        //     'name' => 'required',
        //     'donation' => 'required',
        //     'amount' => 'required',
        //     'date' => 'required',
        // ]);
        // $id = $request['num'];
        // $record = Brigada::find($id);
        // $record['name'] = $inputs['name'];
        // $record['donation'] = $inputs['donation'];
        // $record['amount'] = $inputs['amount'];
        // $record['date'] = $inputs['date'];
        // $record->save();
    }
    public function delete (){
        $request = Request()->all();
        $id = $request['num'];
         Section::destroy($id);
        return back();
    }
    public function create (){
        $request = request()->validate([
            'classType' => 'required',
            'sectionName' => 'required',
            'gradeLevel' => 'required',
            'adviser' => 'required',
        ]);

        $section = new Section;
        $section['type'] = $request['classType'];
        $section['name'] = $request['sectionName'];
        $section['glevel'] = $request['gradeLevel'];
        $section['users_id'] = $request['adviser'];
        $section->save();

        session()->flash('addsecSuccess', 'Add Section Successful');
        return redirect('section');
    }

    public function sectionLearners(){
        $learners = Learner::where('EnrollmentStatus', '=', 'Enrolled')->get();
        $sections = Section::all();



        $students = $this->assignLearners($learners);
        $sections = $this->assignSections($sections);
        
        $noStudent = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $types = [
            '0' => ['Kindergarten', 'Pilot'],
            '1' => ['Grade 1', 'Pilot'],
            '2' => ['Grade 2', 'Pilot'],
            '3' => ['Grade 3', 'Pilot'],
            '4' => ['Grade 4', 'Pilot'],
            '5' => ['Grade 5', 'Pilot'],
            '6' => ['Grade 6', 'Pilot'],
            '7' => ['Kindergarten', 'Regular'],
            '8' => ['Grade 1', 'Regular'],
            '9' => ['Grade 2', 'Regular'],
            '10' => ['Grade 3', 'Regular'],
            '11' => ['Grade 4', 'Regular'],
            '12' => ['Grade 5', 'Regular'],
            '13' => ['Grade 6', 'Regular'],
        ];


        for($i = 0;$i < 14;$i++){
            if(count($sections[$i]) > 0){
                $noStudent[$i] = ceil(count($students[$i])/count($sections[$i]));
            }
        }

        for($i = 0;$i < 14;$i++){
            $this->assignLearnerSections($noStudent[$i], $students[$i], $sections[$i], $types[$i]);
        }
        

        return redirect('section');
    }
    private function assignLearners($learners){
        $learn = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

        $learn[0] = $learners->where('glevel', '=', 'Kindergarten')->where('GWA', '>=', 89);
        $learn[1] = $learners->where('glevel', '=', 'Grade 1')->where('GWA', '>=', 89);
        $learn[2] = $learners->where('glevel', '=', 'Grade 2')->where('GWA', '>=', 89);
        $learn[3] = $learners->where('glevel', '=', 'Grade 3')->where('GWA', '>=', 89);
        $learn[4] = $learners->where('glevel', '=', 'Grade 4')->where('GWA', '>=', 89);
        $learn[5] = $learners->where('glevel', '=', 'Grade 5')->where('GWA', '>=', 89);
        $learn[6] = $learners->where('glevel', '=', 'Grade 6')->where('GWA', '>=', 89);

        $learn[7] = $learners->where('glevel', '=', 'Kindergarten')->where('GWA', '<', 89);
        $learn[8] = $learners->where('glevel', '=', 'Grade 1')->where('GWA', '<', 89);
        $learn[9] = $learners->where('glevel', '=', 'Grade 2')->where('GWA', '<', 89);
        $learn[10] = $learners->where('glevel', '=', 'Grade 3')->where('GWA', '<', 89);
        $learn[11] = $learners->where('glevel', '=', 'Grade 4')->where('GWA', '<', 89);
        $learn[12] = $learners->where('glevel', '=', 'Grade 5')->where('GWA', '<', 89);
        $learn[13] = $learners->where('glevel', '=', 'Grade 6')->where('GWA', '<', 89);

        return $learn;
    }
    private function assignSections($sections){
        $sec = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

        $sec[0] = $sections->where('glevel', '=', 'Kindergarten')->where('type', '=', 'Pilot');
        $sec[1] = $sections->where('glevel', '=', 'Grade 1')->where('type', '=', 'Pilot');
        $sec[2] = $sections->where('glevel', '=', 'Grade 2')->where('type', '=', 'Pilot');
        $sec[3] = $sections->where('glevel', '=', 'Grade 3')->where('type', '=', 'Pilot');
        $sec[4] = $sections->where('glevel', '=', 'Grade 4')->where('type', '=', 'Pilot');
        $sec[5] = $sections->where('glevel', '=', 'Grade 5')->where('type', '=', 'Pilot');
        $sec[6] = $sections->where('glevel', '=', 'Grade 6')->where('type', '=', 'Pilot');

        $sec[7] = $sections->where('glevel', '=', 'Kindergarten')->where('type', '=', 'Regular');
        $sec[8] = $sections->where('glevel', '=', 'Grade 1')->where('type', '=', 'Regular');
        $sec[9] = $sections->where('glevel', '=', 'Grade 2')->where('type', '=', 'Regular');
        $sec[10] = $sections->where('glevel', '=', 'Grade 3')->where('type', '=', 'Regular');
        $sec[11] = $sections->where('glevel', '=', 'Grade 4')->where('type', '=', 'Regular');
        $sec[12] = $sections->where('glevel', '=', 'Grade 5')->where('type', '=', 'Regular');
        $sec[13] = $sections->where('glevel', '=', 'Grade 6')->where('type', '=', 'Regular');

        return $sec;
    }
    private function assignLearnerSections($noStudent, $students, $sections, $types){
        $learners = Learner::where('EnrollmentStatus', '=', 'Enrolled')->get();
        $sections = Section::all();
        // $sections = Section::all();
        // dd($sections);
        // foreach ($learners as $learner) {
        //     do{

        //     }while($sections);
        // }
        
        $studentkeys = $students->keys();
        $sectionkeys = $sections->keys();

        $stud = count($studentkeys);
        $secId = 0;
        $noStud = 0;

        // dd($students[$studentkeys[$noStud]]);
        foreach($sections as $section){
            while($noStud < $noStudent){
                $students[$studentkeys[$noStud]]['section_id'] = $section->id;
                $students[$studentkeys[$noStud++]]->save();
            }
        }
    


    }
}
