@foreach ($accounts as $acc)
    <div class="modal" id="edit_account{{ $acc->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Edit Account</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('account/update') }}" method="POST">
                        @csrf
                        <input type="number" name="num" hidden value="{{ $acc->id }}">
                        <div class="mb-2">
                            <label for="email">EMAIL</label>
                            <input type="text" class="form-control" name="email" value="{{ $acc->email }}"
                                readonly>
                        </div>

                        <div class="mb-2">
                            <label for="type">TYPE </label>
                            <input type="text" class="form-control" id="description" value="{{ $acc->type }}"
                                name="type" placeholder="Enter donation" readonly>
                        </div>

                        <div class="mb-2">
                            <label for="Role">ROLE</label>
                            <select name="role" id="role" class="form-control form-select" required>
                                <option selected hidden></option>
                                @if ($acc->role == 'Brigada Coordinator')
                                    <option value="Brigada Coordinator" selected>Brigada Coordinator</option>
                                    <option value="Enrollment Officer">Enrollment Officer</option>
                                @elseif ($acc->role == 'Enrollment Officer')
                                    <option value="Brigada Coordinator">Brigada Coordinator</option>
                                    <option value="Enrollment Officer" selected>Enrollment Officer</option>
                                @else
                                    <option value=""selected></option>
                                    <option value="Brigada Coordinator">Brigada Coordinator</option>
                                    <option value="Enrollment Officer">Enrollment Officer</option>
                                @endif
                            </select>
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
