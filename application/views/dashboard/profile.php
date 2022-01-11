<?php $this->load->view('dashboard/header'); ?>
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
                            <label for="username">Username</label> <input type="text" class="form-control" id="username" name="username" required="" value="<?= $user['username']; ?>">
                            <div class="invalid-feedback"> Valid username is required. </div>
                        </div><!-- /grid column -->
                        <!-- grid column -->
                        <div class="col-md-6 mb-3">
                            <label for="nama_pengguna">Nama Pengguna</label> <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" required="" value="<?= $user['name']; ?>">
                            <div class="invalid-feedback"> Valid Nama Pengguna is required. </div>
                        </div><!-- /grid column -->
                        <div class="col-md-6 mb-3">
                            <label for="email">Email</label> <input type="text" class="form-control" id="email" name="email" required="" value="<?= $user['email']; ?>">
                            <div class="invalid-feedback"> Valid Email is required. </div>
                        </div><!-- /grid column -->
                        <!-- grid column -->
                        <div class="col-md-6 mb-3">
                            <label for="no_telpon">No Telepon</label> <input type="text" class="form-control" id="no_telpon" name="no_telpon" required="" value="<?= $user['no_phone']; ?>">
                            <div class="invalid-feedback"> Valid no telepon is required. </div>
                        </div><!-- /grid column -->
                        <div class="col-md-6 mb-3">
                            <label for="alamat"> Alamat </label> <input type="text" class="form-control" id="alamat" name="alamat" required="" value="<?= $user['address']; ?>">
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