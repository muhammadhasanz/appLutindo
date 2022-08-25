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
                            <li class="breadcrumb-item active">Projects
                            </li>
                        </ol>
                    </nav><!-- /.breadcrumb -->
                    <!-- title and toolbar -->
                    <div class="d-md-flex align-items-md-start mt-4">
                        <h1 class="page-title mr-sm-auto"> Projects </h1>
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
                                                <th> PIC IBS </th>
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
                        </div><!-- /.card -->
                    </div><!-- /.page-section -->
                </div><!-- /.page-inner -->
            </div><!-- /.page -->
            <div class="page-sidebar">
                <!-- .card -->
                <div class="card card-reflow">
                    <!-- <div class="card-body">
                        <h4 class="card-title"> Payments </h4>
                        <div class="progress progress-sm rounded-0 mb-1">
                            <div class="progress-bar bg-success w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="text-muted text-weight-bolder small"> $2,322 of $3,076 </p>
                    </div> -->
                    <!-- .card-body -->
                    <div class="card-body border-top">
                        <h4 class="card-title"> Proses Kemajuan </h4><!-- .timeline -->
                        <ul class="timeline timeline-dashed-line">
                            <!-- .timeline-item -->
                            <li class="timeline-item">
                                <!-- .timeline-figure -->
                                <div class="timeline-figure">
                                    <span class="tile tile-circle tile-xs bg-success"><i class="fa fa-check"></i></span>
                                </div><!-- /.timeline-figure -->
                                <!-- .timeline-body -->
                                <div class="timeline-body">
                                    <h6 class="timeline-heading"> Site View Before Site Opening (0%) </h6><span class="timeline-date">08/18/2018 – 12:42 PM</span>
                                </div><!-- /.timeline-body -->
                            </li><!-- /.timeline-item -->
                            <!-- .timeline-item -->
                            <li class="timeline-item">
                                <!-- .timeline-figure -->
                                <div class="timeline-figure">
                                    <span class="tile tile-circle tile-xs bg-success"><i class="fa fa-check"></i></span>
                                </div><!-- /.timeline-figure -->
                                <!-- .timeline-body -->
                                <div class="timeline-body">
                                    <h6 class="timeline-heading"> TOWER FOUNDATION EXCAVATION (with deep Measurement using meteran) <a href="#" class="text-muted"><small>details</small></a>
                                    </h6><span class="timeline-date">08/18/2018 – 12:42 PM</span>
                                </div><!-- /.timeline-body -->
                            </li><!-- /.timeline-item -->
                            <!-- .timeline-item -->
                            <li class="timeline-item">
                                <!-- .timeline-figure -->
                                <div class="timeline-figure">
                                    <span class="tile tile-circle tile-xs"><i class="fa fa-check d-none"></i></span>
                                </div><!-- /.timeline-figure -->
                                <!-- .timeline-body -->
                                <div class="timeline-body">
                                    <h6 class="timeline-heading"> Invoice viewed </h6>
                                </div><!-- /.timeline-body -->
                            </li><!-- /.timeline-item -->
                            <!-- .timeline-item -->
                            <li class="timeline-item">
                                <!-- .timeline-figure -->
                                <div class="timeline-figure">
                                    <span class="tile tile-circle tile-xs"><i class="fa fa-check d-none"></i></span>
                                </div><!-- /.timeline-figure -->
                                <!-- .timeline-body -->
                                <div class="timeline-body">
                                    <h6 class="timeline-heading"> Invoice fully paid </h6>
                                </div><!-- /.timeline-body -->
                            </li><!-- /.timeline-item -->
                        </ul><!-- /.timeline -->
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div>
        </div><!-- .app-footer -->