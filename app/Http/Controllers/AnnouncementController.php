<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    //
    public function index (){
        $announcement = Announcement::all();
        return view('noticeboard')->with('announcement', $announcement);
    }

    public function create (){
        $info = Request()->validate([
            'name' => 'required',
            'donation' => 'required',
            'amount' => 'required',
            'date' => 'required',
        ]);
        
        $brigada = new Announcement();

        $brigada['name'] = $info['name'];
        $brigada['donation'] = $info['donation'];
        $brigada['amount'] = $info['amount'];
        $brigada['date'] = $info['date'];
        $brigada->save();

        return back();  
    }
    public function update (){
        
    }
    public function delete (){
        
    }
}
