@foreach ($learners as $student)
    <div class="modal" id="viewLeaners{{ $student->id }}">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Register Form View</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                        <label>Reference No.</label>
                        <input type="text" value="{{ $student->RefNo }}" readonly>
                    </div>
                    <div class="mb-2">
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <p><strong>Learner Type: </strong></p>
                                        <p>{{ $student->typelearners }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        @if ($student->LRN == null)
                                            <p><strong>Learner LRN: </strong></p>
                                            <p>N/A</p>
                                        @else
                                            <p><strong>Learner LRN: </strong></p>
                                            <p>{{ $student->LRN }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <p><strong>Learner Gender: </strong></p>
                                        <p>{{ $student->gender }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-2">
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <p><strong>Learner Email: </strong></p>
                                        <p>{{ $student->email }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <p><strong>Learner Contact Number: </strong></p>
                                        @if ($student->contactNo == null)
                                            <p>N/A</p>
                                        @else
                                            <p>{{ $student->LRN }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <p><strong>Learner Brith Date: </strong></p>
                                        <p>{{ $student->birthdate }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
