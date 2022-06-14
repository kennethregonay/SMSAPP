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
                                @if (count(Auth()->user()->section->learners) == null)
                                <h6 class="card-subtitle mt-1mt-1">0</h6>
                                @else
                                    <h6 class="card-subtitle mt-1mt-1"> {{ count(Auth()->user()->section->learners) }}</h6>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="text-primary card-title mt-1mt-1"><strong>Class Adviser:</strong></h6>
                            </div>
                            <div class="card-body p-2">
                                {{-- @dd(Auth()->user()->section->learners) // gabos na learners sa section nya --}}
                                @if (Auth()->user()->gender == 'Male')
                                    <h6 class="card-subtitle mt-1mt-1">Mr. {{ Auth()->user()->name }}</h6>
                                @elseif (Auth()->user()->gender == 'Female')
                                    <h6 class="card-subtitle mt-1mt-1">Ms. {{ Auth()->user()->name }}</h6>
                                @else
                                    <h6 class="card-subtitle mt-1mt-1">{{ Auth()->user()->name }}</h6>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="text-primary card-title mt-1mt-1"><strong>Grade Level | Name | Type:</strong>
                                </h6>
                            </div>
                            <div class="card-body p-2">
                                <h6 class="card-subtitle mt-1mt-1">{{ Auth()->user()->section->glevel }} |
                                    {{ Auth()->user()->section->name }} | {{ Auth()->user()->section->type }} </h6>
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
                                        <th style="text-align: center;">NAME</th>
                                        <th style="text-align: center;">GENDER</th>
                                        <th style="text-align: center;">CLASS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach (Auth()->user()->section->learners as $learner)
                                            <tr>
                                                <td>{{ $i++ }}.) {{ $learner->fname }} {{ $learner->mname }}
                                                    {{ $learner->lname }}</td>
                                                <td style="text-align: center;">{{ $learner->gender }}</td>
                                                <td style="text-align: center;">{{ Auth()->user()->section->glevel }} |
                                                    {{ Auth()->user()->section->name }}</td>
                                            </tr>
                                        @endforeach
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
