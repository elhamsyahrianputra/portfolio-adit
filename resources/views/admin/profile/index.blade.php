@extends('layouts.admin')

@section('style')
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="pagetitle">
    <h1>Profile</h1>
    <nav>
        <ol class="breadcrumb d-flex justify-content-end">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item active">Profile</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section profile">
    <div class="row">
        <div class="col-xl-4">

            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                    <img src="{{ asset('storage/'.$profile->profile_image) }}" alt="Profile" class="rounded-circle"  style="object-fit: cover; height: 120px; width: 120px;">
                    <h2 class="text-center">{{ $profile->name }}</h2>
                    <h3 class="text-center fs-6">{{ $profile->description }}</h3>
                </div>
            </div>

        </div>

        <div class="col-xl-8">

            <div class="card px-4">
                <div class="card-body pt-3">
                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs nav-tabs-bordered">

                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab"
                                data-bs-target="#profile-overview">Overview</button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                Profile</button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab"
                                data-bs-target="#profile-educations">Educations</button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab"
                                data-bs-target="#profile-experience">Experiences</button>
                        </li>

                    </ul>
                    <div class="tab-content pt-2">
                        
                        <!-- Profile Overview Tab -->
                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                            <h5 class="card-title">About</h5>
                            <p class="small fst-italic">{{ $profile->detail }}</p>

                            <h5 class="card-title">Profile Details</h5>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Name</div>
                                <div class="col-lg-9 col-md-8">{{ $profile->name }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Birthdate</div>
                                <div class="col-lg-9 col-md-8">{{ $profile->birthdate->format('d M Y') }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Birthplace</div>
                                <div class="col-lg-9 col-md-8">{{ $profile->birthplace }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Phone</div>
                                <div class="col-lg-9 col-md-8">{{ $profile->phone }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Email</div>
                                <div class="col-lg-9 col-md-8">{{ $profile->email }}</div>
                            </div>

                        </div>

                        <!-- Profile Edit Tab -->
                        <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                            <form action="/admin/profiles/{{ $profile->id }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row mb-3">
                                    <input type="hidden" name="old_image" value="{{ $profile->profile_image }}">
                                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                    <div class="col-md-8 col-lg-9">
                                        <label for="profileImageInput"><img class="img-preview" src="{{ asset('storage/'.$profile->profile_image) }}" alt="Profile"></label>
                                        <input id="profileImageInput" name="profile_image" class="mt-2 form-control @error('profile_image') is-invalid @enderror" type="file" onchange="imagePreview()">
                                        @error('profile_image')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-lg-3 col-form-label">Name</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name', $profile->name) }}">
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="description"
                                        class="col-md-4 col-lg-3 col-form-label">Description</label>
                                    <div class="col-md-8 col-lg-9">
                                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" style="height: 50px">{{ old('description', $profile->description) }}</textarea>
                                        @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="detail" class="col-md-4 col-lg-3 col-form-label">About</label>
                                    <div class="col-md-8 col-lg-9">
                                        <textarea name="detail" class="form-control @error('detail') is-invalid @enderror" id="detail" style="height: 150px">{{ old('detail', $profile->detail) }}</textarea>
                                        @error('detail')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="birthdate" class="col-md-4 col-lg-3 col-form-label">Birthdate</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="birthdate" type="date" class="form-control @error('birthdate') is-invalid @enderror" id="birthdate" value="{{ old('birthdate', Carbon\Carbon::parse($profile->birthdate)->format('Y-m-d')) }}">
                                        @error('birthdate')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="birthplace" class="col-md-4 col-lg-3 col-form-label">Birthplace</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="birthplace" type="text" class="form-control @error('birthplace') is-invalid @enderror" id="birthplace" value="{{ old('birthplace', $profile->birthplace) }}">
                                        @error('birthplace')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{ old('phone', $profile->phone) }}">
                                        @error('phone')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email', $profile->email) }}">
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>

                        <!-- Educations Tab -->
                        <div class="tab-pane fade pt-3" id="profile-educations">
                            <div class="row mb-3">

                                <!-- Button Trigger Add Education Modal -->
                                <div class="text-end mb-3">
                                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#addEducationModal"><i class="bi bi-plus-lg"></i> Add Education</button>
                                </div>
                                
                                <!-- Add Education Modal -->
                                <div class="modal fade" id="addEducationModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addEducationModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="educationModalLabel">Add Education</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="/admin/educations?profile_id={{ $profile->id }}" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="row px-4 py-3">
                                                        <div class="col-12 mb-3">
                                                            <label for="title" class="form-label fw-bold">Study Title</label>
                                                            <input type="text" name="title" class="form-control" id="title" placeholder="e.g Sekolah Dasar, Sekolah Menengah Pertama, Sekolah Menengah Atas" value="{{ old('title') }}">
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <label for="place" class="form-label fw-bold">Study Place</label>
                                                            <input type="text" name="place" class="form-control" id="place" placeholder='e.g "Gambir, Jakarta Tengah, DKI Jakarta"' value="{{ old('place') }}">
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <label for="start_at" class="form-label fw-bold">Period Start</label>
                                                            <input type="text" name="start_at" class="form-control" id="start_at" placeholder="e.g 2000, 2004, 2008, 2012" value="{{ old('start_at') }}">
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <label for="end_at" class="form-label fw-bold">Period End</label>
                                                            <input type="text" name="end_at" class="form-control" id="end_at" placeholder="e.g 2002, 2006, 2010, 2014, Sekarang" value="{{ old('end_at') }}">
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <label for="description" class="form-label fw-bold">Description</label>
                                                            <textarea type="text" name="description" class="form-control" id="description" placeholder="Tell something about this sutdy">{{ old('description') }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Add Education</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Table with stripped rows -->
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Periode</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($profile->educations as $education)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $education->title }}</td>
                                            <td>
                                                {{ $education->start_at === $education->end_at ?
                                                $education->start_at : $education->start_at . ' - ' .
                                                $education->end_at }}
                                            </td>
                                            <td>
                                                <form class="d-inline" action="/admin/educations/{{ $education->id }}?profile_id={{ $profile->id }}" method="POST" onsubmit="return confirmSubmit(this, '{{ $education->title }}')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                                </form>
                                                <span> | </span>
                                                <!-- Button trigger Education Detail Modal -->
                                                <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#educationModal-{{ $education->id }}">Detail >>></button>
                                            </td>

                                        </tr>
                                        <!-- Education Detail Modal -->
                                        <div class="modal fade" id="educationModal-{{ $education->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="educationModal-{{ $education->id }}_Label" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="educationModal-{{ $education->id }}_Label">Education Detail</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="/admin/educations/{{ $education->id }}?profile_id={{ $profile->id }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="row px-4 py-3">
                                                                <div class="col-12 mb-3">
                                                                    <label for="title" class="form-label fw-bold">Study Title</label>
                                                                    <input type="text" name="title" class="form-control" id="title" placeholder="e.g Sekolah Dasar, Sekolah Menengah Pertama, Sekolah Menengah Atas" value="{{ old('title', $education->title) }}">
                                                                </div>
                                                                <div class="col-12 mb-3">
                                                                    <label for="place" class="form-label fw-bold">Study Place</label>
                                                                    <input type="text" name="place" class="form-control" id="place" placeholder='e.g "Gambir, Jakarta Tengah, DKI Jakarta"' value="{{ old('place', $education->place) }}">
                                                                </div>
                                                                <div class="col-6 mb-3">
                                                                    <label for="start_at" class="form-label fw-bold">Period Start</label>
                                                                    <input type="text" name="start_at" class="form-control" id="start_at" placeholder="e.g 2000, 2004, 2008, 2012" value="{{ old('start_at', $education->start_at) }}">
                                                                </div>
                                                                <div class="col-6 mb-3">
                                                                    <label for="end_at" class="form-label fw-bold">Period End</label>
                                                                    <input type="text" name="end_at" class="form-control" id="end_at" placeholder="e.g 2002, 2006, 2010, 2014, Sekarang" value="{{ old('end_at', $education->end_at) }}">
                                                                </div>
                                                                <div class="col-12 mb-3">
                                                                    <label for="description" class="form-label fw-bold">Description</label>
                                                                    <textarea type="text" name="description" class="form-control" id="description" placeholder="Tell something about this sutdy">{{ old('description', $education->description) }}</textarea>
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

                        <!-- Experiences Tab -->
                        <div class="tab-pane fade pt-3" id="profile-experience">
                            <div class="row mb-3">

                                <!-- Button Trigger Add Experience Modal -->
                                <div class="text-end mb-3">
                                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#addExperienceModal"><i class="bi bi-plus-lg"></i> Add Experience</button>
                                </div>
                                
                                <!-- Add Experience Modal -->
                                <div class="modal fade" id="addExperienceModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addEducationModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="experienceModalLabel">Add Experience</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="/admin/experiences?profile_id={{ $profile->id }}" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="row px-4 py-3">
                                                        <div class="col-12 mb-3">
                                                            <label for="title" class="form-label fw-bold">Study Title</label>
                                                            <input type="text" name="title" class="form-control" id="title" placeholder="e.g Sekolah Dasar, Sekolah Menengah Pertama, Sekolah Menengah Atas" value="{{ old('title') }}">
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <label for="place" class="form-label fw-bold">Study Place</label>
                                                            <input type="text" name="place" class="form-control" id="place" placeholder='e.g "Gambir, Jakarta Tengah, DKI Jakarta"' value="{{ old('place') }}">
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <label for="start_at" class="form-label fw-bold">Period Start</label>
                                                            <input type="text" name="start_at" class="form-control" id="start_at" placeholder="e.g 2000, 2004, 2008, 2012" value="{{ old('start_at') }}">
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <label for="end_at" class="form-label fw-bold">Period End</label>
                                                            <input type="text" name="end_at" class="form-control" id="end_at" placeholder="e.g 2002, 2006, 2010, 2014, Sekarang" value="{{ old('end_at') }}">
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <label for="description" class="form-label fw-bold">Description</label>
                                                            <textarea type="text" name="description" class="form-control" id="description" placeholder="Tell something about this sutdy">{{ old('description') }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Add Experience</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Table with stripped rows -->
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Periode</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($profile->experiences as $experience)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $experience->title }}</td>
                                            <td>
                                                {{ $experience->start_at === $experience->end_at ?
                                                    $experience->start_at : $experience->start_at . ' - ' .
                                                    $experience->end_at }}
                                            </td>
                                            <td>
                                                <form class="d-inline" action="/admin/experiences/{{ $experience->id }}?profile_id={{ $profile->id }}" method="POST" onsubmit="return confirmSubmit(this, '{{ $experience->title }}')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                                </form>
                                                <span> | </span>
                                                <!-- Button trigger Experience Detial Modal -->
                                                <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#ExperienceModal-{{ $experience->id }}">Detail >>></button>
                                            </td>

                                        </tr>
                                        <!-- Experience Detail Modal -->
                                        <div class="modal fade" id="ExperienceModal-{{ $experience->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ExperienceModal-{{ $experience->id }}_Label" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="ExperienceModal-{{ $experience->id }}_Label">Experience Detail</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="/admin/experiences/{{ $experience->id }}?profile_id={{ $profile->id }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="row px-4 py-3">
                                                                <div class="col-12 mb-3">
                                                                    <label for="title" class="form-label fw-bold">Experience Title</label>
                                                                    <input type="text" name="title" class="form-control" id="title" placeholder="e.g Project Manager, Web Developer, Content Analyst" value="{{ old('title', $experience->title) }}">
                                                                </div>
                                                                <div class="col-12 mb-3">
                                                                    <label for="place" class="form-label fw-bold">Experience Place</label>
                                                                    <input type="text" name="place" class="form-control" id="place" placeholder='e.g "Gambir, Jakarta Tengah, DKI Jakarta"' value="{{ old('place', $experience->place) }}">
                                                                </div>
                                                                <div class="col-6 mb-3">
                                                                    <label for="start_at" class="form-label fw-bold">Period Start</label>
                                                                    <input type="text" name="start_at" class="form-control" id="start_at" placeholder="e.g 2000, 2004, 2008, 2012" value="{{ old('start_at', $experience->start_at) }}">
                                                                </div>
                                                                <div class="col-6 mb-3">
                                                                    <label for="end_at" class="form-label fw-bold">Period End</label>
                                                                    <input type="text" name="end_at" class="form-control" id="end_at" placeholder="e.g 2002, 2006, 2010, 2014, Sekarang" value="{{ old('end_at', $experience->end_at) }}">
                                                                </div>
                                                                <div class="col-12 mb-3">
                                                                    <label for="description" class="form-label fw-bold">Description</label>
                                                                    <textarea type="text" name="description" class="form-control" id="description" placeholder="Tell something about this experience">{{ old('description', $experience->description) }}</textarea>
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

                    </div><!-- End Bordered Tabs -->

                </div>
            </div>

        </div>
    </div>
</section>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>
    
<script>
    // Image Preview
    function imagePreview() {
        const image = document.querySelector('#profileImageInput');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';
        imgPreview.style.maxHeight = '300px';
        imgPreview.classList.add('border');

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }

    // Sweetalert 2
    function confirmSubmit(e, name) {
        event.preventDefault();

        Swal.fire({
            title: 'Are you sure?',
            html: "To delete this data experience? <br> <b>(" + name + ")</b>",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                e.submit();
            } else {
                return false;
            }
        });
    }
</script>
@endsection