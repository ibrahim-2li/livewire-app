<form wire:submit.prevent='submit'>
    @if(session()->has('message'))
    <span wire:loading.delay.longest class="alert alert-success alert-dismissible" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </span>
@endif
    <div class="row g-3">
        <div class="col-md-6">
            <div class="form-floating">
                <input type="text" wire:model='name' class="form-control" placeholder="Your Name">
                <label for="name">Your Name</label>
            </div>
            @include('admin.errors',['property'=>'name'])
        </div>
        <div class="col-md-6">
            <div class="form-floating">
                <input type="email" wire:model='email' class="form-control" placeholder="Your Email">
                <label for="email">Your Email</label>
            </div>
            @include('admin.errors',['property'=>'email'])
        </div>
        <div class="col-12">
            <div class="form-floating">
                <input type="text" wire:model='subject' class="form-control" placeholder="Subject">
                <label for="subject">Subject</label>
            </div>
            @include('admin.errors',['property'=>'subject'])
        </div>
        <div class="col-12">
            <div class="form-floating">
                <textarea class="form-control" wire:model='message' placeholder="Leave a message here" style="height: 100px"></textarea>
                <label for="message">Message</label>
            </div>
            @include('admin.errors',['property'=>'message'])
        </div>
        <div class="col-12">
            <button class="btn btn-primary py-3 px-5" type="submit">Send Message</button>
        </div>
    </div>
</form>
