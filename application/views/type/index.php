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
                            <li class="breadcrumb-item active">Type
                            </li>
                        </ol>
                    </nav><!-- /.breadcrumb -->
                    <!-- title and toolbar -->
                    <div class="d-md-flex align-items-md-start mt-4">
                        <h1 class="page-title mr-sm-auto"> Type </h1>
                    </div><!-- /title and toolbar -->
                    <?= $this->session->flashdata('Message') ?>
                </header><!-- /.page-title-bar -->
                <!-- .page-section -->
                <div class="page-section">
                    <!-- .card -->
                    <div class="card card-fluid">
                        <!-- .card-body -->
                        <div class="card-body">
                            <!-- .tab-content -->
                            <div id="myTabContent" class="tab-content">
                                <div class="tab-pane fade active show" id="menuT">
                                    <!-- floating action -->
                                    <button type="button" class="btn btn-primary btn-floated" data-toggle="modal" data-target="#newMenu" title="Add new menu"><span class="fa fa-plus"></span></button> <!-- /floating action -->
                                    <!-- .form-group -->
                                    <div class="form-group">
                                        <!-- .input-group -->
                                        <div class="input-group input-group-alt">
                                            <div class="form-group col-sm">
                                                <div class="input-group has-clearable">
                                                    <button id="clear-search" type="button" class="close" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span></button>
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><span class="oi oi-magnifying-glass"></span></span>
                                                    </div><input id="table-search" type="text" class="form-control" placeholder="Kata kunci type">
                                                </div><!-- /.input-group -->
                                            </div><!-- /.input-group -->
                                        </div><!-- /.input-group -->
                                        <div class="table-responsive">
                                            <!-- .table -->
                                            <table id="myType" class="table">
                                                <!-- thead -->
                                                <thead>
                                                    <tr>
                                                        <th style="width:50px; min-width:50px;"> #</th>
                                                        <th> Type </th>
                                                        <th> Merek </th>
                                                        <th style="width:100px; min-width:100px;"> &nbsp; </th>
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
                                                    </tr>
                                                </tbody><!-- /tbody -->
                                            </table><!-- /.table -->
                                        </div><!-- /.table-responsive -->
                                    </div>

                                    <!-- .modal -->
                                    <form action="<?= base_url('type/tambah_type'); ?>" method="post" id="clientNewForm" name="clientNewForm" class="">
                                        <div class="modal fade ml-2" id="newMenu" tabindex="-1" role="dialog" aria-labelledby="newMenuLabel" aria-hidden="true">
                                            <!-- .modal-dialog -->
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <!-- .modal-content -->
                                                <div class="modal-content">
                                                    <!-- .modal-header -->
                                                    <div class="modal-header">
                                                        <h6 id="clientNewModalLabel" class="modal-title inline-editable">
                                                            <span class="sr-only">Type</span> <input type="text" class="form-control form-control-lg" name="name_type" placeholder="Type" required="">
                                                        </h6>
                                                    </div><!-- /.modal-header -->
                                                    <!-- .modal-body -->
                                                    <div class="modal-body">
                                                        <!-- .form-row -->
                                                        <div class="form-row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="cnContactName">Merek</label> <input type="text" id="cnContactName" name="name_merk" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div><!-- /.form-row -->
                                                    </div><!-- /.modal-body -->
                                                    <!-- .modal-footer -->
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary" id="myToast">Tambah</button> <button type="button" class="btn btn-light" data-dismiss="modal">Keluar</button>
                                                    </div><!-- /.modal-footer -->
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div>
                                    </form><!-- /.modal -->
                                </div><!-- /.card -->
                            </div><!-- /.card -->
                        </div><!-- /.card -->
                    </div><!-- /.page-section -->
                </div><!-- /.page-inner -->
            </div><!-- /.page -->
        </div><!-- .app-footer -->