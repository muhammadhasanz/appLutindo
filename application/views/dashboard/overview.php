<?php $this->load->view('management/header'); ?>
<?php $this->load->view('management/navset'); ?>
<!-- grid column -->
<div class="col-lg-8">
    <!-- .card -->
    <div class="card card-fluid">
        <h6 class="card-header"> Profil </h6><!-- .card-body -->
        <div class="card-body">
            <!-- .media -->
            <div class="media mb-3">
                <!-- avatar -->
                <div class="user-avatar user-avatar-xl fileinput-button">
                    <div class="fileinput-button-label"> Ganti foto </div><img src="<?= base_url('assets/images/avatars/') . $user['image']; ?>" alt=""> <input id="fileupload-avatar" type="file" name="avatar">
                </div><!-- /avatar -->
                <!-- .media-body -->
                <div class="media-body pl-3">
                    <h3 class="card-title"> <?= $user['nama']; ?> </h3>
                    <h6 class="card-subtitle text-muted"> Klik avatar saat ini untuk mengubah foto anda. </h6>
                    <p class="card-text">
                        <small>JPG, GIF or PNG 400x400, &lt; 2 MB.</small>
                    </p><!-- The avatar upload progress bar -->
                    <div id="progress-avatar" class="progress progress-xs fade">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                    </div><!-- /avatar upload progress bar -->
                </div><!-- /.media-body -->
            </div><!-- /.media -->
            <!-- form -->
            <form action="<?= base_url('management/updateprofil'); ?>" method="post">
                <!-- form row -->
                <div class="form-row">
                    <!-- form column -->
                    <label for="input02" class="col-md-3">Tingkatan</label> <!-- /form column -->
                    <!-- form column -->
                    <div class="col-md-9 mb-3">
                        <input type="text" class="form-control" id="input02" value="<?= $user['alias']; ?>">
                    </div><!-- /form column -->
                </div><!-- /form row -->
                <!-- form row -->
                <div class="form-row">
                    <!-- form column -->
                    <label for="input03" class="col-md-3">Status</label> <!-- /form column -->
                    <!-- form column -->
                    <div class="col-md-9 mb-3">
                        <textarea class="form-control" id="input03">Huge fan of HTML, CSS and Javascript. Web design and open source lover.</textarea> <small class="text-muted">Muncul di halaman profil anda, maksimal 300 karakter.</small>
                    </div><!-- /form column -->
                </div><!-- /form row -->
                <hr>
                <!-- .form-actions -->
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary ml-auto">Memperbarui Profil</button>
                </div><!-- /.form-actions -->
            </form><!-- /form -->
        </div><!-- /.card-body -->
    </div><!-- /.card -->
    <!-- .card -->
    <div class="card card-fluid">
        <h6 class="card-header"> Media Sosial </h6><!-- form -->
        <form action="<?= base_url('management/socialnetworks') ?>" method="post">
            <!-- .list-group -->
            <div class="list-group list-group-flush mt-3 mb-0">
                <!-- .list-group-item -->
                <div class="list-group-item">
                    <!-- .list-group-item-figure -->
                    <div class="list-group-item-figure">
                        <div class="tile tile-md bg-github">
                            <i class="fab fa-github"></i>
                        </div>
                    </div><!-- /.list-group-item-figure -->
                    <!-- .list-group-item-body -->
                    <div class="list-group-item-body">
                        <input type="text" class="form-control" id="github" placeholder="Github Username">
                    </div><!-- /.list-group-item-body -->
                </div><!-- /.list-group-item -->
                <!-- .list-group-item -->
                <div class="list-group-item">
                    <!-- .list-group-item-figure -->
                    <div class="list-group-item-figure">
                        <div class="tile tile-md bg-facebook">
                            <i class="fab fa-facebook-f"></i>
                        </div>
                    </div><!-- /.list-group-item-figure -->
                    <!-- .list-group-item-body -->
                    <div class="list-group-item-body">
                        <input type="text" class="form-control" id="facebook" placeholder="Facebook Username">
                    </div><!-- /.list-group-item-body -->
                </div><!-- /.list-group-item -->
                <div class="list-group-item">
                    <!-- .list-group-item-figure -->
                    <div class="list-group-item-figure">
                        <div class="tile tile-md bg-twitter">
                            <i class="fab fa-twitter"></i>
                        </div>
                    </div><!-- /.list-group-item-figure -->
                    <!-- .list-group-item-body -->
                    <div class="list-group-item-body">
                        <input type="text" class="form-control" id="twitter" placeholder="Twitter Username" value="">
                    </div><!-- /.list-group-item-body -->
                </div><!-- /.list-group-item -->
            </div><!-- /.list-group -->
            <!-- .card-body -->
            <div class="card-body">
                <hr>
                <!-- .form-actions -->
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary ml-auto">Memperbarui Sosmed</button>
                </div><!-- /.form-actions -->
            </div><!-- /.card-body -->
        </form><!-- /form -->
    </div><!-- /.card -->
</div><!-- /grid column -->
</div><!-- /grid row -->
</div><!-- /.page-section -->
</div><!-- /.page-inner -->
</div><!-- /.page -->
</div>