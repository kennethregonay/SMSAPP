@extends('layouts.app')
@section('content')
    <div class="container-md mt-3 mb-3">
        <h2>Summary</h2>
        <hr style="height: 4px;color: rgb(0,0,0);">
        <form action="{{ url ('confirmation') }}" method="POST">
            @csrf
            <p style="color: red"><strong>REMINDER: REMEMBER/SAVE THIS REFERENCE NUMBER!!!</strong></p>
            <label for="ref_no" class="form-label"><strong>REFERENCE NUMBER: </strong></label>
            <input type="number" name="ref_no" value="{{ $request['ref_no'] }}" readonly>
            <hr style="height: 4px;color: rgb(0,0,0);">
            <div class="form-group mb-3">
                <label class="form-label" style="margin-bottom: 10px; font-size: 24px;font-weight: bold">
                    <strong>Grade Level and School Information</strong><br>
                </label>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group mb-3"><label class="form-label" style="margin-bottom: 10px;"><strong>School
                                Type</strong><br></label>
                        <input class="form-control" type="text" name="s_type" value="{{ $request['school_type'] }}"
                            readonly style="margin-bottom: 20px;">
                    </div>
                </div>
                <div class="col"><label class="form-label" style="margin-bottom: 10px;"><strong>Previous
                            Grade
                            Level</strong><br></label>
                    <input class="form-control" type="text" name="s_grade" value="{{ $request['prev_grade'] }}" readonly
                        style="margin-bottom: 20px;">

                </div>
                <div class="col">
                    <div class="form-group mb-3"><label class="form-label" style="margin-bottom: 10px;"><strong>Previous
                                Section</strong><br></label>
                        <input class="form-control" type="text" style="margin-bottom: 20px;" name="s_section"
                            value="{{ $request['prev_section'] }}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group mb-3"><label class="form-label" style="margin-bottom: 10px;"><strong>School
                                ID</strong><br></label>
                        <input class="form-control" type="text" name="s_id" value="{{ $request['school_id'] }}" readonly
                            style="margin-bottom: 20px;">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group mb-3"><label class="form-label" style="margin-bottom: 10px;"><strong>School
                                Name</strong><br></label>
                        <input class="form-control" type="text" name="s_name" value="{{ $request['school_name'] }}"
                            readonly style="margin-bottom: 20px;">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group mb-3"><label class="form-label" style="margin-bottom: 10px;"><strong>School
                                Year</strong><br></label>
                        <input class="form-control" type="text" name="s_schoolyear"
                            value="{{ $request['prev_schoolyear'] }}" readonly style="margin-bottom: 20px;">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group mb-3"><label class="form-label" style="margin-bottom: 10px;"><strong>School
                                Address</strong><br></label><input class="form-control" name="s_address"
                            value="{{ $request['school_address'] }}" readonly type="text">
                    </div>
                </div>
            </div>
            <hr style="height: 4px;color: rgb(0,0,0);">

            {{-- Student Information --}}
            <div class="form-group mb-3"><label class="form-label"
                    style="margin-bottom: 10px;font-size: 24px;font-weight: bold;"><strong>Student
                        Information</strong><br></label>
            </div>

            <div class="form-group mb-3">
                <div class="row">
                    <div class="col">
                        <div class="form-group"><label class="form-label"><strong>
                                    Learner Type</strong></label><input class="form-control" type="text" name="l_type"
                                value="{{ $request['type'] }}" readonly></div>
                    </div>
                    <div class="col"><label class="form-label"><strong>Enrolling
                                Grade
                                Level</strong><br></label>
                        <input class="form-control" type="text" name="l_glevel" value="{{ $request['glevel'] }}"
                            readonly>
                    </div>
                </div>
            </div>
            {{-- Student Full Name --}}
            <div>
                <div class="row">
                    <div class="col">
                        <div class="form-group mb-3"><label class="form-label"
                                style="margin-bottom: 10px;"><strong>First
                                    Name</strong></label><input class="form-control" type="text"
                                style="margin-bottom: 20px;" name="l_fname" value="{{ $request['fname'] }}" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group mb-3"><label class="form-label"
                                style="margin-bottom: 10px;"><strong>Middle
                                    Name</strong></label><input class="form-control" type="text"
                                style="margin-bottom: 20px;" name="l_mname" value="{{ $request['mname'] }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group mb-3"><label class="form-label" style="margin-bottom: 10px;"><strong>Last
                                    Name</strong></label><input class="form-control" type="text"
                                style="margin-bottom: 20px;" name="l_lname" value="{{ $request['lname'] }}" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group mb-3"><label class="form-label"
                                style="margin-bottom: 10px;"><strong>Extension
                                    Name</strong></label><input class="form-control" type="text"
                                style="margin-bottom: 20px;" name="l_extension" value="{{ $request['extension'] }}"
                                readonly></div>
                    </div>
                </div>
            </div>

            {{-- Student Address --}}
            <div class="form-group mb-3">
                <div class="row">
                    <div class="col"><label class="form-label"
                            style="margin-bottom: 10px;"><strong>Address</strong><br></label><input class="form-control"
                            type="text" style="margin-bottom: 20px;" name="l_address" value="{{ $request['address'] }}"
                            readonly>
                    </div>
                </div>
            </div>
            {{-- With LRN --}}
            <div class="row">
                <div class="col"><label class="form-label" style="margin-bottom: 10px;"><strong>General Weighted Average
                            number</strong><br></label><input class="form-control" type="text" name="l_lrn"
                        value="{{ $request['gwa'] }}" readonly>
                </div>
                <div class="col"><label class="form-label" style="margin-bottom: 10px;"><strong>LRN
                            number</strong><br></label><input class="form-control" type="text" name="l_lrn"
                        value="{{ $request['LRN'] }}" readonly>
                </div>
                <div class="col"><label class="form-label" style="margin-bottom: 10px;"><strong>Birth
                            Date</strong><br></label><input class="form-control" type="text" name="l_birthdate"
                        value="{{ $request['birthdate'] }}" readonly>
                </div>
                <div class="col"><label class="form-label" style="margin-bottom: 10px;"><strong>Mother
                            Tongue</strong><br></label><input class="form-control" type="text"
                        style="margin-bottom: 20px;" name="l_mothertongue" value="{{ $request['mothertongue'] }}"
                        readonly></div>
            </div>
            <div class="row">
                <div class="col"><label class="form-label"
                        style="margin-bottom: 10px;"><strong>Gender</strong><br></label>
                    <input class="form-control" type="text" name="l_gender" value="{{ $request['gender'] }}" readonly
                        style="margin-bottom: 20px;">

                </div>
                <div class="col"><label class="form-label"
                        style="margin-bottom: 10px;"><strong>Nationality</strong><br></label><input class="form-control"
                        type="text" name="l_national" value="{{ $request['national'] }}" readonly
                        style="margin-bottom: 20px;">
                </div>
                <div class="col"><label class="form-label"
                        style="margin-bottom: 10px;"><strong>Relgion</strong><br></label><input class="form-control"
                        type="text" name="l_religion" value="{{ $request['religion'] }}" readonly
                        style="margin-bottom: 20px;">
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group mb-3"><label class="form-label" style="margin-bottom: 10px;"><strong>Contact
                                Number</strong><br></label><input class="form-control" type="text"
                            style="margin-bottom: 20px;" name="l_contact" value="{{ $request['contact'] }}" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group mb-3"><label class="form-label" style="margin-bottom: 10px;"><strong>Email
                                Address</strong><br></label><input class="form-control" type="text"
                            style="margin-bottom: 20px;" name="l_email" value="{{ $request['email'] }}" readonly>
                    </div>
                </div>
            </div>
            {{-- Disability --}}
            <div class="row">
                <div class="col">
                    <div class="form-group mb-3"><label class="form-label" style="margin-bottom: 10px;"><strong>Please
                                Specify</strong><br></label>
                                <textarea class="form-control" name="PWD" readonly>{{ $request['PWD'] }}</textarea>
                    </div>
                </div>
            </div>
            <hr style="height: 4px;color: rgb(0,0,0);">

            {{-- Parent Information --}}
            <div>
                <div class="form-group mb-3"><label class="form-label"
                        style="margin-bottom: 10px;font-size: 24px;font-weight: bold;"><strong>Parent
                            Information</strong><br></label></div>
                <div class="row">
                    <div class="col">
                        <div class="form-group mb-3"><label class="form-label"
                                style="margin-bottom: 10px;"><strong>Parent or Guardian</strong></label><input
                                class="form-control" type="text" style="margin-bottom: 20px;" name="p_type"
                                value="{{ $request['parent_type'] }}" readonly></div>
                    </div>
                    <div class="col">
                        <div class="form-group mb-3"><label class="form-label"
                                style="margin-bottom: 10px;"><strong>Gender</strong></label><input class="form-control"
                                type="text" style="margin-bottom: 20px;" name="p_gender"
                                value="{{ $request['parents_gender'] }}" readonly></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group mb-3"><label class="form-label"
                                style="margin-bottom: 10px;"><strong>First
                                    Name</strong></label><input class="form-control" type="text"
                                style="margin-bottom: 20px;" name="p_fname" value="{{ $request['parents_fname'] }}"
                                readonly></div>
                    </div>
                    <div class="col">
                        <div class="form-group mb-3"><label class="form-label"
                                style="margin-bottom: 10px;"><strong>Middle
                                    Name</strong></label><input class="form-control" type="text"
                                style="margin-bottom: 20px;" name="p_mname" value="{{ $request['parents_mname'] }}"
                                readonly></div>
                    </div>
                    <div class="col">
                        <div class="form-group mb-3"><label class="form-label"
                                style="margin-bottom: 10px;"><strong>Last Name</strong></label><input
                                class="form-control" type="text" style="margin-bottom: 20px;" name="p_lname"
                                value="{{ $request['parents_lname'] }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group mb-3"><label class="form-label"
                                style="margin-bottom: 10px;"><strong>Contact
                                    Number</strong><br></label></div><input class="form-control" type="text"
                            style="margin: 0px;margin-top: -16px;" name="p_contact"
                            value="{{ $request['parents_contact'] }}" readonly>
                    </div>
                    <div class="col">
                        <div class="form-group mb-3"><label class="form-label"
                                style="margin-bottom: 10px;"><strong>Email
                                    Address</strong><br></label><input class="form-control" type="email" name="p_email"
                                value="{{ $request['parents_email'] }}" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group mb-3"><label class="form-label"
                                style="margin-bottom: 10px;"><strong>Educational
                                    Attainment</strong><br></label><input class="form-control" type="text"
                                name="p_educ-attain" value="{{ $request['parents_educ-attain'] }}" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <hr style="height: 4px;color: rgb(0,0,0);">

            <div class="d-flex flex-row-reverse bd-highlight">
                <div class="p-2 bd-highlight">
                    <button class="btn-lg btn-success position-fixed-right" type="submit">Confirm</button>
                </div>
            </div>
        </form>
        <div class="d-flex flex-row-reverse bd-highlight">
            <div class="p-2 bd-highlight">
                <button class="btn-lg btn-danger position-fixed-right" onclick="history.back()">Go Back</button>
            </div>
        </div>
    </div>
@endsection
