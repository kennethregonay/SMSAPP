
<div class="modal" id="brigada_history">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Brigada Activity Log</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="max-height: 200px; overflow:auto;">
                <table class="table table-resposive table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Date | Time</th>
                            <th>User</th>
                            <th>Changes</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $logs as $history )
                            <tr>
                            <td>{{ $history->date }} | {{ $history->time }}</td>
                            <td>{{ $history->actor }} </td>
                            <td>{{ $history->changes }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
