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
                                <a href="<?= base_url('branch'); ?>"> Input Jadwal </a>
                            </li>
                            <li class="breadcrumb-item active"> Edit Jadwal
                            </li>
                        </ol>
                    </nav><!-- /.breadcrumb -->
                    <!-- title and toolbar -->
                    <div class="d-md-flex align-items-md-start mt-4">
                        <h1 class="page-title mr-sm-auto"> Edit Jadwal </h1>
                    </div><!-- /title and toolbar -->
                    <?= $this->session->flashdata('Message') ?>
                </header><!-- /.page-title-bar -->
                <!-- .page-section -->
                <div class="page-section">
                    <!-- .card -->
                    <div class="card card-fluid">
                        <div class="card-body">
                            <form action="<?= base_url('branch/update_jadwal/') . $jadwal['id_delivery']; ?> " method="post" enctype="multipart/form-data">
                                <div class="form-row">
                                    <!-- grid column -->
                                    <div class="col-md-6 mb-3">
                                        <label for="name_customer">Nama Customer</label> <input type="text" class="form-control" id="name_customer" name="name_customer" required="" value="<?= $jadwal['name_customer']; ?>">
                                        <div class="invalid-feedback"> Valid nama customer is required. </div>
                                    </div><!-- /grid column -->
                                    <div class="col-md-6 mb-3">
                                        <label for="address">Address</label> <input type="text" class="form-control" id="address" name="address" required="" value="<?= $jadwal['address']; ?>">
                                        <div class="invalid-feedback"> Valid address is required. </div>
                                    </div><!-- /grid column -->
                                    <div class="col-md-6 mb-3">
                                        <label for="no_phone">No Hp</label> <input type="text" class="form-control" id="no_phone" name="no_phone" required="" value="<?= $jadwal['no_phone']; ?>">
                                        <div class="invalid-feedback"> Valid no phone is required. </div>
                                    </div><!-- /grid column -->
                                    <!-- grid column -->
                                    <div class="col-md-6 mb-3">
                                        <label for="type">Type</label>
                                        <select id="type" name="type" class="form-control" data-toggle="select2" value="<?= $jadwal['type']; ?>" data-placeholder="<?= $jadwal['type']; ?>" data-allow-clear="true">
                                        </select>
                                    </div>
                                    <select id="source-type" style="display: none">
                                        <option value=""> Pilih type </option>
                                        <optgroup label="BMW">
                                            <?php foreach ($type_bmw as $c) : ?>
                                                <option value="<?= $c['name_type']; ?>" <?= $jadwal['type'] == $c['name_type'] || $jadwal['type'] != $c['name_type'] ? 'selected' : '' ?>> <?= $c['name_type']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </optgroup>
                                        <optgroup label="BENELLI">
                                            <?php foreach ($type_benelli as $c) : ?>
                                                <option value="<?= $c['name_type']; ?>"> <?= $c['name_type']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </optgroup>
                                    </select>
                                    <div class="col-md-6 mb-3">
                                        <label for="color"> Warna </label> <input type="text" class="form-control" id="color" name="color" required="" value="<?= $jadwal['color']; ?>">
                                        <div class="invalid-feedback"> Valid Warna name is required. </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="chassis_number">No Rangka</label> <input type="text" class="form-control" id="chassis_number" name="chassis_number" required="" value="<?= $jadwal['chassis_number']; ?>">
                                        <div class="invalid-feedback"> Valid No Rangka is required. </div>
                                    </div><!-- /grid column -->
                                    <div class="col-md-6 mb-3">
                                        <label class="control-label" for="flatpickr01">Tanggal Pengantaran</label> <input id="flatpickr01" name="date_delivery" type="text" class="form-control" data-toggle="flatpickr" required="" value="<?= $jadwal['date_delivery']; ?>">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="control-label" for="flatpickr08">Jam</label> <input id="flatpickr08" type="text" name="time" class="form-control" data-toggle="flatpickr" data-enable-time="true" data-no-calendar="true" data-date-format="H:i" required="" value="<?= $jadwal['time']; ?>">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="location"> Lokasi Jemputan </label> <input type="text" class="form-control" id="location" name="location" required="" value="<?= $jadwal['location']; ?>">
                                        <div class="invalid-feedback"> Valid Lokasi Jemputan name is required. </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="sales"> Sales </label> <input type="text" class="form-control" id="sales" name="sales" required="" value="<?= $jadwal['sales']; ?>">
                                        <div class="invalid-feedback"> Valid Total Pembayaran name is required. </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="info"> Keterangan </label> <input type="text" class="form-control" id="info" name="info" required="" value="<?= $jadwal['info']; ?>">
                                        <div class="invalid-feedback"> Valid Keterangan name is required. </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="location_delivery"> Daerah Pengantaran </label> <input type="text" class="form-control" id="location_delivery" name="location_delivery" required="" value="<?= $jadwal['location_delivery']; ?>">
                                        <div class="invalid-feedback"> Valid Daerah Pengantaran name is required. </div>
                                    </div>
                                    <div class="col-sm-12 mt-4">
                                        <button class="btn btn-primary" style="float: right;" type="submit">Simpan</button>
                                        <a href="<?= base_url('branch') ?>"><button type="button" class="btn btn-secondary">Kembali</button></a>
                                    </div>
                                </div><!-- /.form-row -->
                            </form>
                        </div>
                    </div><!-- /.page -->
                </div><!-- /.page -->
            </div><!-- .app-footer -->