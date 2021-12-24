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
{{-- method="POST" action="{{ url('admin/dashboard/arts') }}" enctype="multipart/form-data" --}}
    <form method="POST" action="{{ url('admin/dashboard/event') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="raw">
            <div class="form-group">
                    <label>User:</label>
                    <input type="text" name="user" class="form-control" placeholder="User" id="user">
                    @if ($errors->has('user'))
                        <span class="text-danger">{{ $errors->first('user') }}</span>
                    @endif
                    <div id="userList" class="form-group">
                    </div>
                    <input type="hidden" name="userId" id="userId">
            </div>
        </div>
        <div class="raw">
            <div class="form-group">
                <label>Event:</label>
                <input type="text" name="name" class="form-control" placeholder="Name">
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label>date:</label>
                <input type="date" name="date" class="form-control" placeholder="date">
                @if ($errors->has('date'))
                    <span class="text-danger">{{ $errors->first('date') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label>description:</label>
                <input type="textarea" name="description" class="form-control" placeholder="description">
                @if ($errors->has('description'))
                <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <strong>Event image:</strong>
            <div class="form-group" id="imggroup" style="display: flex;">
            </div>
            <input type="file" name="image[]" class="form-control" placeholder="image" id="image" multiple>
            @if ($errors->has('image'))
                <span class="text-danger">{{ $errors->first('image') }}</span>
            @endif
        </div>
        <div class="form-group">
        <input type="submit" class="btn btn-success btn-submit" value="submit">
        <input type="reset" class="btn btn-reset btn-reset" value="Cancel">
        </div>
    </form>
</div>
<script type="text/javascript">
    // $('.date').datepicker({
    //     format:'mm-dd-yyyy'
    // })

    $(document).ready(function(e){
        function readURL(input){
            if(input.files && input.files[0]){
                var reader=new FileReader();
                $len=input.files.length;
                console.log(input.files);
                    for (let i = 0; i < $len; i++) {
                        $('#imggroup').append("<div class='col-md-4 imgg'><img src='"+URL.createObjectURL(event.target.files[i])+"' width='200px' height='200px'><input type=\"button\" class=\"rem\" value=\"remo\" ><i class='glyphicon glyphicon-remove'></i></div>");
                    }
            }
        }
        $('#image').change(function(){
            alert('gfhfgh');
            readURL(this);
        });
            $(document).on("click","input.rem",function(e){
                $re=confirm('Are you sure ?');
                alert($re);
                if($re)
                    $(this).parent().remove();
        });
//for autoComplet
        $('#user').keyup(function(){
            var query = $(this).val();
            if(query != '' && query.length>1)
            {

             var _token = $('input[name="_token"]').val();
             $.ajax({
              url:"{{ route('event.search') }}",
              method:"POST",
              data:{query:query, _token:_token},
              success:function(data){
               $('#userList').fadeIn();
                        $('#userList').html(data);
              }
             });
            }
        });

        $(document).on('click', 'li', function(e){
            e.preventDefault();
            $ty=$(this).attr('id');
            $('#user').val($ty);
            $('#userList').fadeOut();
        });
        //}

    });

</script>
@endSection;
