@extends('layouts.app')
@section('content')
    <div class="row justify-content-center" style="margin-top: 10%">
        <div class="col-4">
            <div class="card text-center border border-primary border-5 rounded-5">
                <div class="card-body rounded-5" style="width; 50%;">
                    <h1 style="font-weight: bold">Back to School!</h1>
                    <h4>IT'S NICE TO MEET YOU</h4>
                    <a class="btn btn-primary mx-2 rounded-pill" href="{{ url('registration') }}"
                        style="width: 300px;height: 50px;text-align: center;font-size: 25px"> REGISTER NOW!</a>
                    <div class="container" style="margin-top: 10px; ">
                        <span class="round-pill" style="border-radius: 20px;">REGISTRATION STARTS: MARCH 25 TO APRIL
                            30</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- -------------------------------------------------------------------------------------------------- -->

    <div class="modal" id="adminSignup">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Admin Signup</h2>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ url('principal/create') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        @csrf
                        <div class="mb-2">
                            <label for="adminFullName">* Full Name</label>
                            <input type="text" class="form-control" id="adminFullName" name="adminFullname"
                                placeholder="Enter your Full Name">
                        </div>
                        <div class="mb-2">
                            <label for="adminEmail">*Email</label>
                            <input type="email" class="form-control" id="adminEmail" name="adminEmail"
                                placeholder="Enter Email Address">
                        </div>
                        <div class="mb-2">
                            <label for="adminPassword">Password</label>
                            <input type="password" class="form-control" id="adminPassword" name="adminPassword"
                                placeholder="Enter Password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success" type="submit" data-bs-dismiss="modal">Signup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <a href="#adminSignup" id="adminSignupBtn" data-bs-toggle="modal"></a>
    @if (count($user) == 0)
        <script>
            document.getElementById('adminSignupBtn').click();
        </script>
    @endif

    @if (session()->has('registerSuccess'))
        <div class="modal" id="regsuccess">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body d-flex flex-column">
                        <p class="mx-auto">{{ session()->get('registerSuccess') }}</p>
                        <button data-bs-dismiss="modal" class="btn btn-primary">OK</button>
                    </div>
                </div>
            </div>
        </div>
        <button id="regsuccessBtn" data-bs-toggle="modal" data-bs-target="#regsuccess" hidden></button>

        <script>
            document.querySelector('#regsuccessBtn').click();
        </script>
    @endif
@endsection
