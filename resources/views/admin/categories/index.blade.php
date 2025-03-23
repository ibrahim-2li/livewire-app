@extends('admin.master')

@section('categories-active', 'active')

@section('title', 'Categories')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-2 mb-2"><span class="text-muted fw-light">Dashboard /</span> Categories</h4>
        <div class="card mb-4">
            <div class="card-body">
                <div class="mt-1 d-flex justify-content-end diaplay-inline">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                        Create
                    </button>
                </div>
                @livewire('admin.categories.categories-data')
            </div>
        </div>
        @livewire('admin.categories.categories-update')
        @livewire('admin.categories.categories-delete')
        @livewire('admin.categories.categories-show')
    </div>

@endsection
