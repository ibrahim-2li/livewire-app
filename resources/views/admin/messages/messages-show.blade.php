<div>
    <div class="modal fade" id="showModal" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content border-0 rounded-4 overflow-hidden" style="border: 1px solid #6f42c1 !important;">
                <!-- Custom Header -->
                <div class="modal-header border-bottom-0 pb-0 pt-4 px-4">
                    <div class="d-flex align-items-center">
                        <div class="p-2 rounded-circle me-3 d-flex align-items-center justify-content-center" style="background-color: #f3f0ff; color: #6f42c1; width: 48px; height: 48px;">
                            <i class="fas fa-envelope fa-lg"></i>
                        </div>
                        <div>
                            <h5 class="modal-title fw-bold text-dark mb-0">@lang('Message Details')</h5>
                            <small class="text-muted">@lang('Message ID'): #{{ $message_id }}</small>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body px-4 pt-2 pb-4">
                    <!-- Message Information -->
                    <h6 class="fw-bold mb-4 mt-3 text-dark">@lang('Message Information')</h6>
                    
                    <div class="row g-4 mb-4">
                        <div class="col-md-6">
                            <label class="small text-muted d-block mb-1">@lang('Subject')</label>
                            <div class="fw-bold text-dark">{{ $subject }}</div>
                        </div>
                        <div class="col-md-6">
                            <label class="small text-muted d-block mb-1">@lang('Recipient')</label>
                            @php
                                $email = App\Models\Setting::first()->email;
                            @endphp
                            <div class="fw-bold text-dark">{{ $email }}</div>
                        </div>
                        <div class="col-md-6">
                            <label class="small text-muted d-block mb-1">@lang('Sender')</label>
                            <div class="fw-bold text-dark">{{ $email }}</div>
                        </div>
                        <div class="col-md-6">
                            <label class="small text-muted d-block mb-1">@lang('Date')</label>
                            <div class="fw-bold text-dark">{{ $created_at }}</div>
                        </div>
                    </div>

                    <!-- Message Content -->
                    <div class="card border-0 shadow-sm rounded-4 bg-light">
                        <div class="card-body p-4" style="min-height: 200px;">
                            <p class="card-text text-dark">
                                {{ $message }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="modal-footer border-top-0 justify-content-center pb-4 pt-0">
                    <!-- <button type="button" class="btn text-white px-4 rounded-pill" style="background-color: #6f42c1;"><i class="fas fa-pen me-2"></i>@lang('Edit')</button>
                    <button type="button" class="btn btn-outline-danger px-4 rounded-pill"><i class="fas fa-trash me-2"></i>@lang('Delete')</button> -->
                    <button type="button" class="btn btn-outline-secondary px-4 rounded-pill" data-bs-dismiss="modal" style="color: #6f42c1; border-color: #6f42c1;">@lang('Close')</button>
                </div>
            </div>
        </div>
    </div>
</div>
