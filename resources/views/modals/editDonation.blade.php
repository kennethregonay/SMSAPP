@foreach ($items as $item)
    <div class="modal" id="brigada_edit{{ $item->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Edit Donation</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('brigada/update') }}" method="POST">
                        @csrf
                        <input type="number" name="num" hidden value="{{ $item->id }}">
                        <div class="mb-2">
                            <div class="row">
                                <div class="col">
                                    <label for="name">Full Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ $item->name }}">
                                </div>
                                <div class="col">
                                    <label for="name">Type of Donation</label>
                                    <select class="form-select" style="margin-bottom: 20px;" name="donateType">
                                        <option selected hidden></option>
                                        <option value="Monetary" selected="">Monetary</option>
                                        <option value="In Kind">In Kind</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-2">
                            <label for="donation">Donation</label>
                            <textarea class="form-control" id="donation" name="donation">{{ $item->donation }}</textarea>
                        </div>

                        <div class="mb-2">
                            <div class="row">
                                <div class="col">
                                    <label for="amount">Quantity</label>
                                    <input type="text" class="form-control" id="amount" name="quantity"
                                    value="{{ $item->quantity }}">
                                </div>
                                <div class="col">
                                    <label for="amount">Amount</label>
                                    <input type="text" class="form-control" id="amount" name="amount"
                                    value="{{ $item->amount }}">
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" id="date" name="date" value="{{ $item->date }}">
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
