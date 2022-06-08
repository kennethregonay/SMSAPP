@foreach ($accounts as $acc)
    <div class="modal" id="ApproveRequest{{ $acc->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Confirmation</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form action="{{ url('request/approve') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-2">
                            <input type="text" name="num" value="{{ $acc->id }}" hidden>
                            <p>Are you Sure you want to continue?</p>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success" type="submit" data-bs-dismiss="modal">Confirm</button>
                            <button class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
