
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggler" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
            aria-expanded="false">
            <i class="fa fa-tachometer-alt"></i>
        </a>
        <ul class="dropdown-menu">
            <li>
                <a class="dropdown-item" href="{{ route('admin.default_dashboard') }}">
                    <i class="fa fa-tachometer-alt"></i> Default
                </a>
            </li>
            @can('view-owner-dashboard')
                <li>
                    <a class="dropdown-item" href="{{ route('admin.owner_dashboard') }}">
                        <i class="fa fa-tachometer-alt"></i> Owner
                    </a>
                </li>
            @endcan  
            @can('view-admin-dashboard')
                <li>
                    <a class="dropdown-item" href="{{ route('admin.admin_dashboard') }}">
                        <i class="fa fa-tachometer-alt"></i> Admin
                    </a>
                </li>
            @endcan       
            @can('view-human-resources-dashboard')
                <li>
                    <a class="dropdown-item" href="{{ route('admin.human_resources_dashboard') }}">
                        <i class="fa fa-tachometer-alt"></i> HHRR
                    </a>
                </li>
            @endcan    
        </ul>

    </li>