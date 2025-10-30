<div>
    <!--/ Model !-->
    @livewire('admin.events.events-create')
    <input type="text" class="form-control w-25" placeholder="@lang('Search')" wire:model.live='serarch'>

    @if (count($data) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th width="30%">@lang('Title')</th>
                    <th width="20%">@lang('Status')</th>
                    <th width="25%">@lang('Location')</th>
                    <th width="25%">@lang('Starting')</th>
                    {{-- <th width="25%">@lang('Ending')</th> --}}
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($data as $record)
                    <tr>
                        <td><strong>{{ $record->title }}</strong></td>
                        <td><strong>
                                <span
                                    class="badge bg-label-{{ $record->is_active ? 'success' : 'danger' }} me-1">{{ $record->is_active ? 'Active' : 'Not Avtive' }}</span>

                            </strong></td>
                        <td><strong>{{ $record->location }}</strong></td>
                        <td>
                            <strong>{{ \Carbon\Carbon::parse($record->start_date)->format('d M Y, h:i A') }}</strong>
                            {{-- <img src="{{ asset($record->image) }}" width="auto" height="45px"> --}}
                        </td>
                        {{-- <td>

                            <strong>{{ \Carbon\Carbon::parse($record->end_date)->format('d M Y, h:i A') }}</strong>
                        </td> --}}
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#"
                                        wire:click.prevent="$dispatch('eventsUpdate',{id: {{ $record->id }}})"><i
                                            class="bx bx-edit-alt me-1"></i>
                                        @lang('Edit')</a>
                                    <a class="dropdown-item" href="#"
                                        wire:click.prevent="$dispatch('eventsDelete',{id: {{ $record->id }}})"><i
                                            class="bx bx-trash me-1"></i>
                                        @lang('Delete')</a>
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
