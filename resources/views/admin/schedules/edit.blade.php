@extends('admin.layout')
@section('title', 'Розклад сеансів')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <form action="{{ route('admin.schedules.update', $schedule->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
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
                <h2><strong>Редагування сеансу:</strong></h2>
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
                                    <select name="cinema_id" id="cinema_search" class="form-control col-md-12" disabled>
                                        <option
                                            value="{{ $schedule->cinema->id }}">{{ $schedule->cinema->title }}</option>
                                    </select>
                                </div>
                                @error('cinema_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group w-25 d-flex">
                                    <label class="col-md-5 mt-1">Зал</label>
                                    <select name="cinema_hall_id" class="form-control col-md-12 cinema_halls" disabled>
                                        <option value="{{ $schedule->cinema_hall->id }}">Кінозал
                                            №{{ $schedule->cinema_hall->number }}</option>
                                    </select>
                                </div>
                                @error('cinema_hall_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group w-25 d-flex">
                                    <label class="col-md-5 mt-1">Фільм</label>
                                    <select name="movie_id" class="form-control col-md-12" disabled>
                                        <option
                                            value="{{ $schedule->movie->id }}">{{ $schedule->movie->title }}</option>
                                    </select>
                                </div>
                                @error('movie_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group w-50 d-flex">
                                    <label class="col-md-2 mt-1" style="margin-right: 33px">Дата</label>
                                    <select name="movie_id" class="form-control" style="width: 356px" disabled>
                                        <option value="{{ $schedule->date }}">{{ $schedule->date }}</option>
                                    </select>
                                    <div class="input-group-append" data-target="#datetimepicker14"
                                         data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            @error('date')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group w-25 d-flex">
                                <label class="col-md-5 mt-1">Формат</label>
                                <select name="type" class="form-control col-md-12">
                                    <option value="2D"{{ $schedule->type ? ' selected' : '' }}>2D</option>
                                    <option value="3D"{{ $schedule->type ? ' selected' : '' }}>3D</option>
                                    <option value="IMAX"{{ $schedule->type ? ' selected' : '' }}>IMAX</option>
                                </select>
                            </div>
                            @error('type')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group w-25 d-flex">
                                <label class="col-md-5 mt-1">Час</label>
                                <input name="time" type="time" class="form-control col-md-12"
                                       value="{{ date('H:i', strtotime($schedule->time)) }}"/>
                            </div>
                            @error('time')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group w-25 d-flex">
                                <label class="col-md-5 mt-1">Вартість</label>
                                <input name="cost" type="number" class="form-control col-md-12"
                                       value="{{ $schedule->cost }}"/>
                            </div>
                            @error('cost')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        {{--------------------------------------------------------------------------------------------------------------------------------------------}}

                        <div class="form-group mt-5 ">
                            <div class="text-center">
                                <input type="submit" class="btn btn-dark" value="Змінити">
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

    </script>

@endsection

