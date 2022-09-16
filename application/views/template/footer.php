<!-- .app-footer -->
<?php if ($this->uri->segment(1) != 'add') : ?>
    <footer class="app-footer">
        <div class="copyright"> Copyright © <?= date('Y') ?>. All right reserved. </div>
    </footer><!-- /.app-footer -->
    <!-- /.wrapper -->
    </main><!-- /.app-main -->
<?php endif; ?>
</div><!-- /.app -->
<!-- BEGIN BASE JS -->
<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/bootstrap/js/popper.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script> <!-- END BASE JS -->
<!-- BEGIN PLUGINS JS -->
<script src="<?= base_url(); ?>assets/vendor/pace/pace.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/stacked-menu/stacked-menu.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/flatpickr/flatpickr.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/easy-pie-chart/jquery.easypiechart.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/select2/js/select2.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/datatables/extensions/buttons/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/bootstrap-session-timeout/bootstrap-session-timeout.min.js"></script><!-- END PLUGINS JS -->
<!-- BEGIN THEME JS -->
<script src="<?= base_url(); ?>assets/javascript/theme.min.js"></script> <!-- END THEME JS -->
<!-- BEGIN PAGE LEVEL JS -->
<?php if ($this->uri->segment(2) == 'submenu') : ?>
    <script src="<?= base_url(); ?>assets/javascript/tableSubmenu.js"></script>
<?php elseif ($this->uri->segment(2) == 'dropdown') : ?>
    <script src="<?= base_url(); ?>assets/javascript/tableDropdown.js"></script>
<?php elseif ($this->uri->segment(2) == 'role') : ?>
    <script src="<?= base_url(); ?>assets/javascript/role.js"></script>
<?php elseif ($this->uri->segment(2) == 'logistic_staff') : ?>
    <script src="<?= base_url(); ?>assets/javascript/sp-logisticstaff.js"></script>
    <script src="<?= base_url(); ?>assets/javascript/pages/datatables-filters-demo.js"></script>
<?php elseif ($this->uri->segment(2) == 'report') : ?>
    <script src="<?= base_url(); ?>assets/javascript/pages/datatables-filters-demo.js"></script>
    <script src="<?= base_url(); ?>assets/javascript/ls-report.js"></script>
<?php elseif ($this->uri->segment(1) == 'administrator') : ?>
    <?php if ($this->uri->segment(2) == 'log') : ?>
        <script src="<?= base_url(); ?>assets/javascript/custom.js"></script>
    <?php elseif ($this->uri->segment(2) == 'telah_diverifikasi') : ?>
        <script src="<?= base_url(); ?>assets/javascript/ls-telah.js"></script>
    <?php elseif ($this->uri->segment(2) == 'lengkap') : ?>
        <script src="<?= base_url(); ?>assets/javascript/ls-report.js"></script>
    <?php else : ?>
        <script src="<?= base_url(); ?>assets/javascript/ls-data.js"></script>
    <?php endif; ?>
    <!-- <script src="<?= base_url(); ?>assets/javascript/type.js"></script> -->
<?php elseif ($this->uri->segment(1) == 'driver') : ?>
    <script src="<?= base_url(); ?>assets/javascript/pages/datatables-filters-demo.js"></script>
<?php elseif ($this->uri->segment(1) == 'projects') : ?>
    <script src="<?= base_url(); ?>assets/javascript/branch-data.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?= base_url(); ?>assets/javascript/pages/datatables-filters-demo.js"></script>
<?php elseif ($this->uri->segment(1) == 'sites') : ?>
    <script src="<?= base_url(); ?>assets/javascript/siteaktif.js"></script>
<?php elseif ($this->uri->segment(2) == 'roleaccess') : ?>
    <script src="<?= base_url(); ?>assets/javascript/roleaccess.js"></script>
