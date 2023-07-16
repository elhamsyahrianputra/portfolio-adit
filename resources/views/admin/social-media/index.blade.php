@extends('layouts.admin')

@section('content')
<div class="pagetitle">
    <h1>Social Media</h1>
    <nav class="d-flex justify-content-end">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item active">Social Media</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Social Media List</h5>

                    <!-- Add Carousel trigger Modal -->
                    <div class="text-end mb-3">
                        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                            data-bs-target="#addSocialMediaModal"><i class="bi bi-plus-lg"></i> Add
                            Social Media</button>
                    </div>

                    <!-- Add SocialMedia Modal -->
                    <div class="modal fade" id="addSocialMediaModal" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="addSocialMediaModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="addSocialMediaModalLabel">Add Social Media</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="/admin/socialmedia" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row px-4 py-3">
                                            <div class="col-12 mb-3">
                                                <label for="name" class="form-label fw-bold">Name</label>
                                                <input type="text" name="name" class="form-control mt-2 @error('name') is-invalid @enderror" id="name"
                                                    value="{{ old('name') }}"
                                                    placeholder="Enter the socialMedia name">
                                                    @error('record')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label for="url" class="form-label fw-bold">URL</label>
                                                <input type="text" name="url" class="form-control mt-2 @error('url') is-invalid @enderror" id="url"
                                                    value="{{ old('url') }}"
                                                    placeholder='e.g "https://www.example.com"'>
                                                    @error('record')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label for="icon" class="form-label fw-bold">Icon</label>
                                                <input type="text" name="icon" class="form-control mt-2" id="icon" value="{{ old('icon') }}" placeholder='e.g "bi bi-pencil", "bi bi-book"'>
                                                <span style="font-size: 0.8rem">To see name icon, visit <a href="https://icons.getbootstrap.com">Bootstrap Icon</a></span>
                                                @error('record')
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

                    @if (session()->has('createSocialMedia'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('createSocialMedia') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @elseif (session()->has('updateSocialMedia'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('updateSocialMedia') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @elseif (session()->has('deleteSocialMedia'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ session('deleteSocialMedia') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <div class="row g-3">
                        @foreach ($socialmedias as $socialmedia)

                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card border">
                                <div class="card-body pt-3">
                                    <div class="row">
                                        <div class="col">
                                            <span class="fw-semibold fs-5">{{ $socialmedia->name }}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-center">
                                            <i class="{{ $socialmedia->icon }}" style="font-size: 120px"></i>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mt-3 text-end">
                                                <form action="/admin/socialmedia/{{ $socialmedia->id }}"
                                                    method="POST" class="d-inline-block"
                                                    onsubmit="return confirmSubmit(this, '{{ $socialmedia->name }}')">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class=" bi bi-trash"></i>
                                                    </button>
                                                </form>
                                                <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#socialMediaModal-{{ $socialmedia->id }}">
                                                    Detail >>>
                                                </button>
                                                <a href="{{ $socialmedia->url }}" target="_blank" class="btn btn-sm btn-outline-warning">Visit >>></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- SocialMedia Detail Modal -->
                        <div class="modal fade" id="socialMediaModal-{{ $socialmedia->id }}"
                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                            aria-labelledby="socialMediaModal-{{ $socialmedia->id }}_Label" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5"
                                            id="socialMediaModal-{{ $socialmedia->id }}_Label">Social Media
                                            Detail</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="/admin/socialmedia/{{ $socialmedia->id }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="row px-4 py-3">
                                                <div class="col-12 mb-3">
                                                    <div class="col-12 mb-3">
                                                        <label for="name" class="form-label fw-bold">Name</label>
                                                        <input type="text" name="name" class="form-control mt-2 @error('name') is-invalid @enderror" id="name"
                                                            value="{{ old('name', $socialmedia->name) }}"
                                                            placeholder="Enter the socialMedia name">
                                                            @error('record')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <label for="url" class="form-label fw-bold">URL</label>
                                                        <input type="text" name="url" class="form-control mt-2 @error('url') is-invalid @enderror" id="url"
                                                            value="{{ old('url', $socialmedia->url) }}"
                                                            placeholder='e.g "https://www.example.com"'>
                                                            @error('record')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <label for="icon" class="form-label fw-bold">Icon</label>
                                                        <input type="text" name="icon" class="form-control mt-2" id="icon" value="{{ old('icon', $socialmedia->icon) }}" placeholder='e.g "bi bi-pencil", "bi bi-book"'>
                                                        <span style="font-size: 0.8rem">To see name icon, visit <a href="https://icons.getbootstrap.com">Bootstrap Icon</a></span>
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
// Sweet Alert2
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>
<script src="{{ asset('assets/js/sweetalert2.js') }}"></script>
@endsection