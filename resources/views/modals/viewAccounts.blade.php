@foreach ($accounts as $acc)
    <div class="modal" id="viewAccount{{ $acc->id }}">
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
                                        <h6 class="card-subtitle mb-2">{{ $acc->name }}</h6>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card-header p-2">
                                        <h6 class="text-primary card-title mt-1mt-1"><strong>Gender: </strong> </h6>
                                    </div>
                                    <div class="card-body p-2">
                                        <h6 class="card-subtitle mb-2">{{ $acc->gender }}</h6>
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
                                        @if ($acc->contactNo != null)
                                            <h6 class="card-subtitle mb-2">{{ $acc->contactNo }}</h6>
                                        @else
                                            <h6 class="card-subtitle mb-2">N/A</h6>
                                        @endif
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card-header p-2">
                                        <h6 class="text-primary card-title mt-1mt-1"><strong>Position: </strong> </h6>
                                    </div>
                                    <div class="card-body p-2">
                                        <h6 class="card-subtitle mb-2">{{ $acc->position }}</h6>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card-header p-2">
                                        <h6 class="text-primary card-title mt-1mt-1"><strong>Educational Attainment:
                                            </strong> </h6>
                                    </div>
                                    <div class="card-body p-2">
                                        @if ($acc->educattain != null)
                                            <h6 class="card-subtitle mb-2">{{ $acc->educattain }}</h6>
                                        @else
                                            <h6 class="card-subtitle mb-2">N/A</h6>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
