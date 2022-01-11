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
                            <li class="breadcrumb-item active">Request Provider
                            </li>
                        </ol>
                    </nav><!-- /.breadcrumb -->
                    <!-- title and toolbar -->
                    <div class="d-md-flex align-items-md-start mt-4">
                        <h1 class="page-title mr-sm-auto"> Request Provider </h1>
                    </div><!-- /title and toolbar -->
                    <?= $this->session->flashdata('Message') ?>
                </header><!-- /.page-title-bar -->
                <!-- .page-section -->
                <div class="page-section">
                    <!-- .card -->
                    <div class="card card-fluid">
                        <!-- .card-header -->
                        <div class="card-header">
                            <!-- .nav-tabs -->
                            <ul class="nav nav-tabs card-header-tabs">
                                <?php
                                if ($this->uri->segment(2) == 'telah_diverifikasi') {
                                    $navmenu1 = '';
                                    $navmenu2 = 'active show';
                                } else {
                                    $navmenu1 = 'active show';
                                    $navmenu2 = '';
                                }
                                ?>
                                <li class="nav-item">
                                    <a class="nav-link <?= $navmenu1; ?>" href="<?= base_url('administrator') ?>">Belum diverifikasi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?= $navmenu2; ?>" href="<?= base_url('administrator/telah_diverifikasi') ?>">Telah diverifikasi</a>
                                </li>
                            </ul><!-- /.nav-tabs -->
                        </div><!-- /.card-header -->