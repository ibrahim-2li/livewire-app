<div class="container-xxl pb-5" id="contact">
    <div class="container py-5">
        <div class="row g-5 mb-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="col-lg-6">
                <h1 class="display-5 mb-0">{{$settings->name}}</h1>
            </div>

        </div>
        <div class="row g-5">
            <div class="col-lg-5 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <p class="mb-2">My office:</p>
                <h3 class="fw-bold">{{$settings->address}}</h3>
                <hr class="w-100">
                <p class="mb-2">Call me:</p>
                <h3 class="fw-bold">{{$settings->phone}}</h3>
                <hr class="w-100">
                <p class="mb-2">Mail me:</p>
                <h3 class="fw-bold">{{$settings->email}}</h3>
                <hr class="w-100">
                <p class="mb-2">Follow me:</p>
                <div class="d-flex pt-2">
                    @if($settings->twitter)
                        <a class="btn btn-square btn-primary me-2" href="{{ $settings->twitter }}"><i class="fab fa-twitter"></i></a>
                    @endif
                    @if($settings->facebook)
                        <a class="btn btn-square btn-primary me-2" href="{{ $settings->facebook }}"><i class="fab fa-facebook-f"></i></a>
                    @endif
                    @if($settings->instgram)
                        <a class="btn btn-square btn-primary me-2" href="{{ $settings->instgram }}"><i class="fab fa-instagram"></i></a>
                    @endif
                    @if($settings->linkedin)
                        <a class="btn btn-square btn-primary me-2" href="{{ $settings->linkedin }}"><i class="fab fa-linkedin-in"></i></a>
                    @endif
                </div>
            </div>
            <div class="col-lg-7 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <p class="mb-4 text-white">The contact form is currently inactive. Get a functional and working contact form
                    with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're done.
                    Download Now.</p>
                @livewire('front.components.contact-component')
            </div>
        </div>
    </div>
</div>
