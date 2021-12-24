
@extends('dashboard.layouts.root')

@section('content')

<div class="content-wrapper">

<h1>ADD NEW ART</h1>

@if(Session::has('success'))

<div class="alert alert-success">

{{ Session::get('success') }}

@php

Session::forget('success');

@endphp

</div>

@endif

<form method="POST" action="{{ url('admin/dashboard/arts') }}" enctype="multipart/form-data">

{{ csrf_field() }}
    <div class="raw">
    <div class="form-group">

        <label>Name:</label>

        <input type="text" name="name" class="form-control" placeholder="Name">
        @if ($errors->has('name'))

            <span class="text-danger">{{ $errors->first('name') }}</span>

        @endif

    </div>


    <div class="form-group">

        <label>description:</label>

        <input type="textarea" name="description" class="form-control" placeholder="description">

        @if ($errors->has('description'))

        <span class="text-danger">{{ $errors->first('description') }}</span>

        @endif

    </div>

    <div class="form-group">

        <label>price:</label>

        <input type="text" name="price" class="form-control" placeholder="price">

        @if ($errors->has('price'))

        <span class="text-danger">{{ $errors->first('price') }}</span>

        @endif

    </div>
    <div class="form-group">

        <label>quantity:</label>

        <input type="text" name="quantity" class="form-control" placeholder="quantity">

        @if ($errors->has('quantity'))

        <span class="text-danger">{{ $errors->first('quantity') }}</span>

        @endif

    </div>
    <div class="form-group">

        <label>technique:</label>

        <input type="textarea" name="technique" class="form-control" placeholder="technique">

        @if ($errors->has('technique'))

        <span class="text-danger">{{ $errors->first('technique') }}</span>

        @endif

    </div>

<div class="form-group">

<label>equipment:</label>

<input type="textarea" name="equipment" class="form-control" placeholder="equipment">

@if ($errors->has('equipment'))

<span class="text-danger">{{ $errors->first('equipment') }}</span>

@endif

</div>

<div class="form-group">

<strong>support:</strong>

<input type="text" name="support" class="form-control" placeholder="support">

@if ($errors->has('support'))

<span class="text-danger">{{ $errors->first('support') }}</span>

@endif

</div>
</div>
<div class="raw">
    <div class="form-group">
        <strong>art image:</strong>
        <div class="form-group" id="imggroup" style="display: flex;">
        </div>
        <input type="file" name="image[]" class="form-control" placeholder="image" id="image" multiple>
        @if ($errors->has('image'))

            <span class="text-danger">{{ $errors->first('image') }}</span>

        @endif
        {{-- <img src="" id="imgs" width="200px"/> --}}
    </div>

</div>

<div class="form-group">

<button class="btn btn-success btn-submit">Submit</button>
<input type="reset" class="btn btn-reset btn-reset" value="Cancel">

</div>

</form>

</div>
    <script>
    $(document).ready(function(e){
        $count=1;
        //$image="<input type=\"file\" name=\"image"+$count+"\" class=\"form-control\" placeholder=\"art image\" id=\"image\">";
        // $('#addImage').click(function(e){
        //     $image="<input type=\"file\" name=\"image[]\" class=\"form-control\" placeholder=\"art image\">";
        //     $('#image').after($image);
        //     $count=$count+1;
        // });
        function readURL(input){
            if(input.files && input.files[0]){
                var reader=new FileReader();
                $len=input.files.length;
                console.log(input.files);
               // alert('les '+$len);
               // reader.onload=function(e){
                    //alert('le '+$len);
                    for (let i = 0; i < $len; i++) {
                        $('#imggroup').append("<div class='col-md-4 imgg'><img src='"+URL.createObjectURL(event.target.files[i])+"' width='200px' height='200px'><input type=\"button\" class=\"rem\" value=\"remo\" ><i class='glyphicon glyphicon-remove'></i></div>");
                        alert('tttt45 '+$("#image").val());
                    }
                   // $('#imgs').attr('src',e.target.result);
                //}
                //alert('lesss '+$len);
                //reader.readAsDataURL(input.files[0]);
                //alert(reader);
            }
        }
        $('#image').change(function(){
            readURL(this);
            alert('tttt1 '+$("#image").val());
        });
        //alert('tttt1 '+$("a.rem").attr('href'));
            //function del(){
                $(document).on("click","input.rem",function(e){
            alert('tttt');
            // e.preventDefault();
            $(this).parent().remove();
        });
        //}

    });

    </script>
@endsection
