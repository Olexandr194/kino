@extends('admin.layout')
@section('title', 'Новини')

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
                    <div class="col-md-8 text-center">
                        <h2><strong>Список новин:</strong></h2>
                    </div>
                    <div class="col-md-2 text-right">
                        <a href="{{ route('admin.news.create') }}">
                            <button style="width: 250px" type="button" class="btn btn-dark"><i
                                    class="fa fa-plus-circle"></i> Створити новину
                            </button>
                        </a>
                    </div>
                </div>
                <div class="col-md-11">
                    <div class="ajax-news mt-5">
                        <table class="table table-bordered">
                            <thead class="col-md-3">
                            <tr>
                                <th class="text-center">Назва</th>
                                <th class="text-center">Дата створення</th>
                                <th class="text-center">Статус</th>
                                <th class="border-transparent"></th>
                            </tr>
                            </thead>
                            <tbody class="col-md-7">
                            @foreach($news as $item)
                                <tr class="news text-center">
                                    <td class="">{{ $item->title }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->status }}</td>
                                    <input type="hidden" class="news_id"
                                           value="{{ $item->id }}">

                                    <td class="border-transparent col-md-1 text-left">
                                        <a class="ml-4"
                                           href="{{ route('admin.news.edit', $item->id) }}"><i
                                                class="fas fa-pencil-alt text-dark"></i></a>
                                        <div class="delete-news fas fa-trash text-dark ml-3"
                                             style="cursor: pointer"></div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{--------------------------------------------------------------------------------------------------------------------------------------------}}
        </section>
    </div>

    <style>


    </style>
    <script>
        $(function () {
            $(document).on('click', '.delete-news', function (event) {
                event.preventDefault();
                let news_id = $(this).closest('.news').find('.news_id').val();
                $.ajax({
                    url: "{{ route('admin.news.destroy_news') }}",
                    type: "POST",
                    data: {
                        'id': news_id,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: (data) => {
                        $('.ajax-news').html(data);
                    },
                    error: (data) => {
                        console.log(data)
                    }
                });
            });
        });

    </script>

@endsection

