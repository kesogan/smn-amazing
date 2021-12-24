@extends('dashboard.layouts.root')

@section('content')

<div class="content-wrapper">

<h1>Events and Arts Controlle Panel</h1>

@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
        @php
            Session::forget('success');
        @endphp
    </div>
@endif

<form method="POST" action="{{ url('admin/dashboard/event-and-art-control') }}" enctype="multipart/form-data">

{{ csrf_field() }}

        <div class="form-group">
            <label>View:</label>
            <select name="view" class="artOrEvent" id="artOrEvent">
                <option value="art" selected >Arts</option>
                <option value="event">Events</option>
            </select>
            @if ($errors->has('view'))
                <span class="text-danger">{{ $errors->first('view') }}</span>
            @endif
        </div>

</form>
<div class="table-responsive fixed">

{{-- <div class="table-responsive-md"> --}}

    {{-- <table class="table table-striped table-hover w-auto" id="art">
        <caption id="caption">List of Arts</caption>
        <thead>
            <tr id="art-hearder">
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Technic</th>
                <th scope="col">Equipement</th>
                <th scope="col">Suport</th>
                <th scope="col">quantity</th>
                <th scope="col">price</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">Remove</th>
                <th scope="col">Update</th>
            </tr>
          </thead>
        <tbody  id="art-body">
            @foreach ($arts as $art)
                <tr>
                    <th scope="row">{{$art->id}}</th>
                    <td scope="col">{{$art->name}}</td>
                    <td scope="col">{{$art->description}}</td>
                    <td scope="col">{{$art->technique}}</td>
                    <td scope="col">{{$art->equipment}}</td>
                    <td scope="col">{{$art->support}}</td>
                    <td scope="col">{{$art->quantity}}</td>
                    <td scope="col">{{$art->price}}</td>
                    <td scope="col">{{$art->created_at}}</td>
                    <td scope="col">{{$art->updated_at}}</td>
                    <td scope="col"><a href="{{ url('event-art-delate?id=\''.$art->id.'\'&type=\'art\'') }}" id="{{$art->id}}" class="removes">remove<i class="glyphicon glyphicon-remove"></i></a></td>
                    <td scope="col"><a href="{{ url('event-and-art-control-edit?id='.$art->id.'&type=\'art\'') }}">edit<i class="glyphicon glyphicon-edit"></i></a></td>
                </tr>
            @endforeach
        </tbody>

    </table> --}}
    fgkfgkfh
    <table class="table table-striped table-hover w-auto hidden" id="event">
        <caption>List of events</caption>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Event Date</th>
                <th scope="col">User</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">Remove</th>
                <th scope="col">Update</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr >
                    <th scope="row">{{$event->id}}</th>
                    <td scope="col">{{$event->name}}</td>
                    <td scope="col">{{$event->date}}</td>
                    <td scope="col">{{$event->user_id}}</td>
                    <td scope="col">{{$event->created_at}}</td>
                    <td scope="col">{{$event->updated_at}}</td>
                    <td scope="col"><i class="glyphicon glyphicon-remove"></i></td>
                    <td scope="col"><a href="{{ url('event') }}">edit<i class="glyphicon glyphicon-edit"></i></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>

<script>
        // $(document).ready(function(){
        //     $('#artOrEvent').change(function(){
        //         // if($(this).val()=='event'){
        //         //     $('#art').hide();
        //         //     $('#event').show();
        //         // }else{
        //         //     $('#event').hide();
        //         //     $('#art').show();
        //         // }
        //     });
        //     $('.removes').on("click",function(e){
        //         e.preventDefault();
        //         delate($(this));
        //     });
        //     // $('#addImage').click(function(e){
        //     //     $image="<input type=\"file\" name=\"image[]\" class=\"form-control\" placeholder=\"art image\">";
        //     //     $('#image').after($image);
        //     // });
        //     // $('#addVideo').click(function(e){
        //     //     $video="<input type=\"file\" name=\"video[]\" class=\"form-control\" placeholder=\"art video\">";
        //     //     $('#video').after($video);
        //     // });
        //     function delate($elem){
        //         alert($elem.attr('href'));
        //     $.ajax({
        //         method: get,
        //         url: $elem.attr('href')
        //     })
        //     .done(function(data){
        //          alert('delate with success');
        //         $elem.parent().parent().remove();
        //     })
        //     .fail(function(data){
        //            alert('fail');
        //     });
        // }
        // });

        </script>
@endsection
@section('scripts')

@endsection
