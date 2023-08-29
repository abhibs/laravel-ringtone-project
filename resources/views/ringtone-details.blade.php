<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">
                <div style="margin-top: 50px;margin-bottom:50px">
                    <a href="/" class="btn btn-primary">Back</a>
                </div>
                <div class="card">

                    <div class="card-header">{{ $ringtone->title }}</div>

                    <div class="card-body">
                        <audio controls controlsList="nodownload">
                            <source src="{{ asset('storage/ringtone/' . $ringtone->file) }}" type="audio/ogg">
                            Your browser does not support this element
                        </audio>
                    </div>
                    <div class="card-footer">
                        <form action="{{ route('ringtone-download', [$ringtone->id]) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-secondary btn-sm">Download</button>
                        </form>

                    </div>

                    <div class="addthis_inline_share_toolbox"></div>
                    <div class="a2a_kit a2a_kit_size_32 a2a_default_style mt-2 pb-2">
                        <a class="a2a_button_whatsapp"
                            href="whatsapp://send?text={{ urlencode('Ringtone Project: ' . $ringtone->title) }}%0A{{ urlencode(route('ringtone-details', [$ringtone->id, $ringtone->slug])) }}"></a>

                        <a class="a2a_dd"></a>
                    </div>



                </div>
                <table class="table mt-4">
                    <tr>
                        <th>Name</th>
                        <td>{{ $ringtone->title }}</td>
                    </tr>

                    <tr>
                        <th>Format</th>
                        <td>{{ $ringtone->format }}</td>
                    </tr>

                    <tr>
                        <th>Category</th>
                        <td>{{ $ringtone->category->name }}</td>
                    </tr>
                    <tr>
                        <th>Download</th>
                        <td>{{ $ringtone->download }}</td>
                    </tr>

                </table>
            </div>
            {{-- <div class="col-md-4"style="margin-top: 50px;">
                <div class="card-header">Categories</div>
                @foreach (App\Category::all() as $category)
                    <div class="card-header" style="background-color: #ccc;"><a
                            href="{{ route('ringtones.category', [$category->id]) }}"> {{ $category->name }}</a></div>
                @endforeach

            </div> --}}



        </div>


    </div>
    <script src="//s7.addthis.com/js/300/addthis_widget.js#pubid=example"></script>
    <script async src="https://static.addtoany.com/menu/page.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

</body>

</html>
