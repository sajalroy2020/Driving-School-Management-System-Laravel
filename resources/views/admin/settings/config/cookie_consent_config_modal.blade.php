<div class="">
    <!--  -->
    <h4 class="fs-18 fw-700 lh-24 text-textBlack pb-27">{{__("Cookie Consent Configuration")}} </h4>
    <form class="ajax-request" action="{{ route('admin.setting.configuration.data.update') }}" method="POST"
          data-handler="commonResponse">
        @csrf
        <div class="zForm-wrap pb-20">
            <input type="hidden" name="config_type" value="cookie_consent_config">
            <label for="eInputBody" class="sf-form-label">{{__("Cookie Consent Text")}}</label>
            <textarea type="text" class="form-control sf-form-control summernoteOne" id="eInputBody"
                      placeholder="{{__("Write Something")}}" name="cookie_consent_config">{{ getSetting('cookie_consent_config') }}</textarea>
        </div>

        <div class="d-flex align-items-center cg-10">
            <button type="submit"
                    class="py-13 px-20 bd-one bd-ra-4 bd-c-primary-color bg-primary-color text-white fs-14 fw-600 lh-14">
                {{__("Save")}}
            </button>
            <button type="button"
                    class="py-13 px-20 bd-one bd-ra-4 bd-c-main-color bg-white text-main-color fs-14 fw-600 lh-14"
                    data-bs-dismiss="modal">{{__("Cancel")}}
            </button>
        </div>
    </form>
</div>
