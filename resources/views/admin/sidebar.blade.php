<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.main') }}" class="">
        <img src="{{ asset('images/promin_logo.svg') }}" class="w-100" style="height: 100px; width: 100px">
        {{--<img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">--}}
        {{--<span class="brand-text font-weight-light">Kino CMS</span>--}}
    </a>
    <div class="sidebar">
        <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('admin.main') }}" class="nav-link">
                    <i class="nav-icon fas fa-arrow-alt-circle-up"></i>
                    <p>
                        Статистика
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.banners.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-table"></i>
                    <p>
                        Банери
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.movies.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-file-video"></i>
                    <p>
                        Фільми
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.cinemas.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-film"></i>
                    <p>
                        Кінотеатри
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.news.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-newspaper"></i>
                    <p>
                        Новини
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.actions.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-percent"></i>
                    <p>
                        Акції
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.pages.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-file"></i>
                    <p>
                        Сторінки
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.users.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-user-astronaut"></i>
                    <p>
                        Користувачі
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.schedules.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-calendar-day"></i>
                    <p>
                        Розклад сеансів
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.mailing_list.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-mail-bulk"></i>
                    <p>
                        Розсилка
                    </p>
                </a>
            </li>
        </ul>
    </div>
</aside>
