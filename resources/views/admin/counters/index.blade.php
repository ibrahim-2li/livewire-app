@extends('admin.master')

@section('counters-active', 'active')

@section('title', 'Counters')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-2 mb-2"><span class="text-muted fw-light">Dashboard /</span> Counters</h4>
        <div class="card mb-4">
            <div class="card-body">
                <div class="mt-1 d-flex justify-content-end diaplay-inline">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                        Create
                    </button>
                </div>
                @livewire('admin.counters.counters-data')
            </div>
        </div>
        @livewire('admin.counters.counters-update')
        @livewire('admin.counters.counters-delete')
        @livewire('admin.counters.counters-show')
    </div>

@endsection
