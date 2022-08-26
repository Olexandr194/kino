@extends('admin.layout')
@section('title', 'Новини')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-10 text-right">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                @if ($news->status == 'Опубліковано')
                                <input type="checkbox" name="status" class="custom-control-input" id="customSwitch3"
                                       value="Опубліковано" checked>
                                @else
                                    <input type="checkbox" name="status" class="custom-control-input" id="customSwitch3"
                                           value="Опубліковано">
                                @endif
                                @error('status')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
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
                                        <label>Назва новини:</label>
                                    </div>
                                    <div class="col-md-4 mr-5">
                                        <input type="text" class="form-control" name="title"
                                               placeholder="Назва новини"
                                               value="{{ $news->title }}">
                                        @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-2 pl-5">
                                        <label>Дата публікації:</label>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="input-group date" id="datetimepicker4"
                                                 data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input"
                                                       data-target="#datetimepicker4" name="date" value="{{ $news->date }}"/>
                                                <div class="input-group-append" data-target="#datetimepicker4"
                                                     data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                            @error('date')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
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
                                                      name="description">{{ $news->description }}</textarea>
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
                                            <img id="mainImage" src="{{ url('storage/' . $news->main_image) }}"
                                                 class="add-img">
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
                                        <div class="col-md-2 ajax-image">
                                            <label class="images">
                                                <span class="close"
                                                      onclick="document.getElementById('image{{ $i }}').src = '{{ asset('images/img_3.png') }}'">
                                                </span>
                                                @if (isset($image[$i]))
                                                    <img id="image{{ $i }}" src="{{ url('storage/' . $image[$i]) }}"
                                                         class="add-img">
                                                    <input type="hidden" class="image_id"
                                                           value="{{ $id[$i] }}">
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
                                        <label>Посилання на відео:</label>
                                    </div>
                                    <div class="col-9">
                                        <div class="form-group w-100">
                                            <input type="text" class="form-control" name="link"
                                                   placeholder="Посилання на відео в YouTube"
                                                   value="{{ $news->link }}">
                                            @error('link')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--------------------------------------------------------------------------------------------------------------------------------------------}}
                            <div class="form-group mt-5">
                                <div class="d-flex">
                                    <div class="col-2 md-2">
                                        <label>Кінотетри:</label>
                                    </div>
                                    <div class="col-9">
                                        <div class="form-group">
                                            <select class="select2" name="cinema_ids[]" multiple="multiple" data-placeholder="Оберіть кінотеатр" style="width: 100%;">
                                                @foreach($cinemas as $cinema)
                                                    <option {{ is_array($news->cinemas->pluck('id')->toArray()) && in_array($cinema->id, $news->cinemas->pluck('id')->toArray()) ? 'selected' : '' }} value="{{ $cinema->id }}">{{ $cinema->title }}</option>
                                                @endforeach
                                            </select>
                                            @error('cinema_ids')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
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
                                                   value="{{ $news->seo_url }}">
                                            @error('seo_url')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group w-100">
                                            <label>Title:</label>
                                            <input type="text" class="form-control" name="seo_title"
                                                   placeholder="Title"
                                                   value="{{ $news->seo_title }}">
                                            @error('seo_title')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group w-100">
                                            <label>Keywords:</label>
                                            <input type="text" class="form-control" name="seo_keywords"
                                                   placeholder="Keywords"
                                                   value="{{ $news->seo_keywords }}">
                                            @error('seo_keywords')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group w-100">
                                            <label>Description:</label>
                                            <input type="text" class="form-control" name="seo_description"
                                                   placeholder="Description"
                                                   value="{{ $news->seo_description }}">
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

        .add-img {
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
            $('#datetimepicker4').datetimepicker({
                format: 'L',
                locale: 'ua'
            });
        });

            $(function () {
            $(document).on('click', '.close', function (event) {
                event.preventDefault();
                let image_id = $(this).closest('.images').find('.image_id').val();
                console.log(image_id);
                $.ajax({
                    url: "{{ route('admin.news.destroy_image', $news->id) }}",
                    type: "POST",
                    data: {
                        'id': image_id,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: (data) => {
                        $('.ajax-image').html(data);
                    },
                    error: (data) => {
                        console.log(data)
                    }
                });
            });
        });
    </script>

@endsection

