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
                            <li class="breadcrumb-item active">Proses Kemajuan
                            </li>
                        </ol>
                    </nav><!-- /.breadcrumb -->
                    <!-- title and toolbar -->
                    <div class="d-md-flex align-items-md-start mt-4">
                        <h1 class="page-title mr-sm-auto"> Proses Kemajuan </h1>
                    </div><!-- /title and toolbar -->
                    <?= $this->session->flashdata('Message') ?>
                </header><!-- /.page-title-bar -->
                <!-- .page-section -->
                <div class="page-section">
                    <!-- .card -->
                    <div class="card card-fluid">
                        <!-- .card-body -->
                        <div class="card-header">
                            <!-- .nav-tabs -->
                            <ul class="nav nav-tabs card-header-tabs">
                                <li class="nav-item">
                                    <a class="nav-link <?= $this->uri->segment(2) == '' || $this->uri->segment(2) == 'null' ? 'active show' : ''; ?>" href="<?= base_url('manager') ?>"> Diproses </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?= $this->uri->segment(2) == 'pembangunan' || $this->uri->segment(2) == 'manager' ? 'active show' : '' ?>" href="<?= base_url('manager/pembangunan') ?>"> Pembangunan selesai </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?= $this->uri->segment(2) == 'pengkoneksian' || $this->uri->segment(2) == 'pengkoneksian' ? 'active show' : '' ?>" href="<?= base_url('manager/pengkoneksian') ?>"> Pengkoneksian </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?= $this->uri->segment(2) == 'aktif' || $this->uri->segment(2) == 'aktif' ? 'active show' : '' ?>" href="<?= base_url('manager/aktif') ?>"> Site telah aktif </a>
                                </li>
                            </ul><!-- /.nav-tabs -->
                        </div><!-- /.card-header -->