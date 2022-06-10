{{-- Create Announcment --}}
    <div class="modal" id="add_announce">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Create Announcement</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('noticeboard/create') }}" method="POST">
                        @csrf
                        <div class="mb-2">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title">
                        </div>

                        <div class="mb-2">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" placeholder="Enter Description"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success" type="submit" data-bs-dismiss="modal">Create
                                Announcement</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>