<x-show-modal title="Skill Details">
    <div class="text-light small fw-semibold">
        <label for="emailBasic" class="form-label" wire:model='name'>
            <h4 class="modal-title" id="exampleModalLabel1">{{$name}}</h4>
        </label>
    </div>
    <div class="demo-vertical-spacing">
      <div class="progress" style="height: 20px">
        <div
          class="progress-bar progress-bar-striped progress-bar-animated bg-success"
          role="progressbar"
          style="width: {{$progress}}%"
          aria-valuenow="{{$progress}}"
          aria-valuemin="0"
          aria-valuemax="100"
          wire:model='progress'
        >
         {{$progress}}%
        </div>
      </div>
    </div>
</x-show-modal>
