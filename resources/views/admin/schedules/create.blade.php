@extends('admin.layout')
@section('title', 'Розклад сеансів')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <form action="№" method="POST" enctype="multipart/form-data">
            @csrf
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
                </div>
            </div>
            <div class="col-md-12 text-center mb-5">
                <h2><strong>Створення сеансу:</strong></h2>
            </div>
            <!-- Main content -->
            <section class="content mt-3">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-12 ml-2">
                            <div class="form-group">
                                <div class="form-group w-25 d-flex">
                                    <label class="col-md-5 mt-1">Кінотеатр</label>
                                    <select name="cinema_id" id="cinema_search" class="form-control col-md-12">
                                        <option value="">Оберіть кінотеатр</option>
                                        @foreach($cinemas as $cinema)
                                        <option value="{{ $cinema->id }}"{{old('cinema_id') ? ' selected' : '' }}>{{ $cinema->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group w-25 d-flex">
                                    <label class="col-md-5 mt-1">Зал</label>
                                    <select name="cinema_hall_id" class="form-control col-md-12 cinema_halls">
                                        @if (isset($cinema_halls))
                                            @foreach($cinema_halls as $cinema_hall)
                                                <option value="{{ $cinema_hall->id }}">Кінозал №{{ $cinema_hall->number }}</option>
                                            @endforeach
                                        @else
                                            <option value="">Оберіть кінотеатр</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group w-25 d-flex">
                                    <label class="col-md-5 mt-1">Фільм</label>
                                    <select name="movie_id" class="form-control col-md-12">
                                        <option value="">Оберіть фільм</option>
                                        @foreach($movies as $movie)
                                        <option value="{{ $movie->id }}">{{ $movie->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group w-25 d-flex">
                                    <label class="col-md-5 mt-1">Формат</label>
                                    <select name="type" class="form-control col-md-12">
                                        <option value="2D"{{old('type') ? ' selected' : '' }}>2D</option>
                                        <option value="3D"{{old('type') ? ' selected' : '' }}>3D</option>
                                        <option value="IMAX"{{old('type') ? ' selected' : '' }}>IMAX</option>
                                    </select>
                                </div>
                                <div class="form-group w-50 d-flex">
                                    <label class="col-md-2 mt-1" style="margin-right: 33px">Дата</label>
                                    <div class="input-group date" style="width: 394px" id="datetimepicker14" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker14"/>
                                        <div class="input-group-append" data-target="#datetimepicker14" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group w-25 d-flex">
                                    <label class="col-md-5 mt-1">Час</label>
                                        <input type="time" class="form-control col-md-12"/>
                                </div>
                                <div class="form-group w-25 d-flex">
                                    <label class="col-md-5 mt-1">Вартість</label>
                                    <input type="number" class="form-control col-md-12"/>
                                </div>
                            </div>
                            {{--------------------------------------------------------------------------------------------------------------------------------------------}}

                            <div class="form-group mt-5 ">
                                <div class="text-center">
                                    <input type="submit" class="btn btn-dark" value="Додати у розклад">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    </div>




    <style>
    </style>

    <script>
        $(function () {
            $('#datetimepicker14').datetimepicker({
                allowMultidate: true,
                multidateSeparator: ', ',
                format: 'L',
                locale: 'ru'
            });
        });

        $('#cinema_search').on('click', function ()
        {
            let id = $(this).val();

           $.ajax({
                url: "{{ route('admin.schedules.cinema_search') }}",
                type: "GET",
                data: {
                    'search': id,
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

