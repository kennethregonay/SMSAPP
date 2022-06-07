@extends('layouts.app')

@section('content')
    <div class="container-fluid text-center" style="margin-top: 10%">
        <h1 style="font-weight: bold">Back to School!</h1>
        <h4>IT'S NICE TO MEET YOU</h4>
        <a class="btn btn-primary mx-2 rounded-pill" href="{{ url('registration') }}"
            style="width: 300px;height: 50px;text-align: center;font-size: 25px"> REGISTER NOW!</a>
        <div class="container" style="margin-top: 10px; ">
            <span class="round-pill" style="border-radius: 20px;">REGISTRATION STARTS: MARCH 25 TO APRIL 30</span>
        </div>
    </div>
@endsection
