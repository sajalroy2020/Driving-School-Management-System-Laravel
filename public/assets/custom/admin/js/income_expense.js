(function ($) {
    "use strict";

    var incomeExpenseListTable;
        $(document).on("input", "#dataTableSearch", function () {
            incomeExpenseListTable.search($(this).val()).draw();
        });

    incomeExpenseListTable = $("#incomeExpenseDataTable").DataTable({
        pageLength: 10,
        ordering: false,
        serverSide: false,
        processing: true,
        searching: true,
        responsive: true,

        ajax: $('#income-expense-route').val(),
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
            {"data": "income_expenses_id", "name": "income_expenses.income_expenses_id"},
            {"data": "type", "name": "type"},
            {"data": "purpose", "name": "purpose.income_expenses_id"},
            {"data": "amount", "name": "amount"},
            {"data": "date", "name": "date.income_expenses_id"},
            {"data": "status", "name": "status"},
            {"data": "action", "name": "action"},
        ],
    });

})(jQuery)
