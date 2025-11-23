@extends('admin.master')

@section('my-attendances-active', 'active')

@section('title', __('My Attendances'))

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-2 mb-2"><span class="text-muted fw-light">@lang('My Attendances') /</span>@lang('Dashboard')</h4>
        @livewire('admin.my-attendances.my-attendances-data')
        {{-- @livewire('admin.attendances.attendances-update')
        @livewire('admin.attendances.attendances-delete')
        @livewire('admin.attendances.attendances-show') --}}
    </div>

@endsection
