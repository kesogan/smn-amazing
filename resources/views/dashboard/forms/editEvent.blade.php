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

    <form method="POST" action="{{ url('admin/dashboard/event') }}">
        <div class="raw">
            <div class="form-group">
                <label>Art:</label>
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
        </div>
        <div class="form-group">
        <button class="btn btn-success btn-submit">Submit</button>
        <button class="btn btn-reset btn-reset">Cancel</button>
        </div>
    </form>
</div>
