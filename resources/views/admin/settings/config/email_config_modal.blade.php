<div class="">
    <!--  -->
    <div class="bd-b-one bd-c-stroke pb-20 mb-20 d-flex align-items-center flex-wrap justify-content-between g-10">
        <h4 class="fs-18 fw-700 lh-24 text-textBlack pb-27">{{__("Mail Configuration")}} </h4>
        <a href="#" id="sendTestMailBtn" data-render_name="test_mail"
           class="fs-15 fw-500 lh-25 bg-main-color py-5 px-10 text-white bd-ra-12 d-inline-flex align-items-center g-5">
            <i
                class="fa fa-envelope"></i> {{ __('Send Test Mail') }}
        </a>
    </div>
    <form class="ajax-request" action="{{ route('admin.setting.configuration.data.update') }}" method="POST"
          data-handler="commonResponse">
        @csrf
        <div class="row zForm-wrap pb-20">
            <input type="hidden" name="config_type" value="email_config">
            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 mb-3">
                <label for="mailMailer" class="sf-form-label">{{__("Mail Mailer")}}</label>
                <input type="text" class="form-control sf-form-control" id="mailMailer" name="MAIL_MAILER"
                       value="{{ env('MAIL_MAILER') }}"/>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 mb-3">
                <label for="mailHost" class="sf-form-label">{{__("Mail Host")}}</label>
                <input type="text" class="form-control sf-form-control" id="mailHost" name="MAIL_HOST"
                       value="{{ env('MAIL_HOST') }}"/>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 mb-3">
                <label for="mailPort" class="sf-form-label">{{__("Mail Port")}}</label>
                <input type="text" class="form-control sf-form-control" id="mailPort" name="MAIL_PORT"
                       value="{{ env('MAIL_PORT') }}"/>
            </div>
        </div>
        <div class="row zForm-wrap pb-20">
            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 mb-3">
                <label for="mailUsername" class="sf-form-label">{{__("Mail Username")}}</label>
                <input type="text" class="form-control sf-form-control" id="mailUsername" name="MAIL_USERNAME"
                       value="{{ env('MAIL_USERNAME') }}"/>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 mb-3">
                <label for="mailPassword" class="sf-form-label">{{__("Mail Password")}}</label>
                <input type="password" class="form-control sf-form-control" id="mailPassword" name="MAIL_PASSWORD"
                       value="{{ env('MAIL_PASSWORD') }}"/>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 mb-3">
                <label for="mailEncryption" class="sf-form-label">{{__("Mail Encryption")}}</label>
                <input type="text" class="form-control sf-form-control" id="mailEncryption" name="MAIL_ENCRYPTION"
                       placeholder="tls or ssl" value="{{ env('MAIL_ENCRYPTION') }}"/>
            </div>
        </div>

        <div class="row zForm-wrap pb-20">
            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 mb-3">
                <label for="mailFromAddress" class="sf-form-label">{{__("Mail From Address")}}</label>
                <input type="text" class="form-control sf-form-control" id="mailFromAddress" name="MAIL_FROM_ADDRESS"
                       value="{{ env('MAIL_FROM_ADDRESS') }}"/>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 mb-3">
                <label for="mailFromName" class="sf-form-label">{{__("Mail From Name")}}</label>
                <input type="text" class="form-control sf-form-control" id="mailFromName" name="MAIL_FROM_NAME"
                       value="{{ env('MAIL_FROM_NAME') }}"/>
            </div>
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
