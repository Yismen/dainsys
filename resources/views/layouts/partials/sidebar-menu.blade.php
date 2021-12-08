<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">QUICK LINKS</li>
        <li class="nav-item">Item</li>
        <li class="nav-header">MULTI LEVEL EXAMPLE</li>
        @if ($user && $user->roles)
            @foreach ($user->roles as $role)
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            {{ __(personName($role->name)) }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @foreach ($role->menus as $menu)
                            <li class="nav-item">
                                <a href="{{ url($menu->name) }}" class="nav-link">
                                    <i class="{{ filled($menu->icon) ? $menu->icon : 'far fa-circle-o' }} text-red nav-icon">
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