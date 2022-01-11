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
                                <a href="<?= base_url('dashboard'); ?>">Dashboard </a>
                            </li>
                            <li class="breadcrumb-item active">User
                            </li>
                        </ol>
                    </nav><!-- /.breadcrumb -->
                    <!-- title and toolbar -->
                    <div class="d-md-flex align-items-md-start mt-4">
                        <h1 class="page-title mr-sm-auto"> User </h1>
                    </div><!-- /title and toolbar -->
                    <?= $this->session->flashdata('Message') ?>
                </header><!-- /.page-title-bar -->
                <!-- .page-section -->
                <div class="page-section">
                    <!-- .card -->
                    <!-- .tab-content -->
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade active show" id="menuT">
                            <!-- floating action -->
                            <a type="button" href="<?= base_url('admin/addbranch') ?>" class="btn btn-primary btn-floated" title="Tambah branch"><span class="fa fa-plus" style="margin-top: 12px;"></span></a> <!-- /floating action -->
                            <div class="masonry-layout">
                                <?php foreach ($branch as $b) : ?>
                                    <!-- .masonry-item -->
                                    <div class="masonry-item col-sm-3">
                                        <!-- .card -->
                                        <div class="card card-fluid">
                                            <!-- .card-body -->
                                            <div class="card-body text-center">
                                                <!-- .user-avatar -->
                                                <figure class="user-avatar user-avatar-xxl dropdown">
                                                    <a href="#" data-toggle="dropdown"><img src="<?= base_url('assets/images/avatars/') . $b['image']; ?>" alt="<?= $b['name'] ?>">
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="<?= base_url('admin/edit_user/') . $b['id_user'] ?>">Edit User</a>
                                                            <button type="button" class="dropdown-item" data-toggle="modal" data-target="#muser<?= $b['id_user']; ?>">Hapus User</button>
                                                            <a class="dropdown-item" href="<?= base_url('admin/detail_user/') . $b['id_user'] ?>">Detail Profile</a>
                                                        </div>
                                                </figure>
                                                <h3 class="card-title text-truncate mt-3">
                                                    <?= $b['name'] ?>
                                                </h3>
                                                <!-- Alert Warning Modal -->
                                                <div class="modal modal-alert fade" id="muser<?= $b['id_user']; ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="muser<?= $b['id_user']; ?>Label" aria-hidden="true">
                                                    <!-- .modal-dialog -->
                                                    <div class="modal-dialog" role="document">
                                                        <!-- .modal-content -->
                                                        <div class="modal-content">
                                                            <!-- .modal-header -->
                                                            <div class="modal-header">
                                                                <h5 id="muser<?= $b['id_user']; ?>Label" class="modal-title">
                                                                    <i class="fa fa-bullhorn text-warning mr-1"></i> Peringatan </h5>
                                                            </div><!-- /.modal-header -->
                                                            <!-- .modal-body -->
                                                            <div class="modal-body">
                                                                <p> Apakah anda ingin menghapus branch "<?= $b['name']; ?>"? </p>
                                                            </div><!-- /.modal-body -->
                                                            <!-- .modal-footer -->
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-subtle-primary" data-dismiss="modal">Tidak!</button> <a class="btn btn-danger" href="<?= base_url('admin/deluser/') . $b['id_user'] ?>">Ya! </a>
                                                            </div><!-- /.modal-footer -->
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
                                            </div><!-- /.card-body -->
                                        </div><!-- /.card -->
                                    </div><!-- /.masonry-item -->
                                <?php endforeach; ?>
                            </div>
                        </div><!-- /.page-section -->
                    </div><!-- /.page-inner -->
                </div><!-- /.page -->
            </div><!-- .app-footer -->