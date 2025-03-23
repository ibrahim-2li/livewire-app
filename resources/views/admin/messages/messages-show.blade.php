<x-show-modal title="Message Details">
        <div class="flex justify-center items-center">
            <h6 class="text-bold">Name : {{$name}}</h6>
            <h6 class="text-bold">Email : {{$email}}</h6>
            <h6 class="text-bold">Subject : {{$subject}}</h6>
            <p class="card-text">
             {{ $message }}
            </p>
      </div>
</x-show-modal>
