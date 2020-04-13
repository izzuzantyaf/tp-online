<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark">Nilai Tugas Pendahuluan</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <?php
                        echo implode(" / ", (array) $data["user_logged_info"]);
                        ?>
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th>Giliran</th>
                                <th>Modul</th>
                                <th style="width: 40px">Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1.</td>
                                <td>TP ke-1</td>
                                <td>
                                    GLBB
                                </td>
                                <td>
                                    90
                                </td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>TP ke-1</td>
                                <td>
                                    GMB
                                </td>
                                <td>
                                    90
                                </td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>TP ke-2</td>
                                <td>
                                    GJB
                                </td>
                                <td>
                                    90
                                </td>
                            </tr>
                            <tr>
                                <td>4.</td>
                                <td>TP ke-2</td>
                                <td>
                                    RGB
                                </td>
                                <td>
                                    90
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->