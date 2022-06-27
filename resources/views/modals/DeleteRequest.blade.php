@foreach ($accounts as $acc)
    <div class="modal" id="DeleteRequest{{ $acc->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Confirmation</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>         
                </div>
                <div class="modal-body">
                    <form action="{{ url('request/delete') }}" method="POST">
                       @csrf
                        <div class="mb-2">
                            <p>Are you Sure you want to continue?</p>
                            <input type="text" name="num" value="{{ $acc->id }} " hidden>
                        </div>
                        <button class="btn btn-success" type="submit" data-bs-dismiss="modal" name="submit" value="1">Confirm</button>
                        <button class="btn btn-danger" data-bs-dismiss="modal"  name = "submit" value= "0">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
   