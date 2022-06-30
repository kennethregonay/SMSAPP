<?php

namespace App\Http\Controllers;

use App\Models\Brigada;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BrigadaController extends Controller
{
    //
    public function index()
    {
        $items = Brigada::all();
        $logs = Log::orderBy('created_at','asc')->get();
        return view('brigada')->with('items', $items)->with('logs' , $logs);
    }
    public function create()
    {
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


        // Log
        $user = Auth()->user()->name;
        $log = new Log();
        
        $log['actor'] = $user;
        $log['date'] = Carbon::today()->format('m-d-Y');;
        $log['time'] = Carbon::now('Hongkong')->format('h:m');
        $log['changes'] = $user . ' Added a donator ' . $brigada['name']. ' who donated '. $brigada['donation'];
        $log->save();
        return back();
    }
    public function update()
    {
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


        $user = Auth()->user()->name;
        $log = new Log();
        
        $log['actor'] = $user;
        $log['date'] = Carbon::today()->format('m-d-Y');;
        $log['time'] = Carbon::now('Hongkong')->format('h:m');
        $log['changes'] = $user . ' Updated a donator ' . $record['name'];
        $log->save();

        return back();
    }

    public function delete()
    {
        $request = Request()->all();
        $id = $request['num'];
        $record = Brigada::find($id);
        
        $user = Auth()->user()->name;
        $log = new Log();
        
        $log['actor'] = $user;
        $log['date'] = Carbon::today()->format('m-d-Y');;
        $log['time'] = Carbon::now('Hongkong')->format('h:m');
        $log['changes'] = $user . ' Removed a donator ' . $record['name'];
        $log->save();
        
        Brigada::destroy($id);

      
        return redirect('/brigada');
    }
}
