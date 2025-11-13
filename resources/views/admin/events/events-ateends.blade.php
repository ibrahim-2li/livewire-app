<x-show-modal title=''>
    <div>
        <h2>@lang('Attendances for') #{{ $event_title }}</h2>


        <table class="table">
            <thead>
                <tr>
                    <th class="col-12 col-sm-2 col-md-2">@lang('Name')</th>
                    <th class="d-none d-sm-table-cell col-sm-2 col-md-2">@lang('Email')</th>
                    <th class="col-12 col-sm-2 col-md-2">@lang('Arrived At')</th>
                    <th class="col-12 col-sm-3 col-md-2">@lang('Checked By')</th>
                </tr>
            </thead>

            <tbody class="table-border-bottom-0">
                @foreach ($attendances as $attendance)
                    <tr>
                        <td><strong>{{ $attendance->user->name }} </strong></td>

                        <td class="d-none d-sm-table-cell col-sm-2 col-md-2">
                            <strong>{{ $attendance->user->email }}</strong>
                        </td>
                        <td>
                            @if ($attendance->used_at)
                                <strong>{{ \Carbon\Carbon::parse($attendance->used_at)->format('d M Y, h:i A') }}</strong>
                                {{-- <img src="{{ asset($record->image) }}" width="auto" height="45px"> --}}
                            @endif
                        </td>
                        <td><strong>{{ $attendance->checked_in_by }}</strong></td>

                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</x-show-modal>
