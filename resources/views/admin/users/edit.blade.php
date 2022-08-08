@extends('admin.layout')
@section('title', 'Користувачі')

@section('custom_js')

@endsection
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                        <div class="card">
                            <div class="card-header bg-dark">
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-4">
                                        <div class="d-flex mb-4">
                                            <label class="col-md-3">Ім'я</label>
                                            <input class="w-100 mr-5" type="text" name="name"
                                                   placeholder="Ім'я"
                                                   value="{{ $user->name }}">
                                            @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="d-flex mb-4">
                                            <label class="col-md-3">Прізвище</label>
                                            <input class="w-100 mr-5" type="text" name="surname"
                                                   placeholder="Прізвище"
                                                   value="{{ $user->surname }}">
                                            @error('surname')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="d-flex mb-4">
                                            <label class="col-md-3">Псевдонім</label>
                                            <input class="w-100 mr-5" type="text" name="nickname"
                                                   placeholder="Псевдонім"
                                                   value="{{ $user->nickname }}">
                                            @error('nickname')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="d-flex mb-4">
                                            <label class="col-md-3">Email</label>
                                            <input class="w-100 mr-5" type="text" name="email"
                                                   placeholder="Email"
                                                   value="{{ $user->email }}">
                                            @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                                        </div>
                                        <div class="d-flex mb-4">
                                            <label class="col-md-3">Адреса</label>
                                            <input class="w-100 mr-5" type="text" name="address"
                                                   placeholder="Адреса"
                                                   value="{{ $user->address }}">
                                            @error('address')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="d-flex mb-4">
                                            <label class="col-md-3">Пароль</label>
                                            <input class="w-100 mr-5" type="text" name="password"
                                                   placeholder="Пароль"
                                                   value="{{ $user->password }}">
                                            @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="d-flex mb-4">
                                            <label class="col-md-3">Номер картки</label>
                                            <input class="w-100 mr-5" type="text" name="card_number"
                                                   placeholder="Номер картки"
                                                   value="{{ $user->card_number }}">
                                            @error('card_number')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-5 ml-3">
                                        <div class="d-flex mb-4">
                                            <label class="col-md-3">Мова</label>
                                            <div class="form-check mr-3">
                                                <input class="form-check-input" type="radio" name="language" value="Українська"
                                                    {{ $user->language == "Українська" ? 'checked' : '' }}>Українська
                                            </div>
                                            <div class="form-check ml-3">
                                                <input class="form-check-input" type="radio" name="language" value="Російська"
                                                    {{ $user->language == "Російська" ? 'checked' : '' }}>Російська
                                            </div>
                                        </div>
                                        <div class="d-flex mb-3">
                                            <label class="col-md-3">Стать</label>
                                            <div class="form-check mr-4">
                                                <input class="form-check-input" type="radio" name="sex" value="Чоловік  "
                                                    {{ $user->sex == "Чоловік" ? 'checked' : '' }}>Чоловік
                                            </div>
                                            <div class="form-check ml-4">
                                                <input class="form-check-input" type="radio" name="sex" value="Жінка"
                                                    {{ $user->sex == "Жінка" ? 'checked' : '' }}>Жінка
                                            </div>
                                        </div>
                                        <div class="d-flex mb-4">
                                            <label class="col-md-3">Телефон</label>
                                            <input class="w-100 mr-5" type="text" name="phone"
                                                   placeholder="Телефон"
                                                   value="{{ $user->phone }}">
                                            @error('phone')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="d-flex mb-4">
                                            <label class="col-md-3">Дата народження</label>
                                            <div class="input-group date w-100" id="datetimepicker4" style="height: 25px"
                                                 data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input col-md-10"
                                                       data-target="#datetimepicker4" name="birthday" value="{{ $user->birthday }}"/>
                                                <div class="input-group-append" data-target="#datetimepicker4"
                                                     data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                            @error('birthday')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="d-flex mb-4">
                                            <label class="col-md-3">Місто</label>
                                            <select name="city" class="form-control col-md-8" style="height: 33px">
                                                    <option value="Оберіть місто"
                                                        {{ $user->city == 'Оберіть місто' ? ' selected' : '' }}
                                                    >Оберіть місто</option>
                                                <option value="Луцьк"
                                                    {{ $user->city == 'Луцьк' ? ' selected' : '' }}
                                                >Луцьк</option>
                                                <option value="Київ"
                                                    {{ $user->city == 'Київ' ? ' selected' : '' }}
                                                >Київ</option>
                                                <option value="Одеса"
                                                    {{ $user->city == 'Одеса' ? ' selected' : '' }}
                                                >Одеса</option>
                                                <option value="Львів"
                                                    {{ $user->city == 'Львів' ? ' selected' : '' }}
                                                >Львів</option>
                                            </select>
                                            @error('city')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="d-flex mb-4">
                                            <label class="col-md-3">Повторний пароль</label>
                                            <input class="w-100 mr-5" type="text" name="password"
                                                   placeholder="Пароль"
                                                   value="{{ $user->password }}">
                                            @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="d-flex mb-4">
                                            <label class="col-md-3">Оберіть роль</label>
                                            <select name="role" class="form-control col-md-8" style="height: 33px">
                                                @foreach($roles as $id => $role)
                                                    <option value="{{ $id }}"
                                                        {{ $id == $user->role ? ' selected' : '' }}
                                                    >{{ $role }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-5 ">
                                <div class="text-center">
                                    <input type="submit" class="btn btn-dark" value="Зберегти" style="width: 220px">
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
    </style>

    <script>
        $(function () {
            $('#datetimepicker4').datetimepicker({
                format: 'L',
                locale: 'ua'
            });
        });
    </script>

@endsection

