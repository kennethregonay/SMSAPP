@if (Auth()->user() != null)
    <div class="modal" id="viewProfile">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Profile</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="">
                    <div class="modal-body">
                        <div class="mb-2">
                            <div class="row">
                                <div class="col">
                                    <div class="card-header p-2">
                                        <h6 class="text-primary card-title mt-1mt-1"><strong>Full Name: </strong> </h6>
                                    </div>
                                    <div class="card-body p-2">
                                        <input name="name" id="name" type="text"
                                            value="{{ Auth()->user()->name }}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card-header p-2">
                                        <h6 class="text-primary card-title mt-1mt-1"><strong>Gender: </strong> </h6>
                                    </div>
                                    <div class="card-body p-2">
                                        <select name="gender" id="gender" class="form-control form-select">
                                            @if (Auth()->user()->gender == 'Male')
                                                <option value="Male" selected>Male</option>
                                                <option value="Female">Female</option>
                                            @else
                                                <option value="Male">Male</option>
                                                <option value="Female" selected>Female</option>
                                            @endif

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="row">
                                <div class="col">
                                    <div class="card-header p-2">
                                        <h6 class="text-primary card-title mt-1mt-1"><strong>Contact Number: </strong>
                                        </h6>
                                    </div>
                                    <div class="card-body p-2">
                                        @if (Auth()->user()->contactNo != null)
                                            <input name="contactNo" id="contactNo" type="text"
                                                value="{{ Auth()->user()->contactNo }}">
                                        @else
                                            <input name="contactNo" id="contactNo" type="text" placeholder="N/A">
                                        @endif
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card-header p-2">
                                        <h6 class="text-primary card-title mt-1mt-1"><strong>Position: </strong> </h6>
                                    </div>
                                    <div class="card-body p-2">
                                        @php
                                            $pos = Auth()->user()->position;
                                        @endphp
                                        <select id="position" name="position" class="form-control form-select">
                                            <option selected hidden></option>
                                            <option value="Teacher I" {{ $pos === 'Teacher I' ? 'selected' : '' }}>
                                                Teacher I</option>
                                            <option value="Teacher II" {{ $pos === 'Teacher II' ? 'selected' : '' }}>
                                                Teacher II</option>
                                            <option value="Teacher III"
                                                {{ $pos === 'Teacher III' ? 'selected' : '' }}>Teacher III</option>
                                            <option value="Master Teacher I"
                                                {{ $pos === 'Master Teacher I' ? 'selected' : '' }}>Master Teacher I
                                            </option>
                                            <option value="Master Teacher II"
                                                {{ $pos === 'Master Teacher II' ? 'selected' : '' }}>Master Teacher II
                                            </option>
                                            <option value="Master Teacher III"
                                                {{ $pos === 'Master Teacher III' ? 'selected' : '' }}>Master Teacher
                                                III</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card-header p-2">
                                        <h6 class="text-primary card-title mt-1mt-1"><strong>Educational Attainment:
                                            </strong> </h6>
                                    </div>
                                    <div class="card-body p-2">
                                        @if (Auth()->user()->educattain != null)
                                            <input name="educAttain" id="educAttain" type="text"
                                                value="{{ Auth()->user()->educattain }}">
                                        @else
                                            <input name="educAttain" id="educAttain" type="text" placeholder="N/A">
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success" type="submit" data-bs-dismiss="modal">Save and Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif
