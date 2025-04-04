<x-show-modal-md title="Member Details">

        <div class="mx-10 d-flex justify-content-end diaplay-inline">
            <div>
                <h5>{{ $name }}</h5>
                <span>{{ $position }}</span>
                <div class="flex pt-2">
                    @if($twitter)
                    <a class="btn btn-square btn-primary me-2  mt-4" href="{{ $twitter }}"><i class="fab fa-twitter"></i></a>
                    @endif
                    @if($facebook)
                    <a class="btn btn-square btn-primary me-2  mt-4" href="{{ $facebook }}"><i class="fab fa-facebook-f"></i></a>
                    @endif
                    @if($instagram)
                    <a class="btn btn-square btn-primary me-2  mt-4" href="{{ $instagram }}"><i class="fab fa-instagram"></i></a>
                    @endif
                    @if($linkedin)
                    <a class="btn btn-square btn-primary me-2  mt-4" href="{{ $linkedin }}"><i class="fab fa-linkedin-in"></i></a>
                    @endif
                </div>
            </div>
            <img class="mx-2"  src="{{  asset($image) }}" width="auto" height="350px">
    </div>
</x-show-modal-md>
