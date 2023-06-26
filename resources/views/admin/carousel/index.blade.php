@extends('layouts.admin')

@section('content')
<div class="pagetitle">
    <h1>Portfolio</h1>
    <nav class="d-flex justify-content-end">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item active">Portfolio</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Carousel List</h5>

                    <!-- Add Carousel trigger Modal -->
                    <div class="text-end mb-3">
                        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#addCarouselModel"><i class="bi bi-plus-lg"></i> Add Carousel</button>
                    </div>

                    <!-- Add Portfolio Modal -->
                    <div class="modal fade" id="addCarouselModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addCarouselModelLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="addCarouselModelLabel">Add Carousel</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="/admin/carousels" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row px-4 py-3">
                                            <div class="col-12 mb-3">
                                                <label for="add_carousel_image" class="form-label fw-bold">Carousel Image</label>
                                                <img id="add_imagepreview">
                                                <input type="file" name="image_url" class="form-control mt-2" id="add_carousel_image" onchange="imagePreview('add_carousel_image', 'add_imagepreview')">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save Change</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @elseif (session()->has('deleted'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            {{ session('deleted') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="row g-3">
                        @foreach ($carousels as $carousel)
                        <div class="col-12 col-sm-6 col-lg-3">
                            <button type="button" class="p-0" data-bs-toggle="modal" data-bs-target="#carouselModal-{{ $carousel->id }}" style="border: none; width: 100%; height: 180px;">
                                <img src="{{ asset('storage/'.$carousel->image_url) }}" alt="Carousel Image" style="width: 100%; height: 180px; object-fit: cover">
                            </button>
                        </div>
                        <!-- Portfolio Detail Modal -->
                        <div class="modal fade" id="carouselModal-{{ $carousel->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="carouselModal-{{ $carousel->id }}_Label" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="carouselModal-{{ $carousel->id }}_Label">Portfolio Detail</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row px-4 py-3">
                                            <div class="col-12 mb-3">
                                                <label for="portfolioImage_input-{{ $carousel->id }}" class="form-label fw-bold">Project Image</label>
                                                <label for="portfolioImage_input-{{ $carousel->id }}" class="d-block"><img id="portfolioImage_preview-{{ $carousel->id }}" src="{{ asset('storage/'.$carousel->image_url); }}" alt="Portfolio Image" style="height: 200px"></label>
                                                <input type="file" name="portfolio_image" class="form-control mt-2" id="portfolioImage_input-{{ $carousel->id }}" onchange="imagePreview('portfolioImage_input-{{ $carousel->id }}', 'portfolioImage_preview-{{ $carousel->id }}')">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="/admin/carousels/{{ $carousel->id }}" method="POST" enctype="multipart/form-data"  onsubmit="return confirmSubmit(this, 'image')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
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