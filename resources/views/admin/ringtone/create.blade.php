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
                <form class="row g-3" method="post" action="{{ route('ringtone-store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="col-12">
                        <label for="inputNanme4" class="form-label">Category</label>
                        <select class="form-select" name="category_id" aria-label="Default select example">
                            <option selected="">Choose Category</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="col-12">
                        <label for="inputNanme4" class="form-label">Ringtone File</label>
                        <input type="file" class="form-control" name="file" id="inputNanme4">
                        @error('file')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="inputNanme4" class="form-label">Ringtone Title</label>
                        <input type="text" class="form-control" name="title" id="inputNanme4"
                            placeholder="Enter Ringtone Title">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>



                    <div class="col-sm-9 text-secondary mt-3">
                        <label for="chkYes">
                            <input type="radio" class="status" value="1" name="status" checked />
                            @if ($errors->has('status'))
                                <span class="required">
                                    <strong>{{ $errors->first('status') }}</strong>
                                </span>
                            @endif
                            Active
                        </label>
                        <label for="chkNo">
                            <input type="radio" class="status" value="0" name="status" />
                            @if ($errors->has('status'))
                                <span class="required">
                                    <strong>{{ $errors->first('status') }}</strong>
                                </span>
                            @endif
                            Inactive
                        </label>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form><!-- Vertical Form -->

            </div>
        </div>
    </div>
@endsection
