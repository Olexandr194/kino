@extends('main.layouts.main')

@section('title', 'Контакти')

@section('content')

    <main class="">
        <div class="d-flex justify-content-center text-center">
            <div class="col-12" style="height: 600px;">
                <img style="height: 600px;" class="w-100" src="{{ asset('images/MP2.jpg') }}">
            </div>
        </div>

        <div class="row aos-init aos-animate mb-3" data-aos="fade-up"
             style="background-size: cover;  background: #0c525d fixed; ">
            <div class="col-lg-9 stretch-card grid-margin mb-5" style="background-size: cover;  background: #0c525d fixed; ">
                <h1 class="text-center mb-5 mt-5" style="color: #fd7605">Контакти</h1>
                @foreach($pages as $page)
                <div class="card schedules" style="width: 1200px; margin-left: 100px; margin-top: 25px">
                    <div class="card-body">
                        <div class="row">
                                <div class="mb-5 d-flex">
                                    <div class="col-md-5 mr-5">
                                        <div class="d-flex justify-content-between">
                                            <h3 class="mt-2">{{ $page->title }}</h3> <img src="{{ url('storage/' . $page->logo) }}"
                                                                             style="width: 200px; height: 100px;"
                                                                             class="text-end">
                                        </div>
                                        <div class="mt-2">
                                            <label>
                                                <img
                                                    src="{{ url('storage/' . $page->main) }}"
                                                    style="width: 550px; height: 350px">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4" style="margin-left: 120px">
                                        <div class="" style="height: 80px">
                                            Адреса: {!! $page->address !!}
                                        </div>
                                        <div class="" style="margin-top: 27px; height: 350px; ">
                                            {!! $page->coordinates !!}
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                @endforeach
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



