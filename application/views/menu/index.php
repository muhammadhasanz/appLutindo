<?php $this->load->view('menu/navmenu');  ?>
<!-- .card-body -->
<div class="card-body">
    <!-- .tab-content -->
    <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade active show" id="menuT">
            <!-- floating action -->
            <button type="button" class="btn btn-primary btn-floated" data-toggle="modal" data-target="#newMenu" title="Add new menu"><span class="fa fa-plus"></span></button> <!-- /floating action -->
            <div class="form-group">
                <!-- .input-group -->
                <div class="input-group input-group-alt">
                    <div class="form-group col-sm">
                        <div class="input-group has-clearable">
                            <button id="clear-search" type="button" class="close" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span></button>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><span class="oi oi-magnifying-glass"></span></span>
                            </div><input id="table-search" type="text" class="form-control" placeholder="Kata kunci menu">
                        </div><!-- /.input-group -->
                    </div><!-- /.input-group -->
                </div><!-- /.input-group -->
                <div class="table-responsive">
                    <!-- .table -->
                    <table id="myMenu" class="table">
                        <!-- thead -->
                        <thead>
                            <tr>
                                <th style="width:50px; min-width:50px;"> #</th>
                                <th> Menu </th>
                                <th> Access </th>
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
            <form action="<?= base_url('menu/tambah/menu'); ?>" method="post" id="clientNewForm" name="clientNewForm" class="">
                <div class="modal fade ml-2" id="newMenu" tabindex="-1" role="dialog" aria-labelledby="newMenuLabel" aria-hidden="true">
                    <!-- .modal-dialog -->
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <!-- .modal-content -->
                        <div class="modal-content">
                            <!-- .modal-header -->
                            <div class="modal-header">
                                <h6 id="clientNewModalLabel" class="modal-title inline-editable">
                                    <span class="sr-only">Nama menu</span> <input type="text" class="form-control form-control-lg" name="menu" placeholder="Menu" required="">
                                </h6>
                            </div><!-- /.modal-header -->
                            <!-- .modal-body -->
                            <div class="modal-body">
                                <!-- .form-row -->
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="cnContactName">Access</label> <input type="text" id="cnContactName" name="nmenu" class="form-control">
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