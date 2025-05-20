<!--
    ===============================================================
    * Variable $user is set at App\Providers\ViewsComposerServiceProvider.
    ===============================================================
-->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="height: auto;">

        <!-- Sidebar user panel (optional) -->
        @if($user)

        <div class="user-panel" style="display: flex; align-items: center; flex-direction: row;">
            <div class="image">
                @include('layouts.partials.user-photo', ['user'=>$user, 'class_image_class'=>'user-image'])
            </div>
            <div class="info">
                <p>
                    <a href="{{ route('admin.profiles.index') }}">
                        {{ $user->profile->name ?? $user->name }}
                    </a>
                </p>
                <!-- Status -->
                <!-- <a href="#"><i class="fa fa-circle text-success"></i> Status</a> -->
            </div>
        </div>

        @endif

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu tree" data-widget="tree">
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-link"></i>
                    <span>QUICK LINKS!</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="/docs" target="__new"><i class="fa fa-circle-o text-red"></i> API Documentation</a>
                    </li>
                </ul>

            </li>

            <li class="header">APP LINKS</li>
            @if ($user && $user->roles)
            @foreach ($user->roles as $role)
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-link"></i>
                    <span>{{ str(__($role->name))->headline() }}</span>
                    <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    @foreach ($role->menus as $menu)
                    <li>
                        <a href="{{ url($menu->name) }}" @if(! str($menu->name)->contains('admin'))
                            target="__new"
                            @endif
                            >
                            <i class="{{ filled($menu->icon) ? $menu->icon : 'fa fa-circle-o' }} text-red">
                            </i> {{ __($menu->display_name) }}
                        </a>
                    </li>
                    @endforeach

                </ul>
                </a>
            </li>


            @endforeach
            @endif



            <li>
                <a href="/support/my_tickets" target="__new">
                    <i class="fa fa-life-ring"></i>
                    <span>Support Tickets</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
            </li>
        </ul>
        <!-- /.sidebar-menu -->

    </section>
    <!-- /.sidebar -->
</aside>
