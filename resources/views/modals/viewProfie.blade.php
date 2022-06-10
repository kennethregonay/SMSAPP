<div class="modal" id="viewProfile">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Profile</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-2">
                    <label>Fullname</label>
                    <input type="text" value="{{ $acc->name }}" readonly>
                </div>
                <div class="mb-2">
                    <label>Gender</label>
                    <input type="text" value="{{ $acc->gender }}" readonly>
                </div>
                <div class="mb-2">
                    <label>Contact Number</label>
                    @if ($acc->contactNo != null)
                        <input type="text" value="{{ $acc->contactNo }}" readonly>
                    @else
                        <input type="text" value="N/A" readonly>
                    @endif
                </div>
                <div class="mb-2">
                    <label>Position</label>
                    <input type="text" value="{{ $acc->position }}" readonly>
                </div>
                <div class="mb-2">
                    <label>Educational Attainment</label>
                    @if ($acc->educattain != null)
                    <input type="text" value="{{ $acc->educattain }}" readonly>
                    @else
                        <input type="text" value="N/A" readonly>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>