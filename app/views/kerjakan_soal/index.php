<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark">Tugas Pendahuluan</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <form action="<?= BASEURL . "/praktikan/kerjakan_soal"; ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Giliran ke berapa</label>
                    <select class="form-control" name="giliran" id="giliran">
                        <option value="1">TP ke-1</option>
                        <option value="2">TP ke-2</option>
                        <option value="3">TP ke-3</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Modul</label>
                    <select class="form-control" name="modul" id="modul">
                        <option value="glb">GLB/GLBB</option>
                        <option value="gmb">GMB</option>
                        <option value="gjb">GJB</option>
                        <option value="rgb">RGB</option>
                        <option value="im">IM</option>
                        <option value="pbl">PBL</option>
                        <option value="sgh">SGH</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Pilih Set</label>
                    <select class="form-control" name="set_soal" id="set_soal">
                        <option value="A">Set A</option>
                        <option value="B">Set B</option>
                        <option value="C">Set C</option>
                        <option value="D">Set D</option>
                    </select>
                </div>

                <div class="row" id="input_jawaban">
                </div>

                <button type="submit" name="<?= $data["submit_btn_name"]; ?>" class="btn btn-block btn-primary">Submit</button>
            </form>
        </div>
    </div>


</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->