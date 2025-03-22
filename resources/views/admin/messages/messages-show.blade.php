<x-show-modal title="Message Details">
    <div>
        <div class="card">
          <div class="card-body">
            <h6 class="card-title">Name : {{$name}}</h6>
            <h6 class="card-title">Email : {{$email}}</h6>
            <h6 class="card-title">Subject : {{$subject}}</h6>
            <p class="card-text">
             {{ $message }}
            </p>
          </div>
        </div>
      </div>
</x-show-modal>
