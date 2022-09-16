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
                            <li class="breadcrumb-item active">New Projects
                            </li>
                        </ol>
                    </nav><!-- /.breadcrumb -->
                    <!-- title and toolbar -->
                    <div class="d-md-flex align-items-md-start mt-4">
                        <h1 class="page-title mr-sm-auto"> New Projects </h1>
                    </div><!-- /title and toolbar -->
                    <?= $this->session->flashdata('Message') ?>
                </header><!-- /.page-title-bar -->
                <!-- .page-section -->
                <div class="page-section">
                    <!-- .card -->
                    <div class="card card-fluid">
                        <div class="card-body">
                            <div class="input-group input-group-alt mb-4 mt-2">
                                <!-- .input-group-prepend -->
                                <div class="input-group-prepend">
                                    <select id="filterBy" class="custom-select">
                                        <option value="" selected=""> Filter By </option>
                                        <option value="0"> WBS ID </option>
                                        <option value="1"> Site ID </option>
                                        <option value="2"> Site Name </option>
                                        <option value="3"> Assignment Type </option>
                                        <option value="4"> Status </option>
                                    </select>
                                </div><!-- /.input-group-prepend -->
                                <!-- .input-group -->
                                <div class="input-group has-clearable">
                                    <button id="clear-search" type="button" class="close" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span></button>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><span class="oi oi-magnifying-glass"></span></span>
                                    </div><input id="table-search" type="text" class="form-control" placeholder="">
                                </div><!-- /.input-group -->
                            </div>


                            <div class="table-responsive">
                                <table id="projetcs" class="table  table-hover">
                                    <!-- thead -->
                                    <thead>
                                        <tr>
                                            <th> WBS ID </th>
                                            <th> Site ID </th>
                                            <th>Site Name</th>
                                            <th>Assigment Type</th>
                                            <th>Status</th>
                                            <th>PIC IBS</th>
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

                            </div>
                        </div>
                    </div>
                </div><!-- /.page-inner -->
            </div><!-- /.page -->
        </div><!-- .app-footer -->