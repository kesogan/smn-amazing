@extends('dashboard.layouts.root')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{ __('general.welcome') }}
                <small>{{ __('general.back') }}</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('admin/dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('general.home') }}</a></li>
                <li class="active">{{ __('general.dashboard') }}</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
{{--            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{ $artPresent }}</h3>

                            <p>{{ ucfirst( __('general.art')) }}s</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">{{ ucfirst( __('general.more_info')) }} <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{ $eventPresent }}<sup style="font-size: 20px"></sup></h3>

                            <p>{{ ucfirst( __('general.event')) }}s</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">{{ ucfirst( __('general.more_info')) }} <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{ $userRegistred }}</h3>

                            <p>{{ ucfirst( __('general.user_registered')) }}</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">{{ ucfirst( __('general.more_info')) }} <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>65</h3>

                            <p>Unique Visitors</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->--}}
            <!-- Main row -->
            <div class="row">
            @data_table(['table_title' => __('general.arts_list') ])
                <thead>
                <tr>
                    <th>{{ ucfirst(__('general.preview')) }}</th>
                    <th>{{ ucfirst(__('general.name')) }}</th>
                    <th>{{ ucfirst(__('general.price')) }}</th>
                    <th>{{ ucfirst(__('general.quantity')) }}</th>
                    <th>{{ ucfirst(__('general.created_at')) }}</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($arts as $art)
                    <tr>
                        @if($art->images->count() > 0)
                        <td><img src="{{ $art->images[0]->image_src }}" alt="{{ $art->images[0]->alt }}" width="50" height="50"/></td>
                        @else
                        <td><p>Sorry but the image could not be found</p></td>
                        @endif
                        <td><a href="{{ route("admin.art.show", [$art]) }}">{{ $art->name }}</a></td>
                        <td>{{ $art->price }}</td>
                        <td>{{ $art->quantity }}</td>
                        <td>{{ @datetime($art->created_at) }}</td>
                        <td>
                            <a href="{{ route('admin.art.show', [$art]) }}" class="btn btn-b btn-primary btn-sm">view</a>
                            <a href="{{ route('admin.art.edit', [$art]) }}" class="btn btn-warning btn-sm">edit</a>
                            <a href="#" onclick="event.preventDefault();
                                document.getElementById('logout-form-{{ $art->id }}').submit();"
                               class="btn btn-danger btn-sm">delete</a>
                            <form id="logout-form-{{ $art->id }}" action="{{ route('admin.art.delete', [$art]) }}}" method="POST" style="display: none;">
                                @csrf
                                {{ method_field('DELETE') }}
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>{{ ucfirst(__('general.name')) }}</th>
                    <th>{{ ucfirst(__('general.price')) }}</th>
                    <th>{{ ucfirst(__('general.quantity')) }}</th>
                    <th>{{ ucfirst(__('general.time')) }}</th>
                    <th>{{ ucfirst(__('general.created_at')) }}</th>
                    <th></th>
                </tr>
                </tfoot>
            @enddata_table
            </div>
            <!-- /.row -->
        </section>
        <!-- right col -->
    </div>
    <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
    </div>
@endsection
