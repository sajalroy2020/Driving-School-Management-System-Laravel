(function ($) {
    "use strict";

    $("#testimonialDataTable").DataTable({
        pageLength: 10,
        ordering: false,
        serverSide: true,
        processing: true,
        searching: true,
        responsive: true,

        ajax: $('#testimonial-route').val(),
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
            {"data": "name", "name": "name"},
            {"data": "title", "name": "title"},
            {"data": "status", "name": "status"},
            {"data": "action", "name": "action"},
        ],
    });


    // check student
    $('.customStudent').addClass("d-none");
    $(document).on('click', '.studentType', function () {
        if ($("input[name=student_type]:checked").val() == 1) {
            $('.customStudent').addClass("d-none");
            $('.existingStudent').removeClass("d-none");
        } else {
            $('.customStudent').removeClass("d-none");
            $('.existingStudent').addClass("d-none");
        }
    });


})(jQuery)
