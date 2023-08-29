@if (Session::has('flash_error'))
    <div class="alert alert-danger" style="color: black;">
        {!! Session::get('flash_error') !!}
    </div>
@endif

@if (Session::has('flash_success'))
    <div class="alert alert-success">
        {!! Session::get('flash_success') !!}
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        {{ $errors->first() }}
    </div>
@endif


@if (\Session::has('error'))
    <div class="alert alert-danger">
        {!! \Session::get('error') !!}
    </div>
@endif

@if (\Session::has('success'))
    <div class="alert alert-success">
        {!! \Session::get('success') !!}
    </div>
@endif

@if (\Session::has('message'))
    <div class="alert alert-success">
        {!! \Session::get('message') !!}
    </div>
@endif
@if (\Session::has('error_msg'))
    : ?> <div class="alert alert-danger"> {!! \Session::get('error_msg') !!} </div>
@endif
