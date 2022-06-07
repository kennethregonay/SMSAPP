{{-- Add Donation --}}
<div class="modal" id="addDonation">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Add Donation</h2>
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ url('brigada/create') }}" method="POST">
                    @csrf
                    <div class="mb-2">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Full Name" required>
                    </div>

                    <div class="mb-2">
                        <label for="donation">Donation</label>
                        <textarea class="form-control"id="donation" name="donation"
                        placeholder="Enter Donation" required></textarea>
                
                    </div>

                    <div class="mb-2">
                        <label for="amount">Amount</label>
                        <input type="text" class="form-control" id="amount" name="amount" placeholder="Enter Amount">
                    </div>

                    <div class="mb-2">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-success" type="submit">Add Donation</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
