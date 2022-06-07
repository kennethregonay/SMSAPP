@foreach ($accounts as $acc)
    <div class="modal" id="edit_account{{ $acc->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Edit Donation</h2>
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('account/update') }}" method="POST">
                        @csrf
                        <input type="number" name="num" hidden value="{{ $acc->id }}">
                        <div class="mb-2">
                            <label for="email">EMAIL</label>
                            <input type="text" class="form-control" name="email" value="{{ $acc->email }}" readonly>
                        </div>

                        <div class="mb-2">
                            <label for="type">TYPE </label>
                                <input type="text" class="form-control" id="description" value="{{ $acc->type }}"
                                    name="type" placeholder="Enter donation" readonly>
                        </div>

                        <div class="mb-2">
                            <label for="Role">Role</label>
                            <input type="text" class="form-control" id="amount" name="role" placeholder="Enter Name"
                                value="{{ $acc->role }}">
                        </div>

                        <div class="mb-2">
                            <label for="status">Status</label>
                            <select class="form-select" style="margin-bottom: 20px;" name="status">
                                @if ($acc->status == 'Active')
                                    <option value="Active" selected>Active</option>
                                    <option value="Deactivated">Deactivated</option>
                                @else
                                    <option value="Active">Active</option>
                                    <option value="Deactivated" selected>Deactivated</option>
                                @endif


                            </select>
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-success" type="submit" data-bs-dismiss="modal">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
