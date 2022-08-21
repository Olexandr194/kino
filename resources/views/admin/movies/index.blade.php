@extends('admin.layout')
@section('title', 'Фільми')
@section('custom_js')

@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper ajax-movies-delete">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-12">
                        <h1 class="m-0 text-center">Фільми без сеансів</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
        </div>
        <section class="content">
            <div class="row col-11 ml-5 ajax-movies">
                @foreach($old as $movie)
                    <div class="col-md-2 text-center ml-3 mr-3 mt-3">
                                <span class="close"><img class="delete-movie"
                                                         src="{{ asset('images/close.png') }}"></span>
                        <input type="hidden" class="movie_id" value="{{ $movie->id }}">
                        <figure>
                            <p><a href="{{ route('admin.movies.edit', $movie->id) }}" class="">
                                    <img src="{{ url('storage/' . $movie->main_image) }}"
                                         class="add-img w-100">
                                </a>
                            <figcaption class="text-center"><h3>{{ $movie->title }}</h3></figcaption>
                        </figure>
                    </div>
                @endforeach
                <div class="col-md-2 text-center ml-3 mr-3 mt-3">
                    <figure>
                        <p><a href="{{ route('admin.movies.create') }}" class="">
                                <img src="{{ asset('images/img_1.png') }}" class="add-img w-100"
                                     style="height: 250px; width: 250px">
                            </a>
                        <figcaption class="text-center"><h3>Додати</h3></figcaption>
                    </figure>
                </div>
            </div>
        </section>
        {{--=============================================================================================================================--}}
        <div class="content-header mb-3">
            <div class="container-fluid">
                <div class="col-12 text-center ml-2 mt-5">
                    <h1 class="m-0 text-center">Зараз у кіно</h1>
                </div><!-- /.col -->
            </div>
        </div>
        <section class="content">
            <div class="row col-11 ml-5">
                @foreach($movies as $movie)
                    <div class="col-md-2 text-center ml-3 mr-3 mt-3">
                                <span class="close"><img class="delete-movie"
                                                         src="{{ asset('images/close.png') }}"></span>
                        <input type="hidden" class="movie_id" value="{{ $movie->id }}">
                        <figure>
                            <p><a href="{{ route('admin.movies.edit', $movie->id) }}" class="">
                                    <img src="{{ url('storage/' . $movie->main_image) }}"
                                         class="add-img w-100">
                                </a>
                            <figcaption class="text-center"><h3>{{ $movie->title }}</h3></figcaption>
                        </figure>
                    </div>
                @endforeach
            </div>
        </section>
        {{--=============================================================================================================================--}}

        <div class="content-header mb-3">
            <div class="container-fluid">
                    <div class="col-12 text-center ml-2 mt-5">
                        <h1 class="m-0 text-center">Скоро у кіно</h1>
                    </div><!-- /.col -->
            </div>
        </div>
        <section class="content">
            <div class="row col-11 ml-5">
                @foreach($movies_soon as $movie)
                    <div class="col-md-2 text-center ml-3 mr-3 mt-3">
                                <span class="close"><img class="delete-movie"
                                                         src="{{ asset('images/close.png') }}"></span>
                        <input type="hidden" class="movie_id" value="{{ $movie->id }}">
                        <figure>
                            <p><a href="#" class="">
                                    <img src="{{ url('storage/' . $movie->main_image) }}"
                                         class="add-img w-100">
                                </a>
                            <figcaption class="text-center"><h3>{{ $movie->title }}</h3></figcaption>
                        </figure>
                    </div>
                @endforeach
            </div>
        </section>
    </div>


    <style>
        .add-img {
            width: 250px;
            height: 250px;
        }

        .close {
            position: absolute;
            right: -7px;
            top: -15px;
            width: 32px;
            height: 32px;
            opacity: 1;
            cursor: pointer;
        }

        .delete-movie {
            height: 33px;
            width: 30px;
        }

    </style>

    <script>
        $(function () {
            $(document).on('click', '.delete-movie', function (event) {
                event.preventDefault();
                let movie_id = $(this).closest('.ajax-movies').find('.movie_id').val();
                $.ajax({
                    url: "{{ route('admin.movies.destroy_movie') }}",
                    type: "POST",
                    data: {
                        'id': movie_id,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: (data) => {
                        $('.ajax-movies-delete').html(data);
                    },
                    error: (data) => {
                        console.log(data)
                    }
                });
            });
        });
    </script>
@endsection

