<div>
    <!--/ Model !-->
    @livewire('admin.skills.skills-create')
    <input type="text" class="form-control w-25" placeholder="Search" wire:model.live='serarch'>

    @if (count($data) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th width="30%">Name</th>
                    <th width="30%">Color</th>
                    <th width="30%">Progress</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($data as $record)
                    <tr>
                        <td><strong>{{ $record->name }}</strong></td>
                        <td>
                            <span class="badge bg-{{ $record->color !== null ? $record->color :  'primary'}}">#color
                            </span>
                            </td>
                        <td>{{ $record->progress }}%</td>
                        {{-- <span class="{{$record->status == '0' ? 'badge bg-success' : 'badge bg-danger'}}">
                            {{$record->status == '0' ? 'New' : 'Read'}}</td>
                        </span> --}}
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    @if(!auth()->user()->isSupervisor())
                                    <a class="dropdown-item" href="#"
                                        wire:click.prevent="$dispatch('skillUpdate',{id: {{ $record->id }}})"><i
                                            class="bx bx-edit-alt me-1"></i>
                                        Edit</a>
                                    <a class="dropdown-item" href="#"
                                        wire:click.prevent="$dispatch('skillDelete',{id: {{ $record->id }}})"><i
                                            class="bx bx-trash me-1"></i>
                                        Delete</a>
                                    @endif
                                    <a class="dropdown-item" href="#"
                                        wire:click.prevent="$dispatch('skillShow',{id: {{ $record->id }}})"><i
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
