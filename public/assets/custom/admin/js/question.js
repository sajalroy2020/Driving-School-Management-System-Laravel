(function ($) {
    "use strict";

    // datatable ist
    var dataTableList;
    $(document).on("input", "#dataTableSearch", function () {
        dataTableList.search($(this).val()).draw();
    });

    dataTableList = $("#questionDataTable").DataTable({
    pageLength: 10,
    ordering: false,
    serverSide: false,
    processing: true,
    searching: true,
    responsive: true,

    ajax: $('#question-list-route').val(),
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
        {"data": "question_title", "name": "question_title", responsivePriority:1},
        {"data": "question_type", "name": "question_type"},
        {"data": "question_mark", "name": "question_mark"},
        {"data": "status", "name": "status"},
        {"data": "action", "name": "action"},
    ],
    });

    // ans show
    $('.allAnsOption').hide();
    let rightAnsType = 'radio';

    $(document).ready(function() {
        $(document).on('change', '.questionType', function() {
            var selectedVal = $(this).find(':selected').val();

            if (selectedVal == 1) {
                $('#addMoreDiv').html('');
                $('.allAnsOption').hide();
                $('.questionOption').prop('disabled', true);
            }else{
                $('.allAnsOption').show();
                $('.questionOption').prop('disabled', false);
                $('.editAddMore').removeClass('d-none');

                if (selectedVal == 2) {
                    $('.rightAns').attr('type', 'radio');
                    rightAnsType = 'radio';
                } else {
                    $('.rightAns').attr('type', 'checkbox');
                    rightAnsType = 'checkbox';
                }
            }
        });
    });

    // add more
    function updateRadioValues() {
        $('.singleRow').each(function(index) {
            console.log(index);
            $(this).find('input[name="right_ans[]"]').val(index + 1 - 1);
        });
    }

    $(document).on('click', '.removeAddMore', function () {
        $(this).closest('.singleRow').remove();
        updateRadioValues();
    });

    let i = 0;
    $(document).on('click', '.addMore', function(e) {
        $('.allAnsOption').show();
        updateRadioValues();

        i++;
        e.preventDefault();
        let html = `
            <div class="col-12 singleRow">
                <div class="d-flex justify-content-between align-items-center pt-10">
                    <input class="form-check-input h4 mr-5 rightAns" name="right_ans[]" type="${rightAnsType}" value="${i}">
                    <input type="text" name="question_option[]" class="form-control sf-form-control" placeholder="Enter Question Answer" />
                    <div class="pl-5">
                        <button class="border-0 bd-ra-12 py-13 px-17 bg-cancel fs-16 fw-600 lh-19 text-danger removeAddMore">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </div>
                </div>
                <div class="question_option"></div>
            </div>`;

        $('#addMoreDiv').append(html);
        var editAdd = $(this).closest('#edit-modal').find('#addMoreDiv');
        editAdd.append(html);
    });

})(jQuery)
