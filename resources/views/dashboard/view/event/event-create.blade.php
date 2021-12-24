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
                Create a new event
{{--                <small>{{ __('general.back') }}</small>--}}
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('general.home') }}</a></li>
                <li><a href="{{ url('admin.event.list') }}">event</a></li>
                <li class="active">create</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

        <!-- Main row -->
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add a new even</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form stevent -->
                    <form role="form" action="{{ route("admin.event.store") }}" method="POST" enctype="multipevent/form-data">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter the event name">
                                @if ($errors->has('name'))
                                    <span class="text-danger mt-2">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Date:</label>

                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" name="date" class="form-control pull-right" id="datepicker">
                                    @if ($errors->has('date'))
                                        <span class="text-danger mt-2">{{ $errors->first('date') }}</span>
                                    @endif
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
                            <p class="text-center">Cliquer sur l'image pour en inserer</p>

                            {{--

                            <div class="form-group">
                                <label for="image">Please select the picture of the event</label>
                                <input type="file" id="image" name="image">
                                @if ($errors->has('image'))
                                    <span class="text-danger mt-2">{{ $errors->first('image') }}</span>
                                @endif
                            </div>--}}

                            {{--<span class="btn-file cni no-background-image">
--}}{{--                                <em class="upload-indicator" style="left: 29%">Cliquer pour ajouter l'image</em>--}}{{--
                                <input type="file" id="image1">
                                <input type="hidden" name="image1" value="{{ old('image1') }}">
                                <img src="{{ asset('storage/images/others/cni.png') }}" class="img-responsive" alt="..."/>
                            </span>

                            <div class="form-group">
                                <label for="image2">Please select the picture of the event</label>
                                <input type="file" id="image" name="image2">
                                @if ($errors->has('image2'))
                                    <span class="text-danger mt-2">{{ $errors->first('image2') }}</span>
                                @endif
                            </div>--}}



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
                            <div class="box-footer">
                                <a href="#" id="image-upload-add-button" data-url = "{{ asset('storage/images/others/cni.png') }}" class="btn btn-success">Add an image</a>
                            </div>


                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
                <div class="col-md-1"></div>
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
    </script>
@endpush
