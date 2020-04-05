<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark">Upload Soal TP</h1>
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
                <label>Modul</label>
                <select class="form-control" id="modul">
                    <option value="glb">GLB/GLBB</option>
                    <option value="gmb">GMB</option>
                    <option value="gjb">GJB</option>
                    <option value="rgb">RGB</option>
                    <option value="im">IM</option>
                    <option value="pbl">PBL</option>
                    <option value="sgh">SGH</option>
                </select>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <!-- textarea -->
                    <div class="form-group">
                        <label>Soal</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Kunci Jawaban</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                    </div>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->