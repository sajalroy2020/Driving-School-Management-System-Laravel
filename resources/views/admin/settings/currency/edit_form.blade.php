    <h4 class="fs-18 fw-700 lh-24 text-textBlack pb-27">{{__("Update Currency")}}</h4>
    <form class="ajax-request" action="{{ route('admin.setting.currency.store') }}"
          method="POST" data-handler="commonResponse">
        @csrf
        <div class="zForm-wrap pb-20">
            <input type="hidden" name="id" value="{{$currency->id}}">
            <label for="currencyCode"
                   class="sf-form-label">{{__("Currency ISO Code")}}</label>
            <select class="sf-select-without-search" name="currency_code" id="currencyCode">
                <option value="">{{ __('Select') }}</option>
                @foreach(getCurrency() as $code => $currencyItem)
                    <option value="{{$code}}" {{$currency->currency_code == $code ? 'selected':''}}>{{$currencyItem}}</option>
                @endforeach
            </select>
        </div>
        <div class="zForm-wrap pb-20">
            <label for="CurrencySymbol" class="sf-form-label pt-24">{{__("Currency Symbol")}}</label>
            <input type="text" class="form-control sf-form-control" id="CurrencySymbol"
                   placeholder="{{__("Symbol")}}" name="currency_symbol" value="{{$currency->symbol}}"/>
        </div>
        <div class="zForm-wrap pb-20">
            <label for="currencyPlacement" class="sf-form-label">{{__("Currency Placement")}}</label>
            <select class="sf-select-without-search" name="currency_placement" id="currencyPlacement">
                <option value="">{{ __('Select') }}</option>
                <option value="{{CURRENCY_PLACEMENT_BEFORE}}" {{$currency->currency_placement == CURRENCY_PLACEMENT_BEFORE? 'selected':''}}>{{ __('Before Amount') }}</option>
                <option value="{{CURRENCY_PLACEMENT_AFTER}}" {{$currency->currency_placement == CURRENCY_PLACEMENT_AFTER? 'selected':''}}>{{ __('After Amount') }}</option>
            </select>
        </div>

        <div class="col-md-12 pt-10">
            <div class="zForm-wrap pb-20">
                <div class="zCheck form-check form-switch">
                    <label for="defaultCurrency"
                           class="sf-form-label px-14 mt-20">{{__(" Default Currency")}}</label>
                    <input class="form-check-input mt-17" type="checkbox"
                           role="switch" id="defaultCurrency" name="default_currency" {{$currency->default_currency == 1?'checked':''}}
                    />
                </div>
            </div>
        </div>


        <div class="d-flex align-items-center cg-10">
            <button type="submit"
                    class="py-13 px-20 bd-one bd-ra-4 bd-c-primary-color bg-primary-color text-white fs-14 fw-600 lh-14">{{__("Save Now")}}</button>
            <button type="button"
                    class="py-13 px-20 bd-one bd-ra-4 bd-c-main-color bg-white text-main-color fs-14 fw-600 lh-14"
                    data-bs-dismiss="modal">{{__("Cancel Now")}}</button>
        </div>
    </form>
