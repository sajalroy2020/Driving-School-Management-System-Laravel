(function ($) {
    "use strict";

    var enrolmentListTable;
        $(document).on("input", "#dataTableSearch", function () {
            enrolmentListTable.search($(this).val()).draw();
        });

    enrolmentListTable = $("#enrolmentDataTable").DataTable({
        pageLength: 10,
        ordering: false,
        serverSide: false,
        processing: true,
        searching: true,
        responsive: true,

        ajax: $('#enrolment-list-route').val(),
        language: {
            paginate: {
                previous: "<i class='fa-solid fa-angles-left'></i>",
                next: "<i class='fa-solid fa-angles-right'></i>",
            },
            searchPlaceholder: "Search event",
            search: "<span class='searchIcon'><i class='fa-solid fa-magnifying-glass'></i></span>",
        },
        dom: '<>tr<"tableBottom"<"row align-items-center"<"col-sm-6"<"tableInfo"i>><"col-sm-6"<"tablePagi"p>>>><"clear">',
        columns: [
            {"data": "enrolment_id", "name": "enrolment_id"},
            {"data": "package_name", "name": "packages.package_name",responsivePriority:2},
            {"data": "created_date", "name": "created_date"},
            {"data": "status", "name": "status"},
            {"data": "action", "name": "action"},
        ],
    });


    // price show
    $(document).ready(function() {
        $(document).on('change', '.singlePackage', function() {
            var selectedPrice = $(this).find(':selected').data('price');
            $('.orginalPrice').val(selectedPrice);
        });
    });

})(jQuery)
