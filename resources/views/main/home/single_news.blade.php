@extends('main.layouts.main')

@section('title', 'Новини')

@section('content')

    <div class="col-md-10" style="background: #2d3748; background-size: cover;  background-attachment: fixed;">

    </div>

<main class="">
    <div class="d-flex justify-content-center text-center">
        <div class="col-12" style="height: 600px;">
            <img style="height: 600px;" class="w-100" src="{{ asset('images/cinema_news.avif') }}">
        </div>
    </div>

    <div class="row aos-init aos-animate mb-3" data-aos="fade-up" style="background-size: cover;  background: #0c525d fixed; ">
        <div class="col-lg-9 stretch-card grid-margin" style="background-size: cover;  background: #0c525d fixed; ">
            <div class="card schedules" style="width: 1350px; margin-left: 50px; margin-top: 25px">
                <div class="card-body" style="background-size: cover;  background: white fixed; ">
                    <h1 class="text-center mb-5">{{ $news->title }}</h1>
                    <div class="row">
                       <div class="col-md-4">
                           <img style="height: 300px; width: 400px" class="" src="{{ url('storage/' . $news->main_image) }}">
                           <h6 style="color: #fd7605">{{ $news->date }}</h6>
                           @foreach($news->cinemas as $cinema)
                               <a style="color: #fd7605" href="{{ route('main.cinemas.single_cinema', $cinema->id) }}">
                                   <button class="btn btn-danger mb-1" style="background: #fd7605; width: 185px">{{ $cinema->title }}</button>
                               </a>
                           @endforeach
                       </div>
                        <div class="col-md-8 te">
                            <h7>{!! $news->description !!}</h7>
                        </div>
                   </div>
                </div>
            </div>
        </div>

        <div class="col-lg-2 stretch-card grid-margin" style="margin-top: 25px; width: 350px; margin-left: 50px">
            <div class="card w-100" style="background: #0c525d; background-size: cover;  background-attachment: fixed;">
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



