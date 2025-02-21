@extends('admin.master')

@section('settings-active', 'active')

@section('title', 'Settings')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-2 mb-2"><span class="text-muted fw-light">Dashboard /</span> Setting</h4>
        <div class="card mb-4">
            <h5 class="card-header">Default</h5>
            <div class="card-body">
                @livewire('admin.settings.update-settings')
            </div>
        </div>

    </div>

@endsection
