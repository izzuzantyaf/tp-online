<section id="login_praktikan" class="d-flex vh-100">
    <div class="login-box align-self-center">
        <div class="login-logo">
            <a href="<?= BASEURL; ?>"><b>Lab </b>Fisika Dasar</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg"><?= $data["title"]; ?></p>

                <form action="../../index3.html" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="<?= $data["username_placeholder"]; ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <!-- <i class="fas fa-user-tag"></i> -->
                                <i class="fas fa-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-lock"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
</section>

<!-- /.login-box -->