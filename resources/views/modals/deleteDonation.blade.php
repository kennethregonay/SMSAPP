@foreach ($items as $item)
    {{-- Delete Confirmation --}}
    <div class="modal" id="brigada_delete{{ $item->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Confirmation</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url ('brigada/delete')  }}" method="POST">
                        @csrf
                        <div class="mb-2">
                            <p>Are you sure you want to continue?</p>
                           <input type="number" hidden name="num" value="{{ $item->id  }}">
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" type="submit" data-bs-dismiss="modal" name="submit"  value="1">Confirm</button>
                            <button class="btn btn-primary" data-bs-dismiss="modal" name="submit" value="0">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
