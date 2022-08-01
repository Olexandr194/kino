@extends('admin.layout')
@section('title', 'Сторінки')

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
                        <h2><strong>Список сторінок:</strong></h2>
                    </div>
                    <div class="col-md-2 text-right">
                        <a href="{{ route('admin.pages.create') }}">
                            <button style="width: 250px" type="button" class="btn btn-dark"><i
                                    class="fa fa-plus-circle"></i> Створити сторінку
                            </button>
                        </a>
                    </div>
                </div>
                <div class="col-md-11">
                    <div class="ajax-page mt-5">
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
                            <tr class="action text-center">
                                <td class="">Головна сторінка</td>
                                <td>{{ $main_page->created_at }}</td>
                                <td>{{ $main_page->status }}</td>
                                <input type="hidden" class="action_id"
                                       value="{{ $main_page->id }}">

                                <td class="border-transparent col-md-1 text-left">
                                    <a class="ml-4"
                                       href="{{ route('admin.pages.main_page_edit') }}"><i
                                            class="fas fa-pencil-alt text-dark"></i></a>
                                </td>
                            </tr>
                            @for($i = 0; $i<5; $i++))
                                        <tr class="action text-center">
                                    <td class="">{{ $pages[$i]->title }}</td>
                                    <td>{{ $pages[$i]->created_at }}</td>
                                    <td>{{ $pages[$i]->status }}</td>
                                    <input type="hidden" class="action_id"
                                           value="{{ $pages[$i]->id }}">

                                    <td class="border-transparent col-md-1 text-left">
                                        <a class="ml-4"
                                           href="{{ route('admin.pages.edit', $pages[$i]->id) }}"><i
                                                class="fas fa-pencil-alt text-dark"></i></a>
                                    </td>
                                </tr>
                            @endfor
                            <tr class="action text-center">
                                <td class="">Контакти</td>
                                <td>{{ $contact_page->created_at }}</td>
                                <td>Опубліковано</td>
                                <td class="border-transparent col-md-1 text-left">
                                    <a class="ml-4"
                                       href="{{ route('admin.pages.contact_page_index') }}"><i
                                            class="fas fa-pencil-alt text-dark"></i></a>
                                </td>
                            </tr>
                            @for($i = 5; $i<count($pages); $i++)
                            <tr class="page text-center">
                                <td class="">{{ $pages[$i]->title }}</td>
                                <td>{{ $pages[$i]->created_at }}</td>
                                <td>{{ $pages[$i]->status }}</td>
                                <input type="hidden" class="page_id"
                                       value="{{ $pages[$i]->id }}">

                                <td class="border-transparent col-md-1 text-left">
                                    <a class="ml-4"
                                       href="{{ route('admin.pages.edit', $pages[$i]->id) }}"><i
                                            class="fas fa-pencil-alt text-dark"></i></a>
                                    <div class="delete-page fas fa-trash text-dark ml-3"
                                         style="cursor: pointer"></div>
                                </td>
                            </tr>
                            @endfor
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
            $(document).on('click', '.delete-page', function (event) {
                event.preventDefault();
                let page_id = $(this).closest('.page').find('.page_id').val();
                $.ajax({
                    url: "{{ route('admin.pages.destroy') }}",
                    type: "POST",
                    data: {
                        'id': page_id,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: (data) => {
                        $('.ajax-page').html(data);
                    },
                    error: (data) => {
                        console.log(data)
                    }
                });
            });
        });

    </script>

@endsection

