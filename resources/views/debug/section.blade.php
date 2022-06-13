@extends('layouts.app')
@section('content')
    <div class="container">
        {{-- Title Page of the Functionalities --}}  
        <h3 class="mt-3"> List of Sections </h3>
        <hr style="height: 4px;color: rgb(0,0,0);">
        <div class="card">
            <div class="card-header d-flex">
        {{--Create Section Buttons  --}}
                <a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add" id="addSection"
                    class="fa fa-plus">
                    <span> Create Section | Class </span>
                </a>
                  {{--Create Section Modal Functionalities  --}}
                @include('sectioning.addSectionBtn')
                  {{--Create Section Buttons  --}}
                <a class="btn btn-warning ms-auto" data-bs-toggle="modal" data-bs-target="#sectionLearners"
                    id="sectionLearnersBtn">
                    
                    Section Learners
                </a>
                 {{--Sectionize Modal Functionalities  --}}
                @include('sectioning.SectionizeBtn')
            </div>

            <div class="card-body">
                <div class="accordion">
                    <br>
                    <div class="card">
                        <div class="card-header p-0">
                            <a class="text-decoration-none text-black w-100 pb-0 text-start" data-bs-toggle="collapse" href="#kinder">
                                {{-- Header of the Accordion --}}
                                <h4 class="p-3 mb-0">Kindergarten</h4>
                            </a>
                        </div>
                        <div id="kinder" class="collapse show" data-bs-parent="#accordion">
                        {{-- Kindergarten Statistics --}}
                            <div class="card-body">
                           <table class="table table-striped">
                            <thead class="bg-gray text-black">
                                {{-- Enrollment Statistics --}}
                              <tr>
                                <th>No. Registered Learners</th>   
                                <th>No. of Qualified Learners [Pilot]</th>   
                                <th>Suggested No. of Pilot Sections </th>   
                                <th>No. of Qualified Registered Learners [Regular]</th> 
                                <th>Suggested No. of Regular Sections </th>   
                             </tr>                      
                            </thead>    
                            <tr>
                                @php
                                $glevel = 'Kindergarten';
                                $suggestedSections = [0,0]; //  First (0) - Pilot    || Second (0) - Regular  
                                $pilot = count($learners->where('glevel', '=', 'Kindergarten'))->where('GWA','>=', '89');  // Number of Learners Qualified for Pilot Sections
                                $regs =  count($learners->where('glevel', '=',  'Kindergarten')->where('GWA','<', '89'));  // Number of Learners Qualified for Regular Sections
                                $suggestedSections[0] =  ceil($pilot/50); // ceil function is used to round up to the nearest integer                  
                                $suggestedSections[1] =  ceil($pilot/50);  
                    
                                @endphp
                                <td>{{ count($learners->where('glevel', '=' ,strval($glevel))) }}</td>
                                <td>{{ $this->pilot }}</td>
                                <td>{{ $SuggestedSections[0] }}</td>
                                <td>{{ $this->regs }}</td>
                                <td>{{ $SuggestedSections[1] }}</td>


                            </tr>
                        </table>         

                         </div>
                        
                        
                        </div>
                </div>

            </div>

        </div>


    </div>
@endsection