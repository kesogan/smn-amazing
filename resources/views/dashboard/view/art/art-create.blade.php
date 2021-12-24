@extends('dashboard.layouts.root')

@push('style')
    @if (!config('app.debug'))
        <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.5/cropper.min.css" rel="stylesheet">
    @else
        <link href="{{ asset('dashboard/assets/css/cropper.min.css') }}" rel="stylesheet">
    @endif
@endpush

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Add a new art
{{--                <small>{{ __('general.back') }}</small>--}}
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('general.home') }}</a></li>
                <li><a href="{{ url('admin.art.list') }}">art</a></li>
                <li class="active">create</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

        <!-- Main row -->
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add a new art</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route("admin.art.store") }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter the art name">
                                @if ($errors->has('name'))
                                    <span class="text-danger mt-2">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" name="price" id="price" placeholder="Enter the art price">
                                @if ($errors->has('price'))
                                    <span class="text-danger mt-2">{{ $errors->first('price') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Enter the art quantity">
                                @if ($errors->has('quantity'))
                                    <span class="text-danger mt-2">{{ $errors->first('quantity') }}</span>
                                @endif
                            </div>
                            {{--<div class="form-group">
                                <label for="time">Time</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" name="time" class="form-control pull-right">
                                    @if ($errors->has('time'))
                                        <span class="text-danger mt-2">{{ $errors->first('time') }}</span>
                                    @endif
                                </div>
                                <!-- /.input group -->
                            </div>--}}

                            <div class="form-group">
                                <label>Date and time range:</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                    <input type="text" value="" name="time" class="form-control pull-right" id="reservationtime">
                                </div>
                                <!-- /.input group -->
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" rows="3" placeholder="Enter the description of the art ..."></textarea>
                                @if ($errors->has('description'))
                                    <span class="text-danger mt-2">{{ $errors->first('description') }}</span>
                                @endif
                            </div>

                            {{--<div class="form-group">
                                <label for="technique">Technique</label>
                                <textarea class="form-control" name="technique" rows="3" placeholder="Enter the technique used ..."></textarea>
                                @if ($errors->has('technique'))
                                    <span class="text-danger mt-2">{{ $errors->first('technique') }}</span>
                                @endif
                            </div>--}}


                            <div class="form-group">
                                @foreach($techniques as $technique)
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="technique[]" value="{{ $technique->id }}">
                                        {{ $technique->name }}
                                    </label>
                                </div>
                                @endforeach
                            </div>


                            <div class="form-group">
                                <label for="equipment">Equipment</label>
                                <textarea class="form-control" name="equipment" rows="3" placeholder="Enter the equipment used ..."></textarea>
                                @if ($errors->has('equipment'))
                                    <span class="text-danger mt-2">{{ $errors->first('equipment') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="support">Support</label>
                                <textarea class="form-control" name="support" rows="3" placeholder="Enter the support used ..."></textarea>
                                @if ($errors->has('support'))
                                    <span class="text-danger mt-2">{{ $errors->first('support') }}</span>
                                @endif
                            </div>

                            <div class="row no-left-margin no-right-margin" id="image-upload-div">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="b-add-veh">
                                        <div class="add-veh add-elt">
                                            <span class="btn-file cni no-background-image">
                                                <input type="file" class="image-upload" id="image1">
                                                <input type="hidden" name="image1" value="{{ old('image1') }}">
                                                <img src="{{ asset('storage/images/others/cni.png') }}" class="img-responsive" alt="..."/>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class=" col-lg-6  col-md-6 col-sm-12 col-xs-12">
                                    <div class="b-add-veh">
                                        <div class="add-veh add-elt">
                                            <span class="btn-file cni no-background-image">
                                                <input type="file" class="image-upload" id="image2">
                                                <input type="hidden" name="image2" value="{{ old('image2') }}">
                                                <img src="{{ asset('storage/images/others/cni.png') }}" class="img-responsive" alt="..."/>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
                <div class="col-md-2"></div>
            </div>
            <!-- /.row -->
        </section>
        <!-- right col -->
    </div>
    <!-- /.row (main row) -->

    @croup(['id_modal' => 'upload-modal', 'id_save_btn' => 'save-image'])
    <div><img id="avatar" class="overflow-auto mw-100 img-responsive"/></div>
    @endcroup
@endsection

@push('script')
    @if (!config('app.debug'))
        <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.5/cropper.min.js"></script>
    @else
        <script src="{{ asset('dashboard/assets/js/cropper.min.js') }}"></script>
    @endif
    <script src="{{ asset('dashboard/assets/js/store-image.js') }}"></script>
    <script>
        // jQuery("#upload-modal").modal("show");
        jQuery('#datepicker').datepicker({
            autoclose: true
        });
        /*setTimeout(function () {
            jQuery("#upload-modal").modal();
        }, 1000);*/
        jQuery('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: { format: 'MM/DD/YYYY hh:mm A' }}
        );
        jQuery('#reservationtime').on("click", function (event) {
            console.log("jQuery(this).val() = ",jQuery(this).val());
        })

    </script>
@endpush
