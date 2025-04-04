<div class="container-xxl py-6 pt-5" id="project">
    <div class="container">
        @livewire('front.components.categories-component')
        <div class="row g-4 portfolio-container wow fadeInUp" data-wow-delay="0.1s">
            @if(count($projects) > 0)
                @foreach ($projects as $project )
                <div class="col-lg-4 col-md-6 portfolio-item category-{{$project->category_id}}">
                    <div class="portfolio-img rounded overflow-hidden">
                        <img class="img-fluid" src="{{ $project->image }}" alt="">
                        <div class="portfolio-btn">
                            <a class="btn btn-lg-square btn-outline-secondary border-2 mx-1" href="{{ $project->image }}"
                                data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-lg-square btn-outline-secondary border-2 mx-1" href="{{ $project->link }}"><i
                                    class="fa fa-link"></i></a>
                                    <a class="btn btn-lg btn-outline-secondary border-1 mx-9 ">{{ $project->name }}</a>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
