@extends('main.layouts.main')

@section('title', 'Скоро')

@section('content')

    <div class="col-md-10" style="background: #2d3748; background-size: cover;  background-attachment: fixed;">

    </div>

<main class="" style="padding-top: 50px; background: #0c525d; background-size: cover;  background-attachment: fixed;">
    <div class="row aos-init aos-animate" data-aos="fade-up" >
        <div class="col-lg-2 stretch-card grid-margin" style="margin-left: 5px; margin-top: 25px">
            <div class="card h-100" style="background: #0c525d; background-size: cover;  background-attachment: fixed;">
                <button class="btn btn-danger mb-3" style="background: #fd7605">
                    <a class="nav-link" href="{{ route('main.poster') }}"><h2 class="text-white">Афіша</h2></a>
                </button>
                <button class="btn btn-dark mb-3" style="background: #fd9137">
                    <h2>Скоро</h2>
                </button>
                <img class="h-100" src="{{ 'images/add1.jpeg' }}">
            </div>
        </div>
        <div class="col-lg-9 stretch-card grid-margin" >
            <div class="card" style="background: #0c525d; background-size: cover;  background-attachment: fixed; width: 1500px">
                <div class="card-body">
                    @foreach($movies as $movie)
                        <figure class="figure " style="width: 270px; height: 500px; margin-left: 6px; margin-right: 0px ">
                            <h5 class="text-white text-center">Зараз на екранах</h5>
                            <img
                                src="{{ url('storage/' . $movie->main_image) }}"
                                class="figure-img img-fluid rounded shadow-3 mb-3"
                                alt="Taking up Water with a Spoon"
                                style="height: 370px; width: 270px"
                            />
                            <figcaption class="figure-caption2"><h5 class="text-white">{{ $movie->title }}</h5><button class="btn btn-success" style="margin-left: 40px; width: 200px">Купити квитки</button></figcaption>
                        </figure>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</main>
    <!-- Carousel wrapper -->

    <!-- End your project here-->


@endsection



