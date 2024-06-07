(function ($) {
    "use strict";

    $(document).on('change', '.config-status-change', function () {
        let option_key = $(this).data("config_key");
        let option_value = 0;
        if ($(this).prop('checked') == true) {
            option_value = 1;
        }
        commonAjaxRequest('GET', $('#settingStatusChangeRoute').val(), configStatusChangeResponse, configStatusChangeResponse, {
            'option_key': option_key,
            'option_value': option_value,
        });
    });

    $(document).on('click', '.config-data-update-action', function () {
        let render_name = $(this).data("render_name");
        commonAjaxRequest('GET', $('#settingConfigModalRenderRoute').val(), configModalRenderResponse, configModalRenderResponse, {'render_name': render_name});
    });

    $(document).on('click', '#sendTestMailBtn', function () {
        $('#configureModal').modal('hide');
        $('#configureMailTestModal').modal('show');
    });

    $(document).on('change', '#maintenanceModeChange', function () {
        if ($(this).val() == 1){
            $('.maintenance-mode-secret-key-section').addClass('d-none');
            $('.maintenance-mode-alert-section').addClass('d-none');
        }else{
            $('.maintenance-mode-secret-key-section').removeClass('d-none');
            $('.maintenance-mode-alert-section').removeClass('d-none');

        }
    });

    $(document).on('input', '#maintenanceModeSecretKeyField', function () {
        if ($(this).val().length != 0){
            $('#maintenanceModeAlert').val($(this).data('base_url')+'/'+$(this).val());
            $('.maintenance-mode-alert').text($(this).data('base_url')+'/'+$(this).val());
        }
    });

    $(document).on('change', '#storageDriver', function () {
        if ($(this).val() == 'public'){
            $('.storage-driver-others-section').addClass('d-none');
        }else{
            $('.storage-driver-others-section').removeClass('d-none');
        }
    });

    function configStatusChangeResponse(responseData) {
        if (responseData['status'] === true) {
            toastr.success(responseData['message']);
        } else {
            toastr.error(responseData['message']);
        }
    }

    function configModalRenderResponse(responseData) {
        if (responseData['status'] === true) {
            $(document).find('#configureModal').find('.modal-content').html(responseData.data);
            $('#configureModal').modal('toggle');
        } else {
            toastr.error(responseData['message']);
        }
    }


    // add more document
    $('.addMore').on('click', function (e) {
        e.preventDefault();
        let html = `
                <div class="row w-100 removeSingleRow">
                    <div class="col-md-5">
                        <div class="zForm-wrap pb-20">
                            <label for="noticeTitle" class="sf-form-label">Start Time</label>
                            <input type="time" name="start_time[]" class="form-control sf-form-control"/>
                        </div>
                        <div class="start_time"></div>
                    </div>
                    <div class="col-md-5">
                        <div class="zForm-wrap pb-20">
                            <label for="noticeTitle" class="sf-form-label">End Time</label>
                            <input type="time" name="end_time[]" class="form-control sf-form-control"/>
                        </div>
                        <div class="end_time"></div>
                    </div>
                    <div class="col-md-2">
                        <div class="pt-3">
                            <button type="button" class="border-0 bd-ra-12 py-13 px-20 mt-30 bg-cancel fs-16 fw-600 lh-19 text-danger removeSlot">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>`;

        $('#addMoreSlottDiv').append(html);
    });
    $(document).on('click', '.removeSlot', function () {
        $(this).closest('.removeSingleRow').remove();
    });

})(jQuery)
