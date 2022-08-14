@extends('admin.layout')
@section('title', 'Розклад сеансів')

@section('custom_js')

@endsection
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-7">
                    </div><!-- /.col -->
                    <div class="col-sm-5">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Українська</a></li>
                            <li class="breadcrumb-item active">Російська</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-8 text-center">
                        <h2><strong>Розклад сеансів:</strong></h2>
                    </div>
                    <div class="col-md-2 text-right">
                        <a href="{{ route('admin.schedules.create') }}">
                            <button style="width: 250px" type="button" class="btn btn-dark"><i
                                    class="fa fa-plus-circle"></i> Додати сеанс
                            </button>
                        </a>
                    </div>
                </div>
                <div class="col-md-11">
                    <div class="ajax-news mt-5">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="col-sm-12 col-md-12 mb-4 d-flex">
                                        <div id="example1_filter" class="dataTables_filter d-flex">
                                            <label class="mr-3 mt-1">Кінотеатр:</label>
                                            <select class="form-control" id="cinema_search" style="width: 300px">
                                                <option value="">Оберіть кінотеатр</option>
                                                @foreach($cinemas as $cinema)
                                                <option value="{{ $cinema->id }}">{{ $cinema->title }}</option>
                                                @endforeach
                                            </select>
                                            <label class="mr-3 mt-1 ml-4">Зал:</label>
                                            <select class="form-control w-50 cinema_halls" id="cinema_halls" style="width: 600px">
                                                <option value="">Оберіть зал</option>
                                                @if(isset($cinema_halls))
                                                @foreach($cinema_halls as $hall)
                                                    <option value="{{ $hall->id }}">{{ $hall->number }}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                            <label class="mr-3 mt-1 ml-4">Дата:</label>
                                            <select class="form-control w-50 date" id="date" style="width: 600px">
                                                <option value="">Оберіть дату</option>
                                                @if(isset($schedules))
                                                    @foreach($schedules as $schedule)
                                                        <option value="{{ $schedule->date }}">{{ $schedule->date }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example1"
                                               class="table table-bordered table-striped dataTable dtr-inline"
                                               aria-describedby="example1_info">
                                            <thead>
                                            <tr class="text-center">
                                                <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="Rendering engine: activate to sort column descending">
                                                    Дата
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-label="Browser: activate to sort column ascending">
                                                    Час
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-label="Browser: activate to sort column ascending">
                                                    Назва фільму
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending">
                                                    Зал
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Engine version: activate to sort column ascending">
                                                    Формат
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending">Вартість квитків
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 100px;">
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody class="schedules">
                                            @foreach($schedules as $schedule)
                                            <tr class="odd text-center">
                                                <td class="dtr-control sorting_1" tabindex="0">{{ $schedule->date }}</td>
                                                <td>{{ date('H:i', strtotime($schedule->time)) }}</td>
                                                <td>{{ $schedule->movie->title }}</td>
                                                <td>Зал №{{ $schedule->cinema_hall->number }}</td>
                                                <td>{{ $schedule->type }}</td>
                                                <td>{{ $schedule->cost }}</td>
                                                <td><a class="ml-4"
                                                       href="{{ route('admin.schedules.edit', $schedule->id) }}"><i
                                                            class="fas fa-pencil-alt text-dark"></i></a>
                                                    <div class="delete-user fas fa-trash text-dark ml-3"
                                                         style="cursor: pointer"></div></td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
    {{--------------------------------------------------------------------------------------------------------------------------------------------}}
    </section>
    </div>

    <style>


    </style>
    <script>
        $(function () {
            $(document).on('click', '.delete-news', function (event) {
                event.preventDefault();
                let news_id = $(this).closest('.news').find('.news_id').val();
                $.ajax({
                    url: "{{ route('admin.news.destroy_news') }}",
                    type: "POST",
                    data: {
                        'id': news_id,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: (data) => {
                        $('.ajax-news').html(data);
                    },
                    error: (data) => {
                        console.log(data)
                    }
                });
            });
        });

        $('#cinema_search').on('change', filter);
        $('#cinema_halls').on('click', filter);
        $('#date').on('change', filter);

        function filter()
        {
            let cinema_id = $('#cinema_search').val();
            let cinema_hall_id = $('#cinema_halls').val();
            let date = $('#date').val();

            console.log(date);

            $.ajax({
                url: "{{ route('admin.schedules.index_search') }}",
                type: "GET",
                data: {
                    'cinema_id': cinema_id,
                    'cinema_hall_id': cinema_hall_id,
                    'date': date,
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

        $('#cinema_search').on('change', function ()
        {
            let cinema_id = $(this).val();

            $.ajax({
                url: "{{ route('admin.schedules.hall_search') }}",
                type: "GET",
                data: {
                    'search': cinema_id,
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

        $('#cinema_halls').on('change', function ()
        {
            let cinema_hall_id = $(this).val();

            $.ajax({
                url: "{{ route('admin.schedules.date_search') }}",
                type: "GET",
                data: {
                    'cinema_hall_id': cinema_hall_id,
                },
                success: (data) => {
                    console.log(data);
                    $('.date').html(data);
                },
                error: (data) => {
                    console.log(data)
                }
            });
        })


    </script>

@endsection

