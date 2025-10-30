<div>
    <!--/ Model !-->
    <input type="text" class="form-control w-25" placeholder="@lang('Search')" wire:model.live='serarch'>

    @if (count($data) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th width="30%">@lang('Name')</th>
                    <th width="30%">@lang('Email')</th>
                    <th width="20%">@lang('Subject')</th>
                    <th width="10%">@lang('Status')</th>
                    <th>@lang('Actions')</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($data as $record)
                    <tr>
                        <td><strong>{{ $record->name }}</strong></td>
                        <td>{{ $record->email }}</td>
                        <td>{{ $record->subject }}</td>
                        <td>
                            <span class="{{ $record->status == '0' ? 'badge bg-success' : 'badge bg-danger' }}">
                                {{ $record->status == '0' ? 'New' : 'Read' }}
                        </td>
                        </span>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#"
                                        wire:click.prevent="$dispatch('messagesShow',{id: {{ $record->id }}})"><i
                                            class="bx bx-show me-1"></i>
                                        @lang('Show')</a>
                                    <a class="dropdown-item" href="#"
                                        wire:click.prevent="$dispatch('messagesDelete',{id: {{ $record->id }}})"><i
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
