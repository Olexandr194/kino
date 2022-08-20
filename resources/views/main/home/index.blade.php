@extends('main.layouts.main')

@section('title', 'Laravel Kino')

@section('content')

    @if ($main_banner->background_type == 'Фото на фоні')
        <div class="col-12"
             style="background-image: url({{'storage/' . $main_banner->main_image}}); background-size: cover;  background-attachment: fixed;">
    @else
                <div class="col-12">
    @endif
<main class="mb-5" style="padding-top: 50px">
    <!-- Carousel wrapper -->
    <div class="img-thumbnail"  style="margin-left: 200px; width: 1395px">
    <div id="carouselBasicExample" class="carousel slide carousel-fade" data-mdb-ride="carousel" style="width: 1385px">
        <!-- Indicators -->
        <div class="carousel-indicators">
            @for ($i =0; $i<count($top_banners); $i++)
            <button
                type="button"
                data-mdb-target="#carouselBasicExample"
                data-mdb-slide-to="{{ $i }}"
                class="{{ $i == 0 ? 'active' : ''}}"
                aria-current="{{ $i == 0 ? 'true' : ''}}"
                aria-label="Slide {{ $i + 1}}"
            ></button>
            @endfor
        </div>

        <!-- Inner -->
        <div class="carousel-inner">
            <!-- Single item -->
            @for ($i =0; $i<count($top_banners); $i++)
                <div class="carousel-item {{$i == 0 ? 'active' : ''}}" data-mdb-interval="{{ $top_banners[$i]->top_scroll_time }}">
                    <img src="{{ url('storage/' . $top_banners[$i]->image) }}" class="d-block w-100" alt="Sunset Over the City" style="height: 600px"/>
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{--{{ $top_banners[$i]->text }}--}}</h5>
                        <p>{{--Nulla vitae elit libero, a pharetra augue mollis interdum.--}}</p>
                    </div>
                </div>
            @endfor
        </div>
        <!-- Inner -->

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    </div>

    <div style="margin-left: 200px; width: 1400px">
        <h1 class="text-center" style="color: #fd7605">Дивіться сьогодні, {{ $date->translatedFormat('d F') }}</h1>
        @foreach($now_movies as $movie)
    <figure class="figure" style="width: 270px; height: 450px; margin-left: 6px; margin-right: 0px ">
        <img
            src="{{ url('storage/' . $movie->main_image) }}"
            class="figure-img img-fluid rounded shadow-3 mb-3"
            alt="Taking up Water with a Spoon"
            style="height: 370px; width: 270px"
        />
        <figcaption class="figure-caption"><h5 class="text-center" style="color: #fd7605"><a style="color: #fd7605" href="{{ route('main.movie', $movie->id) }}">{{ $movie->title }}</a></h5><button class="btn btn-success" style="margin-left: 40px; width: 200px"><a class="text-white" href="{{ route('main.movie', $movie->id) }}">Купити квитки</a></button></figcaption>
    </figure>
        @endforeach
    </div>
    <div style="margin-left: 200px; width: 1400px; margin-top: 40px">
        <h1 class="text-center" style="color: #fd7605">Дивіться скоро</h1>
        @foreach($soon_movies as $movie)
            <figure class="figure" style="width: 270px; height: 450px; margin-left: 6px; margin-right: 0px ">
                <img
                    src="{{ url('storage/' . $movie->main_image) }}"
                    class="figure-img img-fluid rounded shadow-3 mb-3"
                    alt="Taking up Water with a Spoon"
                    style="height: 370px; width: 270px"
                />
                @php $d = \Carbon\Carbon::createFromDate($movie->schedules[0]->date)->translatedFormat('d F') @endphp
                <figcaption class="figure-caption"><h5 class="text-center" style="color: #fd7605"><a style="color: #fd7605" href="{{ route('main.movie', $movie->id) }}">{{ $movie->title }}</a></h5><button class="btn btn-success" style="margin-left: 40px; width: 200px">З {{ $d }}</button></figcaption>
            </figure>
        @endforeach
    </div>

    <h1 class="text-center" style="color: #fd7605">Новини та акції</h1>
    <div class="img-thumbnail"  style="margin-left: 200px; width: 1395px">
        <div id="carouselBasicExample2" class="carousel slide carousel-fade" data-mdb-ride="carousel" style="width: 1385px">
            <!-- Indicators -->
            <div class="carousel-indicators">
                @for ($i =0; $i<count($bottom_banners); $i++)
                    <button
                        type="button"
                        data-mdb-target="#carouselBasicExample2"
                        data-mdb-slide-to="{{ $i }}"
                        class="{{ $i == 0 ? 'active' : ''}}"
                        aria-current="{{ $i == 0 ? 'true' : ''}}"
                        aria-label="Slide {{ $i + 1}}"
                    ></button>
                @endfor
            </div>

            <!-- Inner -->
            <div class="carousel-inner">
                <!-- Single item -->
                @for ($i =0; $i<count($bottom_banners); $i++)
                    <div class="carousel-item {{$i == 0 ? 'active' : ''}}" data-mdb-interval="{{ $bottom_banners[$i]->bottom_scroll_time }}">
                        <img src="{{ url('storage/' . $bottom_banners[$i]->bottom_image) }}" class="d-block w-100" alt="Sunset Over the City" style="height: 500px"/>
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{--{{ $bottom_banners[$i]->bottom_text }--}}}</h5>
                            <p>{{--Nulla vitae elit libero, a pharetra augue mollis interdum.--}}</p>
                        </div>
                    </div>
                @endfor
            </div>
            <!-- Inner -->

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-mdb-target="#carouselBasicExample2" data-mdb-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-mdb-target="#carouselBasicExample2" data-mdb-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

</main>
    <!-- Carousel wrapper -->

<div class="mb-5">

</div>
    <!-- End your project here-->


@endsection



