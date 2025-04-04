
<div>
    <!-- Modal -->
    <div class="modal fade" id="showModal" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-sm" role="document">
           <form wire:submit.prevent='submit'>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">{{$title}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-2">
                       {{$slot}}
                    </div>
                </div>

            </div>
           </form>
        </div>
    </div>
</div>
