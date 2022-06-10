@foreach ( $learners as $student)
<div class="modal" id="declineRegistration{{ $student->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Confirmation</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>         
            </div>
            <div class="modal-body">
                <form action="registration/decline" method="POST">
                    @csrf
                    <div class="mb-2">
                        <p>Are you Sure you want to continue?</p>
                    </div>
                    <input type="number" name="num" value="{{ $student->id }}" hidden >
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