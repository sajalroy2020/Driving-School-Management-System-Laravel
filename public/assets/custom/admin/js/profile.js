(function ($) {
    "use strict";

    function passwordChangeResponse(response){
        commonResponse(response);
        window.location.href = $('#login-route').val();
    }

    window.passwordChangeResponse = passwordChangeResponse;

})(jQuery)
