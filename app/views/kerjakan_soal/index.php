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

            <div class="form-group">
                <label>Pilih Set</label>
                <select class="form-control" id="set">
                    <option value="A">Set A</option>
                    <option value="B">Set B</option>
                    <option value="C">Set C</option>
                    <option value="D">Set D</option>
                </select>
            </div>

            <div class="row" id="input_jawaban">
                <div class="col-sm-6">
                    <label>Soal no 1</label>
                    <br>
                    <div class="btn-group btn-group-toggle mb-2" data-toggle="buttons">
                        <label class="btn btn-light active">
                            <input type="radio" name="options" id="option1" autocomplete="off" checked="">
                            <i class="fas fa-align-left"></i>
                        </label>
                        <label class="btn btn-light">
                            <input type="radio" name="options" id="option3" autocomplete="off">
                            <i class="far fa-file-image"></i>
                        </label>
                    </div>
                    <textarea id="soal${i}" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Masukkan jawaban no 1</label>
                        <br>
                        <div class="btn-group btn-group-toggle mb-2" data-toggle="buttons">
                            <label class="btn btn-light active">
                                <input type="radio" name="options" id="option1" autocomplete="off" checked="">
                                <i class="fas fa-align-left"></i>
                            </label>
                            <label class="btn btn-light">
                                <input type="radio" name="options" id="option3" autocomplete="off">
                                <i class="far fa-file-image"></i>
                            </label>
                        </div>
                        <textarea id="kunci${i}" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                    </div>
                </div>
                <div class="col-sm-6">
                    <label>Soal no 2</label>
                    <br>
                    <div class="btn-group btn-group-toggle mb-2" data-toggle="buttons">
                        <label class="btn btn-light active">
                            <input type="radio" name="options" id="option1" autocomplete="off" checked="">
                            <i class="fas fa-align-left"></i>
                        </label>
                        <label class="btn btn-light">
                            <input type="radio" name="options" id="option3" autocomplete="off">
                            <i class="far fa-file-image"></i>
                        </label>
                    </div>
                    <textarea id="soal${i}" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Masukkan jawaban no 2</label>
                        <br>
                        <div class="btn-group btn-group-toggle mb-2" data-toggle="buttons">
                            <label class="btn btn-light active">
                                <input type="radio" name="options" id="option1" autocomplete="off" checked="">
                                <i class="fas fa-align-left"></i>
                            </label>
                            <label class="btn btn-light">
                                <input type="radio" name="options" id="option3" autocomplete="off">
                                <i class="far fa-file-image"></i>
                            </label>
                        </div>
                        <textarea id="kunci${i}" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                    </div>
                </div>
            </div>

            <button type="submit" id="submit_jawaban_btn" class="btn btn-block btn-primary">Submit</button>
        </div>
    </div>


</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->