<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-compact nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon far fa-circle"></i>
                <p>
                    QUICK LINKS
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/docs" class="nav-link">
                        <p>{{ __('API Documentation') }}</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-header">APP LINKS</li>
        @if ($user && $user->roles)
            @foreach ($user->roles as $role)
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle"></i>
                        <p>
                            {{ __(personName($role->name)) }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @foreach ($role->menus as $menu)
                            <li class="nav-item">
                                <a href="{{ url($menu->name) }}" class="nav-link">
                                    <i class="{{ filled($menu->icon) ? $menu->icon : 'far fa-circle' }} text-red nav-icon">
                                    </i> 
                                    <p>{{ __($menu->display_name) }}</p>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        @endif
    </ul>
</nav>