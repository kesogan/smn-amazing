@extends('dashboard.layouts.root')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                View an event <a href="{{ route('admin.event.edit', [$event]) }}" style="font-size: small; text-decoration: underline;">edit</a>
                <a href="#" onclick="event.preventDefault();
                    document.getElementById('delete-form-{{ $event->id }}').submit();"
                   style="font-size: small; text-decoration: underline; color: red;">delete</a>
                <form id="delete-form-{{ $event->id }}" action="{{ route('admin.event.delete', [$event]) }}}" method="POST" style="display: none;">
                    @csrf
                    {{ method_field('DELETE') }}
                </form>
                {{--                <small>{{ __('general.back') }}</small>--}}
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('general.home') }}</a></li>
                <li><a href="{{ url('admin.event.list') }}">event</a></li>
                <li class="active">view</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <h3 class="profile-username text-center">{{ $event->name }}</h3>

                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Date</b> <a class="pull-right">{{ @datetime($event->date) }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Description</b> <p class="pull-right">{{ $event->description }}</p>
                                </li>
                            </ul>
{{--                            <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>--}}
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#Pictures" data-toggle="tab">Pictures</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="active tab-pane" id="Pictures">
                                <!-- Post -->
                                <div class="post">
                                    <div class="row margin-bottom">
                                        <div class="col-sm-6">
                                            @if($event->images()->count() > 0)
                                            <img class="img-responsive" src="{{ $event->images[0]->image_src }}" alt="{{ $event->images[0]->alt }}">
                                            @endif
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    @if($event->images()->count() > 1)
                                                        <img class="img-responsive" src="{{ $event->images[1]->image_src }}" alt="{{ $event->images[1]->alt }}">
                                                    @endif
                                                    <br>
                                                    @if($event->images()->count() > 2)
                                                        <img class="img-responsive" src="{{ $event->images[2]->image_src }}" alt="{{ $event->images[2]->alt }}">
                                                    @endif
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-6">
                                                    @if($event->images()->count() > 3)
                                                        <img class="img-responsive" src="{{ $event->images[3]->image_src }}" alt="{{ $event->images[3]->alt }}">
                                                    @endif
                                                    <br>
                                                    @if($event->images()->count() > 4)
                                                        <img class="img-responsive" src="{{ $event->images[4]->image_src }}" alt="{{ $event->images[4]->alt }}">
                                                    @endif
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.row -->
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->

                                    {{--<ul class="list-inline">
                                        <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                                        <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                                        </li>
                                        <li class="pull-right">
                                            <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                                                (5)</a></li>
                                    </ul>--}}

                                </div>
                                <!-- /.post -->
                            </div>
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->
    <!-- /.content -->
    </div>
@endsection
