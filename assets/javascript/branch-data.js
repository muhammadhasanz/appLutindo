$(window).on('load', function () {
    var myBranch = $('#myBranch').DataTable({
        language: {
            paginate: {
                previous: '<i class="fa fa-lg fa-angle-left"></i>',
                next: '<i class="fa fa-lg fa-angle-right"></i>'
            }
        },
        autoWidth: false,
        ajax: 'manager/getbranchdata',
        deferRender: true,
        "drawCallback": function () {
            $('tbody > tr > td').css('cursor', 'pointer');
        },
        columns: [{
            data: 'wbs_id',
            className: 'align-middle'
        }, {
            data: 'site_id_ibs',
            className: 'align-middle id'
        }, {
            data: 'site_name',
            className: 'align-middle'
        }, {
            data: 'work_status',
            className: 'align-middle text-center'
        }, {
            data: 'nama',
            className: 'align-middle'
        }, {
            data: 'id',
            className: 'align-middle text-center'
        }],
        columnDefs: [{
            targets: 5,
            visible: false,
        }],
        "order": [[5, 'dsc']]
    })

    $('#table-search').keyup(function () {
        myBranch.columns(parseInt($('#column').val())).search(this.value).draw();
    })
    var sidebar

    myBranch.on('click', 'tbody tr td', function () {
        $('tbody tr').removeAttr('style')
        if ($('[class="page has-sidebar has-sidebar-expand-xl"').length > 0) {
            $('.page').removeClass('has-sidebar has-sidebar-expand-xl')
        }
        if ($(this).parent().find('td.id').html() != sidebar) {
            sidebar = $(this).parent().find('td.id').html()
            $(this).parent().attr('style', 'color: #363642;background-color: #c0c0ff;')
            $('.page').addClass('has-sidebar has-sidebar-expand-xl')
        } else {
            sidebar = ""
        }
    })

})
// $('[class="page has-sidebar has-sidebar-expand-xl"').length < 1
// "use strict";

// function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

// function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

// function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

// // DataTables Menu
// // =============================================================
// var DataTablesBranch =
//     /*#__PURE__*/
//     function () {
//         function DataTablesBranch() {
//             _classCallCheck(this, DataTablesBranch);

//             this.init();
//         }

//         _createClass(DataTablesBranch, [{
//             key: "init",
//             value: function init() {
//                 // event handlers
//                 this.table = this.table();
//                 this.searchRecords();
//                 this.clearSelectedRows();

