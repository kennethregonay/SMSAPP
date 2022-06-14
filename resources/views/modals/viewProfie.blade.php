@if (Auth()->user() != null)
    <div class="modal" id="viewProfile">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Profile</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                        <div class="row">
                            <div class="col">
                                <div class="card-header p-2">
                                    <h6 class="text-primary card-title mt-1mt-1"><strong>Full Name: </strong> </h6>
                                </div>
                                <div class="card-body p-2">
                                    <h6 class="card-subtitle mt-1mt-1">{{ Auth()->user()->name }}</h6>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card-header p-2">
                                    <h6 class="text-primary card-title mt-1mt-1"><strong>Gender: </strong> </h6>
                                </div>
                                <div class="card-body p-2">
                                    <h6 class="card-subtitle mt-1mt-1">{{ Auth()->user()->gender }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-2">
                        <div class="row">
                            <div class="col">
                                <div class="card-header p-2">
                                    <h6 class="text-primary card-title mt-1mt-1"><strong>Contact Number: </strong> </h6>
                                </div>
                                <div class="card-body p-2">
                                    @if (Auth()->user()->contactNo != null)
                                        <h6 class="card-subtitle mt-1mt-1">{{ Auth()->user()->contactNo }}</h6>
                                    @else
                                    <h6 class="card-subtitle mt-1mt-1">N/A</h6>
                                    @endif
                                </div>
                            </div>
                            <div class="col">
                                <div class="card-header p-2">
                                    <h6 class="text-primary card-title mt-1mt-1"><strong>Position: </strong> </h6>
                                </div>
                                <div class="card-body p-2">
                                    <h6 class="card-subtitle mt-1mt-1">{{ Auth()->user()->position }}</h6>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card-header p-2">
                                    <h6 class="text-primary card-title mt-1mt-1"><strong>Educational Attainment:
                                        </strong> </h6>
                                </div>
                                <div class="card-body p-2">
                                    @if (Auth()->user()->educattain != null)
                                        <h6 class="card-subtitle mt-1mt-1">{{ Auth()->user()->educattain }}</h6>
                                    @else
                                        <h6 class="card-subtitle mt-1mt-1">N/A</h6>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label>Contact Number</label>
                        @if (Auth()->user()->contactNo != null)
                            <input type="text" value="{{ Auth()->user()->contactNo }}" readonly>
                        @else
                            <input type="text" value="N/A" readonly>
                        @endif
                    </div>
                    <div class="mb-2">
                        <label>Position</label>
                        <input type="text" value="{{ Auth()->user()->position }}" readonly>
                    </div>
                    <div class="mb-2">
                        <label>Educational Attainment</label>
                        @if (Auth()->user()->educattain != null)
                            <input type="text" value="{{ Auth()->user()->educattain }}" readonly>
                        @else
                            <input type="text" value="N/A" readonly>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
