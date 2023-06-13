@extends('layouts.admin')

@section('content')
<!-- Page Title -->
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
                    <h5 class="card-title">Portfolio List</h5>
                    <div class="text-end mb-3">
                        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#addPortfolioModal"><i class="bi bi-plus-lg"></i> Add Portfolio</button>
                    </div>

                    <!-- Add Portfolio Modal -->
                    <div class="modal fade" id="addPortfolioModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addPortfolioModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="addPortfolioModalLabel">Portfolio Detail</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="/admin/portfolios" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row px-4 py-3">
                                            <div class="col-12 mb-3">
                                                <label for="name" class="form-label fw-bold">Project Name</label>
                                                <input type="text" name="name" class="form-control" id="name" placeholder="e.g ">
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label for="add_portfolio_image" class="form-label fw-bold">Project Image</label>
                                                <img id="add_imagepreview">
                                                <input type="file" name="portfolio_image" class="form-control mt-2" id="add_portfolio_image" onchange="imagePreview('add_portfolio_image', 'add_imagepreview')">
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label for="category" class="form-label fw-bold">Category</label>
                                                <input type="text" name="category" class="form-control" id="category" placeholder="e.g 2002, 2006, 2010, 2014, Sekarang">
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label for="client_project" class="form-label fw-bold">Client <small class="fw-normal">(optional)</small class="fw-normal"></label>
                                                <input type="text" name="client_project" class="form-control" id="client_project" placeholder="e.g 2002, 2006, 2010, 2014, Sekarang">
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label for="project_date" class="form-label fw-bold">Project date</label>
                                                <input type="date" name="project_date" class="form-control" id="project_date">
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label for="project_url" class="form-label fw-bold">Project URL <small class="fw-normal">(optional)</small></label>
                                                <input type="text" name="project_url" class="form-control" id="project_url" placeholder="e.g www.example.com">
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label for="description" class="form-label fw-bold">Description</label>
                                                <textarea type="text" name="description" class="form-control" id="description" placeholder="Tell something about this project"></textarea>
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

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Project Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($portfolios as $portfolio)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $portfolio->name }}</td>
                                <td>{{ $portfolio->category }}</td>
                                <td>{{ $portfolio->project_date }}</td>
                                <td>
                                    <form class="d-inline" action="/admin/portfolios/{{ $portfolio->id }}" method="POST" onsubmit="return confirmSubmit(this, '{{ $portfolio->name }}')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                    </form>
                                    <span> | </span>
                                    <!-- Button trigger Portfolio Detail Modal -->
                                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#portfolioModal-{{ $portfolio->id }}">Detail >>></button>
                                </td>
                            </tr>
                        </tr>
                        <!-- Portfolio Detail Modal -->
                        <div class="modal fade" id="portfolioModal-{{ $portfolio->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="portfolioModal-{{ $portfolio->id }}_Label" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="portfolioModal-{{ $portfolio->id }}_Label">Portfolio Detail</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="/admin/portfolios/{{ $portfolio->id }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="row px-4 py-3">
                                                <div class="col-12 mb-3">
                                                    <label for="name" class="form-label fw-bold">Project Name</label>
                                                    <input type="text" name="name" class="form-control" id="name" placeholder="e.g " value="{{ old('name', $portfolio->name) }}">
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <label for="portfolioImage_input-{{ $portfolio->id }}" class="form-label fw-bold">Project Image</label>
                                                    <label for="portfolioImage_input-{{ $portfolio->id }}" class="d-block"><img id="portfolioImage_preview-{{ $portfolio->id }}" src="{{ asset('storage/'.$portfolio->portfolio_image); }}" alt="Portfolio Image" style="height: 200px"></label>
                                                    <input type="file" name="portfolio_image" class="form-control mt-2" id="portfolioImage_input-{{ $portfolio->id }}" onchange="imagePreview('portfolioImage_input-{{ $portfolio->id }}', 'portfolioImage_preview-{{ $portfolio->id }}')">
                                                    <input type="hidden" name="old_image" value="{{ $portfolio->portfolio_image }}">
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <label for="category" class="form-label fw-bold">Category</label>
                                                    <input type="text" name="category" class="form-control" id="category" placeholder="e.g 2002, 2006, 2010, 2014, Sekarang" value="{{ old('category', $portfolio->category) }}">
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <label for="client_project" class="form-label fw-bold">Client <small class="fw-normal">(optional)</small class="fw-normal"></label>
                                                    <input type="text" name="client_project" class="form-control" id="client_project" placeholder="e.g 2002, 2006, 2010, 2014, Sekarang" value="{{ old('client_project', $portfolio->client_project) }}">
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <label for="project_date" class="form-label fw-bold">Project date</label>
                                                    <input type="date" name="project_date" class="form-control" id="project_date" value="{{ old('project_date', Carbon\Carbon::parse($portfolio->project_date)->format('Y-m-d')) }}">
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <label for="project_url" class="form-label fw-bold">Project URL <small class="fw-normal">(optional)</small></label>
                                                    <input type="text" name="project_url" class="form-control" id="project_url" placeholder="e.g www.example.com" value="{{ old('project_url', $portfolio->project_url) }}">
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <label for="description" class="form-label fw-bold">Description</label>
                                                    <textarea type="text" name="description" class="form-control" id="description" placeholder="Tell something about this project">{{ old('description', $portfolio->description) }}</textarea>
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
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
</section>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>
    
// Sweetalert 2
<script src="{{ asset('/assets/js/sweetalert2.js') }}"></script>
<script src="{{ asset('/assets/js/image-preview.js') }}"></script>
@endsection