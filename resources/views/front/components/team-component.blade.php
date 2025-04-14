<div class="container-xxl py-6 pb-5" id="team">
    <div class="container">
        @if(count($teams) > 0)
        <div class="row g-5 mb-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="col-lg-6">
                <h1 class="display-5 mb-0">Team Members</h1>
            </div>
        </div>
        <div class="row g-4">

               @foreach ($teams as $team )
               <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item position-relative">
                    <img class="img-fluid rounded" src="{{ asset($team->image) }}" alt="">
                    <div class="team-text bg-white rounded-end p-4">
                        <div>
                            <h5>{{ $team->name }}</h5>
                            <span>{{ $team->position }}</span>
                            <div class="d-flex pt-2">
                                @if($team->twitter)
                                <a class="btn btn-square btn-primary me-2" href="{{ $team->twitter }}"><i class="fab fa-twitter"></i></a>
                            @endif
                            @if($team->facebook)
                                <a class="btn btn-square btn-primary me-2" href="{{ $team->facebook }}"><i class="fab fa-facebook-f"></i></a>
                            @endif
                            @if($team->instagram)
                                <a class="btn btn-square btn-primary me-2" href="{{ $team->instagram }}"><i class="fab fa-instagram"></i></a>
                            @endif
                            @if($team->linkedin)
                                <a class="btn btn-square btn-primary me-2" href="{{ $team->linkedin }}"><i class="fab fa-linkedin-in"></i></a>
                            @endif
                            </div>
                        </div>
                        <i class="fa fa-arrow-right fa-2x text-primary"></i>
                    </div>
                </div>
            </div>

               @endforeach
            </div>
            @endif
    </div>
</div>
