@foreach ( $advisers as $adviser )
    <div class="modal" id="deleteSection{{ $adviser->section->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Confirmation</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('section/delete') }}" method="POST">
                       @csrf
                        <div class="mb-2">
                            <p>Are you sure you want to continue?</p>
                        </div>
                        <input type="number" name="adviser_id" value = "{{ $adviser->id }}" hidden>
                        <input type="number" name="section_id" value = "{{ $adviser->section->id }}" hidden>
                        <div class="modal-footer = 2">
                            <button class="btn btn-success" type="submit" data-bs-dismiss="modal">Confirm</button>
                            <button class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach