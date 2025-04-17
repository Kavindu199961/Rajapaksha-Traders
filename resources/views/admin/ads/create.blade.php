@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow rounded-4">
                <div class="card-header bg-primary text-white rounded-top-4">
                    <h4 class="mb-0">Create New Ad</h4>
                </div>

                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                        </div>
                    @endif

                    <form action="{{ route('ads.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Ad Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter ad title" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Ad Image</label>
                            <input type="file" name="image" class="form-control" accept="image/*" onchange="previewImage(event)" required>
                        </div>

                        <div class="mb-3 text-center">
                            <img id="image-preview" src="#" alt="Image Preview" class="img-fluid rounded shadow-sm d-none" style="max-height: 300px;">
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Create Ad</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<!-- Image Preview Script -->
<script>
    function previewImage(event) {
        const preview = document.getElementById('image-preview');
        const file = event.target.files[0];
        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.classList.remove('d-none');
        }
    }
</script>
@endsection
