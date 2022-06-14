@extends('layouts.app')
@section('content')
    <div class="container">
        {{-- Title Page of the Functionalities --}}
        <h3 class="mt-3"> List of Sections </h3>
        <hr style="height: 4px;color: rgb(0,0,0);">
        <div class="card">
            <div class="card-header d-flex">
                {{-- Create Section Buttons --}}
                <a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add" id="addSection"
                    class="fa fa-plus">
                    <span> Create Section | Class </span>
                </a>
                {{-- Create Section Modal Functionalities --}}
                @include('sectioning.addSectionBtn')
                {{-- Create Section Buttons --}}
                @if (count($sections->where('glevel', '=', 'Grade 6')) >= 1
                && count($sections->where('glevel', '=', 'Grade 5')) >= 1 
                && count($sections->where('glevel', '=', 'Grade 4')) >= 1 
                && count($sections->where('glevel', '=', 'Grade 3')) >= 1 
                && count($sections->where('glevel', '=', 'Grade 2')) >= 1
                && count($sections->where('glevel', '=', 'Grade 1')) >= 1
                && count($sections->where('glevel', '=', 'Kindergarten')) >= 1 )
                    <button class="btn btn-warning ms-auto" data-bs-toggle="modal" data-bs-target="#sectionLearners"
                        id="sectionLearnersBtn">
                        Section Learners
                    </button>
                @else
                    <button class="btn btn-warning ms-auto" data-bs-toggle="modal" data-bs-target="#sectionLearners"
                        id="sectionLearnersBtn" disabled>
                        Section Learners
                    </button>
                @endif

                {{-- Sectionize Modal Functionalities --}}
                @include('sectioning.SectionizeBtn')
            </div>
 {{-- Kinder Accordion --}}
            <div class="card-body">
                <div class="accordion">
                    <br>
                    <div class="card">
                        <div class="card-header p-0">
                            <a class="text-decoration-none text-black w-100 pb-0 text-start" data-bs-toggle="collapse"
                                href="#kinder">
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
                                            $suggestedSections = [0, 0]; //  First (0) - Pilot    || Second (0) - Regular
                                            $pilot = count($learners->where('glevel', '=', strval($glevel))->where('GWA', '>=', '89')); // Number of Learners Qualified for Pilot Sections
                                            $regs = count($learners->where('glevel', '=', strval($glevel))->where('GWA', '<', '89')); // Number of Learners Qualified for Regular Sections
                                            $suggestedSections[0] = ceil($pilot / 50); // ceil function is used to round up to the nearest integer
                                            $suggestedSections[1] = ceil($pilot / 50);
                                            
                                        @endphp
                                        {{-- Display of the Content of the Table Head --}}
                                        <td>{{ count($learners->where('glevel', '=', strval($glevel))) }}</td>
                                        <td>{{ $pilot }}</td>
                                        <td>{{ $suggestedSections[0] }}</td>
                                        <td>{{ $regs }}</td>
                                        <td>{{ $suggestedSections[1] }}</td>
                                    </tr>
                                </table>
                                <!-- list of sections in Kindergarten-->
                                <table class="table table-striped">
                                    <thead class="bg-gray text-black">
                                        <tr>
                                            <th>Section Name </th>
                                            <th> Type </th>
                                            <th>Section Adviser</th>
                                            <th>Number of Learners</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($advisers as $adviser)
                                            @if ($adviser->section->glevel == 'Kindergarten')
                                                <tr>
                                                    <td>{{ $adviser->section->name ? $adviser->section->name : '' }} </td>
                                                    <td>{{ $adviser->section->type ? $adviser->section->type : '' }} </td>
                                                    <td>{{ $adviser->name ? $adviser->name : '' }}</td>
                                                    <td>{{ count($adviser->section->learners) }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#viewSection{{ $adviser->section->id }}">View</button>
                                                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                            data-bs-target="#updateSection{{ $adviser->section->id }}">Edit</button>
                                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#deleteSection{{ $adviser->section->id }}">Delete</button>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
{{-- Grade 1 Accordion--}}
                <div class="accordion">
                    <br>
                    <div class="card">
                        <div class="card-header p-0">
                            <a class="text-decoration-none text-black w-100 pb-0 text-start" data-bs-toggle="collapse"
                                href="#g1">
                                {{-- Header of the Accordion --}}
                                <h4 class="p-3 mb-0">Grade 1 </h4>
                            </a>
                        </div>
                        <div id="g1" class="collapse show" data-bs-parent="#accordion">
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
                                            $glevel = 'Grade 1';
                                            $suggestedSections = [0, 0]; //  First (0) - Pilot    || Second (0) - Regular
                                            $pilot = count($learners->where('glevel', '=', strval($glevel))->where('GWA', '>=', '89')); // Number of Learners Qualified for Pilot Sections
                                            $regs = count($learners->where('glevel', '=', strval($glevel))->where('GWA', '<', '89')); // Number of Learners Qualified for Regular Sections
                                            $suggestedSections[0] = ceil($pilot / 50); // ceil function is used to round up to the nearest integer
                                            $suggestedSections[1] = ceil($pilot / 50);
                                            
                                        @endphp
                                        {{-- Display of the Content of the Table Head --}}
                                        <td>{{ count($learners->where('glevel', '=', strval($glevel))) }}</td>
                                        <td>{{ $pilot }}</td>
                                        <td>{{ $suggestedSections[0] }}</td>
                                        <td>{{ $regs }}</td>
                                        <td>{{ $suggestedSections[1] }}</td>
                                    </tr>
                                </table>
                                <!-- list of sections in Grade 1-->
                                <table class="table table-striped">
                                    <thead class="bg-gray text-black">
                                        <tr>
                                            <th>Section Name </th>
                                            <th> Type </th>
                                            <th>Section Adviser</th>
                                            <th>Number of Learners</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($advisers as $adviser)
                                            @if ($adviser->section->glevel == 'Grade 1')
                                                <tr>
                                                    <td>{{ $adviser->section->name ? $adviser->section->name : '' }} </td>
                                                    <td>{{ $adviser->section->type ? $adviser->section->type : '' }} </td>
                                                    <td>{{ $adviser->name ? $adviser->name : '' }}</td>
                                                    <td>{{ count($adviser->section->learners) }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#viewSection{{ $adviser->section->id }}">View</button>
                                                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                            data-bs-target="#updateSection{{ $adviser->section->id }}">Edit</button>
                                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#deleteSection{{ $adviser->section->id }}">Delete</button>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

 

                    </div>
                </div>
{{-- Grade 2 Accordion--}}
                <div class="accordion">
                    <br>
                    <div class="card">
                        <div class="card-header p-0">
                            <a class="text-decoration-none text-black w-100 pb-0 text-start" data-bs-toggle="collapse"
                                href="#g2">
                                {{-- Header of the Accordion --}}
                                <h4 class="p-3 mb-0">Grade 2</h4>
                            </a>
                        </div>
                        <div id="g2" class="collapse show" data-bs-parent="#accordion">
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
                                            $glevel = 'Grade 2';
                                            $suggestedSections = [0, 0]; //  First (0) - Pilot    || Second (0) - Regular
                                            $pilot = count($learners->where('glevel', '=', strval($glevel))->where('GWA', '>=', '89')); // Number of Learners Qualified for Pilot Sections
                                            $regs = count($learners->where('glevel', '=', strval($glevel))->where('GWA', '<', '89')); // Number of Learners Qualified for Regular Sections
                                            $suggestedSections[0] = ceil($pilot / 50); // ceil function is used to round up to the nearest integer
                                            $suggestedSections[1] = ceil($pilot / 50);
                                            
                                        @endphp
                                        {{-- Display of the Content of the Table Head --}}
                                        <td>{{ count($learners->where('glevel', '=', strval($glevel))) }}</td>
                                        <td>{{ $pilot }}</td>
                                        <td>{{ $suggestedSections[0] }}</td>
                                        <td>{{ $regs }}</td>
                                        <td>{{ $suggestedSections[1] }}</td>
                                    </tr>
                                </table>
                                <!-- list of sections in Kindergarten-->
                                <table class="table table-striped">
                                    <thead class="bg-gray text-black">
                                        <tr>
                                            <th>Section Name </th>
                                            <th> Type </th>
                                            <th>Section Adviser</th>
                                            <th>Number of Learners</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($advisers as $adviser)
                                            @if ($adviser->section->glevel == 'Grade 2')
                                                <tr>
                                                    <td>{{ $adviser->section->name ? $adviser->section->name : '' }} </td>
                                                    <td>{{ $adviser->section->type ? $adviser->section->type : '' }} </td>
                                                    <td>{{ $adviser->name ? $adviser->name : '' }}</td>
                                                    <td>{{ count($adviser->section->learners) }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#viewSection{{ $adviser->section->id }}">View</button>
                                                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                            data-bs-target="#updateSection{{ $adviser->section->id }}">Edit</button>
                                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#deleteSection{{ $adviser->section->id }}">Delete</button>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>



 
                    </div>
                </div>
{{-- Grade 3 Accordion--}}
                <div class="accordion">
                    <br>
                    <div class="card">
                        <div class="card-header p-0">
                            <a class="text-decoration-none text-black w-100 pb-0 text-start" data-bs-toggle="collapse"
                                href="#g3">
                                {{-- Header of the Accordion --}}
                                <h4 class="p-3 mb-0">Grade 3</h4>
                            </a>
                        </div>
                        <div id="g3" class="collapse show" data-bs-parent="#accordion">
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
                                            $glevel = 'Grade 3';
                                            $suggestedSections = [0, 0]; //  First (0) - Pilot    || Second (0) - Regular
                                            $pilot = count($learners->where('glevel', '=', strval($glevel))->where('GWA', '>=', '89')); // Number of Learners Qualified for Pilot Sections
                                            $regs = count($learners->where('glevel', '=', strval($glevel))->where('GWA', '<', '89')); // Number of Learners Qualified for Regular Sections
                                            $suggestedSections[0] = ceil($pilot / 50); // ceil function is used to round up to the nearest integer
                                            $suggestedSections[1] = ceil($pilot / 50);
                                            
                                        @endphp
                                        {{-- Display of the Content of the Table Head --}}
                                        <td>{{ count($learners->where('glevel', '=', strval($glevel))) }}</td>
                                        <td>{{ $pilot }}</td>
                                        <td>{{ $suggestedSections[0] }}</td>
                                        <td>{{ $regs }}</td>
                                        <td>{{ $suggestedSections[1] }}</td>
                                    </tr>
                                </table>
                                <!-- list of sections in Kindergarten-->
                                <table class="table table-striped">
                                    <thead class="bg-gray text-black">
                                        <tr>
                                            <th>Section Name </th>
                                            <th> Type </th>
                                            <th>Section Adviser</th>
                                            <th>Number of Learners</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($advisers as $adviser)
                                            @if ($adviser->section->glevel == 'Grade 3')
                                                <tr>
                                                    <td>{{ $adviser->section->name ? $adviser->section->name : '' }} </td>
                                                    <td>{{ $adviser->section->type ? $adviser->section->type : '' }} </td>
                                                    <td>{{ $adviser->name ? $adviser->name : '' }}</td>
                                                    <td>{{ count($adviser->section->learners) }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#viewSection{{ $adviser->section->id }}">View</button>
                                                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                            data-bs-target="#updateSection{{ $adviser->section->id }}">Edit</button>
                                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#deleteSection{{ $adviser->section->id }}">Delete</button>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>



 
                    </div>
                </div>
{{-- Grade 4 Accordion--}}
                <div class="accordion">
                    <br>
                    <div class="card">
                        <div class="card-header p-0">
                            <a class="text-decoration-none text-black w-100 pb-0 text-start" data-bs-toggle="collapse"
                                href="#g4">
                                {{-- Header of the Accordion --}}
                                <h4 class="p-3 mb-0">Grade 4</h4>
                            </a>
                        </div>
                        <div id="g4" class="collapse show" data-bs-parent="#accordion">
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
                                            $glevel = 'Grade 4';
                                            $suggestedSections = [0, 0]; //  First (0) - Pilot    || Second (0) - Regular
                                            $pilot = count($learners->where('glevel', '=', strval($glevel))->where('GWA', '>=', '89')); // Number of Learners Qualified for Pilot Sections
                                            $regs = count($learners->where('glevel', '=', strval($glevel))->where('GWA', '<', '89')); // Number of Learners Qualified for Regular Sections
                                            $suggestedSections[0] = ceil($pilot / 50); // ceil function is used to round up to the nearest integer
                                            $suggestedSections[1] = ceil($pilot / 50);
                                            
                                        @endphp
                                        {{-- Display of the Content of the Table Head --}}
                                        <td>{{ count($learners->where('glevel', '=', strval($glevel))) }}</td>
                                        <td>{{ $pilot }}</td>
                                        <td>{{ $suggestedSections[0] }}</td>
                                        <td>{{ $regs }}</td>
                                        <td>{{ $suggestedSections[1] }}</td>
                                    </tr>
                                </table>
                                <!-- list of sections in Kindergarten-->
                                <table class="table table-striped">
                                    <thead class="bg-gray text-black">
                                        <tr>
                                            <th>Section Name </th>
                                            <th> Type </th>
                                            <th>Section Adviser</th>
                                            <th>Number of Learners</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($advisers as $adviser)
                                            @if ($adviser->section->glevel == 'Grade 4')
                                                <tr>
                                                    <td>{{ $adviser->section->name ? $adviser->section->name : '' }} </td>
                                                    <td>{{ $adviser->section->type ? $adviser->section->type : '' }} </td>
                                                    <td>{{ $adviser->name ? $adviser->name : '' }}</td>
                                                    <td>{{ count($adviser->section->learners) }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#viewSection{{ $adviser->section->id }}">View</button>
                                                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                            data-bs-target="#updateSection{{ $adviser->section->id }}">Edit</button>
                                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#deleteSection{{ $adviser->section->id }}">Delete</button>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>



 
                    </div>
                </div>
{{-- Grade 5 Accordion--}}
                <div class="accordion">
                    <br>
                    <div class="card">
                        <div class="card-header p-0">
                            <a class="text-decoration-none text-black w-100 pb-0 text-start" data-bs-toggle="collapse"
                                href="#g5">
                                {{-- Header of the Accordion --}}
                                <h4 class="p-3 mb-0">Grade 5</h4>
                            </a>
                        </div>
                        <div id="g5" class="collapse show" data-bs-parent="#accordion">
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
                                            $glevel = 'Grade 5';
                                            $suggestedSections = [0, 0]; //  First (0) - Pilot    || Second (0) - Regular
                                            $pilot = count($learners->where('glevel', '=', strval($glevel))->where('GWA', '>=', '89')); // Number of Learners Qualified for Pilot Sections
                                            $regs = count($learners->where('glevel', '=', strval($glevel))->where('GWA', '<', '89')); // Number of Learners Qualified for Regular Sections
                                            $suggestedSections[0] = ceil($pilot / 50); // ceil function is used to round up to the nearest integer
                                            $suggestedSections[1] = ceil($pilot / 50);
                                            
                                        @endphp
                                        {{-- Display of the Content of the Table Head --}}
                                        <td>{{ count($learners->where('glevel', '=', strval($glevel))) }}</td>
                                        <td>{{ $pilot }}</td>
                                        <td>{{ $suggestedSections[0] }}</td>
                                        <td>{{ $regs }}</td>
                                        <td>{{ $suggestedSections[1] }}</td>
                                    </tr>
                                </table>
                                <!-- list of sections in Kindergarten-->
                                <table class="table table-striped">
                                    <thead class="bg-gray text-black">
                                        <tr>
                                            <th>Section Name </th>
                                            <th> Type </th>
                                            <th>Section Adviser</th>
                                            <th>Number of Learners</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($advisers as $adviser)
                                            @if ($adviser->section->glevel == 'Grade 5')
                                                <tr>
                                                    <td>{{ $adviser->section->name ? $adviser->section->name : '' }} </td>
                                                    <td>{{ $adviser->section->type ? $adviser->section->type : '' }} </td>
                                                    <td>{{ $adviser->name ? $adviser->name : '' }}</td>
                                                    <td>{{ count($adviser->section->learners) }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#viewSection{{ $adviser->section->id }}">View</button>
                                                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                            data-bs-target="#updateSection{{ $adviser->section->id }}">Edit</button>
                                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#deleteSection{{ $adviser->section->id }}">Delete</button>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>



 
                    </div>
                </div>
{{-- Grade 6 Accordion--}} 
                <div class="accordion">
                    <br>
                    <div class="card">
                        <div class="card-header p-0">
                            <a class="text-decoration-none text-black w-100 pb-0 text-start" data-bs-toggle="collapse"
                                href="#g6">
                                {{-- Header of the Accordion --}}
                                <h4 class="p-3 mb-0">Grade 6</h4>
                            </a>
                        </div>
                        <div id="g6" class="collapse show" data-bs-parent="#accordion">
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
                                            $glevel = 'Grade 6';
                                            $suggestedSections = [0, 0]; //  First (0) - Pilot    || Second (0) - Regular
                                            $pilot = count($learners->where('glevel', '=', strval($glevel))->where('GWA', '>=', '89')); // Number of Learners Qualified for Pilot Sections
                                            $regs = count($learners->where('glevel', '=', strval($glevel))->where('GWA', '<', '89')); // Number of Learners Qualified for Regular Sections
                                            $suggestedSections[0] = ceil($pilot / 50); // ceil function is used to round up to the nearest integer
                                            $suggestedSections[1] = ceil($pilot / 50);
                                            
                                        @endphp
                                        {{-- Display of the Content of the Table Head --}}
                                        <td>{{ count($learners->where('glevel', '=', strval($glevel))) }}</td>
                                        <td>{{ $pilot }}</td>
                                        <td>{{ $suggestedSections[0] }}</td>
                                        <td>{{ $regs }}</td>
                                        <td>{{ $suggestedSections[1] }}</td>
                                    </tr>
                                </table>
                                <!-- list of sections in Kindergarten-->
                                <table class="table table-striped">
                                    <thead class="bg-gray text-black">
                                        <tr>
                                            <th>Section Name </th>
                                            <th> Type </th>
                                            <th>Section Adviser</th>
                                            <th>Number of Learners</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($advisers as $adviser)
                                            @if ($adviser->section->glevel == 'Grade 6')
                                                <tr>
                                                    <td>{{ $adviser->section->name ? $adviser->section->name : '' }} </td>
                                                    <td>{{ $adviser->section->type ? $adviser->section->type : '' }} </td>
                                                    <td>{{ $adviser->name ? $adviser->name : '' }}</td>
                                                    <td>{{ count($adviser->section->learners) }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#viewSection{{ $adviser->section->id }}">View</button>
                                                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                            data-bs-target="#updateSection{{ $adviser->section->id }}">Edit</button>
                                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#deleteSection{{ $adviser->section->id }}">Delete</button>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>



 
                    </div>
                </div>
                
            </div>




























@include('sectioning.viewSectionBtn')
@include('sectioning.editSectionBtn')
@include('sectioning.deleteSectionBtn') 




        </div>
    </div>
    </div>
@endsection
