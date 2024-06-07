(function ($) {
    "use strict";

    //
    // $(document).on("change", "#module_name", function () {
    //     var value = $(this).val();
    //     var htmlData='';
    //     if (value == 'student' || value == 'instructor' || value == 'staff'){
    //         console.log(value);
    //         htmlData =`
    //             <option value="{{USER_STATUS_ACTIVE}}">{{__('Active')}}</option>
    //             <option value="{{USER_STATUS_INACTIVE}}">{{__('Inactive')}}</option>
    //         `;
    //     }else{
    //         htmlData =`
    //             <option value="{{STATUS_PENDING}}">{{__('Pending')}}</option>
    //             <option value="{{STATUS_ACTIVE}}">{{__('Active')}}</option>
    //         `;
    //     }
    //
    //     console.log(htmlData);
    //     $("#status").find("ul.list").html(htmlData);
    // });

    $(document).on("change", "#duration", function () {
        if ($(this).val() == 4) {
            $("#start_date_section").removeClass('d-none');
            $("#end_date_section").removeClass('d-none');
        } else {
            $("#start_date_section").addClass('d-none');
            $("#end_date_section").addClass('d-none');
        }
    });

    function reportGenerationResponse(response) {

        $("form.ajax-request .fa-spin").remove();
        $("form.ajax-request button[type='submit']").removeAttr("disabled");

        $('.error-message').remove();
        $('.is-invalid').removeClass('is-invalid');
        if (response['status'] === true) {
            $("#report-content-section").html(response.data);
            $("#report-result-section").removeClass('d-none');
            toastr.success(response['message']);
        } else {
            commonResponseHandler(response)
        }
    }

    window.reportGenerationResponse = reportGenerationResponse;
})(jQuery)
