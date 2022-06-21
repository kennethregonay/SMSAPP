@extends('layouts.app')
@section('content')
    {{-- Account Management - Active Accounts --}}
    <div class="container">
        <br>
        <h3>Account Management</h3>
        <hr style="height: 4px;color: rgb(0,0,0);">
        <div class="card">
            <div class="card-header">
                {{-- Search Functionality --}}
                <form action="{{ url('search/account') }}" method="GET">
                    @csrf
                    <div>
                        <input type="text" placeholder="Search.." name="search" class="position-relative "
                            value="{{ Request('search') }}" autocomplete="off"
                            class="position-absolute bottom-50 end-50 d-inline"><button class="d-inline" type="submit"><i
                                class="fa fa-search"></i></button>
                        <a href="{{ url('account') }}" class="btn btn-primary d-inline"><i class="fa fa-refresh"></i> Refresh</a>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <table class="table table-resposive table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th hidden style="text-align: center;">ID</th>
                            <th style="width: 15%; text-align: center;">TYPE</th>
                            <th style="width: 25%; text-align: center;">EMAIL</th>
                            <th style="width: 15%; text-align: center;">ROLE</th>
                            <th style="width: 15%; text-align: center;">STATUS</th>
                            <th style="width: 15%; text-align: center;">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($accounts as $acc)
                            <tr>
                                <td hidden style="text-align: center;">{{ $acc->id }}</td>
                                <td style="text-align: center;">{{ $acc->type }}</td>
                                <td style="text-align: center;">{{ $acc->email }}</td>
                                <td style="text-align: center;">{{ $acc->role }}</td>
                                <td style="text-align: center;">{{ $acc->status }}</td>
                                <td style="text-align: center;">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#viewAccount{{ $acc->id }}"><span class="fa fa-eye"></span>
                                        View</button>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#edit_account{{ $acc->id }}"><span class="fa fa-pencil"></span>
                                        Edit</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if (count($accounts) >= 15)
                    {{ $accounts->links() }}
                @endif
            </div>
        </div>
    </div>
    @include('modals.editAccount')
    @include('modals.viewAccounts')
@endsection
