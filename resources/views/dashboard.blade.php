@extends('layouts.app')
@section('content')
    <div class="container">
        <!-- <img src="{{ asset('img/avatars/avatar1.jpeg') }}" alt="" width="200px"> -->
        <h3 class="mt-3">Dashboard</h3>
        <hr style="height: 4px;color: rgb(0,0,0);">
        {{-- Dashboard for Principal --}}
        {{-- @dd(Auth()->user()) --}}
        @if (Auth()->user()->type == 'Principal')
            <div class="row">
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-primary card-title"><strong>PRE-REGISTERED STUDENT:</strong><br></h4>
                        </div>
                        @php
                            $incStudent = $learners->where('EnrollmentStatus', '=', 'Pre-Registered')->count();
                        @endphp
                        <div class="card-body">
                            <h5 class="card-subtitle mb-2">{{ $incStudent }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-primary card-title"><strong>REGISTERED STUDENT:</strong><br></h4>
                        </div>
                        @php
                            $cStudent = $learners->where('EnrollmentStatus', '=', 'Registered')->count();
                        @endphp
                        <div class="card-body">
                            <h5 class="card-subtitle mb-2">{{ $cStudent }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-primary card-title"><strong>TEACHER:</strong><br></h4>
                        </div>
                        @php
                            $usercount = $users->where('type', '!=', 'Principal')->count();
                        @endphp
                        <div class="card-body">
                            <h5 class="card-subtitle mb-2">{{ $usercount }}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <hr style="height: 4px;color: rgb(0,0,0);">
        @endif
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
                        @foreach ($announcements as $announce)
                            <tr>
                                <td>{{ $announce->title }}</td>
                                <td>{{ $announce->desc }}</td>
                                <td style="text-align: center;">{{ $announce->date }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-sm-5">

                @if (Auth()->user()->type == 'Principal')
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th colspan="4" style="text-align: center">Pending Request</th>
                            </tr>
                            <tr style="background: rgb(209, 209, 209)">
                                <th style="text-align: center;">TYPE</th>
                                <th style="text-align: center;">EMAIL</th>
                                <th style="text-align: center;">STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $pendingReq = $users->where('status', '=', 'Pending');
                            @endphp
                            @foreach ($pendingReq as $pending)
                                <tr>
                                    <td style="text-align: center;">{{ $pending->name }}</td>
                                    <td style="text-align: center;">{{ $pending->email }}</td>
                                    <td style="text-align: center;">{{ $pending->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @elseif (Auth()->user()->type != 'Principal')
                    @if (Auth()->user()->role == 'Brigada Coordinator')
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th colspan="4" style="text-align: center">Brigada Donations</th>
                                </tr>
                                <tr style="background: rgb(209, 209, 209)">
                                    <th style="text-align: center;">NAME</th>
                                    <th style="text-align: center;">DONATION</th>
                                    <th style="text-align: center;">DATE</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $items = $brigadas->where('status', '=', 'Pending');
                                @endphp
                                @foreach ($items as $items)
                                    <tr>
                                        <td style="text-align: center;">{{ $item->name }}</td>
                                        <td style="text-align: center;">{{ $item->donation }}</td>
                                        <td style="text-align: center;">{{ $item->date }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @elseif (Auth()->user()->role != 'Brigada Coordinator')
                        @php
                            $prereg = $learners->where('EnrollmentStatus', '=', 'Pre-Registered');
                        @endphp
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th colspan="4" style="text-align: center">Pre-Registered Learners</th>
                                </tr>
                                <tr style="background: rgb(209, 209, 209)">
                                    <th style="text-align: center;">NAME</th>
                                    <th style="text-align: center;">GWA</th>
                                    <th style="text-align: center;">STATUS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $items = $brigadas->where('status', '=', 'Pending');
                                @endphp
                                @foreach ($prereg as $student)
                                    <tr>
                                        <td style="text-align: center;">{{ $student->fname }} {{ $student->mname }} {{ $student->lname }}</td>
                                        <td style="text-align: center;">{{ $student->GWA }}</td>
                                        <td style="text-align: center;">{{ $student->EnrollmentStatus }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                @endif
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
