(function ($) {
    "use strict";

    var staffListTable;
    $(document).on("input", "#staffListTableSearch", function () {
        staffListTable.search($(this).val()).draw();
    });

    staffListTable = $("#staffDataTable").DataTable({
        pageLength: 10,
        ordering: false,
        serverSide: true,
        processing: true,
        searching: true,
        responsive: true,
        ajax: $('#staff-list-route').val(),
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
            {"data": "name", "name": "users.name", responsivePriority: 1},
            {"data": "email", "name": "users.email"},
            {"data": "status", "name": "status"},
            {"data": "action", "name": "action"},
        ],
    });

    $(document).on('click', '.addMoreDocument', function () {
        commonAjaxRequest('GET', $('#get-document-section-content-route').val(), docSecContentResponse, docSecContentResponse, {});
    });
    $(document).on('click', '.removeMoreDocument', function () {
        $(this).closest('.singleDocumentRow').remove();
    });

    function docSecContentResponse(response) {
        if (response.status == true) {
            $('#addMoreDocumentDiv').append(response.data);
        }
    }

    $("#userDocumentListTable").DataTable({
        pageLength: 10,
        ordering: false,
        serverSide: true,
        processing: true,
        searching: true,
        responsive: true,
        ajax: {
            "url": $('#user-document-list-route').val(),
            "data": function (data) {
                data.user_id = $('#user-id').val();
            },
        },
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
            {"data": "document_type"},
            {"data": "document_name", responsivePriority: 1},
            {"data": "document_file"},
        ],
    });

    $("#userActivityLogTable").DataTable({
        pageLength: 10,
        ordering: false,
        serverSide: true,
        processing: true,
        searching: true,
        responsive: true,
        ajax: {
            "url": $('#user-activity-log-route').val(),
            "data": function (data) {
                data.user_id = $('#user-id').val();
            },
        },
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
            {"data": "activity"},
            {"data": "source", responsivePriority: 1},
            {"data": "ip_address"},
            {"data": "location"},
            {"data": "created_at"},
        ],
    });

    function staffEditResponse(response){
        commonResponse(response);
        window.location.reload();
    }

    window.staffEditResponse = staffEditResponse;
})(jQuery)
