<div class="portfolio-fullwidth"><!-- **portfolio-fullwidth Starts Here** -->
    <div class="portfolio-grid">
        <div class="dt-sc-portfolio-container isotope"> <!-- **dt-sc-portfolio-container Starts Here** -->
            @foreach ($class_array as $item)
                @if ( count($class_array) >= $loop->iteration && $related_arts[$loop->index]->type == $type)
                @art(['class_title' => $item, 'art' => $related_arts[$loop->index] ])
                @endart
                @endif
            @endforeach
        </div><!-- **dt-sc-portfolio-container Ends Here** -->
    </div>
</div><!-- **portfolio-fullwidth Ends Here** -->
