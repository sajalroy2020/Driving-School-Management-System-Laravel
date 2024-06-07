(function ($) {
    "use strict";

    $('#currencyListTable').DataTable({
        pageLength: 25,
        ordering: false,
        serverSide: true,
        processing: true,
        searching: false,
        responsive: true,
        ajax: $('#currencyListRoute').val(),
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
            {"data": "currency_code", "name": "currency_code", responsivePriority: 1},
            {"data": "symbol", "name": "symbol"},
            {"data": "currency_placement", "name": "currency_placement"},
            {"data": "action", searchable: false, responsivePriority: 2},
        ]
    });

})(jQuery)
