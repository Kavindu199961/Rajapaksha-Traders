@extends('layouts.admin')

@section('title', 'Edit Story')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Story</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('story.update', $story->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $story->title }}" required>
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control summernote" id="content" name="content" rows="5" required>{{ $story->content }}</textarea>
                        </div>
                        
                        <!-- Featured Image with Preview -->
                        <div class="form-group">
                            <label for="image">Featured Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image" accept="image/*">
                                <label class="custom-file-label" for="image">Choose new featured image...</label>
                            </div>
                            <small class="text-muted">Leave blank to keep current image (max 2MB)</small>
                            
                            @if($story->image)
                            <div class="featured-preview mt-3">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('storage/'.$story->image) }}" alt="Current featured image" class="img-thumbnail mr-3" style="max-height: 150px;">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="remove_image" name="remove_image" value="1">
                                        <label class="form-check-label" for="remove_image">
                                            Remove current image
                                        </label>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="new-featured-preview mt-2">
                                <img id="featuredPreview" src="#" alt="New featured image preview" class="img-thumbnail d-none" style="max-height: 150px;">
                            </div>
                        </div>
                        
                        <!-- Gallery Images Section -->
                        <div class="form-group">
                            <label>Gallery Images</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="gallery_images" name="gallery_images[]" multiple accept="image/*">
                                <label class="custom-file-label" for="gallery_images">Add more gallery images...</label>
                            </div>
                            <small class="text-muted">Add additional images to the gallery (max 2MB each)</small>
                            
                            <!-- Existing Gallery Images -->
                            @if($story->galleries->count() > 0)
                            <div class="existing-gallery mt-3">
                                <h6>Current Gallery Images</h6>
                                <div class="row">
                                    @foreach($story->galleries as $gallery)
                                    <div class="col-md-3 mb-3">
                                        <div class="card">
                                            <img src="{{ asset('storage/'.$gallery->image_path) }}" class="card-img-top" alt="Gallery image">
                                            <div class="card-body p-2 text-center">
                                                <button type="button" class="btn btn-danger btn-sm delete-gallery-image" 
                                                    data-id="{{ $gallery->id }}" data-url="{{ route('story.destroyGalleryImage', $gallery->id) }}">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                            
                            <!-- New Gallery Images Preview -->
                            <div class="gallery-preview mt-3">
                                <h6>New Gallery Images Preview</h6>
                                <div class="row" id="galleryPreview"></div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ $story->is_active ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">
                                    Active
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('story.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(document).ready(function() {
        // Initialize Summernote
        $('.summernote').summernote({
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
        
        // Featured Image Preview
        $('#image').on('change', function() {
            const file = this.files[0];
            const preview = $('#featuredPreview');
            
            if (file) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    preview.attr('src', e.target.result);
                    preview.removeClass('d-none');
                }
                
                reader.readAsDataURL(file);
                $(this).next('.custom-file-label').html(file.name);
            } else {
                preview.addClass('d-none');
                $(this).next('.custom-file-label').html('Choose new featured image...');
            }
        });
        
        // Gallery Images Preview
        $('#gallery_images').on('change', function() {
            const files = this.files;
            const previewContainer = $('#galleryPreview');
            
            previewContainer.empty();
            
            if (files.length > 0) {
                $(this).next('.custom-file-label').html(`${files.length} files selected`);
                
                for (let i = 0; i < files.length; i++) {
                    const reader = new FileReader();
                    
                    reader.onload = function(e) {
                        previewContainer.append(`
                            <div class="col-md-3 mb-3">
                                <div class="card">
                                    <img src="${e.target.result}" class="card-img-top" alt="Preview">
                                    <div class="card-body p-2">
                                        <small class="text-muted">${files[i].name}</small>
                                    </div>
                                </div>
                            </div>
                        `);
                    }
                    
                    reader.readAsDataURL(files[i]);
                }
            } else {
                $(this).next('.custom-file-label').html('Add more gallery images...');
            }
        });
        
        // Delete Gallery Image Confirmation
        $('.delete-gallery-image').on('click', function() {
            if (confirm('Are you sure you want to delete this gallery image?')) {
                const button = $(this);
                const url = button.data('url');
                
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            button.closest('.col-md-3').remove();
                            // Show success message
                            alert('Image deleted successfully');
                        }
                    },
                    error: function(xhr) {
                        alert('Error deleting image');
                    }
                });
            }
        });
        
        // Reset file input labels when form is reset
        $('form').on('reset', function() {
            $('.custom-file-label').html('Choose file...');
            $('#featuredPreview').addClass('d-none');
            $('#galleryPreview').empty();
        });
    });
</script>
@endsection