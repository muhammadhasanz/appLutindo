<?php $this->load->view('management/header'); ?>
<?php $this->load->view('management/navset'); ?>
<!-- grid column -->
<div class="col-lg-8">
    <!-- .card -->
    <div class="card card-fluid">
        <h6 class="card-header"> Akun </h6><!-- .card-body -->
        <div class="card-body">
            <!-- form -->
            <form method="post">
                <!-- form row -->
                <div class="form-group">
                    <label for="input05">Nama Lengkap</label> <input type="text" class="form-control" id="nama" value="<?= $user['nama']; ?>" required>
                </div>
                <!-- .form-group -->
                <div class="form-group">
                    <label for="input03">Email</label> <input type="email" class="form-control" id="email" value="<?= $user['email']; ?>" required>
                </div><!-- /.form-group -->
                <!-- .form-group -->
                <div class="form-group">
                    <label for="input04">Kata Sandi Baru</label> <input type="password" class="form-control" id="password" value="" required>
                </div><!-- /.form-group -->
                <!-- .form-group -->
                <div class="form-group">
                    <label for="input05">Nama Pengguna</label> <input type="text" class="form-control" id="username" value="<?= $user['username']; ?>" required> <small class="text-muted"></small>
                </div><!-- /.form-group -->
                <hr>
                <!-- .form-actions -->
                <div class="form-actions">
                    <!-- enable submit btn when user type their current password -->
                    <input type="password" class="form-control mr-3" id="crpassword" placeholder="Masukkan Kata Sandi Saat ini" required> <button type="submit" class="btn btn-primary text-nowrap ml-auto">Memperbarui Akun</button>
                </div><!-- /.form-actions -->
            </form><!-- /form -->
        </div><!-- /.card-body -->
    </div><!-- /.card -->
</div><!-- /grid column -->
</div><!-- /grid row -->
</div><!-- /.page-section -->
</div><!-- /.page-inner -->
</div><!-- /.page -->
</div>