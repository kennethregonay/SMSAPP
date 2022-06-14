@extends('layouts.app')
@section('content')
    <div class="bg-light">
        <div class="container border-dark">
            <div style="overflow : auto">
                <h3 class="mt-3">Master List</h3>
                <hr style="height: 4px;color: #000000;">
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-header p-2">
                                <h6 class="text-primary card-title mt-1mt-1"><strong>Number of Learners: </strong> </h6>
                            </div>
                            <div class="card-body p-2">
                                <h6 class="card-subtitle mt-1mt-1">30</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="text-primary card-title mt-1mt-1"><strong>Class Adviser:</strong></h6>
                            </div>
                            <div class="card-body p-2">
                                <h6 class="card-subtitle mt-1mt-1">{{ Auth()->user()->name }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <input type="text" placeholder="Search.." name="search" class="position-relative "
                            class="position-absolute bottom-50 end-50 d-inline"><button class="d-inline"
                            type="submit"><i class="fa fa-search"></i></button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive-sm text-nowrap">
                            <div class="bg-light-grey">
                                <table class="table table-bordered table-primary table-fixed">
                                    <thead class="table-dark">
                                        <th style="width: 15%; text-align: center;">LRN</th>
                                        <th style="width: 15%; text-align: center;">NAME</th>
                                        <th style="width: 15%; text-align: center;">Gender</th>
                                        <th style="width: 20%; text-align: center;">Class</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>111570120739</td>
                                            <td>PETER R. AYATE</td>
                                            <td style="text-align: center;">M</td>
                                            <td style="text-align: center;">Grade 1
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
