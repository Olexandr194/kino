@extends('admin.layout')
@section('title', 'Користувачі')

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
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-4 ml-5 text-right">
                        <h2><strong>Користувачі</strong></h2>
                    </div>
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-4 text-right ml-5">
                        <a href="#">
                            <div class="row">
                                <div class="col-md-8 offset-md-2">
                                    <form action="simple-results.html">
                                        <div class="input-group input-group-lg">
                                            <input type="search" id="search" class="form-control form-control-lg" placeholder="Пошук" value="">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-lg btn-default">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-12">
                    <form action="{{ route('admin.mailing_list.checked_users') }}" method="GET" enctype="multipart/form-data">
                        @csrf
                    <div class="mt-5 ajax-users">
                        <table class="table table-bordered">
                            <thead class="col-md-3">
                            <tr>
                                <th class="text-center"></th>
                                <th class="text-center">ID</th>
                                <th class="text-center">Дата реєстрації</th>
                                <th class="text-center">Дата народження</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Телефон</th>
                                <th class="text-center">ПІБ</th>
                                <th class="text-center">Псевдонім</th>
                                <th class="text-center">Місто</th>
                            </tr>
                            </thead>
                            <tbody class="col-md-7" id="content">
                            @foreach($users as $user)
                                <tr class="users text-center">
                                    <td class="users-list">
                                        <input class="" name="user_id[]" value="{{ $user->id }}" type="checkbox" id="users-list">
                                    </td>
                                    <td class="">{{ $user->id }}</td>
                                    <td class="">{{ $user->created_at }}</td>
                                    <td class="">{{ $user->birthday }}</td>
                                    <td class="">{{ $user->email }}</td>
                                    <td class="">{{ $user->phone }}</td>
                                    <td class="">{{ $user->name}} {{$user->surname}}</td>
                                    <td>{{ $user->nickname }}</td>
                                    <td>{{ $user->city }}</td>
                                    <input type="hidden" class="user_id"
                                           value="{{ $user->id }}">
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @error('user_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                        <div class="text-center pr-5">
                            <input type="submit" class="btn btn-dark pr-4" value="Надіслати обраним">
                        </div>
                    </form>
                </div>
            </div>
            {{--------------------------------------------------------------------------------------------------------------------------------------------}}
        </section>
    </div>

    <style>
    </style>

    <script>
        $('#search').on('keyup', function ()
        {
            let value = $(this).val();

            $.ajax({
                url: "{{ route('admin.mailing_list.search_users') }}",
                type: "GET",
                data: {
                    'search': value,
                },
                success: (data) => {
                    console.log(data);
                    $('#content').html(data);
                },
                error: (data) => {
                    console.log(data)
                }
            });
        })

    </script>

@endsection

