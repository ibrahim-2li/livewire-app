<div>
    <!--/ Model !-->
    @livewire('admin.events.events-create')
    <input type="text" class="form-control w-25" placeholder="@lang('Search')" wire:model.live='serarch'>

    @if (count($data) > 0)
        <table class="table">
            <thead>
                <tr>

                    {{-- <th width="30%">@lang('Name')</th>
                    <th width="25%" class="d-none d-sm-table-cell">@lang('Phone')</th>
                    <th width="25%" class="d-none d-sm-table-cell">@lang('Email')</th>
                    <!-- Hide on mobile -->
                    <th width="20%">@lang('Country')</th>
                    <th width="15%">@lang('Arrived At')</th>
                    <th width="25%" class="d-none d-sm-table-cell">@lang('Checked By')</th> --}}
                    <!-- Hide on mobile -->
                    <th width="25%" class="col-12 col-sm-3 col-md-2">@lang('Title')</th>
                    <th width="10%" class="d-none d-sm-table-cell col-sm-2 col-md-1">@lang('Status')</th>
                    <th width="10%" class="d-none d-sm-table-cell col-sm-2 col-md-2">@lang('Location')</th>
                    <th width="25%" class="col-12 col-sm-1 col-md-1">@lang('Starting')</th>
                    <th width="25%" class="col-12 col-sm-3 col-md-1">@lang('Ending')</th>
                    <th width="5%" class="col-12 col-sm-1">
                        <i class="menu-icon tf-icons bx bx-cog"></i>
                    </th>
                </tr>
            </thead>

            <tbody class="table-border-bottom-0">
                @foreach ($data as $record)
                    <tr>
                        <td class="col-12 col-sm-3 col-md-2" width="25%"><strong> <a class="text-gray" href="#"
                                    wire:click.prevent="$dispatch('eventsAttends',{id: {{ $record->id }}})"><i></i>
                                    {{ $record->title }}</a></strong></td>

                        <td width="10%" class="d-none d-sm-table-cell col-sm-2 col-md-1"><strong>
                                <span
                                    class="badge bg-label-{{ $record->is_active ? 'success' : 'danger' }} me-1">{{ $record->is_active ? 'on' : 'off' }}</span>

                            </strong>
                        </td>
                        <td class="d-none d-sm-table-cell col-sm-2 col-md-2" width="25%">
                            <strong>{{ $record->location }}</strong>
                        </td>
                        <td width="25%" class="col-6 col-sm-3 col-md-1">
                            <strong>{{ \Carbon\Carbon::parse($record->start_date)->format('d M Y, h:i A') }}</strong>
                            {{-- <img src="{{ asset($record->image) }}" width="auto" height="45px"> --}}
                        </td>
                        <td width="25%" class="col-6 col-sm-1 col-md-1">
                            <strong>{{ \Carbon\Carbon::parse($record->end_date)->format('d M Y, h:i A') }}</strong>
                            {{-- <img src="{{ asset($record->image) }}" width="auto" height="45px"> --}}
                        </td>
                        {{-- <td>

                            <strong>{{ \Carbon\Carbon::parse($record->end_date)->format('d M Y, h:i A') }}</strong>
                        </td> --}}
                        <td width="5%">
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    @if(!auth()->user()->isSupervisor())
                                    <a class="dropdown-item" href="#"
                                        wire:click.prevent="$dispatch('eventsUpdate',{id: {{ $record->id }}})"><i
                                            class="bx bx-edit-alt me-1"></i>
                                        @lang('Edit')</a>
                                    <a class="dropdown-item" href="#"
                                        wire:click.prevent="$dispatch('eventsDelete',{id: {{ $record->id }}})"><i
                                            class="bx bx-trash me-1"></i>
                                        @lang('Delete')</a>
                                    @endif
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
