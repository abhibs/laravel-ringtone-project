@extends('admin.layout.app')
@section('content')
    <div class="pagetitle">
        <h1>Category</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Category</li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="col-6 offset-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Category</h5>

                <!-- Vertical Form -->
                <form class="row g-3" method="post" action="{{ route('category-store') }}">
                    @csrf
                    <div class="col-12">
                        <label for="inputNanme4" class="form-label">Category Name</label>
                        <input type="text" class="form-control" name="name" id="inputNanme4">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form><!-- Vertical Form -->

            </div>
        </div>
    </div>
@endsection
