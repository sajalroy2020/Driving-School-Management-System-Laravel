(function ($) {
    "use strict";

    var dataTable;
        $(document).on("input", "#paymentDataTableSearch", function () {
            dataTable.search($(this).val()).draw();
        });

    dataTable = $("#paymentDataTable").DataTable({
        pageLength: 10,
        ordering: false,
        serverSide: false,
        processing: true,
        searching: true,
        responsive: true,

        ajax: $('#payment-list-route').val(),
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
            {"data": "payment_id", "name": "payments.payment_id"},
            {"data": "payable_amount"},
            {"data": "payment_amount"},
            {"data": "due_amount"},
            {"data": "payment_date"},
            {"data": "payment_type"},
            {"data": "status"},
            {"data": "action"},
        ],
    });

    $(document).on('change', '#enrolmentStudent', function () {
        console.log(1);
        var payable_amount = $(this).find(':selected').attr('data-payable');
        var enrolmentId = $(this).val();
        $("#payableAmount").val(payable_amount);
        commonAjaxRequest('GET', $('#get-total-paid-amount-route').val(), getTotalPaidAmountResponse, getTotalPaidAmountResponse, {
            'enrolment_id': enrolmentId,
        });
    });

    function getTotalPaidAmountResponse(response){
        if (response.status == true){
            var payable_amount = $("#payableAmount").val();
            var dueAmount = parseFloat(payable_amount) - parseFloat(response.data.total_paid);
            $("#dueAmount").val(parseFloat(dueAmount));
            $("#amountInfoShow").html('Total Amount - '+parseFloat(payable_amount)+', Due - '+dueAmount);
        }
    }

})(jQuery)
