<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark">Soal Tugas Pendahuluan</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <form action="<?= BASEURL . "/admin/upload_soal" ?>" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label>Giliran ke berapa</label>
                    <select class="form-control" name="giliran">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Modul</label>
                    <select class="form-control" name="modul">
                        <option value="glb">GLB</option>
                        <option value="gmb">GMB</option>
                        <option value="gjb">GJB</option>
                        <option value="rgb">RGB</option>
                        <option value="im">IM</option>
                        <option value="pbl">PBL</option>
                        <option value="sgh">SGH</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Jumlah soal</label>
                    <select class="form-control" id="jumlah_soal">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                    </select>
                </div>

                <div class="row" id="input_soal">
                </div>

                <button type="submit" name="<?= $data["submit_btn_name"]; ?>" class="btn btn-block btn-primary" value="true">Submit</button>
            </form>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->