(function ($) {
    "use strict";

    $(document).on('click', '.update-translate-item', function () {
        var key = $(this).closest('tr').find('.key').val();
        var value = $(this).closest('tr').find('.value').val();
        var is_new = $(this).closest('tr').find('.is_new').val();
        console.log(key,value, is_new,  $('#updateTranslateItemRoute').val());
        commonAjaxRequest('GET', $('#updateTranslateItemRoute').val(), commonResponse, commonResponse, {'key': key, 'val': value, 'is_new': is_new});
    });

    // function getTranslateItemRes(response){
    //
    // }

})(jQuery)
