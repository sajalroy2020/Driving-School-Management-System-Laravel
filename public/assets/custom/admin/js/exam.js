(function ($) {
    "use strict";

    // datatable ist
    var dataTableList;
    $(document).on("input", "#dataTableSearch", function () {
        dataTableList.search($(this).val()).draw();
    });

    dataTableList = $("#examDataTable").DataTable({
    pageLength: 10,
    ordering: false,
    serverSide: false,
    processing: true,
    searching: true,
    responsive: true,

    ajax: $('#exam-list-route').val(),
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
        {"data": "exam_title", "name": "exam_title", responsivePriority:1},
        {"data": "exam_date", "name": "exam_date"},
        {"data": "exam_type", "name": "exam_type"},
        {"data": "total_mark", "name": "total_mark"},
        {"data": "num_of_std", "name": "num_of_std"},
        {"data": "num_of_question", "name": "num_of_question"},
        {"data": "status", "name": "status"},
        {"data": "action", "name": "action"},
    ],
    });

    // type show
    $('.onlineOption').hide();
    $(document).ready(function() {
        $(document).on('change', '.examType', function() {
            var selectedVal = $(this).find(':selected').val();
            if (selectedVal == 1) {
                $('.onlineOption').hide();
                $('.inputBox').prop('disabled', true);
                $('.totalMarkDisable').prop('disabled', false);
                $('.totalMark').val(0);
            }else{
                $('.onlineOption').show();
                $('.inputBox').prop('disabled', false);
                $('.totalMarkDisable').prop('disabled', true);
                $('.totalMark').val(0);
            }
        });
    });

    // question mark sum
    $(document).on('click', '.inputBox', function () {
        var currentTotal = parseInt($('.totalMark').val()) || 0;
        var selectedMark = parseInt($(this).data('mark'));
        if ($(this).is(":checked")) {
            currentTotal += selectedMark;
        } else {
            currentTotal -= selectedMark;
        }
        $('.totalMark').val(currentTotal);
    });

    $(document).on('click', '.editInputBox', function () {
        var currentTotal = parseInt($('.totalMarkEdit').val()) || 0;
        var selectedMark = parseInt($(this).data('mark'));
        if ($(this).is(":checked")) {
            currentTotal += selectedMark;
        } else {
            currentTotal -= selectedMark;
        }
        $('.totalMarkEdit').val(currentTotal);
    });

    // get package By Std
    $(document).ready(function () {
        $(document).on('change', '.getPackageByStd', function() {
            commonAjaxRequest('GET', $('#get-std-route').val(), dataResponse, dataResponse, { id: $(this).val() });
        });
    });
    function dataResponse(response) {
        $(".packageStudent").html(response.responseText);
    }

})(jQuery)
