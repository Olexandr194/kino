@extends('admin.layout')
@section('title', 'Кінотеатр')

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
                    <div class="col-12 ml-2">
                            <div class="form-group">
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label>Назва кінотеатру:</label>
                                    </div>
                                    <div class="col-md-4">
                                        {{ $cinema->title }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-5">
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label>Опис кінотеатру:</label>
                                    </div>
                                    <div class="col-md-9">
                                        {{ $cinema->description }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-5">
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label>Умови:</label>
                                    </div>
                                    <div class="col-md-9">
                                        {{ $cinema->condition }}
                                    </div>
                                </div>
                            </div>

                            {{--------------------------------------------------------------------------------------------------------------------------------------------}}

                            <div class="form-group mt-5">
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label>Логотип</label>
                                    </div>
                                    <div class="col-md-2">
                                        <img src="{{ url('storage/' . $cinema->logo_image) }}" class="w-100 add-img">
                                    </div>
                                </div>
                            </div>

                            {{--------------------------------------------------------------------------------------------------------------------------------------------}}

                            <div class="form-group mt-5">
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label>Фото верхнього банера</label>
                                    </div>
                                    <div class="col-md-2">
                                        <label>
                                            <img src="{{ url('storage/' . $cinema->main_image) }}" class="w-100 add-img">
                                        </label>
                                    </div>
                                </div>
                            </div>

                            {{--------------------------------------------------------------------------------------------------------------------------------------------}}

                            <div class="form-group mt-5">
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label>Галерея зображень</label>
                                    </div>
                                    @foreach ($cinema_images as $image)
                                        <div class="col-md-2">
                                            <img src="{{ url('storage/' . $image->image) }}" class="w-100 add-img">
                                        </div>
                                    @endforeach
                                </div>
                            </div>


                            {{--------------------------------------------------------------------------------------------------------------------------------------------}}

                            <div class="form-group mt-5">
                                <div class="text-center">
                                    <div class="col-12">
                                        <h2><strong>Список зал:</strong></h2>
                                    </div>
                                        <div class="col-md-11">
                                            <div class="ajax-halls">
                                                <table class="table table-bordered">
                                                    <thead class="col-md-3">
                                                    <tr>
                                                        <th class="text-center">Назва</th>
                                                        <th class="text-center">Дата створення</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="col-md-7">
                                                    @foreach($cinema_halls as $cinema_hall)
                                                        <tr class="hall">
                                                            <td class="text-center">Зал №{{ $cinema_hall->number }}</td>
                                                            <td>{{ $cinema_hall->created_at }}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                </div>
                            </div>

                            {{--------------------------------------------------------------------------------------------------------------------------------------------}}

                            <div class="form-group mt-5">
                                <div class="d-flex">
                                    <div class="col-2 md-2">
                                        <label>SEO блок:</label>
                                    </div>
                                    <div class="col-9">
                                        <div class="form-group w-100">
                                            <label>URL:</label>
                                        </div>
                                        <div >{{ $cinema->seo_url }}</div>
                                        <div class="form-group w-100">
                                            <label>Title:</label>
                                            <div >{{ $cinema->seo_title }}</div>
                                        </div>
                                        <div class="form-group w-100">
                                            <label>Keywords:</label>
                                            <div >{{ $cinema->seo_keywordsl }}</div>
                                        </div>
                                        <div class="form-group w-100">
                                            <label>Description:</label>
                                            <div >{{ $cinema->seo_description }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <style>
        label.input {
            background-color: darkslategrey;
            color: white;
            padding: 0.5rem;
            font-family: sans-serif;
            border-radius: 0.3rem;
            cursor: pointer;
            margin-top: 1rem;
        }

        label.delete {
            background-color: darkslategrey;
            color: white;
            padding: 0.5rem;
            font-family: sans-serif;
            border-radius: 0.3rem;
            cursor: pointer;
            margin-top: 1rem;
        }

        .add-img, #bannerImage {
            height: 150px;
            width: 200px;
        }

        #logoImage {
            height: 150px;
            width: 200px;
        }

        .close {
            position: absolute;
            right: 35px;
            top: -15px;
            width: 32px;
            height: 32px;
            opacity: 1;
            cursor: pointer;
        }

        .close:hover {
            opacity: 1;
        }

        .close:before, .close:after {
            position: absolute;
            left: 15px;
            content: ' ';
            height: 33px;
            width: 2px;
            color: red;
            background-color: red;
        }

        .close:before {
            transform: rotate(45deg);
        }

        .close:after {
            transform: rotate(-45deg);
        }

    </style>
    <script>
        $(function () {
            $(document).on('click', '.delete-hall', function (event) {
                event.preventDefault();
                let cinema_hall_id = $(this).closest('.hall').find('.cinema_hall_id').val();
                $.ajax({
                    url: "{{ route('admin.cinemas.destroy_hall') }}",
                    type: "POST",
                    data: {
                        'id': cinema_hall_id,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: (data) => {
                        $('.ajax-halls').html(data);
                    },
                    error: (data) => {
                        console.log(data)
                    }
                });
            });
        });

        /* $(document).ready(function (){
             $('.delete-hall').click(function (){
                 let val = $(this).closest('.hall').find('.cinema_hall_id').val();;

                 console.log(val);
             })
         })*/
    </script>

@endsection

