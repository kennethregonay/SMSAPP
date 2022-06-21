@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <h3 class="mt-3">Pre-Registered Form List</h3>
        <hr style="height: 4px;color: rgb(0,0,0);">
        <div class="card">
            <div class="card-header">
                <form action="{{ url('search/registrationlist') }}" method="GET">
                    @csrf
                    <input type="text" placeholder="Search.." name="search" class="position-relative "  value="{{ Request('search') }}" autocomplete="off"
                        class="position-absolute bottom-50 end-50 d-inline"><button class="d-inline" type="submit"><i
                            class="fa fa-search" ></i></button>
                            <a href="{{ url('registrationManage') }}" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> Refresh</a>    
                </form>
            </div>
            <div class="card-body">
                <table class="table table-resposive table-bordered">
                    <thead>
                        <tr style="text-align: center;">
                            <th hidden>ID</th>
                            <th>REFERENCE NO.</th>
                            <th>NAME</th>
                            <th>ENROLLING GRADE LEVEL</th>
                            <th>GWA</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($learners as $student)
                            <tr style="text-align: center;">
                                <td hidden>{{ $student->id }}</td>
                                <td>{{ $student->RefNo }}</td>
                                <td>{{ $student->fname }} {{ $student->mname }} {{ $student->lname }}</td>
                                <td style="text-align: center;">{{ $student->glevel }}</td>
                                <td>{{ $student->GWA }}</td>
                                <td>{{ $student->EnrollmentStatus }}</td>
                                <td><button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#viewLeaners{{ $student->id }}">View</button>
                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#approveRegistration{{ $student->id }}">Accept</button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#declineRegistration{{ $student->id }}">Decline</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $learners->links() }}
            </div>
        </div>
    </div>
    @include('modals.approveRegistration')
    @include('modals.declineRegistration')
    @include('modals.viewRegistration')
@endsection
