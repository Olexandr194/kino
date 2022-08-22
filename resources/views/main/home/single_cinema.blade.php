@extends('main.layouts.main')

@section('title', $cinema->title)

@section('content')

    <main class="" style="background-size: cover;  background: #0c525d fixed;">
        <div class="col-12 mb-5" style="height: 600px; margin-bottom: 10px">
            <div class="col-12" style="height: 600px;">
                <img style="height: 600px;" class="w-100" src="{{ url('storage/' . $cinema->main_image) }}">
            </div>
        </div>

        <div class="row aos-init aos-animate" data-aos="fade-up" >
            <div class="col-lg-2 stretch-card grid-margin" style="margin-left: 15px;">
                <div class="card" style="background-size: cover;  background: #0c525d fixed;">
                    <div class="form-group" style="margin-left: 0px">
                        <table class="table bg-white mb-5" style="color: #fd7605;">
                            <thead class="text-center bg-white">
                            <h4 class="text-center mb-3" style="color: #fd7605">Кількість зал: {{ count($cinema_halls) }}</h4>
                            </thead>
                            <tbody>
                            @foreach($cinema_halls as $cinema_hall)
                                <tr class="text-black">
                                    <td class="dtr-control sorting_1"><a class="nav-link" style="height: 30px;" href="{{ route('main.cinemas.cinema_hall', $cinema_hall->id) }}">
                                            <h5 class="text-black">Зал №{{ $cinema_hall->number }}</h5></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot></tfoot>
                        </table>

                        <table class="table bg-white mb-5" style="color: #fd7605;">
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
                    </div>
                    <img class="" src="{{ asset('images/add2.jpg') }}">
                    <img class="" src="{{ asset('images/add3.jpg') }}">
                </div>
            </div>


            <div class="col-lg-9 stretch-card grid-margin" style="width: 1500px">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-3 mt-2" style="margin-left: 50px">
                                <h3>{{ $cinema->title }}</h3>
                                <div class="mt-4">
                                    <button style="height: 33px; width: 85px;" type="button" id="type" class="type btn btn-light" >2D
                                        <input type="hidden" class="type_val" value="2D">
                                    </button>
                                    <button style="height: 33px; width: 85px" type="button" id="type" class="type btn btn-light" >3D
                                        <input type="hidden" class="type_val" value="3D">
                                    </button>
                                    <button style="height: 33px; width: 85px" type="button" id="type" class="type btn btn-light" >IMAX
                                        <input type="hidden" class="type_val" value="IMAX">
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <img class="" src="{{ url('storage/' . $cinema->logo_image) }}">
                            </div>
                            <div class="col-md-4 mt-2">
                                <button type="button" class="book-tickets btn btn-success btn-flat text-black" style="height: 100px; width: 300px;">
                                    <a href="{{ route('main.schedule') }}">
                                        <h4 class="text-black">Розклад сеансвів</h4></a>
                                    </button>
                            </div>
                    </div>
                    </div>

                    <div class="card-body">
                            <div>
                                {!! $cinema->description !!}
                            </div>

                        <div>
                            <h2 class="text-center">ПРАВИЛА ВІДВІДУВАННЯ {{ $cinema->title }}</h2>
                            {!! $cinema->condition !!}
                        </div>
                    </div>

                    <div class="card-footer" style="background-size: cover;  background: #0c525d fixed;">
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
        </div>

    </main>

    <script>


    </script>

@endsection



