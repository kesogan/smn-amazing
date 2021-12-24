{{--<div class="dt-sc-tabs-vertical-container">
    <ul class="dt-sc-tabs-vertical-frame">
        <li><a href="#"> 1 </a></li>
        <li><a href="#"> 2 </a></li>
        <li><a href="#"> 3 </a></li>
    </ul>
    <div class="dt-sc-tabs-vertical-frame-content">
        11111111111111111
    </div>
    <div class="dt-sc-tabs-vertical-frame-content">222222222222222</div>
    <div class="dt-sc-tabs-vertical-frame-content">3333333333333333</div>
</div>--}}
<ul class="nav nav-tabs">
    @foreach($array as $item)
        @if($loop->first)
            <li class="active"><a data-toggle="tab" href="#{{ $type . $item->id }}">{{ $item->name }}</a></li>
        @else
            <li><a data-toggle="tab" href="#{{ $type . $item->id }}">{{ $item->name }}</a></li>
        @endif
    @endforeach
</ul>

<div class="tab-content">
    @foreach($array as $item)
        @if($loop->first)
            <div id="{{ $type . $item->id }}" class="tab-pane fade in active">
                <p>{{ $item->description }}</p>
            </div>
        @else
            <div id="{{ $type . $item->id }}" class="tab-pane fade">
                <p>{{ $item->description }}</p>
            </div>
        @endif
    @endforeach
</div>
