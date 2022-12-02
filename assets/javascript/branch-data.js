function showPreview(event) {
    if (event.target.files.length > 0) {
        console.log(event.target.files[0])
        var src = URL.createObjectURL(event.target.files[0]);
        var preview = document.getElementById("img-preview");
        if (isImage(event.target.files[0].name)) {
            preview.src = src;
            preview.style.display = "block";
        } else {
            $('#dokumentasi').addClass('is-invalid')
            $('#dokumentasi').after(`<div class="invalid-feedback">
            <i class="fa fa-exclamation-circle fa-fw"></i> File harus berupa gambar dengan tipe png, jpg, jpeg.
        </div>`)
        }

    }
}

function isImage(filename) {
    var ext = getExtension(filename);
    switch (ext.toLowerCase()) {
        case 'jpg':
        case 'jpeg':
        case 'png':
            //etc
            return true;
    }
    return false;
}
function getExtension(filename) {
    var parts = filename.split('.');
    return parts[parts.length - 1];
}

function lihatFile(url) {
    var height = 500
    var width = 800
    var top = parseInt((screen.availHeight) - height - 100);
    var left = parseInt((screen.availWidth) - width - 300);
    var features = "location=1, status=1, scrollbars=1, width=" + width + ", height=" + height + ", top=" + top + ", left=" + left;
    console.log(url)

    window.open(url, "RincianBiaya", features);
}

