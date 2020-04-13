<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark">Edit Soal TP</h1>
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

            <div class="row" id="input_soal">
                <div class="col-sm-6">
                    <label>Soal no 1</label>
                    <textarea id="soal${i}" class="form-control" rows="3" placeholder="Enter ...">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repudiandae, fuga consequuntur! Provident consequuntur, quaerat qui placeat et totam voluptates quae fugiat consectetur cumque dolore esse? Perspiciatis illum eaque ipsam deserunt!
                    </textarea>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Kunci jawaban no 1</label>
                        <textarea id="kunci${i}" class="form-control" rows="3" placeholder="Enter ...">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sunt fugit et vitae odio ut unde, suscipit dicta laudantium aspernatur ipsam dignissimos consequatur cupiditate dolor quaerat fugiat eos explicabo architecto deserunt?
                        </textarea>
                    </div>
                </div>
                <div class="col-sm-6">
                    <label>Soal no 2</label>
                    <textarea id="soal${i}" class="form-control" rows="3" placeholder="Enter ...">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repudiandae, fuga consequuntur! Provident consequuntur, quaerat qui placeat et totam voluptates quae fugiat consectetur cumque dolore esse? Perspiciatis illum eaque ipsam deserunt!
                    </textarea>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Kunci jawaban no 2</label>
                        <textarea id="kunci${i}" class="form-control" rows="3" placeholder="Enter ...">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sunt fugit et vitae odio ut unde, suscipit dicta laudantium aspernatur ipsam dignissimos consequatur cupiditate dolor quaerat fugiat eos explicabo architecto deserunt?
                        </textarea>
                    </div>
                </div>
                <div class="col-sm-6">
                    <label>Soal no 3</label>
                    <textarea id="soal${i}" class="form-control" rows="3" placeholder="Enter ...">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repudiandae, fuga consequuntur! Provident consequuntur, quaerat qui placeat et totam voluptates quae fugiat consectetur cumque dolore esse? Perspiciatis illum eaque ipsam deserunt!
                    </textarea>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Kunci jawaban no 3</label>
                        <textarea id="kunci${i}" class="form-control" rows="3" placeholder="Enter ...">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sunt fugit et vitae odio ut unde, suscipit dicta laudantium aspernatur ipsam dignissimos consequatur cupiditate dolor quaerat fugiat eos explicabo architecto deserunt?
                        </textarea>
                    </div>
                </div>
            </div>

            <button type="submit" id="upload_soal_submit_btn" class="btn btn-block btn-primary">Submit</button>

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->