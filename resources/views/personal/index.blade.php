<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Особистий кабінет</title>
    <!-- MDB icon -->
    <link rel="icon" href="{{--{{ asset('images/img.png') }}--}}" type="image/x-icon" />
    <!-- Font Awesome -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <!-- Google Fonts Roboto -->
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="{{ asset('test/css/mdb.min.css') }}" />
</head>
<body>
<header>
    <nav class="navbar navbar-light bg-light" style="height: 100px">
        <div class="container-fluid" style="margin-right: 200px">
            <ul class="navbar-top-left-menu" style="margin-left: 200px">
                <a class="navbar-brand" href="#"><img class="w-100" src="/images/img.png" alt="" style="height: 80px; width: 200px"/></a>
            </ul>
            <form class="d-flex input-group w-auto">
                <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon"/>
                <span class="input-group-text border-0" id="search-addon"><i class="fas fa-search"></i></span>
            </form>
            <a class="nav-link text-dark" href="#" style="margin-left: 50px">
                <i class="fab fa-twitter fa-2x"></i>
                <i class="fab fa-facebook fa-2x"></i>
                <i class="fab fa-instagram fa-2x"></i>
                <i class="fab fa-google-plus-g fa-2x"></i>
                <i class="fab fa-odnoklassniki fa-2x"></i>
                <i class="fab fa-vk fa-2x"></i>
            </a>
            <div>
                <h3>(050) 778-55-77</h3>
                <h3>(050) 778-55-77</h3>
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" >
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarRightAlignExample"
                    aria-controls="navbarRightAlignExample" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="" style="margin-left: 650px">
                <div class="collapse navbar-collapse" id="navbarRightAlignExample">
                    <!-- Left links -->
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Афіша</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Розклад</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Скоро</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Кінотеатри</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Акції</a>
                        </li>
                        <!-- Navbar dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                                Про кінотеатр
                            </a>
                            <!-- Dropdown menu -->
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="#">Новини</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">Кафе-Бар</a>
                                </li>
                                {{--<li><hr class="dropdown-divider" /></li>--}}
                                <li>
                                    <a class="dropdown-item" href="#">VIP-ал</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">Дитяча кімнатар</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">Реклама</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">Контакти</a>
                                </li>
                            </ul>
                        </li>
                        <div class="d-flex" style="margin-left: 215px">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <input class="btn btn-dark" type="submit" value="Вийти" style="height: 40px">
                                </form>
                                <button type="button" class="btn btn-dark me-3" style="height: 40px; margin-left: 20px">
                                    <a class="text-white" href="{{ route('main.main_page') }}">На головну</a>
                                </button>
                        </div>
                    </ul>
                    <!-- Left links -->
                </div>

            </div>
            <!-- Collapsible wrapper -->
        </div>
        <!-- Container wrapper -->
    </nav>

</header>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper mt-5">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('personal.update', $user->id) }}" method="POST" enctype="multipart/form-data">
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
                                            <select name="city" class="form-control col-md-8" style="height: 33px; width: 540px">
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
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-5 mb-5">
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

<footer class="text-center text-lg-start bg-white text-muted mt-5">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
        <!-- Left -->
        <div class="me-5 d-none d-lg-block">
            <span>Get connected with us on social networks:</span>
        </div>
        <!-- Left -->

        <!-- Right -->
        <div>
            <a href="" class="me-4 link-grayish">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="" class="me-4 link-grayish">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="" class="me-4 link-grayish">
                <i class="fab fa-google"></i>
            </a>
            <a href="" class="me-4 link-grayish">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="" class="me-4 link-grayish">
                <i class="fab fa-linkedin"></i>
            </a>
            <a href="" class="me-4 link-grayish">
                <i class="fab fa-github"></i>
            </a>
        </div>
        <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
        <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        <i class="fas fa-gem me-3 text-grayish"></i>Company name
                    </h6>
                    <p>
                        Here you can use rows and columns to organize your footer content. Lorem ipsum
                        dolor sit amet, consectetur adipisicing elit.
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Products
                    </h6>
                    <p>
                        <a href="#!" class="text-reset">Angular</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">React</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Vue</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Laravel</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Useful links
                    </h6>
                    <p>
                        <a href="#!" class="text-reset">Pricing</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Settings</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Orders</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Help</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                    <p><i class="fas fa-home me-3 text-grayish"></i> New York, NY 10012, US</p>
                    <p>
                        <i class="fas fa-envelope me-3 text-grayish"></i>
                        info@example.com
                    </p>
                    <p><i class="fas fa-phone me-3 text-grayish"></i> + 01 234 567 88</p>
                    <p><i class="fas fa-print me-3 text-grayish"></i> + 01 234 567 89</p>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.025);">
        © 2021 Copyright:
        <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->
<!-- MDB -->
<script type="text/javascript" src="{{ asset('test/js/mdb.min.js') }}"></script>
<!-- Custom scripts -->
<script type="text/javascript"></script>
<script>
    $(function () {
        $('#datetimepicker4').datetimepicker({
            format: 'L',
            locale: 'ua'
        });
    });
</script>
</body>
</html>






