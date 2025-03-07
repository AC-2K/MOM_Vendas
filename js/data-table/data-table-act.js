

function init_DataTables() {


    if (typeof ($.fn.DataTable) === 'undefined') { return; }
//Ate poderia passar o ID na funcao, mas nao quero
    var handleDataTableButtons = function () {
        if ($("#data-table-basic").length) {
            $("#data-table-basic").DataTable({
                dom: "Blfrtip",
                buttons: [
                    {
                        extend: "csv",
                        className: "btn-sm"
                    },
                    {
                        extend: "excelHtml5",
                        className: "btn-sm"
                    },
                    {
                        extend: "pdfHtml5",
                        className: "btn-sm"
                    },
                    {
                        extend: "print",
                        className: "btn-sm"
                    },
                ],
                responsive: true
            });
        }
        if ($("#data-table-basic2").length) {
            $("#data-table-basic2").DataTable({
                dom: "Blfrtip",
                buttons: [
                    {
                        extend: "csv",
                        className: "btn-sm"
                    },
                    {
                        extend: "excelHtml5",
                        className: "btn-sm"
                    },
                    {
                        extend: "pdfHtml5",
                        className: "btn-sm"
                    },
                    {
                        extend: "print",
                        className: "btn-sm"
                    },
                ],
                responsive: true
            });
        }
        if ($("#data-table-basic3").length) {
            $("#data-table-basic3").DataTable({
                dom: "Blfrtip",
                buttons: [
                    {
                        extend: "csv",
                        className: "btn-sm"
                    },
                    {
                        extend: "excelHtml5",
                        className: "btn-sm"
                    },
                    {
                        extend: "pdfHtml5",
                        className: "btn-sm"
                    },
                    {
                        extend: "print",
                        className: "btn-sm"
                    },
                ],
                responsive: true
            });
        }
        if ($("#data-table-Sales").length) {
            $("#data-table-Sales").DataTable({
                dom: "Blfrtip",
                buttons: [
                    {
                        extend: "csv",
                        className: "btn-sm"
                    },
                    {
                        extend: "excelHtml5",
                        className: "btn-sm"
                    },
                    {
                        extend: "pdfHtml5",
                        className: "btn-sm"
                    },
                    {
                        extend: "print",
                        className: "btn-sm"
                    },
                ],
                responsive: true
            });
        }
        if ($("#data-table-Purchases").length) {
            $("#data-table-Purchases").DataTable({
                dom: "Blfrtip",
                buttons: [
                    {
                        extend: "csv",
                        className: "btn-sm"
                    },
                    {
                        extend: "excelHtml5",
                        className: "btn-sm"
                    },
                    {
                        extend: "pdfHtml5",
                        className: "btn-sm"
                    },
                    {
                        extend: "print",
                        className: "btn-sm"
                    },
                ],
                responsive: true
            });
        }
        if ($("#data-table-Meals").length) {
            $("#data-table-Meals").DataTable({
                dom: "Blfrtip",
                buttons: [
                    {
                        extend: "csv",
                        className: "btn-sm"
                    },
                    {
                        extend: "excelHtml5",
                        className: "btn-sm"
                    },
                    {
                        extend: "pdfHtml5",
                        className: "btn-sm"
                    },
                    {
                        extend: "print",
                        className: "btn-sm"
                    },
                ],
                responsive: true
            });
        }
        if ($("#data-table-client").length) {
            $("#data-table-client").DataTable({
                dom: "Blfrtip",
                buttons: [
                    {
                        extend: "csv",
                        className: "btn-sm"
                    },
                    {
                        extend: "excelHtml5",
                        className: "btn-sm"
                    },
                    {
                        extend: "pdfHtml5",
                        className: "btn-sm"
                    },
                    {
                        extend: "print",
                        className: "btn-sm"
                    },
                ],
                responsive: true
            });
        }
        if ($("#data-table-supplier").length) {
            $("#data-table-supplier").DataTable({
                dom: "Blfrtip",
                buttons: [
                    {
                        extend: "csv",
                        className: "btn-sm"
                    },
                    {
                        extend: "excelHtml5",
                        className: "btn-sm"
                    },
                    {
                        extend: "pdfHtml5",
                        className: "btn-sm"
                    },
                    {
                        extend: "print",
                        className: "btn-sm"
                    },
                ],
                responsive: true
            });
        }
        if ($("#data-table-delivery").length) {
            $("#data-table-delivery").DataTable({
                dom: "Blfrtip",
                buttons: [
                    {
                        extend: "csv",
                        className: "btn-sm"
                    },
                    {
                        extend: "excelHtml5",
                        className: "btn-sm"
                    },
                    {
                        extend: "pdfHtml5",
                        className: "btn-sm"
                    },
                    {
                        extend: "print",
                        className: "btn-sm"
                    },
                ],
                responsive: true
            });
        }
        if ($("#data-table-deliveryProduct").length) {
            $("#data-table-deliveryProduct").DataTable({
                dom: "Blfrtip",
                buttons: [
                    {
                        extend: "csv",
                        className: "btn-sm"
                    },
                    {
                        extend: "excelHtml5",
                        className: "btn-sm"
                    },
                    {
                        extend: "pdfHtml5",
                        className: "btn-sm"
                    },
                    {
                        extend: "print",
                        className: "btn-sm"
                    },
                ],
                responsive: true
            });
        }
    };

    
    TableManageButtons = function () {
        "use strict";
        return {
            init: function () {
                handleDataTableButtons();
            }
        };
    }();

    $('#datatable').dataTable();

    $('#datatable-keytable').DataTable({
        keys: true
    });

    $('#datatable-responsive').DataTable();

    $('#datatable-scroller').DataTable({
        ajax: "js/datatables/json/scroller-demo.json",
        deferRender: true,
        scrollY: 380,
        scrollCollapse: true,
        scroller: true
    });

    $('#datatable-fixed-header').DataTable({
        fixedHeader: true
    });

    var $datatable = $('#datatable-checkbox');

    $datatable.dataTable({
        'order': [[1, 'asc']],
        'columnDefs': [
            { orderable: false, targets: [0] }
        ]
    });
    $datatable.on('draw.dt', function () {
        $('checkbox input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
        });
    });

    TableManageButtons.init();

};
init_DataTables();