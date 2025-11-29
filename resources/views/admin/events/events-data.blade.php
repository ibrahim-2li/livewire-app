<div>
    <!--/ Model !-->
    @livewire('admin.events.events-create')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="position-relative w-100 w-md-25">
            <i class="bx bx-search position-absolute top-50 translate-middle-y ms-3 text-muted" style="left: 0;"></i>
            <input type="text" class="form-control ps-5" placeholder="@lang('Search events...')" wire:model.live='serarch'>
        </div>
    </div>

    @if (count($data) > 0)
        <div class="row g-3">
            @foreach ($data as $record)
                <div class="col-12">
                    <div class="card border shadow-none hover-shadow transition-all">
                        <div class="card-body p-3 p-md-4">
                            <div class="row align-items-center g-3">
                                <!-- Title & Status -->
                                <div class="col-12 col-md-4">
                                    <div class="d-flex align-items-center justify-content-between mb-2 mb-md-0">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="avatar avatar-sm bg-label-primary rounded p-2 d-flex align-items-center justify-content-center">
                                                <i class="bx bx-calendar fs-4"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-0 fw-bold text-heading">{{ $record->title }}</h6>
                                                <div class="d-md-none mt-1">
                                                    <span class="badge bg-label-{{ $record->is_active ? 'success' : 'danger' }} rounded-pill">
                                                        {{ $record->is_active ? __('Active') : __('Inactive') }}
                                                    </span>
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
                                                        <a class="dropdown-item" href="#" wire:click.prevent="$dispatch('eventsUpdate',{id: {{ $record->id }}})"><i class="bx bx-edit-alt me-2"></i> @lang('Edit')</a>
                                                        <a class="dropdown-item text-danger" href="#" wire:click.prevent="$dispatch('eventsDelete',{id: {{ $record->id }}})"><i class="bx bx-trash me-2"></i> @lang('Delete')</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Meta Info (Desktop) -->
                                <div class="col-md-1 d-none d-md-block">
                                    <span class="badge bg-label-{{ $record->is_active ? 'success' : 'danger' }} rounded-pill">
                                        {{ $record->is_active ? __('Active') : __('Inactive') }}
                                    </span>
                                </div>

                                <!-- Location -->
                                <div class="col-12 col-md-4">
                                    <div class="d-flex align-items-center text-muted">
                                        <i class="bx bx-map me-2"></i>
                                        <span class="text-truncate" title="{{ $record->location }}">
                                            {{ $record->location ?: __('No location') }}
                                        </span>
                                    </div>
                                </div>

                                <!-- Dates -->
                                <div class="col-12 col-md-2">
                                    <div class="d-flex flex-column gap-1">
                                        <div class="d-flex align-items-center text-muted small">
                                            <i class="bx bx-calendar-event me-2 text-primary"></i>
                                            <span>{{ \Carbon\Carbon::parse($record->start_date)->translatedFormat('d M Y, h:i A') }}</span>
                                        </div>
                                        <div class="d-flex align-items-center text-muted small">
                                            <i class="bx bx-time-five me-2 text-danger"></i>
                                            <span>{{ \Carbon\Carbon::parse($record->end_date)->translatedFormat('d M Y, h:i A') }}</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Desktop Actions -->
                                <div class="col-md-1 d-none d-md-flex justify-content-end">
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-icon btn-text-secondary rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            @if(!auth()->user()->isSupervisor())
                                                <a class="dropdown-item" href="#" wire:click.prevent="$dispatch('eventsUpdate',{id: {{ $record->id }}})"><i class="bx bx-edit-alt me-2"></i> @lang('Edit')</a>
                                                <a class="dropdown-item text-danger" href="#" wire:click.prevent="$dispatch('eventsDelete',{id: {{ $record->id }}})"><i class="bx bx-trash me-2"></i> @lang('Delete')</a>
                                            @endif
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
                <h5 class="mb-2">@lang('No events found')</h5>
                <p class="text-muted mb-0">@lang('Try adjusting your search or add a new event.')</p>
            </div>
        </div>
    @endif

</div>
