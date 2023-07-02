@extends('layouts.admin')

@section('content')
<div class="pagetitle">
    <h1>Collaboration</h1>
    <nav class="d-flex justify-content-end">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item active">Collaboration</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Collaboration List</h5>

                    <!-- Add Carousel trigger Modal -->
                    <div class="text-end mb-3">
                        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                            data-bs-target="#addCollaborationModal"><i class="bi bi-plus-lg"></i> Add
                            Collaboration</button>
                    </div>

                    <!-- Add Collaboration Modal -->
                    <div class="modal fade" id="addCollaborationModal" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="addCollaborationModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="addCollaborationModalLabel">Add Collaboration</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="/admin/collaborations" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row px-4 py-3">
                                            <div class="col-12 mb-3">
                                                <label for="name" class="form-label fw-bold">Name</label>
                                                <input type="text" name="name" class="form-control mt-2 @error('name') is-invalid @enderror" id="name"
                                                    value="{{ old('name') }}"
                                                    placeholder="Enter the collaboration name">
                                                @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label for="url" class="form-label fw-bold">URL</label>
                                                <input type="text" name="url" class="form-control mt-2 @error('url') is-invalid @enderror" id="icon"
                                                    value="{{ old('icon') }}"
                                                    placeholder='e.g "https://www.example.com"'>
                                                @error('text')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label for="add-collaboration-image" class="form-label fw-bold">Collaboration Image</label>
                                                <img id="collaboration-image_Preview" class="mb-3" >
                                                <input type="file" name="image_url" class="form-control mt-2 @error('image_url') is-invalid @enderror" id="add-collaboration-image" onchange="imagePreview('add-collaboration-image', 'collaboration-image_Preview')">
                                                @error('image_url')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save Change</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    @if (session()->has('createCollaboration'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('createCollaboration') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @elseif (session()->has('updateCollaboration'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('updateCollaboration') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @elseif (session()->has('deleteCollaboration'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ session('deleteCollaboration') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <div class="row g-3">
                        @foreach ($collaborations as $collaboration)

                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card border">
                                <div class="card-body pt-3">
                                    <div class="row">
                                        <div class="col">
                                            <span class="fw-semibold fs-5">{{ $collaboration->name }}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <img class="img-fluid"
                                                src="{{ asset('storage/'.$collaboration->image_url) }}"
                                                alt="{{ $collaboration->name }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mt-3 text-end">
                                                <form action="/admin/collaborations/{{ $collaboration->id }}"
                                                    method="POST" class="d-inline-block"
                                                    onsubmit="return confirmSubmit(this, '{{ $collaboration->name }}')">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class=" bi bi-trash"></i>
                                                    </button>
                                                </form>
                                                <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#collaborationModal-{{ $collaboration->id }}">
                                                    Detail >>>
                                                </button>
                                                <a href="{{ $collaboration->url }}" target="_blank" class="btn btn-sm btn-outline-warning">Visit >>></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Collaboration Detail Modal -->
                        <div class="modal fade" id="collaborationModal-{{ $collaboration->id }}"
                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                            aria-labelledby="collaborationModal-{{ $collaboration->id }}_Label" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5"
                                            id="collaborationModal-{{ $collaboration->id }}_Label">Collaboration
                                            Detail</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="/admin/collaborations/{{ $collaboration->id }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="row px-4 py-3">
                                                <div class="col-12 mb-3">
                                                    <div class="col-12 mb-3">
                                                        <label for="name" class="form-label fw-bold">Name</label>
                                                        <input type="text" name="name" class="form-control mt-2 @error('name') is-invalid @enderror" id="name"
                                                            value="{{ old('name', $collaboration->name) }}"
                                                            placeholder="Enter the collaboration name">
                                                            @error('record')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <label for="icon" class="form-label fw-bold">URL</label>
                                                        <input type="text" name="url" class="form-control mt-2 @error('url') is-invalid @enderror" id="icon"
                                                            value="{{ old('icon', $collaboration->url) }}"
                                                            placeholder='e.g "https://www.example.com"'>
                                                            @error('record')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <label for="collaboration-image-{{ $collaboration->id }}" class="form-label fw-bold">Collaboration Image</label>
                                                        <img id="collaboration-image_Preview-{{ $collaboration->id }}" src="{{ asset('storage/'.$collaboration->image_url) }}" class="mb-3 d-block" style="max-height: 400px; max-width:250px">
                                                        <input type="file" name="image_url" class="form-control @error('image_url') is-invalid @enderror" id="collaboration-image-{{ $collaboration->id }}" onchange="imagePreview('collaboration-image-{{ $collaboration->id }}', 'collaboration-image_Preview-{{ $collaboration->id }}')">
                                                        <input type="hidden" name="old_image" value="{{ $collaboration->image_url }}">
                                                        @error('record')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Save Change</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
@endsection

@section('script')
// Image Preview
<script src="{{ asset('assets/js/image-preview.js') }}"></script>

// Sweet Alert2
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>
<script src="{{ asset('assets/js/sweetalert2.js') }}"></script>
@endsection