$(window).on('load', function () {
    lightbox.option({
        'showImageNumberLabel': false
    })
    // fetch('https://tbm3.ibstower.com/uploads/boq/d6d9227f4c0b2d6fbb4b0ebb0c1457ab.pdf')
    //     .then(resp => resp.blob())
    //     .then(blob => {
    //         const url = window.URL.createObjectURL(blob);
    //         console.log(url)
    // const a = document.createElement('a');
    // a.style.display = 'none';
    // a.href = url;
    // // the filename you want
    // a.download = 'todo-1.json';
    // document.body.appendChild(a);
    // a.click();
    // window.URL.revokeObjectURL(url);
    // alert('your file has downloaded!'); // or you know, something with better UX...
    //     })
    //     .catch(() => alert('oh no!'));

    var indicator = true

    var myBranch = $('#myBranch').DataTable({
        language: {
            paginate: {
                previous: '<i class="fa fa-lg fa-angle-left"></i>',
                next: '<i class="fa fa-lg fa-angle-right"></i>'
            }
        },
        autoWidth: false,
        ajax: 'projects/getbranchdata',
        deferRender: true,
        "drawCallback": function () {
            $(this).find('tr').css('cursor', 'pointer');
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
            data: 'site_type',
            className: 'align-middle'
        }, {
            data: 'id',
            className: 'align-middle text-center'
        }],
        columnDefs: [{
            targets: 5,
            visible: false,
        }],
        "order": [[5, 'dsc']],
        initComplete: function (settings, json) {
            myBranch.on('click', 'tbody tr', function () {
                $('.site_data').html('')
                var data = myBranch.row(this).data();
                console.log(data)
                tgl_sitac = data.sitac_start_date.split('-')
                // console.log(`${window.location.href}/getdatasite`) 08/18/2018 – 12:42 PM
                indicator = true
                $('#site-name').html(data.site_name)
                $('#site-id').html(data.site_id_ibs)
                $('#site_id').val(data.site_id_ibs)
                $('#site_type').val(data.site_type)
                $('#greenfield').addClass('d-none')
                $('#rooftop').addClass('d-none')
                if (data.site_type == 'Greenfield') {
                    $('#greenfield').removeClass('d-none')
                    $('#rooftop').addClass('d-none')
                } else {
                    $('#greenfield').addClass('d-none')
                    $('#rooftop').removeClass('d-none')
                }
                $('.timeline-figure .fa-check').removeClass('d-print-none')
                $('[role="progressbar"]').attr('class', 'progress-bar bg-primary')
                $('[role="progressbar"]').html('')
                $('[role="progressbar"]').css('width', "0%")
                $('.timeline-figure .fa-check').addClass('d-none')
                $('.timeline-date').removeClass('d-print-none')
                $('.timeline-date').addClass('d-none')
                $('.tile-circle').removeClass('bg-success')
                $('.switcher-input').prop('checked', false)
                $('.confirm').css('cursor', 'pointer')
                $('.switcher-indicator').css('cursor', 'pointer')
                $('.confirm').removeClass('d-none')
                $(`#site_0`).html('-')
                $(`#site_1`).html('-')
                $(`#site_2`).html('-')
                $(`biaya-null`).show()
                $('#rincian-biaya').hide()
                $('.oi-magnifying-glass').removeAttr('onclick')
                $('.oi-magnifying-glass').addClass('d-none')
                $('.timeline-item').find('a').removeAttr('data-lightbox')
                $('.timeline-item').find('a').removeAttr('href')
                $('.timeline-item').find('a').removeAttr('data-title')
                $.ajax({
                    type: "POST",
                    url: `${window.location.href}/getdatasite`,
                    data: ({
                        id: data.id,
                        site_id: data.site_id_ibs
                    }),
                    dataType: "json",
                    success: function (result) {
                        console.log(result.biaya)
                        $.each(result.data, (key, value) => {
                            $(`#site_${key}`).html(`${value}`)
                        })
                        if (result.biaya) {
                            $('#rincian-biaya').attr('onclick', `lihatFile('${result.biaya}')`)
                            $('#rincian-biaya').show()
                            $(`#biaya-null`).hide()
                        } else {
                            $('#rincian-biaya').hide()
                            $(`#biaya-null`).show()
                        }
                        if (result.check_site.length == 0) {
                            if (data.work_status == "DONE") {
                                indicator = false
                                $('[role="progressbar"]').css('width', "100%")
                                $('[role="progressbar"]').html('100%')
                                $('.confirm').removeAttr('style')
                                $('.switcher-indicator').css('cursor', 'default')
                                $('.tile-circle').addClass('bg-success')
                                $('.timeline-figure .fa-check').removeClass('d-none')
                                $('.timeline-figure .fa-check').addClass('d-print-none')
                                $('.timeline-date').removeClass('d-none')
                                $('.timeline-date').addClass('d-print-none')
                                $('.timeline-date').html(data.work_status == "DONE" ? `${tgl_sitac[2]}/${tgl_sitac[1]}/${tgl_sitac[0]} - 15:01` : '')
                                $('.confirm').addClass('d-none')
                            } else {
                                $('.confirm').addClass('d-none')
                                if ($('#role-id').val() != "5") {
                                    $('[data-id="1"]').parent().removeClass('d-none')
                                }
                            }
                        } else {
                            if (data.work_status == "DONE") {
                                indicator = false
                                $('[role="progressbar"]').css('width', "100%")
                                $('[role="progressbar"]').html('100%')
                                $('.confirm').removeAttr('style')
                                $('.switcher-indicator').css('cursor', 'default')
                                $('.tile-circle').addClass('bg-success')
                                $('.timeline-figure .fa-check').removeClass('d-none')
                                $('.timeline-figure .fa-check').addClass('d-print-none')
                                $('.timeline-date').removeClass('d-none')
                                $('.timeline-date').addClass('d-print-none')
                                $('.timeline-date').html(data.work_status == "DONE" ? `${tgl_sitac[2]}/${tgl_sitac[1]}/${tgl_sitac[0]} - 15:01` : '')
                                $('.confirm').addClass('d-none')
                                $.each(result.check_site, (key, value) => {
                                    const event = new Date(value.updated_at).toLocaleString("en-GB").split(', ');
                                    if (value.status == 1) {
                                        $(`[data-id="${value.tahap_id}"]`).parents('.timeline-item').find('.timeline-date').html(`${event[0]} - ${event[1]}`)
                                    }
                                    if (value.file_dokumentasi != null) {
                                        // $(`[data-id="${value.tahap_id}"]`).parents('.timeline-item').find('.oi-magnifying-glass').attr('onclick', `lihatFile('${window.location.origin}/assets/images/dokumentasi/${value.file_dokumentasi}')`)
                                        $(`[data-id="${value.tahap_id}"]`).parents('.timeline-item').find('.oi-magnifying-glass').removeClass('d-none')
                                        $(`[data-id="${value.tahap_id}"]`).parents('.timeline-item').find('a').attr('data-lightbox', value.site_type)
                                        $(`[data-id="${value.tahap_id}"]`).parents('.timeline-item').find('a').attr('href', `${window.location.origin}/assets/images/dokumentasi/${value.file_dokumentasi}`)
                                        $(`[data-id="${value.tahap_id}"]`).parents('.timeline-item').find('a').attr('data-title', `Catatan :  ${value.catatan ?? '-'}`)
                                    }
                                })
                            } else {
                                $('.confirm').addClass('d-none')
                                let last = 0
                                let site_length = 0
                                if ($('#role-id').val() != "5") {
                                    $.each(result.check_site, (key, value) => {
                                        const event = new Date(value.updated_at).toLocaleString("en-GB").split(', ');
                                        if (value.status == 1) {
                                            $(`[data-id="${value.tahap_id}"]`).parents('.timeline-item').find('.tile-circle').addClass('bg-success')
                                            $(`[data-id="${value.tahap_id}"]`).parents('.timeline-item').find('.timeline-figure .fa-check').removeClass('d-none')
                                            $(`[data-id="${value.tahap_id}"]`).parents('.timeline-item').find('.timeline-figure .fa-check').addClass('d-print-none')
                                            $(`[data-id="${value.tahap_id}"]`).parents('.timeline-item').find('.timeline-date').removeClass('d-none')
                                            $(`[data-id="${value.tahap_id}"]`).parents('.timeline-item').find('.timeline-date').html(`${event[0]} - ${event[1]}`)
                                            $(`[data-id="${value.tahap_id}"]`).parents('.timeline-item').find('.timeline-date').addClass('d-print-none')
                                            site_length++
                                            if (value.file_dokumentasi != null) {
                                                // $(`[data-id="${value.tahap_id}"]`).parents('.timeline-item').find('.oi-magnifying-glass').attr('onclick', `lihatFile('${window.location.origin}/assets/images/dokumentasi/${value.file_dokumentasi}')`)
                                                $(`[data-id="${value.tahap_id}"]`).parents('.timeline-item').find('.oi-magnifying-glass').removeClass('d-none')
                                                $(`[data-id="${value.tahap_id}"]`).parents('.timeline-item').find('a').attr('data-lightbox', value.site_type)
                                                $(`[data-id="${value.tahap_id}"]`).parents('.timeline-item').find('a').attr('href', `${window.location.origin}/assets/images/dokumentasi/${value.file_dokumentasi}`)
                                                $(`[data-id="${value.tahap_id}"]`).parents('.timeline-item').find('a').attr('data-title', `Catatan :  ${value.catatan ?? '-'}`)
                                            }
                                        }
                                        $(`[data-id="${value.tahap_id}"]`).parent().removeClass('d-none')
                                        $(`[data-id="${value.tahap_id}"]`).prop('checked', value.status == 1 ? true : false)
                                        if (value.status == 0) {
                                            return false
                                        } else {
                                            last = parseInt(value.tahap_id) + 1
                                        }
                                    })
                                    var progress = Math.floor(site_length / (result.check_site[0].site_type == 'Greenfield' ? 27 : 19) * 100)
                                    $('[role="progressbar"]').css('width', `${progress}%`)
                                    $('[role="progressbar"]').html(`${progress}%`)
                                    // console.log(last)
                                    if (last != 0)
                                        $(`[data-id="${last}"]`).parent().removeClass('d-none')
                                }
                            }
                        }
                        // console.log(data.work_status)
                        console.log(result)
                        Looper.toggleSidebar()
                    }
                });
            });
        }
    })
    $('#projetcs').DataTable({
        language: {
            paginate: {
                previous: '<i class="fa fa-lg fa-angle-left"></i>',
                next: '<i class="fa fa-lg fa-angle-right"></i>'
            }
        },
        autoWidth: false,
        ajax: `${window.origin}/projects/getnewsite`,
        deferRender: true,
        "drawCallback": function () {
            $(this).find('tr').css('cursor', 'pointer');
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
            data: 'assignment_type',
            className: 'align-middle text-center'
        }, {
            data: 'work_status',
            className: 'align-middle'
        }, {
            data: 'nama',
            className: 'align-middle'
        }, {
            data: 'id',
        }],
        columnDefs: [{
            targets: 6,
            visible: false,
        }],
        "order": [[6, 'dsc']],
    })

    $('#table-search').keyup(function () {
        myBranch.columns(parseInt($('#column').val())).search(this.value).draw();
    })
    const buttonSwal = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-subtle-success mr-2',
            cancelButton: 'btn btn-subtle-danger'
        },

        buttonsStyling: false
    })

    $('.confirm').on('click', function () {
        if (indicator) {
            $('#formKonfir')[0].reset();
            $('#dokumentasi').removeClass('is-invalid')
            $('#dokumentasi').val('');
            $('.custom-file-label').html('Pilih File')
            $('.invalid-feedback').remove()
            $("#img-preview").removeAttr('src')
            // console.log($(this).find('.switcher-input').prop("checked") ? 0 : 1)
            var status = $(this).find('.switcher-input').prop("checked") ? 0 : 1
            $('#status').val(status)
            $('#tahap_id').val($(this).find('.switcher-input').data('id'))

            if (!status) {
                buttonSwal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Anda membatalkan konfirmasi tahap ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, batalkan!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: `${window.location.href}/checksite`,
                            data: ({
                                site_id: $("#site_id").val(),
                                site_type: $("#site_type").val(),
                                tahap_id: $(this).find('.switcher-input').data('id'),
                                status: status
                            }),
                            dataType: "json",
                            success: function (result) {
                                console.log(result)
                                $('.timeline-figure .fa-check').addClass('d-none')
                                $('.timeline-date').removeClass('d-print-none')
                                $('.timeline-date').addClass('d-none')
                                $('.tile-circle').removeClass('bg-success')
                                $('.confirm').addClass('d-none')
                                $('.oi-magnifying-glass').addClass('d-none')
                                $('.timeline-item').find('a').removeAttr('data-lightbox')
                                $('.timeline-item').find('a').removeAttr('href')
                                $('.timeline-item').find('a').removeAttr('data-title')
                                let last = 0
                                let site_length = 0
                                $.each(result.check_site, (key, value) => {
                                    const event = new Date(value.updated_at).toLocaleString("en-GB").split(', ');
                                    const date_time = event[1].split('.');
                                    if (value.status == 1) {
                                        $(`[data-id="${value.tahap_id}"]`).parents('.timeline-item').find('.tile-circle').addClass('bg-success')
                                        $(`[data-id="${value.tahap_id}"]`).parents('.timeline-item').find('.timeline-figure .fa-check').removeClass('d-none')
                                        $(`[data-id="${value.tahap_id}"]`).parents('.timeline-item').find('.timeline-figure .fa-check').addClass('d-print-none')
                                        $(`[data-id="${value.tahap_id}"]`).parents('.timeline-item').find('.timeline-date').removeClass('d-none')
                                        $(`[data-id="${value.tahap_id}"]`).parents('.timeline-item').find('.timeline-date').html(`${event[0]} - ${event[1]}`)
                                        $(`[data-id="${value.tahap_id}"]`).parents('.timeline-item').find('.timeline-date').addClass('d-print-none')
                                        site_length++
                                        if (value.file_dokumentasi != null) {
                                            // $(`[data-id="${value.tahap_id}"]`).parents('.timeline-item').find('.oi-magnifying-glass').attr('onclick', `lihatFile('${window.location.origin}/assets/images/dokumentasi/${value.file_dokumentasi}')`)
                                            $(`[data-id="${value.tahap_id}"]`).parents('.timeline-item').find('.oi-magnifying-glass').removeClass('d-none')
                                            $(`[data-id="${value.tahap_id}"]`).parents('.timeline-item').find('a').attr('data-lightbox', value.site_type)
                                            $(`[data-id="${value.tahap_id}"]`).parents('.timeline-item').find('a').attr('href', `${window.location.origin}/assets/images/dokumentasi/${value.file_dokumentasi}`)
                                            $(`[data-id="${value.tahap_id}"]`).parents('.timeline-item').find('a').attr('data-title', `Catatan :  ${value.catatan ?? '-'}`)
                                        }
                                    }
                                    $(`[data-id="${value.tahap_id}"]`).parent().removeClass('d-none')
                                    $(`[data-id="${value.tahap_id}"]`).prop('checked', true)
                                    if (value.status == 0) {
                                        last = parseInt(value.tahap_id)
                                        return false
                                    } else {
                                        last = parseInt(value.tahap_id) + 1
                                    }
                                })
                                var progress = Math.floor(site_length / (result.check_site[0].site_type == 'Greenfield' ? 27 : 19) * 100)
                                $('[role="progressbar"]').css('width', `${progress}%`)
                                $('[role="progressbar"]').html(`${progress}%`)
                                console.log(last)
                                if (last != 0) {
                                    $(`[data-id="${last}"]`).parent().removeClass('d-none')
                                    $(`[data-id="${last}"]`).prop('checked', false)
                                }
                                buttonSwal.fire("Dibatalkan", "Tahap telah dibatalkan!", 'success')
                            }
                        });
                    }
                })
            } else {
                $('#konfirmasiSite').modal()
            }



        }
    })

    $('#dokumentasi').on('click', function () {
        $(this).removeClass('is-invalid')
        $(this).val('');
        $('.custom-file-label').html('Pilih File')
        $('.invalid-feedback').remove()
        $("#img-preview").removeAttr('src')
    })

    $('#formKonfir').on('submit', function (event) {
        event.preventDefault()
        if ($('#dokumentasi').val() == '') {
            $('#dokumentasi').addClass('is-invalid')
            $('#dokumentasi').after(`<div class="invalid-feedback">
            <i class="fa fa-exclamation-circle fa-fw"></i> Pilih file dokumentasi terlebih dahulu.
        </div>`)
        } else {
            $.ajax({
                processData: false,
                contentType: false,
                url: `${window.location.href}/checksite`,
                method: 'POST', dataType: "json",
                data: new FormData(this),
                success: function (result) {
                    console.log(result);
                    $('.timeline-figure .fa-check').addClass('d-none')
                    $('.timeline-date').removeClass('d-print-none')
                    $('.timeline-date').addClass('d-none')
                    $('.tile-circle').removeClass('bg-success')
                    $('.confirm').addClass('d-none')
                    $('.timeline-item').find('a').removeAttr('data-lightbox')
                    $('.timeline-item').find('a').removeAttr('href')
                    $('.timeline-item').find('a').removeAttr('data-title')
                    let last = 0
                    let site_length = 0
                    $.each(result.check_site, (key, value) => {
                        const event = new Date(value.updated_at).toLocaleString("en-GB").split(', ');
                        const date_time = event[1].split('.');
                        if (value.status == 1) {
                            $(`[data-id="${value.tahap_id}"]`).parents('.timeline-item').find('.tile-circle').addClass('bg-success')
                            $(`[data-id="${value.tahap_id}"]`).parents('.timeline-item').find('.timeline-figure .fa-check').removeClass('d-none')
                            $(`[data-id="${value.tahap_id}"]`).parents('.timeline-item').find('.timeline-figure .fa-check').addClass('d-print-none')
                            $(`[data-id="${value.tahap_id}"]`).parents('.timeline-item').find('.timeline-date').removeClass('d-none')
                            $(`[data-id="${value.tahap_id}"]`).parents('.timeline-item').find('.timeline-date').html(`${event[0]} - ${event[1]}`)
                            $(`[data-id="${value.tahap_id}"]`).parents('.timeline-item').find('.timeline-date').addClass('d-print-none')
                            site_length++
                            //     if (value.file_dokumentasi != null) {
                            // $(`[data-id="${value.tahap_id}"]`).parents('.timeline-item').find('.oi-magnifying-glass').attr('onclick', `lihatFile('${window.location.origin}/assets/images/dokumentasi/${value.file_dokumentasi}')`)
                            $(`[data-id="${value.tahap_id}"]`).parents('.timeline-item').find('a').attr('data-lightbox', value.site_type)
                            $(`[data-id="${value.tahap_id}"]`).parents('.timeline-item').find('a').attr('href', `${window.location.origin}/assets/images/dokumentasi/${value.file_dokumentasi}`)
                            $(`[data-id="${value.tahap_id}"]`).parents('.timeline-item').find('a').attr('data-title', `Catatan :  ${value.catatan ?? '-'}`)
                            $(`[data-id="${value.tahap_id}"]`).parents('.timeline-item').find('.oi-magnifying-glass').removeClass('d-none')
                            //     }
                        }
                        $(`[data-id="${value.tahap_id}"]`).parent().removeClass('d-none')
                        $(`[data-id="${value.tahap_id}"]`).prop('checked', true)
                        if (value.status == 0) {
                            last = parseInt(value.tahap_id)
                            return false
                        } else {
                            last = parseInt(value.tahap_id) + 1
                        }
                    })
                    var progress = Math.floor(site_length / (result.check_site[0].site_type == 'Greenfield' ? 27 : 19) * 100)
                    $('[role="progressbar"]').css('width', `${progress}%`)
                    $('[role="progressbar"]').html(`${progress}%`)
                    console.log(last)
                    if (last != 0) {
                        $(`[data-id="${last}"]`).parent().removeClass('d-none')
                        $(`[data-id="${last}"]`).prop('checked', false)
                    }
                    $('#formKonfir')[0].reset();
                    $('.custom-file-label').html('Pilih File')
                    $("#img-preview").removeAttr('src')
                    $('#konfirmasiSite').modal('hide')
                    buttonSwal.fire('Dikonfirmasi!', 'Tahap telah dikonfirmasi.', 'success')
                }
            });
        }
    })


    // myBranch.on('click', 'tbody tr td', function () {
    // $.ajax({
    //     url: `${window.location.href}/getdatasite`,
    //     data: ({
    //         site_id: h
    //     }),
    //     success: function (data) {
    //         console.log(data)
    //     }
    // });
    // $('tbody tr').removeAttr('style')
    // if ($('[class="page has-sidebar has-sidebar-expand-xl"').length > 0) {
    //     $('.page').removeClass('has-sidebar has-sidebar-expand-xl')
    // }
    // if ($(this).parent().find('td.id').html() != sidebar) {
    //     sidebar = $(this).parent().find('td.id').html()
    //     $(this).parent().attr('style', 'color: #363642;background-color: #c0c0ff;')
    //     $('.page').addClass('has-sidebar has-sidebar-expand-xl')
    // } else {
    //     sidebar = ""
    // }
    // })

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