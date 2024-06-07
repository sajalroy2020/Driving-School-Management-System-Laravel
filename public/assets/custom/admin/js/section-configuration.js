(function ($) {
    "use strict";

    $("#sectionConfigurationDataTable").DataTable({
        pageLength: 10,
        ordering: false,
        serverSide: true,
        processing: true,
        searching: true,
        responsive: true,

        ajax: $('#section-setting-route').val(),
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
            {"data": "section_slug", "name": "section_slug"},
            {"data": "section_name", "name": "section_name"},
            {"data": "title", "name": "title"},
            {"data": "background_image", "name": "background_image"},
            {"data": "status", "name": "status"},
            {"data": "action", "name": "action"},
        ],
    });

})(jQuery)
