@foreach ($items as $item)
    <div class="modal" id="brigada_edit{{ $item->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Edit Donation</h2>
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('brigada/update') }}" method="POST">
                        @csrf
                        <input type="number" name="num" hidden value="{{ $item->id }}">
                        <div class="mb-2">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name"
                                value="{{ $item->name }}">
                        </div>

                        <div class="mb-2">
                            <label for="donation">Donation</label>
                            <input type="text" class="form-control" id="description" value="{{ $item->donation }}" name="donation"
                                placeholder="Enter donation">
                        </div>

                        <div class="mb-2">
                            <label for="amount">Amount</label>
                            <input type="text" class="form-control" id="amount" name="amount" placeholder="Enter Name"
                                value="{{ $item->amount }}">
                        </div>

                        <div class="mb-2">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" id="date" value="{{ $item->date }}"
                                name="date">
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
