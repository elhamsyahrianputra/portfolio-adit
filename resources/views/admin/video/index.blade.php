@extends('layouts.admin')

@section('content')
<!-- Page Title -->
<div class="pagetitle">
    <h1>Video</h1>
    <nav class="d-flex justify-content-end">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item active">Video</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Video List</h5>
                    <div class="text-end mb-3">
                        <a href="/admin/videos/create" class="btn btn-sm btn-success"><i class="bi bi-plus-lg"></i> Add Video</a>
                    </div>

                    @if (session()->has('createVideo'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('createVideo') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @elseif (session()->has('updateVideo'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('updateVideo') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @elseif (session()->has('deleteVideo'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            {{ session('deleteVideo') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Author</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($videos as $video)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $video->title }}</td>
                                <td>{{ $video->author }}</td>
                                <td>
                                    <a href="/admin/videos/{{ $video->id }}/edit" class="btn btn-sm btn-outline-warning"><i class="bi bi-pencil-square"></i></a>
                                    <form class="d-inline" action="/admin/videos/{{ $video->id }}" method="POST"
                                        onsubmit="return confirmSubmit(this, '{{ $video->title }}')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger"><i
                                                class="bi bi-trash"></i></button>
                                    </form>
                                    <span> | </span>
                                    <!-- Button trigger Portfolio Detail Modal -->
                                    <a href="/admin/videos/{{ $video->id }}" class="btn btn-sm btn-outline-primary" >Detail >>></a>
                                </td>
                            </tr>
                            </tr>
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