@extends('main.layouts.main')

@section('title', 'Кінозал')

@section('content')

    <main class="" style="background-size: cover;  background: #0c525d fixed;">
        <div class="col-12 mb-5" style="height: 600px; margin-bottom: 10px">
            <div class="col-12" style="height: 600px;">
                <img style="height: 600px;" class="w-100" src="{{ url('storage/' . $cinema_hall->main_image) }}">
            </div>
        </div>

        <div class="row aos-init aos-animate" data-aos="fade-up" >
            <div class="col-lg-2 stretch-card grid-margin" style="margin-left: 15px;">
                <div class="card" style="background-size: cover;  background: #0c525d fixed;">
                    <div class="form-group" style="margin-left: 0px">
                        <table class="table bg-white mb-4" style="color: #fd7605;">
                            <thead class="text-center bg-white">
                            <h4 class="text-center mb-3" style="color: #fd7605">Дивіться сьогодні:</h4>
                            </thead>
                            <tbody>
                            @foreach($schedules as $schedule)
                                <tr class="text-black">
                                    <td class="dtr-control sorting_1">
                                        <a class="nav-link" style="height: 30px;" href="{{ route('main.movie', $schedule->movie->id) }}">
                                            <h6 class="text-black">{{ date('H:i', strtotime($schedule->time)) }} {{ $schedule->movie->title }}</h6></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot></tfoot>
                        </table>
                        <button type="button" class="book-tickets btn btn-success btn-flat text-black mb-3" style="height: 60px; width: 285px;">
                            <a href="{{ route('main.schedule') }}">
                                <h5 class="text-black">Розклад сеансвів</h5></a>
                        </button>
                    </div>
                    <img class="" src="{{ asset('images/add2.jpg') }}">
                    <img class="" src="{{ asset('images/add3.jpg') }}">
                </div>
            </div>


            <div class="col-lg-9 stretch-card grid-margin" style="width: 1500px">
                <h3 class="text-center mb-4" style="color: #fd7605">Зал №{{ $cinema_hall->number }}</h3>
                <div class="card">
                    <div class="card-body">
                            <div>
                                {!! $cinema_hall->description !!}
                            </div>
                    </div>
                </div>

                <div class="mt-5">
                    <h3 class="text-center mb-4" style="color: #fd7605">Карта залу</h3>
                    <div class="" style="height: 600px;">
                        <img style="height: 600px;" class="w-100" src="{{ url('storage/' . $cinema_hall->scheme) }}">
                    </div>
                </div>

                <div class="card-footer" style="background-size: cover;  background: #0c525d fixed;">
                    <h3 class="text-center mb-4 mt-5" style="color: #fd7605">ФОТОГАЛЕРЕЯ</h3>
                    <div class=""  style="width: 1550px; margin-left: -22px; margin-top: 20px ">
                        <div id="carouselBasicExample" class="carousel slide carousel-fade" data-mdb-ride="carousel" style="width: 1473px">
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

    </main>

    <script>


    </script>

@endsection



