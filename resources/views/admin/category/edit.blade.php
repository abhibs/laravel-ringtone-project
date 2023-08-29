@extends('admin.layout.app')
@section('content')
    <div class="pagetitle">
        <h1>Catogory</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Category</li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="col-6 offset-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Category</h5>

                <!-- Vertical Form -->
                <form class="row g-3" method="post" action="{{ route('category-update') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $data->id }}">

                    <div class="col-12">
                        <label for="inputNanme4" class="form-label">Category Name</label>
                        <input type="text" class="form-control" name="name" id="inputNanme4"
                            value="{{ $data->name }}">
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form><!-- Vertical Form -->

            </div>
        </div>
    </div>
@endsection
