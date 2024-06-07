(function ($) {
    "use strict";

    $("#galleryDataTable").DataTable({
        pageLength: 10,
        ordering: false,
        serverSide: true,
        processing: true,
        searching: true,
        responsive: true,

        ajax: $('#gallery-list-route').val(),
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
            {"data": "category_name", "name": "gallery_categories.category_name"},
            {"data": "title", "name": "title"},
            {"data": "status", "name": "status"},
            {"data": "action", "name": "action"},
        ],
    });

})(jQuery)
