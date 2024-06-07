(function ($) {
    "use strict";

    var packagesListTable;
        $(document).on("input", "#dataTableSearch", function () {
            packagesListTable.search($(this).val()).draw();
        });

    packagesListTable = $("#packagesDataTable").DataTable({
        pageLength: 10,
        ordering: false,
        serverSide: false,
        processing: true,
        searching: true,
        responsive: true,

        ajax: $('#package-list-route').val(),
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
            {"data": "image", "name": "image"},
            {"data": "name", "name": "categories.category_name",responsivePriority:1},
            {"data": "package_name", "name": "packages.package_name",responsivePriority:1},
            {"data": "duration_time", "name": "duration_time"},
            {"data": "price", "name": "price"},
            {"data": "status", "name": "status"},
            {"data": "action", "name": "action"},
        ],
    });

})(jQuery)
