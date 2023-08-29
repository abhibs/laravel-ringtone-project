@extends('admin.layout.app')
@section('content')
    <div class="pagetitle">
        <h1>Ringtone</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Ringtone</li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="col-6 offset-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Ringtone</h5>

                <!-- Vertical Form -->
                <form class="row g-3" method="post" action="{{ route('ringtone-update', $data->id) }}"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="col-12">
                        <label for="inputNanme4" class="form-label">Category</label>
                        <select class="form-select" name="category_id" aria-label="Default select example">
                            <option selected="">Choose Category</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}" {{ $cat->id == $data->category_id ? 'selected' : '' }}>
                                    {{ $cat->name }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="col-12">
                        <label for="inputNanme4" class="form-label">Ringtone File</label>
                        <br>

                        <audio controls>
                            <source src="{{ asset('storage/ringtone/' . $data->file) }}">
                            Your browser does not support the audio element.
                        </audio>
                        <input type="file" class="form-control" name="file" id="inputNanme4"
                            value="{{ $data->title }}">
                        @error('file')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="inputNanme4" class="form-label">Ringtone Title</label>
                        <input type="text" class="form-control" name="title" id="inputNanme4"
                            placeholder="Enter Ringtone Title" value="{{ $data->title }}">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>



                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form><!-- Vertical Form -->

            </div>
        </div>
    </div>
@endsection
