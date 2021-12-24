<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{ $table_title }}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                {{ $slot }}
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
<!-- /.col -->
