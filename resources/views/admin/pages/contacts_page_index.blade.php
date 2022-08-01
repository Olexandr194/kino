@extends('admin.layout')
@section('title', 'Контакти')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
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
        <section class="content ml-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="card ml-5 ajax contact-page">
                        @foreach($contacts as $contact)
                            <div class="card-header bg-dark text-right">
                                <a class="ml-4"
                                   href="{{ route('admin.pages.contact_page_edit', $contact->id) }}"><i
                                        class="fas fa-pencil-alt text-danger"></i></a>
                                <div class="delete-contact-page fas fa-trash text-danger ml-3"
                                     style="cursor: pointer"></div>
                            </div>
                            <div class="card-body row col-12">
                                <input type="hidden" class="page_id"
                                       value="{{ $contact->id }}">
                                <div class="col-md-5  mr-5">
                                    <div class="d-flex justify-content-between">
                                        <h3>{{ $contact->title }}</h3> <img src="{{ url('storage/' . $contact->logo) }}"
                                                                            style="width: 200px; height: 70px"
                                                                            class="text-end">
                                    </div>
                                    <div class="mt-5">
                                        <label>
                                            <img
                                                src="{{ url('storage/' . $contact->main) }}"
                                                style="width: 400px; height: 250px">
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="" style="height: 80px">
                                        {!! $contact->address !!}
                                    </div>
                                    <div class="mt-5 w-75">
                                        {!! $contact->coordinates !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="text-center mt-4">
                    <p><a href="{{ route('admin.pages.contact_page_create') }}" class="">
                            <button style="width: 250px" type="button" class="btn btn-dark"><i
                                    class="fa fa-plus-circle"></i> Додати кінотеатр
                            </button>
                        </a>
                </div>
            </div>
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
            width: 150px;
        }

        label.delete {
            background-color: darkslategrey;
            color: white;
            padding: 0.5rem;
            font-family: sans-serif;
            border-radius: 0.3rem;
            cursor: pointer;
            margin-top: 1rem;
            width: 150px;
        }

    </style>

    <script>
        $(function () {
            $(document).on('click', '.delete-contact-page', function (event) {
                event.preventDefault();
                let page_id = $(this).closest('.contact-page').find('.page_id').val();
                $.ajax({
                    url: "{{ route('admin.pages.destroy_contact_page') }}",
                    type: "POST",
                    data: {
                        'id': page_id,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: (data) => {
                        $('.ajax').html(data);
                    },
                    error: (data) => {
                        console.log(data)
                    }
                });
            });
        });
    </script>

@endsection

