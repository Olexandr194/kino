@extends('admin.layout')
@section('title', 'Головна сторінка')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <form action="{{ route('admin.pages.main_page_update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-10 text-right">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                <input type="checkbox" name="status" class="custom-control-input" id="customSwitch3"
                                       value="Опубліковано">
                                <label class="custom-control-label" for="customSwitch3">Активувати</label>
                            </div>
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
                                        <label>Номери телефону:</label>
                                    </div>
                                    <div class="col-9">
                                    <div class="col-md-3 mr-5 mb-3">
                                        <input type="text" class="form-control" name="phone1"
                                               placeholder="Номер телефону"
                                               value="{{ $main_page->phone1 }}">
                                        @error('phone1')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 mr-5 mb-3">
                                        <input type="text" class="form-control" name="phone2"
                                               placeholder="Номер телефону"
                                               value="{{ $main_page->phone2 }}">
                                        @error('phone2')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 mr-5">
                                        <input type="text" class="form-control" name="phone3"
                                               placeholder="Номер телефону"
                                               value="{{ $main_page->phone3 }}">
                                        @error('phone3')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-5">
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label>SEO текст:</label>
                                    </div>
                                    <div class="col-md-9">
                                            <textarea id="summernote"
                                                      name="seo_text">{{ $main_page->seo_text }}</textarea>
                                        @error('seo_text')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{--------------------------------------------------------------------------------------------------------------------------------------------}}

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
                                                   value="{{ $main_page->seo_url }}">
                                            @error('seo_url')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group w-100">
                                            <label>Title:</label>
                                            <input type="text" class="form-control" name="seo_title"
                                                   placeholder="Title"
                                                   value="{{ $main_page->seo_title }}">
                                            @error('seo_title')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group w-100">
                                            <label>Keywords:</label>
                                            <input type="text" class="form-control" name="seo_keywords"
                                                   placeholder="Keywords"
                                                   value="{{ $main_page->seo_keywords }}">
                                            @error('seo_keywords')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group w-100">
                                            <label>Description:</label>
                                            <input type="text" class="form-control" name="seo_description"
                                                   placeholder="Description"
                                                   value="{{ $main_page->seo_description }}">
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
                        </div>
                    </div>
                </div>
            </section>
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

    </style>

    <script>

    </script>

@endsection

