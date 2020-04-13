<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark">Atur Deadline TP</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="form-group">
                <label>Giliran ke berapa</label>
                <select class="form-control" id="giliran_tp">
                    <option value="1">TP ke-1</option>
                    <option value="2">TP ke-2</option>
                    <option value="3">TP ke-3</option>
                </select>
            </div>

            <div class="form-group">
                <label>Date and time range:</label>

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-clock"></i></span>
                    </div>
                    <input type="text" class="form-control float-right" id="reservationtime">
                </div>
                <!-- /.input group -->
            </div>

            <button type="button" class="btn btn-block btn-success">Start</button>

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->