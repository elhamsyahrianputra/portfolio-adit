@extends('layouts.admin')

@section('content')
<!-- Page Title -->
<div class="pagetitle">
    <h1>Video</h1>
    <nav class="d-flex justify-content-end">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/admin/videos">Videos</a></li>
            <li class="breadcrumb-item active">{{ $video->title }}</li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row justify-content-center">
        <div class="col-lg-11">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Video</h5>

                    <form action="/admin/videos/{{ $video->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-12 mb-3">
                            <label for="videoImage_Preview" class="form-label fw-semibold">Video Cover</label>
                            <img src="{{ asset('storage/'.$video->cover_url) }}" id="img_preview" class="d-block" style="max-height: 250px">
                            <input type="hidden" name="old_image" value="{{ $video->cover_url }}">
                            <input type="file" name="cover_url" class="form-control mt-2 mb-3 @error('video_image') is-invalid @enderror" id="videoImage_Preview" onchange="imagePreview('videoImage_Preview', 'img_preview')">
                            @error('video_image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
    
                        <div class="col-12 mb-3">
                            <label for="title" class="form-label fw-semibold">Title</label>
                            <input type="text" name="title" class="form-control mb-3 @error('title') is-invalid @enderror"
                                id="title" value="{{ old('title', $video->title) }}">
                            @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
    
                        <div class="col-12 mb-3">
                            <label for="author" class="form-label fw-semibold">Author</label>
                            <input type="text" name="author" class="form-control mb-3 @error('author') is-invalid @enderror"
                                id="author" value="{{ old('author', $video->author) }}">
                            @error('author')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-12 mb-3">
                            <label for="video_url" class="form-label fw-semibold">Video File</label>
                            <a class="btn btn-sm btn-info d-block" href="{{ asset('storage/'.$video->video_url) }}" target="_blank">Old Video Preview</a>
                            <input type="hidden" name="old_video" value="{{ $video->video_url }}">
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
                                 {{ old('text', $video->text) }}
                            </textarea><!-- End TinyMCE Editor -->
                            @error('text')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <hr>

                        <div class="col-12 d-flex justify-content-end mb-3 mt-4">
                            <button type="submit" class="btn btn-primary">Save Change</button>
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