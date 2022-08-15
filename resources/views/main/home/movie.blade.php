@extends('main.layouts.main')

@section('title', $movie->title)

@section('content')

    <main class="" >
        <div class="img-thumbnail col-12 mb-5" style="height: 600px; margin-bottom: 10px">
            <iframe class="w-100 h-100" src="{{ $movie->trailer_url }}" title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>

        </div>

        <div class="d-flex justify-content-center text-center">
            <h4 class="text-black mt-1 mr-2">Розклад сеансів кінотеатру: </h4>
            <div class="form-group">
                <select class="form-control" id="cinema_id" style="width: 200px; margin-left: 20px; margin-right: 20px">
                    @foreach($cinemas as $k=>$cinema)
                        <option value="{{ $cinema[0]->id }}">{{ $cinema[0]->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="type_class">
                <button style="height: 33px" type="button" id="type" class="type btn btn-light active" >Всі
                    <input type="hidden" class="type_val" value="Всі">
                </button>
                <button style="height: 33px" type="button" id="type" class="type btn btn-light" >2D
                    <input type="hidden" class="type_val" value="2D">
                </button>
                <button style="height: 33px" type="button" id="type" class="type btn btn-light" >3D
                    <input type="hidden" class="type_val" value="3D">
                </button>
                <button style="height: 33px" type="button" id="type" class="type btn btn-light" >IMAX
                    <input type="hidden" class="type_val" value="IMAX">
                </button>
            </div>
        </div>

        <div class="d-flex justify-content-center text-center mt-3 date_class">

            <button type="button" id="date" class="date btn btn-light active" data-mdb-ripple-color="dark"
                    style="height: 100px; width: 150px; margin-right: 20px">
                <b>{{ $date[0]->translatedFormat('d-D') }}</b><br>
                <hr>
                {{ $date[0]->translatedFormat('F') }}
                <input type="hidden" class="date_val" value="{{ $date[0]->format('Y-m-d') }}">
            </button>

            @for ($i=1; $i<count($date); $i++)
                <button type="button" id="date" class="date btn btn-light" data-mdb-ripple-color="dark"
                        style="height: 100px; width: 150px; margin-right: 20px">
                    <b>{{ $date[$i]->translatedFormat('d-D') }}</b><br>
                    <hr>
                    {{ $date[$i]->translatedFormat('F') }}
                    <input type="hidden" class="date_val" value="{{ $date[$i]->format('Y-m-d') }}">
                </button>
            @endfor
        </div>

        <div class="d-flex mt-5">
            <div class="col-md-2 mt-3" style="margin-left: 20px">
                <h4 style="margin-left: 80px" class="fw-light text-dark"><strong>Сеанси:</strong></h4>
            </div>
            <div class="col-md-8 schedules_to_book">
                @foreach($schedules as $schedule)
                    <button type="button" class="schedule btn btn btn-outline-dark mt-3" data-mdb-ripple-color="dark"
                            style="height: 100px; width: 200px; margin-right: 20px">
                        {{date("H:i", strtotime($schedule->time))}} | {{$schedule->type}}<br>
                        <hr>
                        Зал №{{$schedule->cinema_hall->number}} | {{$schedule->cost}}грн.
                    </button>
                @endforeach
            </div>
        </div>

        <div class="d-flex mt-5">
            <div class="col-md-4 mt-3" style="margin-left: 100px">
                <div class="img-thumbnail"  style=" width: 400px; height: 600px;">
                    <img class="w-100 h-100" src="{{ url('storage/' . $movie->main_image) }}">
                </div>
            </div>
            <div class="col-md-7 mt-4">
                <div class="text-center">
                    <button type="button" class="book-tickets btn btn-success btn-flat" style="height: 80px; width: 300px"><h4>Купити квитки</h4></button>
                </div>

                <h3 class="text-center mt-5">{{ $movie->title }}</h3>
                <p class="mb-0">
                    {!! $movie->description !!}
                </p>
            </div>
        </div>

        <h1 class="text-center" style="color: grey">Кадри та постери</h1>
<div class="col-12 text-center d-flex">
        <div class="img-thumbnail"  style="width: 1210px; margin-left: 300px; margin-top: 20px">
            <div id="carouselBasicExample" class="carousel slide carousel-fade" data-mdb-ride="carousel" style="width: 1200px">
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







    </main>

    <script>
        $('.date').click(function (e) {
            e.preventDefault();
            $(this).addClass('active')
                .siblings().removeClass('active');
        })

        $('.type').click(function (e) {
            e.preventDefault();
            $(this).addClass('active')
                .siblings().removeClass('active');
        })

        $('.schedules_to_book').click(function (e) {
            e.preventDefault();
            $('.schedule').removeClass('schedule btn btn btn-outline-dark mt-3').addClass('schedule btn btn btn-dark mt-3')
                .siblings().removeClass('schedule btn btn btn-dark mt-3').addClass('schedule btn btn btn-outline-dark mt-3');
        })




        $('#cinema_id').on('change', filter);
        $(document).on('click', '#type', filter);
        $(document).on('click', '#date', filter);

          function filter() {
              let cinema_id = $('#cinema_id').val();
              let type = $('.type_val').closest('.active').find('.type_val').val();
              let date = $('.date_val').closest('.active').find('.date_val').val();
              console.log(type);
              console.log(date);

              $.ajax({
                  url: "{{ route('main.movie.schedules_search', $movie->id) }}",
                  type: "GET",
                  data: {
                      'cinema_id': cinema_id,
                      'type': type,
                      'date': date,
                  },
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  success: (data) => {
                      $('.schedules_to_book').html(data);
                  },
                  error: (data) => {
                      console.log(data)
                  }
              });
          }

    </script>

@endsection



