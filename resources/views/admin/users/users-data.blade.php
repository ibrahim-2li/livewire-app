<div>
    <!--/ Model !-->
    @livewire('admin.users.users-create')
    <input type="text" class="form-control w-25" placeholder="@lang('Search')" wire:model.live='serarch'>

    @if (count($data) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th class="col-12 col-sm-3 col-md-2">@lang('Name')</th>
                    <th class="col-12 col-sm-3 col-md-2">@lang('Email')</th>
                    <th class="d-none d-sm-table-cell col-sm-2 col-md-2">@lang('Phone')</th>
                    <th class="d-none d-sm-table-cell col-sm-2 col-md-2" width="25%">@lang('Job Title')</th>
                    <th class="col-12 col-sm-1">
                        <i class="menu-icon tf-icons bx bx-cog"></i>
                    </th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($data as $record)
                    <tr>
                        <td width="25%">
                             <a class="dropdown-item" href="#"
                                        wire:click.prevent="$dispatch('usersShow',{id: {{ $record->id }}})">
                                        <strong>{{ $record->name }}</strong></a></td>
                        <td><strong>{{ $record->email }}</strong></td>
                        <td class="d-none d-sm-table-cell col-sm-2 col-md-2"><strong>{{ $record->phone }}</strong></td>
                        <td class="d-none d-sm-table-cell col-sm-2 col-md-2"><strong>{{ $record->job_title }}</strong>
                        </td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    @if(!auth()->user()->isSupervisor())
                                    <a class="dropdown-item" href="#"
                                        wire:click.prevent="$dispatch('usersUpdate',{id: {{ $record->id }}})"><i
                                            class="bx bx-edit-alt me-1"></i>
                                        @lang('Edit')</a>
                                    <a class="dropdown-item" href="#"
                                        wire:click.prevent="$dispatch('usersDelete',{id: {{ $record->id }}})"><i
                                            class="bx bx-trash me-1"></i>
                                        @lang('Delete')</a>
                                    @endif
                                    <a class="dropdown-item" href="#"
                                        wire:click.prevent="$dispatch('usersShow',{id: {{ $record->id }}})"><i
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
