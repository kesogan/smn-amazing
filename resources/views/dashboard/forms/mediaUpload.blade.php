@extends('dashboard.layouts.root')

@section('content')

<div class="content-wrapper">

<h1>MEDIA UPLOAD</h1>

@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
        @php
            Session::forget('success');
        @endphp
    </div>
@endif

<form method="POST" action="{{ url('admin/dashboard/mediaUploadPost') }}" enctype="multipart/form-data">

{{ csrf_field() }}
    <div class="raw">
        <div class="form-group">
            <label>Art:</label>
            <autocomplete></autocomplete>
            @if ($errors->has('art'))
                <span class="text-danger">{{ $errors->first('art') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label>Media Type:</label>
            <input type="select" name="name" class="form-control" placeholder="Name">
            <select name="mediaType" multiple class="form-control">
                <option value="image">Images</option>
                <option value="video">Videos</option>
            </select>
            @if ($errors->has('mediaType'))
                <span class="text-danger">{{ $errors->first('mediaType') }}</span>
            @endif
        </div>
    </div>
    <div class="raw">
        <div class="form-group">
            <strong>art image:</strong>
            <div class="form-group">
                <div class="btn btn-success plus" id="addImage">Another Image<i class="fldemo glyphicon glyphicon-plus"></i></div>
            </div>
            <input type="file" name="image[]" class="form-control" placeholder="image" id="image">
            @if ($errors->has('image'))
                <span class="text-danger">{{ $errors->first('image') }}</span>
            @endif
        </div>

    </div>

    <div class="raw" id="showvideo">
        <div class="form-group">
            <strong>art video:</strong>
            <div class="form-group">
                <div class="btn btn-success plus" id="addVideo"> Another video <i class="fldemo glyphicon glyphicon-plus"></i></div>
            </div>
            <input type="file" name="video[]" class="form-control" placeholder="video" id="video">
            @if ($errors->has('video'))
                <span class="text-danger">{{ $errors->first('video') }}</span>
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
    $(document).ready(function(e){
        $('#addImage').click(function(e){
            $image="<input type=\"file\" name=\"image[]\" class=\"form-control\" placeholder=\"art image\">";
            $('#image').after($image);
        });
        $('#addVideo').click(function(e){
            $video="<input type=\"file\" name=\"video[]\" class=\"form-control\" placeholder=\"art video\">";
            $('#video').after($video);
        });
        $('#txtCountry').typeahead({
            source : function (query, result) {
                $.ajax({
                    url: "server.php",
                    data: 'query='+query,
                    dataType:"POST",
                    success: function (data){
                        result($.map(data, function (item){return item;}));
                    }
                });
            }
        });
    });
    </script>
@endsection
