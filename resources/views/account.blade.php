@extends('layouts.app')
@section('content')
    {{-- Account Management - Active Accounts --}}
    <div class="container-fluid">
        <br>
        <h3>Account Management</h3>
        <hr style="height: 4px;color: rgb(0,0,0);">
        <div class="card">
            <div class="card-header">
                {{-- Search Functionality --}}
                <form action="{{ route('search')  }}" method="GET">
                    @csrf
                    <input type="text" placeholder="Search.." name="search" class="position-relative "
                        class="position-absolute bottom-50 end-50 d-inline" value="{{ Request('search')   }}"><button class="d-inline" type="submit"><i
                            class="fa fa-search" ></i></button>
                </form>
            </div>
            <div class="card-body">
                <table class="table table-resposive table-bordered">
                    <thead class="table-dark">
                        <tr></tr>
                        <th hidden style="text-align: center;">ID</th>
                        <th style="width: 15%; text-align: center;">TYPE</th>
                        <th style="width: 15%; text-align: center;">EMAIL</th>
                        <th style="width: 15%; text-align: center;">ROLE</th>
                        <th style="width: 15%; text-align: center;">STATUS</th>
                        <th style="width: 20%; text-align: center;">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($accounts as $acc)
                            <tr>
                                <td hidden style="text-align: center;">hidden po</td>
                                <td style="text-align: center;">Teacher</td>
                                <td style="text-align: center;">example@gmail.com</td>
                                <td style="text-align: center;">LIS Coordinator</td>
                                <td style="text-align: center;">Activated</td>
                                <td style="text-align: center;">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#edit_account">Edit</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@include('modals.editAccount')
@endsection
