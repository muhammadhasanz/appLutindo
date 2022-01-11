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
                            <li class="breadcrumb-item active">
                                <a href="<?= base_url('menu/role'); ?>"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Role</a>
                            </li>
                        </ol>
                    </nav>
                    <!-- title and toolbar -->
                    <div class="d-md-flex align-items-md-start mt-4">
                        <h1 class="page-title mr-sm-auto"> Role Access </h1>
                    </div><!-- /title and toolbar -->
                    <?= $this->session->flashdata('Message') ?>
                </header><!-- /.page-title-bar -->
                <!-- .page-section -->
                <div class="page-section">
                    <!-- .card -->
                    <div class="card card-fluid">
                        <!-- .card-header -->
                        <div class="card-header">
                            Pembatasan Hak akses (<?= $role['alias']; ?>)
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                            <!-- .form-group -->
                            <div class="form-group">
                                <!-- .input-group -->
                                <div class="input-group input-group-alt">
                                    <!-- .input-group -->
                                    <div class="form-group col-sm">
                                        <div class="input-group has-clearable">
                                            <button id="clear-search" type="button" class="close" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span></button>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><span class="oi oi-magnifying-glass"></span></span>
                                            </div><input id="table-search" type="text" class="form-control" placeholder="Kata kunci role access">
                                        </div><!-- /.input-group -->
                                    </div><!-- /.input-group -->
                                </div><!-- /.input-group -->
                                <div class="table-responsive">
                                    <!-- .table -->
                                    <table id="myRoleAccess" class="table">
                                        <!-- thead -->
                                        <thead>
                                            <tr>
                                                <th style="width:50px; min-width:50px;"> #</th>
                                                <th> Menu </th>
                                                <th> Akses </th>
                                            </tr>
                                        </thead><!-- /thead -->
                                        <!-- tbody -->
                                        <tbody>
                                            <!-- create empty row to passing html validator -->
                                            <tr>
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
        </div><!-- .app-footer -->