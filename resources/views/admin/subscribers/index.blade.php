@extends('admin.master')

@section('subscribers-active', 'active')

@section('title', 'Subscribers')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-2 mb-2"><span class="text-muted fw-light">Dashboard /</span> Subscribers</h4>
        <div class="card mb-4">
            <div class="card-body">
                <div class="mt-1 d-flex justify-content-end diaplay-inline">

                </div>
                @livewire('admin.subscribers.subscribers-data')
            </div>
        </div>
        @livewire('admin.subscribers.subscribers-delete')
    </div>
@endsection