//                 this.table.buttons().container().appendTo('#dt-buttons').unwrap();
//             }
//         }, {
//             key: "table",
//             value: function table() {
//                 return $('#myBranch').DataTable({
//                     language: {
//                         paginate: {
//                             previous: '<i class="fa fa-lg fa-angle-left"></i>',
//                             next: '<i class="fa fa-lg fa-angle-right"></i>'
//                         }
//                     },
//                     autoWidth: false,
//                     ajax: 'manager/getbranchdata',
//                     deferRender: true,
//                     // order: [1],
//                     columns: [{
//                         data: 'no',
//                         className: 'align-middle',
//                         searchable: false
//                     }, {
//                         data: {
//                             _: 'customer',
//                             sort: 'customer',
//                             search: 'customer'
//                         },
//                         className: 'align-middle'
//                     }, {
//                         data: 'region',
//                         className: 'align-middle text-center'
//                     }, {
//                         data: 'site_id',
//                         className: 'align-middle text-center'
//                     }, {
//                         data: 'site_name',
//                         className: 'align-middle text-center'
//                     }, {
//                         data: 'address',
//                         className: 'align-middle text-center'
//                     }, {
//                         data: 'project',
//                         className: 'align-middle text-center'
//                     }, {
//                         data: 'contractor',
//                         className: 'align-middle text-center'
//                     }, {
//                         data: 'type_tower',
//                         className: 'align-middle text-center'
//                     }, {
//                         data: 'tanggal_pemesanan',
//                         className: 'align-middle text-center'
//                     }, {
//                         data: 'email',
//                         className: 'align-middle text-center'
//                     }, {
//                         data: 'no_phone',
//                         className: 'align-middle text-center'
//                     }, {
//                         data: 'status',
//                         className: 'align-middle text-center'
//                     }, {
//                         data: 'id_order',
//                         className: 'align-middle text-center',
//                         orderable: false,
//                         searchable: false
//                     }],
//                     columnDefs: [{
//                         targets: 12,
//                         render: function render(data, type, row, meta) {
//                             if (data == 'Permintaan telah diverifikasi') {
//                                 return "<span class=\"badge badge-subtle badge-warning\">Diproses</span";
//                             } else {
//                                 return "<span class=\"badge badge-subtle badge-danger\">Bermasalah</span";
//                             }
//                         }
//                     }, {
//                         targets: 13,
//                         render: function render(data, type, row, meta) {
//                             return "<button type=\"Batalkan verifikasi\" type=\"button\" class=\"btn btn-sm btn-icon btn-secondary\" title=\"Verifikasi pembangunan\"  data-toggle=\"modal\" data-target=\"#batalkan".concat(data, "\"><i class=\"far fa-check-circle\"></i></button>\n          <div class=\"modal modal-alert fade ml-2\" id=\"batalkan").concat(data, "\" data-backdrop=\"static\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"batalkanLabel\" aria-hidden=\"true\">\n        <div class=\"modal-dialog modal-dialog-centered\" role=\"document\">\n      <div class=\"modal-content\">\n     <div class=\"modal-header\">\n      <h5 id=\"batalkanLabel\" class=\"modal-title\">\n     <i class=\"fa fa-bullhorn text-warning mr-1\"></i> Peringatan </h5>\n       </div>\n        <div class=\"modal-body\">\n        <p class=\"float-left mx-4 mt-2 mb-0\"> Apakah anda ingin memverfikasi pembangunan site \"").concat(row.site_name, "\"? </p>\n       </div>\n        <div class=\"modal-footer\">\n      <button type=\"button\" class=\"btn btn-warning\" data-dismiss=\"modal\">Tidak!</button> <a type=\"button\" href=\"manager/verifikasi_pembangunan/").concat(data, "\" class=\"btn btn-subtle-primary\">Ya, verifikasi!</a>\n      </div>\n        </div>\n        </div>\n    </div>\n");
//                         }
//                     }]
//                 });
//             }
//         }, {
//             key: "searchRecords",
//             value: function searchRecords() {
//                 var self = this;
//                 $('#table-search').on('keyup change focus', function (e) {
//                     var bulan = $('#bulan').val();
//                     var tahun = $('#tahun').val();
//                     var hasBulan = bulan !== '';
//                     var hasTahun = tahun !== '';
//                     var value = $('#table-search').val(); // clear selected rows

//                     if (value.length && (e.type === 'keyup' || e.type === 'change')) {
//                         self.clearSelectedRows();
//                     } // reset search term


//                     self.table.search('').columns().search('').draw();

//                     if (hasBulan && hasTahun) {
//                         self.table.search(bulan + ' ' + tahun + ' ' + value).draw();
//                     } else if (hasTahun) {
//                         self.table.search(tahun + ' ' + value).draw();
//                     } else if (hasBulan) {
//                         self.table.search(bulan + ' ' + value).draw();
//                     } else {
//                         self.table.search(value).draw();
//                     }
//                 });
//             }
//         }, {
//             key: "clearSelectedRows",
//             value: function clearSelectedRows() {
//                 $('#check-handle').prop('indeterminate', false).prop('checked', false).trigger('change');
//             }
//         }]);

//         return DataTablesBranch;
//     }();
// /**
//  * Keep in mind that your scripts may not always be executed after the theme is completely ready,
//  * you might need to observe the `theme:load` event to make sure your scripts are executed after the theme is ready.
//  */
// $(document).on('theme:init', function () {
//     new DataTablesBranch();
// });