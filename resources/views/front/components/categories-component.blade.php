<div class="row g-5 mb-5 align-items-center wow fadeInUp" data-wow-delay="0.1s">
    <div class="col-lg-6">
        <h1 class="display-5 mb-0">My Projects</h1>
    </div>
    <div class="col-lg-6 text-lg-end">
        <ul class="list-inline mx-n3 mb-0" id="portfolio-flters">
            <li class="mx-3 active" data-filter="*">All Projects</li>
            @if(count($categories) > 0)
                @foreach ($categories as $category )
                <li class="mx-3" data-filter=".category-{{$category->id}}">{{$category->name}}</li>
                @endforeach
            @endif
        </ul>
    </div>
</div>
