@extends('admin.master')

@section('events-active', 'active')

@section('title', __('Events'))

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-2 mb-2"><span class="text-muted fw-light">@lang('Events') /</span>@lang('Dashboard') </h4>
        <div class="card mb-4">
            <div class="card-body">
                <div class="mt-1 d-flex justify-content-end diaplay-inline">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                        @lang('Create')
                    </button>
                </div>
                @livewire('admin.events.events-data')
            </div>
        </div>
        @livewire('admin.events.events-update')
        @livewire('admin.events.events-ateends')
        @livewire('admin.events.events-delete')
        {{--  @livewire('admin.projects.projects-show') --}}
    </div>

@endsection
