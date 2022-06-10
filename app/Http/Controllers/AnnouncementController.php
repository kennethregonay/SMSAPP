<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AnnouncementController extends Controller
{
    //
    public function index (){
        $announcement = Announcement::all();
        return view('noticeboard')->with('announcement', $announcement);
    }

    public function create (){
        $info = Request()->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        
        $announce = new Announcement();
        $announce['title'] = $info['title'];
        $announce['desc'] = $info['description'];
        $announce['date'] = Carbon::today()->format('m-d-Y');
        $announce['user_id'] = Auth()->user()->id;
        $announce->save();

        return back();  
    }
    public function update (){
        $request = Request()->all();
        $inputs = Request()->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $id = $request['num'];
        $record = Announcement::find($id);
        
        $record['title'] = $inputs['title'];
        $record['desc'] = $inputs['description'];
        $record->save();
        
        return back();   
    }

    
    public function delete (){
        $request = Request()->all();
        $id = $request['num'];
        Announcement::destroy($id);
        // return redirect('/noticeboard');
        return back();
    }
}
    