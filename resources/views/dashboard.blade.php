@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <!-- <img src="{{ asset('img/avatars/avatar1.jpeg') }}" alt="" width="200px"> -->
        <h3 class="mt-3">Dashboard</h3>
        <hr style="height: 4px;color: rgb(0,0,0);">
        <div class="row">
            <div class="col-sm-4">
                <div class="container border-dark">
                    <h4 class="text-primary card-title"><strong>REGISTERED STUDENT:</strong><br></h4>
                    <h5 class="card-subtitle mb-2">300</h5>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="container border-dark">
                    <h4 class="text-primary card-title"><strong>PRE-REGISTERED STUDENT:</strong><br></h4>
                    <h5 class="card-subtitle mb-2">300</h5>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="container border-dark">
                    <h4 class="text-primary card-title"><strong>TEACHERS:</strong><br></h4>
                    <h5 class="card-subtitle mb-2">300</h5>
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
                <h1>Hello</h1>
            </div>
        </div>
    </div>
@endsection
