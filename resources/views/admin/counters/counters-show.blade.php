<x-show-modal-sm title="Counters Details">
    <div class="text-light small fw-semibold">
        <label for="emailBasic" class="form-label" wire:model='name'>
        </label>
    </div>
    <div class="fadeInUp" data-wow-delay="0.3s">
        <div class="service-item d-flex flex-column text-center rounded">
            <div class="service-icon flex-shrink-0">
                <i class="{{ $icon }} fa-2x"></i>
            </div>
            <h5 class="mb-3">{{$name}}</h5>
            <p class="m-0">{{$count}}</p>
        </div>
    </div>
</x-show-modal-sm>
