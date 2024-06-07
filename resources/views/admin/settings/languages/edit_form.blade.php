    <h4 class="fs-18 fw-700 lh-24 text-textBlack pb-27">{{__("Edit Language")}}</h4>
    <form class="ajax-request" action="{{ route('admin.setting.languages.store') }}"
          method="POST" data-handler="commonResponse">
        @csrf
        <div class="zForm-wrap pb-20">
            <input type="hidden" value="{{$language->id}}" name="id">
            <label for="languageName" class="sf-form-label">{{__("Language Name")}}</label>
            <input type="text" class="form-control sf-form-control" id="languageName"
                   placeholder="{{__("Language Name")}}" name="language_name" value="{{$language->language}}"/>
        </div>
        <div class="zForm-wrap pb-20">
            <label for="isoCode"
                   class="sf-form-label">{{__("Language ISO Code")}}</label>
            <select class="sf-select-without-search" name="iso_code" id="isoCode">
                @foreach (languageIsoCode() as $code => $isoCountryName)
                    <option value="{{ $code }}" {{$language->iso_code == $code ? 'selected':''}}>
                        {{ $isoCountryName . '(' . $code . ')' }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="zForm-wrap pb-20">
            <label for="applicableFont" class="sf-form-label">{{__("Applicable Font")}}</label>
            <input type="file" class="form-control sf-form-control" id="applicableFont"
                   placeholder="{{__("Applicable Font")}}" name="applicable_font" value="{{$language->font}}"/>
        </div>
        <div class="zForm-wrap pb-20">
            <label for="rtlEnable" class="sf-form-label">{{__("RTL Enable")}}</label>
            <select class="sf-select-without-search" name="rtl_enable" id="rtlEnable">
                <option value="{{LANGUAGE_RTL_OFF}}" {{$language->rtl == LANGUAGE_RTL_OFF ? 'selected':''}}>{{__("No")}}</option>
                <option value="{{LANGUAGE_RTL_ON}}" {{$language->rtl == LANGUAGE_RTL_ON ? 'selected':''}}>{{__("Yes")}}</option>
            </select>
        </div>
        <div class="zForm-wrap pb-20 zImage-upload-details">
            <div class="zImage-inside">
                <div class="d-flex pb-12"><img
                        src="{{asset('assets/images/icon/cloud-upload.svg')}}" alt="">
                </div>
                <p class="fs-15 fw-500 lh-16 text-1b1c17">{{__("Drag")}}
                    &amp; {{__("drop files here")}}</p>
            </div>
            <label for="zImageUpload" class="sf-form-label">{{__("Flag Image")}}</label>
            <div class="upload-img-box">
                @if($language->flag_image)
                    <img src="{{ getFileLink($language->flag_image) }}"/>
                @else
                    <img src="">
                @endif
                <input type="file" name="flag_image" id="zImageUpload2" accept="image/*"
                       onchange="previewFile(this)">
            </div>

        </div>
        <div class="col-md-12">
            <div class="zForm-wrap pb-20">
                <div class="zCheck form-check form-switch">
                    <label for="defaultLanguage"
                           class="sf-form-label px-14 my-20">{{__(" Make As Default Language")}}</label>
                    <input class="form-check-input my-17" type="checkbox"
                           role="switch" id="defaultLanguage" name="default_language" value="{{$language->default ==1?1:0}}" {{$language->default ==1?'checked':''}}
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
