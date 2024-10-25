<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.index') }}" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Site Builder</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">MAIN</li>
                <li class="nav-item">
                    <a href="{{ route('admin.settings.index') }}" class="nav-link @if(request()->routeIs('admin.settings.index')) bg-secondary @endif">
                        <i class="nav-icon fas fa-cogs"></i>
                        Settings
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.pages.index') }}" class="nav-link @if(request()->routeIs('admin.pages.index')) bg-secondary @endif">
                        <i class="nav-icon fas fa-th"></i>
                        Pages
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.menus.index') }}"
                       class="nav-link @if(request()->routeIs('admin.menus.index')) bg-secondary @endif">
                        <i class="nav-icon fas fa-th"></i>
                        Menus
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.tags.index') }}"
                       class="nav-link @if(request()->routeIs('admin.tags.index')) bg-secondary @endif">
                        <i class="nav-icon fas fa-list"></i>
                        Tags
                    </a>
                </li>
                <li class="nav-header">TEMPLATES</li>
                <li class="nav-item">
                    <a href="{{ route('admin.templates.index') }}"
                       class="nav-link @if(request()->routeIs('admin.templates.index')) bg-secondary @endif">
                        <i class="nav-icon fas fa-code"></i>
                        Templates
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.templates.general') }}"
                       class="nav-link @if(request()->routeIs('admin.templates.general')) bg-secondary @endif">
                        <i class="nav-icon fas fa-code"></i>
                        General Templates
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.general-blocks.index') }}"
                       class="nav-link @if(request()->routeIs('admin.general-blocks.general')) bg-secondary @endif">
                        <i class="nav-icon fas fa-square-full"></i>
                        General Blocks
                    </a>
                </li>
                <li class="nav-header">SYSTEM</li>
                <li class="nav-item">
                    <a href="{{ route('admin.backups.index') }}"
                       class="nav-link @if(request()->routeIs('admin.backups.index')) bg-secondary @endif">
                        <i class="nav-icon fas fa-backward"></i>
                        Backups
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.events.index') }}"
                       class="nav-link @if(request()->routeIs('admin.events.index')) bg-secondary @endif">
                        <i class="nav-icon fas fa-history"></i>
                        History
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.docs.index') }}"
                       class="nav-link @if(request()->routeIs('admin.docs.index')) bg-secondary @endif">
                        <i class="nav-icon fas fa-floppy-disk"></i>
                        API Docs
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
