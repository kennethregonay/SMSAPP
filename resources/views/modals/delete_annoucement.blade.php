@foreach ( $announcement as $announce )
<div class="modal" id="delete_announce{{ $announce->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Confirmation</h2>
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="noticeboard/delete" method="POST">
                    @csrf
                    <div class="mb-2">
                        <p>Are you sure you want to continue?</p>
                    </div>
                    <input type="number" name="num" hidden value="{{ $announce->id }}">
                    <div class="modal-footer">
                        <button class="btn btn-success" type="submit" data-bs-dismiss="modal">Confirm</button>
                        <button class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endforeach