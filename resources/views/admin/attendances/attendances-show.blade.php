<x-show-modal title="Attendances Details">
    <div class="text-light small fw-semibold">
        <label for="emailBasic" class="form-label" wire:model='name'>
        </label>
    </div>


    <div class="fadeInUp" data-wow-delay="0.3s">
        <div class="service-item d-flex flex-column text-center rounded">
            <div class="service-icon flex-shrink-0">
                <i class="{{ $qr_token }} fa-2x"></i>
            </div>
            <h5 class="mb-3">{{ $name }}</h5>
            <p class="m-0">{{ $email }}</p>
            <p class="m-0">{{ $country }}</p>
            <p class="m-0">{{ $phone }}</p>
            <p class="m-0">{{ $job_title }}</p>
            {{-- <p class="m-0">{{ $qr_token }}</p> --}}
            @if ($qrcodes && $qrcodes->count() > 0 && $used_at == null)
                @foreach ($qrcodes as $qr)
                    <tr>
                        <td>
                            <a href="{{ route('view-qr', $qr->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-qrcode"></i> @lang('Show QR')
                            </a>
                        </td>
                        <p class="m-0">{{ $used_at }}</p>
                        <p class="m-0">{{ $checked_in_by }}</p>
                    </tr>
                @endforeach
            @else
                <p class="m-0 text-success">Checked In Successfully</p>
            @endif
        </div>
    </div>
</x-show-modal>
