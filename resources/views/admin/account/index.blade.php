@extends('admin.master')

@section('account-active', 'active')

@section('title', __('Account'))

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-2 mb-2"><span class="text-muted fw-light">@lang('Account Setting') /</span>@lang('Dashboard')</h4>

        @livewire('admin.account.update-account')
    </div>

@endsection
