<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark">Koreksi Tugas Pendahuluan</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <form action="<?= BASEURL . "/admin/koreksi"; ?>" method="post">

                <div class="form-group">
                    <label>Giliran ke berapa</label>
                    <select class="form-control" id="giliran" name="giliran">
                        <option>Pilih giliran</option>
                        <option value="1">TP ke-1</option>
                        <option value="2">TP ke-2</option>
                        <option value="3">TP ke-3</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Kelas</label>
                    <select class="form-control" id="kelas" name="kelas">
                        <option>Pilih kelas</option>
                        <option value="TK-42-01">TK-42-01</option>
                        <option value="TK-42-02">TK-42-02</option>
                        <option value="TK-42-03">TK-42-03</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Kelompok</label>
                    <select class="form-control" id="kelompok" name="kelompok">
                        <option>Pilih kelompok</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        <option value="F">F</option>
                        <option value="G">G</option>
                        <option value="H">H</option>
                        <option value="I">I</option>
                        <option value="J">J</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Modul</label>
                    <select class="form-control" id="modul" name="modul">
                        <option>Pilih modul</option>
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
                    <label>Nama Praktikan</label>
                    <select class="form-control" id="nim" name="nim">
                    </select>
                </div>

                <div class="row" id="area_koreksi">
                </div>

                <button type="submit" name="<?= $data["submit_nilai_btn_name"] ?>" class="btn btn-block btn-primary mt-3" value="true">Submit Nilai</button>

            </form>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->