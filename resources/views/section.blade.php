@extends('layouts.app')
@section('content')
    <div class="container">
        <h3 class="mt-3">List of Section</h3>
        <hr style="height: 4px;color: rgb(0,0,0);">
        <div class="card">
            <div class="card-header d-flex">
                <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add" id="addBtn"><span
                        class="fa fa-plus"></span>Add Section
                </a>
                <a class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#sectionLearners"
                    id="sectionLearnersBtn">
                    Section Learners
                </a>
            </div>
            <div class="card-body">
                <div id="accordion">
                    <div class="card">
                        <div class="card-header p-0">
                            <a class="text-decoration-none text-black w-100 pb-0 text-start" data-bs-toggle="collapse"
                                href="#kinder">
                                <h3 class="p-3 mb-0">Kindergarten</h3>
                            </a>
                        </div>
                        <div id="kinder" class="collapse hidden" data-bs-parent="#accordion">
                            <div class="card-body">
                                <!-- student statistics -->
                                <table class="table table-striped">
                                    <thead class="bg-dark text-white">
                                        <tr>
                                            <th>No. of Students</th>
                                            <th>Pilot Students</th>
                                            <th>Regular Students</th>
                                            <th>Suggested No of Pilot Sections</th>
                                            <th>Suggested No of Regular Sections</th>
                                        </tr>
                                    </thead>
                                    <tr>
                                        @php
                                            $SuggestedSections = [0, 0];
                                            $pilots = count($learners->where('glevel', '=', 'Kindergarten')->where('GWA', '>=', '89'));
                                            $regs = count($learners->where('glevel', '=', 'Kindergarten')->where('GWA', '<', '89'));
                                            $SuggestedSections[0] = ceil($pilots / 50);
                                            $SuggestedSections[1] = ceil($regs / 50);
                                            
                                        @endphp
                                        <td>{{ count($learners->where('glevel', '=', 'Kindergarten')) }}</td>
                                        <td>{{ $pilots }}</td>
                                        <td>{{ $regs }}</td>
                                        <td>{{ $SuggestedSections[0] }}</td>
                                        <td>{{ $SuggestedSections[1] }}</td>
                                    </tr>

                                </table>
                                <!-- list of sections -->
                                <table class="table table-resposive table-bordered">
                                    <thead class="table-dark">
                                        <tr>
                                            <th style="width: 30%;">Section Name and Type</th>
                                            <th style="width: 30%;">Section Adviser</th>
                                            <th style="width: 20%;">Number of Student</th>
                                            <th style="width: 20%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    @foreach ($sections as $section)
                                        @if ($section->glevel == 'Kindergarten')
                                            <tr>
                                                <td>{{ $section->name ? $section->name : '' }} |
                                                    {{ $section->type ? $section->type : '' }}</td>
                                                <td>{{ $section->users_id ? $section->adviser->name : '' }}</td>
                                                <td>{{ count($section->learners) }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#viewSection{{ $section->id }}">view</button>
                                                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                        data-bs-target="#updateSection{{ $section->id }}">Edit</button>
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                        data-bs-target="#deleteSection{{ $section->id }}">Delete</button>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header p-0">
                            <a class="text-decoration-none text-black w-100 pb-0 text-start" data-bs-toggle="collapse"
                                href="#grade1">
                                <h3 class="p-3 mb-0">Grade 1</h3>
                            </a>
                        </div>
                        <div id="grade1" class="collapse hidden" data-bs-parent="#accordion">
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead class="bg-dark text-white">
                                        <tr>
                                            <th>No. of Students</th>
                                            <th>Pilot Students</th>
                                            <th>Regular Students</th>
                                            <th>Suggested No of Pilot Sections</th>
                                            <th>Suggested No of Regular Sections</th>
                                        </tr>
                                    </thead>

                                    <tr>
                                        @php
                                            $SuggestedSections = [0, 0];
                                            $pilots = count($learners->where('glevel', '=', 'Grade 1')->where('GWA', '>=', '89'));
                                            $regs = count($learners->where('glevel', '=', 'Grade 1')->where('GWA', '<', '89'));
                                            $SuggestedSections[0] = ceil($pilots / 50);
                                            $SuggestedSections[1] = ceil($regs / 50);
                                            
                                        @endphp
                                        <td>{{ count($learners->where('glevel', '=', 'Grade 1')) }}</td>
                                        <td>{{ $pilots }}</td>
                                        <td>{{ $regs }}</td>
                                        <td>{{ $SuggestedSections[0] }}</td>
                                        <td>{{ $SuggestedSections[1] }}</td>
                                    </tr>

                                </table>
                                <table class="table table-resposive table-bordered">
                                    <thead class="table-dark">
                                        <tr>
                                            <th style="width: 30%;">Section Name and Type</th>
                                            <th style="width: 30%;">Section Adviser</th>
                                            <th style="width: 20%;">Number of Student</th>
                                            <th style="width: 20%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sections as $section)
                                            @if ($section->glevel == 'Grade 1')
                                                <tr>
                                                    <td>{{ $section->name ? $section->name : '' }} |
                                                        {{ $section->type ? $section->type : '' }}</td>
                                                    <td>{{ $section->users_id ? $section->adviser->name : '' }}</td>
                                                    <td>30</td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#viewSection{{ $section->id }}">View</button>
                                                        <button type="button" class="btn btn-success"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#updateSection{{ $section->id }}">Edit</button>
                                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#deleteSection{{ $section->id }}">Delete</button>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header p-0">
                            <a class="text-decoration-none text-black w-100 pb-0 text-start" data-bs-toggle="collapse"
                                href="#grade2">
                                <h3 class="p-3 mb-0">Grade 2</h3>
                            </a>
                        </div>
                        <div id="grade2" class="collapse" data-bs-parent="#accordion">
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead class="bg-dark text-white">
                                        <tr>
                                            <th>No. of Students</th>
                                            <th>Pilot Students</th>
                                            <th>Regular Students</th>
                                            <th>Suggested No of Pilot Sections</th>
                                            <th>Suggested No of Regular Sections</th>
                                        </tr>
                                    </thead>

                                    <tr>
                                        @php
                                            $SuggestedSections = [0, 0];
                                            $pilots = count($learners->where('glevel', '=', 'Grade 2')->where('GWA', '>=', '89'));
                                            $regs = count($learners->where('glevel', '=', 'Grade 2')->where('GWA', '<', '89'));
                                            $SuggestedSections[0] = ceil($pilots / 50);
                                            $SuggestedSections[1] = ceil($regs / 50);
                                            
                                        @endphp
                                        <td>{{ count($learners->where('glevel', '=', 'Grade 2')) }}</td>
                                        <td>{{ $pilots }}</td>
                                        <td>{{ $regs }}</td>
                                        <td>{{ $SuggestedSections[0] }}</td>
                                        <td>{{ $SuggestedSections[1] }}</td>
                                    </tr>

                                </table>
                                <table class="table table-resposive table-bordered">
                                    <thead class="table-dark">
                                        <tr>
                                            <th style="width: 30%;">Section Name and Type</th>
                                            <th style="width: 30%;">Section Adviser</th>
                                            <th style="width: 20%;">Number of Student</th>
                                            <th style="width: 20%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sections as $section)
                                            @if ($section->glevel == 'Grade 2')
                                                <tr>
                                                    <td>{{ $section->name ? $section->name : '' }} |
                                                        {{ $section->type ? $section->type : '' }}</td>
                                                    <td>{{ $section->users_id ? $section->adviser->name : '' }}</td>
                                                    <td>30</td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#viewSection{{ $section->id }}">view</button>
                                                        <button type="button" class="btn btn-success"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#updateSection{{ $section->id }}">Edit</button>
                                                        <button type="button" class="btn btn-danger"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#deleteSection{{ $section->id }}">Delete</button>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header p-0">
                            <a class="text-decoration-none text-black w-100 pb-0 text-start" data-bs-toggle="collapse"
                                href="#grade3">
                                <h3 class="p-3 mb-0">Grade 3</h3>
                            </a>
                        </div>
                        <div id="grade3" class="collapse" data-bs-parent="#accordion">
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead class="bg-dark text-white">
                                        <tr>
                                            <th>No. of Students</th>
                                            <th>Pilot Students</th>
                                            <th>Regular Students</th>
                                            <th>Suggested No of Pilot Sections</th>
                                            <th>Suggested No of Regular Sections</th>
                                        </tr>
                                    </thead>

                                    <tr>
                                        @php
                                            $SuggestedSections = [0, 0];
                                            $pilots = count($learners->where('glevel', '=', 'Grade 3')->where('GWA', '>=', '89'));
                                            $regs = count($learners->where('glevel', '=', 'Grade 3')->where('GWA', '<', '89'));
                                            $SuggestedSections[0] = ceil($pilots / 50);
                                            $SuggestedSections[1] = ceil($regs / 50);
                                            
                                        @endphp
                                        <td>{{ count($learners->where('glevel', '=', 'Grade 3')) }}</td>
                                        <td>{{ $pilots }}</td>
                                        <td>{{ $regs }}</td>
                                        <td>{{ $SuggestedSections[0] }}</td>
                                        <td>{{ $SuggestedSections[1] }}</td>
                                    </tr>

                                </table>
                                <table class="table table-resposive table-bordered">
                                    <thead class="table-dark">
                                        <tr>
                                            <th style="width: 30%;">Section Name and Type</th>
                                            <th style="width: 30%;">Section Adviser</th>
                                            <th style="width: 20%;">Number of Student</th>
                                            <th style="width: 20%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sections as $section)
                                            @if ($section->glevel == 'Grade 3')
                                                <tr>
                                                    <td>{{ $section->name ? $section->name : '' }} |
                                                        {{ $section->type ? $section->type : '' }}</td>
                                                    <td>{{ $section->users_id ? $section->adviser->name : '' }}</td>
                                                    <td>30</td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#viewSection{{ $section->id }}">view</button>
                                                        <button type="button" class="btn btn-success"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#updateSection{{ $section->id }}">Edit</button>
                                                        <button type="button" class="btn btn-danger"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#deleteSection{{ $section->id }}">Delete</button>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card">

                        <div class="card-header p-0">
                            <a class="text-decoration-none text-black w-100 pb-0 text-start" data-bs-toggle="collapse"
                                href="#grade4">
                                <h3 class="p-3 mb-0">Grade 4</h3>
                            </a>
                        </div>
                        <div id="grade4" class="collapse" data-bs-parent="#accordion">
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead class="bg-dark text-white">
                                        <tr>
                                            <th>No. of Students</th>
                                            <th>Pilot Students</th>
                                            <th>Regular Students</th>
                                            <th>Suggested No of Pilot Sections</th>
                                            <th>Suggested No of Regular Sections</th>
                                        </tr>
                                    </thead>

                                    <tr>
                                        @php
                                            $SuggestedSections = [0, 0];
                                            $pilots = count($learners->where('glevel', '=', 'Grade 4')->where('GWA', '>=', '89'));
                                            $regs = count($learners->where('glevel', '=', 'Grade 4')->where('GWA', '<', '89'));
                                            $SuggestedSections[0] = ceil($pilots / 50);
                                            $SuggestedSections[1] = ceil($regs / 50);
                                            
                                        @endphp
                                        <td>{{ count($learners->where('glevel', '=', 'Grade 4')) }}</td>
                                        <td>{{ $pilots }}</td>
                                        <td>{{ $regs }}</td>
                                        <td>{{ $SuggestedSections[0] }}</td>
                                        <td>{{ $SuggestedSections[1] }}</td>
                                    </tr>

                                </table>
                                <table class="table table-resposive table-bordered">
                                    <thead class="table-dark">
                                        <tr>
                                            <th style="width: 30%;">Section Name and Type</th>
                                            <th style="width: 30%;">Section Adviser</th>
                                            <th style="width: 20%;">Number of Student</th>
                                            <th style="width: 20%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sections as $section)
                                            @if ($section->glevel == 'Grade 4')
                                                <tr>
                                                    <td>{{ $section->name ? $section->name : '' }} |
                                                        {{ $section->type ? $section->type : '' }}</td>
                                                    <td>{{ $section->users_id ? $section->adviser->name : '' }}</td>
                                                    <td>30</td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#viewSection{{ $section->id }}">view</button>
                                                        <button type="button" class="btn btn-success"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#updateSection{{ $section->id }}">Edit</button>
                                                        <button type="button" class="btn btn-danger"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#deleteSection{{ $section->id }}">Delete</button>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header p-0">
                            <a class="text-decoration-none text-black w-100 pb-0 text-start" data-bs-toggle="collapse"
                                href="#grade5">
                                <h3 class="p-3 mb-0">Grade 5</h3>
                            </a>
                        </div>
                        <div id="grade5" class="collapse" data-bs-parent="#accordion">
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead class="bg-dark text-white">
                                        <tr>
                                            <th>No. of Students</th>
                                            <th>Pilot Students</th>
                                            <th>Regular Students</th>
                                            <th>Suggested No of Pilot Sections</th>
                                            <th>Suggested No of Regular Sections</th>
                                        </tr>
                                    </thead>

                                    <tr>
                                        @php
                                            $SuggestedSections = [0, 0];
                                            $pilots = count($learners->where('glevel', '=', 'Grade 5')->where('GWA', '>=', '89'));
                                            $regs = count($learners->where('glevel', '=', 'Grade 5')->where('GWA', '<', '89'));
                                            $SuggestedSections[0] = ceil($pilots / 50);
                                            $SuggestedSections[1] = ceil($regs / 50);
                                            
                                        @endphp
                                        <td>{{ count($learners->where('glevel', '=', 'Grade 5')) }}</td>
                                        <td>{{ $pilots }}</td>
                                        <td>{{ $regs }}</td>
                                        <td>{{ $SuggestedSections[0] }}</td>
                                        <td>{{ $SuggestedSections[1] }}</td>
                                    </tr>

                                </table>
                                <table class="table table-resposive table-bordered">
                                    <thead class="table-dark">
                                        <tr>
                                            <th style="width: 30%;">Section Name and Type</th>
                                            <th style="width: 30%;">Section Adviser</th>
                                            <th style="width: 20%;">Number of Student</th>
                                            <th style="width: 20%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sections as $section)
                                            @if ($section->glevel == 'Grade 5')
                                                <tr>
                                                    <td>{{ $section->name ? $section->name : '' }} |
                                                        {{ $section->type ? $section->type : '' }}</td>
                                                    <td>{{ $section->users_id ? $section->adviser->name : '' }}</td>
                                                    <td>30</td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#viewSection{{ $section->id }}">view</button>
                                                        <button type="button" class="btn btn-success"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#updateSection{{ $section->id }}">Edit</button>
                                                        <button type="button" class="btn btn-danger"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#deleteSection{{ $section->id }}">Delete</button>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header p-0">
                            <a class="text-decoration-none text-black w-100 pb-0 text-start" data-bs-toggle="collapse"
                                href="#grade6">
                                <h3 class="p-3 mb-0">Grade 6</h3>
                            </a>
                        </div>
                        <div id="grade6" class="collapse" data-bs-parent="#accordion">
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead class="bg-dark text-white">
                                        <tr>
                                            <th>No. of Students</th>
                                            <th>Pilot Students</th>
                                            <th>Regular Students</th>
                                            <th>Suggested No of Pilot Sections</th>
                                            <th>Suggested No of Regular Sections</th>
                                        </tr>
                                    </thead>

                                    <tr>
                                        @php
                                            $SuggestedSections = [0, 0];
                                            $pilots = count($learners->where('glevel', '=', 'Grade 6')->where('GWA', '>=', '89'));
                                            $regs = count($learners->where('glevel', '=', 'Grade 6')->where('GWA', '<', '89'));
                                            $SuggestedSections[0] = ceil($pilots / 50);
                                            $SuggestedSections[1] = ceil($regs / 50);
                                            
                                        @endphp
                                        <td>{{ count($learners->where('glevel', '=', 'Grade 6')) }}</td>
                                        <td>{{ $pilots }}</td>
                                        <td>{{ $regs }}</td>
                                        <td>{{ $SuggestedSections[0] }}</td>
                                        <td>{{ $SuggestedSections[1] }}</td>
                                    </tr>

                                </table>
                                <table class="table table-resposive table-bordered">
                                    <thead class="table-dark">
                                        <tr>
                                            <th style="width: 30%;">Section Name and Type</th>
                                            <th style="width: 30%;">Section Adviser</th>
                                            <th style="width: 20%;">Number of Student</th>
                                            <th style="width: 20%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sections as $section)
                                            @if ($section->glevel == 'Grade 6')
                                                <tr>
                                                    <td>{{ $section->name ? $section->name : '' }} |
                                                        {{ $section->type ? $section->type : '' }}</td>
                                                    <td>{{ $section->users_id ? $section->adviser->name : '' }}</td>
                                                    <td>30</td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#viewSection{{ $section->id }}">view</button>
                                                        <button type="button" class="btn btn-success"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#updateSection{{ $section->id }}">Edit</button>
                                                        <button type="button" class="btn btn-danger"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#deleteSection{{ $section->id }}">Delete</button>
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
        </div>
    </div>
    </div>

    {{-- Add Section --}}
    <div class="modal" id="add">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Add Section</h2></button>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('section/create') }}" method="post">
                        @csrf
                        <div class="mb-2">
                            <label for="sectionName">Section Name</label>
                            <input type="text" class="form-control" id="sectionName" name="sectionName"
                                placeholder="Enter Section Name">
                            @error('sectionName')
                                <p class="text-danger" style="font-size: .8rem;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="gradeLevel">Grade Level</label>
                            <select name="gradeLevel" id="gradeLevel" class="form-control">
                                <option selected hidden></option>
                                <option value="Kindergarten">Kindergarten</option>
                                <option value="Grade 1">Grade 1</option>
                                <option value="Grade 2">Grade 2</option>
                                <option value="Grade 3">Grade 3</option>
                                <option value="Grade 4">Grade 4</option>
                                <option value="Grade 5">Grade 5</option>
                                <option value="Grade 6">Grade 6</option>
                            </select>
                            @error('gradeLevel')
                                <p class="text-danger" style="font-size: .8rem;">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="classType">Class Type</label>
                            <select name="classType" id="classType" class="form-control">
                                <option selected hidden></option>
                                <option value="Pilot">Pilot Class</option>
                                <option value="Regular">Regular Class</option>
                            </select>
                            @error('classType')
                                <p class="text-danger" style="font-size: .8rem;">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="adviser">Adviser</label>
                            <select name="adviser" id="adviser" class="form-control">
                                <option selected hidden></option>
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                @endforeach
                            </select>
                            @error('adviser')
                                <p class="text-danger" style="font-size: .8rem;">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-success" type="submit" data-bs-dismiss="modal">Add Section</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    @if (session()->has('addsecSuccess'))
        <div class="modal" id="addSuccess">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body d-flex flex-column">
                        <p class="mx-auto">{{ session()->get('addsecSuccess') }}</p>
                        <button data-bs-dismiss="modal" class="btn btn-primary">OK</button>
                    </div>
                </div>
            </div>
        </div>
        <button id="addsuccessBtn" data-bs-toggle="modal" data-bs-target="#addSuccess" hidden></button>

        <script>
            document.querySelector('#addsuccessBtn').click();
        </script>
    @endif


    <div class="modal" id="sectionLearners">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title">Section Learners</h1>
                </div>
                <div class="modal-body">
                    <p class="mx-auto">Are you sure you want to start sectioning the learners?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <a href="{{ url('section/learners') }}" class="btn btn-success">Confirm</a>
                </div>
            </div>
        </div>
    </div>

    @if (session()->has('addsecSuccess'))
        <div class="modal" id="addSuccess">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body d-flex flex-column">
                        <p class="mx-auto">{{ session()->get('addsecSuccess') }}</p>
                        <button data-bs-dismiss="modal" class="btn btn-primary">OK</button>
                    </div>
                </div>
            </div>
        </div>
        <button id="addsuccessBtn" data-bs-toggle="modal" data-bs-target="#addSuccess" hidden></button>

        <script>
            document.querySelector('#addsuccessBtn').click();
        </script>
    @endif

    @include('sectioning.viewSectionBtn')
    @include('sectioning.editSectionBtn')
    @include('sectioning.deleteSectionBtn')
    @include('sectioning.SectionizeBtn')
    @include('sectioning.addSectionBtn')
@endsection
