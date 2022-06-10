@extends('layouts.app')
@section('content')
    <div class="container">
        <h3 class="mt-3">Notice Board</h3>
        <hr style="height: 4px;color: rgb(0,0,0);">
        <div class="card">
            <div class="card-header">
                <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_announce"><span
                        class="fa fa-plus"></span> Create Announcement</a>
            </div>
            <div class="card-body">
                <table class="table table-resposive table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 20%; text-align: center;">Title</th>
                            <th style="width: 45%; text-align: center;">Description</th>
                            <th style="width: 10%; text-align: center;">Date</th>
                            <th style="width: 20%; text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $announcement as $announce )
                        <tr>
                            <td hidden >{{ $announce->id }}</td>
                            <td>{{ $announce->title }}</td>
                            <td>{{ $announce->desc }}</td>
                            <td style="text-align: center;">{{ $announce->date }}</td>
                            <td style="text-align: center;">
                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#edit_announce{{ $announce->id}}">Edit</button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#delete_announce{{ $announce->id }}">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

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
                            <p>Are you sure you want to continue?</p>
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
    @include('modals.add_annoucement')
    @include('modals.edit_annoucement')
    @include('modals.delete_annoucement')
@endsection