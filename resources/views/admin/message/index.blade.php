@extends('layouts.admin')

@section('content')
<!-- Page Title -->
<div class="pagetitle">
    <h1>Message</h1>
    <nav class="d-flex justify-content-end">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item active">Message</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Message</h5>

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Recieved At</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($messages as $message)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $message->name }}</td>
                                <td>{{ $message->created_at }}</td>
                                <td>
                                    <form class="d-inline" action="/admin/messages/{{ $message->id }}" method="POST"
                                        onsubmit="return confirmSubmit(this, '{{ $message->name }}')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger"><i
                                                class="bi bi-trash"></i></button>
                                    </form>
                                    <span> | </span>
                                    <!-- Button trigger Message Detail Modal -->
                                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                        data-bs-target="#messageModal-{{ $message->id }}">Detail >>></button>
                                </td>
                            </tr>
                            <div class="modal fade" id="messageModal-{{ $message->id }}" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1"
                                aria-labelledby="messageModalLabel-{{ $message->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="messageModalLabel-{{ $message->id }}">
                                                Message Detail</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="/admin/messages" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row px-4 py-3">
                                                    <div class="col-6 mb-3">
                                                        <label for="title" class="form-label fw-bold">Sender
                                                            Name</label>
                                                        <input type="text" class="form-control" id="name"
                                                            value="{{ $message->name }}" disabled>
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <label for="email" class="form-label fw-bold">Sender
                                                            Email</label>
                                                        <input type="text" class="form-control" id="email"
                                                            value="{{ $message->email }}" disabled>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <label for="subject" class="form-label fw-bold">Subject</label>
                                                        <input type="text" class="form-control" id="subject"
                                                            value="{{ $message->subject }}" disabled>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <label for="message" class="form-label fw-bold">Message</label>
                                                        <textarea id="message" class="form-control" rows="5"
                                                            disabled>{{ $message->message }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
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
<!-- Sweet Alert 2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>
<script src="{{ asset('/assets/js/sweetalert2.js') }}"></script>
@endsection