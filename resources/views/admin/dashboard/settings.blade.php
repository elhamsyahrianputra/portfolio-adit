@extends('layouts.admin')

@section('content')
<div class="pagetitle">
    <h1>Portfolio</h1>
    <nav class="d-flex justify-content-end">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item active">User</li>
            <li class="breadcrumb-item active">Settings</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-9">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Settings</h5>

                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="/admin/user/settings" method="POST">
                        @csrf
                        @method('put')
                        <div class="col-12 mb-3">
                            <label for="email" class="form-label fw-semibold">Email</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" value="{{ old('email', auth()->user()->email) }}">
                                @error('email')
                                <div class="invalid-feedback mt-3">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="password" class="form-label fw-semibold">Password</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-key"></i></span>
                                <input type="text" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Enter new password" value="{{ old('password') }}">
                                @error('password')
                                <div class="invalid-feedback mt-3">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="text-end">
                            <button class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection