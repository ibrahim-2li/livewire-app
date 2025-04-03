<div>
            <div class="card mb-4">
                <h5 class="card-header">Profile Details</h5>
                <!-- Account -->
                @livewire('admin.account.update-account-image')
                <hr class="my-0" />
                <div class="card-body">
                    <form wire:submit.prevent='submit'>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Name</label>
                                <input class="form-control" type="text" wire:model='user.name'  placeholder="Name" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">E-mail</label>
                                <input class="form-control" type="text" wire:model='user.email' placeholder="john.doe@example.com" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Phone Number</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">KSA (+966)</span>
                                    <input type="number" class="form-control"
                                    wire:model='user.phone' placeholder="500 000 000" max="999999999" />
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" wire:model='user.address'
                                    placeholder="Address" />
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Save changes</button>
                            <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                        </div>
                    </form>
                </div>
                <!-- /Account -->
            </div>
            @livewire('admin.account.delete-account')
</div>
