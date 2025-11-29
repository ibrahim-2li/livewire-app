<div>
    <div class="row">
        <!-- Total Attendances -->
        <div class="col-md-3 mb-3">
            <div class="card stat-card p-3">
                <h5 class="text-warning">
                    @lang('Total Attendances') <span class="ml-1"><i class="fas fa-users"></i></span>
                </h5>
                <div class="stat-value">
                    <h5 class="text-muted fw-bold">{{ $datacount }}</h5>
                </div>

            </div>
        </div>

        <!-- This Month -->
        <div class="col-md-3 mb-3">
            <div class="card stat-card p-3">
                <h5 class="text-success">
                    @lang('Total Check-ins') <span class="ml-1"><i class="fas fa-calendar-minus"></i></span>
                </h5>
                <div class="">
                    <h5 class="text-muted fw-bold">{{ $dataused }}
                    </h5>
                </div>

            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">

            <div class="mt-1 mb-2 d-flex justify-content-end gap-2 diaplay-inline">
                <!-- Export Button -->
                <button type="button" class="btn btn-success" wire:click="export">
                    <i class="fas fa-file-excel"></i> @lang('Export to Excel')
                </button>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                    @lang('Create')
                </button>
            </div>
            <div>
                <!--/ Model !-->
                @livewire('admin.attendances.attendances-create')
                <div class="d-flex gap-2 mb-3">
                    <select class="form-control w-25" wire:model.live="event">
                        <option value="">@lang('All Events')</option>
                        @foreach ($events as $eventItem)
                            <option value="{{ $eventItem->id }}">{{ $eventItem->title }}</option>
                        @endforeach
                    </select>
                    <select class="form-control w-25" wire:model.live="country">
                        <option value="">@lang('All Countries')</option>
                        @foreach ($countries as $countryItem)
                            <option value="{{ $countryItem }}">{{ $countryItem }}</option>
                        @endforeach
                    </select>
                    <input type="text" class="form-control w-25" placeholder="@lang('Search')"
                        wire:model.live='serarch'>
                </div>

                @if (count($data) > 0)
                    <div class="row g-3">
                        @foreach ($data as $record)
                            <div class="col-12">
                                <div class="card border shadow-none hover-shadow transition-all">
                                    <div class="card-body p-3 p-md-4">
                                        <div class="row align-items-center g-3">
                                            <!-- User Info -->
                                            <div class="col-12 col-md-4">
                                                <div class="d-flex align-items-center justify-content-between mb-2 mb-md-0">
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div class="avatar avatar-sm bg-label-primary rounded p-2 d-flex align-items-center justify-content-center">
                                                            <i class="bx bx-user fs-4"></i>
                                                        </div>
                                                        <div>
                                                            <a href="#" class="text-heading fw-bold mb-0" wire:click.prevent="$dispatch('attendancesShow',{id: {{ $record->id }}})">
                                                                {{ $record->user->name }}
                                                            </a>
                                                            <div class="d-md-none mt-1 text-muted small">
                                                                <i class="bx bx-phone me-1"></i>{{ $record->user->phone }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Mobile Actions Dropdown -->
                                                    <div class="d-md-none">
                                                        <div class="dropdown">
                                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                                <i class="bx bx-dots-vertical-rounded fs-4 text-muted"></i>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                @if(!auth()->user()->isSupervisor())
                                                                    <a class="dropdown-item" href="#" wire:click.prevent="$dispatch('attendancesUpdate',{id: {{ $record->id }}})"><i class="bx bx-edit-alt me-2"></i> @lang('Edit')</a>
                                                                    <a class="dropdown-item text-danger" href="#" wire:click.prevent="$dispatch('attendancesDelete',{id: {{ $record->id }}})"><i class="bx bx-trash me-2"></i> @lang('Delete')</a>
                                                                @endif
                                                                <a class="dropdown-item" href="#" wire:click.prevent="$dispatch('attendancesShow',{id: {{ $record->id }}})"><i class="bx bx-show me-2"></i> @lang('Show')</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Contact Info (Desktop) -->
                                            <div class="col-md-3 d-none d-md-block">
                                                <div class="d-flex flex-column gap-1">
                                                    <div class="d-flex align-items-center text-muted small">
                                                        <i class="bx bx-phone me-2"></i>
                                                        <span>{{ $record->user->phone }}</span>
                                                    </div>
                                                    <div class="d-flex align-items-center text-muted small">
                                                        <i class="bx bx-envelope me-2"></i>
                                                        <span>{{ $record->user->email }}</span>
                                                    </div>
                                                    <div class="d-flex align-items-center text-muted small">
                                                        <i class="bx bx-user me-2"></i>
                                                        <span>{{ $record->user->job_title }}</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Location & Status -->
                                            <div class="col-12 col-md-2">
                                                <div class="d-flex flex-column gap-1">
                                                    <div class="d-flex align-items-center text-muted">
                                                        <i class="bx bx-globe me-2"></i>
                                                        <span>{{ __($record->country) }}</span>
                                                    </div>
                                                    @if($record->used_at)
                                                        <div class="d-flex align-items-center text-success small">
                                                            <i class="bx bx-check-circle me-2"></i>
                                                            <span>{{ $record->used_at }}</span>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>

                                            <!-- Checked By (Desktop) -->
                                            <div class="col-md-2 d-none d-md-block">
                                                @if($record->checked_in_by)
                                                    <div class="d-flex align-items-center text-muted small" title="@lang('Checked By')">
                                                        <i class="bx bx-user-check me-2"></i>
                                                        <span>{{ $record->checked_in_by }}</span>
                                                    </div>
                                                @endif
                                            </div>

                                            <!-- Desktop Actions -->
                                            <div class="col-md-1 d-none d-md-flex justify-content-end">
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-icon btn-text-secondary rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        @if(!auth()->user()->isSupervisor())
                                                            <a class="dropdown-item" href="#" wire:click.prevent="$dispatch('attendancesUpdate',{id: {{ $record->id }}})"><i class="bx bx-edit-alt me-2"></i> @lang('Edit')</a>
                                                            <a class="dropdown-item text-danger" href="#" wire:click.prevent="$dispatch('attendancesDelete',{id: {{ $record->id }}})"><i class="bx bx-trash me-2"></i> @lang('Delete')</a>
                                                        @endif
                                                        <a class="dropdown-item" href="#" wire:click.prevent="$dispatch('attendancesShow',{id: {{ $record->id }}})"><i class="bx bx-show me-2"></i> @lang('Show')</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-4">
                        {{ $data->links() }}
                    </div>
                @else
                    <div class="card">
                        <div class="card-body text-center p-5">
                            <div class="avatar avatar-xl bg-label-secondary rounded-circle mb-3 mx-auto">
                                <i class="bx bx-search fs-1"></i>
                            </div>
                            <h5 class="mb-2">@lang('No attendances found')</h5>
                            <p class="text-muted mb-0">@lang('Try adjusting your search or filters.')</p>
                        </div>
                    </div>
                @endif


            </div>


        </div>
    </div>

</div>
