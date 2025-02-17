(function ($) {
    "use strict";

$("#markAssignDataTable").DataTable({
    pageLength: 10,
    ordering: false,
    serverSide: false,
    processing: true,
    searching: true,
    responsive: true,

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
        {"data": "student_name", "name": "student_name", responsivePriority:1},
        {"data": "question_name", "name": "question_name"},
        {"data": "mark", "name": "mark"},
        {"data": "assign_mark", "name": "assign_mark"},
        {"data": "action", "name": "action"},
    ],
});

})(jQuery)
