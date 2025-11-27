@extends('admin.master')

@section('qr-scanner-active', 'active')
@section('title', 'QR Code Scanner')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-qrcode me-2"></i>
                            @lang('QR Code Scanner')
                        </h5>
                    </div>
                    <div class="card-body">
                        <div id="qr-scanner-app">
                            <div class="row">
                                <!-- Scanner Section -->
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h6 class="mb-0">@lang('Camera Scanner')</h6>
                                        </div>
                                        <div class="card-body text-center">
                                            <div id="qr-reader" style="width: 100%;"></div>
                                            <div v-if="scanning" class="mt-3">
                                                <div class="spinner-border text-primary" role="status">
                                                    <span class="visually-hidden">@lang('Processing...')</span>
                                                </div>
                                                <p class="mt-2 text-muted">@lang('Processing QR code...')</p>
                                            </div>
                                            <div class="mt-2">
                                                <small class="text-muted">
                                                    @lang('Scanner Status') : <span id="scanner-status">@lang('Initializing...')</span>
                                                </small>
                                                <br>
                                                <small class="text-info">
                                                    @lang('Debug') : <span id="debug-info">@lang('Waiting for initialization...')</span>
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Results Section -->
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h6 class="mb-0">@lang('Scan Results')</h6>
                                        </div>
                                        <div class="card-body">
                                            <!-- Success Result -->
                                            <div v-if="scanResult && scanResult.success" class="alert alert-success">
                                                <h6><i class="fas fa-check-circle me-2"></i>@lang('Attendance Validated!')</h6>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <strong>@lang('Name') :</strong><br>
                                                        <span v-text="scanResult.attendance.name"></span>
                                                    </div>
                                                    <div class="col-6">
                                                        <strong>@lang('Email') :</strong><br>
                                                        <span v-text="scanResult.attendance.email"></span>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <strong>@lang('Event') :</strong><br>
                                                        <span v-text="scanResult.attendance.event_title"></span>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <strong>@lang('Location') :</strong><br>
                                                        <span v-text="scanResult.attendance.event_location"></span>
                                                    </div>
                                                    <div class="col-6">
                                                        <strong>@lang('Date') :</strong><br>
                                                        <span v-text="scanResult.attendance.event_date"></span>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <strong>@lang('Checked In At') :</strong><br>
                                                        <span v-text="scanResult.attendance.checked_in_at"></span>
                                                    </div>
                                                    <div class="col-6">
                                                        <strong>@lang('Checked In By') :</strong><br>
                                                        <span v-text="scanResult.attendance.checked_in_by"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Error Result -->
                                            <div v-if="scanResult && !scanResult.success" class="alert alert-danger">
                                                <h6><i class="fas fa-exclamation-triangle me-2"></i>@lang('Validation Failed')</h6>
                                                <p v-text="scanResult.message"></p>
                                                <div v-if="scanResult.attendance" class="mt-3">
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <strong>@lang('Name') :</strong><br>
                                                            <span v-text="scanResult.attendance.name"></span>
                                                        </div>
                                                        <div class="col-6">
                                                            <strong>@lang('Already Used At') :</strong><br>
                                                            <span v-text="scanResult.attendance.used_at"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- No Scan Yet -->
                                            <div v-if="!scanResult" class="text-center text-muted">
                                                <i class="fas fa-qrcode fa-3x mb-3"></i>
                                                <p>@lang('Scan a QR code to see results here')</p>
                                                <div class="mt-3">
                                                    {{-- <button @click="testScanFunction"
                                                        class="btn btn-sm btn-outline-warning">
                                                        <i class="fas fa-bug me-1"></i>Test Scan
                                                    </button> --}}
                                                </div>
                                            </div>

                                            <!-- Action Buttons -->
                                            <div v-if="scanResult" class="mt-3 text-center">
                                                <button @click="clearResult" class="btn btn-outline-secondary me-2">
                                                    <i class="fas fa-refresh me-1"></i>@lang('Scan Another')
                                                </button>
                                                <button v-if="scanResult.success" @click="printResult"
                                                    class="btn btn-primary">
                                                    <i class="fas fa-print me-1"></i>@lang('Print Receipt')
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Manual QR Input -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Vue.js and QR Code Scanner Library -->
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>

    <script>
        // Vue.js QR Scanner App
        const {
            createApp
        } = Vue;

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
                console.log('QR Scanner app mounted');
                // Wait a bit for the DOM to be fully ready
                setTimeout(() => {
                    this.initScanner();
                }, 1000);
            },
            methods: {
                initScanner() {
                    try {
                        console.log('Initializing QR scanner...');
                        this.updateScannerStatus('Initializing...');
                        this.updateDebugInfo('Creating scanner instance...');

                        this.html5QrcodeScanner = new Html5QrcodeScanner(
                            "qr-reader", {
                                fps: 10,
                                qrbox: {
                                    width: 250,
                                    height: 250
                                },
                                aspectRatio: 1.0,
                                supportedScanTypes: [
                                    Html5QrcodeScanType.SCAN_TYPE_CAMERA
                                ],
                                showTorchButtonIfSupported: true,
                                showZoomSliderIfSupported: true,
                                defaultZoomValueIfSupported: 2,
                                useBarCodeDetectorIfSupported: true
                            },
                            false
                        );

                        console.log('QR scanner created, rendering...');
                        this.updateScannerStatus('@lang('Starting camera...')');
                        this.updateDebugInfo('@lang('Rendering scanner...')');

                        this.html5QrcodeScanner.render(this.onScanSuccess, this.onScanFailure);

                        console.log('QR scanner rendered successfully');
                        this.updateScannerStatus('@lang('Ready - Point camera at QR code')');
                        this.updateDebugInfo('@lang('Scanner active - waiting for QR codes...')');

                    } catch (error) {
                        console.error('Error initializing QR scanner:', error);
                        this.updateScannerStatus('Error: ' + error.message);
                        this.updateDebugInfo('Failed: ' + error.message);
                        alert('@lang('Error initializing camera scanner') : ' + error.message);
                    }
                },

                updateScannerStatus(message) {
                    const statusElement = document.getElementById('scanner-status');
                    if (statusElement) {
                        statusElement.textContent = message;
                    }
                },

                updateDebugInfo(message) {
                    const debugElement = document.getElementById('debug-info');
                    if (debugElement) {
                        debugElement.textContent = message;
                    }
                },

                onScanSuccess(decodedText, decodedResult) {
                    console.log(`QR Code detected: ${decodedText}`);
                    console.log('Decoded result:', decodedResult);

                    // Show immediate feedback
                    this.updateScannerStatus('@lang('QR Code detected! Processing...')');
                    this.updateDebugInfo('@lang('Processing scanned data...')');

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
                    console.log('Starting validation for QR data:', qrData);
                    this.updateDebugInfo('@lang('Validating QR data...')');
                    this.validating = true;
                    this.scanning = true;

                    fetch('{{ route('admin.validate-qr') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute(
                                    'content') || '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                qr_data: qrData
                            })
                        })
                        .then(response => {
                            console.log('Response status:', response.status);
                            this.updateDebugInfo('Response received: ' + response.status);

                            if (!response.ok) {
                                throw new Error(`HTTP ${response.status}: ${response.statusText}`);
                            }

                            return response.json();
                        })
                        .then(data => {
                            console.log('Validation result:', data);
                            this.updateDebugInfo('@lang('Validation complete')');
                            this.scanResult = data;
                            this.validating = false;
                            this.scanning = false;

                            if (data.success) {
                                this.updateScannerStatus('Validation successful!');
                            } else {
                                this.updateScannerStatus('Validation failed: ' + (data.message ||
                                    'Unknown error'));
                            }
                        })
                        .catch(error => {
                            console.error('Validation error:', error);
                            this.updateDebugInfo('Validation failed: ' + error.message);
                            this.scanResult = {
                                success: false,
                                message: 'Network error occurred: ' + error.message
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
                    // Clear the existing scanner
                    if (this.html5QrcodeScanner) {
                        this.html5QrcodeScanner.clear().catch(err => console.error(err));
                    }

                    // Restart the scanner
                    setTimeout(() => {
                        this.initScanner();
                    }, 500);
                },


                testScanFunction() {
                    // Test if the scan function works by simulating a scan
                    console.log('Testing scan function...');
                    this.updateScannerStatus('@lang('Testing scan function...')');

                    // Use real QR token from database for testing
                    const testData = JSON.stringify({
                        type: 'attendance',
                        event_id: 1,
                        token: 'attend_402ad7bd2e3c7565c6b539611aed468f',
                        name: 'Admin',
                        email: 'admin@admin.com'
                    });

                    console.log('Simulating scan with real data:', testData);
                    this.onScanSuccess(testData, {
                        decodedText: testData
                    });
                },

                printResult() {
                    if (this.scanResult && this.scanResult.success) {
                        const printContent = `
                    <div style="font-family: Arial, sans-serif; padding: 20px;">
                        <h2>@lang('Attendance Confirmation')</h2>
                        <hr>
                        <p><strong>@lang('Name') :</strong> ${this.scanResult.attendance.name}</p>
                        <p><strong>@lang('Email') :</strong> ${this.scanResult.attendance.email}</p>
                        <p><strong>@lang('Event') :</strong> ${this.scanResult.attendance.event_title}</p>
                        <p><strong>@lang('Location') :</strong> ${this.scanResult.attendance.event_location}</p>
                        <p><strong>@lang('Date') :</strong> ${this.scanResult.attendance.event_date}</p>
                        <p><strong>@lang('Checked In At') :</strong> ${this.scanResult.attendance.checked_in_at}</p>
                        <p><strong>@lang('Checked In By') :</strong> ${this.scanResult.attendance.checked_in_by}</p>
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

@endsection
