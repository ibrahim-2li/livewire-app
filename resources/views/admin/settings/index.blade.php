@extends('admin.master')

@section('settings-active', 'active')

@section('title', __('Settings'))

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-2 mb-2"><span class="text-muted fw-light">@lang('Settings') /</span>@lang('Dashboard') </h4>
        <div class="card mb-4">
            <div class="card-body">
                @livewire('admin.settings.update-settings')
            </div>
        </div>

    </div>

@endsection
