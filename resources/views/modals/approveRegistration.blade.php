@foreach ( $learners as $student)
<div class="modal" id="approveRegistration{{ $student->id  }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Confirmation</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>         
            </div>
            <div class="modal-body">
                <form action="registration/accept" method="POST">
                    @csrf
                    <div class="mb-2">
                        <p>Are you Sure you want  to continue?</p>
                        <input type="number" name="num" value = "{{ $student->id }}" hidden>
                    </div>
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