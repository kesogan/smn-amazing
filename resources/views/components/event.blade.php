@if ($position_image == 'left')
<div class="blog-section">
    <article class="blog-entry">
        <div class="entry-thumb">
            <ul class="blog-slider">
                @if ( count($event->images) > 0)
                @foreach ($event->images as $event_image)
                <li> <img src="{{ $event_image->image_src }}" alt="{{ $event_image->alt }}" title=""> </li>
                @endforeach
                @endif
            </ul>
        </div>
        <div class="entry-details">
            <div class="entry-title">
                {{-- <h3><a href="#">{{ $event->name }}</a></h3> --}}
                <h3>{{ $event->name }}</h3>
            </div>
            <div class="entry-body">
                <p>{{ $event->description }}</p>
            </div>
            <p>Date: {{ @datetime($event->date) }}</p>
            {{-- <a class="type1 dt-sc-button small" href="gallery-detail.html">View Gallery<i class="fa fa-angle-right"></i></a> --}}
        </div>
    </article>
</div>
@else
<div class="blog-section">
    <article class="blog-entry type2">
        <div class="entry-details">
            <div class="entry-title">
                <h3>{{ $event->name }}</h3>
            </div>
            <div class="entry-body">
                <p>{{ $event->description }}</p>
            </div>
            <p>Date: {{ @datetime($event->date) }}</p>
        </div>
        <div class="entry-thumb">
            <ul class="blog-slider">
                @foreach ($event->images as $event_image)
                <li> <img src="{{ $event_image->image_src }}" alt="{{ $event_image->alt }}" title=""> </li>
                @endforeach
            </ul>
        </div>
    </article>
</div>
@endif
