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
                        <form action="{{ route('admin.cinemas.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label>Назва кінотеатру:</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="title"
                                               placeholder="Назва кінотеатру"
                                               value="{{ old('title') }}">
                                        @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-5">
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label>Опис кінотеатру:</label>
                                    </div>
                                    <div class="col-md-9">
                                            <textarea id="summernote"
                                                      name="description">{{ old('description') }}</textarea>
                                        @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-5">
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label>Умови:</label>
                                    </div>
                                    <div class="col-md-9">
                                                <textarea id="summernote2"
                                                          name="condition">{{ old('condition') }}</textarea>
                                        @error('condition')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
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
                                        <label>
                                            <img id="logoImage" src="{{ asset('images/img_3.png') }}"
                                                 class="add-img">
                                        </label>
                                    </div>
                                    <div class="col-md-1">
                                        <input type="file" id="logo-btn" accept="image/*" name="logo_image"
                                               onchange="document.getElementById('logoImage').src = window.URL.createObjectURL(this.files[0])"
                                               hidden/>
                                        <label class="input" for="logo-btn">Завантажити</label>
                                    </div>
                                    <div class="col-md-1 ml-3">
                                        <label class="delete"
                                               onclick="document.getElementById('logoImage').src = '{{ asset('images/img_3.png') }}'">Видалити</label>
                                    </div>
                                    @error('logo_image')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
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
                                            <img id="mainImage" src="{{ asset('images/img_3.png') }}"
                                                 class="add-img">
                                        </label>
                                    </div>
                                    <div class="col-md-1 mt-4">
                                        <input type="file" id="banner-btn" accept="image/*"
                                               name="main_image"
                                               onchange="document.getElementById('mainImage').src = window.URL.createObjectURL(this.files[0])"
                                               hidden/>
                                        <label class="input" for="banner-btn">Завантажити</label>
                                    </div>
                                    <div class="col-md-1 ml-3 mt-4">
                                        <label class="delete"
                                               onclick="document.getElementById('mainImage').src = '{{ asset('images/img_3.png') }}'">Видалити</label>
                                    </div>
                                    @error('main_image')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{--------------------------------------------------------------------------------------------------------------------------------------------}}

                            <div class="form-group mt-5">
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label>Галерея зображень</label>
                                    </div>
                                    @for ($i = 0; $i < 5; $i++)
                                        <div class="col-md-2">
                                            <label>
                                                <span class="close"
                                                      onclick="document.getElementById('image{{$i}}').src = '{{ asset('images/img_3.png') }}'"></span>
                                                <img id="image{{$i}}" src="{{ asset('images/img_3.png') }}"
                                                     class="add-img">
                                            </label>
                                            <input type="file" id="img{{$i}}-btn" accept="image/*" name="image[]"
                                                   onchange="document.getElementById('image{{$i}}').src = window.URL.createObjectURL(this.files[0])"
                                                   hidden/>
                                            <label class="input text-center" for="img{{$i}}-btn"
                                                   style="width: 200px">Додати</label>
                                            @error('image')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    @endfor
                                </div>
                            </div>


                            {{--------------------------------------------------------------------------------------------------------------------------------------------}}

                            <div class="form-group mt-5">
                                <div class="text-center">
                                    <div class="col-12">
                                        <h2><strong>Список зал:</strong></h2>
                                    </div>
                                    @if (isset($cinema_halls))
                                        <div class="col-md-11">
                                            <div class="ajax-halls">
                                                <table class="table table-bordered">
                                                    <thead class="col-md-3">
                                                    <tr>
                                                        <th class="text-center">Назва</th>
                                                        <th class="text-center">Дата створення</th>
                                                        <th class="border-transparent"></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="col-md-7">
                                                    @if(count($cinema_halls) == 1)
                                                        <tr class="hall">
                                                            <td class="text-center">Зал №{{ $cinema_halls[0]->number }}</td>
                                                            <td>{{ $cinema_halls[0]->created_at }}</td>
                                                            <input type="hidden" class="cinema_hall_id"
                                                                   value="{{ $cinema_halls[0]->id }}">
                                                            <td class="border-transparent col-md-1 text-left">
                                                                <a class="ml-4" href="{{ route('admin.cinema_halls.edit', $cinema_halls[0]->id) }}"><i
                                                                        class="fas fa-pencil-alt text-dark"></i></a>
                                                            </td>
                                                        </tr>
                                                    @elseif(count($cinema_halls) > 1)
                                                        <tr class="hall">
                                                            <td class="text-center">Зал №{{ $cinema_halls[0]->number }}</td>
                                                            <td>{{ $cinema_halls[0]->created_at }}</td>
                                                            <input type="hidden" class="cinema_hall_id"
                                                                   value="{{ $cinema_halls[0]->id }}">

                                                            <td class="border-transparent col-md-1 text-left">
                                                                <a class="ml-4" href="{{ route('admin.cinema_halls.edit', $cinema_halls[0]->id) }}"><i
                                                                        class="fas fa-pencil-alt text-dark"></i></a>
                                                            </td>
                                                        </tr>
                                                        @for($i=1; $i<count($cinema_halls); $i++)
                                                            <tr class="hall">
                                                                <td class="text-center">Зал №{{ $cinema_halls[$i]->number }}</td>
                                                                <td>{{ $cinema_halls[$i]->created_at }}</td>
                                                                <input type="hidden" class="cinema_hall_id"
                                                                       value="{{ $cinema_halls[$i]->id }}">

                                                                <td class="border-transparent col-md-1">
                                                                    <a href="{{ route('admin.cinema_halls.edit', $cinema_halls[$i]->id) }}"><i
                                                                            class="fas fa-pencil-alt text-dark"></i></a>
                                                                    <div class="delete-hall fas fa-trash text-dark ml-3" style="cursor: pointer"></div>
                                                                </td>
                                                            </tr>
                                                        @endfor
                                                    @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="text-center mt-4">
                                            <p><a href="{{ route('admin.cinema_halls.create') }}" class="">
                                                    <button style="width: 250px" type="button" class="btn btn-dark"><i
                                                            class="fa fa-plus-circle"></i> Створити зал
                                                    </button>
                                                </a>
                                        </div>
                                    @else
                                        <div class="text-center mt-4">
                                            <p><a href="{{ route('admin.cinema_halls.create') }}" class="">
                                                    <button style="width: 250px" type="button" class="btn btn-dark"><i
                                                            class="fa fa-plus-circle"></i> Створити зал
                                                    </button>
                                                </a>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            {{--------------------------------------------------------------------------------------------------------------------------------------------}}

                            <div class="form-group mt-5">
                                <div class="d-flex">
                                    <div class="col-2 md-2 mt-3">
                                        <label>SEO блок:</label>
                                    </div>


                                    <div class="col-9">
                                        <div class="form-group w-100">
                                            <label>URL:</label>
                                            <input type="text" class="form-control" name="seo_url"
                                                   placeholder="URL"
                                                   value="{{ old('seo_url') }}">
                                            @error('seo_url')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group w-100">
                                            <label>Title:</label>
                                            <input type="text" class="form-control" name="seo_title"
                                                   placeholder="Title"
                                                   value="{{ old('seo_title') }}">
                                            @error('seo_title')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group w-100">
                                            <label>Keywords:</label>
                                            <input type="text" class="form-control" name="seo_keywords"
                                                   placeholder="Keywords"
                                                   value="{{ old('seo_keywords') }}">
                                            @error('seo_keywords')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group w-100">
                                            <label>Description:</label>
                                            <input type="text" class="form-control" name="seo_description"
                                                   placeholder="Description"
                                                   value="{{ old('seo_description') }}">
                                            @error('seo_description')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-5 ">
                                <div class="text-center">
                                    <input type="submit" class="btn btn-dark" value="Зберегти">
                                </div>

                            </div>
                        </form>
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

