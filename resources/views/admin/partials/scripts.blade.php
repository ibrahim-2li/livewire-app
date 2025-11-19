    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('admin-assets') }}/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ asset('admin-assets') }}/vendor/libs/popper/popper.js"></script>
    <script src="{{ asset('admin-assets') }}/vendor/js/bootstrap.js"></script>
    <script src="{{ asset('admin-assets') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="{{ asset('admin-assets') }}/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('admin-assets') }}/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="{{ asset('admin-assets') }}/js/main.js"></script>
    <script src="{{ asset('admin-assets') }}/js/charts-chartjs-legend.js"></script>
    <script src="{{ asset('admin-assets') }}/vendor/libs/chartjs/chartjs.js"></script>

    <!-- Page JS -->
    <script src="{{ asset('admin-assets') }}/js/dashboards-analytics.js"></script>
    <script src="{{ asset('admin-assets') }}/js/pages-account-settings-account.js"></script>


    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            Livewire.hook('morph.updated', (el, component) => {
                const mySuccessAlert = document.querySelector('.my-success-alert');
                if (mySuccessAlert) {
                    setTimeout(() => {
                        mySuccessAlert.style.display = 'none';
                    }, 2000);
                }
            });
        });
        window.addEventListener('createModalToggle', event => {
            $('#createModal').modal('toggle');
        });
        window.addEventListener('editModalToggle', event => {
            $('#editModal').modal('toggle');
        });
        window.addEventListener('deleteModalToggle', event => {
            $('#deleteModal').modal('toggle');
        });
        window.addEventListener('showModalToggle', event => {
            $('#showModal').modal('toggle');
        });

        // Toast notification functions
        function closeToast() {
            const toast = document.getElementById('successToast');
            if (toast) {
                toast.classList.add('hiding');
                setTimeout(() => {
                    toast.remove();
                }, 500);
            }
        }

        // Auto-hide toast after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const toast = document.getElementById('successToast');
            if (toast) {
                setTimeout(() => {
                    closeToast();
                }, 5000);
            }
        });
    </script>
