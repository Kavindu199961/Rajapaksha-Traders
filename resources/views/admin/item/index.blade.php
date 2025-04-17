@extends('layouts.admin')

@section('title', 'Items')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Items</h2>
            <a href="{{ route('items.create') }}" class="btn btn-success shadow-sm">
                <i class="fas fa-plus-circle me-1"></i> Add Item
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle border shadow rounded">
                <thead class="table-dark">
                    <tr>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Regular Price (LKR)</th>
                        <th>Real Price (LKR)</th>
                        <th>Image</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->category->name }}</td>
                            <td><span class="text-muted">{{ number_format($item->regular_price, 2) }}</span></td>
                            <td><strong class="text-success">{{ number_format($item->real_price, 2) }}</strong></td>
                            <td>
                                @if ($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="Image" class="img-thumbnail" width="60">
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('items.edit', $item) }}" class="btn btn-sm btn-warning me-1">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('items.destroy', $item) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this item?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">No items found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
