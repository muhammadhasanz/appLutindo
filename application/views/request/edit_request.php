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
                                <a href="<?= base_url('administrator'); ?>"> Request </a>
                            </li>
                            <li class="breadcrumb-item active"> Edit Request
                            </li>
                        </ol>
                    </nav><!-- /.breadcrumb -->
                    <!-- title and toolbar -->
                    <div class="d-md-flex align-items-md-start mt-4">
                        <h1 class="page-title mr-sm-auto"> Edit Request </h1>
                    </div><!-- /title and toolbar -->
                    <?= $this->session->flashdata('Message') ?>
                </header><!-- /.page-title-bar -->
                <!-- .page-section -->
                <div class="page-section">
                    <!-- .card -->
                    <div class="card card-fluid">
                        <div class="card-body">
                            <form action="<?= base_url('administrator/update_request/') . $request['id_order']; ?> " method="post" enctype="multipart/form-data">
                                <div class="form-row">
                                    <!-- grid column -->
                                    <div class="col-md-6 mb-3">
                                        <label for="customer">Provider</label> <input type="text" class="form-control" id="customer" name="customer" required="" value="<?= $request['customer']; ?>">
                                        <div class="invalid-feedback"> Valid Provider is required. </div>
                                    </div><!-- /grid column -->
                                    <div class="col-md-6 mb-3">
                                        <label for="site_id">Site ID</label> <input type="text" class="form-control" id="site_id" name="site_id" required="" value="<?= $request['site_id']; ?>">
                                        <div class="invalid-feedback"> Valid Site ID is required. </div>
                                    </div><!-- /grid column -->
                                    <div class="col-md-6 mb-3">
                                        <label for="site_name">Site Name</label> <input type="text" class="form-control" id="site_name" name="site_name" required="" value="<?= $request['site_name']; ?>">
                                        <div class="invalid-feedback"> Valid Site Name is required. </div>
                                    </div><!-- /grid column -->
                                    <div class="col-md-6 mb-3">
                                        <label for="address">Address</label> <input type="text" class="form-control" id="address" name="address" required="" value="<?= $request['address']; ?>">
                                        <div class="invalid-feedback"> Valid address is required. </div>
                                    </div><!-- /grid column -->
                                    <div class="col-md-6 mb-3">
                                        <label for="contractor">Contractor</label> <input type="text" class="form-control" id="contractor" name="contractor" required="" value="<?= $request['contractor']; ?>">
                                        <div class="invalid-feedback"> Valid Contractor is required. </div>
                                    </div><!-- /grid column -->
                                    <div class="col-md-6 mb-3">
                                        <label for="region"> Region </label> <input type="text" class="form-control" id="region" name="region" required="" value="<?= $request['region']; ?>">
                                        <div class="invalid-feedback"> Valid Region name is required. </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="project">Project</label> <input type="text" class="form-control" id="project" name="project" required="" value="<?= $request['project']; ?>">
                                        <div class="invalid-feedback"> Valid Project is required. </div>
                                    </div><!-- /grid column -->
                                    <div class="col-md-6 mb-3">
                                        <label class="control-label" for="tanggal_pemesanan">Tanggal Pemesanan</label> <input id="tanggal_pemesanan" class="form-control" name="tanggal_pemesanan" type="text" value="<?= date('d-m-Y', $request['tanggal_pemesanan']); ?>" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- .form-group -->
                                        <div class="form-group">
                                            <label for="type_tower"> Type Tower </label> <select class="custom-select" id="type_tower" name="type_tower" required="">
                                                <option value="<?= $request['type_tower']; ?>"> <?= $request['type_tower']; ?> </option>
                                                <?php if ($request['type_tower'] == "Rooftop") : ?>
                                                    <option value="Greenfield"> Greenfield </option>
                                                <?php else : ?>
                                                    <option value="Rooftop"> Rooftop </option>
                                                <?php endif ?>
                                            </select>
                                            <div class="invalid-feedback"> Valid Type Tower is required. </div>
                                        </div><!-- /.form-group -->
                                    </div><!-- /grid column -->
                                    <div class="col-md-6">
                                        <label for="email">Email</label> <input type="text" class="form-control" id="email" name="email" required="" value="<?= $request['email']; ?>">
                                        <div class="invalid-feedback"> Valid Email is required. </div>
                                    </div><!-- /grid column -->
                                    <div class="col-md-6 mb-5">
                                        <label for="no_phone">NO Telp</label> <input type="text" class="form-control" id="no_phone" name="no_phone" required="" value="<?= $request['no_phone']; ?>">
                                        <div class="invalid-feedback"> Valid NO Telp is required. </div>
                                    </div><!-- /grid column -->
                                    <div class="col-md-6">
                                        <!-- .form-group -->
                                        <div class="form-group">
                                            <label for="status_verifikasi"> Status </label> <select class="custom-select" id="status_verifikasi" name="status_verifikasi" required="">
                                                <option value="<?= $request['status_verifikasi']; ?>"> <?= $request['status_verifikasi']; ?> </option>
                                                <?php if ($request['status_verifikasi'] == "Belum diverifikasi") : ?>
                                                    <option value="Permintaan telah diverifikasi"> Permintaan telah diverifikasi </option>
                                                    <option value="Pembangunan selesai"> Pembangunan selesai </option>
                                                    <option value="Pengkoneksian"> Pengkoneksian </option>
                                                    <option value="Site telah aktif"> Site telah aktif </option>
                                                <?php elseif ($request['status_verifikasi'] == "Permintaan telah diverifikasi") : ?>
                                                    <option value="Belum diverifikasi"> Belum diverifikasi </option>
                                                    <option value="Pembangunan selesai"> Pembangunan selesai </option>
                                                    <option value="Pengkoneksian"> Pengkoneksian </option>
                                                    <option value="Site telah aktif"> Site telah aktif </option>
                                                <?php elseif ($request['status_verifikasi'] == "Pembangunan selesai") : ?>
                                                    <option value="Belum diverifikasi"> Belum diverifikasi </option>
                                                    <option value="Permintaan telah diverifikasi"> Permintaan telah diverifikasi </option>
                                                    <option value="Pengkoneksian"> Pengkoneksian </option>
                                                    <option value="Site telah aktif"> Site telah aktif </option>
                                                <?php elseif ($request['status_verifikasi'] == "Pengkoneksian") : ?>
                                                    <option value="Belum diverifikasi"> Belum diverifikasi </option>
                                                    <option value="Permintaan telah diverifikasi"> Permintaan telah diverifikasi </option>
                                                    <option value="Pembangunan selesai"> Pembangunan selesai </option>
                                                    <option value="Site telah aktif"> Site telah aktif </option>
                                                <?php else : ?>
                                                    <option value="Belum diverifikasi"> Belum diverifikasi </option>
                                                    <option value="Permintaan telah diverifikasi"> Permintaan telah diverifikasi </option>
                                                    <option value="Pembangunan selesai"> Pembangunan selesai </option>
                                                    <option value="Pengkoneksian"> Pengkoneksian </option>
                                                <?php endif ?>
                                            </select>
                                            <div class="invalid-feedback"> Valid Status is required. </div>
                                        </div><!-- /.form-group -->
                                    </div><!-- /grid column -->
                                    <div class="col-sm-12">
                                        <button class="btn btn-primary" style="float: right;" type="submit">Simpan</button>
                                        <a onclick="history.back()"><button type="button" class="btn btn-secondary">Kembali</button></a>
                                    </div>
                                </div><!-- /.form-row -->
                            </form>
                        </div>
                    </div><!-- /.page -->
                </div><!-- /.page -->
            </div><!-- .app-footer -->