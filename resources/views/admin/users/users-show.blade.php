

<div>
    <div class="modal fade" id="showModal" tabindex="-1"  aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content border-0 rounded-4 overflow-hidden" style="border: 1px solid #6f42c1 !important;">
                <!-- Custom Header -->
                <div class="modal-header border-bottom-0 pb-0 pt-4 px-4">
                    <div class="d-flex align-items-center">
                        <div class="p-2 rounded-circle me-3 d-flex align-items-center justify-content-center" style="background-color: #f3f0ff; color: #6f42c1; width: 48px; height: 48px;">
                            <i class="fas fa-user-check fa-lg"></i>
                        </div>
                        <div>
                            <h5 class="modal-title fw-bold text-dark mb-0">@lang('User Details')</h5>
                            <small class="text-muted">@lang('User ID') : {{$user_id}}</small>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body px-4 pt-2 pb-4">
                    <!-- Avatar -->
                   

                    <!-- Personal Information -->
                    <div class="card border-0 shadow-sm mb-3 rounded-4">
                        <div class="card-body p-4">
                            <h6 class="fw-bold mb-4" style="color: #6f42c1;"><i class="fas fa-id-card me-2"></i>@lang('Personal Information')</h6>
                            <div class="row g-4">
                                <div class="col-md-3">
                                    <label class="small text-muted d-block mb-1">@lang('Full Name')</label>
                                    <div class="fw-bold" style="color: #6f42c1;">{{ $name }}</div>
                                </div>
                                <div class="col-md-3">
                                    <label class="small text-muted d-block mb-1">@lang('Gender')</label>
                                    <div class="fw-bold text-dark">
                                        @if(strtolower($gender) == 'male') <i class="fas fa-mars text-primary me-1"></i> @endif
                                        @if(strtolower($gender) == 'female') <i class="fas fa-venus text-danger me-1"></i> @endif
                                        {{ ucfirst($gender) }}
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label class="small text-muted d-block mb-1">@lang('Nationality')</label>
                                    <div class="fw-bold text-dark">{{ $nationality }}</div>
                                </div>
                                <div class="col-md-6">
                                    <label class="small text-muted d-block mb-1">@lang('Job Title')</label>
                                    <div class="fw-bold text-dark">{{ $job_title }}</div>
                                </div>
                                 <div class="col-md-6">
                                    <label class="small text-muted d-block mb-1">@lang('Role')</label>
                                    <div class="fw-bold text-dark">{{ __($role) }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- QR Code -->
                    
                    <!-- Contact Information -->
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body p-4">
                            <h6 class="fw-bold mb-4" style="color: #6f42c1;"><i class="fas fa-phone-alt me-2"></i>@lang('Contact Information')</h6>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="small text-muted d-block mb-1">@lang('Phone Number')</label>
                                    <div class="fw-bold text-dark"><i class="fas fa-mobile-alt text-success me-2"></i>{{ $phone }}</div>
                                </div>
                                <div class="col-md-6">
                                    <label class="small text-muted d-block mb-1">@lang('Email Address')</label>
                                    <div class="fw-bold text-dark"><i class="fas fa-envelope text-warning me-2"></i>{{ $email }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="modal-footer border-top-0 justify-content-center pb-4 pt-0">
                    <!-- <button type="button" class="btn text-white px-4 rounded-pill" style="background-color: #6f42c1;"><i class="fas fa-pen me-2"></i>@lang('Edit Person')</button>
                    <button type="button" class="btn btn-outline-danger px-4 rounded-pill"><i class="fas fa-trash me-2"></i>@lang('Delete')</button> -->
                    <button type="button" class="btn btn-outline-secondary px-4 rounded-pill" data-bs-dismiss="modal" style="color: #6f42c1; border-color: #6f42c1;">@lang('Close')</button>
                </div>
            </div>
        </div>
    </div>
</div>