<?php elseif ($this->uri->segment(2) == 'detail_branch') : ?>
    <script>
        "use strict";

        function _classCallCheck(instance, Constructor) {
            if (!(instance instanceof Constructor)) {
                throw new TypeError("Cannot call a class as a function");
            }
        }

        function _defineProperties(target, props) {
            for (var i = 0; i < props.length; i++) {
                var descriptor = props[i];
                descriptor.enumerable = descriptor.enumerable || false;
                descriptor.configurable = true;
                if ("value" in descriptor) descriptor.writable = true;
                Object.defineProperty(target, descriptor.key, descriptor);
            }
        }

        function _createClass(Constructor, protoProps, staticProps) {
            if (protoProps) _defineProperties(Constructor.prototype, protoProps);
            if (staticProps) _defineProperties(Constructor, staticProps);
            return Constructor;
        }

        // DataTables Menu
        // =============================================================
        var DataTablesSpLogistic =
            /*#__PURE__*/
            function() {
                function DataTablesSpLogistic() {
                    _classCallCheck(this, DataTablesSpLogistic);

                    this.init();
                }

                _createClass(DataTablesSpLogistic, [{
                    key: "init",
                    value: function init() {
                        // event handlers
                        this.table = this.table();
                        this.searchRecords();
                        this.clearSelectedRows();

                        this.table.buttons().container().appendTo('#dt-buttons').unwrap();
                    }
                }, {
                    key: "table",
                    value: function table() {
                        return $('#mySp').DataTable({
                            language: {
                                paginate: {
                                    previous: '<i class="fa fa-lg fa-angle-left"></i>',
                                    next: '<i class="fa fa-lg fa-angle-right"></i>'
                                }
                            },
                            autoWidth: false,
                            ajax: "<?= base_url('admin/getspbranch/') . $data_branch['id_branch']; ?>",
                            deferRender: true,
                            // order: [1],
                            columns: [{
                                data: 'no',
                                className: 'align-middle',
                                searchable: false
                            }, {
                                data: {
                                    _: 'name_customer',
                                    sort: 'name_customer',
                                    search: 'name_customer'
                                },
                                className: 'align-middle'
                            }, {
                                data: 'address',
                                className: 'align-middle text-center',
                            }, {
                                data: 'type',
                                className: 'align-middle text-center',
                            }, {
                                data: 'color',
                                className: 'align-middle text-center',
                            }, {
                                data: 'chassis_number',
                                className: 'align-middle text-center',
                            }, {
                                data: 'date_delivery',
                                className: 'align-middle text-center',
                            }, {
                                data: 'time',
                                className: 'align-middle text-center',
                            }, {
                                data: 'info',
                                className: 'align-middle text-center',
                            }, {
                                data: 'sales',
                                className: 'align-middle text-center',
                            }]
                        });
                    }
                }, {
                    key: "searchRecords",
                    value: function searchRecords() {
                        var self = this;
                        $('#table-search').on('keyup change focus', function(e) {
                            var bulan = $('#bulan').val();
                            var tahun = $('#tahun').val();
                            var hasBulan = bulan !== '';
                            var hasTahun = tahun !== '';
                            var value = $('#table-search').val(); // clear selected rows

                            if (value.length && (e.type === 'keyup' || e.type === 'change')) {
                                self.clearSelectedRows();
                            } // reset search term


                            self.table.search('').columns().search('').draw();

                            if (hasBulan && hasTahun) {
                                self.table.search(bulan + ' ' + tahun + ' ' + value).draw();
                            } else if (hasTahun) {
                                self.table.search(tahun + ' ' + value).draw();
                            } else if (hasBulan) {
                                self.table.search(bulan + ' ' + value).draw();
                            } else {
                                self.table.search(value).draw();
                            }
                        });
                    }
                }, {
                    key: "clearSelectedRows",
                    value: function clearSelectedRows() {
                        $('#check-handle').prop('indeterminate', false).prop('checked', false).trigger('change');
                    }
                }]);

                return DataTablesSpLogistic;
            }();
        /**
         * Keep in mind that your scripts may not always be executed after the theme is completely ready,
         * you might need to observe the `theme:load` event to make sure your scripts are executed after the theme is ready.
         */
        $(document).on('theme:init', function() {
            new DataTablesSpLogistic();
        });
    </script>
<?php else : ?>
    <script src="<?= base_url(); ?>assets/javascript/myJavaScript.js"></script>
    <script src="<?= base_url(); ?>assets/javascript/alluser.js"></script>
<?php endif; ?>
<script src="<?= base_url(); ?>assets/javascript/pages/dataTables.bootstrap.js"></script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#preview').attr('src', e.target.result);
                $('.fileinput-button-label').unbind('mouseenter mouseleave');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#img-br").change(function() {
        readURL(this);
    });
</script>
</body>

</html>