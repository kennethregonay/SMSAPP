{{-- Create Announcment --}}
@foreach ( $announcement as $announce )
<div class="modal" id="edit_announce{{ $announce->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Edit Announcement</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('noticeboard/update') }}" method="POST">
                    @csrf
                    <div class="mb-2">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" value="{{ $announce->title }}">
                    </div>
                    <div class="mb-2">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Enter Description">{{ $announce->desc }}</textarea>
                    </div>
                    <input type="number" name="num" value="{{  $announce->id}}" hidden>
                    <div class="modal-footer">
                        <button class="btn btn-success" type="submit" data-bs-dismiss="modal">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach