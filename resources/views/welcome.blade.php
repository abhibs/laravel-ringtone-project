<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ringtone Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <section style="margin-top: 100px">
        <div class="container">
            <div class="row">
                <div class="col-6 offset-3">
                    <div class="themesBazar_cat6">
                        <ul class="nav nav-pills" id="categori-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="categori-tab1" data-bs-toggle="pill" href="#Info-tabs1"
                                    role="tab" aria-controls="Info-tabs1" aria-selected="true">
                                    All
                                </a>
                            </li>
                            @foreach ($categories as $category)
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="categori-tab{{ $category->id }}" data-bs-toggle="pill"
                                        href="#category{{ $category->id }}" role="tab"
                                        aria-controls="category{{ $category->id }}" aria-selected="false">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="Info-tabs1" role="tabpanel"
                            aria-labelledby="categori-tab1">
                            <div class="row">
                                @foreach ($ringtones as $item)
                                    <div class="card design" style="margin-top: 50px;">
                                        <div class="card-header">{{ $item->title }}</div>
                                        <div class="card-body">
                                            <audio controls onplay="pauseOthers(this);" controlsList="nodownload">
                                                <source src="{{ asset('storage/ringtone/' . $item->file) }}"
                                                    type="audio/ogg">
                                                Your browser does not support this element
                                            </audio>
                                        </div>
                                        <div class="card-footer">
                                            <a href="{{ route('ringtone-details', [$item->id, $item->slug]) }}">
                                                Info and Download
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @foreach ($categories as $category)
                            <div class="tab-pane fade" id="category{{ $category->id }}" role="tabpanel"
                                aria-labelledby="categori-tab{{ $category->id }}">
                                <div class="row">
                                    @php
                                        $catwiseringtone = App\Models\Ringtone::where('category_id', $category->id)
                                            ->orderBy('id', 'DESC')
                                            ->get();
                                    @endphp
                                    @foreach ($catwiseringtone as $item)
                                        <div class="card design" style="margin-top: 50px;">
                                            <div class="card-header">{{ $item->title }}</div>
                                            <div class="card-body">
                                                <audio controls onplay="pauseOthers(this);" controlsList="nodownload">
                                                    <source src="{{ asset('storage/ringtone/' . $item->file) }}"
                                                        type="audio/ogg">
                                                    Your browser does not support this element
                                                </audio>
                                            </div>
                                            <div class="card-footer">
                                                <a href="{{ route('ringtone-details', [$item->id, $item->slug]) }}">
                                                    Info and Download
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>

</html>
