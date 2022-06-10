@extends('layouts.app')
@section('content')
    <div class="container-md mt-3 mb-3">
        <h2>Pre-Registration Form</h2>
        <hr style="height: 4px;color: rgb(0,0,0);">
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <p style="color: red"><strong>REMINDER: REMEMBER/SAVE THIS REFERENCE NUMBER!!!</strong></p>
            <label for="ref_no" class="form-label"><strong>REFERENCE NUMBER: </strong></label>
            <input class="mb-5" type="number" name='ref_no' value="{{ $ref_no }}" readonly>
            {{-- Grade Level --}}

            <div id="accordion">
                <div class="card">
                    <div class="card-header">
                        <a class="btn" data-bs-toggle="collapse" href="#studentInfo"
                            style="font-size: 24px;font-weight: bold">
                            <strong>Student Information </strong><span class="fa fa-caret-down"></span>
                        </a>
                    </div>
                    <div id="studentInfo" class="collapse hidden" data-bs-parent="#accordion">
                        <div class="form-group mb-3">
                            <div class="card-body">
                                {{-- Learner Type --}}
                                <div class="row">
                                    <div class="col"><label class="form-label"
                                            style="margin-bottom: 10px;"><strong>Learner
                                                Type</strong><br></label>
                                        <div class="row" style="width: 240px;">
                                            <div class="col">
                                                <div class="form-check"><input class="form-check-input" type="radio"
                                                        id="enrolleeType" name="type" value="Enrollee" required>
                                                    <label class="form-check-label" for="formCheck-1">Enrollee</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-check"><input class="form-check-input" type="radio"
                                                        id="transfereeType" name="type" value="Transferee"><label
                                                        class="form-check-label" for="formCheck-1">Transferee</label></div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Enrolling Grade --}}
                                    <div class="col"><label class="form-label"
                                            style="margin-bottom: 10px;"><strong>Enrolling
                                                Grade
                                                Level</strong><br></label><select class="form-select"
                                            style="margin-bottom: 20px;" name="glevel">
                                            <option value="Kindergarten" selected="">Kindergarten</option>
                                            <option value="Grade 1">Grade 1</option>
                                            <option value="Grade 2">Grade 2</option>
                                            <option value="Grade 3">Grade 3</option>
                                            <option value="Grade 4">Grade 4</option>
                                            <option value="Grade 5">Grade 5</option>
                                            <option value="Grade 6">Grade 6</option>
                                        </select>
                                    </div>
                                </div>
                                {{-- Student Full Name --}}
                                <div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group mb-3"><label class="form-label"
                                                    style="margin-bottom: 10px;"><strong>First
                                                        Name</strong></label><input class="form-control" type="text"
                                                    style="margin-bottom: 20px;" maxlength="30" name="fname">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group mb-3"><label class="form-label"
                                                    style="margin-bottom: 10px;"><strong>Middle
                                                        Name</strong></label><input class="form-control" type="text"
                                                    style="margin-bottom: 20px;" maxlength="20" name="mname"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group mb-3"><label class="form-label"
                                                    style="margin-bottom: 10px;"><strong>Last
                                                        Name</strong></label><input class="form-control" type="text"
                                                    style="margin-bottom: 20px;" maxlength="30" name="lname">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group mb-3"><label class="form-label"
                                                    style="margin-bottom: 10px;"><strong>Extension
                                                        Name</strong></label><input class="form-control" type="text"
                                                    style="margin-bottom: 20px;" name="extension"></div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Student Address --}}
                                <div class="form-group mb-3">
                                    <div class="row">
                                        <div class="col"><label class="form-label"
                                                style="margin-bottom: 10px;"><strong>Address</strong><br></label><input
                                                class="form-control" type="text" style="margin-bottom: 20px;"
                                                name="address">
                                        </div>
                                    </div>
                                </div>
                                {{-- With LRN --}}
                                <div class="row">
                                    <div class="col"><label class="form-label"
                                            style="margin-bottom: 10px;"><strong>General Weigthed
                                                Average</strong><br></label>
                                        <input class="form-control" type="text" name="gwa" min="60" max="100"
                                            placeholder="60-100">
                                    </div>

                                    {{-- LRN Number --}}
                                    <div class="col"><label class="form-label"
                                            style="margin-bottom: 10px;"><strong>LRN
                                                number</strong><br></label><input class="form-control" type="text"
                                            name="LRN">
                                    </div>

                                    {{-- Birth Date --}}
                                    <div class="col"><label class="form-label"
                                            style="margin-bottom: 10px;"><strong>Birth
                                                Date</strong><br></label><input class="form-control" type="date"
                                            name="birthdate">
                                    </div>

                                    {{-- Mother Tongue --}}
                                    <div class="col"><label class="form-label"
                                            style="margin-bottom: 10px;"><strong>Mother
                                                Tongue</strong><br></label><input class="form-control" type="text"
                                            style="margin-bottom: 20px;" name="mothertongue"></div>
                                </div>
                                <div class="row">
                                    {{-- Gender --}}
                                    <div class="col"><label class="form-label"
                                            style="margin-bottom: 10px;"><strong>Gender</strong><br></label>
                                        <div class="row" style="width: 212px;">
                                            <div class="col">
                                                <div class="form-check"><input class="form-check-input" type="radio"
                                                        id="formCheck-3" name="gender" value="Male"><label
                                                        class="form-check-label" for="formCheck-1">Male</label></div>
                                            </div>
                                            <div class="col">
                                                <div class="form-check"><input class="form-check-input" type="radio"
                                                        id="formCheck-4" name="gender" value="Female"><label
                                                        class="form-check-label" for="formCheck-1">Female</label></div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Nationality and Religion --}}
                                    <div class="col"><label class="form-label"
                                            style="margin-bottom: 10px;"><strong>Nationality</strong><br></label><input
                                            class="form-control" type="text" name="national" style="margin-bottom: 20px;"
                                            maxlength="20">
                                    </div>
                                    <div class="col"><label class="form-label"
                                            style="margin-bottom: 10px;"><strong>Relgion</strong><br></label><select
                                            class="form-select" style="margin-bottom: 20px;" name="religion">
                                            <option value="Roman Catholic" selected="">Roman Catholic</option>
                                            <option value="Protestant">Protestant</option>
                                            <option value="Iglesia ni Cristo">Iglesia ni Cristo</option>
                                            <option value="Muslim">Muslim</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    {{-- Student Contact Number --}}
                                    <div class="col">
                                        <div class="form-group mb-3"><label class="form-label"
                                                style="margin-bottom: 10px;"><strong>Contact
                                                    Number</strong><br></label><input class="form-control" type="tel"
                                                name="contact" style="margin-bottom: 20px;" placeholder="09XXXXXXXX"
                                                minlength="11" maxlength="11">
                                        </div>
                                    </div>
                                    {{-- Student Email Address --}}
                                    <div class="col">
                                        <div class="form-group mb-3"><label class="form-label"
                                                style="margin-bottom: 10px;"><strong>Email
                                                    Address</strong><br></label><input class="form-control" type="text"
                                                style="margin-bottom: 20px;" placeholder="example@email.com" name="email">
                                        </div>
                                    </div>
                                </div>
                                {{-- Disability --}}
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group mb-3"><label class="form-label"
                                                style="margin-bottom: 10px;"><strong>If there is a disability please specify
                                                    if not leave it as is</strong><br></label>
                                            <textarea class="form-control" name="PWD">N/A</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card-header">
                        <a class="btn" data-bs-toggle="collapse" href="#gradeInfo"
                            style="font-size: 24px;font-weight: bold">
                            <strong>Grade Level and School Information </strong><span class="fa fa-caret-down"></span>
                        </a>
                    </div>
                    <div id="gradeInfo" class="collapse hidden" data-bs-parent="#accordion">
                        <div class="card-body">
                            <div class="row">
                                {{-- School Information --}}
                                <div class="col">
                                    <label class="form-label" style="margin-bottom: 10px;"><strong>School
                                            Type</strong><br></label>
                                    <div class="row" style="width: 212px;">
                                        <div class="col">
                                            <div class="form-check"><input class="form-check-input" type="radio"
                                                    id="formCheck-9" name="school_type" value="Public"><label
                                                    class="form-check-label" for="formCheck-1">Public</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-check"><input class="form-check-input" type="radio"
                                                    id="formCheck-10" name="school_type" value="Private"><label
                                                    class="form-check-label" for="formCheck-1">Private</label></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col"><label class="form-label"
                                        style="margin-bottom: 10px;"><strong>Previous
                                            Grade
                                            Level</strong><br></label>

                                    <select class="form-select" style="margin-bottom: 20px;" name="prev_grade"
                                        id="prev_grade">
                                        <option selected hidden></option>
                                        <option value="Kindergarten">Kindergarten</option>
                                        <option value="Grade 1">Grade 1</option>
                                        <option value="Grade 2">Grade 2</option>
                                        <option value="Grade 3">Grade 3</option>
                                        <option value="Grade 4">Grade 4</option>
                                        <option value="Grade 5">Grade 5</option>
                                        <option value="Grade 6">Grade 6</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <div class="form-group mb-3"><label class="form-label"
                                            style="margin-bottom: 10px;"><strong>Previous
                                                Section</strong><br></label>
                                        <input class="form-control" type="text" style="margin-bottom: 20px;"
                                            name="prev_section" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group mb-3"><label class="form-label"
                                            style="margin-bottom: 10px;"><strong>School
                                                ID</strong><br></label><input class="form-control" type="text"
                                            name="school_id" style="margin-bottom: 20px;">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group mb-3"><label class="form-label"
                                            style="margin-bottom: 10px;"><strong>School
                                                Name</strong><br></label><input class="form-control" type="text"
                                            name="school_name" style="margin-bottom: 20px;"></div>
                                </div>
                                <div class="col">
                                    <div class="form-group mb-3"><label class="form-label"
                                            style="margin-bottom: 10px;"><strong>School
                                                Year</strong><br></label><input class="form-control" type="text"
                                            name="prev_schoolyear" style="margin-bottom: 20px;"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group mb-3"><label class="form-label"
                                            style="margin-bottom: 10px;"><strong>School
                                                Address</strong><br></label><input class="form-control"
                                            name="school_address" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card-header">
                        <a class="btn" data-bs-toggle="collapse" href="#parentInfo"
                            style="font-size: 24px;font-weight: bold">
                            <strong>Parent Information </strong><span class="fa fa-caret-down"></span>
                        </a>
                    </div>
                    <div id="parentInfo" class="collapse hidden" data-bs-parent="#accordion">
                        <div class="card-body">
                            <div>
                                <div class="row">
                                    <div class="col"><label class="form-label"
                                            style="margin-bottom: 10px;"><strong>Parent
                                                or Guardian</strong></label>
                                        <div class="row" style="width: 212px;">
                                            <div class="col">
                                                <div class="form-check"><input class="form-check-input" type="radio"
                                                        id="formCheck-11" name="parent_type" value="Parent"
                                                        placeholder="Parent"><label class="form-check-label"
                                                        for="formCheck-1">Parent</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-check"><input class="form-check-input" type="radio"
                                                        id="formCheck-12" name="parent_type" value="Guardian"
                                                        placeholder="Guardian"><label class="form-check-label"
                                                        for="formCheck-1">Guardian</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col"><label class="form-label"
                                            style="margin-bottom: 10px;"><strong>Gender</strong><br></label>
                                        <div class="row" style="width: 212px;">
                                            <div class="col">
                                                <div class="form-check"><input class="form-check-input" type="radio"
                                                        id="formCheck-17" name="parents_gender" value="Male"><label
                                                        class="form-check-label" for="formCheck-1">Male</label></div>
                                            </div>
                                            <div class="col">
                                                <div class="form-check"><input class="form-check-input" type="radio"
                                                        id="formCheck-18" name="parents_gender" value="Female"><label
                                                        class="form-check-label" for="formCheck-1">Female</label></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group mb-3"><label class="form-label"
                                                style="margin-bottom: 10px;"><strong>First
                                                    Name</strong></label><input class="form-control" type="text"
                                                style="margin-bottom: 20px;" name="parents_fname"></div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group mb-3"><label class="form-label"
                                                style="margin-bottom: 10px;"><strong>Middle
                                                    Name</strong></label><input class="form-control" type="text"
                                                style="margin-bottom: 20px;" name="parents_mname"></div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group mb-3"><label class="form-label"
                                                style="margin-bottom: 10px;"><strong>Last Name</strong></label><input
                                                class="form-control" type="text" style="margin-bottom: 20px;"
                                                name="parents_lname">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group mb-3"><label class="form-label"
                                                style="margin-bottom: 10px;"><strong>Contact
                                                    Number</strong><br></label></div><input class="form-control"
                                            type="tel" style="margin: 0px;margin-top: -16px;" name="parents_contact" placeholder="09XXXXXXXXX">
                                    </div>
                                    <div class="col">
                                        <div class="form-group mb-3"><label class="form-label"
                                                style="margin-bottom: 10px;"><strong>Email
                                                    Address</strong><br></label><input class="form-control" type="email"
                                                name="parents_email" placeholder="example@gmail.com">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group mb-3"><label class="form-label"
                                                style="margin-bottom: 10px;"><strong>Educational Attainment</strong><br></label>
                                            <select class="form-control form-select" style="margin-bottom: 20px;" name="parents_educ-attain"
                                                id="parents_educ-attain">
                                                <option selected hidden></option>
                                                <option value="Elementary Graduate">Elementary Graduate</option> 
                                                <option value="Highschool Graduate">Highschool Graduate</option> 
                                                <option value="College Graduate">College Graduate</option> 
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-row-reverse bd-highlight">
                        <div class="p-2 bd-highlight"><button class="btn-lg btn-success position-fixed-right"
                                type="submit">REGISTER</button></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        function changefunc(value) {
            if (value == "Kindergarten") {
                document.getElementById("fname").disabled = true;
            } else {
                document.getElementById("fname").disabled = false;
            }
        }
    </script>
@endsection
