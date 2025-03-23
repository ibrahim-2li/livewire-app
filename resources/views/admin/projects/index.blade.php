@extends('admin.master')

@section('projects-active', 'active')

@section('title', 'projects')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-2 mb-2"><span class="text-muted fw-light">Dashboard /</span> Projects</h4>
        <div class="card mb-4">
            <div class="card-body">
                <div class="mt-1 d-flex justify-content-end diaplay-inline">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                        Create
                    </button>
                </div>
                @livewire('admin.projects.projects-data')
            </div>
        </div>
        {{-- @livewire('admin.projects.projects-update')
        @livewire('admin.projects.projects-delete')
        @livewire('admin.projects.projects-show') --}}
    </div>

@endsection
