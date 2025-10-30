<x-show-modal title="Attendances Details">
    <div class="text-light small fw-semibold">
        <label for="emailBasic" class="form-label" wire:model='attendee_name'>
        </label>
    </div>
    <div class="fadeInUp" data-wow-delay="0.3s">
        <div class="service-item d-flex flex-column text-center rounded">
            <div class="service-icon flex-shrink-0">
                <i class="{{ $qr_token }} fa-2x"></i>
            </div>
            <h5 class="mb-3">{{ $attendee_name }}</h5>
            <p class="m-0">{{ $attendee_email }}</p>
            {{-- <p class="m-0">{{ $qr_token }}</p> --}}
            <p class="m-0">{{ $used_at }}</p>
            <p class="m-0 text-success">Cheked By</p>
            <p class="m-0">{{ $checked_in_by }}</p>
        </div>
    </div>
</x-show-modal>
