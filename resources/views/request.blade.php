@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <h3 class="mt-3">Request</h3>
        <hr style="height: 4px;color: rgb(0,0,0);">
        <div class="card">
            <div class="card-header">
                <input type="text" placeholder="Search.." name="search" class="position-relative "
                    class="position-absolute bottom-50 end-50 d-inline"><button class="d-inline" type="submit"><i class="fa fa-search"></i></button>
            </div>
            <div class="card-body">
                <table class="table table-resposive table-bordered">
                    <thead>
                        <tr>
                            <th hidden style="text-align: center;">ID</th>
                            <th style="width: 15%; text-align: center;">TYPE</th>
                            <th style="width: 15%; text-align: center;">EMAIL</th>
                            <th style="width: 15%; text-align: center;">ROLE</th>
                            <th style="width: 15%; text-align: center;">STATUS</th>
                            <th style="width: 15%; text-align: center;">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach( $accounts as $acc)
                                <td hidden style="text-align: center;">{{ $acc->id}}</td>
                                <td style="text-align: center;">{{ $acc->type }}</td>
                                <td style="text-align: center;">{{ $acc->email }}</td>
                                <td style="text-align: center;">{{ $acc->role }}</td>
                                <td style="text-align: center;">{{ $acc->status }}</td>
                                <td style="text-align: center;">
                                    <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#edit" >Edit</button>
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#confirm">Active</button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#confirm">Deactivate</button>
                                </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Confirm Request --}}
    <div class="modal" id="confirm">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Confirmation</h2>
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>         
                </div>
                <div class="modal-body">
                    <form action="" method="">
                        <div class="mb-2">
                            <p>Are you Sure you want to continue?</p>
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-success" type="submit" data-bs-dismiss="modal">Confirm</button>
                            <button class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Profile</h2>
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="" method="">
                        <div class="mb-2">
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success" type="submit" data-bs-dismiss="modal">Confirm</button>
                            <button class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
