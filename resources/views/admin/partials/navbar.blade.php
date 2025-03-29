<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <!-- Search -->
        <div class="navbar-nav align-items-center">
            <div class="nav-item d-flex align-items-center">
                <i class="bx bx-search fs-4 lh-0"></i>
                <input type="text" class="form-control border-0 shadow-none" placeholder="Search..."
                    aria-label="Search..." />
            </div>
        </div>
        <!-- /Search -->

        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- Place this tag where you want the button to render. -->
            <li class="nav-item lh-1 me-3">
                <ul class="navbar-nav flex-row align-items-center ms-auto">
                    <!-- Place this tag where you want the button to render. -->
                    <li class="nav-item lh-1 me-3">
                    {{-- <li class="nav-item dropdown-language dropdown me-2 me-xl-0">
                        <!-- Language -->
                        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                            data-bs-toggle="dropdown">
                            <i class='icon-base bx bx-globe icon-sm me-1'></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item {{ app()->getLocale() === 'en' ? 'active' : '' }}"
                                    href="{{ url('lang/en') }}" data-language="en" data-text-direction="ltr">
                                    <span class="align-middle">English</span>
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item {{ app()->getLocale() === 'ar' ? 'active' : '' }}"
                                    href="{{ url('lang/ar') }}" data-language="ar" data-text-direction="rtl">
                                    <span class="align-middle">Arabic</span>
                                </a>
                            </li>

                        </ul>
                    </li> --}}
                    <!-- Language -->

                    <!-- Dark-ligth -->
                    {{-- <li class="nav-item dropdown me-2 me-xl-0">
                        <a class="nav-link dropdown-toggle hide-arrow" id="nav-theme" href="javascript:void(0);"
                            data-bs-toggle="dropdown" aria-label="Toggle theme (light)" aria-expanded="false">
                            <i class="bx-sun icon-base bx icon-md theme-icon-active"></i>
                            <span class="d-none ms-2" id="nav-theme-text">Toggle theme</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="nav-theme-text"
                            data-bs-popper="static">
                            <li>
                                <button type="button" class="dropdown-item align-items-center active"
                                    data-bs-theme-value="light" aria-pressed="true">
                                    <span><i class="icon-base bx bx-sun icon-md me-3" data-icon="sun"></i>Light</span>
                                </button>
                            </li>
                            <li>
                                <button type="button" class="dropdown-item align-items-center"
                                    data-bs-theme-value="dark" aria-pressed="false">
                                    <span><i class="icon-base bx bx-moon icon-md me-3" data-icon="moon"></i>Dark</span>
                                </button>
                            </li>
                            <li>
                                <button type="button" class="dropdown-item align-items-center"
                                    data-bs-theme-value="system" aria-pressed="false">
                                    <span><i class="icon-base bx bx-desktop icon-md me-3"
                                            data-icon="desktop"></i>System</span>
                                </button>
                            </li>
                        </ul>
                    </li> --}}

                    <!--/ Dark-ligth -->

                    <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-2">
                        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                            data-bs-toggle="dropdown">
                            <span class="position-relative">
                                <i class="icon-base bx bx-bell icon-md"></i>
                                <span class="badge rounded-pill bg-danger badge-dot badge-notifications border"></span>
                            </span>
                        </a>

                        <!-- Notification -->
                        <ul class="dropdown-menu dropdown-menu-end p-0" data-bs-popper="static">
                            <li class="dropdown-menu-header border-bottom">
                                <div class="dropdown-header d-flex align-items-center py-3">
                                    <h6 class="mb-0 me-auto">Notification</h6>
                                    <div class="d-flex align-items-center h6 mb-0">
                                        <span class="badge bg-label-primary me-2">8 New</span>
                                        <a href="javascript:void(0)" class="dropdown-notifications-all p-2"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            aria-label="Mark all as read" data-bs-original-title="Mark all as read">
                                            <i class="icon-base bx bx-envelope-open text-heading"></i>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li class="dropdown-notifications-list scrollable-container ps">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar">
                                                    <img src="{{ asset('admin-assets') }}/img/avatars/1.png"
                                                        alt="" class="rounded-circle">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="small mb-0">Congratulation Lettie 🎉</h6>
                                                <small class="mb-1 d-block text-body">Won the monthly best seller gold badge</small>
                                                <small class="text-body-secondary">1h ago</small>
                                            </div>
                                            <div class="flex-shrink-0 dropdown-notifications-actions">
                                                <a href="javascript:void(0)" class="dropdown-notifications-read">
                                                    <span class="badge badge-dot"></span>
                                                </a>
                                                <a href="javascript:void(0)" class="dropdown-notifications-archive">
                                                    <span class="icon-base bx bx-x"></span>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar">
                                                    <span class="avatar-initial rounded-circle bg-label-danger">CF</span>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="small mb-0">Charles Franklin</h6>
                                                <small class="mb-1 d-block text-body">Accepted your connection</small>
                                                <small class="text-body-secondary">12hr ago</small>
                                            </div>
                                            <div class="flex-shrink-0 dropdown-notifications-actions">
                                                <a href="javascript:void(0)" class="dropdown-notifications-read">
                                                    <span class="badge badge-dot"></span>
                                                </a>
                                                <a href="javascript:void(0)" class="dropdown-notifications-archive">
                                                    <span class="icon-base bx bx-x"></span>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar">
                                                    <img src="{{ asset('admin-assets') }}/img/avatars/2.png"
                                                        alt="" class="rounded-circle">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="small mb-0">New Message ✉️</h6>
                                                <small class="mb-1 d-block text-body">You have new message from Natalie</small>
                                                <small class="text-body-secondary">1h ago</small>
                                            </div>
                                            <div class="flex-shrink-0 dropdown-notifications-actions">
                                                <a href="javascript:void(0)" class="dropdown-notifications-read">
                                                    <span class="badge badge-dot"></span>
                                                </a>
                                                <a href="javascript:void(0)" class="dropdown-notifications-archive">
                                                    <span class="icon-base bx bx-x"></span>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="border-top">
                                <div class="d-grid p-4">
                                    <a class="btn btn-primary btn-sm d-flex" href="javascript:void(0);">
                                        <small class="align-middle">View all notifications</small>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- / Notification -->

            </li>
            </li>

            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        <img src="{{ asset('admin-assets') }}/img/avatars/1.png" alt
                            class="w-px-40 h-auto rounded-circle" />
                    </div>
                </a>

                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="#">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        <img src="{{ asset('admin-assets') }}/img/avatars/1.png" alt
                                            class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fw-semibold d-block">{{Auth::guard('admin')->user()->name}}</span>
                                    <small class="text-muted">Admin</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="bx bx-user me-2"></i>
                            <span class="align-middle">My Profile</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('admin.settings') }}">
                            <i class="bx bx-cog me-2"></i>
                            <span class="align-middle">Settings</span>
                        </a>
                    </li>
                    <li>

                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    @livewire('admin.auth.admin-logout-component')
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>
</nav>
