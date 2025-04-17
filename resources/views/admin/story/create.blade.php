@extends('layouts.admin')

@section('title', 'Create Story')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Create New Story</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('story.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control summernote" id="content" name="content" rows="5" required></textarea>
                        </div>
                        
                        <!-- Featured Image with Preview -->
                        <div class="form-group">
                            <label for="image">Featured Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image" accept="image/*">
                                <label class="custom-file-label" for="image">Choose featured image...</label>
                            </div>
                            <small class="text-muted">Main image for the story (optional, max 2MB)</small>
                            <div class="featured-preview mt-3">
                                <img id="featuredPreview" src="#" alt="Featured image preview" class="img-fluid d-none" style="max-height: 200px;">
                            </div>
                        </div>
                        
                        <!-- Gallery Images with Preview -->
                        <div class="form-group">
                            <label for="gallery_images">Gallery Images</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="gallery_images" name="gallery_images[]" multiple accept="image/*">
                                <label class="custom-file-label" for="gallery_images">Choose multiple images...</label>
                            </div>
                            <small class="text-muted">You can select multiple images for the gallery (optional, max 2MB each)</small>
                            
                            <!-- Gallery Preview Container -->
                            <div class="gallery-preview mt-3">
                                <div class="row" id="galleryPreview"></div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" checked>
                                <label class="form-check-label" for="is_active">
                                    Active
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
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
                $(this).next('.custom-file-label').html('Choose featured image...');
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
                $(this).next('.custom-file-label').html('Choose multiple images...');
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