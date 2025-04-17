@extends('layouts.admin')

@section('title', 'Manage Our Story')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Our Story</h6>
                    <a href="{{ route('story.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Add New
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Last Updated</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($stories as $story)
                                <tr>
                                    <td>
                                        @if($story->image)
                                        <img src="{{ asset('storage/'.$story->image) }}" alt="{{ $story->title }}" width="80">
                                        @else
                                        <span class="text-muted">No Image</span>
                                        @endif
                                    </td>
                                    <td>{{ $story->title }}</td>
                                    <td>
                                        <span class="badge badge-{{ $story->is_active ? 'success' : 'danger' }}">
                                            {{ $story->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td>{{ $story->updated_at->format('M d, Y') }}</td>
                                    <td>
                                        <a href="{{ route('story.edit', $story->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('story.destroy', $story->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>
@endsection