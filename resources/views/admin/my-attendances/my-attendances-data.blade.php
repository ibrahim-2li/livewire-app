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
                    <h5 class="text-muted fw-bold">{{ $data->where('used_at', '!=', null)->count() }}
                    </h5>
                </div>

            </div>
        </div>
    </div>
    <!-- Available QR Codes Card -->
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-primary d-flex justify-content-center align-items-center">
            <div>
                <h5 class="mb-0 font-weight-bold text-white">@lang('Available QR Codes')</h5>

            </div>

        </div>
        <div class="card-body p-0">
            <table class="table table-hover mb-0 text-center">
                <thead class="thead-light">
                    <tr>
                        <th>@lang('Event Title')</th>
                        <th>@lang('Qr Code')</th>
                        <th>@lang('Location')</th>
                        <th>@lang('Date')</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($qrcodes && $qrcodes->count() > 0)
                        @foreach ($qrcodes as $qr)
                            <tr>
                                <td>{{ $qr->event->title }}</td>
                                <td>
                                    <a href="{{ route('view-qr', $qr->id) }}" class="btn btn-sm btn-primary text-white">
                                        <i class="fas fa-qrcode"></i> @lang('Show QR')
                                    </a>
                                </td>
                                <td>{{ $qr->event->location }}</td>
                                <td>{{ $qr->created_at->format('Y-m-d H:i') }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="py-5 text-muted">
                                <div>
                                    <span style="font-size: 2rem;"><i class="fas fa-qrcode"></i></span>
                                    <p class="mt-2 mb-0 font-weight-bold">@lang('No QR Codes Available')</p>
                                </div>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <!-- Attendance Records Card -->
    <div class="card shadow-sm">
        <div class="card-header bg-primary d-flex justify-content-center align-items-center">
            <div>
                <h5 class="mb-0 font-weight-bold text-white">@lang('Attendance Records')</h5>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover mb-0 text-center">
                <thead class="thead-light">
                    <tr>
                        <th>@lang('Event Title')</th>
                        <th>@lang('Event Location')</th>
                        <th>@lang('Checked In At')</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($qrcodesUsed && $qrcodesUsed->count() > 0)
                        @foreach ($qrcodesUsed as $qrused)
                            <tr>
                                <td>{{ $qrused->event->title }}</td>
                                <td>{{ $qrused->event->location }}</td>
                                <td>{{ $qrused->used_at }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="py-5 text-muted">
                                <div>
                                    <span style="font-size: 2rem;"><i class="fas fa-calendar-alt"></i></span>
                                    <p class="mt-2 mb-0 font-weight-bold">@lang('No Attendance Records')</p>

                                </div>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
