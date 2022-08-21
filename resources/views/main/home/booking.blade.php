@extends('main.layouts.main')

@section('title', 'Бронювання')

@section('content')

    <main class="" style="background-size: cover;  background: #0c525d fixed;">
        <div class="col-12 mb-1" style="height: 600px; margin-bottom: 10px">
            <img style="height: 590px;" class="w-100" src="{{ asset('images/cinema2.jpg') }}">
        </div>

        <div class="row aos-init aos-animate" data-aos="fade-up">
            <div class="col-lg-2 stretch-card grid-margin" style="margin-left: 15px;">
                <div class="card h-100" style="background: #0c525d; background-size: cover;  background-attachment: fixed;">
                    <img class="mb-5" src="{{ url('storage/' . $movie->main_image) }}">

                    <img class="" src="{{ asset('images/add2.jpg') }}">
                    <img class="" src="{{ asset('images/add3.jpg') }}">
                </div>
            </div>


            <div class="col-lg-9 stretch-card grid-margin" >
                <div class="card">
                    <div class="card-header" >
                        <h1 class="text-black mt-1" style="margin-left: 20px">{{ $movie->title }}</h1>
                        <h5 class="text-black mt-1" style="margin-left: 20px">
                            {{ \Carbon\Carbon::createFromDate($schedule->date)->translatedFormat('d F') }},
                            {{ date('H:i', strtotime($schedule->time)) }},
                            Зал №{{ $cinema_hall->number }}
                        </h5>
                        <input type="hidden" class="schedule_id"
                               value="{{ $schedule->id }}">
                        <div class="d-flex" style="margin-top: 50px">
                        <h5 class="text-black mt-1" style="margin-left: 20px;">ВАРТІСТЬ КВИТКА В ГРН. :
                            <a class="btn btn-primary" style="background-color: #dd4b39;" href="#!" role="button">
                                {{ $schedule->cost }}
                                <input type="hidden" id="cost" value="{{ $schedule->cost }}">
                            </a> </h5>
                        <h5 class="text-black mt-1 ml-5" style="margin-left: 20px;">ЗАБРОНЬОВАНО:
                            <a class="btn btn-dark disabled" style="background-color: #333333;" href="#!" role="button">
                                <i class="fas fa-user"></i>
                            </a></h5>
                        <h5 class="text-black ml-5 d-flex" style="margin-left: 20px; margin-top: 15px">ВАШЕ ЗАМОВЛЕННЯ: </h5>

                        <div class="text-black ml-5 d-flex justify-content-between show-booked"
                            style="margin-left: 20px; margin-top: 2px; border: 4px chocolate solid; width: 350px"
                        ><h5 class="mt-2" style="margin-left: 10px"> КВИТКИ: 0 </h5> <h5 class="mt-2" style="margin-right: 10px"> ВАРТІСТЬ: 0 грн. </h5></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-center text-center">
                            <button style="width: 1100px" class="btn btn-outline-dark btn-rounded" data-mdb-ripple-color="dark">ЕКРАН</button>
                        </div>
                        <div class="row" style="margin-top: 50px; width: 1200px">
                            <div class="col-md-3">
                                <h5>РЯД 1</h5>
                            </div>
                            <div class="d-flex justify-content-center col-md-8">
                                @for ($i=1; $i<13; $i++)
                                    <a class="btn
                                    @if (isset($booking))
                                @foreach($booking as $book)
                                    @if(($book->row == 1) && $book->seat == $i)
                                            btn-dark bought disabled
                                    @else
                                           btn-primary seat
                                    @endif
                                @endforeach

                                @endif
                                btn-primary seat
                                    id" id="seat">
                                        {{ $i }}
                                        <input type="hidden" class="seat_id" value="{{ $i }}">
                                        <input type="hidden" class="row_id" value="1">
                                    </a>
                                @endfor
                            </div>
                        </div>
                        <div class="row" style="margin-top: 5px; width: 1200px">
                            <div class="col-md-3">
                                <h5>РЯД 2</h5>
                            </div>
                            <div class="d-flex justify-content-center col-md-8">
                                @for ($i=1; $i<15; $i++)
                                    <a class="btn
                                    @if (isset($booking))
                                @foreach($booking as $book)
                                    @if(($book->row == 2) && $book->seat == $i)
                                            btn-dark bought disabled
                                    @else
                                           btn-primary seat
                                    @endif
                                @endforeach

                                @endif
                                btn-primary seat
                                    id" id="seat">
                                        {{ $i }}
                                        <input type="hidden" class="seat_id" value="{{ $i }}">
                                        <input type="hidden" class="row_id" value="2">
                                    </a>
                                @endfor
                            </div>
                        </div>
                        <div class="row" style="margin-top: 5px; width: 1200px; margin-bottom: 40px">
                            <div class="col-md-3">
                                <h5>РЯД 3</h5>
                            </div>
                            <div class="d-flex justify-content-center col-md-8">
                                @for ($i=1; $i<16; $i++)
                                    <a class="btn
                                    @if (isset($booking))
                                @foreach($booking as $book)
                                    @if(($book->row == 3) && $book->seat == $i)
                                            btn-dark bought disabled
                                    @else
                                           btn-primary seat
                                    @endif
                                @endforeach

                                @endif
                                btn-primary seat
                                    id" id="seat">
                                        {{ $i }}
                                        <input type="hidden" class="seat_id" value="{{ $i }}">
                                        <input type="hidden" class="row_id" value="3">
                                    </a>
                                @endfor
                            </div>
                        </div>
                        @for ($j=4; $j<10; $j++)
                        <div class="row" style="margin-top: 5px; width: 1200px">
                            <div class="col-md-3">
                                <h5>РЯД {{ $j }}</h5>
                            </div>
                            <div class="d-flex justify-content-center col-md-8">
                                @for ($i=1; $i<14; $i++)
                                    <a class="btn
                                    @if (isset($booking))
                                @foreach($booking as $book)
                                    @if(($book->row == $j) && $book->seat == $i)
                                            btn-dark bought disabled
                                    @else
                                           btn-primary seat
                                    @endif
                                @endforeach

                                @endif
                                btn-primary seat
                                    id" id="seat">
                                        {{ $i }}
                                        <input type="hidden" class="seat_id" value="{{ $i }}">
                                        <input type="hidden" class="row_id" value="{{ $j }}">
                                    </a>
                                @endfor
                            </div>
                        </div>
                        @endfor
                        <div class="row" style="margin-top: 5px; width: 1200px">
                            <div class="col-md-3">
                                <h5>РЯД 10</h5>
                            </div>
                            <div class="d-flex justify-content-center col-md-10" style="width: 800px">
                                @for ($i=1; $i<19; $i++)
                                    <a class="btn
                                    @if (isset($booking))
                                @foreach($booking as $book)
                                    @if(($book->row == 10) && $book->seat == $i)
                                            btn-dark bought disabled
                                    @else
                                           btn-primary seat
                                    @endif
                                @endforeach
                                @endif
                                btn-primary seat
                                    id" id="seat">
                                        {{ $i }}
                                        <input type="hidden" class="seat_id" value="{{ $i }}">
                                        <input type="hidden" class="row_id" value="10">
                                    </a>
                                @endfor
                            </div>
                        </div>

                    </div>

                    <div class="card-footer mt-3">
                        <div class="text-center mb-5">
                            @guest()
                                <button type="button" class="btn btn-outline-dark book" onclick="return alert('Авторизуйтеся щоб продовжити!')" value="Забронювати" style="width: 200px; margin-right: 10px" data-mdb-ripple-color="dark">Забронювати</button>
                                <button type="button" class="btn btn-success text-black buy" onclick="return alert('Авторизуйтеся щоб продовжити!')" value="Купити" style="width: 200px;">Купити</button>
                            @endguest
                            @auth()
                        <button type="button" class="btn btn-outline-dark book" value="Забронювати" style="width: 200px; margin-right: 10px" data-mdb-ripple-color="dark">Забронювати</button>
                        <button type="button" class="btn btn-success text-black buy" value="Купити" style="width: 200px;">Купити</button>
                            @endauth
                        </div>

                        <h5>Вартість послуги бронювання - 3 грн. за кожне місце.</h5>
                        <h5>ЗАБРОНЬОВАНІ КВИТКИ НЕОБХІДНО ВИКУПИТИ В КАСІ КІНОТЕАТРУ НЕ ПІЗНІШЕ НІЖ ЗА ПІВ ГОДИНИ ДО ПОЧАТКУ СЕАНСУ!</h5>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </main>

    <script>
        $(document).ready(function () {
            $(document).on('click', '#seat', show);
            function show() {
                if ($(this).hasClass('seat')) {
                    $(this).removeClass('seat').addClass('booked');
                } else {
                    $(this).removeClass('booked').addClass('seat');
                }
                let i = 0;
                let cost = $('#cost').val();
                let total_cost = 0;
                $('.booked').each(function () {
                    i++;
                    total_cost = i * cost;
                })
                $.ajax({
                    url: '',
                    type: 'GET',
                    data: {
                        quantity: i,
                    },
                    success: (data) => {
                        if (data) {
                            $('.show-booked').html(`<h5 class="mt-2" style="margin-left: 10px"> КВИТКИ: ` + i + ` </h5> <h5 class="mt-2" style="margin-right: 10px"> ВАРТІСТЬ: ` + total_cost + ` грн. </h5>`);
                        } else {
                            $('.show-booked').html(`<h5 class="mt-2" style="margin-left: 10px"> КВИТКИ: 0 </h5> <h5 class="mt-2" style="margin-right: 10px"> ВАРТІСТЬ: 0 грн. </h5>`);
                        }
                    }
                })
            }
        });

        $(document).on('click', '.book', book);
        function book() {
                let seats_id = [];
                let rows_id = [];
                let i = 0;
                let id = $('.schedule_id').val();
                $('.booked').each(function () {
                    let seat_id = $(this).closest('.id').find('.seat_id').val();
                    let row_id = $(this).closest('.id').find('.row_id').val();
                    seats_id[i] = seat_id;
                    rows_id[i] = row_id;
                    i++;
                })
            if(i !== 0)
            {
                $.ajax({
                    url: '{{ route('main.schedule.book') }}',
                    type: 'GET',
                    data: {
                        seats_id: seats_id,
                        rows_id: rows_id,
                        quantity: i,
                        id: id,
                    },
                })
                alert('Приємного перегляду!')
                let url = "http://laravel.kino.ua/";
                $(location).attr('href',url);
            } else {
                alert('Оберіть місця!')

            }
        }

    </script>

    <style>
        .seat
        {
            background-color: #dd4b39;
            margin-right: 5px;
            width: 80px;
        }
        .seat:hover
        {
            background-color: #dd4b39;
        }
        .booked
        {
            background-color: #1e7e34;
            margin-right: 5px;
            width: 80px
        }
        .booked:hover
        {
            background-color: #1e7e34;
        }

        .bought
        {
            background-color: #333333;
            margin-right: 5px;
            width: 80px
        }
        .bought:hover
        {
            background-color: #333333;
        }

    </style>

@endsection



