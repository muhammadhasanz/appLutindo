<main class="app-main">
    <!-- .wrapper -->
    <div class="wrapper">
        <!-- .page -->
        <div class="page">
            <!-- .page-cover -->
            <header class="page-cover">
                <div class="text-center">
                    <a href="#" class="user-avatar user-avatar-xl"><img src="<?= base_url('assets/images/avatars/') . $branch['image']; ?>" alt=""></a>
                    <h2 class="h4 mt-2 mb-0"> <?= $branch['name']; ?> </h2>
                    <div class="my-1"> <?= $branch['alias']; ?> </div>
                    <p class="text-muted"> Terdaftar pada tanggal <?= date('d F Y', $branch['date_created']); ?> </p>
                </div><!-- .cover-controls -->
            </header><!-- /.page-cover -->
            <!-- .page-navs -->
            <!-- .page-inner -->
            <div class="page-inner">
                <!-- .page-section -->
                <div class="page-section">
                    <!-- .section-block -->
                    <div class="section-block">
                        <div class="card card-fluid">
                            <div class="card-header">
                                Profile
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <!-- grid column -->
                                    <div class="col-md-6 mb-3">
                                        <label for="username">Username</label> <input type="text" class="form-control" id="username" name="username" required="" value="<?= $branch['username']; ?>">
                                        <div class="invalid-feedback"> Valid username is required. </div>
                                    </div><!-- /grid column -->
                                    <!-- grid column -->
                                    <div class="col-md-6 mb-3">
                                        <label for="nama_pengguna">Nama Pengguna</label> <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" required="" value="<?= $branch['name']; ?>">
                                        <div class="invalid-feedback"> Valid Nama Pengguna is required. </div>
                                    </div><!-- /grid column -->
                                    <div class="col-md-6 mb-3">
                                        <label for="email">Email</label> <input type="text" class="form-control" id="email" name="email" required="" value="<?= $branch['email']; ?>">
                                        <div class="invalid-feedback"> Valid Email is required. </div>
                                    </div><!-- /grid column -->
                                    <!-- grid column -->
                                    <div class="col-md-6 mb-3">
                                        <label for="no_telpon">No Telepon</label> <input type="text" class="form-control" id="no_telpon" name="no_telpon" required="" value="<?= $branch['no_phone']; ?>">
                                        <div class="invalid-feedback"> Valid no telepon is required. </div>
                                    </div><!-- /grid column -->
                                    <div class="col-md-6 mb-3">
                                        <label for="alamat"> Alamat </label> <input type="text" class="form-control" id="alamat" name="alamat" required="" value="<?= $branch['address']; ?>">
                                        <div class="invalid-feedback"> Valid alamat name is required. </div>
                                    </div><!-- /grid column -->
                                </div>
                            </div><!-- /.page -->
                        </div><!-- /.section-block -->
                        <!-- grid row -->
                    </div><!-- /.page-section -->
                </div><!-- /.page-inner -->
            </div><!-- /.page -->
        </div><!-- .app-footer -->