<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('admin.category.index') }}" class="nav-link {{ request()->routeIs('admin.category.index') ? 'active' : ''}}">
                    <i class="fas fa-th-list"></i>
                    <p>
                        Категории
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.tag.index') }}" class="nav-link {{ request()->routeIs('admin.tag.index') ? 'active' : ''}}">
                    <i class="fas fa-tags"></i>
                    <p>
                        Теги
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.post.index') }}" class="nav-link {{ request()->routeIs('admin.post.index') ? 'active' : ''}}">
                    <i class="fas fa-mail-bulk"></i>
                    <p>
                        Посты
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.user.index') }}" class="nav-link {{ request()->routeIs('admin.user.index') ? 'active' : ''}}">
                    <i class="fas fa-users"></i>
                    <p>
                        Пользователи
                    </p>
                </a>
            </li>
        </ul>
    </div>
</aside>
