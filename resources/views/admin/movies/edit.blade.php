@extends('admin.layout')
@section('title', 'Фільми')
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
                        <form action="{{ route('admin.movies.update', $movie->id) }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label>Назва фільму:</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="title"
                                               placeholder="Назва фільму"
                                               value="{{ $movie->title }}">
                                        @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-5">
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label>Опис:</label>
                                    </div>
                                    <div class="col-md-9">
                                            <textarea id="summernote"
                                                      name="description">{{ $movie->description }}</textarea>
                                        @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{--------------------------------------------------------------------------------------------------------------------------------------------}}

                            <div class="form-group mt-5">
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label>Головне зображення</label>
                                    </div>
                                    <div class="col-md-2">
                                        <label>
                                            <img id="mainImage" src="{{ url('storage/' . $movie->main_image) }}"
                                                 class="add-img" style="height: 250px">
                                        </label>
                                    </div>
                                    <div class="col-md-1">
                                        <input type="file" id="main-btn" accept="image/*" name="main_image"
                                               onchange="document.getElementById('mainImage').src = window.URL.createObjectURL(this.files[0])"
                                               hidden/>
                                        <label class="input" for="main-btn">Завантажити</label>

                                    </div>
                                    <div class="col-md-1 ml-3">
                                        <label class="delete"
                                               onclick="document.getElementById('mainImage').src = '{{ asset('images/img_3.png') }}'">Видалити</label>
                                    </div>
                                    @error('main_image')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{--------------------------------------------------------------------------------------------------------------------------------------------}}
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
                                                      onclick="document.getElementById('image{{ $i }}').src = '{{ asset('images/img_3.png') }}'"></span>
                                                @if (isset($image[$i]))
                                                    <img id="image{{ $i }}" src="{{ url('storage/' . $image[$i]) }}"
                                                         class="add-img">
                                                @else
                                                    <img id="image{{ $i }}" src="{{ asset('images/img_3.png') }}"
                                                         class="add-img">
                                                @endif
                                            </label>
                                            <input type="file" id="img{{ $i }}-btn" accept="image/*" name="image[]"
                                                   onchange="document.getElementById('image{{ $i }}').src = window.URL.createObjectURL(this.files[0])"
                                                   hidden/>
                                            <label class="input text-center" for="img{{ $i }}-btn"
                                                   style="width: 200px">Додати</label>
                                        </div>
                                    @endfor
                                </div>
                            </div>

                            {{--------------------------------------------------------------------------------------------------------------------------------------------}}
                            <div class="form-group mt-5">
                                <div class="d-flex">
                                    <div class="col-2 md-2">
                                        <label>Посилання на трейлер:</label>
                                    </div>
                                    <div class="col-9">
                                        <div class="form-group w-100">
                                            <input type="text" class="form-control" name="trailer_url"
                                                   placeholder="Посилання на відео в YouTube"
                                                   value="{{ $movie->trailer_url }}">
                                            @error('trailer_url')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex mt-5">
                                    <div class="col-2 md-2">
                                        <label>Тип кіно:</label>
                                    </div>
                                    <div class="col-1 md-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="type" value="2D"
                                                   style="height: 25px; width: 25px;" {{ $movie->type == '2D' ? ' checked' : '' }}>
                                            <label class="form-check-label ml-3 mt-1"><h5>2D</h5></label>
                                        </div>
                                    </div>
                                    <div class="col-1 md-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="type" value="3D"
                                                   style="height: 25px; width: 25px;" {{ $movie->type == '3D' ? ' checked' : '' }}>
                                            <label class="form-check-label ml-3 mt-1"><h5>3D</h5></label>
                                        </div>
                                    </div>
                                    <div class="col-1 md-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="type" value="IMAX"
                                                   style="height: 25px; width: 25px;" {{ $movie->type == 'IMAX' ? ' checked' : '' }}>
                                            <label class="form-check-label ml-3 mt-1"><h5>IMAX</h5></label>
                                        </div>
                                    </div>
                                    @error('type')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            {{--------------------------------------------------------------------------------------------------------------------------------------------}}

                            <div class="form-group mt-5">
                                <div class="d-flex">
                                    <div class="col-2 md-2 mt-3 ml-2">
                                        <label>SEO блок:</label>
                                    </div>
                                    <div class="col-9">
                                        <div class="form-group w-100">
                                            <label>URL:</label>
                                            <input type="text" class="form-control" name="seo_url"
                                                   placeholder="URL"
                                                   value="{{ $movie->seo_url }}">
                                            @error('seo_url')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group w-100">
                                            <label>Title:</label>
                                            <input type="text" class="form-control" name="seo_title"
                                                   placeholder="Title"
                                                   value="{{ $movie->seo_title }}">
                                            @error('seo_title')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group w-100">
                                            <label>Keywords:</label>
                                            <input type="text" class="form-control" name="seo_keywords"
                                                   placeholder="Keywords"
                                                   value="{{ $movie->seo_keywords }}">
                                            @error('seo_keywords')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group w-100">
                                            <label>Description:</label>
                                            <input type="text" class="form-control" name="seo_description"
                                                   placeholder="Description"
                                                   value="{{ $movie->seo_description }}">
                                            @error('seo_description')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-5 ">
                                <div class="text-center">
                                    <input type="submit" class="btn btn-dark" value="Змінити">

                                    <a href="{{ route('admin.movies.edit', $movie->id) }}" class="btn btn-dark ml-3">Повернути до початкової версії</a>
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

        #schemeImg {
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

@endsection

