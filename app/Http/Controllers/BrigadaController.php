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
            'donateType' => 'required',
            'donation' => 'required',
            'quantity' => 'nullable',
            'amount' => 'nullable',
            'date' => 'required',
        ]);
        
        $brigada = new Brigada();

        $brigada['name'] = $info['name'];
        $brigada['donateType'] = $info['donateType'];
        $brigada['donation'] = $info['donation'];
        $brigada['quantity'] = $info['quantity'];
        $brigada['amount'] = $info['amount'];
        $brigada['date'] = $info['date'];
        $brigada->save();

        return back();
}
    public function update (){
        // dd(Request()->all());
        $request = Request()->all();
        $inputs = Request()->validate([
            'name' => 'required',
            'donateType' => 'required',
            'donation' => 'required',
            'quantity' => 'nullable',
            'amount' => 'nullable',
            'date' => 'required',
            'num' => 'required'
        ]);
        $id = $request['num'];
        $record = Brigada::find($id);
        
        $record['name'] = $inputs['name'];
        $record['donateType'] = $inputs['donateType'];
        $record['donation'] = $inputs['donation'];
        $record['quantity'] = $inputs['quantity'];
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
