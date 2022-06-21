@extends('layouts.app')
@section('content')
    <div class="container">
        <h3 class="mt-3">Request</h3>
        <hr style="height: 4px;color: rgb(0,0,0);">
        <div class="card">
            <div class="card-header">
                <form action="{{ url('search/request') }}" method="GET">
                    @csrf
                    <input type="text" placeholder="Search.." name="search" class="position-relative "  value="{{ Request('search') }}" autocomplete="off"
                        class="position-absolute bottom-50 end-50 d-inline"><button class="d-inline" type="submit"><i
                            class="fa fa-search" ></i></button>
                            <a href="{{ url('request') }}" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> Refresh</a>    
                </form>
            </div>
            <div class="card-body">
                <table class="table table-resposive table-bordered">
                    <thead>
                        <tr>
                            <th hidden style="text-align: center;">ID</th>
                            <th style="width: 10%; text-align: center;">TYPE</th>
                            <th style="width: 15%; text-align: center;">EMAIL</th>
                            <th style="width: 15%; text-align: center;">ROLE</th>
                            <th style="width: 15%; text-align: center;">STATUS</th>
                            <th style="width: 25%; text-align: center;">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($accounts as $acc)
                            <tr>
                                <td hidden style="text-align: center;">{{ $acc->id }}</td>
                                <td style="text-align: center;">{{ $acc->type }}</td>
                                <td style="text-align: center;">{{ $acc->email }}</td>
                                <td style="text-align: center;">{{ $acc->role }}</td>
                                <td style="text-align: center;"> {{ $acc->status }}</td>
                                <td style="text-align: center;">
                                    <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#viewAccount{{ $acc->id }}"><span
                                            class="fa fa-eye"></span> View</button>
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#ApproveRequest{{ $acc->id }}"><span
                                            class="fa fa-check-circle"></span> Accept</button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#DeleteRequest{{ $acc->id }}"><span
                                            class="fa fa-times-circle"></span> Decline</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- For Pagination --}}
                {{  $accounts->links() }}
            </div>
        </div>
    </div>
    @include('modals.viewAccounts')
    @include('modals.ApproveRequest')
    @include('modals.DeleteRequest')
@endsection
