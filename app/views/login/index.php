<section id="<?= $data["section_id"]; ?>" class="d-flex vh-100">
    <div class="login-box align-self-center">

        <div class="login-logo">
            <a href="<?= BASEURL . $data["action_link_params"]; ?>"><b>Lab </b>Fisika Dasar</a>
        </div>
        <!-- /.login-logo -->

        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg"><?= $data["title"]; ?></p>
                <form action="<?= BASEURL . $data["action_link_params"]; ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="text" required name="<?= $data["username_form_name"]; ?>" class="form-control" placeholder="<?= $data["username_placeholder"]; ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <!-- <i class="fas fa-user-tag"></i> -->
                                <i class="fas fa-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" required name="<?= $data["password_form_name"]; ?>" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-lock"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" name="<?= $data["submit_button_name"]; ?>" value="true" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                    <div class="row pl-2" id="login_asisten_link">
                        <a href="<?= BASEURL; ?>/asisten/login" class="mt-2">Login Asisten</a>
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>

    </div>
</section>
<!-- /.login-box -->