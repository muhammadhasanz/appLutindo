<!-- .page-inner -->
<div class="page-inner">
    <!-- .page-title-bar -->
    <header class="page-title-bar">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <a href="<?= base_url('management/profile'); ?>"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Pertinjau</a>
                </li>
            </ol>
        </nav>
    </header><!-- /.page-title-bar -->
    <!-- .page-section -->
    <div class="page-section">
        <!-- grid row -->
        <div class="row">
            <!-- grid column -->
            <div class="col-lg-4">
                <!-- .card -->
                <div class="card card-fluid">
                    <h6 class="card-header"> Detail </h6><!-- .nav -->
                    <nav class="nav nav-tabs flex-column border-0">
                        <?php
                        if ($this->uri->segment(3) == 'profile') {
                            $nav1 = 'active';
                            $nav2 = '';
                            $nav3 = '';
                        } elseif ($this->uri->segment(3) == 'account') {
                            $nav1 = '';
                            $nav2 = 'active';
                            $nav3 = '';
                        } else {
                            $nav1 = '';
                            $nav2 = '';
                            $nav3 = 'active';
                        }
                        ?>
                        <a href="<?= base_url('management/settings/profile'); ?>" class="nav-link <?= $nav1; ?>">Profil</a>
                        <a href="<?= base_url('management/settings/account'); ?>" class="nav-link <?= $nav2; ?>">Akun</a>
                        <a href="<?= base_url('management/settings/notifcation'); ?>" class="nav-link <?= $nav3; ?>">Notifikasi</a>
                    </nav><!-- /.nav -->
                </div><!-- /.card -->
            </div><!-- /grid column -->