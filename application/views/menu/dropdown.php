<?php $this->load->view('menu/navmenu');  ?>
<!-- .card-body -->
<div class="card-body">
    <!-- .tab-content -->
    <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade active show" id="dropdownT">
            <!-- floating action -->
            <button type="button" class="btn btn-primary btn-floated" data-toggle="modal" data-target="#newDropdown" title="Add new dropdown"><span class="fa fa-plus"></span></button> <!-- /floating action -->
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
                            </div><input id="table-search-dropdown" type="text" class="form-control" placeholder="Kata kunci dropdown">
                        </div><!-- /.input-group -->
                    </div><!-- /.input-group -->
                </div><!-- /.input-group -->
                <div class="table-responsive">
                    <!-- .table -->
                    <table id="myDropdown" class="table">
                        <!-- thead -->
                        <thead>
                            <tr>
                                <th style="width:50px; min-width:50px;"> #</th>
                                <th> Dropdown </th>
                                <th> Submenu </th>
                                <th> Url </th>
                                <th> Status </th>
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
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody><!-- /tbody -->
                    </table><!-- /.table -->
                </div><!-- /.table-responsive -->
            </div>
            <form action="<?= base_url('menu/tambah/dropdown'); ?>" method="post" id="clientNewForm" name="clientNewForm">
                <div class="modal fade ml-2" id="newDropdown" tabindex="-1" role="dialog" aria-labelledby="newDropdownLabel" aria-hidden="true">
                    <!-- .modal-dialog -->
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <!-- .modal-content -->
                        <div class="modal-content">
                            <!-- .modal-header -->
                            <div class="modal-header">
                                <h6 id="clientNewModalLabel" class="modal-title inline-editable">
                                    <span class="sr-only">Nama Dropdown</span> <input type="text" class="form-control form-control-lg" name="dropdown" placeholder="Dropdown" required="">
                                </h6>
                            </div><!-- /.modal-header -->
                            <!-- .modal-body -->
                            <div class="modal-body">
                                <!-- .form-row -->
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="submenu">Submenu</label> <select id="submenu" name="submenu" class="custom-select d-block w-100">
                                                <option value=""> Pilih... </option>
                                                <?php foreach ($submenux as $sm) : ?>
                                                    <option value="<?= $sm['id'] ?>"> <?= $sm['title_sub'] ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="url">Url</label> <input type="text" name="url" id="url" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group list-group-item d-flex justify-content-between align-items-center"><span>Aktifkan ?</span>
                                            <div>
                                                <!-- .switcher-control -->
                                                <label class="switcher-control switcher-control-success switcher-control-lg"><input type="checkbox" name="status" value="1" class="switcher-input" checked> <span class="switcher-indicator"></span> <span class="switcher-label-on"><i class="fas fa-check"></i></span> <span class="switcher-label-off"><i class="fas fa-times"></i></span></label> <!-- /.switcher-control -->
                                            </div>
                                        </div><!-- /.list-group-item -->
                                    </div>
                                </div><!-- /.form-row -->
                            </div><!-- /.modal-body -->
                            <!-- .modal-footer -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Tambah</button> <button type="button" class="btn btn-light" data-dismiss="modal">Keluar</button>
                            </div><!-- /.modal-footer -->
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>
            </form><!-- /.modal -->
            <?php foreach ($dropdown as $dr) : ?>
                <form action="<?= base_url('menu/update/dropdown/') . $dr['id']; ?>" method="post" id="clientNewForm<?= $dr['id']; ?>" name="clientNewForm">
                    <div class=" modal fade ml-2" id="updateMenu<?= $dr['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="updateMenuLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 id="clientNewModalLabel<?= $dr['id']; ?>" class="modal-title inline-editable"><span class="sr-only">Nama dropdown</span> <input type="text" class="form-control form-control-lg" name="dropdown" placeholder="Dropdown" required="" value="<?= $dr['title_drop']; ?>"></h6>
                                </div>
                                <div class=" modal-body">
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="form-group"><label for="submenu<?= $dr['id']; ?>">Subenu</label> <select id="submenu<?= $dr['id']; ?>" name="submenu" class="custom-select d-block w-100">
                                                    <?php foreach ($submenux as $smen) : ?>
                                                        <option value="<?= $smen['id']; ?>" <?php if ($dr['menu_id_drop'] == $smen['id']) : echo 'selected';
                                                                                            endif ?>> <?= $smen['title_sub']; ?> </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group"><label for="cnContactName" class="float-left">Url</label> <input type="text" id="cnContactName<?= $dr['id']; ?>" name="url" class="form-control" value="<?= $dr['url_drop']; ?>"> </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group list-group-item d-flex justify-content-between align-items-center"><span>Status</span>
                                                <div> <?php
                                                        if ($dr['is_active_drop'] == '1') {
                                                            $cek = 'checked';
                                                        } else {
                                                            $cek = '';
                                                        }
                                                        ?>
                                                    <label class="switcher-control switcher-control-success switcher-control-lg"><input type="checkbox" name="status" value="1" class="switcher-input" <?= $cek; ?>> <span class="switcher-indicator"></span> <span class="switcher-label-on"><i class="fas fa-check"></i></span> <span class="switcher-label-off"><i class="fas fa-times"></i></span></label> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer"> <button type="submit" class="btn btn-primary">Perbarui</button> <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button> </div>
                            </div>
                        </div>
                    </div>
                </form>
            <?php endforeach; ?>
        </div><!-- /.card-body -->
    </div><!-- /.card -->
</div><!-- /.card -->
</div><!-- /.page-section -->
</div><!-- /.page-inner -->
</div><!-- /.page -->
</div><!-- .app-footer -->