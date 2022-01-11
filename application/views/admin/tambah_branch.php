<main class="app-main">
    <!-- .wrapper -->
    <div class="wrapper">
        <!-- .page -->
        <div class="page">
            <!-- .page-inner -->
            <div class="page-inner">
                <!-- .page-title-bar -->
                <header class="page-title-bar">
                    <!-- .breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="<?= base_url('dashboard'); ?>"> Dashboard </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="<?= base_url('admin'); ?>"> User </a>
                            </li>
                            <li class="breadcrumb-item active"> Tambah User
                            </li>
                        </ol>
                    </nav><!-- /.breadcrumb -->
                    <!-- title and toolbar -->
                    <div class="d-md-flex align-items-md-start mt-4">
                        <h1 class="page-title mr-sm-auto"> Tambah User </h1>
                    </div><!-- /title and toolbar -->
                    <?= $this->session->flashdata('Message') ?>
                </header><!-- /.page-title-bar -->
                <!-- .page-section -->
                <div class="page-section">
                    <!-- .card -->
                    <div class="card card-fluid">
                        <div class="card-body">
                            <form action="<?= base_url('admin/tambah_branch'); ?> " method="post" enctype="multipart/form-data">
                                <div class="form-row">
                                    <!-- grid column -->
                                    <div class="col-md-6 mb-3">
                                        <label for="username">Username</label> <input type="text" class="form-control" id="username" name="username" required="">
                                        <div class="invalid-feedback"> Valid username is required. </div>
                                    </div><!-- /grid column -->
                                    <!-- grid column -->
                                    <div class="col-md-6 mb-3">
                                        <label for="nama_pengguna">Nama Pengguna</label> <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" required="">
                                        <div class="invalid-feedback"> Valid Nama Pengguna is required. </div>
                                    </div><!-- /grid column -->
                                    <div class="col-md-6 mb-3">
                                        <label for="email">Email</label> <input type="email" class="form-control" id="email" name="email" required="">
                                        <div class="invalid-feedback"> Valid Email is required. </div>
                                    </div><!-- /grid column -->
                                    <!-- grid column -->
                                    <div class="col-md-6 mb-3">
                                        <label for="no_telpon">No Telepon</label> <input type="text" class="form-control" id="no_telpon" name="no_telpon" required="">
                                        <div class="invalid-feedback"> Valid no telepon is required. </div>
                                    </div><!-- /grid column -->
                                    <div class="col-md-6 mb-3">
                                        <label for="alamat"> Alamat </label> <input type="text" class="form-control" id="alamat" name="alamat" required="">
                                        <div class="invalid-feedback"> Valid alamat name is required. </div>
                                    </div><!-- /grid column -->
                                    <!-- grid column -->
                                    <div class="col-md-6 mb-3">
                                        <label for="password">Password</label> <input type="password" class="form-control" id="password" name="password" required="">
                                        <div class="invalid-feedback"> Valid password is required. </div>
                                    </div><!-- /grid column -->
                                    <div class="col-md-6 mb-3">
                                        <label for="password2">Konfirmasi Password</label> <input type="password" class="form-control" id="password2" required="">
                                        <div class="invalid-feedback"> Valid konfirmasi password is required. </div>
                                    </div><!-- /grid column -->

                                    <div class="col-sm-4">
                                        <label class="form-control-label" for="img-br">Foto</label>
                                        <div class="custom-file">
                                            <input type="file" name="img-br" class="custom-file-input" id="img-br"> <label class="custom-file-label" for="img-br">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 mt-4">
                                        <img class="img-thumbnail" src="" id="preview">
                                    </div>
                                    <div class="col-sm-12 mt-4">
                                        <button class="btn btn-primary" style="float: right;" type="submit">Simpan</button>
                                        <a href="<?= base_url('admin') ?>"><button type="button" class="btn btn-secondary">Kembali</button></a>
                                    </div>
                                </div><!-- /.form-row -->
                            </form>
                        </div>
                    </div><!-- /.page -->
                </div><!-- /.page -->
            </div><!-- .app-footer -->