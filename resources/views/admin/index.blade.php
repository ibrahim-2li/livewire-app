@extends('admin.master')

@section('index-active', 'active')

@section('title', __('Home'))

@section('content')

    @if (auth('admin')->user()->isAdmin() || auth('admin')->user()->isScanner() || auth('admin')->user()->isSupervisor())
        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold py-3 mb-0">
                    <span class="text-muted fw-light">@lang('Dashboard') /</span> @lang('Home')
                </h4>
                <a href="{{ route('admin.qr-scanner') }}" class="btn btn-primary">
                    <i class="fas fa-qrcode me-2"></i> @lang('Scan QR Code')
                </a>
            </div>

            <div class="row g-4">
                <!-- Users Growth -->
                <div class="col-md-6 col-xl-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                                <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                    <div class="card-title">
                                        <h5 class="text-nowrap mb-2">@lang('Users Groth')</h5>
                                        <span class="badge bg-label-warning rounded-pill">@lang('Year')
                                            {{ $currentYear ?? now()->year }}</span>
                                    </div>
                                    <div class="mt-sm-auto">
                                        <small class="{{ $usersGrowthClass ?? 'text-secondary' }} text-nowrap fw-semibold">
                                            <i class="bx {{ $usersGrowthIcon ?? 'bx-minus' }}"></i>
                                            {{ $usersGrowthPercent ?? 0 }}%
                                        </small>
                                        <h3 class="mb-0">{{ $users }}</h3>
                                    </div>
                                </div>
                                <div id="profileReportChart" data-users-series='@json($usersSeries ?? [])'></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Today's Event -->
                <div class="col-md-6 col-xl-4">
                    <div class="card h-100">
                        <div class="card-header d-flex align-items-center justify-content-between pb-0">
                            <div class="card-title mb-0">
                                <h5 class="m-0 me-2">@lang('Today`s Event')</h5>
                                <small class="text-muted">{{ $todayEvent?->title ?? __('No events today') }}</small>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-lg bg-label-primary rounded p-2 me-3 d-flex align-items-center justify-content-center">
                                        <i class="bx bx-calendar-event fs-1"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">@lang('Check-ins')</h6>
                                        <div class="d-flex align-items-center">
                                            <h4 class="mb-0 me-1">{{ $todayEvent?->attendances->count() ?? 0 }}</h4>
                                            <small class="text-success fw-semibold">
                                                <i class="bx bx-chevron-up"></i>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            @php
                                $attendanceByHour = [0, 0, 0, 0, 0, 0, 0, 0]; // 9AM to 4PM
                                if ($todayEvent) {
                                    $attendances = $todayEvent->attendances->whereNotNull('used_at');
                                    foreach ($attendances as $attendance) {
                                        $hour = \Carbon\Carbon::parse($attendance->used_at)->hour;
                                        if ($hour >= 9 && $hour <= 16) {
                                            $index = $hour - 9;
                                            if ($index >= 0 && $index < 8) {
                                                $attendanceByHour[$index]++;
                                            }
                                        }
                                    }
                                }
                            @endphp
                            <div id="incomeChart" data-attendance-by-hour="{{ json_encode($attendanceByHour) }}"></div>
                            
                            <div class="d-flex justify-content-center pt-4 gap-2">
                                <div class="flex-shrink-0">
                                    @php
                                        $attendancePerHour = 0;
                                        if ($todayEvent) {
                                            $checkedInCount = $todayEvent->attendances->whereNotNull('used_at')->count();
                                            $eventStart = \Carbon\Carbon::parse($todayEvent->start_date);
                                            $eventEnd = \Carbon\Carbon::parse($todayEvent->end_date);
                                            $eventDurationHours = max(1, $eventStart->diffInHours($eventEnd));
                                            $attendancePerHour = $checkedInCount > 0 ? round($checkedInCount / $eventDurationHours) : 0;
                                        }
                                    @endphp
                                    <div id="expensesOfWeek" data-attendance-per-hour="{{ $attendancePerHour }}"></div>
                                </div>
                                <div>
                                    <p class="mb-n1 mt-1">@lang('checked in of today`s event')</p>
                                    <small class="text-muted">
                                        {{ $todayEvent?->attendances->whereNotNull('used_at')->count() ?? 0 }}
                                        @lang('less than last week')
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Countries -->
                <div class="col-md-6 col-xl-4">
                    <div class="card h-100">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="card-title m-0 me-2">@lang('Attend by Countries')</h5>
                        </div>
                        <div class="card-body">
                            <canvas id="countriesChart" style="max-height: 300px;"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Attendance Analytics -->
                <div class="col-lg-8">
                    <div class="card h-100">
                        <div class="row row-bordered g-0 h-100">
                            <div class="col-md-8">
                                <h5 class="card-header m-0 me-2 pb-3">@lang('Attendances')</h5>
                                <div id="totalRevenueChart" class="px-2"
                                    data-total-revenue-series='@json($totalRevenueSeries ?? [])'></div>
                            </div>
                            <div class="col-md-4">
                                <div class="card-body">
                                    <div class="text-center">
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button"
                                                id="growthReportId" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                {{ optional($primaryYearStats)->year ?? ($currentYear ?? now()->year) }}
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId">
                                                @foreach ($attendanceYears as $year)
                                                    <span class="dropdown-item">{{ $year }}</span>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="growthChart" data-growth-percent="{{ $attendanceGrowthPercent ?? 0 }}"></div>
                                <div class="text-center fw-semibold pt-3 mb-2">
                                    {{ $attendanceGrowthPercent ?? 0 }}% @lang('Attendance Growth')
                                </div>

                                <div class="d-flex px-xxl-4 px-lg-2 p-4 gap-xxl-3 gap-lg-1 gap-3 justify-content-between">
                                    <div class="d-flex">
                                        <div class="d-flex flex-column">
                                            <small>{{ optional($primaryYearStats)->year ?? '—' }}</small>
                                            <h6 class="mb-0">
                                                {{ number_format(optional($primaryYearStats)->registrations ?? 0) }}
                                                @lang('Registered')
                                            </h6>
                                            <span class="text-muted small">
                                                {{ number_format(optional($primaryYearStats)->check_ins ?? 0) }} Check-ins
                                            </span>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="d-flex flex-column">
                                            <small>{{ optional($secondaryYearStats)->year ?? '—' }}</small>
                                            <h6 class="mb-0">
                                                {{ number_format(optional($secondaryYearStats)->registrations ?? 0) }}
                                                @lang('Registered')
                                            </h6>
                                            <span class="text-muted small">
                                                {{ number_format(optional($secondaryYearStats)->check_ins ?? 0) }}
                                                Check-ins
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Latest Check-ins -->
                <div class="col-lg-4">
                    <div class="card h-100">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="card-title m-0 me-2">@lang('Latest Checked In')</h5>
                        </div>
                        <div class="card-body">
                            <ul class="p-0 m-0">
                                @foreach ($attendances as $attendance)
                                    <li class="d-flex mb-4 pb-1">
                                        <div class="avatar flex-shrink-0 me-3">
                                            <img src="{{ asset('admin-assets') }}/img/icons/unicons/user.png" alt="User"
                                                class="rounded" />
                                        </div>
                                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                            <div class="me-2">
                                                <small class="text-muted d-block mb-1">{{ $attendance->event->title }}</small>
                                                <h6 class="mb-0">{{ $attendance->user->name }}</h6>
                                            </div>
                                            <div class="user-progress d-flex align-items-center gap-1">
                                                <h6 class="mb-0">{{ $attendance->used_at->format('d-m H:i') }}</h6>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-2 mb-2"><span class="text-muted fw-light">@lang('Dashboard') /</span> @lang('Home')
            </h4>
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">@lang('Welcome') , {{ auth('admin')->user()->name }}</h5>
                    <p class="card-text">@lang('You are logged in as a user. You can scan QR codes to check in for events.')</p>
                    <div class="mt-0 mb-3 d-flex justify-content-end diaplay-inline">
                        <!-- QR Scanner Button -->
                        <a href="{{ route('admin.my-attendances') }}" class="btn btn-primary">
                            <i class="fas fa-qrcode"></i> @lang('Go to QR Code')
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection

@push('page-scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const countryLabels = @json($countryNames ?? []);
        const countryData = @json($countryCounts ?? []);

        if (countryLabels.length && countryData.length) {
            const ctx = document.getElementById('countriesChart').getContext('2d');
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: countryLabels,
                    datasets: [{
                        label: 'Registered',
                        data: countryData,
                        backgroundColor: [
                            '#42A5F5', '#66BB6A', '#FFA726',
                            '#AB47BC', '#26C6DA', '#FF7043',
                            '#9CCC65', '#EF5350', '#29B6F6'
                        ],
                        borderColor: '#fff',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                        },
                        title: {
                            display: false,
                        }
                    }
                }
            });
        } else {
            console.warn("No country data available");
        }
    </script>
@endpush
