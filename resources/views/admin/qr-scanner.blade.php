@extends('admin.master')

@section('qr-scanner-active', 'active')
@section('title', 'QR Code Scanner')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold py-3 mb-0">
                <span class="text-muted fw-light">@lang('Dashboard') /</span> @lang('QR Code Scanner')
            </h4>
        </div>

        <div id="qr-scanner-app">
            <div class="row g-4">
                <!-- Scanner Section -->
                <div class="col-lg-6">
                    <div class="card h-100">
                        <div class="card-header">
                            <h5 class="mb-0">
                                <i class="bx bx-camera me-2"></i>
                                @lang('Camera Scanner')
                            </h5>
                        </div>
                        <div class="card-body text-center">
                            <div id="qr-reader" style="width: 100%;"></div>
                            
                            <div v-if="scanning" class="mt-3">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="visually-hidden">@lang('Processing...')</span>
                                </div>
                                <p class="mt-2 text-muted">@lang('Processing QR code...')</p>
                            </div>
                            
                            <div class="mt-3">
                                <small class="text-muted">
                                    @lang('Scanner Status'): <span id="scanner-status" class="fw-semibold">@lang('Initializing...')</span>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Results Section -->
                <div class="col-lg-6">
                    <div class="card h-100">
                        <div class="card-header">
                            <h5 class="mb-0">
                                <i class="bx bx-check-shield me-2"></i>
                                @lang('Scan Results')
                            </h5>
                        </div>
                        <div class="card-body">
                            <!-- Success Result -->
                            <div v-if="scanResult && scanResult.success" class="alert alert-success">
                                <h6 class="alert-heading">
                                    <i class="fas fa-check-circle me-2"></i>@lang('Attendance Validated!')
                                </h6>
                                <hr>
                                <div class="row g-3">
                                    <div class="col-6">
                                        <strong>@lang('Name'):</strong><br>
                                        <span v-text="scanResult.attendance.name"></span>
                                    </div>
                                    <div class="col-6">
                                        <strong>@lang('Email'):</strong><br>
                                        <span v-text="scanResult.attendance.email"></span>
                                    </div>
                                    <div class="col-12">
                                        <strong>@lang('Event'):</strong><br>
                                        <span v-text="scanResult.attendance.event_title"></span>
                                    </div>
                                    <div class="col-6">
                                        <strong>@lang('Location'):</strong><br>
                                        <span v-text="scanResult.attendance.event_location"></span>
                                    </div>
                                    <div class="col-6">
                                        <strong>@lang('Date'):</strong><br>
                                        <span v-text="scanResult.attendance.event_date"></span>
                                    </div>
                                    <div class="col-6">
                                        <strong>@lang('Checked In At'):</strong><br>
                                        <span v-text="scanResult.attendance.checked_in_at"></span>
                                    </div>
                                    <div class="col-6">
                                        <strong>@lang('Checked In By'):</strong><br>
                                        <span v-text="scanResult.attendance.checked_in_by"></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Error Result -->
                            <div v-if="scanResult && !scanResult.success" class="alert alert-danger">
                                <h6 class="alert-heading">
                                    <i class="fas fa-exclamation-triangle me-2"></i>@lang('Validation Failed')
                                </h6>
                                <p v-text="scanResult.message" class="mb-0"></p>
                                <div v-if="scanResult.attendance" class="mt-3">
                                    <hr>
                                    <div class="row">
                                        <div class="col-6">
                                            <strong>@lang('Name'):</strong><br>
                                            <span v-text="scanResult.attendance.name"></span>
                                        </div>
                                        <div class="col-6">
                                            <strong>@lang('Already Used At'):</strong><br>
                                            <span v-text="scanResult.attendance.used_at"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- No Scan Yet -->
                            <div v-if="!scanResult" class="text-center text-muted py-5">
                                <div class="avatar avatar-xl bg-label-secondary rounded-circle mb-3 mx-auto">
                                    <i class="bx bx-qr-scan fs-1"></i>
                                </div>
                                <h5 class="mb-2">@lang('Ready to Scan')</h5>
                                <p class="mb-0">@lang('Scan a QR code to see results here')</p>
                            </div>

                            <!-- Action Buttons -->
                            <div v-if="scanResult" class="mt-4 text-center">
                                <button @click="clearResult" class="btn btn-outline-secondary me-2">
                                    <i class="bx bx-refresh me-1"></i>@lang('Scan Another')
                                </button>
                                <button v-if="scanResult.success" @click="printResult" class="btn btn-primary">
                                    <i class="bx bx-printer me-1"></i>@lang('Print Receipt')
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-scripts')
    <!-- Vue.js and QR Code Scanner Library -->
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>

    <script>
        const { createApp } = Vue;

        createApp({
            data() {
                return {
                    scanning: false,
                    scanResult: null,
                    validating: false,
                    html5QrcodeScanner: null
                }
            },
            mounted() {
                setTimeout(() => {
                    this.initScanner();
                }, 1000);
            },
            methods: {
                initScanner() {
                    try {
                        this.updateScannerStatus('@lang('Initializing...')');

                        this.html5QrcodeScanner = new Html5QrcodeScanner(
                            "qr-reader", {
                                fps: 10,
                                qrbox: {
                                    width: 250,
                                    height: 250
                                },
                                aspectRatio: 1.0,
                                supportedScanTypes: [Html5QrcodeScanType.SCAN_TYPE_CAMERA],
                                showTorchButtonIfSupported: true,
                                showZoomSliderIfSupported: true,
                                defaultZoomValueIfSupported: 2,
                                useBarCodeDetectorIfSupported: true
                            },
                            false
                        );

                        this.updateScannerStatus('@lang('Starting camera...')');
                        this.html5QrcodeScanner.render(this.onScanSuccess, this.onScanFailure);
                        this.updateScannerStatus('@lang('Ready - Point camera at QR code')');

                    } catch (error) {
                        console.error('Error initializing QR scanner:', error);
                        this.updateScannerStatus('Error: ' + error.message);
                        alert('@lang('Error initializing camera scanner'): ' + error.message);
                    }
                },

                updateScannerStatus(message) {
                    const statusElement = document.getElementById('scanner-status');
                    if (statusElement) {
                        statusElement.textContent = message;
                    }
                },

                onScanSuccess(decodedText, decodedResult) {
                    this.updateScannerStatus('@lang('QR Code detected! Processing...')');

                    // Stop the scanner to prevent multiple scans
                    if (this.html5QrcodeScanner) {
                        this.html5QrcodeScanner.clear().catch(err => console.error(err));
                    }

                    this.validateQRData(decodedText);
                },

                onScanFailure(error) {
                    // Only log meaningful errors, not the frequent "not found" errors
                    if (error && !error.includes("NotFoundException")) {
                        console.log('Scan error:', error);
                    }
                },

                validateQRData(qrData) {
                    this.validating = true;
                    this.scanning = true;

                    fetch('{{ route('admin.validate-qr') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                qr_data: qrData
                            })
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error(`HTTP ${response.status}: ${response.statusText}`);
                            }
                            return response.json();
                        })
                        .then(data => {
                            this.scanResult = data;
                            this.validating = false;
                            this.scanning = false;

                            if (data.success) {
                                this.updateScannerStatus('@lang('Validation successful!')');
                            } else {
                                this.updateScannerStatus('@lang('Validation failed')');
                            }
                        })
                        .catch(error => {
                            console.error('Validation error:', error);
                            this.scanResult = {
                                success: false,
                                message: '@lang('Network error occurred'): ' + error.message
                            };
                            this.validating = false;
                            this.scanning = false;
                            this.updateScannerStatus('Error: ' + error.message);
                        });
                },

                clearResult() {
                    this.scanResult = null;
                    this.restartScanner();
                },

                restartScanner() {
                    if (this.html5QrcodeScanner) {
                        this.html5QrcodeScanner.clear().catch(err => console.error(err));
                    }

                    setTimeout(() => {
                        this.initScanner();
                    }, 500);
                },

                printResult() {
                    if (this.scanResult && this.scanResult.success) {
                        const printContent = `
                            <div style="font-family: Arial, sans-serif; padding: 20px;">
                                <h2>@lang('Attendance Confirmation')</h2>
                                <hr>
                                <p><strong>@lang('Name'):</strong> ${this.scanResult.attendance.name}</p>
                                <p><strong>@lang('Email'):</strong> ${this.scanResult.attendance.email}</p>
                                <p><strong>@lang('Event'):</strong> ${this.scanResult.attendance.event_title}</p>
                                <p><strong>@lang('Location'):</strong> ${this.scanResult.attendance.event_location}</p>
                                <p><strong>@lang('Date'):</strong> ${this.scanResult.attendance.event_date}</p>
                                <p><strong>@lang('Checked In At'):</strong> ${this.scanResult.attendance.checked_in_at}</p>
                                <p><strong>@lang('Checked In By'):</strong> ${this.scanResult.attendance.checked_in_by}</p>
                                <hr>
                                <p><em>@lang('Thank you for attending!')</em></p>
                            </div>
                        `;

                        const printWindow = window.open('', '_blank');
                        printWindow.document.write(printContent);
                        printWindow.document.close();
                        printWindow.print();
                    }
                }
            }
        }).mount('#qr-scanner-app');
    </script>
@endpush
