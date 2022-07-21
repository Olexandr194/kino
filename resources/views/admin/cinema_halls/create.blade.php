@extends('admin.layout')
@section('title', 'Кінозал')
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
                        <form action="{{ route('admin.cinema_halls.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label>Номер залу:</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="number" class="form-control" name="number"
                                               placeholder="Номер залу"
                                               value="{{ old('number') }}">
                                        @error('number')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-5">
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label>Опис залу:</label>
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

                            {{--------------------------------------------------------------------------------------------------------------------------------------------}}

                            <div class="form-group mt-5">
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label>Схема залу</label>
                                    </div>
                                    <div class="col-md-2">
                                        <label>
                                            <img id="schemeImg" src="{{ asset('images/img_3.png') }}"
                                                 class="add-img">
                                        </label>
                                    </div>
                                    <div class="col-md-1">
                                        <input type="file" id="scheme-btn" accept="image/*" name="scheme"
                                               onchange="document.getElementById('schemeImg').src = window.URL.createObjectURL(this.files[0])"
                                               hidden/>
                                        <label class="input" for="scheme-btn">Завантажити</label>

                                    </div>
                                    <div class="col-md-1 ml-3">
                                        <label class="delete"
                                               onclick="document.getElementById('schemeImg').src = '{{ asset('images/img_3.png') }}'">Видалити</label>
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
                                            <img id="mainImage" src="{{ asset('images/img_3.png') }}"
                                                 class="add-img">
                                        </label>
                                    </div>
                                    <div class="col-md-1">
                                        <input type="file" id="banner-btn" accept="image/*"
                                               name="main_image"
                                               onchange="document.getElementById('mainImage').src = window.URL.createObjectURL(this.files[0])"
                                               hidden/>
                                        <label class="input" for="banner-btn">Завантажити</label>
                                    </div>
                                    <div class="col-md-1 ml-3">
                                        <label class="delete"
                                               onclick="document.getElementById('mainImage').src = '{{ asset('images/img_3.png') }}'">Видалити</label>
                                    </div>
                                </div>
                            </div>

                            {{--------------------------------------------------------------------------------------------------------------------------------------------}}

                            <div class="form-group mt-5">
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label>Галерея зображень</label>
                                    </div>
                                    <div class="col-md-2">
                                        <label>
                                                <span class="close"
                                                      onclick="document.getElementById('image1').src = '{{ asset('images/img_3.png') }}'"></span>
                                            <img id="image1" src="{{ asset('images/img_3.png') }}"
                                                 class="add-img">
                                        </label>
                                        <input type="file" id="img1-btn" accept="image/*" name="image[]"
                                               onchange="document.getElementById('image1').src = window.URL.createObjectURL(this.files[0])"
                                               hidden/>
                                        <label class="input text-center" for="img1-btn"
                                               style="width: 200px">Додати</label>

                                    </div>
                                    <div class="col-md-2">
                                        <label>
                                                <span class="close"
                                                      onclick="document.getElementById('image2').src = '{{ asset('images/img_3.png') }}'"></span>
                                            <img id="image2" src="{{ asset('images/img_3.png') }}"
                                                 class="add-img">
                                        </label>
                                        <input type="file" id="img2-btn" accept="image/*" name="image[]"
                                               onchange="document.getElementById('image2').src = window.URL.createObjectURL(this.files[0])"
                                               hidden/>
                                        <label class="input text-center" for="img2-btn"
                                               style="width: 200px">Додати</label>
                                    </div>
                                    <div class="col-md-2">
                                        <label>
                                                <span class="close"
                                                      onclick="document.getElementById('image3').src = '{{ asset('images/img_3.png') }}'"></span>
                                            <img id="image3" src="{{ asset('images/img_3.png') }}"
                                                 class="add-img">
                                        </label>
                                        <input type="file" id="img3-btn" accept="image/*" name="image[]"
                                               onchange="document.getElementById('image3').src = window.URL.createObjectURL(this.files[0])"
                                               hidden/>
                                        <label class="input text-center" for="img3-btn"
                                               style="width: 200px">Додати</label>
                                    </div>
                                    <div class="col-md-2">
                                        <label>
                                                <span class="close"
                                                      onclick="document.getElementById('image4').src = '{{ asset('images/img_3.png') }}'"></span>
                                            <img id="image4" src="{{ asset('images/img_3.png') }}"
                                                 class="add-img">
                                        </label>
                                        <input type="file" id="img4-btn" accept="image/*" name="image[]"
                                               onchange="document.getElementById('image4').src = window.URL.createObjectURL(this.files[0])"
                                               hidden/>
                                        <label class="input text-center" for="img4-btn"
                                               style="width: 200px">Додати</label>

                                    </div>
                                    <div class="col-md-2">
                                        <label>
                                                <span class="close"
                                                      onclick="document.getElementById('image5').src = '{{ asset('images/img_3.png') }}'"></span>
                                            <img id="image5" src="{{ asset('images/img_3.png') }}"
                                                 class="add-img">
                                        </label>
                                        <input type="file" id="img5-btn" accept="image/*" name="image[]"
                                               onchange="document.getElementById('image5').src = window.URL.createObjectURL(this.files[0])"
                                               hidden/>
                                        <label class="input text-center" for="img5-btn"
                                               style="width: 200px">Додати</label>
                                    </div>
                                </div>
                            </div>


                            {{--------------------------------------------------------------------------------------------------------------------------------------------}}

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

