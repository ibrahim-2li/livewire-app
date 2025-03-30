@extends('admin.master')

@section('account-active', 'active')

@section('title', 'Account')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-2 mb-2"><span class="text-muted fw-light">Dashboard /</span>Account Setting</h4>

                @livewire('admin.account.update-account')
            </div>

    </div>

@endsection
