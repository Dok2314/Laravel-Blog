<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('admins.main') }}" class="nav-link {{ request()->routeIs('admins.main') ? 'active' : ''}}">
                    <i class="fas fa-home"></i>
                    <p>
                        Главная
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('personal.liked') }}" class="nav-link {{ request()->routeIs('personal.liked') ? 'active' : ''}}">
                    <i class="fab fa-gratipay"></i>
                    <p>
                        Понравившиеся посты
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('personal.comment.index') }}" class="nav-link {{ request()->routeIs('personal.comment') ? 'active' : ''}}">
                    <i class="fas fa-comment"></i>
                    <p>
                        Комментарии
                    </p>
                </a>
            </li>
        </ul>
    </div>
</aside>
