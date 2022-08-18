@extends('main.layouts.main')

@section('title', 'Розклад')

@section('content')

    <div class="col-md-10" style="background: #2d3748; background-size: cover;  background-attachment: fixed;">

    </div>

<main class="" style="padding-top: 50px;">
    <div class="d-flex justify-content-center text-center">
        <h4 class="text-black mt-1" style="margin-right: 10px">Показувати лише: </h4>
        <div class="type_class ml-2">
            <button style="height: 38px" type="button" id="type" class="type btn btn-light" >Всі
                <input type="hidden" class="type_val" value="">
            </button>
            <button style="height: 38px" type="button" id="type" class="type btn btn-light" >2D
                <input type="hidden" class="type_val" value="2D">
            </button>
            <button style="height: 38px" type="button" id="type" class="type btn btn-light" >3D
                <input type="hidden" class="type_val" value="3D">
            </button>
            <button style="height: 38px" type="button" id="type" class="type btn btn-light" >IMAX
                <input type="hidden" class="type_val" value="IMAX">
            </button>
        </div>
        <div class="form-group" style="margin-left: 30px">
            <select class="form-select" aria-label="Default select example" id="cinemas" style="width: 210px">
                <option value="">Кінотеатри</option>
                @foreach($cinemas as $cinema)
                    <option value="{{ $cinema->id }}">{{ $cinema->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group" style="margin-left: 10px">
            <select class="form-select" aria-label="Default select example" id="date" style="width: 210px">
                <option value="">Дата</option>
                @for ($i=0; $i<count($date); $i++)
                    <option value="{{ $date[$i] }}">{{ $date[$i]->translatedFormat('d F') }}</option>
                @endfor
            </select>
        </div>
        <div class="form-group" style="margin-left: 10px">
            <select class="form-select" aria-label="Default select example" id="movies" style="width: 210px">
                <option value="">Фільм</option>
                @foreach($movies as $movie)
                    <option value="{{ $movie->id }}">{{ $movie->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group cinema_halls" style="margin-left: 10px">
            <select class="form-select" aria-label="Default select example" id="cinema_halls" style="width: 210px" disabled>
                <option value="">Зал</option>
            </select>
        </div>
    </div>

    <div class="row aos-init aos-animate" data-aos="fade-up" style="background-size: cover;  background: #0c525d fixed; margin-top: 30px">
        <div class="col-lg-9 stretch-card grid-margin" >
            <div class="card schedules" style="width: 1150px; margin-left: 200px; margin-top: 25px">
                @foreach ($schedules as $k => $v)
                    <div class="card-header bg-gray">
                        @php $f = \Carbon\Carbon::createFromDate(date('d M', strtotime($k)))->translatedFormat('d F, D') @endphp
                        <h4 style="margin-left: 50px">{{ $f }}</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr class="text-center">
                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                rowspan="1" colspan="1" aria-sort="ascending"
                                aria-label="Rendering engine: activate to sort column descending">
                                Час
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                colspan="1" aria-label="Browser: activate to sort column ascending">
                                Фільм
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                colspan="1" aria-label="Browser: activate to sort column ascending">
                                Зал
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                colspan="1"
                                aria-label="Platform(s): activate to sort column ascending">
                                Ціна (грн.)
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                colspan="1"
                                aria-label="Engine version: activate to sort column ascending">
                                Забронювати
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($v as $schedule)

                            <tr class="odd text-center schedule">
                            <td class="dtr-control sorting_1" tabindex="0">{{ date('H:i', strtotime($schedule->time)) }}</td>
                            <td class="dtr-control sorting_1" tabindex="0">{{ $schedule->movie->title }}</td>
                            <td class="dtr-control sorting_1" tabindex="0">{{ $schedule->cinema_hall->number }}</td>
                            <td class="dtr-control sorting_1" tabindex="0">{{ $schedule->cost }}</td>
                            </td>
                            <td><a class="ml-4"
                                   href="#"><i
                                        class="fas fa-ticket fa-2x text-dark" style=""></i></a>
                                <a class="ml-4"
                                   href="#"><i
                                        class="fas fa-ticket fa-2x text-dark" style=""></i></a></td>

                            <input type="hidden" class="schedule_id"
                                   value="">
                        </tr>

                        @endforeach
                        </tbody>
                        <tfoot></tfoot>
                    </table>
                </div>
                @endforeach
            </div>
        </div>

        <div class="col-lg-2 stretch-card grid-margin" style="margin-top: 25px; width: 350px;">
            <div class="card h-100 w-100" style="background: #0c525d; background-size: cover;  background-attachment: fixed;">
                <img class="" src="{{ 'images/add2.jpg' }}">
                <img class="" src="{{ 'images/add3.jpg' }}">
            </div>
        </div>
    </div>
</main>
    <!-- Carousel wrapper -->

    <!-- End your project here-->

    <script>
        $('.type').click(function (e) {
            e.preventDefault();
            $(this).addClass('active')
                .siblings().removeClass('active');
        })

        $('#cinemas').on('change', filter);
        $(document).on('change', '#cinema_halls', filter);
        $('#date').on('change', filter);
        $('#movies').on('change', filter);
        $(document).on('click', '#type', filter);

        function filter()
        {
            let cinema_id = $('#cinemas').val();
            let cinema_hall_id = $('#cinema_halls').val();
            let date = $('#date').val();
            let movies = $('#movies').val();
            let type = $('.type_val').closest('.active').find('.type_val').val();

            console.log(type);

           $.ajax({
                url: "{{ route('main.schedule.filter') }}",
                type: "GET",
                data: {
                    'cinema_id': cinema_id,
                    'cinema_hall_id': cinema_hall_id,
                    'date': date,
                    'movies': movies,
                    'type': type,
                },
                success: (data) => {
                    console.log(data);
                    $('.schedules').html(data);
                },
                error: (data) => {
                    console.log(data)
                }
            });
        }

        $('#cinemas').on('change', function ()
        {
            let cinema_id = $(this).val();

           $.ajax({
                url: "{{ route('main.schedule.cinema_halls_search') }}",
                type: "GET",
                data: {
                    'cinema_id': cinema_id,
                },
                success: (data) => {
                    console.log(data);
                    $('.cinema_halls').html(data);
                },
                error: (data) => {
                    console.log(data)
                }
            });
        })

    </script>

@endsection



