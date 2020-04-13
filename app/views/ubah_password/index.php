<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark">Ubah Password</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        <?php
                        echo implode(" / ", (array) $data["user_logged_info"]);
                        ?>
                    </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="<?= BASEURL . "/praktikan/ubah_password"; ?>" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="<?= $data["old_password_name"]; ?>">Password lama</label>
                            <input name="<?= $data["old_password_name"]; ?>" type="password" class="form-control" placeholder="Password lama">
                        </div>
                        <div class="form-group">
                            <label for="<?= $data["new_password_name"]; ?>">Password baru</label>
                            <input name="<?= $data["new_password_name"]; ?>" type="password" class="form-control" placeholder="Password baru">
                        </div>
                        <div class="form-group">
                            <label for="<?= $data["new_password_confirm_name"]; ?>">Konfirmasi Password Baru</label>
                            <input name="<?= $data["new_password_confirm_name"]; ?>" type="password" class="form-control" placeholder="Ketik ulang password baru">
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" name="<?= $data["submit_button_name"]; ?>" value="true" class="btn btn-primary">Ubah Password</button>
                    </div>
                </form>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->