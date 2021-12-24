@extends('dashboard.layouts.root')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                View an art  <a href="{{ route('admin.art.edit', [$art]) }}" style="font-size: small; text-decoration: underline;">edit</a>
                <a href="#" onclick="event.preventDefault();
                    document.getElementById('delete-form-{{ $art->id }}').submit();"
                   style="font-size: small; text-decoration: underline; color: red;"
                   style="font-size: small; text-decoration: underline; color: red;">delete</a>
                <form id="delete-form-{{ $art->id }}" action="{{ route('admin.art.delete', [$art]) }}}" method="POST" style="display: none;">
                    @csrf
                    {{ method_field('DELETE') }}
                </form>
                {{--                <small>{{ __('general.back') }}</small>--}}
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('general.home') }}</a></li>
                <li><a href="{{ url('admin.art.list') }}">art</a></li>
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
                            <h3 class="profile-username text-center">{{ $art->name }}</h3>

                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Price</b> <a class="pull-right">{{ $art->price }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Quantity</b> <a class="pull-right">{{ $art->quantity }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Time</b> <a class="pull-right"> {{ dateDiff($art->start_at, $art->end_at) }} </a>
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
                            <li><a href="#settings" data-toggle="tab">About the art</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="active tab-pane" id="Pictures">
                                <!-- Post -->
                                <div class="post">
                                    {{--<div class="user-block">
                                        <img class="img-circle img-bordered-sm" src="../../dist/img/user6-128x128.jpg" alt="User Image">
                                        <span class="username">
                          <a href="#">Adam Jones</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                                        <span class="description">Posted 5 photos - 5 days ago</span>
                                    </div>--}}
                                    <!-- /.user-block -->
                                    <div class="row margin-bottom">
                                        <div class="col-sm-6">
                                            @if($art->images()->count() > 0)
                                            <img class="img-responsive" src="{{ $art->images[0]->image_src }}" alt="{{ $art->images[0]->alt }}">
                                            @endif
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    @if($art->images()->count() > 1)
                                                        <img class="img-responsive" src="{{ $art->images[1]->image_src }}" alt="{{ $art->images[1]->alt }}">
                                                    @endif
                                                    <br>
                                                    @if($art->images()->count() > 2)
                                                        <img class="img-responsive" src="{{ $art->images[2]->image_src }}" alt="{{ $art->images[2]->alt }}">
                                                    @endif
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-6">
                                                    @if($art->images()->count() > 3)
                                                        <img class="img-responsive" src="{{ $art->images[3]->image_src }}" alt="{{ $art->images[3]->alt }}">
                                                    @endif
                                                    <br>
                                                    @if($art->images()->count() > 4)
                                                        <img class="img-responsive" src="{{ $art->images[4]->image_src }}" alt="{{ $art->images[4]->alt }}">
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
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="settings">
                                <!-- The timeline -->
                                <ul class="timeline timeline-inverse">
                                    <!-- timeline time label -->
                                    {{--<li class="time-label">
                                        <span class="bg-red">
                                          10 Feb. 2014
                                        </span>
                                    </li>--}}
                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <li>
                                        <div class="timeline-item">
                                            <h3 class="timeline-header">Description</h3>

                                            <div class="timeline-body">
                                                {{ $art->description }}
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="timeline-item">
                                            <h3 class="timeline-header">Technique</h3>

                                            <div class="timeline-body">
                                                @display_detail(['array' => $art->techniques, 'type' => 'technique'])
                                                @enddisplay_detail
                                            </div>
                                        </div>
                                    </li>

                                    <!-- END timeline item -->
                                    <!-- timeline item -->
                                    <li>
{{--                                        <i class="fa fa-user bg-aqua"></i>--}}

                                        <div class="timeline-item">
{{--                                            <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>--}}

                                            <h3 class="timeline-header no-border">Equipment
                                            </h3>
                                            <div class="timeline-body">
                                                @display_detail(['array' => $art->equipments, 'type' => 'equipment'])
                                                @enddisplay_detail
                                            </div>
                                        </div>
                                    </li>
                                    <!-- END timeline item -->
                                    <!-- timeline item -->
                                    <li>
{{--                                        <i class="fa fa-comments bg-yellow"></i>--}}

                                        <div class="timeline-item">
{{--                                            <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>--}}

                                            <h3 class="timeline-header">Support</h3>

                                            <div class="timeline-body">
                                                @display_detail(['array' => $art->supports, 'type' => 'support'])
                                                @enddisplay_detail
                                            </div>
                                        </div>
                                    </li>
                                </ul>
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
