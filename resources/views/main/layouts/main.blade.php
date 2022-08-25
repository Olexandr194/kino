 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>@yield('title')</title>
    <!-- MDB icon -->
    <link rel="icon" href="{{ asset('images/promin_logo.svg') }}" type="image/x-icon" />
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('custom_js')
    <link rel="icon" href="{{ asset('images/promin_logo.svg') }}" type="image/x-icon" />
</head>
</head>
<body>
<header>
    <nav class="navbar navbar-light bg-light" style="height: 100px">
        <div class="container-fluid" style="margin-right: 200px">
            <ul class="navbar-top-left-menu" style="margin-left: 200px">
                <a class="navbar-brand" href="{{ route('main.main_page') }}"><img class="w-100" src="/images/promin_logo.svg" alt="" style="height: 80px; width: 200px"/></a>
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
                            <a class="nav-link" aria-current="page" href="{{ route('main.poster') }}">Афіша</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('main.schedule') }}">Розклад</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('main.soon') }}">Скоро</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('main.cinemas.index') }}">Кінотеатри</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('main.actions.index') }}">Акції</a>
                        </li>
                        <!-- Navbar dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-mdb-toggle="dropdown">
                                Про кінотеатр
                            </a>
                            <!-- Dropdown menu -->
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('main.pages.index', 1) }}">Про кінотеатр</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('main.news.index') }}">Новини</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('main.pages.index', 2) }}">Кафе-Бар</a>
                                </li>
                                {{--<li><hr class="dropdown-divider" /></li>--}}
                                <li>
                                    <a class="dropdown-item" href="{{ route('main.pages.index', 3) }}">VIP-зал</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('main.pages.index', 5) }}">Дитяча кімнатар</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('main.pages.index', 4) }}">Реклама</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('main.pages.contact_page') }}">Контакти</a>
                                </li>
                            </ul>
                        </li>
                        <div class="d-flex" style="margin-left: 215px">
                            @guest()
                            <button type="button" class="btn btn-dark me-3" style="height: 40px">
                                <a class="text-white" href="{{ route('login') }}">Увійти</a>
                            </button>
                            <button type="button" class="btn btn-dark me-3" style="height: 40px">
                                <a class="text-white" href="{{ route('register') }}">Зареєструватися</a>
                            </button>
                            @endguest
                            @auth()
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <input class="btn btn-dark" type="submit" value="Вийти" style="height: 40px">
                                        </form>
                                    <button type="button" class="btn btn-dark me-3" style="height: 40px; margin-left: 20px">
                                        <a class="text-white" href="{{ route('personal.index') }}">Особистий кабінет</a>
                                    </button>
                            @endauth
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
<!-- Start your project here-->
@yield('content')
<!-- End your project here-->
<!-- Footer -->
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

    <!-- Copyright -->
</footer>
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Footer -->
<!-- MDB -->
<script type="text/javascript" src="{{ asset('test/js/mdb.min.js') }}"></script>
<!-- Custom scripts -->
<script type="text/javascript"></script>
</body>
</html>
