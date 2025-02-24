@extends('admin.master')

@section('skills-active', 'active')

@section('title', 'Skills')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-2 mb-2"><span class="text-muted fw-light">Dashboard /</span> Skills</h4>
        <div class="card mb-4">
            <div class="card-body">
                @livewire('admin.skills.skills-data')
            </div>
        </div>

    </div>

@endsection
