<div>
    <!--/ Model !-->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="position-relative w-100 w-md-25">
            <i class="bx bx-search position-absolute top-50 translate-middle-y ms-3 text-muted" style="left: 0;"></i>
            <input type="text" class="form-control ps-5" placeholder="@lang('Search messages...')" wire:model.live='serarch'>
        </div>
    </div>

    @if (count($data) > 0)
        <div class="row g-3">
            @foreach ($data as $record)
                <div class="col-12">
                    <div class="card border shadow-none hover-shadow transition-all {{ $record->status == '0' ? 'border-primary' : '' }}">
                        <div class="card-body p-3 p-md-4">
                            <div class="row align-items-center g-3">
                                <!-- Icon & Name -->
                                <div class="col-12 col-md-4">
                                    <div class="d-flex align-items-center justify-content-between mb-2 mb-md-0">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="avatar avatar-sm {{ $record->status == '0' ? 'bg-label-primary' : 'bg-label-secondary' }} rounded p-2 d-flex align-items-center justify-content-center">
                                                <i class="bx {{ $record->status == '0' ? 'bx-envelope' : 'bx-envelope-open' }} fs-4"></i>
                                            </div>
                                            <div>
                                                <a href="#" class="{{ $record->status == '0' ? 'text-primary' : 'text-secondary' }} text-heading fw-bold mb-0" wire:click.prevent="$dispatch('messagesShow',{id: {{ $record->id }}})">
                                                    {{ $record->name }}
                                                </a>
                                                <div class="d-md-none mt-1">
                                                     <span class="badge {{ $record->status == '0' ? 'bg-label-success' : 'bg-label-secondary' }} rounded-pill">
                                                        {{ $record->status == '0' ? __('New') : __('Read') }}
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
                                                    <a class="dropdown-item" href="#" wire:click.prevent="$dispatch('messagesShow',{id: {{ $record->id }}})"><i class="bx bx-show me-2"></i> @lang('Show')</a>
                                                    @if(!auth()->user()->isSupervisor())
                                                        <a class="dropdown-item text-danger" href="#" wire:click.prevent="$dispatch('messagesDelete',{id: {{ $record->id }}})"><i class="bx bx-trash me-2"></i> @lang('Delete')</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Subject & Email -->
                                <div class="col-12 col-md-5">
                                    <div class="d-flex flex-column gap-1">
                                        <div class="fw-medium text-heading text-truncate">
                                            {{ $record->subject }}
                                        </div>
                                        <div class="d-flex align-items-center text-muted small">
                                            <i class="bx bx-envelope me-2"></i>
                                            <span>{{ $record->email }}</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Status (Desktop) -->
                                <div class="col-md-2 d-none d-md-block">
                                    <span class="badge {{ $record->status == '0' ? 'bg-label-success' : 'bg-label-secondary' }} rounded-pill">
                                        {{ $record->status == '0' ? __('New') : __('Read') }}
                                    </span>
                                </div>

                                <!-- Desktop Actions -->
                                <div class="col-md-1 d-none d-md-flex justify-content-end">
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-icon btn-text-secondary rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#" wire:click.prevent="$dispatch('messagesShow',{id: {{ $record->id }}})"><i class="bx bx-show me-2"></i> @lang('Show')</a>
                                            @if(!auth()->user()->isSupervisor())
                                                <a class="dropdown-item text-danger" href="#" wire:click.prevent="$dispatch('messagesDelete',{id: {{ $record->id }}})"><i class="bx bx-trash me-2"></i> @lang('Delete')</a>
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
                <h5 class="mb-2">@lang('No messages found')</h5>
                <p class="text-muted mb-0">@lang('Try adjusting your search.')</p>
            </div>
        </div>
    @endif

</div>
