<div>

    <div class="row">
        <!-- Total Attendances -->
        <div class="col-md-3 mb-3">
            <div class="card stat-card p-3">
                <h5 class="text-warning">
                    @lang('Total Events') <span class="ml-1"><i class="fas fa-users"></i></span>
                </h5>
                <div class="stat-value">
                    <h5 class="text-muted fw-bold">{{ $data->count() }}</h5>
                </div>
            </div>
        </div>

        <!-- This Month -->
        <div class="col-md-3 mb-3">
            <div class="card stat-card p-3">
                <h5 class="text-success">
                    @lang('Total Attendances') <span class="ml-1"><i class="fas fa-calendar-minus"></i></span>
                </h5>
                <div class="stat-value">
                    <h5 class="text-muted fw-bold">{{ $data->where('used_at', '!=', null)->count() }}</h5>
                </div>
            </div>
        </div>
    </div>

    <!-- Available QR Codes Card -->
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0 font-weight-bold">@lang('Available QR Codes')</h5>
        </div>

        <div class="card-body p-0">
            @if ($qrcodes && $qrcodes->count() > 0)
                <div class="list-group list-group-flush">
                    @foreach ($qrcodes as $qr)
                        <div class="list-group-item p-3">
                            <div class="row align-items-center g-3">
                                <div class="col-12 col-md-4">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="avatar avatar-sm bg-label-primary rounded p-2 d-flex align-items-center justify-content-center">
                                            <i class="bx bx-calendar-event fs-4"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 fw-bold text-heading">{{ $qr->event->title }}</h6>
                                            <div class="d-md-none mt-1 text-muted small">
                                                <i class="bx bx-map me-1"></i>{{ $qr->event->location }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-3 d-none d-md-block">
                                    <div class="d-flex align-items-center text-muted">
                                        <i class="bx bx-map me-2"></i>
                                        <span>{{ $qr->event->location }}</span>
                                    </div>
                                </div>

                                <div class="col-12 col-md-3">
                                    <div class="d-flex align-items-center text-muted small">
                                        <i class="bx bx-time me-2"></i>
                                        <span>{{ $qr->created_at->translatedFormat('Y-m-d H:i') }}</span>
                                    </div>
                                </div>

                                <div class="col-12 col-md-2 text-md-end mt-2 mt-md-0">
                                    <a href="{{ route('view-qr', $qr->id) }}" class="btn btn-sm btn-primary w-100 w-md-auto">
                                        <i class="fas fa-qrcode me-1"></i> @lang('Show QR')
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-5">
                    <div class="avatar avatar-xl bg-label-secondary rounded-circle mb-3 mx-auto">
                        <i class="bx bx-qr fs-1"></i>
                    </div>
                    <h5 class="mb-2">@lang('No QR Codes Available')</h5>
                </div>
            @endif
        </div>
    </div>

    <!-- Attendance Records Card -->
    <div class="card shadow-sm">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0 font-weight-bold">@lang('Attendance Records')</h5>
        </div>

        <div class="card-body p-0">
            @if ($qrcodesUsed && $qrcodesUsed->count() > 0)
                <div class="list-group list-group-flush">
                    @foreach ($qrcodesUsed as $qrused)
                        <div class="list-group-item p-3">
                            <div class="row align-items-center g-3">
                                <div class="col-12 col-md-4">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="avatar avatar-sm bg-label-success rounded p-2 d-flex align-items-center justify-content-center">
                                            <i class="bx bx-check-circle fs-4"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 fw-bold text-heading">{{ $qrused->event->title }}</h6>
                                            <div class="d-md-none mt-1 text-muted small">
                                                <i class="bx bx-map me-1"></i>{{ $qrused->event->location }}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 d-none d-md-block">
                                    <div class="d-flex align-items-center text-muted">
                                        <i class="bx bx-map me-2"></i>
                                        <span>{{ $qrused->event->location }}</span>
                                    </div>
                                </div>

                                <div class="col-12 col-md-4 text-md-end">
                                    <div class="d-flex align-items-center justify-content-md-end text-success small">
                                        <i class="bx bx-time-five me-2"></i>
                                        <span>{{ $qrused->used_at }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-5">
                    <div class="avatar avatar-xl bg-label-secondary rounded-circle mb-3 mx-auto">
                        <i class="bx bx-calendar-check fs-1"></i>
                    </div>
                    <h5 class="mb-2">@lang('No Attendance Records')</h5>
                </div>
            @endif
        </div>
    </div>

</div>
