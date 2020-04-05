<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= BASEURL . "/" . strtolower($data["user_logged_info"]->peran); ?>" class="brand-link">
        <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <span class="brand-text ml-2 font-weight-bold">Lab Fisika Dasar</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <!-- <div class="image">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div> -->
            <div class="info">
                <?php
                foreach ($data["user_logged_info"] as $user_info) { ?>
                    <a href="#" class="d-block"><?= $user_info; ?></a>
                <?php }
                ?>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <?php foreach ($data["sidebar_menu"] as $menu) : ?>
                    <li class="nav-item">
                        <a href="<?= $menu->link; ?>" class="nav-link">
                            <i class="nav-icon <?= $menu->icon; ?>"></i>
                            <p>
                                <?= $menu->label; ?>
                            </p>
                        </a>
                    </li>
                <?php endforeach; ?>

                <!-- ubah password -->
                <li class="mt-3 nav-item">
                    <a href="<?= BASEURL . "/" . strtolower($data["user_logged_info"]->peran . "/ubah_password") ?>" class="nav-link">
                        <i class="nav-icon fas fa-key"></i>
                        <p>
                            Ubah password
                        </p>
                    </a>
                </li>

                <!-- logout -->
                <li class="nav-item">
                    <a href="<?= BASEURL . "/" . strtolower($data["user_logged_info"]->peran) . "/logout"; ?>" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Log out
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>