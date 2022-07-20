<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.main') }}" class="">
        <img src="{{ asset('images/img.png') }}" class="w-100">
        {{--<img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">--}}
        {{--<span class="brand-text font-weight-light">Kino CMS</span>--}}
    </a>
    <div class="sidebar">
        <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('admin.cinemas.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-film"></i>
                    <p>
                        Кінотеатри
                    </p>
                </a>
            </li>
        </ul>

    </div>
</aside>
