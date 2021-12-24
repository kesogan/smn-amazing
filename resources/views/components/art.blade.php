<div class="portfolio {{ $class_title }}">
    <figure>
        @if ( count($art->images) > 0)
        <img src="{{ $art->images[0]->image_src }}" alt="{{ $art->images[0]->alt }}" title="">
        <figcaption>
            <div class="portfolio-detail">
                <div class="views">
                <a class="fa fa-camera-retro" data-gal="prettyPhoto[gallery]" href="{{ $art->images[0]->image_src }}"></a><span>3</span>
                </div>
                <div class="portfolio-title">
                <h5><a href="{{ route('art.show', ['id' => $art->id ]) }}">{{ $art->name }} </a></h5>
                    <p>{{ text_format($art->description, 15) }}</p>
                </div>
            </div>
        </figcaption>
        @else
        No image for this art
        @endif
    </figure>
    {{ $slot }}
</div>
