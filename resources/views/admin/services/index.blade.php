@extends('admin.master')

@section('services-active', 'active')

@section('title', 'Services')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-2 mb-2"><span class="text-muted fw-light">Dashboard /</span> Services</h4>
        <div class="card mb-4">
            <div class="card-body">
                <div class="mt-1 d-flex justify-content-end diaplay-inline">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                        Create
                    </button>
                </div>
                @livewire('admin.services.services-data')
            </div>
        </div>
        @livewire('admin.services.services-update')
        @livewire('admin.services.services-delete')
        @livewire('admin.services.services-show')
    </div>

@endsection
