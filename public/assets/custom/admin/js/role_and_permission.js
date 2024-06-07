(function ($) {
    ("use strict");

    var dataTable
    $(document).on('input', '#rolePermissionListTableSearch', function () {
        dataTable.search($(this).val()).draw();
    });
    dataTable = $("#roleAndPermissionListTable").DataTable({
        pageLength: 10,
        ordering: false,
        serverSide: true,
        processing: true,
        responsive: true,
        searching: true,
        language: {
            paginate: {
                previous: "<i class='fa-solid fa-angles-left'></i>",
                next: "<i class='fa-solid fa-angles-right'></i>",
            },
            searchPlaceholder: "Search event",
            search: "<span class='searchIcon'><i class='fa-solid fa-magnifying-glass'></i></span>",
        },
        ajax: $('#rolePermissionListRoute').val(),
        dom: '<>tr<"tableBottom"<"row align-items-center"<"col-sm-6"<"tableInfo"i>><"col-sm-6"<"tablePagi"p>>>><"clear">',
        columns: [
            {"data": "name", "name": "name"},
            {"data": "status"},
            {"data": "action"}
        ]
    });

    $(document).on('click', '.role-edit-btn', function () {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var status = $(this).data('status');
        $("#roleId").val(id);
        $("#roleName").val(name);
        $('#roleStatus').val(0).change();
        $('select').niceSelect();
        $(".role-form-title").text("Update Role");
        $(".role-form-cancel-btn").removeClass("d-none");
    });

    $(document).on('click', '.role-form-cancel-btn', function () {
        $(".reset").trigger("reset");
        $("#roleId").val('');
        $(".role-form-title").text("Add Role");
        $(".role-form-cancel-btn").addClass("d-none");
    });

    window.roleFormResponse = function (response) {
        $("form.ajax-request .fa-spin").remove();
        $("form.ajax-request button[type='submit']").removeAttr("disabled");
        $('.error-message').remove();
        $('.is-invalid').removeClass('is-invalid');
        if (response['status'] === true) {
            toastr.success(response['message']);
            if (response.data.flag == 0) {
                $(".reset").trigger("reset");
            }
            if ($('.dataTable ').length) {
                $('.dataTable').DataTable().ajax.reload();
            }
            if ($('.sf-select-without-search')) {
                $('.sf-select-without-search').niceSelect('update');
            }
        } else {
            commonResponseHandler(response)
        }
    }

})(jQuery);
