@extends('layouts.app')
@push('title')
    {{$pageTitle}}
@endpush

@section('content')
    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">
        <div class="p-sm-30 p-15 bd-one bd-c-stroke bd-ra-10 bg-white">
            <div class="tab-pane fade show active" id="pills-ClientInformation" role="tabpanel"
                 aria-labelledby="pills-ClientInformation-tab" tabindex="0">
                <form class="ajax-request reset" action="{{route('admin.student.store')}}" method="POST"
                      enctype="multipart/form-data" data-handler="commonResponse">
                    @csrf
                    <div class="p-sm-25 p-15  bd-ra-10">
                        <!-- Photo -->
                        <div class="pb-30">
                            <div class="upload-img-box profileImage-upload">
                                <div class="icon"><img src="{{asset('assets/images/icon/camera.svg')}}" alt=""/></div>
                                <img class="preview-img" src="{{asset('assets/images/no-image.jpg')}}"/>
                                <input type="file" name="image" id="zImageUpload" accept="image/*"
                                       onchange="previewFile(this)"/>
                            </div>
                        </div>
                        <div>
                            <h4 class="fs-18 fw-700 lh-24 text-main-color pb-25">{{__('Personal Information')}} :</h4>
                            <!-- Inputs -->
                            <div class="row rg-20">
                                <div class="col-md-6">
                                    <div class="zForm-wrap">
                                        <label for="asFirstName" class="sf-form-label">{{__('Full Name')}} <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="name"
                                               class="form-control sf-form-control sf-form-control-2"
                                               placeholder="{{__("Enter Full Name")}}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="zForm-wrap">
                                        <label for="asEmailAddress" class="sf-form-label">{{__('Email Address')}} <span
                                                class="text-danger">*</span></label>
                                        <input type="email" name="email"
                                               class="form-control sf-form-control sf-form-control-2"
                                               placeholder="{{__("Enter Email Address")}}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="zForm-wrap">
                                        <label for="asWhatsAppNumber" class="sf-form-label">{{__('Phone Number')}} <span
                                                class="text-danger">*</span></label>
                                        <input type="number" name="number"
                                               class="form-control sf-form-control sf-form-control-2"
                                               placeholder="{{__("Enter Phone Number")}}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="pb-30 passShowHide">
                                        <label for="inputPassword" class="sf-form-label">{{__("Password")}} <span
                                                class="text-danger">*</span></label>
                                        <input type="password"
                                               class="form-control sf-form-control passShowHideInput @error('password') is-invalid @enderror"
                                               id="inputPassword" placeholder="{{__("Enter your password")}}"
                                               name="password"/>
                                        <button type="button" toggle=".passShowHideInput"
                                                class="toggle-password fa-solid fa-eye"></button>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="zForm-wrap">
                                        <label for="asZipCode" class="sf-form-label">{{__('Date of Birth')}} <span
                                                class="text-danger">*</span></label>
                                        <input type="date" name="date_of_birth"
                                               class="form-control sf-form-control sf-form-control-2" id="asZipCode"
                                               placeholder="{{__("Date of Birth")}}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="zForm-wrap">
                                        <label for="asPricing" class="sf-form-label">{{__('Gender')}} <span
                                                class="text-danger">*</span></label>
                                        <select class="sf-select-without-search" name="gender">
                                            <option value="">{{__("Select Gender")}}</option>
                                            <option value="{{GENDER_MALE}}">{{__('Male')}}</option>
                                            <option value="{{GENDER_FEMALE}}">{{__('Female')}}</option>
                                            <option value="{{GENDER_OTHERS}}">{{__('Others')}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="zForm-wrap">
                                        <label for="asCountry" class="sf-form-label">{{__('Country')}} <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="country"
                                               class="form-control sf-form-control sf-form-control-2" id="asCountry"
                                               placeholder="{{__("Enter Country")}}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="zForm-wrap">
                                        <label for="asState" class="sf-form-label">{{__('State')}} </label>
                                        <input type="text" name="state"
                                               class="form-control sf-form-control sf-form-control-2" id="asState"
                                               placeholder="{{__("Enter State")}}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="zForm-wrap">
                                        <label for="asCity" class="sf-form-label">{{__('City')}} <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="city"
                                               class="form-control sf-form-control sf-form-control-2" id="asCity"
                                               placeholder="{{__("Enter City")}}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="zForm-wrap">
                                        <label for="asZipCode" class="sf-form-label">{{__('Zip Code')}} </label>
                                        <input type="text" name="zip_code"
                                               class="form-control sf-form-control sf-form-control-2" id="asZipCode"
                                               placeholder="{{__("Enter Zip Code")}}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="zForm-wrap">
                                        <label for="asDescription" class="sf-form-label">{{__('Address')}} <span
                                                class="text-danger">*</span></label>
                                        <textarea name="address" class="form-control sf-form-control sf-form-control-2"
                                                  id="asDescription"
                                                  placeholder="{{__("Enter Your Address")}}"></textarea>
                                    </div>
                                </div>
                            </div>

                            <h4 class="fs-18 fw-700 lh-24 text-main-color pb-25 pt-30">{{__('Emergency Contact')}}
                                :</h4>
                            <div class="row rg-20">
                                <div class="col-md-6">
                                    <div class="zForm-wrap">
                                        <label for="asFirstName"
                                               class="sf-form-label">{{__('Contact Person Name')}} </label>
                                        <input type="text" name="contact_name"
                                               class="form-control sf-form-control sf-form-control-2"
                                               placeholder="{{__("Enter Contact Person Name")}}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="zForm-wrap">
                                        <label for="asFirstName"
                                               class="sf-form-label">{{__('Contact Address')}} </label>
                                        <input type="text" name="contact_address"
                                               class="form-control sf-form-control sf-form-control-2"
                                               placeholder="{{__("Enter Your Contact Address")}}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="zForm-wrap">
                                        <label for="asFirstName"
                                               class="sf-form-label">{{__('Contact Relation')}} </label>
                                        <input type="text" name="contact_relation"
                                               class="form-control sf-form-control sf-form-control-2"
                                               placeholder="{{__("Enter Contact Relation")}}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="zForm-wrap">
                                        <label for="asFirstName" class="sf-form-label">{{__('Contact Phone')}} </label>
                                        <input type="text" name="contact_phone"
                                               class="form-control sf-form-control sf-form-control-2"
                                               placeholder="{{__("Enter Your Contact Phone")}}"/>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="fs-18 fw-700 lh-24 text-main-color pt-30">{{__('Necessary Document')}} :</h4>
                                <button type="button"
                                        class="border-0 bd-ra-12 py-13 px-25 mt-30 bg-cancel fs-16 fw-600 lh-19 text-main-color addMoreDocument">{{__('Add More')}}</button>
                            </div>

                            <div class="row rg-20">
                                <div class="col-md-6">
                                    <div class="zForm-wrap">
                                        <label for="asDocuemntsType"
                                               class="sf-form-label">{{__('Document Type')}} </label>
                                        <input type="text" name="document_type[]"
                                               class="form-control sf-form-control sf-form-control-2"
                                               id="asDocumentsName" placeholder="{{__("Enter Documents Type")}}"/>
                                    </div>
                                    <div class="docuemnt_type"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="zForm-wrap">
                                        <label for="asDocumentsName"
                                               class="sf-form-label">{{__('Document Name')}} </label>
                                        <input type="text" name="document_name[]"
                                               class="form-control sf-form-control sf-form-control-2"
                                               id="asDocumentsName" placeholder="{{__("Enter Documents Name")}}"/>
                                    </div>
                                    <div class="docuemnt_name"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="zForm-wrap">
                                        <label for="asUploadClientDocuments"
                                               class="sf-form-label">{{__('Upload Your Document')}} </label>
                                        <input type="file" name="documents_file[]"
                                               class="form-control sf-form-control sf-form-control-2"
                                               accept="image/*,.doc,.docx,.pdf"/>
                                    </div>
                                    <div class="documents_file"></div>
                                </div>
                            </div>
                            <div id="addMoreDocumentDiv"></div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center cg-10 pt-25">
                        <button type="submit"
                                class="border-0 bd-ra-12 py-13 px-25 bg-primary-color fs-16 fw-600 lh-19 text-white">{{__('Save Now')}}</button>
                        <a href="{{url()->previous()}}"
                           class="border-0 bd-ra-12 py-13 px-25 bg-cancel fs-16 fw-600 lh-19 text-main-color">{{__('Back')}}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <input type="hidden" id="get-document-section-content-route"
           value="{{route('admin.partial.document-section-content')}}">
@endsection
@push('script')
    <script src="{{asset('assets/custom/admin/js/student.js')}}"></script>
@endpush
