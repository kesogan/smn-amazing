
@extends('dashboard.layouts.root')

@section('content')

<div class="content-wrapper">

<h1>UPDATE NEW ART</h1>

@if(Session::has('success'))

<div class="alert alert-success">

{{ Session::get('success') }}

@php

Session::forget('success');

@endphp

</div>

@endif

<form method="POST" action="{{ url('arts-update') }}" enctype="multipart/form-data">

{{ csrf_field() }}
    <div class="raw">
    <div class="form-group">
            <input type="hidden" name="id" value="{{$art->id}}">
        <label>Name:</label>
    <input type="text" value="{{$art->name}}" name="name" class="form-control" placeholder="Name">
        @if ($errors->has('name'))

            <span class="text-danger">{{ $errors->first('name') }}</span>

        @endif

    </div>


    <div class="form-group">

        <label>description:</label>

        <input type="textarea" value="{{$art->description}}" name="description" class="form-control" placeholder="description">

        @if ($errors->has('description'))

        <span class="text-danger">{{ $errors->first('description') }}</span>

        @endif

    </div>

    <div class="form-group">

        <label>price:</label>

        <input type="text" name="price" value="{{$art->price}}" class="form-control" placeholder="price">

        @if ($errors->has('price'))

        <span class="text-danger">{{ $errors->first('price') }}</span>

        @endif

    </div>
    <div class="form-group">

        <label>quantity:</label>

        <input type="text" name="quantity" value="{{$art->quantity}}" class="form-control" placeholder="quantity">

        @if ($errors->has('quantity'))

        <span class="text-danger">{{ $errors->first('quantity') }}</span>

        @endif

    </div>
    <div class="form-group">

        <label>technique:</label>

        <input type="textarea" name="technique" value="{{$art->technique}}" class="form-control" placeholder="technique">

        @if ($errors->has('technique'))

        <span class="text-danger">{{ $errors->first('technique') }}</span>

        @endif

    </div>

<div class="form-group">

<label>equipment:</label>

<input type="textarea" name="equipment" value="{{$art->equipment}}" class="form-control" placeholder="equipment">

@if ($errors->has('equipment'))

<span class="text-danger">{{ $errors->first('equipment') }}</span>

@endif

</div>

<div class="form-group">

<strong>support:</strong>

<input type="text" name="support" value="{{$art->support}}" class="form-control" placeholder="support">

@if ($errors->has('support'))

<span class="text-danger">{{ $errors->first('support') }}</span>

@endif

</div>
</div>
<div class="raw">
    <div class="form-group">
        <strong>art image:</strong>
        <div class="form-group" id="imggroup" style="display: flex;">
            @foreach ($image as $imges)
            <div class='col-md-4 imgg'>
                {{-- {{public_path($imges->url)}} --}}
                <img src="{{ asset($imges->url) }}" width='200px' height='200px'>
                <input type="button" class="reme" value="remo"><i class='glyphicon glyphicon-remove'></i>
            </div>
            @endforeach
        </div>
        <input type="file" name="image[]" class="form-control" placeholder="image" id="image" multiple>
        @if ($errors->has('image'))

            <span class="text-danger">{{ $errors->first('image') }}</span>

        @endif

    </div>

</div>

<div class="form-group">

<button class="btn btn-success btn-submit">Submit</button>
<input type="reset" class="btn btn-reset btn-reset" value="Cancel">

</div>

</form>

</div>
    <script>
    // $(document).ready(function(e){
    //     $count=1;
    //     //$image="<input type=\"file\" name=\"image"+$count+"\" class=\"form-control\" placeholder=\"art image\" id=\"image\">";
    //     // $('#addImage').click(function(e){
    //     //     $image="<input type=\"file\" name=\"image[]\" class=\"form-control\" placeholder=\"art image\">";
    //     //     $('#image').after($image);
    //     //     $count=$count+1;
    //     // });
    // });

    $(document).ready(function(){
        //alert('ready 455 ');
        function readURL(input){
            //alert('tttt4566 ');
            if(input.files && input.files[0]){
                //var reader=new FileReader();
                $len=input.files.length;
                for (let i = 0; i < $len; i++) {
                    //alert('tttt45 ');
                    $('#imggroup').append("<div class='col-md-4 imgg'><img src='"+URL.createObjectURL(event.target.files[i])+"' width='200px' height='200px'><input type=\"button\" class=\"rem\" value=\"remo\"><i class='glyphicon glyphicon-remove'></i></div>");
                }
            }
        }
        $('#image').change(function(){
            //alert('tttt455 ');
            readURL(this);
        });
        $(document).on("click","input.rem",function(e){
            alert('tttt');
            // e.preventDefault();
            $(this).parent().remove();
        });
        $('.removes').on("click",function(e){
                e.preventDefault();
                delate($(this));
            });
        function delate($elem){
                alert($elem.attr('href'));
            $.ajax({
                method: get,
                url: $elem.attr('href')
            })
            .done(function(data){
                 alert('delate with success');
                $elem.parent().parent().remove();
            })
            .fail(function(data){
                   alert('fail');
            });
        }
    });
    </script>
@endsection
