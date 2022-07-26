@extends('admin.layout')
@section('title', 'Кінотеатри')
@section('custom_js')

@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-12">
                        <h1 class="m-0 text-center">Список кінотеатрів</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
        </div>
        <section class="content">

            <div class="form-group mt-5">
                <div class="ajax-cinemas">
                    <div class="d-flex">
                        @if(count($cinemas) >= 1)
                            <div class="col-md-2 mr-4">
                                <figure>
                                    <p><a href="{{ route('admin.cinemas.show', $cinemas[0]->id) }}" class="">
                                            <img src="{{ url('storage/' . $cinemas[0]->logo_image) }}"
                                                 class="w-100 add-img">
                                        </a>
                                    <figcaption class="text-center"><h3>{{ $cinemas[0]->title }}</h3></figcaption>
                                </figure>
                            </div>
                            @for($i=1; $i<count($cinemas); $i++)
                            <div class="col-md-2 mr-4">
                                <span class="close"><img class="delete-cinema"
                                                         src="{{ asset('images/close1.png') }}"></span>
                                <input type="hidden" class="cinema_id" value="{{ $cinemas[$i]->id }}">
                                <figure>
                                    <p><a href="{{ route('admin.cinemas.show', $cinemas[$i]->id) }}" class="">
                                            <img src="{{ url('storage/' . $cinemas[$i]->logo_image) }}"
                                                 class="w-100 add-img">
                                        </a>
                                    <figcaption class="text-center"><h3>{{ $cinemas[$i]->title }}</h3></figcaption>
                                </figure>
                            </div>
                            @endfor
                        @endif
                        <div class="col-md-2">
                            <figure>
                                <p><a href="{{ route('admin.cinemas.create') }}" class="">
                                        <img src="{{ asset('images/img_1.png') }}" class="w-100 add-img">
                                    </a>
                                <figcaption class="text-center"><h3>Додати</h3></figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>

    <style>
        .add-img {
            width: 300px;
            height: 200px;
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

        .delete-cinema {
            height: 33px;
            width: 30px;
        }


    </style>
    <script>
        $(function () {
            $(document).on('click', '.delete-cinema', function (event) {
                event.preventDefault();
                let cinema_id = $(this).closest('.ajax-cinemas').find('.cinema_id').val();
                $.ajax({
                    url: "{{ route('admin.cinemas.destroy_cinema') }}",
                    type: "POST",
                    data: {
                        'id': cinema_id,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: (data) => {
                        $('.ajax-cinemas').html(data);
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

