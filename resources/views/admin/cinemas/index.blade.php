@extends('admin.layout')
@section('title', 'Кінотеатри')
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
            <div class="container-fluid">

                <div class="row">
                    <div class="col-2">
                        <figure>
                            <p><a href="{{ route('admin.cinemas.create') }}" class="">
                                    <img src="{{ asset('images/img_4.png') }}" class="w-100 add-img">
                                </a>
                            <figcaption class="text-center"><h3>Додати</h3></figcaption>
                        </figure>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <style>
        .fa-times
        {
            color: red;
            text-align: end;
        }
    </style>

@endsection

