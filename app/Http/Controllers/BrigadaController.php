<?php

namespace App\Http\Controllers;

use App\Models\Brigada;
use Illuminate\Http\Request;

class BrigadaController extends Controller
{
    //
    public function index (){
            $items = Brigada::all();
            return view('brigada')->with('items', $items);
    }
    public function create (){
        $info = Request()->validate([
            'name' => 'required',
            'donation' => 'required',
            'amount' => 'required',
            'date' => 'required',
        ]);
        
        $brigada = new Brigada();

        $brigada['name'] = $info['name'];
        $brigada['donation'] = $info['donation'];
        $brigada['amount'] = $info['amount'];
        $brigada['date'] = $info['date'];
        $brigada->save();

        return back();
}
    public function update (){
        $request = Request()->all();
        $inputs = Request()->validate([
            'name' => 'required',
            'donation' => 'required',
            'amount' => 'required',
            'date' => 'required',
        ]);
        $id = $request['num'];
        $record = Brigada::find($id);
        $record['name'] = $inputs['name'];
        $record['donation'] = $inputs['donation'];
        $record['amount'] = $inputs['amount'];
        $record['date'] = $inputs['date'];
        $record->save();
        
        return back();
    }

    public function delete (){
        $request = Request()->all();
        $id = $request['num'];
        Brigada::destroy($id);
        return redirect('/brigada');
        
        return back();
    }
}
