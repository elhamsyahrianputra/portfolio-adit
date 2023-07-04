@extends('layouts.admin')

@section('content')
<div class="pagetitle">
    <h1>Skill</h1>
    <nav class="d-flex justify-content-end">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item active">Skill</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Skill List</h5>

                    <!-- Add Carousel trigger Modal -->
                    <div class="text-end mb-3">
                        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                            data-bs-target="#addSkillModal"><i class="bi bi-plus-lg"></i> Add Skill</button>
                    </div>

                    <!-- Add Portfolio Modal -->
                    <div class="modal fade" id="addSkillModal" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="addSkillModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="addSkillModalLabel">Add Skill</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="/admin/skills" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row px-4 py-3">
                                            <div class="col-12 mb-3">
                                                <label for="name" class="form-label fw-bold">Skill Name</label>
                                                <input type="text" name="name" class="form-control mt-2" id="name" value="{{ old('name') }}" placeholder="e.g Menulis, Membaca, Design">
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label for="icon" class="form-label fw-bold">Icon</label>
                                                <input type="text" name="icon" class="form-control mt-2" id="icon" value="{{ old('icon') }}" placeholder='e.g "bi bi-pencil", "bi bi-book"'>
                                                <span style="font-size: 0.8rem">To see name icon, visit <a href="https://icons.getbootstrap.com" target="_blank">Bootstrap Icon</a></span>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label for="description" class="form-label fw-bold">Description</label>
                                                <textarea name="description" class="form-control" id="description" rows="5" placeholder="Tell something about this skill">{{ old('description') }}</textarea>
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

                    @if (session()->has('createSkill'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('createSkill') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @elseif (session()->has('updateSkill'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('updateSkill') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @elseif (session()->has('deleteSkill'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ session('deleteSkill') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <div class="row g-3">
                        @foreach ($skills as $skill)

                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card border">
                                <div class="card-body pt-3">
                                    <div class="row align-items-center">
                                        <div class="col-3 text-center">
                                            <span class="fw-bold fs-2 {{ $skill->icon }}"></span>
                                        </div>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="row">
                                                    <div class="col">
                                                        <span class="fw-bold fs-5 text-capitalize">{{ $skill->name }}</span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div>
                                                            {{ $skill->description }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-3 text-end">
                                        <form action="/admin/skills/{{ $skill->id }}" method="POST" class="d-inline-block" onsubmit="return confirmSubmit(this, '{{ $skill->name }}')">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class=" bi bi-trash"></i>
                                            </button>
                                        </form>
                                        <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                        data-bs-target="#skillModal-{{ $skill->id }}">Detail >>></button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Portfolio Detail Modal -->
                        <div class="modal fade" id="skillModal-{{ $skill->id }}" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1"
                            aria-labelledby="skillModal-{{ $skill->id }}_Label" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="skillModal-{{ $skill->id }}_Label">Portfolio
                                            Detail</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="/admin/skills/{{ $skill->id }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="row px-4 py-3">
                                                <div class="col-12 mb-3">
                                                    <div class="col-12 mb-3">
                                                        <label for="name" class="form-label fw-bold">Skill Name</label>
                                                        <input type="text" name="name" class="form-control mt-2" id="name" value="{{ old('name', $skill->name) }}" placeholder="e.g Menulis, Membaca, Design">
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <label for="icon" class="form-label fw-bold">Icon</label>
                                                        <input type="text" name="icon" class="form-control mt-2" id="icon" value="{{ old('icon', $skill->icon) }}" placeholder='e.g "bi bi-pencil", "bi bi-book"'>
                                                        <span style="font-size: 0.8rem">To see name icon, visit <a href="https://icons.getbootstrap.com">Bootstrap Icon</a></span>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <label for="description" class="form-label fw-bold">Description</label>
                                                        <textarea name="description" class="form-control" id="description" rows="5" placeholder="Tell something about this skill">{{ old('description', $skill->description) }}</textarea>
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