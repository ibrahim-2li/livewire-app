<div class="card">
    <h5 class="card-header">@lang('Delete Account')</h5>
    <div class="card-body">
        <div class="mb-3 col-12 mb-0">
            <div class="alert alert-warning">
                <h6 class="alert-heading fw-bold mb-1">@lang('Are you sure you want to delete your account?')</h6>
                <p class="mb-0">@lang('Once you delete your account, there is no going back. Please be certain.')</p>
            </div>
        </div>
        <form wire:submit.prevent="submit">
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" wire:model="confirmDeletion" id="accountActivation" />
                <label class="form-check-label" for="accountActivation">@lang('I confirm my account deactivation')</label>
            </div>
            <a type="button" wire:click="$dispatch('accountDelete')"
                class="text-white btn btn-danger deactivate-account">
                @lang('Delete Account')
            </a>
        </form>

        <div>
            <!-- Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <form wire:submit.prevent='submit'>
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">@lang('Confirm Deletion')</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row g-2">
                                    <div class="col mb-0">
                                        @lang('Are you sure you want to delete this account? This action cannot be undone!')
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    @lang('Close')
                                </button>
                                <button type="submit" class="btn btn-danger" wire:loading.attr="disabled"
                                    wire:target="submit" :disabled="!$wire.confirmDeletion">
                                    @lang('Delete')
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
