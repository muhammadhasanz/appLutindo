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
                    <input type="hidden" id="site_id">
                    <input type="hidden" id="site_type">
                    <div class="card card-reflow">
                        <div class="card-body">
                            <h4 class="card-title"> Proses Kemajuan </h4>
                            <div class="progress rounded-0 mb-1">
                                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="text-muted text-weight-bolder small mb-0" id="site-id"></p>
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
                                    <h6 class="timeline-heading"> SITE VIEW BEFORE SITE OPENING </h6><span class="timeline-date d-none"></span> <!-- .switcher-control switcher-control-secondary confirm -->
                                </div>
                                <div class="check">
                                    <label class="switcher-control switcher-control-secondary confirm"><input data-id="1" type="checkbox" class="switcher-input" disabled> <span class="switcher-indicator" style="opacity: 1;"></span> <span class="switcher-label-on"><i class="fas fa-check"></i></span> <span class="switcher-label-off"><i class="fas fa-times"></i></span></label>
                                </div> <!-- /.switcher-control switcher-control-secondary confirm -->
                                <!-- <h6 class="timeline-heading"> SITE VIEW BEFORE SITE OPENING </h6><span class="timeline-date d-none"></span> -->
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
                                    <h6 class="timeline-heading"> TOWER FOUNDATION EXCAVATION </h6><span class="timeline-date d-none"></span>
                                </div>
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
                                    <h6 class="timeline-heading"> REINFORCEMENT INSTALLATION </h6><span class="timeline-date d-none"></span>
                                </div>
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
                                    <h6 class="timeline-heading"> ANCHOR SETTING AND FORM WORK </h6><span class="timeline-date d-none"></span>
                                </div>
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
                                    <h6 class="timeline-heading"> TOWER FOUNDATION POURING + TOOLS </h6><span class="timeline-date d-none"></span>
                                </div>
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
                                    <h6 class="timeline-heading"> TEST SLUMP AND CONCRETE TEST SAMPLE </h6><span class="timeline-date d-none"></span>
                                </div>
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
                                    <h6 class="timeline-heading"> TOWER FOUNDATION BACKFILLING + COMPACTED </h6><span class="timeline-date d-none"></span>
                                </div>
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
                                    <h6 class="timeline-heading"> TOWER ERECTION </h6><span class="timeline-date d-none"></span>
                                </div>
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
                                    <h6 class="timeline-heading"> FOUNDATION FENCE EXCAVATION </h6><span class="timeline-date d-none"></span>
                                </div>
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
                                    <h6 class="timeline-heading"> FENCE FOUNDATION </h6><span class="timeline-date d-none"></span>
                                </div>
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
                                    <h6 class="timeline-heading"> VERTICALITY TOWER CHECKING </h6><span class="timeline-date d-none"></span>
                                </div>
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
                                    <h6 class="timeline-heading"> STICK ROD INSTALLATION </h6><span class="timeline-date d-none"></span>
                                </div>
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
                                    <h6 class="timeline-heading"> GROUNDING CONTROL PIT VIEW </h6><span class="timeline-date d-none"></span>
                                </div>
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
                                    <h6 class="timeline-heading"> CAD WELDED </h6><span class="timeline-date d-none"></span>
                                </div>
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
                                    <h6 class="timeline-heading"> TOWER LADDER AND BORDES TOWER </h6><span class="timeline-date d-none"></span>
                                </div>
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
                                    <h6 class="timeline-heading"> HORIZONTAL OUT DOOR CABLE LADDER </h6><span class="timeline-date d-none"></span>
                                </div>
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
                                    <h6 class="timeline-heading"> SHELTER FOUNDATION </h6><span class="timeline-date d-none"></span>
                                </div>
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
                                    <h6 class="timeline-heading"> ME INSTALLATION FINISH </h6><span class="timeline-date d-none"></span>
                                </div>
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
                                    <h6 class="timeline-heading"> LIGHTNING PROTECTION </h6><span class="timeline-date d-none"></span>
                                </div>
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
                                    <h6 class="timeline-heading"> TOWER LAMPS (OBL) & BRACKET </h6><span class="timeline-date d-none"></span>
                                </div>
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
                                    <h6 class="timeline-heading"> ANTENNA MOUNTING </h6><span class="timeline-date d-none"></span>
                                </div>
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
                                    <h6 class="timeline-heading"> GPS MOUNTING </h6><span class="timeline-date d-none"></span>
                                </div>
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
                                    <h6 class="timeline-heading"> TOWER BUSBAR </h6><span class="timeline-date d-none"></span>
                                </div>
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
                                    <h6 class="timeline-heading"> YARD / SITE LAMPS </h6><span class="timeline-date d-none"></span>
                                </div>
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
                                    <h6 class="timeline-heading"> PAVING BLOCK AND FINISHING </h6><span class="timeline-date d-none"></span>
                                </div>
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
                                    <h6 class="timeline-heading"> ACCESS ROAD </h6><span class="timeline-date d-none"></span>
                                </div>
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
                                    <h6 class="timeline-heading"> SITE VIEW </h6><span class="timeline-date d-none"></span>
                                </div>
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
                                    <h6 class="timeline-heading"> SITE VIEW BEFORE SITE OPENING </h6><span class="timeline-date d-none"></span> <!-- .switcher-control switcher-control-secondary confirm -->
                                </div>
                                <div class="check">
                                    <label class="switcher-control switcher-control-secondary confirm"><input data-id="1" type="checkbox" class="switcher-input" disabled> <span class="switcher-indicator" style="opacity: 1;"></span> <span class="switcher-label-on"><i class="fas fa-check"></i></span> <span class="switcher-label-off"><i class="fas fa-times"></i></span></label>
                                </div> <!-- /.switcher-control switcher-control-secondary confirm -->
                                <!-- <h6 class="timeline-heading"> SITE VIEW BEFORE SITE OPENING </h6><span class="timeline-date d-none"></span> -->
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
                                    <h6 class="timeline-heading"> REINFORCEMENT INSTALLATION </h6><span class="timeline-date d-none"></span>
                                </div>
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
                                    <h6 class="timeline-heading"> ANCHOR SETTING AND FORM WORK </h6><span class="timeline-date d-none"></span>
                                </div>
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
                                    <h6 class="timeline-heading"> TOWER FOUNDATION POURING + TOOLS </h6><span class="timeline-date d-none"></span>
                                </div>
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
                                    <h6 class="timeline-heading"> TEST SLUMP AND CONCRETE TEST SAMPLE </h6><span class="timeline-date d-none"></span>
                                </div>
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
                                    <h6 class="timeline-heading"> TOWER ERECTION </h6><span class="timeline-date d-none"></span>
                                </div>
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
                                    <h6 class="timeline-heading"> VERTICALITY TOWER CHECKING </h6><span class="timeline-date d-none"></span>
                                </div>
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
                                    <h6 class="timeline-heading"> STICK ROD INSTALLATION </h6><span class="timeline-date d-none"></span>
                                </div>
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
                                    <h6 class="timeline-heading"> GROUNDING CONTROL PIT VIEW </h6><span class="timeline-date d-none"></span>
                                </div>
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
                                    <h6 class="timeline-heading"> CAD WELDED </h6><span class="timeline-date d-none"></span>
                                </div>
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
                                    <h6 class="timeline-heading"> SHELTER FOUNDATION </h6><span class="timeline-date d-none"></span>
                                </div>
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
                                    <h6 class="timeline-heading"> ME INSTALLATION FINISH </h6><span class="timeline-date d-none"></span>
                                </div>
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
                                    <h6 class="timeline-heading"> LIGHTNING PROTECTION </h6><span class="timeline-date d-none"></span>
                                </div>
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
                                    <h6 class="timeline-heading"> TOWER BUSBAR </h6><span class="timeline-date d-none"></span>
                                </div>
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
                                    <h6 class="timeline-heading"> TOWER LADDER AND BORDES TOWER </h6><span class="timeline-date d-none"></span>
                                </div>
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
                                    <h6 class="timeline-heading"> HORIZONTAL OUT DOOR CABLE LADDER </h6><span class="timeline-date d-none"></span>
                                </div>
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
                                    <h6 class="timeline-heading"> ANTENNA MOUNTING </h6><span class="timeline-date d-none"></span>
                                </div>
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
                                    <h6 class="timeline-heading"> GPS MOUNTING </h6><span class="timeline-date d-none"></span>
                                </div>
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
                                    <h6 class="timeline-heading"> SITE VIEW </h6><span class="timeline-date d-none"></span>
                                </div>
                                <div class="check">
                                    <label class="switcher-control switcher-control-secondary confirm"><input data-id="19" type="checkbox" class="switcher-input" disabled> <span class="switcher-indicator" style="opacity: 1;"></span> <span class="switcher-label-on"><i class="fas fa-check"></i></span> <span class="switcher-label-off"><i class="fas fa-times"></i></span></label>
                                </div>
                            </div><!-- /.timeline-body -->
                        </li><!-- /.timeline-item -->
                        <!-- .timeline-item -->
                    </ul><!-- /.timeline -->
                </div><!-- /.card-body -->
            </div>
        </div><!-- .app-footer -->