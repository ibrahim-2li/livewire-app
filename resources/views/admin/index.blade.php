@extends('admin.master')

@section('index-active', 'active')

@section('title', 'Home')

@section('content')

    @if (auth('admin')->user()->isAdmin())
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="mt-0 mb-3 d-flex justify-content-end diaplay-inline">
                <!-- QR Scanner Button -->
                <a href="{{ route('admin.qr-scanner') }}" class="btn btn-primary">
                    <i class="fas fa-qrcode"></i> @lang('Scan QR Code')
                </a>
            </div>
            <div class="row">
                <!-- Events Statistics -->
                <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
                    <div class="card h-100">
                        <div class="card-header d-flex align-items-center justify-content-between pb-0">
                            <div class="card-title mb-0">
                                <h5 class="m-0 me-2">@lang('Events Statistics')</h5>
                                <small class="text-muted">@lang('Total Events') {{ $events->count() }}</small>
                            </div>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="orederStatistics" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
                                    <a class="dropdown-item" href="javascript:void(0);">@lang('Select All')</a>
                                    <a class="dropdown-item" href="javascript:void(0);">@lang('Refresh')</a>
                                    <a class="dropdown-item" href="javascript:void(0);">@lang('Share')</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="d-flex flex-column align-items-center gap-1">
                                    <h2 class="mb-2">{{ $events->sum('total_attendees') }}</h2>
                                    <span>@lang('Total Registered')</span>
                                </div>

                                <div id="orderStatisticsChart" data-event-titles="{{ $events->pluck('title')->toJson() }}"
                                    data-event-attendees="{{ $events->pluck('total_attendees')->toJson() }}">
                                </div>
                            </div>
                            <ul class="p-0 m-0">
                                @foreach ($events as $event)
                                    <li class="d-flex mb-4 pb-1">
                                        <div class="avatar flex-shrink-0 me-3">
                                            <span class="avatar-initial rounded bg-label-primary"><i
                                                    class="bx bx-calendar"></i></span>
                                        </div>
                                        <div
                                            class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                            <div class="me-2">
                                                <h6 class="mb-0">{{ $event->title }}</h6>
                                                <small class="text-muted">{{ $event->location }}</small>
                                            </div>
                                            <div class="user-progress">
                                                <small class="fw-semibold">{{ $event->total_attendees }}</small>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
                <!--/ Order Statistics -->

                <!-- Expense Overview -->
                <div class="col-md-6 col-lg-4 order-1 mb-4">
                    <div class="card h-100">
                        <div class="card-header">
                            <ul class="nav nav-pills" role="tablist">

                            </ul>
                        </div>
                        <div class="card-body px-0">
                            <div class="tab-content p-0">
                                <div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel">
                                    <div class="d-flex p-4 pt-3">
                                        <div class="avatar flex-shrink-0 me-3">
                                            <img src="{{ asset('admin-assets') }}/img/icons/unicons/wallet.png"
                                                alt="User" />
                                        </div>
                                        <div>
                                            <small class="text-muted d-block">@lang('Today`s Event')</small>
                                            <div class="d-flex align-items-center">
                                                <h6 class="mb-0 me-1">{{ $todayEvent?->title }}</h6>
                                                <small class="text-success fw-semibold">
                                                    <i class="bx bx-chevron-up"></i>
                                                    {{ $todayEvent?->attendances->count() }}
                                                </small>
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
                                    <div id="incomeChart" data-attendance-by-hour="{{ json_encode($attendanceByHour) }}">
                                    </div>
                                    <div class="d-flex justify-content-center pt-4 gap-2">
                                        <div class="flex-shrink-0">
                                            @php
                                                $attendancePerHour = 0;
                                                if ($todayEvent) {
                                                    $checkedInCount = $todayEvent->attendances
                                                        ->whereNotNull('used_at')
                                                        ->count();
                                                    $eventStart = \Carbon\Carbon::parse($todayEvent->start_date);
                                                    $eventEnd = \Carbon\Carbon::parse($todayEvent->end_date);
                                                    $eventDurationHours = max(1, $eventStart->diffInHours($eventEnd));
                                                    $attendancePerHour =
                                                        $checkedInCount > 0
                                                            ? round($checkedInCount / $eventDurationHours)
                                                            : 0;
                                                }
                                            @endphp
                                            <div id="expensesOfWeek" data-attendance-per-hour="{{ $attendancePerHour }}">
                                            </div>
                                        </div>
                                        <div>
                                            <p class="mb-n1 mt-1">@lang('checked in of today`s event')</p>
                                            <small
                                                class="text-muted">{{ $todayEvent?->attendances->whereNotNull('used_at')->count() }}
                                                @lang('less than last week')</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Expense Overview -->

                <!-- Latest Checked In -->
                <div class="col-md-6 col-lg-4 order-2 mb-4">
                    <div class="card h-100">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="card-title m-0 me-2">@lang('Latest Checked In')</h5>

                        </div>
                        <div class="card-body">
                            <ul class="p-0 m-0">
                                @foreach ($attendances as $attendance)
                                    <li class="d-flex mb-4 pb-1">
                                        <div class="avatar flex-shrink-0 me-3">
                                            <img src="{{ asset('admin-assets') }}/img/icons/unicons/user.png"
                                                alt="User" class="rounded" />
                                        </div>
                                        <div
                                            class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                            <div class="me-2">
                                                <small
                                                    class="text-muted d-block mb-1">{{ $attendance->attendee_name }}</small>
                                                <h6 class="mb-0">{{ $attendance->event->title }}</h6>
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
                <!--/ Transactions -->
            </div>
            <div class="row">

                <!-- Total Revenue -->
                {{-- <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
                    <div class="card">
                        <div class="row row-bordered g-0">
                            <div class="col-md-8">
                                <h5 class="card-header m-0 me-2 pb-3">Total Revenue</h5>
                                <div id="totalRevenueChart" class="px-2"></div>
                            </div>
                            <div class="col-md-4">
                                <div class="card-body">
                                    <div class="text-center">
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button"
                                                id="growthReportId" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                2022
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId">
                                                <a class="dropdown-item" href="javascript:void(0);">2021</a>
                                                <a class="dropdown-item" href="javascript:void(0);">2020</a>
                                                <a class="dropdown-item" href="javascript:void(0);">2019</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="growthChart"></div>
                                <div class="text-center fw-semibold pt-3 mb-2">62% Company Growth</div>

                                <div class="d-flex px-xxl-4 px-lg-2 p-4 gap-xxl-3 gap-lg-1 gap-3 justify-content-between">
                                    <div class="d-flex">
                                        <div class="me-2">
                                            <span class="badge bg-label-primary p-2"><i
                                                    class="bx bx-dollar text-primary"></i></span>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <small>2022</small>
                                            <h6 class="mb-0">$32.5k</h6>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="me-2">
                                            <span class="badge bg-label-info p-2"><i
                                                    class="bx bx-wallet text-info"></i></span>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <small>2021</small>
                                            <h6 class="mb-0">$41.2k</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!--/ Total Revenue -->
                <!-- Total Revenue -->
                <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
                    <div class="card">
                        <div class="row row-bordered g-0">
                            <!-- attends table -->
                            <div class="col-md-8">

                                <h5 class="card-header m-0 me-2 pb-3">@lang('Total Attende')</h5>
                                <div class="dropdown float-end m-0 me-2 pb-3">
                                    <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button"
                                        id="growthReportId" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        All
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId">
                                        @foreach ($events as $e)
                                            <a class="dropdown-item"
                                                href="?event={{ $e->id }}">{{ $e->title }}</a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">

                                    </div>
                                    <table>
                                        {{-- @foreach ($attends as $attend) --}}
                                        <tr>
                                            <table class=" table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>@lang('Attendee Name')</th>
                                                        <th class="d-none d-sm-table-cell col-sm-2 col-md-2">
                                                            @lang('Attendee Email')</th>

                                                        <th>@lang('Arrived At')</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($attends as $index => $attend)
                                                        <tr>
                                                            <td>{{ $index + 1 }}</td>
                                                            <td>{{ $attend->attendee_name }}</td>
                                                            <td class="d-none d-sm-table-cell col-sm-2 col-md-2">
                                                                {{ $attend->attendee_email }}</td>

                                                            <td>{{ $attend->used_at ? \Carbon\Carbon::parse($attend->used_at)->format('d M Y, h:i A') : '' }}
                                                            </td>

                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </tr>
                                        {{-- @endforeach --}}
                                    </table>
                                </div>
                                {{-- <div id="totalRevenueChart" class="px-2"></div> --}}


                            </div>

                            <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
                                <div class="row">
                                    <div class="col-12 mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                                                    <div
                                                        class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                                        <div class="card-title">
                                                            <h5 class="text-nowrap mb-2">Profile Report</h5>
                                                            <span class="badge bg-label-warning rounded-pill">Year
                                                                2021</span>
                                                        </div>
                                                        <div class="mt-sm-auto">
                                                            <small class="text-success text-nowrap fw-semibold"><i
                                                                    class="bx bx-chevron-up"></i> 68.2%</small>
                                                            <h3 class="mb-0">$84,686k</h3>
                                                        </div>
                                                    </div>
                                                    <div id="profileReportChart"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Total Revenue -->
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
