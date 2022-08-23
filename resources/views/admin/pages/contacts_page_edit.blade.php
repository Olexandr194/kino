@extends('admin.layout')
@section('title', 'Контакти')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <form action="{{ route('admin.pages.contact_page_update', $contactPage->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-10 text-right">
                        </div><!-- /.col -->
                        <div class="col-md-2 text-right">
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
                                    <div class="col-md-4 mr-5">
                                        <input type="text" class="form-control" name="title"
                                               placeholder="Назва кінотеатру"
                                               value="{{ $contactPage->title }}">
                                        @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label>Адреса:</label>
                                    </div>
                                    <div class="col-md-9">
                                            <textarea id="summernote"
                                                      name="address">{{ $contactPage->address }}</textarea>
                                        @error('address')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            {{-- ------------------------------------------------------------------------------------------------------------------------------------------}}
                            <div class="form-group mt-3">
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label>Логотип</label>
                                    </div>
                                    <div class="col-md-2">
                                        <label>
                                            <img id="logoImage" src="{{ url('storage/' . $contactPage->logo) }}"
                                                 class="add-img" style="height: 150px">
                                        </label>
                                    </div>
                                    <div class="col-md-1">
                                        <input type="file" id="logo-btn" accept="image/*" name="logo"
                                               onchange="document.getElementById('logoImage').src = window.URL.createObjectURL(this.files[0])"
                                               hidden/>
                                        <label class="input" for="logo-btn">Завантажити</label>

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

                            <div class="form-group mt-3">
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label>Головне зображення</label>
                                    </div>
                                    <div class="col-md-2">
                                        <label>
                                            <img id="mainImage" src="{{ url('storage/' . $contactPage->main) }}"
                                                 class="add-img" style="height: 200px">
                                        </label>
                                    </div>
                                    <div class="col-md-1 mt-4">
                                        <input type="file" id="banner-btn" accept="image/*"
                                               name="main"
                                               onchange="document.getElementById('mainImage').src = window.URL.createObjectURL(this.files[0])"
                                               hidden/>
                                        <label class="input" for="banner-btn">Завантажити</label>
                                    </div>
                                    <div class="col-md-1 ml-3 mt-4">
                                        <label class="delete"
                                               onclick="document.getElementById('mainImage').src = '{{ asset('images/img_3.png') }}'">Видалити</label>
                                    </div>
                                    @error('main')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label>Координати для карти (розмір: 450х250):</label>
                                    </div>
                                    <div class="col-md-9 mr-5">
                                        <input type="text" class="form-control" name="coordinates"
                                               placeholder="Координати для карти"
                                               value="{{ $contactPage->coordinates }}">
                                        @error('coordinates')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="form-group mt-5 ">
                <div class="text-center">
                    <input type="submit" class="btn btn-dark" value="Змінити" style="width: 150px">
                </div>
            </div>
        </form>
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

        .add-img {
            height: 150px;
            width: 200px;
        }
    </style>

    <script>
    </script>

@endsection

