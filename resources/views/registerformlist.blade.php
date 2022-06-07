@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <h3 class="mt-3">Registered Form List</h3>
        <hr style="height: 4px;color: rgb(0,0,0);">
        <div class="card">
            <div class="card-body">
                <table class="table table-resposive table-bordered">
                    <thead>
                        <tr>
                            <th hidden style="text-align: center;">ID</th>
                            <th style="width: 15%; text-align: center;">NAME</th>
                            <th style="width: 15%; text-align: center;">ENROLLING GRADE LEVEL</th>
                            <th style="width: 15%; text-align: center;">STATUS</th>
                            <th style="width: 15%; text-align: center;">DATE</th>
                            <th style="width: 15%; text-align: center;">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td hidden style="text-align: center;">ID</td>
                            <td style="text-align: center;">Joshua P. Padua</td>
                            <td style="text-align: center;">Grade 6</td>
                            <td style="text-align: center;">Pending</td>
                            <td style="text-align: center;">20/10/022</td>
                            <td style="text-align: center;">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#view">View</button>
                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#confirm">Accept</button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#confirm">Decline</button>
                            </td>
                        </tr>
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

    <div class="modal" id="view">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Register Form View</h2>
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
