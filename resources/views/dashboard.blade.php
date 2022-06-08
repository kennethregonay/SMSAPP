@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <!-- <img src="{{ asset('img/avatars/avatar1.jpeg') }}" alt="" width="200px"> -->
        <h3 class="mt-3">Dashboard</h3>
        <hr style="height: 4px;color: rgb(0,0,0);">
        {{-- Dashboard for Principal --}}
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header"><h4 class="text-primary card-title"><strong>REGISTERED STUDENT:</strong><br></h4></div>
                    <div class="card-body"><h5 class="card-subtitle mb-2">300</h5></div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header"><h4 class="text-primary card-title"><strong>RE-REGISTERED STUDENT:</strong><br></h4></div>
                    <div class="card-body"><h5 class="card-subtitle mb-2">300</h5></div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header"><h4 class="text-primary card-title"><strong>TEACHER:</strong><br></h4></div>
                    <div class="card-body"><h5 class="card-subtitle mb-2">300</h5></div>
                </div>
            </div>
        </div>
        <hr style="height: 4px;color: rgb(0,0,0);">
        <div class="row">
            <div class="col-sm-7">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th colspan="3" style="text-align: center;">Announcements</th>
                        </tr>
                        <tr style="background: rgb(209, 209, 209)">
                            <th style="width: 30%; text-align: center;">Title</th>
                            <th style="width: 50%; text-align: center;">Description</th>
                            <th style="width: 20%; text-align: center;">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Announcement Of Brigada</td>
                            <td>Start of Brigada is .......</td>
                            <td style="text-align: center;">20/10/2022</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-5">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th colspan="4" style="text-align: center">Pending Request</th>
                        </tr>
                        <tr style="background: rgb(209, 209, 209)">
                            <th style="width: 15%; text-align: center;">TYPE</th>
                            <th style="width: 15%; text-align: center;">EMAIL</th>
                            <th style="width: 15%; text-align: center;">ROLE</th>
                            <th style="width: 15%; text-align: center;">STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="text-align: center;">Teacher</td>
                            <td style="text-align: center;">example@gmail.com</td>
                            <td style="text-align: center;"></td>
                            <td style="text-align: center;">Pending</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @if (session()->has('success'))
        <div class="modal" id="success">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body d-flex flex-column">
                        <p class="mx-auto">{{ session()->get('success') }}</p>
                        <button data-bs-dismiss="modal" class="btn btn-primary">OK</button>
                    </div>
                </div>
            </div>
        </div>
        <button id="successBtn" data-bs-toggle="modal" data-bs-target="#success" hidden></button>

        <script>
            document.querySelector('#successBtn').click();
        </script>
    @endif





@endsection
