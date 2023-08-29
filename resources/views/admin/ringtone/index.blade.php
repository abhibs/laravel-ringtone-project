@extends('admin.layout.app')
@section('content')
    <div class="pagetitle">
        <h1>Ringtone</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Ringtone</li>
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
                        <h5 class="card-title">Ringtone</h5>


                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Ringtone Title</th>
                                    <th scope="col">Ringtone File</th>
                                    <th scope="col">Ringtone Formate</th>
                                    <th scope="col">Ringtone Download</th>
                                    <th scope="col">Ringtone Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $key => $item)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }} </th>
                                        <td>{{ $item->category->name }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>
                                            <audio controls>
                                                <source src="{{ asset('storage/ringtone/' . $item->file) }}">
                                                Your browser does not support the audio element.
                                            </audio>


                                        </td>
                                        <td>{{ $item->format }}</td>
                                        <td>{{ $item->download }}</td>

                                        <td>
                                            @if ($item->status == 1)
                                                <span class="badge rounded-pill bg-success">Active</span>
                                            @else
                                                <span class="badge rounded-pill bg-danger">InActive</span>
                                            @endif
                                        </td>


                                        <td>
                                            <a href="{{ route('ringtone-edit', $item->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ route('ringtone-delete', $item->id) }}" class="btn btn-danger"
                                                id="delete">Delete</a>
                                            @if ($item->status == 1)
                                                <a href="{{ route('ringtone-inactive', $item->id) }}"
                                                    class="btn btn-primary" title="Inactive"> <i
                                                        class="fa-solid fa-thumbs-down"></i> </a>
                                            @else
                                                <a href="{{ route('ringtone-active', $item->id) }}" class="btn btn-primary"
                                                    title="Active"> <i class="fa-solid fa-thumbs-up"></i> </a>
                                            @endif
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
