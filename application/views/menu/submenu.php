<?php $this->load->view('menu/navmenu');  ?>
<!-- .card-body -->
<div class="card-body">
    <!-- .tab-content -->
    <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade active show" id="submenuT">
            <!-- floating action -->
            <button type="button" class="btn btn-primary btn-floated" data-toggle="modal" data-target="#newSubmenu" title="Add new submenu"><span class="fa fa-plus"></span></button> <!-- /floating action -->
            <div class="form-group">
                <!-- .input-group -->
                <div class="input-group input-group-alt">
                    <!-- .input-group -->
                    <div class="form-group col-sm">
                        <div class="input-group has-clearable">
                            <button id="clear-search" type="button" class="close" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span></button>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><span class="oi oi-magnifying-glass"></span></span>
                            </div><input id="table-search-submenu" type="text" class="form-control" placeholder="Kata kunci submenu">
                        </div><!-- /.input-group -->
                    </div><!-- /.input-group -->
                </div><!-- /.input-group -->
                <div class="table-responsive">
                    <!-- .table -->
                    <table id="mySubmenu" class="table">
                        <!-- thead -->
                        <thead>
                            <tr>
                                <th style="width:50px; min-width:50px;"> #</th>
                                <th> Submenu </th>
                                <th> Menu </th>
                                <th> Icon </th>
                                <th> Dropdown </th>
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
            <form action="<?= base_url('menu/tambah/submenu'); ?>" method="post" id="clientNewForm" name="clientNewForm" class="">
                <div class="modal fade ml-2" id="newSubmenu" tabindex="-1" role="dialog" aria-labelledby="updateMenuLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 id="clientNewModalLabel" class="modal-title inline-editable"><span class="sr-only">Nama submenu</span> <input type="text" class="form-control form-control-lg" name="submenu" placeholder="Submenu" required="" value=""></h6>
                            </div>
                            <div class="modal-body">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="form-group"><label for="menu">Menu</label> <select id="menu" name="menu" class="custom-select d-block w-100">
                                                <option value=""> Pilih menu.. </option>
                                                <?php foreach ($menu as $men) : ?>
                                                    <option value="<?= $men['id']; ?>"> <?= $men['menu']; ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group"><label for="icon" class="float-left">Icon</label> <input type="text" id="icon" name="icon" class="form-control" value=""></div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group"><label for="dropdown">Dropdown</label> <select id="dropdown" name="dropdown" class="custom-select d-block w-100">
                                                <?php $drop = ['has-child', ''];
                                                $select = ['selected', '']; ?>
                                                <option value="<?= $drop['0'] ?>"> Ya </option>
                                                <option value="<?= $drop['1'] ?>"> Tidak </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group"><label for="url" class="float-left">Url</label> <input type="text" id="url" name="url" class="form-control" value=""></div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group list-group-item d-flex justify-content-between align-items-center"><span>Status</span>
                                            <div>
                                                <label class="switcher-control switcher-control-success switcher-control-lg"><input type="checkbox" name="status" value="1" class="switcher-input" checked> <span class="switcher-indicator"></span> <span class="switcher-label-on"><i class="fas fa-check"></i></span> <span class="switcher-label-off"><i class="fas fa-times"></i></span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" id="myToast">Tambah</button> <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <?php foreach ($upsubmenu as $us) : ?>
                <form action="<?= base_url('menu/update/submenu/') . $us['id']; ?>" method="post" id="clientNewForm<?= $us['id']; ?>" name="clientNewForm" class="">
                    <div class="modal fade ml-2" id="updateMenu<?= $us['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="updateMenuLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 id="clientNewModalLabel<?= $us['id']; ?>" class="modal-title inline-editable"><span class="sr-only">Nama submenu</span> <input type="text" class="form-control form-control-lg" name="submenu" placeholder="submenu" required="" value="<?= $us['title_sub']; ?>"></h6>
                                </div>
                                <div class="modal-body">
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="form-group"><label for="menu<?= $us['id']; ?>">Menu</label> <select id="menu<?= $us['id']; ?>" name="menu" class="custom-select d-block w-100">
                                                    <?php foreach ($menu as $men) : ?>
                                                        <option value="<?= $men['id']; ?>" <?php if ($us['menu_id_sub'] == $men['id']) : echo 'selected';
                                                                                            endif ?>> <?= $men['menu']; ?> </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group"><label for="icon<?= $us['id']; ?>" class="float-left">Icon</label> <input type="text" id="icon<?= $us['id']; ?>" name="icon" class="form-control" value="<?= $us['icon_sub']; ?>"></div>
                                        </div>
                                        <?php if ($us['url_sub'] == null) { ?>
                                            <div class="col-md-12">
                                                <div class="form-group"><label for="url<?= $us['id']; ?>" class="float-left">Url</label> <input type="text" id="url<?= $us['id']; ?>" name="url" class="form-control" value="" placeholder="Null"></div>
                                            </div>
                                        <?php } else { ?>
                                            <div class="col-md-12">
                                                <div class="form-group"><label for="url<?= $us['id']; ?>" class="float-left">Url</label> <input type="text" id="url<?= $us['id']; ?>" name="url" class="form-control" value="<?= $us['url_sub']; ?>"></div>
                                            </div>
                                        <?php } ?>
                                        <?php
                                        if ($us['li_class'] == 'has-child') {
                                            $li = ['has-child', 'Ya', 'Tidak', ''];
                                        } else {
                                            $li = ['', 'Tidak', 'Ya', 'has-child'];
                                        }
                                        ?>
                                        <div class="col-md-12">
                                            <div class="form-group"><label for="dropdown<?= $us['id']; ?>">Dropdown</label> <select id="dropdown<?= $us['id']; ?>" name="dropdown" class="custom-select d-block w-100">
                                                    <option value="<?= $li[0]; ?>"> <?= $li[1]; ?> </option>
                                                    <option value="<?= $li[3]; ?>"> <?= $li[2]; ?> </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group list-group-item d-flex justify-content-between align-items-center"><span>Status</span>
                                                <div>
                                                    <?php
                                                    if ($us['is_active_sub'] == '1') {
                                                        $cek = 'checked';
                                                    } else {
                                                        $cek = '';
                                                    }
                                                    ?>
                                                    <label class="switcher-control switcher-control-success switcher-control-lg"><input type="checkbox" name="status" value="1" class="switcher-input" <?= $cek; ?>> <span class="switcher-indicator"></span> <span class="switcher-label-on"><i class="fas fa-check"></i></span> <span class="switcher-label-off"><i class="fas fa-times"></i></span></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Perbarui</button> <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                                </div>
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