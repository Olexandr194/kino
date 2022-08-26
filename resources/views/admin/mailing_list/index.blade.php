@extends('admin.layout')
@section('title', 'Розсилка')

@section('custom_js')

@endsection
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="text-center">
                    <h1 class="pt-3 mb-5"><strong>E-mail</strong></h1>
                </div>
                <div class="row">
                    <div class="col-md-3 ml-4 mt-1">
                        <h5>Обрати e-mail для розсилки</h5>
                    </div>
                    <div class="col-md-2">
                        <input class="form-check-input ml-1" type="radio" id="all" name="email" value="all"
                               style="height: 25px; width: 25px;">
                        <label class="form-check-label ml-5 mt-1"><h5>Усім користувачам</h5></label>
                    </div>
                    <div class="col-md-1">
                        <input class="form-check-input mt-1" type="radio" id="select" name="email" value="user_id"
                               style="height: 25px; width: 25px;">
                        <label class="form-check-label ml-3 mt-1"><h5>Вибірково</h5></label>
                    </div>
                    <div class="col-md-2 ml-5">
                        <a href="{{ route('admin.mailing_list.select_users') }}" class="nav-link">
                        <button type="button" id="users" class="btn btn-dark btn-rounded"><h5
                                style="height: 20px;">Обрати користувачів</h5></button></a>
                    </div>
                    <div class="col-md-1">
                        @error('email')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-3 ml-4 mt-4">
                        <h5 class="mt-5">Завантажте html-файл</h5>

                        <h5 class="mt-5">Завантажений файл:</h5>

                        <h5 class="mt-5">Шаблон який використовується:</h5>

                        <div class="reload">
                        <h5 class="mt-5">Кількість листів: </h5>
                        </div>

                    </div>
                    <div class="col-md-3 mt-4">
                        <input type="file" id="html" accept="text/html" name="html"
                               hidden/>
                        <label class="input mt-5" for="html">Завантажити</label>

                        <div class="use_html mt-4">
                            <h5 class="" style="color: #607d8b;">--файл не завантажено--</h5>
                        </div>
                        <div class="mt-5" id="in_use">
                            <h5 class="" style="color: #607d8b;">--оберіть шаблон--</h5>

                        </div>

                        <div class="done">
                        <h5 class="mt-5">Розсилку виконано на:</h5>
                        </div>
                    </div>

                    <div class="col-md-4 mt-4">
                        <div class="card mt-5 ml-5">
                            <div class="card-body mailing">
                                <h5 class="mb-4 ml-2">Список останніх завантажених шаблонів:</h5>
                                @foreach($all_lists as $list)
                                    <div class="form-check d-flex justify-content-between lists">
                                        <input class="form-check-input ml-2 list_id" type="checkbox" id="check-list" name="mailing_list" value="{{ $list->id }}" data-file="{{$list->title}}">
                                        <label class="form-check-label ml-5"><h5>{{ $list->title }}</h5></label>
                                        <div class="text-danger mr-5 del-list"><h6 style="border-bottom: thin red solid; cursor: pointer;">Видалити</h6></div>
                                    </div>
                                @endforeach
                            </div>
                            @error('mailing_list')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="take_user1">
                @if (isset($selected_users))
                        <div class="take_user2">
                    @foreach($selected_users as $id)
                        <div class="take_user3">
                        <input type="hidden" class="user_id" id="idi" name="id[]"
                       value="{{ $id }}">
                        </div>
                    @endforeach
                        </div>
                @endif
                        </div>
                <div class="text-center mt-5">
                    <button class="btn btn-dark " id="send_mail" type="button" style="width: 200px">Почати розсилку</button>
                </div>
            </div>

            </form>
            {{--------------------------------------------------------------------------------------------------------------------------------------------}}
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
    </style>

    <script>

        $(document).on('change', '#html', function () {
                let template = new FormData();
                template.append('file', $("#html")[0].files[0]);
                template.append('title', $("#html")[0].files[0].name);
                $('#in_use').html('<h5 class="" style="color: #607d8b;">--оберіть шаблон--</h5>')
                $.ajax({
                    url: '{{route('admin.mailing_list.save_html')}}',
                    type: 'POST',
                    cash: false,
                    contentType: false,
                    processData: false,
                    data: template,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: (data) => {
                        $('.mailing').html(data)
                        $('.use_html').html(`<h5 class="" style="color: #0a53be;">` + $("#html")[0].files[0].name + ` </h5>`);
                    }
                })
            $(location).reload();
            });

        $(function () {
            $(document).on('click', '.del-list', function (event) {
                event.preventDefault();
                let list_id = $(this).closest('.lists').find('.list_id').val();
                    $('#in_use').html(`<h5 class="" style="color: #0a53be;">--оберіть шаблон-- </h5>`)

                $.ajax({
                    url: "{{ route('admin.mailing_list.delete_html') }}",
                    type: "POST",
                    data: {
                        'id': list_id,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: (data) => {
                        $('.mailing').html(data);
                    },
                    error: (data) => {
                        console.log(data)
                    }
                });
            });
        });

        $(document).on('click', '#check-list', function () {
            let checkedTemplate = $(this).data('file');
            $('#in_use').html(`<p class="text-primary">` + checkedTemplate + `</p>`)
        })

        $(document).on('click', '#send_mail', function () {
            let users = [] ;
            let i = 0 ;
            let html = $('input[name=mailing_list]:checked').val();
            let radio = $('input[name=email]:checked').val();
            $('.user_id').each(function () {
                users[i] = $(this).closest('.take_user3').find('#idi').val();
                i++;
            })
            console.log(users);
            console.log(html);
            console.log(radio);
                $.ajax({
                    url: '{{ route('admin.mailing_list.send') }}',
                    type: 'POST',
                    data: {
                        users: users,
                        html: html,
                        radio:radio,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: (data) => {
                        $('.done').html('<p id="">' +  Math.round(100 -  (data/data * 100))  + '% </p>')
                        sending(data);
                        $('#send_mail').prop("disabled",true);
                    }
                })
            })

        function sending(firstData){
            $.ajax({
                url: '{{route('admin.mailing_list.sending')}}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (data) => {
                    console.log(data);
                    if (data == 0){
                        $('.done').html('<h5 class="mt-5">Розсилку виконано на: 100% </h5>')
                        $('.reload').html(`<h5 class="mt-5">Кількість листів:` + firstData + `</h5>`)
                        $('#send_mail').prop("disabled",false);
                    }else {
                        $('.reload').html(`<h5 class="mt-5">Кількість листів: ` + data + `</h5>`)
                        $('.done').html('<h5 class="mt-5">Розсилку виконано на: ' + Math.round(100 -  (data/firstData * 100))  + '% </h5>');
                        sending(firstData)
                    }
                }
            })
        }
    </script>

@endsection

