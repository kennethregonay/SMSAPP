@extends('layouts.app')
@section('content')
    <div class="bg-light">
        <div class="container border-dark">
            <div style="overflow : auto">
                <h3 class="mt-3">Master List</h3>
                <hr style="height: 4px;color: #000000;">
                <ul class="list-group list-group-horizontal border-0">
                    <li class="list-group-item">
                        <h3>No. of Learners : 30</h3>
                    </li>
                    <li class="list-group-item">
                        <h3>Class Adviser : 1</h3>
                    </li>
                </ul>

                <div class="card">
                    <div class="card-header">
                        <input type="text" placeholder="Search.." name="search" class="position-relative "
                            class="position-absolute bottom-50 end-50 d-inline"><button class="d-inline" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive-sm text-nowrap">
                            <div class="bg-light-grey">
                                <table class="table table-bordered table-primary table-hover table-fixed">
                                    <thead class="table-dark">
                                        <th style="width: 15%; text-align: center;">LRN</th>
                                        <th style="width: 15%; text-align: center;">NAME</th>
                                        <th style="width: 15%; text-align: center;">Gender</th>
                                        <th style="width: 20%; text-align: center;">Class</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>111570120739</td>
                                            <td>PETER R. AYATE</td>
                                            <td style="text-align: center;">M</td>
                                            <td style="text-align: center;">Grade 1 - Leo
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>111570120738</td>
                                            <td>KENNETH E. REGONAY</td>
                                            <td style="text-align: center;">F</td>
                                            <td style="text-align: center;">Grade 1 - Hope
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>111570120738</td>
                                            <td>KENNETH E. REGONAY</td>
                                            <td style="text-align: center;">F</td>
                                            <td style="text-align: center;">Grade 1 - Hope
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>111570120737</td>
                                            <td>JOHN R. NAVERA</td>
                                            <td style="text-align: center;">F</td>
                                            <td style="text-align: center;">Grade 3 - Happy
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>111570120738</td>
                                            <td>JARRIZ R. CASIN</td>
                                            <td style="text-align: center;">F</td>
                                            <td style="text-align: center;">Grade 1 - Love
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>111570120738</td>
                                            <td>JANELLE A. ACHONDO</td>
                                            <td style="text-align: center;">F</td>
                                            <td style="text-align: center;">Grade 1 - Love
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>111570120738</td>
                                            <td>LENELYN R. MARQUEZ</td>
                                            <td style="text-align: center;">F</td>
                                            <td style="text-align: center;">Grade 1 - Love
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>111570120734</td>
                                            <td>ZIA P. ZOLAS</td>
                                            <td style="text-align: center;">F</td>
                                            <td style="text-align: center;">Grade 1 - Love
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>111570120738</td>
                                            <td>MARK ANTHONY P. LOYOLA</td>
                                            <td style="text-align: center;">M</td>
                                            <td style="text-align: center;">Grade 1 - Love
                                            </td>
                                        </tr>
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
