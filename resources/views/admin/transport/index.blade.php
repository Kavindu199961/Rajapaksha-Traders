@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary">🚚 Transport Bookings</h2>
        <span class="text-muted">Manage all transport requests</span>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle text-center">
                    <thead class="table-primary">
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Required Date</th>
                            <th>Duration</th>
                            <th>Goods Type</th>
                            <th>Details</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bookings as $booking)
                        <tr @if($booking->completed) class="table-light" style="opacity: 0.75;" @endif>
                            <td class="fw-semibold">{{ $booking->name }}</td>
                            <td>{{ $booking->phone }}</td>
                            <td>{{ \Carbon\Carbon::parse($booking->required_date)->format('M d, Y') }}</td>
                            <td><span class="badge bg-info">{{ $booking->duration }} day(s)</span></td>
                            <td>{{ $booking->goods_type }}</td>
                            <td>
                                <span data-bs-toggle="tooltip" title="{{ $booking->additional_details }}">
                                    {{ Str::limit($booking->additional_details, 25) }}
                                </span>
                            </td>
                            <td>
                                @if($booking->completed)
                                    <span class="badge rounded-pill bg-success">✔ Completed</span>
                                @else
                                    <span class="badge rounded-pill bg-warning text-dark">⏳ Pending</span>
                                @endif
                            </td>
                            <td>
                                @if(!$booking->completed)
                                    <form action="{{ route('transport.complete', $booking->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-success" data-bs-toggle="tooltip" title="Mark as complete">
                                            <i class="fas fa-check-circle"></i>
                                        </button>
                                    </form>
                                @endif
                                <form action="{{ route('transport.destroy', $booking->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" data-bs-toggle="tooltip" title="Delete booking">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-muted py-4">
                                <i class="fas fa-info-circle me-2"></i> No bookings available at the moment.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Optional: Bootstrap Tooltip Initialization -->
@push('scripts')
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    tooltipTriggerList.forEach(function (tooltipTriggerEl) {
        new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
@endpush
@endsection
