var getCurrencySymbol = $('#getCurrencySymbol').val();
var allCurrency = JSON.parse($('#allCurrency').val());

(function ($) {
    "use strict";

    $(document).on('click', '.addCurrencyBtn', function () {
        var html = '';
        html += '<div class="input-group mb-3 currency-conversation-rate">' +
            '<select name="currency[]" class="form-control currency" required>';
        Object.entries(allCurrency).forEach((currency) => {
            html += '<option value="' + currency[0] + '">' + currency[1] + '</option>';
        });
        html += '</select>' +
            '<span class="input-group-text">1  ' + getCurrencySymbol + ' = </span>' +
            '<input type="number" step="any" min="0" name="conversion_rate[]" value="" class="form-control" required>' +
            '<input type="hidden" step="any" min="0" name="currency_id[]" value="" class="form-control" required>' +
            '<span class="input-group-text append_currency"></span>' +
            '<button type="button" class="bg-white border-0 font-24 mr-5 ms-3 removedItem text-danger bg-fafafa border-0" title="Remove"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12L19 6.41Z"/></svg></button>' +
            '</div>';
        $('#currencyConversionRateSection').append(html);
        $('.currency').trigger("change");
    })

    $(document).on('click', '.removedItem', function () {
        $(this).closest('.currency-conversation-rate').remove();
    });

    $(document).on('change', '.currency', function () {
        $(this).closest('.currency-conversation-rate').find('.append_currency').text($(this).val())
    });

    // Bank
    $(document).on('click', '.add-bank', function () {
        $('.bankItemLists').append(addBank());
    });

    $(document).on('click', '.remove-bank', function () {
        $(this).closest('.multi-bank').remove()
    });


    window.addBank = function () {
        return `<div class="multi-bank bg-white radius-4 theme-border pb-0 mb-25">
                    <div class="row rg-15">
                        <div class="col-6">
                        <div class="primary-form-group mt-2">
                                    <div class="primary-form-group-wrap">
                            <input type="hidden" name="bank[id][]" value="">
                            <label for="name" class="label-text-title color-heading font-medium mb-2 form-label">Bank Name</label>
                            <input type="text" name="bank[name][]" class="primary-form-control bank-name" id="name" placeholder="Bank Name" value="">
                            </div>
                            </div>
                        </div>
                        <div class="col-6">
                        <div class="primary-form-group mt-2">
                                    <div class="primary-form-group-wrap">
                            <label for="name" class="label-text-title color-heading font-medium mb-2 form-label">Status</label>
                            <select name="bank[status][]" class="sf-select-without-search primary-form-control p-0" id="status">
                                <option value="1">Active</option>
                                <option value="0">Deactivate</option>
                            </select>
                            </div>
                            </div>
                        </div>

                        <div class="col-12">
                        <div class="primary-form-group mt-2">
                                    <div class="primary-form-group-wrap">
                            <label for="name" class="label-text-title color-heading font-medium mb-2 form-label">Bank Details</label>
                            <textarea name="bank[details][]" id="bank_details" class="primary-form-control"></textarea>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-end">
                            <button type="button" class="bd-ra-12 border-0 btn btn-danger fs-15 fw-500 lh-25 ml-10 px-17 py-3 remove-bank" title="Remove">Remove</button>
                        </div>
                    </div>
                </div>`;
    }

})(jQuery);
