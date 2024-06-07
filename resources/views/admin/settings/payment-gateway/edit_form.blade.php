<h4 class="fs-18 fw-700 lh-24 text-textBlack pb-27">{{__("Edit Gateway - ")}}</h4>
<form class="ajax-request" action="{{ route('admin.setting.gateway.update') }}"
      method="POST" data-handler="commonResponse">
    @csrf


    <div class="row">
        <div class="col-md-6">
            <div class="zForm-wrap pb-20 zImage-upload-details">
                <div class="zImage-inside">
                    <div class="d-flex pb-12"><img
                            src="{{asset('assets/images/icon/cloud-upload.svg')}}" alt="">
                    </div>
                    <p class="fs-15 fw-500 lh-16 text-1b1c17">{{__("Drag")}}
                        &amp; {{__("drop files here")}}</p>
                </div>
                <label for="zImageUpload" class="sf-form-label">{{__("Gateway Image")}}</label>
                <div class="upload-img-box">
                    @if($gateway->image)
                        <img
                            src="{{$gateway->payment_gateways?getFileLink($gateway->payment_gateways) : asset($gateway->image)}}"/>
                    @else
                        <img src="">
                    @endif
                    <input type="file" name="gateway_image" id="zImageUpload2" accept="image/*"
                           onchange="previewFile(this)">
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="zForm-wrap pb-20">
                <input type="hidden" value="{{encrypt($gateway->id)}}" name="id">
                <label for="gatewayName" class="sf-form-label">{{__("Gateway Name")}}</label>
                <input type="text" class="form-control sf-form-control" id="gatewayName"
                       name="gateway_name" value="{{$gateway->title}}"/>
            </div>
        </div>

        <div class="col-md-6">
            <div class="zForm-wrap pb-20">
                <label for="status" class="sf-form-label">{{__("Status")}}</label>
                <select class="sf-select-without-search" name="status" id="status">
                    <option
                        value="{{STATUS_ACTIVE}}" {{$gateway->status == STATUS_ACTIVE ? 'selected':''}}>{{__("Active")}}</option>
                    <option
                        value="{{STATUS_INACTIVE}}" {{$gateway->status == STATUS_INACTIVE ? 'selected':''}}>{{__("Inactive")}}</option>
                </select>
            </div>
        </div>

        @if($gatewayFieldDetails['mode_show'])
            <div class="col-md-6">
                <div class="zForm-wrap pb-20">
                    <label for="mode" class="sf-form-label">{{__("Mode")}}</label>
                    <select class="sf-select-without-search" name="mode" id="mode">
                        <option
                            value="{{PAYMENT_GATEWAY_MODE_LIVE}}" {{$gateway->mode == PAYMENT_GATEWAY_MODE_LIVE ? 'selected':''}}>{{__("Live")}}</option>
                        <option
                            value="{{PAYMENT_GATEWAY_MODE_SANDBOX}}" {{$gateway->mode == PAYMENT_GATEWAY_MODE_SANDBOX ? 'selected':''}}>{{__("Sandbox")}}</option>
                    </select>
                </div>
            </div>
        @endif
        @if($gatewayFieldDetails['url_show'])
            <div class="col-md-6">
                <div class="zForm-wrap pb-20">
                    <label for="url" class="sf-form-label">{{__($gatewayFieldDetails['url_title'])}}</label>
                    <input type="text" class="form-control sf-form-control" id="url"
                           name="url" value="{{$gateway->url}}"/>
                </div>
            </div>
        @endif
        @if($gatewayFieldDetails['key_show'])
            <div class="col-md-6">
                <div class="zForm-wrap pb-20">
                    <label for="key" class="sf-form-label">{{__($gatewayFieldDetails['key_title'])}}</label>
                    <input type="text" class="form-control sf-form-control" id="key"
                           name="key" value="{{$gateway->key}}"/>
                </div>
            </div>
        @endif
        @if($gatewayFieldDetails['secret_show'])
            <div class="col-md-6">
                <div class="zForm-wrap pb-20">
                    <label for="secret" class="sf-form-label">{{__($gatewayFieldDetails['secret_title'])}}</label>
                    <input type="text" class="form-control sf-form-control" id="secret"
                           name="secret" value="{{$gateway->secret}}"/>
                </div>
            </div>
        @endif
        <div class="col-md-6">
            <div class="zForm-wrap pb-20">
                <label for="instruction" class="sf-form-label">{{__("Instruction")}}</label>
                <textarea class="form-control sf-form-control" id="instruction"
                          name="instruction" rows="1">{!! $gateway->instruction !!}</textarea>
            </div>
        </div>
    </div>

    @if ($gateway->slug == 'bank')
        <div class="row rg-20">
            <div class="col-md-12 mt-20">
                <div class="d-flex justify-content-between align-items-center g-10 pb-8">
                    <h4 class="fs-14 fw-500 lh-20 text-title-black">{{ __('Bank Details') }}</h4>
                    <button type="button"
                            class="bd-one bd-c-stroke rounded-circle w-25 h-25 d-flex justify-content-center align-items-center bg-transparent fs-15 lh-25 text-para-text add-bank">
                        +
                    </button>
                </div>
                <ul class="zList-pb-16 bankItemLists">
                    @foreach ($gateway->gateway_bank as $bank)
                        <li class="d-flex justify-content-between align-items-center g-10">
                            <input type="hidden" name="bank[id][]" value="{{ $bank->id }}">
                            <div class="flex-grow-1 d-flex flex-wrap flex-sm-nowrap g-10 left">
                                <div class="flex-grow-1">
                                    <input type="text" class="form-control zForm-control"
                                           placeholder="Name" name="bank[name][]"
                                           value="{{ $bank->bank_name }}">
                                </div>
                                <div class="flex-grow-1">
                                    <textarea name="bank[details][]" class="form-control zForm-control"
                                              placeholder="Details">{{ $bank->details }}</textarea>
                                </div>
                            </div>
                            <button type="button"
                                    class="flex-shrink-0 bd-one bd-c-stroke rounded-circle w-25 h-25 d-flex justify-content-center align-items-center bg-transparent text-danger removedBankBtn">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif


    <div class="row rg-20">
        <div class="col-md-12 mt-20">
            <div class="d-flex justify-content-between align-items-center g-10 pb-8">
                <h4 class="fs-14 fw-500 lh-20 text-title-black">{{ __('Conversion Rate') }}</h4>
                <button type="button"
                        class="bd-one bd-c-stroke rounded-circle w-25 h-25 d-flex justify-content-center align-items-center bg-transparent fs-15 lh-25 text-para-text addCurrencyBtn">
                    +
                </button>
            </div>
            <ul class="zList-pb-16" id="currencyConversionRateSection">
                @foreach ($gateway->gateway_currency as $getwayCurrency)
                    <li
                        class="d-flex justify-content-between align-items-center g-10 paymentConversionRate">
                        <input type="hidden" name="currency_id[]"
                               value="{{ $getwayCurrency->id }}">
                        <div class="flex-grow-1 d-flex flex-wrap flex-sm-nowrap left">
                            <select class="sf-select currency" name="currency[]">
                                @foreach (getCurrency() as $key => $currency)
                                    <option value="{{ $key }}"
                                        {{ $key == $getwayCurrency->currency ? 'selected' : '' }}>
                                        {{ $currency }}</option>
                                @endforeach
                            </select>
                            <p class="p-13 fs-14 fw-400 lh-22 text-title-black  text-nowrap">
                                1{{ getCurrencySymbol() }} =
                            </p>
                            <input type="text" name="conversion_rate[]"
                                   value="{{ $getwayCurrency->conversion_rate }}"
                                   class="form-control zForm-control" id=""
                                   placeholder="1.00"/>
                            <p class="p-13 fs-14 fw-400 lh-22 text-title-black  text-nowrap">
                                {{ $getwayCurrency->currency }}
                            </p>
                        </div>
                        <button type="button"
                                class="flex-shrink-0 bd-one bd-c-stroke rounded-circle w-25 h-25 d-flex justify-content-center align-items-center bg-transparent text-danger removedCurrencyBtn">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </li>
                @endforeach
            </ul>
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
