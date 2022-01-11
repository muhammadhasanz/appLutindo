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
                            <li class="breadcrumb-item active">Logistic Staff
                            </li>
                        </ol>
                    </nav><!-- /.breadcrumb -->
                    <!-- title and toolbar -->
                    <div class="d-md-flex align-items-md-start mt-4">
                        <h1 class="page-title mr-sm-auto"> Logistic Staff </h1>
                    </div><!-- /title and toolbar -->
                    <?= $this->session->flashdata('Message') ?>
                </header><!-- /.page-title-bar -->
                <!-- .page-section -->
                <div class="page-section">
                    <!-- .card -->
                    <div class="card card-fluid">
                        <!-- .card-body -->
                        <div class="card-body">
                            <!-- floating action -->
                            <button type="button" class="btn btn-primary btn-floated" data-toggle="modal" data-target="#modalFilterColumns" title="Print"><span class="fas fa-print"></span></button>
                            <!-- #modalFilterColumns -->
                            <form target="_blank" action="<?= base_url('admin/excel'); ?> " method="post" enctype="multipart/form-data">
                                <div class="modal fade" id="modalFilterColumns" tabindex="-1" role="dialog" aria-labelledby="modalFilterColumnsLabel" aria-hidden="true">
                                    <!-- .modal-dialog -->
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <!-- .modal-content -->
                                        <div class="modal-content">
                                            <!-- .modal-header -->
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalFilterColumnsLabel"> Filter Untuk Print </h5>
                                            </div><!-- /.modal-header -->
                                            <!-- .modal-body -->
                                            <div class="modal-body">
                                                <!-- #filter-columns -->
                                                <div id="filter-columns">
                                                    <!-- .form-row -->
                                                    <div class="form-group form-row filter-row">
                                                        <!-- form column -->
                                                        <div class="col">
                                                            <select class="custom-select filter-control filter-column" name="bulan">
                                                                <option value='' selected> Bulan </option>
                                                                <option value="01">Januari</option>
                                                                <option value="02">Februari</option>
                                                                <option value="03">Maret</option>
                                                                <option value="04">April</option>
                                                                <option value="05">Mei</option>
                                                                <option value="06">Juni</option>
                                                                <option value="07">Juli</option>
                                                                <option value="08">Agustus</option>
                                                                <option value="09">September</option>
                                                                <option value="10">Oktober</option>
                                                                <option value="11">November</option>
                                                                <option value="12">Desember</option>
                                                            </select>
                                                        </div><!-- /form column -->
                                                        <!-- form column -->
                                                        <div class="col">
                                                            <select class="custom-select filter-control filter-operator" name="tahun">
                                                                <option value='' selected> Tahun </option>
                                                                <option value="2017"> 2017 </option>
                                                                <option value="2018"> 2018 </option>
                                                                <option value="2019"> 2019 </option>
                                                                <option value="2020"> 2020 </option>
                                                            </select>
                                                        </div><!-- /form column -->
                                                        <!-- form column -->
                                                    </div><!-- /.form-row -->
                                                </div><!-- #filter-columns -->
                                            </div><!-- /.modal-body -->
                                            <!-- .modal-footer -->
                                            <div class="modal-footer justify-content-start">
                                                <button type="submit" class="btn btn-primary">Cetak</button> <button type="button" class="btn btn-light" id="clear-filter">Cancel</button>
                                            </div><!-- /.modal-footer -->
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /#modalFilterColumns -->
                            </form>
                            <!-- .form-group -->
                            <div class="form-group">
                                <!-- .form-group -->
                                <div class="form-group">
                                    <!-- .input-group -->
                                    <div class="input-group input-group-alt">
                                        <!-- .input-group-prepend -->
                                        <div class="input-group-prepend">
                                            <select id="bulan" class="custom-select">
                                                <option value='' selected> Bulan </option>
                                                <option value="-01">Januari</option>
                                                <option value="-02">Februari</option>
                                                <option value="-03">Maret</option>
                                                <option value="-04">April</option>
                                                <option value="-05">Mei</option>
                                                <option value="-06">Juni</option>
                                                <option value="-07">Juli</option>
                                                <option value="-08">Agustus</option>
                                                <option value="-09">September</option>
                                                <option value="-10">Oktober</option>
                                                <option value="-11">November</option>
                                                <option value="-12">Desember</option>
                                            </select>
                                        </div><!-- /.input-group-prepend -->
                                        <div class="input-group-prepend">
                                            <select id="tahun" class="custom-select">
                                                <option value='' selected> Tahun </option>
                                                <option value="2017"> 2017 </option>
                                                <option value="2018"> 2018 </option>
                                                <option value="2019"> 2019 </option>
                                                <option value="2020"> 2020 </option>
                                            </select>
                                        </div><!-- /.input-group-prepend -->
                                        <!-- .input-group -->
                                        <div class="input-group has-clearable">
                                            <button id="clear-search" type="button" class="close" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span></button>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><span class="oi oi-magnifying-glass"></span></span>
                                            </div><input id="table-search" type="text" class="form-control" placeholder="Search delivery">
                                        </div><!-- /.input-group -->
                                    </div><!-- /.input-group -->
                                </div><!-- /.form-group -->
                                <div class="table-responsive">
                                    <!-- .table -->
                                    <table id="mySp" class="table">
                                        <!-- thead -->
                                        <thead>
                                            <tr>
                                                <th style="width:50px; min-width:50px;"> #</th>
                                                <th style="width:150px; min-width:150px;"> Nama Customer </th>
                                                <th style="width:50px; min-width:50px;"> Alamat </th>
                                                <th style="width:50px; min-width:50px;"> Type </th>
                                                <th style="width:50px; min-width:50px;"> Warna </th>
                                                <th style="width:50px; min-width:50px;"> No Rangka </th>
                                                <th style="width:50px; min-width:50px;"> Tgl Pengantaran </th>
                                                <th style="width:50px; min-width:50px;"> Jam </th>
                                                <th style="width:50px; min-width:50px;"> Lokasi Jemputan </th>
                                                <th> Sales </th>
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
        </div><!-- .app-footer -->