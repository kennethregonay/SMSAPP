<?php

namespace App\Http\Controllers;

use App\Models\Learner;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;

class SectioningController extends Controller
{

    public function index(){
        $sections = Section::all();
        $students = Learner::all();
        $teachers = User::Where('type' , '=' , 'Teacher');

        return view('section', ['sections' => $sections, 'learners' => $students  , 'teachers' => $teachers]);
    }
    public function create(){
        // dd(request()->all());

        $request = request()->validate([
            'name' => 'required',
            'glevel' => 'required',
            'type' => 'required',
            'adviser' => 'required'
        ]);


        for($i = 0;$i < count($request['name']); $i++)
        {
            $section = new Section;
            $section['name'] = $request['name'][$i];
            $section['glevel'] = $request['glevel'][$i];
            $section['type'] = $request['type'][$i];
            $section['user_id'] = $request['adviser'][$i];
            $section->save();
        }

        return redirect('/');
    }
    public function sectionLearners(){
        $students = Learner::all();
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

        $categorySection = $this->categorizeSection($types, $sections);
        $categoryStudent = $this->categorizeStudent($types, $students);

        // $noPerSection = collect([0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]);
        
        // for($i = 0;$i < 14;$i++){
        //     if(count($categorySection[$i]) > 0){
        //         $noPerSection[$i] = ceil(count($categoryStudent[$i]) / count($categorySection[$i]));
        //     }
        // }

        $this->assignStudents($categorySection, $categoryStudent);
        dd($categorySection, $categoryStudent);

    }
    private function categorizeStudent($types, $students){
        $categoryStudent = collect([0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]);
        for($i = 0;$i < 14;$i++){
            $categoryStudent[$i] = $students->where('glevel', '=', $types[$i][0])->where('GWA', $types[$i][2], 89);
        }
        return $categoryStudent;
    }
    private function categorizeSection($types, $sections){
        $categorySection = collect([0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]);
        for($i = 0;$i < 14;$i++){
            $categorySection[$i] = $sections->where('glevel', '=', $types[$i][0])->where('type', '=', $types[$i][1]);
        }

        return $categorySection;
    }
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
