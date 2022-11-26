<main class="app-main">
    <!-- .wrapper -->
    <div class="wrapper">
        <!-- .page -->
        <div class="page has-sidebar">
            <div class="sidebar-backdrop"></div>
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
                            <li class="breadcrumb-item">Projects
                            </li>
                            <li class="breadcrumb-item active">Projects Progress
                            </li>
                        </ol>
                    </nav><!-- /.breadcrumb -->
                    <!-- title and toolbar -->
                    <div class="d-md-flex align-items-md-start mt-4">
                        <h1 class="page-title mr-sm-auto"> Projects Progress </h1>
                    </div><!-- /title and toolbar -->
                    <?= $this->session->flashdata('Message') ?>
                </header><!-- /.page-title-bar -->
                <!-- .page-section -->
                <div class="page-section">
                    <!-- .card -->
                    <div class="card card-fluid">
                        <div class="card-body">
                            <div class="form-group">
                                <!-- .form-group -->
                                <div class="form-group">
                                    <!-- .input-group -->
                                    <div class="input-group input-group-alt">
                                        <!-- .input-group-prepend -->
                                        <div class="input-group-prepend">
                                            <select id="column" class="custom-select">
                                                <option value='' selected> Filter By </option>
                                                <option value="0"> WBS ID </option>
                                                <option value="1"> Site ID </option>
                                                <option value="2"> Site Name </option>
                                                <option value="3"> Status </option>
                                                <option value="4"> PIC IBS </option>
                                            </select>
                                        </div><!-- /.input-group-prepend -->
                                        <!-- .input-group -->
                                        <div class="input-group has-clearable">
                                            <button id="clear-search" type="button" class="close" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span></button>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><span class="oi oi-magnifying-glass"></span></span>
                                            </div><input id="table-search" type="text" class="form-control" placeholder="Ketikan keyword">
                                        </div><!-- /.input-group -->
                                    </div><!-- /.input-group -->
                                </div><!-- /.form-group -->
                                <input type="hidden" id="role-id" value="<?= $user['role_id']; ?>">
                                <div class="table-responsive">
                                    <!-- .table -->
                                    <table id="myBranch" class="table  table-hover">
                                        <!-- thead -->
                                        <thead>
                                            <tr>
                                                <th> WBS ID </th>
                                                <th> Site ID </th>
                                                <th> Site Name </th>
                                                <th> Status </th>
                                                <th> Site Type </th>
                                                <th> </th>
                                            </tr>
                                        </thead><!-- /thead -->
                                        <!-- tbody -->
                                        <tbody>
                                            <!-- create empty row to passing html validator -->
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody><!-- /tbody -->
                                    </table><!-- /.table -->
                                </div><!-- /.table-responsive -->
                            </div>
                            <div class="modal fade has-shown" id="konfirmasiSite" tabindex="-1" role="dialog" aria-labelledby="konfirmasiSiteLabel" style="display: none;" aria-hidden="true">
                                <!-- .modal-dialog -->
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <!-- .modal-content -->
                                    <div class="modal-content">
                                        <!-- .modal-header -->

                                        <div class="modal-header">
                                            <h5 id="konfirmasiSiteLabel" class="modal-title"> Konfirmasi Proses Kemajuan Site </h5>
                                        </div><!-- /.modal-header -->
                                        <!-- .modal-body -->
                                        <form id="formKonfir" enctype="multipart/form-data" method="post">
                                            <div class="modal-body">
                                                <input type="hidden" name="site_id" id="site_id">
                                                <input type="hidden" name="site_type" id="site_type">
                                                <input type="hidden" name="tahap_id" id="tahap_id">
                                                <input type="hidden" name="status" id="status">
                                                <div class="form-group mb-0">
                                                    <label for="dokumentasi">Dokumentasi</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="dokumentasi" name="dokumentasi" onchange="showPreview(event);"> <label class="custom-file-label" for="dokumentasi" required>Pilih File</label>
                                                        <!-- <div class="invalid-feedback">
                                                        <i class="fa fa-exclamation-circle fa-fw"></i> Sorry, the image must be at least 300×300.
                                                    </div> -->
                                                    </div>
                                                </div>
                                                <img id="img-preview" width="100%" class="mt-3 mb-2">
                                                <div class="form-group">
                                                    <label class="d-flex justify-content-between" for="catatan">Catatan <span class="text-muted">(opsional)</span></label>
                                                    <textarea class="form-control" id="catatan" name="catatan" rows="3"></textarea>
                                                </div>
                                            </div><!-- /.modal-body -->
                                            <!-- .modal-footer -->
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Konfirmasi</button> <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                                            </div><!-- /.modal-footer -->
                                        </form>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div>
                            <div class="modal fade has-shown" id="uploadBiaya" tabindex="-1" role="dialog" aria-labelledby="konfirmasiSiteLabel" style="display: none;" aria-hidden="true">
                                <!-- .modal-dialog -->
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <!-- .modal-content -->
                                    <div class="modal-content">
                                        <!-- .modal-header -->

                                        <div class="modal-header">
                                            <h5 id="konfirmasiSiteLabel" class="modal-title"> Upload Rincian Biaya </h5>
                                        </div><!-- /.modal-header -->
                                        <!-- .modal-body -->
                                        <form id="formKonfir" enctype="multipart/form-data" method="post">
                                            <div class="modal-body">
                                                <div class="form-group mb-0">
                                                    <label for="biayas">Rincian Biaya</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="biaya" name="biaya" onchange="showPreview(event);"> <label class="custom-file-label" for="biayas" required>Pilih File</label>
                                                        <!-- <div class="invalid-feedback">
                                                        <i class="fa fa-exclamation-circle fa-fw"></i> Sorry, the image must be at least 300×300.
                                                    </div> -->
                                                    </div>
                                                </div>
                                            </div><!-- /.modal-body -->
                                            <!-- .modal-footer -->
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Upload</button> <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                                            </div><!-- /.modal-footer -->
                                        </form>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div>
                        </div><!-- /.card -->
                    </div><!-- /.page-section -->
                </div><!-- /.page-inner -->
            </div><!-- /.page -->
            <div class="page-sidebar">
                <!-- .sidebar-header -->
                <header class="sidebar-header d-sm-none">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active">
                                <a href="javascript:void(0);" onclick="Looper.toggleSidebar()"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Back</a>
                            </li>
                        </ol>
                    </nav>
                </header><!-- /.sidebar-header -->
                <!-- .sidebar-section -->
                <div class="sidebar-section">
                    <button type="button" class="close mt-n1 d-none d-sm-block" onclick="Looper.toggleSidebar()" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h6 id="site-name"></h6>
                    <div class="card card-reflow">
                        <div class="card-body p-0">
                            <p class="card-title mb-2"> Progress </p>
                            <div class="progress rounded-0 mb-1">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="text-muted text-weight-bolder small mb-0" id="site-id"></p>
                            <table class="mt-2" width="100%" style="font-size: 14px;">
                                <tr>
                                    <td style="vertical-align: top; width: 100px; max-width:100px;">Long/Lat&nbsp;</td>
                                    <td style="vertical-align: top; width: 20px; max-width:20px;">&nbsp;:&nbsp;&nbsp;</td>
                                    <td id="site_0" class="site_data text-break">-</td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top;">Alamat&nbsp;</td>
                                    <td style="vertical-align: top;">&nbsp;:&nbsp;&nbsp;</td>
                                    <td id="site_1" class="site_data text-break">-</td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top;">Pemilik&nbsp;</td>
                                    <td style="vertical-align: top;">&nbsp;:&nbsp;&nbsp;</td>
                                    <td id="site_2" class="site_data text-break">-</td>
                                </tr>
                                <tr>
                                    <td>Rincian Biaya&nbsp;</td>
                                    <td>&nbsp;:&nbsp;&nbsp;</td>
                                    <td>
                                        <button type="button" style="display: none;" class="btn btn-secondary btn-sm" id="rincian-biaya">Lihat</button>
                                        <span id="biaya-null" style="display: none;">-</span>
                                    </td>
                                </tr>
                            </table>
                        </div><!-- .card-body -->
                    </div>
                </div><!-- /.sidebar-section -->
                <div class="card-body border-top">
                    <!-- <h4 class="card-title"> History </h4> -->
                    <ul class="timeline timeline-dashed-line mt-2 pr-0" id="greenfield">
                        <!-- .timeline-item -->
                        <li class="timeline-item">
                            <!-- .timeline-figure -->
                            <div class="timeline-figure">
                                <span class="tile tile-circle tile-xs"><i class="fa fa-check d-none"></i></span>
                            </div><!-- /.timeline-figure -->
                            <!-- .timeline-body -->
                            <div class="timeline-body list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="timeline-heading mr-3"> SITE VIEW BEFORE SITE OPENING </h6><span class="timeline-date d-none"></span> <!-- .switcher-control switcher-control-secondary confirm -->
                                </div>
                                <div class="d-flex">
                                    <a href="assets/images/dummy/img-5.jpg"><span class="oi oi-magnifying-glass mr-3" style="cursor: pointer;"></span></a>
                                    <div class="check">
                                        <label class="switcher-control switcher-control-secondary confirm"><input data-id="1" type="checkbox" class="switcher-input" disabled> <span class="switcher-indicator" style="opacity: 1;"></span> <span class="switcher-label-on"><i class="fas fa-check"></i></span> <span class="switcher-label-off"><i class="fas fa-times"></i></span></label>
                                    </div> <!-- /.switcher-control switcher-control-secondary confirm -->
                                </div>
                                <!-- <h6 class="timeline-heading mr-3"> SITE VIEW BEFORE SITE OPENING </h6><span class="timeline-date d-none"></span> -->
                            </div><!-- /.timeline-body -->
                        </li><!-- /.timeline-item -->
                        <li class="timeline-item">
                            <!-- .timeline-figure -->
                            <div class="timeline-figure">
                                <span class="tile tile-circle tile-xs"><i class="fa fa-check d-none"></i></span>
                            </div><!-- /.timeline-figure -->
                            <!-- .timeline-body -->
                            <div class="timeline-body list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="timeline-heading mr-3"> TOWER FOUNDATION EXCAVATION </h6><span class="timeline-date d-none"></span>
                                </div>
                                <div class="d-flex">
                                    <a href="assets/images/dummy/img-5.jpg"><span class="oi oi-magnifying-glass mr-3" style="cursor: pointer;"></span></a>
                                    <div class="check">
                                        <label class="switcher-control switcher-control-secondary confirm"><input data-id="2" type="checkbox" class="switcher-input" disabled> <span class="switcher-indicator" style="opacity: 1;"></span> <span class="switcher-label-on"><i class="fas fa-check"></i></span> <span class="switcher-label-off"><i class="fas fa-times"></i></span></label>
                                    </div>
                                </div><!-- /.timeline-body -->
                        </li><!-- /.timeline-item -->
                        <li class="timeline-item">
                            <!-- .timeline-figure -->
                            <div class="timeline-figure">
                                <span class="tile tile-circle tile-xs"><i class="fa fa-check d-none"></i></span>
                            </div><!-- /.timeline-figure -->
                            <!-- .timeline-body -->
                            <div class="timeline-body list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="timeline-heading mr-3"> REINFORCEMENT INSTALLATION </h6><span class="timeline-date d-none"></span>
                                </div>
                                <div class="d-flex">
                                    <a href="assets/images/dummy/img-5.jpg"><span class="oi oi-magnifying-glass mr-3" style="cursor: pointer;"></span></a>
                                    <div class="check">
                                        <label class="switcher-control switcher-control-secondary confirm"><input data-id="3" type="checkbox" class="switcher-input" disabled> <span class="switcher-indicator" style="opacity: 1;"></span> <span class="switcher-label-on"><i class="fas fa-check"></i></span> <span class="switcher-label-off"><i class="fas fa-times"></i></span></label>
                                    </div>
                                </div><!-- /.timeline-body -->
                        </li><!-- /.timeline-item -->
                        <li class="timeline-item">
                            <!-- .timeline-figure -->
                            <div class="timeline-figure">
                                <span class="tile tile-circle tile-xs"><i class="fa fa-check d-none"></i></span>
                            </div><!-- /.timeline-figure -->
                            <!-- .timeline-body -->
                            <div class="timeline-body list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="timeline-heading mr-3"> ANCHOR SETTING AND FORM WORK </h6><span class="timeline-date d-none"></span>
                                </div>
                                <div class="d-flex">
                                    <a href="assets/images/dummy/img-5.jpg"><span class="oi oi-magnifying-glass mr-3" style="cursor: pointer;"></span></a>
                                    <div class="check">
                                        <label class="switcher-control switcher-control-secondary confirm"><input data-id="4" type="checkbox" class="switcher-input" disabled> <span class="switcher-indicator" style="opacity: 1;"></span> <span class="switcher-label-on"><i class="fas fa-check"></i></span> <span class="switcher-label-off"><i class="fas fa-times"></i></span></label>
                                    </div>
                                </div><!-- /.timeline-body -->
                        </li><!-- /.timeline-item -->
                        <li class="timeline-item">
                            <!-- .timeline-figure -->
                            <div class="timeline-figure">
                                <span class="tile tile-circle tile-xs"><i class="fa fa-check d-none"></i></span>
                            </div><!-- /.timeline-figure -->
                            <!-- .timeline-body -->
                            <div class="timeline-body list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="timeline-heading mr-3"> TOWER FOUNDATION POURING + TOOLS </h6><span class="timeline-date d-none"></span>
                                </div>
                                <div class="d-flex">
                                    <a href="assets/images/dummy/img-5.jpg"><span class="oi oi-magnifying-glass mr-3" style="cursor: pointer;"></span></a>
                                    <div class="check">
                                        <label class="switcher-control switcher-control-secondary confirm"><input data-id="5" type="checkbox" class="switcher-input" disabled> <span class="switcher-indicator" style="opacity: 1;"></span> <span class="switcher-label-on"><i class="fas fa-check"></i></span> <span class="switcher-label-off"><i class="fas fa-times"></i></span></label>
                                    </div>
                                </div><!-- /.timeline-body -->
                        </li><!-- /.timeline-item -->
                        <li class="timeline-item">
                            <!-- .timeline-figure -->
                            <div class="timeline-figure">
                                <span class="tile tile-circle tile-xs"><i class="fa fa-check d-none"></i></span>
                            </div><!-- /.timeline-figure -->
                            <!-- .timeline-body -->
                            <div class="timeline-body list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="timeline-heading mr-3"> TEST SLUMP AND CONCRETE TEST SAMPLE </h6><span class="timeline-date d-none"></span>
                                </div>
                                <div class="d-flex">
                                    <a href="assets/images/dummy/img-5.jpg"><span class="oi oi-magnifying-glass mr-3" style="cursor: pointer;"></span></a>
                                    <div class="check">
                                        <label class="switcher-control switcher-control-secondary confirm"><input data-id="6" type="checkbox" class="switcher-input" disabled> <span class="switcher-indicator" style="opacity: 1;"></span> <span class="switcher-label-on"><i class="fas fa-check"></i></span> <span class="switcher-label-off"><i class="fas fa-times"></i></span></label>
                                    </div>
                                </div><!-- /.timeline-body -->
                        </li><!-- /.timeline-item -->
                        <li class="timeline-item">
                            <!-- .timeline-figure -->
                            <div class="timeline-figure">
                                <span class="tile tile-circle tile-xs"><i class="fa fa-check d-none"></i></span>
                            </div><!-- /.timeline-figure -->
                            <!-- .timeline-body -->
                            <div class="timeline-body list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="timeline-heading mr-3"> TOWER FOUNDATION BACKFILLING + COMPACTED </h6><span class="timeline-date d-none"></span>
                                </div>
                                <div class="d-flex">
                                    <a href="assets/images/dummy/img-5.jpg"><span class="oi oi-magnifying-glass mr-3" style="cursor: pointer;"></span></a>
                                    <div class="check">
                                        <label class="switcher-control switcher-control-secondary confirm"><input data-id="7" type="checkbox" class="switcher-input" disabled> <span class="switcher-indicator" style="opacity: 1;"></span> <span class="switcher-label-on"><i class="fas fa-check"></i></span> <span class="switcher-label-off"><i class="fas fa-times"></i></span></label>
                                    </div>
                                </div><!-- /.timeline-body -->
                        </li><!-- /.timeline-item -->
                        <li class="timeline-item">
                            <!-- .timeline-figure -->
                            <div class="timeline-figure">
                                <span class="tile tile-circle tile-xs"><i class="fa fa-check d-none"></i></span>
                            </div><!-- /.timeline-figure -->
                            <!-- .timeline-body -->
                            <div class="timeline-body list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="timeline-heading mr-3"> TOWER ERECTION </h6><span class="timeline-date d-none"></span>
                                </div>
                                <div class="d-flex">
                                    <a href="assets/images/dummy/img-5.jpg"><span class="oi oi-magnifying-glass mr-3" style="cursor: pointer;"></span></a>
                                    <div class="check">
                                        <label class="switcher-control switcher-control-secondary confirm"><input data-id="8" type="checkbox" class="switcher-input" disabled> <span class="switcher-indicator" style="opacity: 1;"></span> <span class="switcher-label-on"><i class="fas fa-check"></i></span> <span class="switcher-label-off"><i class="fas fa-times"></i></span></label>
                                    </div>
                                </div><!-- /.timeline-body -->
                        </li><!-- /.timeline-item -->
                        <li class="timeline-item">
                            <!-- .timeline-figure -->
                            <div class="timeline-figure">
                                <span class="tile tile-circle tile-xs"><i class="fa fa-check d-none"></i></span>
                            </div><!-- /.timeline-figure -->
                            <!-- .timeline-body -->
                            <div class="timeline-body list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="timeline-heading mr-3"> FOUNDATION FENCE EXCAVATION </h6><span class="timeline-date d-none"></span>
                                </div>
                                <div class="d-flex">
                                    <a href="assets/images/dummy/img-5.jpg"><span class="oi oi-magnifying-glass mr-3" style="cursor: pointer;"></span></a>
                                    <div class="check">
                                        <label class="switcher-control switcher-control-secondary confirm"><input data-id="9" type="checkbox" class="switcher-input" disabled> <span class="switcher-indicator" style="opacity: 1;"></span> <span class="switcher-label-on"><i class="fas fa-check"></i></span> <span class="switcher-label-off"><i class="fas fa-times"></i></span></label>
                                    </div>
                                </div><!-- /.timeline-body -->
                        </li><!-- /.timeline-item -->
                        <li class="timeline-item">
                            <!-- .timeline-figure -->
                            <div class="timeline-figure">
                                <span class="tile tile-circle tile-xs"><i class="fa fa-check d-none"></i></span>
                            </div><!-- /.timeline-figure -->
                            <!-- .timeline-body -->
                            <div class="timeline-body list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="timeline-heading mr-3"> FENCE FOUNDATION </h6><span class="timeline-date d-none"></span>
                                </div>
                                <div class="d-flex">
                                    <a href="assets/images/dummy/img-5.jpg"><span class="oi oi-magnifying-glass mr-3" style="cursor: pointer;"></span></a>
                                    <div class="check">
                                        <label class="switcher-control switcher-control-secondary confirm"><input data-id="10" type="checkbox" class="switcher-input" disabled> <span class="switcher-indicator" style="opacity: 1;"></span> <span class="switcher-label-on"><i class="fas fa-check"></i></span> <span class="switcher-label-off"><i class="fas fa-times"></i></span></label>
                                    </div>
                                </div><!-- /.timeline-body -->
                        </li><!-- /.timeline-item -->
                        <li class="timeline-item">
                            <!-- .timeline-figure -->
                            <div class="timeline-figure">
                                <span class="tile tile-circle tile-xs"><i class="fa fa-check d-none"></i></span>
                            </div><!-- /.timeline-figure -->
                            <!-- .timeline-body -->
                            <div class="timeline-body list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="timeline-heading mr-3"> VERTICALITY TOWER CHECKING </h6><span class="timeline-date d-none"></span>
                                </div>
                                <div class="d-flex">
                                    <a href="assets/images/dummy/img-5.jpg"><span class="oi oi-magnifying-glass mr-3" style="cursor: pointer;"></span></a>
                                    <div class="check">
                                        <label class="switcher-control switcher-control-secondary confirm"><input data-id="11" type="checkbox" class="switcher-input" disabled> <span class="switcher-indicator" style="opacity: 1;"></span> <span class="switcher-label-on"><i class="fas fa-check"></i></span> <span class="switcher-label-off"><i class="fas fa-times"></i></span></label>
                                    </div>
                                </div><!-- /.timeline-body -->
                        </li><!-- /.timeline-item -->
                        <li class="timeline-item">
                            <!-- .timeline-figure -->
                            <div class="timeline-figure">
                                <span class="tile tile-circle tile-xs"><i class="fa fa-check d-none"></i></span>
                            </div><!-- /.timeline-figure -->
                            <!-- .timeline-body -->
                            <div class="timeline-body list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="timeline-heading mr-3"> STICK ROD INSTALLATION </h6><span class="timeline-date d-none"></span>
                                </div>
                                <div class="d-flex">
                                    <a href="assets/images/dummy/img-5.jpg"><span class="oi oi-magnifying-glass mr-3" style="cursor: pointer;"></span></a>
                                    <div class="check">
                                        <label class="switcher-control switcher-control-secondary confirm"><input data-id="12" type="checkbox" class="switcher-input" disabled> <span class="switcher-indicator" style="opacity: 1;"></span> <span class="switcher-label-on"><i class="fas fa-check"></i></span> <span class="switcher-label-off"><i class="fas fa-times"></i></span></label>
                                    </div>
                                </div><!-- /.timeline-body -->
                        </li><!-- /.timeline-item -->
                        <li class="timeline-item">
                            <!-- .timeline-figure -->
                            <div class="timeline-figure">
                                <span class="tile tile-circle tile-xs"><i class="fa fa-check d-none"></i></span>
                            </div><!-- /.timeline-figure -->
                            <!-- .timeline-body -->
                            <div class="timeline-body list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="timeline-heading mr-3"> GROUNDING CONTROL PIT VIEW </h6><span class="timeline-date d-none"></span>
                                </div>
                                <div class="d-flex">
                                    <a href="assets/images/dummy/img-5.jpg"><span class="oi oi-magnifying-glass mr-3" style="cursor: pointer;"></span></a>
                                    <div class="check">
                                        <label class="switcher-control switcher-control-secondary confirm"><input data-id="13" type="checkbox" class="switcher-input" disabled> <span class="switcher-indicator" style="opacity: 1;"></span> <span class="switcher-label-on"><i class="fas fa-check"></i></span> <span class="switcher-label-off"><i class="fas fa-times"></i></span></label>
                                    </div>
                                </div><!-- /.timeline-body -->
                        </li><!-- /.timeline-item -->
                        <li class="timeline-item">
                            <!-- .timeline-figure -->
                            <div class="timeline-figure">
                                <span class="tile tile-circle tile-xs"><i class="fa fa-check d-none"></i></span>
                            </div><!-- /.timeline-figure -->
                            <!-- .timeline-body -->
                            <div class="timeline-body list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="timeline-heading mr-3"> CAD WELDED </h6><span class="timeline-date d-none"></span>
                                </div>
                                <div class="d-flex">
                                    <a href="assets/images/dummy/img-5.jpg"><span class="oi oi-magnifying-glass mr-3" style="cursor: pointer;"></span></a>
                                    <div class="check">
                                        <label class="switcher-control switcher-control-secondary confirm"><input data-id="14" type="checkbox" class="switcher-input" disabled> <span class="switcher-indicator" style="opacity: 1;"></span> <span class="switcher-label-on"><i class="fas fa-check"></i></span> <span class="switcher-label-off"><i class="fas fa-times"></i></span></label>
                                    </div>
                                </div><!-- /.timeline-body -->
                        </li><!-- /.timeline-item -->
                        <li class="timeline-item">
                            <!-- .timeline-figure -->
                            <div class="timeline-figure">
                                <span class="tile tile-circle tile-xs"><i class="fa fa-check d-none"></i></span>
                            </div><!-- /.timeline-figure -->
                            <!-- .timeline-body -->
                            <div class="timeline-body list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="timeline-heading mr-3"> TOWER LADDER AND BORDES TOWER </h6><span class="timeline-date d-none"></span>
                                </div>
                                <div class="d-flex">
                                    <a href="assets/images/dummy/img-5.jpg"><span class="oi oi-magnifying-glass mr-3" style="cursor: pointer;"></span></a>
                                    <div class="check">
                                        <label class="switcher-control switcher-control-secondary confirm"><input data-id="15" type="checkbox" class="switcher-input" disabled> <span class="switcher-indicator" style="opacity: 1;"></span> <span class="switcher-label-on"><i class="fas fa-check"></i></span> <span class="switcher-label-off"><i class="fas fa-times"></i></span></label>
                                    </div>
                                </div><!-- /.timeline-body -->
                        </li><!-- /.timeline-item -->
                        <li class="timeline-item">
                            <!-- .timeline-figure -->
                            <div class="timeline-figure">
                                <span class="tile tile-circle tile-xs"><i class="fa fa-check d-none"></i></span>
                            </div><!-- /.timeline-figure -->
                            <!-- .timeline-body -->
                            <div class="timeline-body list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="timeline-heading mr-3"> HORIZONTAL OUT DOOR CABLE LADDER </h6><span class="timeline-date d-none"></span>
                                </div>
                                <div class="d-flex">
                                    <a href="assets/images/dummy/img-5.jpg"><span class="oi oi-magnifying-glass mr-3" style="cursor: pointer;"></span></a>
                                    <div class="check">
                                        <label class="switcher-control switcher-control-secondary confirm"><input data-id="16" type="checkbox" class="switcher-input" disabled> <span class="switcher-indicator" style="opacity: 1;"></span> <span class="switcher-label-on"><i class="fas fa-check"></i></span> <span class="switcher-label-off"><i class="fas fa-times"></i></span></label>
                                    </div>
                                </div><!-- /.timeline-body -->
                        </li><!-- /.timeline-item -->
                        <li class="timeline-item">
                            <!-- .timeline-figure -->
                            <div class="timeline-figure">
                                <span class="tile tile-circle tile-xs"><i class="fa fa-check d-none"></i></span>
                            </div><!-- /.timeline-figure -->
                            <!-- .timeline-body -->
                            <div class="timeline-body list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="timeline-heading mr-3"> SHELTER FOUNDATION </h6><span class="timeline-date d-none"></span>
                                </div>
                                <div class="d-flex">
                                    <a href="assets/images/dummy/img-5.jpg"><span class="oi oi-magnifying-glass mr-3" style="cursor: pointer;"></span></a>
                                    <div class="check">
                                        <label class="switcher-control switcher-control-secondary confirm"><input data-id="17" type="checkbox" class="switcher-input" disabled> <span class="switcher-indicator" style="opacity: 1;"></span> <span class="switcher-label-on"><i class="fas fa-check"></i></span> <span class="switcher-label-off"><i class="fas fa-times"></i></span></label>
                                    </div>
                                </div><!-- /.timeline-body -->
                        </li><!-- /.timeline-item -->
                        <li class="timeline-item">
                            <!-- .timeline-figure -->
                            <div class="timeline-figure">
                                <span class="tile tile-circle tile-xs"><i class="fa fa-check d-none"></i></span>
                            </div><!-- /.timeline-figure -->
                            <!-- .timeline-body -->
                            <div class="timeline-body list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="timeline-heading mr-3"> ME INSTALLATION FINISH </h6><span class="timeline-date d-none"></span>
                                </div>
                                <div class="d-flex">
                                    <a href="assets/images/dummy/img-5.jpg"><span class="oi oi-magnifying-glass mr-3" style="cursor: pointer;"></span></a>
                                    <div class="check">
                                        <label class="switcher-control switcher-control-secondary confirm"><input data-id="18" type="checkbox" class="switcher-input" disabled> <span class="switcher-indicator" style="opacity: 1;"></span> <span class="switcher-label-on"><i class="fas fa-check"></i></span> <span class="switcher-label-off"><i class="fas fa-times"></i></span></label>
                                    </div>
                                </div><!-- /.timeline-body -->
                        </li><!-- /.timeline-item -->
                        <li class="timeline-item">
                            <!-- .timeline-figure -->
                            <div class="timeline-figure">
                                <span class="tile tile-circle tile-xs"><i class="fa fa-check d-none"></i></span>
                            </div><!-- /.timeline-figure -->
                            <!-- .timeline-body -->
                            <div class="timeline-body list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="timeline-heading mr-3"> LIGHTNING PROTECTION </h6><span class="timeline-date d-none"></span>
                                </div>
                                <div class="d-flex">
                                    <a href="assets/images/dummy/img-5.jpg"><span class="oi oi-magnifying-glass mr-3" style="cursor: pointer;"></span></a>
                                    <div class="check">
                                        <label class="switcher-control switcher-control-secondary confirm"><input data-id="19" type="checkbox" class="switcher-input" disabled> <span class="switcher-indicator" style="opacity: 1;"></span> <span class="switcher-label-on"><i class="fas fa-check"></i></span> <span class="switcher-label-off"><i class="fas fa-times"></i></span></label>
                                    </div>
                                </div><!-- /.timeline-body -->
                        </li><!-- /.timeline-item -->
                        <li class="timeline-item">
                            <!-- .timeline-figure -->
                            <div class="timeline-figure">
                                <span class="tile tile-circle tile-xs"><i class="fa fa-check d-none"></i></span>
                            </div><!-- /.timeline-figure -->
                            <!-- .timeline-body -->
                            <div class="timeline-body list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="timeline-heading mr-3"> TOWER LAMPS (OBL) & BRACKET </h6><span class="timeline-date d-none"></span>
                                </div>
                                <div class="d-flex">
                                    <a href="assets/images/dummy/img-5.jpg"><span class="oi oi-magnifying-glass mr-3" style="cursor: pointer;"></span></a>
                                    <div class="check">
                                        <label class="switcher-control switcher-control-secondary confirm"><input data-id="20" type="checkbox" class="switcher-input" disabled> <span class="switcher-indicator" style="opacity: 1;"></span> <span class="switcher-label-on"><i class="fas fa-check"></i></span> <span class="switcher-label-off"><i class="fas fa-times"></i></span></label>
                                    </div>
                                </div><!-- /.timeline-body -->
                        </li><!-- /.timeline-item -->
                        <li class="timeline-item">
                            <!-- .timeline-figure -->
                            <div class="timeline-figure">
                                <span class="tile tile-circle tile-xs"><i class="fa fa-check d-none"></i></span>
                            </div><!-- /.timeline-figure -->
                            <!-- .timeline-body -->
                            <div class="timeline-body list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="timeline-heading mr-3"> ANTENNA MOUNTING </h6><span class="timeline-date d-none"></span>
                                </div>
                                <div class="d-flex">
                                    <a href="assets/images/dummy/img-5.jpg"><span class="oi oi-magnifying-glass mr-3" style="cursor: pointer;"></span></a>
                                    <div class="check">
                                        <label class="switcher-control switcher-control-secondary confirm"><input data-id="21" type="checkbox" class="switcher-input" disabled> <span class="switcher-indicator" style="opacity: 1;"></span> <span class="switcher-label-on"><i class="fas fa-check"></i></span> <span class="switcher-label-off"><i class="fas fa-times"></i></span></label>
                                    </div>
                                </div><!-- /.timeline-body -->
                        </li><!-- /.timeline-item -->
                        <li class="timeline-item">
                            <!-- .timeline-figure -->
                            <div class="timeline-figure">
                                <span class="tile tile-circle tile-xs"><i class="fa fa-check d-none"></i></span>
                            </div><!-- /.timeline-figure -->
                            <!-- .timeline-body -->
                            <div class="timeline-body list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="timeline-heading mr-3"> GPS MOUNTING </h6><span class="timeline-date d-none"></span>
                                </div>
                                <div class="d-flex">
                                    <a href="assets/images/dummy/img-5.jpg"><span class="oi oi-magnifying-glass mr-3" style="cursor: pointer;"></span></a>
                                    <div class="check">
                                        <label class="switcher-control switcher-control-secondary confirm"><input data-id="22" type="checkbox" class="switcher-input" disabled> <span class="switcher-indicator" style="opacity: 1;"></span> <span class="switcher-label-on"><i class="fas fa-check"></i></span> <span class="switcher-label-off"><i class="fas fa-times"></i></span></label>
                                    </div>
                                </div><!-- /.timeline-body -->
                        </li><!-- /.timeline-item -->
                        <li class="timeline-item">
                            <!-- .timeline-figure -->
                            <div class="timeline-figure">
                                <span class="tile tile-circle tile-xs"><i class="fa fa-check d-none"></i></span>
                            </div><!-- /.timeline-figure -->
                            <!-- .timeline-body -->
                            <div class="timeline-body list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="timeline-heading mr-3"> TOWER BUSBAR </h6><span class="timeline-date d-none"></span>
                                </div>
                                <div class="d-flex">
                                    <a href="assets/images/dummy/img-5.jpg"><span class="oi oi-magnifying-glass mr-3" style="cursor: pointer;"></span></a>
                                    <div class="check">
                                        <label class="switcher-control switcher-control-secondary confirm"><input data-id="23" type="checkbox" class="switcher-input" disabled> <span class="switcher-indicator" style="opacity: 1;"></span> <span class="switcher-label-on"><i class="fas fa-check"></i></span> <span class="switcher-label-off"><i class="fas fa-times"></i></span></label>
                                    </div>
                                </div><!-- /.timeline-body -->
                        </li><!-- /.timeline-item -->
                        <li class="timeline-item">
                            <!-- .timeline-figure -->
                            <div class="timeline-figure">
                                <span class="tile tile-circle tile-xs"><i class="fa fa-check d-none"></i></span>
                            </div><!-- /.timeline-figure -->
                            <!-- .timeline-body -->
                            <div class="timeline-body list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="timeline-heading mr-3"> YARD / SITE LAMPS </h6><span class="timeline-date d-none"></span>
                                </div>
                                <div class="d-flex">
                                    <a href="assets/images/dummy/img-5.jpg"><span class="oi oi-magnifying-glass mr-3" style="cursor: pointer;"></span></a>
                                    <div class="check">
                                        <label class="switcher-control switcher-control-secondary confirm"><input data-id="24" type="checkbox" class="switcher-input" disabled> <span class="switcher-indicator" style="opacity: 1;"></span> <span class="switcher-label-on"><i class="fas fa-check"></i></span> <span class="switcher-label-off"><i class="fas fa-times"></i></span></label>
                                    </div>
                                </div><!-- /.timeline-body -->
                        </li><!-- /.timeline-item -->
                        <li class="timeline-item">
                            <!-- .timeline-figure -->
                            <div class="timeline-figure">
                                <span class="tile tile-circle tile-xs"><i class="fa fa-check d-none"></i></span>
                            </div><!-- /.timeline-figure -->
                            <!-- .timeline-body -->
                            <div class="timeline-body list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="timeline-heading mr-3"> PAVING BLOCK AND FINISHING </h6><span class="timeline-date d-none"></span>
                                </div>
                                <div class="d-flex">
                                    <a href="assets/images/dummy/img-5.jpg"><span class="oi oi-magnifying-glass mr-3" style="cursor: pointer;"></span></a>
                                    <div class="check">
                                        <label class="switcher-control switcher-control-secondary confirm"><input data-id="25" type="checkbox" class="switcher-input" disabled> <span class="switcher-indicator" style="opacity: 1;"></span> <span class="switcher-label-on"><i class="fas fa-check"></i></span> <span class="switcher-label-off"><i class="fas fa-times"></i></span></label>
                                    </div>
                                </div><!-- /.timeline-body -->
                        </li><!-- /.timeline-item -->
                        <li class="timeline-item">
                            <!-- .timeline-figure -->
                            <div class="timeline-figure">
                                <span class="tile tile-circle tile-xs"><i class="fa fa-check d-none"></i></span>
                            </div><!-- /.timeline-figure -->
                            <!-- .timeline-body -->
                            <div class="timeline-body list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="timeline-heading mr-3"> ACCESS ROAD </h6><span class="timeline-date d-none"></span>
                                </div>
                                <div class="d-flex">
                                    <a href="assets/images/dummy/img-5.jpg"><span class="oi oi-magnifying-glass mr-3" style="cursor: pointer;"></span></a>
                                    <div class="check">
                                        <label class="switcher-control switcher-control-secondary confirm"><input data-id="26" type="checkbox" class="switcher-input" disabled> <span class="switcher-indicator" style="opacity: 1;"></span> <span class="switcher-label-on"><i class="fas fa-check"></i></span> <span class="switcher-label-off"><i class="fas fa-times"></i></span></label>
                                    </div>
                                </div><!-- /.timeline-body -->
                        </li><!-- /.timeline-item -->
                        <li class="timeline-item">
                            <!-- .timeline-figure -->
                            <div class="timeline-figure">
                                <span class="tile tile-circle tile-xs"><i class="fa fa-check d-none"></i></span>
                            </div><!-- /.timeline-figure -->
                            <!-- .timeline-body -->
                            <div class="timeline-body list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="timeline-heading mr-3"> SITE VIEW </h6><span class="timeline-date d-none"></span>
                                </div>
                                <div class="d-flex">
                                    <a href="assets/images/dummy/img-5.jpg"><span class="oi oi-magnifying-glass mr-3" style="cursor: pointer;"></span></a>
                                    <div class="check">
                                        <label class="switcher-control switcher-control-secondary confirm"><input data-id="27" type="checkbox" class="switcher-input" disabled> <span class="switcher-indicator" style="opacity: 1;"></span> <span class="switcher-label-on"><i class="fas fa-check"></i></span> <span class="switcher-label-off"><i class="fas fa-times"></i></span></label>
                                    </div>
                                </div><!-- /.timeline-body -->
                        </li><!-- /.timeline-item -->
                        <!-- .timeline-item -->
                    </ul><!-- /.timeline -->
                    <ul class="timeline timeline-dashed-line mt-2 pr-0" id="rooftop">
                        <!-- .timeline-item -->
                        <li class="timeline-item">
                            <!-- .timeline-figure -->
                            <div class="timeline-figure">
                                <span class="tile tile-circle tile-xs"><i class="fa fa-check d-none"></i></span>
                            </div><!-- /.timeline-figure -->
                            <!-- .timeline-body -->
                            <div class="timeline-body list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="timeline-heading mr-3"> SITE VIEW BEFORE SITE OPENING </h6><span class="timeline-date d-none"></span> <!-- .switcher-control switcher-control-secondary confirm -->
                                </div>
                                <div class="check d-flex">
                                    <a href="assets/images/dummy/img-5.jpg" data-lightbox="gallery-rooftop"><span class="oi oi-magnifying-glass mr-3" style="cursor: pointer;"></span></a>
                                    <label class="switcher-control switcher-control-secondary confirm"><input data-id="1" type="checkbox" class="switcher-input" disabled> <span class="switcher-indicator" style="opacity: 1;"></span> <span class="switcher-label-on"><i class="fas fa-check"></i></span> <span class="switcher-label-off"><i class="fas fa-times"></i></span></label>
                                </div> <!-- /.switcher-control switcher-control-secondary confirm -->
                                <!-- <h6 class="timeline-heading mr-3"> SITE VIEW BEFORE SITE OPENING </h6><span class="timeline-date d-none"></span> -->
                            </div><!-- /.timeline-body -->
                        </li><!-- /.timeline-item -->
                        <li class="timeline-item">
                            <!-- .timeline-figure -->
                            <div class="timeline-figure">
                                <span class="tile tile-circle tile-xs"><i class="fa fa-check d-none"></i></span>
                            </div><!-- /.timeline-figure -->
                            <!-- .timeline-body -->
                            <div class="timeline-body list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="timeline-heading mr-3"> REINFORCEMENT INSTALLATION </h6><span class="timeline-date d-none"></span>
                                </div>
                                <div class="check d-flex">
                                    <a href="assets/images/dummy/img-5.jpg" data-lightbox="gallery-rooftop"><span class="oi oi-magnifying-glass mr-3" style="cursor: pointer;"></span></a>
                                    <label class="switcher-control switcher-control-secondary confirm"><input data-id="2" type="checkbox" class="switcher-input" disabled> <span class="switcher-indicator" style="opacity: 1;"></span> <span class="switcher-label-on"><i class="fas fa-check"></i></span> <span class="switcher-label-off"><i class="fas fa-times"></i></span></label>
                                </div>
                            </div><!-- /.timeline-body -->
                        </li><!-- /.timeline-item -->
                        <li class="timeline-item">
                            <!-- .timeline-figure -->
                            <div class="timeline-figure">
                                <span class="tile tile-circle tile-xs"><i class="fa fa-check d-none"></i></span>
                            </div><!-- /.timeline-figure -->
                            <!-- .timeline-body -->
                            <div class="timeline-body list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="timeline-heading mr-3"> ANCHOR SETTING AND FORM WORK </h6><span class="timeline-date d-none"></span>
                                </div>
                                <div class="check d-flex">
                                    <a href="assets/images/dummy/img-5.jpg" data-lightbox="gallery-rooftop"><span class="oi oi-magnifying-glass mr-3" style="cursor: pointer;"></span></a>
                                    <label class="switcher-control switcher-control-secondary confirm"><input data-id="3" type="checkbox" class="switcher-input" disabled> <span class="switcher-indicator" style="opacity: 1;"></span> <span class="switcher-label-on"><i class="fas fa-check"></i></span> <span class="switcher-label-off"><i class="fas fa-times"></i></span></label>
                                </div>
                            </div><!-- /.timeline-body -->
                        </li><!-- /.timeline-item -->
                        <li class="timeline-item">
                            <!-- .timeline-figure -->
                            <div class="timeline-figure">
                                <span class="tile tile-circle tile-xs"><i class="fa fa-check d-none"></i></span>
                            </div><!-- /.timeline-figure -->
                            <!-- .timeline-body -->
                            <div class="timeline-body list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="timeline-heading mr-3"> TOWER FOUNDATION POURING + TOOLS </h6><span class="timeline-date d-none"></span>
                                </div>
                                <div class="check d-flex">
                                    <a href="assets/images/dummy/img-5.jpg" data-lightbox="gallery-rooftop"><span class="oi oi-magnifying-glass mr-3" style="cursor: pointer;"></span></a>
                                    <label class="switcher-control switcher-control-secondary confirm"><input data-id="4" type="checkbox" class="switcher-input" disabled> <span class="switcher-indicator" style="opacity: 1;"></span> <span class="switcher-label-on"><i class="fas fa-check"></i></span> <span class="switcher-label-off"><i class="fas fa-times"></i></span></label>
                                </div>
                            </div><!-- /.timeline-body -->
                        </li><!-- /.timeline-item -->
                        <li class="timeline-item">
                            <!-- .timeline-figure -->
                            <div class="timeline-figure">
                                <span class="tile tile-circle tile-xs"><i class="fa fa-check d-none"></i></span>
                            </div><!-- /.timeline-figure -->
                            <!-- .timeline-body -->
                            <div class="timeline-body list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="timeline-heading mr-3"> TEST SLUMP AND CONCRETE TEST SAMPLE </h6><span class="timeline-date d-none"></span>
                                </div>
                                <div class="check d-flex">
                                    <a href="assets/images/dummy/img-5.jpg" data-lightbox="gallery-rooftop"><span class="oi oi-magnifying-glass mr-3" style="cursor: pointer;"></span></a>
                                    <label class="switcher-control switcher-control-secondary confirm"><input data-id="5" type="checkbox" class="switcher-input" disabled> <span class="switcher-indicator" style="opacity: 1;"></span> <span class="switcher-label-on"><i class="fas fa-check"></i></span> <span class="switcher-label-off"><i class="fas fa-times"></i></span></label>
                                </div>
                            </div><!-- /.timeline-body -->
                        </li><!-- /.timeline-item -->
                        <li class="timeline-item">
                            <!-- .timeline-figure -->
                            <div class="timeline-figure">
                                <span class="tile tile-circle tile-xs"><i class="fa fa-check d-none"></i></span>
                            </div><!-- /.timeline-figure -->
                            <!-- .timeline-body -->
                            <div class="timeline-body list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="timeline-heading mr-3"> TOWER ERECTION </h6><span class="timeline-date d-none"></span>
                                </div>
                                <div class="check d-flex">
                                    <a href="assets/images/dummy/img-5.jpg" data-lightbox="gallery-rooftop"><span class="oi oi-magnifying-glass mr-3" style="cursor: pointer;"></span></a>
                                    <label class="switcher-control switcher-control-secondary confirm"><input data-id="6" type="checkbox" class="switcher-input" disabled> <span class="switcher-indicator" style="opacity: 1;"></span> <span class="switcher-label-on"><i class="fas fa-check"></i></span> <span class="switcher-label-off"><i class="fas fa-times"></i></span></label>
                                </div>
                            </div><!-- /.timeline-body -->
                        </li><!-- /.timeline-item -->
                        <li class="timeline-item">
                            <!-- .timeline-figure -->
                            <div class="timeline-figure">
                                <span class="tile tile-circle tile-xs"><i class="fa fa-check d-none"></i></span>
                            </div><!-- /.timeline-figure -->
                            <!-- .timeline-body -->
                            <div class="timeline-body list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="timeline-heading mr-3"> VERTICALITY TOWER CHECKING </h6><span class="timeline-date d-none"></span>
                                </div>
                                <div class="check d-flex">
                                    <a href="assets/images/dummy/img-5.jpg" data-lightbox="gallery-rooftop"><span class="oi oi-magnifying-glass mr-3" style="cursor: pointer;"></span></a>
                                    <label class="switcher-control switcher-control-secondary confirm"><input data-id="7" type="checkbox" class="switcher-input" disabled> <span class="switcher-indicator" style="opacity: 1;"></span> <span class="switcher-label-on"><i class="fas fa-check"></i></span> <span class="switcher-label-off"><i class="fas fa-times"></i></span></label>
                                </div>
                            </div><!-- /.timeline-body -->
                        </li><!-- /.timeline-item -->
                        <li class="timeline-item">
                            <!-- .timeline-figure -->
                            <div class="timeline-figure">
                                <span class="tile tile-circle tile-xs"><i class="fa fa-check d-none"></i></span>
                            </div><!-- /.timeline-figure -->
                            <!-- .timeline-body -->
                            <div class="timeline-body list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="timeline-heading mr-3"> STICK ROD INSTALLATION </h6><span class="timeline-date d-none"></span>
                                </div>
                                <div class="check d-flex">
                                    <a href="assets/images/dummy/img-5.jpg" data-lightbox="gallery-rooftop"><span class="oi oi-magnifying-glass mr-3" style="cursor: pointer;"></span></a>
                                    <label class="switcher-control switcher-control-secondary confirm"><input data-id="8" type="checkbox" class="switcher-input" disabled> <span class="switcher-indicator" style="opacity: 1;"></span> <span class="switcher-label-on"><i class="fas fa-check"></i></span> <span class="switcher-label-off"><i class="fas fa-times"></i></span></label>
                                </div>
                            </div><!-- /.timeline-body -->
                        </li><!-- /.timeline-item -->
                        <li class="timeline-item">
                            <!-- .timeline-figure -->
                            <div class="timeline-figure">
                                <span class="tile tile-circle tile-xs"><i class="fa fa-check d-none"></i></span>
                            </div><!-- /.timeline-figure -->
                            <!-- .timeline-body -->
                            <div class="timeline-body list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="timeline-heading mr-3"> GROUNDING CONTROL PIT VIEW </h6><span class="timeline-date d-none"></span>
                                </div>
                                <div class="check d-flex">
                                    <a href="assets/images/dummy/img-5.jpg" data-lightbox="gallery-rooftop"><span class="oi oi-magnifying-glass mr-3" style="cursor: pointer;"></span></a>
                                    <label class="switcher-control switcher-control-secondary confirm"><input data-id="9" type="checkbox" class="switcher-input" disabled> <span class="switcher-indicator" style="opacity: 1;"></span> <span class="switcher-label-on"><i class="fas fa-check"></i></span> <span class="switcher-label-off"><i class="fas fa-times"></i></span></label>
                                </div>
                            </div><!-- /.timeline-body -->
                        </li><!-- /.timeline-item -->
                        <li class="timeline-item">
                            <!-- .timeline-figure -->
                            <div class="timeline-figure">
                                <span class="tile tile-circle tile-xs"><i class="fa fa-check d-none"></i></span>
                            </div><!-- /.timeline-figure -->
                            <!-- .timeline-body -->
                            <div class="timeline-body list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="timeline-heading mr-3"> CAD WELDED </h6><span class="timeline-date d-none"></span>
                                </div>
                                <div class="check d-flex">
                                    <a href="assets/images/dummy/img-5.jpg" data-lightbox="gallery-rooftop"><span class="oi oi-magnifying-glass mr-3" style="cursor: pointer;"></span></a>
                                    <label class="switcher-control switcher-control-secondary confirm"><input data-id="10" type="checkbox" class="switcher-input" disabled> <span class="switcher-indicator" style="opacity: 1;"></span> <span class="switcher-label-on"><i class="fas fa-check"></i></span> <span class="switcher-label-off"><i class="fas fa-times"></i></span></label>
                                </div>
                            </div><!-- /.timeline-body -->
                        </li><!-- /.timeline-item -->
                        <li class="timeline-item">
                            <!-- .timeline-figure -->
                            <div class="timeline-figure">
                                <span class="tile tile-circle tile-xs"><i class="fa fa-check d-none"></i></span>
                            </div><!-- /.timeline-figure -->
                            <!-- .timeline-body -->
                            <div class="timeline-body list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="timeline-heading mr-3"> SHELTER FOUNDATION </h6><span class="timeline-date d-none"></span>
                                </div>
                                <div class="check d-flex">
                                    <a href="assets/images/dummy/img-5.jpg" data-lightbox="gallery-rooftop"><span class="oi oi-magnifying-glass mr-3" style="cursor: pointer;"></span></a>
                                    <label class="switcher-control switcher-control-secondary confirm"><input data-id="11" type="checkbox" class="switcher-input" disabled> <span class="switcher-indicator" style="opacity: 1;"></span> <span class="switcher-label-on"><i class="fas fa-check"></i></span> <span class="switcher-label-off"><i class="fas fa-times"></i></span></label>
                                </div>
                            </div><!-- /.timeline-body -->
                        </li><!-- /.timeline-item -->
                        <li class="timeline-item">
                            <!-- .timeline-figure -->
                            <div class="timeline-figure">
                                <span class="tile tile-circle tile-xs"><i class="fa fa-check d-none"></i></span>
                            </div><!-- /.timeline-figure -->
                            <!-- .timeline-body -->
                            <div class="timeline-body list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="timeline-heading mr-3"> ME INSTALLATION FINISH </h6><span class="timeline-date d-none"></span>
                                </div>
                                <div class="check d-flex">
                                    <a href="assets/images/dummy/img-5.jpg" data-lightbox="gallery-rooftop"><span class="oi oi-magnifying-glass mr-3" style="cursor: pointer;"></span></a>
                                    <label class="switcher-control switcher-control-secondary confirm"><input data-id="12" type="checkbox" class="switcher-input" disabled> <span class="switcher-indicator" style="opacity: 1;"></span> <span class="switcher-label-on"><i class="fas fa-check"></i></span> <span class="switcher-label-off"><i class="fas fa-times"></i></span></label>
                                </div>
                            </div><!-- /.timeline-body -->
                        </li><!-- /.timeline-item -->
                        <li class="timeline-item">
                            <!-- .timeline-figure -->
                            <div class="timeline-figure">
                                <span class="tile tile-circle tile-xs"><i class="fa fa-check d-none"></i></span>
                            </div><!-- /.timeline-figure -->
                            <!-- .timeline-body -->
                            <div class="timeline-body list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="timeline-heading mr-3"> LIGHTNING PROTECTION </h6><span class="timeline-date d-none"></span>
                                </div>
                                <div class="check d-flex">
                                    <a href="assets/images/dummy/img-5.jpg" data-lightbox="gallery-rooftop"><span class="oi oi-magnifying-glass mr-3" style="cursor: pointer;"></span></a>
                                    <label class="switcher-control switcher-control-secondary confirm"><input data-id="13" type="checkbox" class="switcher-input" disabled> <span class="switcher-indicator" style="opacity: 1;"></span> <span class="switcher-label-on"><i class="fas fa-check"></i></span> <span class="switcher-label-off"><i class="fas fa-times"></i></span></label>
                                </div>
                            </div><!-- /.timeline-body -->
                        </li><!-- /.timeline-item -->
                        <li class="timeline-item">
                            <!-- .timeline-figure -->
                            <div class="timeline-figure">
                                <span class="tile tile-circle tile-xs"><i class="fa fa-check d-none"></i></span>
                            </div><!-- /.timeline-figure -->
                            <!-- .timeline-body -->
                            <div class="timeline-body list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="timeline-heading mr-3"> TOWER BUSBAR </h6><span class="timeline-date d-none"></span>
                                </div>
                                <div class="check d-flex">
                                    <a href="assets/images/dummy/img-5.jpg" data-lightbox="gallery-rooftop"><span class="oi oi-magnifying-glass mr-3" style="cursor: pointer;"></span></a>
                                    <label class="switcher-control switcher-control-secondary confirm"><input data-id="14" type="checkbox" class="switcher-input" disabled> <span class="switcher-indicator" style="opacity: 1;"></span> <span class="switcher-label-on"><i class="fas fa-check"></i></span> <span class="switcher-label-off"><i class="fas fa-times"></i></span></label>
                                </div>
                            </div><!-- /.timeline-body -->
                        </li><!-- /.timeline-item -->
                        <li class="timeline-item">
                            <!-- .timeline-figure -->
                            <div class="timeline-figure">
                                <span class="tile tile-circle tile-xs"><i class="fa fa-check d-none"></i></span>
                            </div><!-- /.timeline-figure -->
                            <!-- .timeline-body -->
                            <div class="timeline-body list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="timeline-heading mr-3"> TOWER LADDER AND BORDES TOWER </h6><span class="timeline-date d-none"></span>
                                </div>
                                <div class="check d-flex">
                                    <a href="assets/images/dummy/img-5.jpg" data-lightbox="gallery-rooftop"><span class="oi oi-magnifying-glass mr-3" style="cursor: pointer;"></span></a>
                                    <label class="switcher-control switcher-control-secondary confirm"><input data-id="15" type="checkbox" class="switcher-input" disabled> <span class="switcher-indicator" style="opacity: 1;"></span> <span class="switcher-label-on"><i class="fas fa-check"></i></span> <span class="switcher-label-off"><i class="fas fa-times"></i></span></label>
                                </div>
                            </div><!-- /.timeline-body -->
                        </li><!-- /.timeline-item -->
                        <li class="timeline-item">
                            <!-- .timeline-figure -->
                            <div class="timeline-figure">
                                <span class="tile tile-circle tile-xs"><i class="fa fa-check d-none"></i></span>
                            </div><!-- /.timeline-figure -->
                            <!-- .timeline-body -->
                            <div class="timeline-body list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="timeline-heading mr-3"> HORIZONTAL OUT DOOR CABLE LADDER </h6><span class="timeline-date d-none"></span>
                                </div>
                                <div class="check d-flex">
                                    <a href="assets/images/dummy/img-5.jpg" data-lightbox="gallery-rooftop"><span class="oi oi-magnifying-glass mr-3" style="cursor: pointer;"></span></a>
                                    <label class="switcher-control switcher-control-secondary confirm"><input data-id="16" type="checkbox" class="switcher-input" disabled> <span class="switcher-indicator" style="opacity: 1;"></span> <span class="switcher-label-on"><i class="fas fa-check"></i></span> <span class="switcher-label-off"><i class="fas fa-times"></i></span></label>
                                </div>
                            </div><!-- /.timeline-body -->
                        </li><!-- /.timeline-item -->
                        <li class="timeline-item">
                            <!-- .timeline-figure -->
                            <div class="timeline-figure">
                                <span class="tile tile-circle tile-xs"><i class="fa fa-check d-none"></i></span>
                            </div><!-- /.timeline-figure -->
                            <!-- .timeline-body -->
                            <div class="timeline-body list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="timeline-heading mr-3"> ANTENNA MOUNTING </h6><span class="timeline-date d-none"></span>
                                </div>
                                <div class="check d-flex">
                                    <a href="assets/images/dummy/img-5.jpg" data-lightbox="gallery-rooftop"><span class="oi oi-magnifying-glass mr-3" style="cursor: pointer;"></span></a>
                                    <label class="switcher-control switcher-control-secondary confirm"><input data-id="17" type="checkbox" class="switcher-input" disabled> <span class="switcher-indicator" style="opacity: 1;"></span> <span class="switcher-label-on"><i class="fas fa-check"></i></span> <span class="switcher-label-off"><i class="fas fa-times"></i></span></label>
                                </div>
                            </div><!-- /.timeline-body -->
                        </li><!-- /.timeline-item -->
                        <li class="timeline-item">
                            <!-- .timeline-figure -->
                            <div class="timeline-figure">
                                <span class="tile tile-circle tile-xs"><i class="fa fa-check d-none"></i></span>
                            </div><!-- /.timeline-figure -->
                            <!-- .timeline-body -->
                            <div class="timeline-body list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="timeline-heading mr-3"> GPS MOUNTING </h6><span class="timeline-date d-none"></span>
                                </div>
                                <div class="check d-flex">
                                    <a href="assets/images/dummy/img-5.jpg" data-lightbox="gallery-rooftop"><span class="oi oi-magnifying-glass mr-3" style="cursor: pointer;"></span></a>
                                    <label class="switcher-control switcher-control-secondary confirm"><input data-id="18" type="checkbox" class="switcher-input" disabled> <span class="switcher-indicator" style="opacity: 1;"></span> <span class="switcher-label-on"><i class="fas fa-check"></i></span> <span class="switcher-label-off"><i class="fas fa-times"></i></span></label>
                                </div>
                            </div><!-- /.timeline-body -->
                        </li><!-- /.timeline-item -->
                        <li class="timeline-item">
                            <!-- .timeline-figure -->
                            <div class="timeline-figure">
                                <span class="tile tile-circle tile-xs"><i class="fa fa-check d-none"></i></span>
                            </div><!-- /.timeline-figure -->
                            <!-- .timeline-body -->
                            <div class="timeline-body list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="timeline-heading mr-3"> SITE VIEW </h6><span class="timeline-date d-none"></span>
                                </div>
                                <div class="check d-flex">
                                    <a href="assets/images/dummy/img-5.jpg" data-lightbox="gallery-rooftop"><span class="oi oi-magnifying-glass mr-3" style="cursor: pointer;"></span></a>
                                    <label class="switcher-control switcher-control-secondary confirm"><input data-id="19" type="checkbox" class="switcher-input" disabled> <span class="switcher-indicator" style="opacity: 1;"></span> <span class="switcher-label-on"><i class="fas fa-check"></i></span> <span class="switcher-label-off"><i class="fas fa-times"></i></span></label>
                                </div>
                            </div><!-- /.timeline-body -->
                        </li><!-- /.timeline-item -->
                        <!-- .timeline-item -->
                    </ul><!-- /.timeline -->
                </div><!-- /.card-body -->
            </div>
        </div><!-- .app-footer -->