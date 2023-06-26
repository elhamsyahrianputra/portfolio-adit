@extends('layouts.admin')

@section('content')
<!-- Page Title -->
<div class="pagetitle">
    <h1>Video</h1>
    <nav class="d-flex justify-content-end">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/admin/videos">Videos</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row justify-content-center">
        <div class="col-lg-11">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Create Video</h5>

                    <form action="/admin/videos" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12 mb-3">
                            <label for="videoImage_Preview" class="form-label fw-semibold">Video Cover</label>
                            <img id="img_preview">
                            <input type="file" name="cover_url" class="form-control mt-2 mb-3 @error('cover_url') is-invalid @enderror" id="videoImage_Preview" onchange="imagePreview('videoImage_Preview', 'img_preview')">
                            @error('cover_url')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
    
                        <div class="col-12 mb-3">
                            <label for="title" class="form-label fw-semibold">Title</label>
                            <input type="text" name="title" class="form-control mb-3 @error('title') is-invalid @enderror"
                                id="title" value="{{ old('title') }}">
                            @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
    
                        <div class="col-12 mb-3">
                            <label for="author" class="form-label fw-semibold">Author</label>
                            <input type="text" name="author" class="form-control mb-3 @error('author') is-invalid @enderror"
                                id="author" value="{{ old('author') }}">
                            @error('author')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-12 mb-3">
                            <label for="video_url" class="form-label fw-semibold">Video File</label>
                            <input type="file" name="video_url" class="form-control mt-2 mb-3 @error('video_url') is-invalid @enderror" id="video_url">
                            @error('video_url')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
    
                        <div class="col-12 mb-3">
                            <label for="text_body" class="form-label fw-semibold mb-2">Text Body</label>
                            <!-- TinyMCE Editor -->
                            <textarea id="text_body" class="tinymce-editor @error('text') is-invalid @enderror" name="text">
                                {{ old('text') }}
                            </textarea><!-- End TinyMCE Editor -->
                            @error('text')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <hr>

                        <div class="col-12 d-flex justify-content-end mb-3 mt-4">
                            <button type="submit" class="btn btn-primary">Save Video</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<!-- TinuMCE -->
<script src="{{ asset('dashboard/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('dashboard/js/main.js ') }}"></script>

<!-- Image Preview -->
<script src="{{ asset('assets/js/image-preview.js') }}"></script>
@endsection