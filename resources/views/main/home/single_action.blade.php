@extends('main.layouts.main')

@section('title', 'Акції')

@section('content')

    <div class="col-md-10" style="background: #2d3748; background-size: cover;  background-attachment: fixed;">

    </div>

<main class="">
    <div class="d-flex justify-content-center text-center">
        <div class="col-12" style="height: 600px;">
            <img style="height: 600px;" class="w-100" src="{{ asset('images/action2.png') }}">
        </div>
    </div>

    <div class="row aos-init aos-animate mb-3" data-aos="fade-up" style="background-size: cover;  background: #0c525d fixed; ">
        <div class="col-lg-9 stretch-card grid-margin" style="background-size: cover;  background: #0c525d fixed; ">
            <div class="card schedules" style="width: 1350px; margin-left: 50px; margin-top: 25px">
                <div class="card-body" style="background-size: cover;  background: white fixed; ">
                    <h1 class="text-center mb-5">{{ $action->title }}</h1>
                    <div class="row">
                       <div class="col-md-4">
                           <img style="height: 300px; width: 400px" class="" src="{{ url('storage/' . $action->main_image) }}">
                       </div>
                        <div class="col-md-8 te">
                            <h7 style="color: #fd7605;">{!! $action->description !!}</h7>
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



