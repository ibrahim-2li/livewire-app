<div>
    <div class="row">
        <!-- Total Attendances -->
        <div class="col-md-3 mb-3">
            <div class="card stat-card p-3">
                <h5 class="text-warning">
                    @lang('Total Attendances') <span class="ml-1"><i class="fas fa-users"></i></span>
                </h5>
                <div class="stat-value">
                    <h5>{{ $datacount }}</h5>
                </div>

            </div>
        </div>

        <!-- This Month -->
        <div class="col-md-3 mb-3">
            <div class="card stat-card p-3">
                <h5 class="text-success">
                    @lang('Total Check-ins') <span class="ml-1"><i class="fas fa-calendar-minus"></i></span>
                </h5>
                <div class="stat-value">
                    <h5>{{ $dataused }}
                    </h5>
                </div>

            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">

            <div class="mt-1 d-flex justify-content-end diaplay-inline">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                    @lang('Create')
                </button>
            </div>
            <div>
                <!--/ Model !-->
                @livewire('admin.attendances.attendances-create')
                <input type="text" class="form-control w-25" placeholder="@lang('Search')"
                    wire:model.live='serarch'>

                @if (count($data) > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="40%">@lang('Name')</th>
                                <th width="25%" class="sm:hidden">@lang('Email')</th>
                                <th width="25%">@lang('Events')</th>
                                <th width="25%">@lang('Arrived At')</th>
                                <th width="25%">@lang('Checked In By')</th>

                                <th>@lang('Actions')</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($data as $record)
                                <tr>
                                    <td><strong>{{ $record->attendee_name }}</strong></td>
                                    <td><strong class="sm:hidden">{{ $record->attendee_email }}</strong></td>
                                    <td><strong>{{ $record->event->title }}</strong></td>
                                    <td><strong class="text-success">{{ $record->used_at }}</strong></td>
                                    <td><strong>{{ $record->checked_in_by }}</strong></td>

                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#"
                                                    wire:click.prevent="$dispatch('attendancesUpdate',{id: {{ $record->id }}})"><i
                                                        class="bx bx-edit-alt me-1"></i>
                                                    @lang('Edit')</a>
                                                <a class="dropdown-item" href="#"
                                                    wire:click.prevent="$dispatch('attendancesDelete',{id: {{ $record->id }}})"><i
                                                        class="bx bx-trash me-1"></i>
                                                    @lang('Delete')</a>
                                                <a class="dropdown-item" href="#"
                                                    wire:click.prevent="$dispatch('attendancesShow',{id: {{ $record->id }}})"><i
                                                        class="bx bx-show me-1"></i>
                                                    @lang('Show')</a>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $data->links() }}
                @else
                    <div class="text-danger">@lang('No Results Found')</div>
                @endif

            </div>


        </div>
    </div>

</div>
