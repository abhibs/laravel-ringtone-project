@extends('admin.layout.app')
@section('content')
    <div class="pagetitle">
        <h1>Category</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Category</li>
                <li class="breadcrumb-item active">Data</li>
            </ol>
        </nav>

    </div><!-- End Page Title -->
    @include('notification.index')


    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Category</h5>


                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $key => $item)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }} </th>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <a href="{{ route('category-edit', $item->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ route('category-delete', $item->id) }}" class="btn btn-danger"
                                                id="delete">Delete</a>



                                        </td>
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
