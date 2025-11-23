@extends('admin.master')

@section('attendances-active', 'active')

@section('title', __('Attendances'))

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-2 mb-2"><span class="text-muted fw-light">@lang('Attendances') /</span>@lang('Dashboard')</h4>
        @livewire('admin.attendances.attendances-data')
        @livewire('admin.attendances.attendances-update')
        @livewire('admin.attendances.attendances-delete')
        @livewire('admin.attendances.attendances-show')
    </div>

@endsection
