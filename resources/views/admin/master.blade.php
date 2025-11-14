<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('admin-assets') }}/" data-template="vertical-menu-template-free">
@include('admin.partials.head')

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            <!-- Menu -->
            @include('admin.partials.sidebar')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                @include('admin.partials.navbar')

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Success Toast Popup -->
                    @if (session('success'))
                        <div id="successToast" class="toast-popup" style="position: fixed; top: 24px; left: 24px; z-index: 9999; max-width: 400px; width: 90%;">
                            <div style="background: white; border-radius: 16px; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); overflow: hidden; border-right: 4px solid #10b981;">
                                <!-- Progress Bar -->
                                <div class="toast-progress" style="height: 4px; background: linear-gradient(to right, #10b981, #059669);"></div>
                                
                                <div style="padding: 24px;">
                                    <div style="display: flex; align-items: flex-start; gap: 16px;">
                                        <!-- Icon -->
                                        <div style="flex-shrink: 0;">
                                            <div class="checkmark-icon" style="width: 56px; height: 56px; background: linear-gradient(to bottom right, #10b981, #059669); border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);">
                                                <i class="fas fa-check" style="color: white; font-size: 20px;"></i>
                                            </div>
                                        </div>
                                        
                                        <!-- Content -->
                                        <div style="flex: 1;">
                                            <h3 style="font-size: 18px; font-weight: bold; color: #111827; margin-bottom: 4px;">
                                                <i class="fas fa-check-circle" style="color: #10b981; margin-left: 8px;"></i>
                                                تم بنجاح!
                                            </h3>
                                            <p style="color: #374151; line-height: 1.625;">
                                                {{ session('success') }}
                                            </p>
                                        </div>
                                        
                                        <!-- Close Button -->
                                        <button onclick="closeToast()" style="flex-shrink: 0; color: #9ca3af; background: none; border: none; cursor: pointer; padding: 4px; transition: color 0.2s;" onmouseover="this.style.color='#4b5563'" onmouseout="this.style.color='#9ca3af'">
                                            <i class="fas fa-times" style="font-size: 18px;"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Content -->
                    @yield('content')
                    <!-- / Content -->

                    <!-- Footer -->
                    @include('admin.partials.footer')
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
    @include('admin.partials.scripts')
</body>

</html>
