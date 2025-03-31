<div>
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form wire:submit.prevent='submit'>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirm Deletion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-2">
                            <div class="col mb-0">
                                Are you sure you want to delete this account? This action cannot be undone!
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-danger" wire:loading.attr="disabled" wire:target="submit"
                                :disabled="!$wire.confirmDeletion">
                            Delete
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
