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

                <div class="card-body" style="background-size: cover;  background: #0c525d fixed; ">
                    <h1 class="text-center mb-5" style="color: #fd7605">Акції та знижки</h1>
                    @foreach($actions as $action)
                        <figure class="figure" style="width: 385px; height: 320px; margin-left: 6px; margin-right: 40px ">
                            <img
                                src="{{ url('storage/' . $action->main_image) }}"
                                class="figure-img img-fluid rounded shadow-3 mb-3"
                                alt="Taking up Water with a Spoon"
                                style="height: 250px; width: 385px"
                            />
                            <figcaption class="figure-caption"><h5 class="text-center" style="color: #fd7605"><a style="color: #fd7605" href="{{ route('main.actions.single_action', $action->id) }}">{{ $action->title }}</a></h5></figcaption>
                        </figure>
                    @endforeach
                </div>

            </div>
        </div>

        <div class="col-lg-2 stretch-card grid-margin" style="margin-top: 145px; width: 350px; margin-left: 50px">
            <div class="card w-100 mb-5" style="background: #0c525d; background-size: cover;  background-attachment: fixed;">
                <img class="" src="{{ 'images/add2.jpg' }}">
                <img class="" src="{{ 'images/add3.jpg' }}">
            </div>
        </div>
    </div>
</main>
    <!-- Carousel wrapper -->

    <!-- End your project here-->

    <script>


    </script>

@endsection



