@extends('main.layouts.main')

@section('title', $page->title)

@section('content')



<main class="">
    <div class="d-flex justify-content-center text-center">
        <div class="col-12" style="height: 600px;">
            <img style="height: 600px;" class="w-100" src="{{ url('storage/' . $page['main_image']) }}">
        </div>
    </div>

    <div class="row aos-init aos-animate mb-3" data-aos="fade-up" style="background-size: cover;  background: #0c525d fixed; ">
        <div class="col-lg-9 stretch-card grid-margin" style="background-size: cover;  background: #0c525d fixed; ">
            <div class="card schedules" style="width: 1350px; margin-left: 50px; margin-top: 25px">

                <div class="card-body">
                    <h1 class="text-center mb-5" style="color: #fd7605">{{ $page->title }}</h1>
                    <p> {!! $page->description !!}</p>
                </div>

                <div class="card-footer" style="background-size: cover;  background: #0c525d fixed;">
                    <div class=""  style="width: 1550px; margin-left: -22px; margin-top: 20px ">
                        <div id="carouselBasicExample" class="carousel slide carousel-fade" data-mdb-ride="carousel" style="width: 1350px">
                            <!-- Indicators -->
                            <div class="carousel-indicators">
                                @for ($i =0; $i<count($images); $i++)
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
                                @for ($i =0; $i<count($images); $i++)
                                    <div class="carousel-item {{$i == 0 ? 'active' : ''}}" data-mdb-interval="3000">
                                        <img src="{{ url('storage/' . $images[$i]->image) }}" class="d-block w-100" alt="Sunset Over the City" style="height: 600px"/>
                                        <div class="carousel-caption d-none d-md-block">
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
                </div>

            </div>
        </div>

        <div class="col-lg-2 stretch-card grid-margin" style="margin-top: 25px; width: 350px; margin-left: 50px">
            <div class="card w-100 mb-5" style="background-size: cover;  background: #0c525d fixed;">
                <img class="" src="{{ asset('images/add2.jpg') }}">
                <img class="" src="{{ asset('images/add3.jpg') }}">
            </div>
        </div>
    </div>

</main>
    <!-- Carousel wrapper -->

    <!-- End your project here-->

    <script>


    </script>

@endsection



