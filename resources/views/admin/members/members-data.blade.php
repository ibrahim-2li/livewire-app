<div>
    <!--/ Model !-->
    @livewire('admin.members.members-create')
    <input type="text" class="form-control w-25" placeholder="Search" wire:model.live='serarch'>

    @if (count($data) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th width="40%">Name</th>
                    <th width="25%">Position</th>
                    <th width="25%">Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($data as $record)
                    <tr>
                        <td><strong>{{ $record->name }}</strong></td>
                        <td><strong>{{ $record->position }}</strong></td>
                        <td>
                        <img src="{{ asset($record->image) }}" width="auto" height="45px">
                        </td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#"
                                        wire:click.prevent="$dispatch('membersUpdate',{id: {{ $record->id }}})"><i
                                            class="bx bx-edit-alt me-1"></i>
                                        Edit</a>
                                    <a class="dropdown-item" href="#"
                                        wire:click.prevent="$dispatch('membersDelete',{id: {{ $record->id }}})"><i
                                            class="bx bx-trash me-1"></i>
                                        Delete</a>
                                    <a class="dropdown-item" href="#"
                                        wire:click.prevent="$dispatch('membersShow',{id: {{ $record->id }}})"><i
                                            class="bx bx-show me-1"></i>
                                        Show</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $data->links() }}
    @else
        <div class="text-danger">No Results Found</div>
    @endif

</div>
