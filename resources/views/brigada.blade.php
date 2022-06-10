@extends('layouts.app')
@section('content')
    <div class="container">
        <br>
        <h3>Brigada Donations</h3>
        <hr style="height: 4px;color: rgb(0,0,0);">
        <div class="card">
            <div class="card-header">
                <div class="d-inline-flex">
                    {{-- Add Donation --}}
                    <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#brigada_add"><span
                        class="fa fa-plus"></span>Add Donation</a>
                    <div>
                        <form action="">
                            <input type="text" placeholder="Search.." name="search">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" data-bs-toggle="dropdown">Sort<span
                                class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item"><a href="" class="text-decoration-none text-black">Name</a></li>
                            <li class="dropdown-item"><a href="" class="text-decoration-none text-black">Date</a></li>
                        </ul>
                    </div>
                </div>
            </div>



            {{-- Table of the Brigada --}}

            <div class="card-body">
                <table class="table table-resposive table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th hidden style="text-align: center;">ID</th>
                            <th style="width: 10%">Name</th>
                            <th style="width: 10%">Type of Donation</th>
                            <th style="width: 10%">Donation</th>
                            <th style="width: 10%">Quantity</th>
                            <th style="width: 10%">Estimated Amount</th>
                            <th style="width: 10%">Date</th>
                            <th style="width: 10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td hidden>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->donateType }}</td>
                                <td>{{ $item->donation }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->amount }}</td>
                                <td>{{ $item->date }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#brigada_edit{{ $item->id }}">Edit</button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#brigada_delete{{ $item->id }}">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

   @include('modals.addDonations')
   @include('modals.deleteDonation')
   @include('modals.editDonation')
@endsection
