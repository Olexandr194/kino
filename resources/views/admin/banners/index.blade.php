@extends('admin.layout')
@section('title', 'Банери')
@section('custom_js')
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <h1 class="m-0 text-center"><strong>На головній зверху</strong></h1>
            </div>
        </div>
        <!-- Content Header (Page header) -->

        <section class="content">
            <form action=" {{ route('admin.banners.top_update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="container-fluid">
                    <div class="row">
                        <div class="card col-11 ml-5">
                            <div class="card-body row col-12">
                                <div class="col-12 d-flex justify-content-between">
                                    <h9>Розмір: 1000x190</h9>
                                    <div>
                                    </div>
                                </div>
                                <div class="form-group mt-5">
                                    <div class="d-flex ajax-top-banner">
                                        @foreach($top_banners as $top_banner)
                                            @if (count($top_banners)<2)
                                                <div class="col-md-3 top-img">
                                                    @else
                                                        <div class="col-md-2 top-img">
                                                            @endif
                                                            <label>
                                                <span class="close del-top-img"
                                                      onclick="deleteTopImage('{{ $top_banner->id ?? '' }}')"></span>
                                                                <img id="image{{ $top_banner->id }}"
                                                                     src="{{ url('storage/' . $top_banner->image) }}"
                                                                     class="add-img">
                                                            </label>
                                                            <input type="file" id="img{{$top_banner->id}}-btn"
                                                                   accept="image/*"
                                                                   name="image[]"
                                                                   onchange="document.getElementById('image{{$top_banner->id}}').src = window.URL.createObjectURL(this.files[0])"
                                                                   hidden/>
                                                            <label class="input text-center"
                                                                   for="img{{$top_banner->id}}-btn"
                                                                   style="width: 220px">Додати</label>
                                                            @error('image')
                                                            <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                            <input type="text" class="form-control" style="width: 220px"
                                                                   name="url[]"
                                                                   placeholder="URL"
                                                                   value="{{ $top_banner->url }}">
                                                            @error('url')
                                                            <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                            <input type="text" class="form-control mt-2"
                                                                   style="width: 220px"
                                                                   name="text[]"
                                                                   placeholder="Text"
                                                                   value="{{ $top_banner->text }}">
                                                            @error('text')
                                                            <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        @endforeach
                                                        @if (count($top_banners)<2)
                                                            <div class="col-md-3">
                                                                @else
                                                                    <div class="col-md-2">
                                                                        @endif
                                                                        <label>
                                                <span class="close"
                                                      onclick="document.getElementById('imageNew').src = '{{ asset('images/add_imag.png') }}'"></span>
                                                                            <img id="imageNew"
                                                                                 src="{{ asset('images/add_image.png') }}"
                                                                                 class="add-img">
                                                                        </label>
                                                                        <input type="file" id="imgNew-btn" accept="image/*"
                                                                               name="image[]"
                                                                               onchange="document.getElementById('imageNew').src = window.URL.createObjectURL(this.files[0])"
                                                                               hidden/>
                                                                        <label class="input text-center" for="imgNew-btn"
                                                                               style="width: 220px">Додати</label>
                                                                        @error('image')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                        <input type="text" class="form-control" style="width: 220px"
                                                                               name="url[]"
                                                                               placeholder="URL"
                                                                               value="">
                                                                        @error('url')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                        <input type="text" class="form-control mt-2"
                                                                               style="width: 220px"
                                                                               name="text[]"
                                                                               placeholder="Text"
                                                                               value="">
                                                                        @error('text')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                    </div>
                                                </div>
                                    <div class="row col-12 mt-5">
                                        <div class="col-md-2">
                                            <h9 class="mt-1 mr-2">Швидкість прокручування:</h9>
                                        </div>
                                        <div class="col-md-3 mr-5">
                                                <select id="top_scroll_time" name="top_scroll_time"
                                                        class="form-control" type="number"
                                                        style="width: 80px; height: 35px">
                                                    <option
                                                        value="5000" @if (isset($top_banner))
                                                        {{ $top_banner->top_scroll_time == 5000 ? 'selected' : '' }} @endif>
                                                        5 c
                                                    </option>
                                                    <option
                                                        value="8000" @if (isset($top_banner))
                                                        {{ $top_banner->top_scroll_time == 8000 ? 'selected' : '' }} @endif>
                                                        8 c
                                                    </option>
                                                    <option
                                                        value="10000" @if (isset($top_banner))
                                                        {{ $top_banner->top_scroll_time == 10000 ? 'selected' : '' }} @endif>
                                                        10 c
                                                    </option>
                                                </select>
                                        </div>
                                        <div class="col-md-3 ml-2 mb-5">
                                            <input type="submit" style="width: 150px" class="btn btn-dark"
                                                   value="Зберегти">
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>


        <div class="content-header mt-3">
            <div class="container-fluid">
                <h1 class="m-0 text-center"><strong>Проміжний банер на задньому фоні</strong></h1>
            </div>
        </div>
        <!-- Content Header (Page header) -->
        <section class="content">
            <form action=" {{ route('admin.banners.main_update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
            <div class="container-fluid">
                <div class="row">
                    <div class="card col-11 ml-5">
                        <div class="card-body row col-12">
                            <div class="col-12 d-flex justify-content-between">
                                <h9>Розмір: 2000x3000</h9>
                            </div>
                            <div class="row col-12 mt-2">
                                <div class="col-md-2 mt-5">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="background_type" value="Фото на фоні"
                                            {{ $main_banner->background_type == "Фото на фоні" ? 'checked' : '' }}>Фото на фоні<br>
                                        <input class="form-check-input" type="radio" name="background_type" value="Білий фон"
                                            {{ $main_banner->background_type == "Білий фон" ? 'checked' : '' }}>Білий фон
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>
                                        <img id="logoImage" src="{{ url('storage/' . $main_banner->main_image) }}"
                                             style="width: 250px; height: 150px; border: 2px black solid;">
                                    </label>
                                </div>

                                <div class="col-md-1 mt-4">
                                    <input type="file" id="logo-btn" accept="main_image/*" name="main_image"
                                           onchange="document.getElementById('logoImage').src = window.URL.createObjectURL(this.files[0])"
                                           hidden/>
                                    <label class="input" for="logo-btn">Завантажити</label>
                                </div>
                                <div class="col-md-1 ml-3 mt-4">
                                    <label class="delete"
                                           onclick="document.getElementById('logoImage').src = '{{ asset('images/img_3.png') }}'">Видалити</label>
                                </div>
                                @error('main_image')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                            <div class="text-center mb-5">
                            <div class="ml-4">
                                <input type="submit" style="width: 150px" class="btn btn-dark"
                                       value="Зберегти">
                            </div>
                            </div>
                        </div>


                </div>
            </div>
            </form>
        </section>


        <div class="content-header mt-3">
            <div class="container-fluid">
                <h1 class="m-0 text-center"><strong>Новини та Акції на головній</strong></h1>
            </div>
        </div>

        <section class="content">
            <form action=" {{ route('admin.banners.bottom_update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="container-fluid">
                    <div class="row">
                        <div class="card col-11 ml-5">
                            <div class="card-body row col-12">
                                <div class="col-12 d-flex justify-content-between">
                                    <h9>Розмір: 1000x190</h9>
                                    <div>
                                    </div>
                                </div>
                                <div class="form-group mt-5">
                                    <div class="d-flex ajax-bottom-banner">
                                        @foreach($bottom_banners as $bottom_banner)
                                            @if (count($bottom_banners)<2)
                                                <div class="col-md-3 top-img">
                                                    @else
                                                        <div class="col-md-2 top-img">
                                                            @endif
                                                <label>
                                                <span class="close del-bottom-img"
                                                      onclick="deleteBottomImage('{{ $bottom_banner->id ?? '' }}')"></span>
                                                    <img id="image{{ $bottom_banner->id }}"
                                                         src="{{ url('storage/' . $bottom_banner->bottom_image) }}"
                                                         class="add-img">
                                                </label>
                                                <input type="file" id="img{{$bottom_banner->id}}-btn"
                                                       accept="bottom_image/*"
                                                       name="bottom_image[]"
                                                       onchange="document.getElementById('image{{$bottom_banner->id}}').src = window.URL.createObjectURL(this.files[0])"
                                                       hidden/>
                                                <label class="input text-center" for="img{{$bottom_banner->id}}-btn"
                                                       style="width: 220px">Додати</label>
                                                @error('image')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                                <input type="text" class="form-control" style="width: 220px"
                                                       name="bottom_url[]"
                                                       placeholder="URL"
                                                       value="{{ $bottom_banner->bottom_url }}">
                                                @error('bottom_url')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                                <input type="text" class="form-control mt-2" style="width: 220px"
                                                       name="bottom_text[]"
                                                       placeholder="Text"
                                                       value="{{ $bottom_banner->bottom_text }}">
                                                @error('bottom_text')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        @endforeach
                                        <div class="col-md-2">
                                            <label>
                                                <span class="close"
                                                      onclick="document.getElementById('imageBottom').src = '{{ asset('images/add_imag.png') }}'"></span>
                                                <img id="imageBottom"
                                                     src="{{ asset('images/add_image.png') }}"
                                                     class="add-img">
                                            </label>
                                            <input type="file" id="imgBot-btn" accept="bottom_image/*"
                                                   name="bottom_image[]"
                                                   onchange="document.getElementById('imageBottom').src = window.URL.createObjectURL(this.files[0])"
                                                   hidden/>
                                            <label class="input text-center" for="imgBot-btn"
                                                   style="width: 220px">Додати</label>
                                            @error('bottom_image')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            <input type="text" class="form-control" style="width: 220px"
                                                   name="bottom_url[]"
                                                   placeholder="URL"
                                                   value="">
                                            @error('bottom_url')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            <input type="text" class="form-control mt-2"
                                                   style="width: 220px"
                                                   name="bottom_text[]"
                                                   placeholder="Text"
                                                   value="">
                                            @error('bottom_text')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row col-12 mt-5">
                                        <div class="col-md-2">
                                            <h9 class="mt-1 mr-2">Швидкість прокручування:</h9>
                                        </div>
                                        <div class="col-md-3 mr-5">

                                            <select id="bottom_scroll_time" name="bottom_scroll_time"
                                                    class="form-control" type="number"
                                                    style="width: 80px; height: 35px">
                                                <option
                                                    value="5000" @if (isset($bottom_banner))
                                                    {{ $bottom_banner->bottom_scroll_time == 5000 ? 'selected' : '' }} @endif>
                                                    5 c
                                                </option>
                                                <option
                                                    value="8000"
                                                @if (isset($bottom_banner))
                                                    {{ $bottom_banner->bottom_scroll_time == 8000 ? 'selected' : '' }} @endif>
                                                8 c
                                                </option>
                                                <option
                                                    value="10000"
                                                @if (isset($bottom_banner))
                                                    {{ $bottom_banner->bottom_scroll_time == 10000 ? 'selected' : '' }} @endif>
                                                10 c
                                                </option>
                                            </select>

                                        </div>
                                        <div class="col-md-3 ml-2 mb-5">
                                            <input type="submit" style="width: 150px" class="btn btn-dark"
                                                   value="Зберегти">
                                        </div>
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
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

        .add-img {
            height: 100px;
            width: 220px;
        }

        .close {
            position: absolute;
            right: -13px;
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

        function deleteTopImage($id) {
            $.ajax({
                url: "{{ route('admin.banners.destroy_top_banner') }}",
                type: "POST",
                data: {
                    'id': $id,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (data) => {
                    $('.ajax-top-banner').html(data);
                },
                error: (data) => {
                    console.log(data)
                }
            });
        }

        function deleteBottomImage($id) {
            $.ajax({
                url: "{{ route('admin.banners.destroy_bottom_banner') }}",
                type: "POST",
                data: {
                    'id': $id,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (data) => {
                    $('.ajax-bottom-banner').html(data);
                },
                error: (data) => {
                    console.log(data)
                }
            });
        }


    </script>

@endsection

