<nav id="sidebar" class="sidebar-wrapper sidebar-dark">
    <div class="sidebar-content" data-simplebar style="height: calc(100% - 60px);">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">
                <img src="{{ asset('assets/images/pupr-logo.png') }}" height="24" class="logo-light-mode" alt="">
                <img src="{{ asset('assets/images/pupr-logo.png') }}" height="24" class="logo-dark-mode"
                    alt="">
                <span class="sidebar-colored">
                    <img src="{{ asset('assets/images/pupr-logo.png') }}" height="24" alt="">
                </span>
            </a>
        </div>

        <!-- sidebar-menu  -->
        <ul class="sidebar-menu">
            <li><a href="{{ route('admin.dashboard') }}"><i class="ti ti-home me-2"></i>Dashboard</a></li>
            {{-- MENU UNTUK ADMIN --}}
            @if (session('user_role') == 1)
                <li><a href="{{ route('admin.manageuser') }}"><i class="ti ti-user me-2"></i>Kelola User</a></li>
                <li><a href="{{ route('luwesapitest') }}"><i class="ti ti-user me-2"></i>TEST API</a></li>
                {{-- MENU UNTUK USER --}}
            @elseif (session('user_role') == 2)
                <li><a href="{{ route('admin.manageuser') }}"><i class="ti ti-user me-2"></i>Kelola User</a></li>
            @endif
        </ul>
        <!-- sidebar-menu  -->
    </div>

    <!-- Sidebar Footer -->
    {{-- <ul class="sidebar-footer list-unstyled mb-0">
        <li class="list-inline-item mb-0">
            <a href="https://1.envato.market/landrick" target="_blank" class="btn btn-icon btn-soft-light"><i
                    class="ti ti-shopping-cart"></i></a> <small class="text-muted fw-medium ms-1">Buy Now</small>
        </li>
    </ul> --}}
    <!-- Sidebar Footer -->
</nav>
