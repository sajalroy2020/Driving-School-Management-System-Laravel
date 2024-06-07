(function ($) {
    "use strict";

$("#markAssignDataTable").DataTable({
    ordering: false,
    serverSide: true,
    processing: false,
    searching: false,
    responsive: true,
    paginate: false,
    bInfo: false,

    ajax: $('#mark-list-route').val(),
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
        { data: 'DT_RowIndex', "name": 'DT_RowIndex', orderable: false, searchable: false },
        {"data": "question_name", "name": "question_name"},
        {"data": "mark", "name": "mark"},
        {"data": "assign_mark", "name": "assign_mark"},
    ],
});

})(jQuery)
