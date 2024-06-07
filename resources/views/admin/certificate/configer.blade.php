@extends('layouts.app')
@push('title')
   {{$pageTitle}}
@endpush
@push('style')
    <link rel="stylesheet" href="{{asset('assets/custom/admin/css/certificate.css')}}" />
@endpush
@section('content')
    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">
        <div class="row rg-20">
            <div class="col-12 col-md-5 col-lg-5 col-xl-4">
                <div class="dashboard-card-wrap">
                    <div class="dashboard-card-content" id="sidebaCertificate">
                        <form class="ajax-request reset" action="{{route('admin.certificate.store')}}" method="POST"
                            data-handler="commonResponse" enctype="multipart/form-data">
                            @csrf
                            <div class="row">



                                {{-- <ul class="zSidebar-menu p-0">
                                    <li>
                                        <a href="#" class="d-flex align-items-center cg-10 bg-light" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                          <span class="">{{__('Exam')}}</span>
                                        </a>
                                        <div class="collapse" id="collapseExample" data-bs-parent="#sidebarMenu">
                                          <ul class="zSidebar-submenu p-0">
                                            <li class="p-12 bg-positive-blue rounded-3 mt-5">
                                                <div class="zForm-wrap pb-15">
                                                    <label for="asUploadClientDocuments" class="sf-form-label">{{__('Certificate Logo')}}</label>
                                                    <input type="file" name="certificate_logo" class="certificate_logo_input form-control sf-form-control sf-form-control-2 h-50" accept="image/*">
                                                </div>
                                                <div class="d-flex g-10">
                                                    <div class="zForm-wrap pb-15">
                                                        <label for="asFirstName" class="sf-form-label">{{__('Position - X')}}</label>
                                                        <input type="number" name="logo_position_x" class="certificateLogoPositionX form-control sf-form-control sf-form-control-2 h-50">
                                                    </div>
                                                    <div class="zForm-wrap pb-15">
                                                        <label for="asFirstName" class="sf-form-label">{{__('Position - Y')}}</label>
                                                        <input type="number" name="logo_position_y" class="certificateLogoPositionY form-control sf-form-control sf-form-control-2 h-50">
                                                    </div>
                                                </div>
                                                <div class="zForm-wrap">
                                                    <label for="asFirstName" class="sf-form-label">{{__('Width')}}</label>
                                                    <input type="number" name="logo_width" class="certificateLogoPositionWidth form-control sf-form-control sf-form-control-2 h-50">
                                                </div>
                                            </li>
                                          </ul>
                                        </div>
                                    </li>
                                </ul> --}}




                                <div class="col-12">
                                    <div class="zForm-wrap mb-15 p-12 pb-15 bg-positive-blue rounded-3">
                                        <label for="asUploadClientDocuments" class="sf-form-label">{{__('Certificate Background')}} <span class="text-red">*</span></label>
                                        <input type="file" name="certificate_img" class="certificate_img_input form-control sf-form-control sf-form-control-2 h-50" accept="image/*">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <ul class="mb-10 p-12 bg-scroll-thumb rounded-3">
                                        <li>
                                            <a href="#" class="d-flex align-items-center cg-10" data-bs-toggle="collapse" data-bs-target="#collapseSetting1" aria-expanded="true" aria-controls="collapseExample">
                                              <span class="fw-500 fs-15 text-info-emphasis">{{__('Certificate Logo')}}</span>
                                            </a>
                                            <div class="collapse" id="collapseSetting1" aria-expanded="true" data-bs-parent="#sidebaCertificate">
                                                <div class="p-12 bg-positive-blue rounded-3 mt-10">
                                                    <div class="zForm-wrap pb-15">
                                                        <label for="asUploadClientDocuments" class="sf-form-label">{{__('Certificate Logo')}}</label>
                                                        <input type="file" name="certificate_logo" class="certificate_logo_input form-control sf-form-control sf-form-control-2 h-50" accept="image/*">
                                                    </div>
                                                    <div class="d-flex g-10">
                                                        <div class="zForm-wrap pb-15">
                                                            <label for="asFirstName" class="sf-form-label">{{__('Position - X')}}</label>
                                                            <input type="number" name="logo_position_x" class="certificateLogoPositionX form-control sf-form-control sf-form-control-2 h-50">
                                                        </div>
                                                        <div class="zForm-wrap pb-15">
                                                            <label for="asFirstName" class="sf-form-label">{{__('Position - Y')}}</label>
                                                            <input type="number" name="logo_position_y" class="certificateLogoPositionY form-control sf-form-control sf-form-control-2 h-50">
                                                        </div>
                                                    </div>
                                                    <div class="zForm-wrap">
                                                        <label for="asFirstName" class="sf-form-label">{{__('Width')}}</label>
                                                        <input type="number" name="logo_width" class="certificateLogoPositionWidth form-control sf-form-control sf-form-control-2 h-50">
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-12">
                                    <ul class="mb-10 p-12 bg-scroll-thumb rounded-3">
                                        <li>
                                            <a href="#" class="d-flex align-items-center cg-10" data-bs-toggle="collapse" data-bs-target="#collapseSetting2" aria-expanded="true" aria-controls="collapseExample">
                                              <span class="fw-500 fs-15 text-info-emphasis">{{__('Certificate Number Show')}}</span>
                                            </a>
                                            <div class="collapse" id="collapseSetting2" data-bs-parent="#sidebaCertificate">
                                                <div class="p-12 bg-positive-blue rounded-3">
                                                    <div class="zForm-wrap pb-15 d-flex">
                                                        <label for="asFirstName" class="sf-form-label">{{__('Certificate Number Show')}}</label>
                                                        <input type="checkbox" name="certificate_num_type" value="{{ACTIVE}}" checked class="certificateNumberInput h-22 w-22 ml-10 border-dark">
                                                    </div>
                                                    <div class="d-flex g-10">
                                                        <div class="zForm-wrap pb-15">
                                                            <label for="asFirstName" class="sf-form-label">{{__('Position - X')}}</label>
                                                            <input type="number" name="number_position_x" class="certificateNumberPositionX form-control sf-form-control sf-form-control-2 h-50">
                                                        </div>
                                                        <div class="zForm-wrap pb-15">
                                                            <label for="asFirstName" class="sf-form-label">{{__('Position - Y')}}</label>
                                                            <input type="number" name="number_position_y" class="certificateNumberPositionY form-control sf-form-control sf-form-control-2 h-50">
                                                        </div>
                                                    </div>
                                                    <div class="d-flex g-10">
                                                        <div class="zForm-wrap w-50">
                                                            <label for="asFirstName" class="sf-form-label">{{__('Font Size')}}</label>
                                                            <input type="number" name="number_font_size" class="certificateNumberFontSize form-control sf-form-control sf-form-control-2 h-50">
                                                        </div>
                                                        <div class="zForm-wrap w-50">
                                                            <label for="asFirstName" class="sf-form-label">{{__('Font color')}}</label>
                                                            <input type="color" name="number_font_color" class="certificateNumberColor form-control sf-form-control sf-form-control-2 h-50">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-12">
                                    <ul class="mb-10 p-12 bg-scroll-thumb rounded-3">
                                        <li>
                                            <a href="#" class="d-flex align-items-center cg-10" data-bs-toggle="collapse" data-bs-target="#collapseSetting3" aria-expanded="true" aria-controls="collapseExample">
                                              <span class="fw-500 fs-15 text-info-emphasis">{{__('Certificate Title')}}</span>
                                            </a>
                                            <div class="collapse" id="collapseSetting3" data-bs-parent="#sidebaCertificate">
                                                <div class="p-12 bg-positive-blue rounded-3">
                                                    <div class="zForm-wrap pb-15">
                                                        <label for="asFirstName" class="sf-form-label">{{__('Certificate Title')}} <span class="text-red">*</span></label>
                                                        <input type="text" name="certificate_title" class="form-control sf-form-control sf-form-control-2 h-50 certificateTitleInput" placeholder="{{__('Certificate Title')}}">
                                                    </div>
                                                    <div class="d-flex g-10">
                                                        <div class="zForm-wrap pb-15">
                                                            <label for="asFirstName" class="sf-form-label">{{__('Position - X')}}</label>
                                                            <input type="number" name="title_position_x" class="certificateTitlePositionX form-control sf-form-control sf-form-control-2 h-50">
                                                        </div>
                                                        <div class="zForm-wrap pb-15">
                                                            <label for="asFirstName" class="sf-form-label">{{__('Position - Y')}}</label>
                                                            <input type="number" name="title_position_y" class="certificateTitlePositionY form-control sf-form-control sf-form-control-2 h-50">
                                                        </div>
                                                    </div>
                                                    <div class="d-flex g-10">
                                                        <div class="zForm-wrap w-50">
                                                            <label for="asFirstName" class="sf-form-label">{{__('Font Size')}}</label>
                                                            <input type="number" name="title_font_size" class="certificateTitleFontSize form-control sf-form-control sf-form-control-2 h-50">
                                                        </div>
                                                        <div class="zForm-wrap w-50">
                                                            <label for="asFirstName" class="sf-form-label">{{__('Font color')}}</label>
                                                            <input type="color" name="title_font_color" class="certificateTitleColor form-control sf-form-control sf-form-control-2 h-50">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-12">
                                    <ul class="mb-10 p-12 bg-scroll-thumb rounded-3">
                                        <li>
                                            <a href="#" class="d-flex align-items-center cg-10" data-bs-toggle="collapse" data-bs-target="#collapseSetting4" aria-expanded="true" aria-controls="collapseExample">
                                              <span class="fw-500 fs-15 text-info-emphasis">{{__('Certificate Date')}}</span>
                                            </a>
                                            <div class="collapse" id="collapseSetting4" data-bs-parent="#sidebaCertificate">
                                                <div class="p-12 bg-positive-blue rounded-3">
                                                    <div class="zForm-wrap pb-15">
                                                        <label for="asFirstName" class="sf-form-label">{{__('Certificate Date')}} <span class="text-red">*</span></label>
                                                        <input type="date" name="certificate_date" class="form-control sf-form-control sf-form-control-2 h-50 certificateDateInput">
                                                    </div>
                                                    <div class="d-flex g-10">
                                                        <div class="zForm-wrap pb-15">
                                                            <label for="asFirstName" class="sf-form-label">{{__('Position - X')}}</label>
                                                            <input type="number" name="date_position_x" class="certificateDatePositionX form-control sf-form-control sf-form-control-2 h-50">
                                                        </div>
                                                        <div class="zForm-wrap pb-15">
                                                            <label for="asFirstName" class="sf-form-label">{{__('Position - Y')}}</label>
                                                            <input type="number" name="date_position_y" class="certificateDatePositionY form-control sf-form-control sf-form-control-2 h-50">
                                                        </div>
                                                    </div>
                                                    <div class="d-flex g-10">
                                                        <div class="zForm-wrap w-50">
                                                            <label for="asFirstName" class="sf-form-label">{{__('Font Size')}}</label>
                                                            <input type="number" name="date_font_size" class="certificateDateFontSize form-control sf-form-control sf-form-control-2 h-50">
                                                        </div>
                                                        <div class="zForm-wrap w-50">
                                                            <label for="asFirstName" class="sf-form-label">{{__('Font color')}}</label>
                                                            <input type="color" name="date_font_color" class="certificateDateColor form-control sf-form-control sf-form-control-2 h-50">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-12">
                                    <ul class="mb-10 p-12 bg-scroll-thumb rounded-3">
                                        <li>
                                            <a href="#" class="d-flex align-items-center cg-10" data-bs-toggle="collapse" data-bs-target="#collapseSetting5" aria-expanded="true" aria-controls="collapseExample">
                                              <span class="fw-500 fs-15 text-info-emphasis">{{__('Student Name')}}</span>
                                            </a>
                                            <div class="collapse" id="collapseSetting5" data-bs-parent="#sidebaCertificate">
                                                <div class="p-12 bg-positive-blue rounded-3">
                                                    <div class="zForm-wrap pb-15 w-100">
                                                        <label for="asFirstName" class="sf-form-label">{{__('Student Name')}} <span class="text-red">*</span></label>
                                                        <select class="sf-select-without-search studentNameInput" name="student_id">
                                                            <option value="">{{__('Select Student')}}</option>
                                                            @foreach ($students as $student)
                                                                <option value="{{$student->id}}">{{$student->student->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="d-flex g-10 w-100 pt-15">
                                                        <div class="zForm-wrap pb-15 w-50">
                                                            <label for="asFirstName" class="sf-form-label">{{__('Position - X')}}</label>
                                                            <input type="number" name="std_name_position_x" class="studentNamePositionX form-control sf-form-control sf-form-control-2 h-50">
                                                        </div>
                                                        <div class="zForm-wrap pb-15 w-50">
                                                            <label for="asFirstName" class="sf-form-label">{{__('Position - Y')}}</label>
                                                            <input type="number" name="std_name_position_y" class="studentNamePositionY form-control sf-form-control sf-form-control-2 h-50">
                                                        </div>
                                                    </div>
                                                    <div class="d-flex g-10">
                                                        <div class="zForm-wrap w-50">
                                                            <label for="asFirstName" class="sf-form-label">{{__('Font Size')}}</label>
                                                            <input type="number" name="std_name_font_size" class="studentNameFontSize form-control sf-form-control sf-form-control-2 h-50">
                                                        </div>
                                                        <div class="zForm-wrap w-50">
                                                            <label for="asFirstName" class="sf-form-label">{{__('Font color')}}</label>
                                                            <input type="color" name="std_name_font_color" class="studentNameColor form-control sf-form-control sf-form-control-2 h-50">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-12">
                                    <ul class="mb-10 p-12 bg-scroll-thumb rounded-3">
                                        <li>
                                            <a href="#" class="d-flex align-items-center cg-10" data-bs-toggle="collapse" data-bs-target="#collapseSetting6" aria-expanded="true" aria-controls="collapseExample">
                                              <span class="fw-500 fs-15 text-info-emphasis">{{__('Certificate Body')}}</span>
                                            </a>
                                            <div class="collapse" id="collapseSetting6" data-bs-parent="#sidebaCertificate">
                                                <div class="p-12 bg-positive-blue rounded-3">
                                                    <div class="zForm-wrap pb-15">
                                                        <label for="asFirstName" class="sf-form-label">{{__('Certificate Body')}} <span class="text-red">*</span></label>
                                                        <textarea class="form-control sf-form-control sf-form-control-2 h-50 certificateBodyInput" placeholder="{{__('Certificate Body')}}" name="certificate_body" cols="10" rows="6"></textarea>
                                                    </div>
                                                    <div class="d-flex g-10">
                                                        <div class="zForm-wrap pb-15">
                                                            <label for="asFirstName" class="sf-form-label">{{__('Position - X')}}</label>
                                                            <input type="number" name="body_position_x" class="certificateBodyPositionX form-control sf-form-control sf-form-control-2 h-50">
                                                        </div>
                                                        <div class="zForm-wrap pb-15">
                                                            <label for="asFirstName" class="sf-form-label">{{__('Position - Y')}}</label>
                                                            <input type="number" name="body_position_y" class="certificateBodyPositionY form-control sf-form-control sf-form-control-2 h-50">
                                                        </div>
                                                    </div>
                                                    <div class="d-flex g-10">
                                                        <div class="zForm-wrap w-50">
                                                            <label for="asFirstName" class="sf-form-label">{{__('Font Size')}}</label>
                                                            <input type="number" name="body_font_size" class="certificateBodyFontSize form-control sf-form-control sf-form-control-2 h-50">
                                                        </div>
                                                        <div class="zForm-wrap w-50">
                                                            <label for="asFirstName" class="sf-form-label">{{__('Font color')}}</label>
                                                            <input type="color" name="body_font_color" class="certificateBodyColor form-control sf-form-control sf-form-control-2 h-50">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-12">
                                    <ul class="mb-10 p-12 bg-scroll-thumb rounded-3">
                                        <li>
                                            <a href="#" class="d-flex align-items-center cg-10" data-bs-toggle="collapse" data-bs-target="#collapseSetting7" aria-expanded="true" aria-controls="collapseExample">
                                              <span class="fw-500 fs-15 text-info-emphasis">{{__('Instructor Signature')}}</span>
                                            </a>
                                            <div class="collapse" id="collapseSetting7" data-bs-parent="#sidebaCertificate">
                                                <div class="p-12 bg-positive-blue rounded-3">
                                                    <div class="zForm-wrap pb-15">
                                                        <label for="asFirstName" class="sf-form-label">{{__('Instructor Signature')}}</label>
                                                        <input type="file" name="instructor_signature_img" class="instructor_signature_input form-control sf-form-control sf-form-control-2 h-50" accept="image/*">
                                                    </div>
                                                    <div class="d-flex g-10">
                                                        <div class="zForm-wrap pb-15">
                                                            <label for="asFirstName" class="sf-form-label">{{__('Position - X')}}</label>
                                                            <input type="number" name="instructor_signature_position_x" class="instructorSignaturePositionX form-control sf-form-control sf-form-control-2 h-50">
                                                        </div>
                                                        <div class="zForm-wrap pb-15">
                                                            <label for="asFirstName" class="sf-form-label">{{__('Position - Y')}}</label>
                                                            <input type="number" name="instructor_signature_position_y" class="instructorSignaturePositionY form-control sf-form-control sf-form-control-2 h-50">
                                                        </div>
                                                    </div>
                                                    <div class="zForm-wrap">
                                                        <label for="asFirstName" class="sf-form-label">{{__('Width')}}</label>
                                                        <input type="number" name="instructor_signature_width" class="instructorSignaturePositionWidth form-control sf-form-control sf-form-control-2 h-50">
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-12">
                                    <ul class="mb-10 p-12 bg-scroll-thumb rounded-3">
                                        <li>
                                            <a href="#" class="d-flex align-items-center cg-10" data-bs-toggle="collapse" data-bs-target="#collapseSetting8" aria-expanded="true" aria-controls="collapseExample">
                                              <span class="fw-500 fs-15 text-info-emphasis">{{__('Signature Title - 1')}}</span>
                                            </a>
                                            <div class="collapse" id="collapseSetting8" data-bs-parent="#sidebaCertificate">
                                                <div class="p-12 bg-positive-blue rounded-3">
                                                    <div class="zForm-wrap pb-15">
                                                        <label for="asFirstName" class="sf-form-label">{{__('Signature Title -1')}}</label>
                                                        <input type="text" name="signature_title_1" class="form-control sf-form-control sf-form-control-2 h-50 signatureTitle1Input" placeholder="{{__('Signature Title -1')}}">
                                                    </div>
                                                    <div class="d-flex g-10">
                                                        <div class="zForm-wrap pb-15">
                                                            <label for="asFirstName" class="sf-form-label">{{__('Position - X')}}</label>
                                                            <input type="number" name="signature_1_position_x" class="signatureTitle1PositionX form-control sf-form-control sf-form-control-2 h-50">
                                                        </div>
                                                        <div class="zForm-wrap pb-15">
                                                            <label for="asFirstName" class="sf-form-label">{{__('Position - Y')}}</label>
                                                            <input type="number" name="signature_1_position_y" class="signatureTitle1PositionY form-control sf-form-control sf-form-control-2 h-50">
                                                        </div>
                                                    </div>
                                                    <div class="d-flex g-10">
                                                        <div class="zForm-wrap w-50">
                                                            <label for="asFirstName" class="sf-form-label">{{__('Font Size')}}</label>
                                                            <input type="number" name="signature_1_font_size" class="signatureTitle1FontSize form-control sf-form-control sf-form-control-2 h-50">
                                                        </div>
                                                        <div class="zForm-wrap w-50">
                                                            <label for="asFirstName" class="sf-form-label">{{__('Font color')}}</label>
                                                            <input type="color" name="signature_1_font_color" class="signatureTitle1Color form-control sf-form-control sf-form-control-2 h-50">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-12">
                                    <ul class="mb-10 p-12 bg-scroll-thumb rounded-3">
                                        <li>
                                            <a href="#" class="d-flex align-items-center cg-10" data-bs-toggle="collapse" data-bs-target="#collapseSetting9" aria-expanded="true" aria-controls="collapseExample">
                                              <span class="fw-500 fs-15 text-info-emphasis">{{__('Administrator Signature')}}</span>
                                            </a>
                                            <div class="collapse" id="collapseSetting9" data-bs-parent="#sidebaCertificate">
                                                <div class="p-12 bg-positive-blue rounded-3">
                                                    <div class="zForm-wrap pb-15">
                                                        <label for="asFirstName" class="sf-form-label">{{__('Administrator Signature')}}</label>
                                                        <input type="file" name="admin_signature_img" class="admin_signature_input form-control sf-form-control sf-form-control-2 h-50" accept="image/*">
                                                    </div>
                                                    <div class="d-flex g-10">
                                                        <div class="zForm-wrap pb-15">
                                                            <label for="asFirstName" class="sf-form-label">{{__('Position - X')}}</label>
                                                            <input type="number" name="admin_signature_position_x" class="adminSignaturePositionX form-control sf-form-control sf-form-control-2 h-50">
                                                        </div>
                                                        <div class="zForm-wrap pb-15">
                                                            <label for="asFirstName" class="sf-form-label">{{__('Position - Y')}}</label>
                                                            <input type="number" name="admin_signature_position_y" class="adminSignaturePositionY form-control sf-form-control sf-form-control-2 h-50">
                                                        </div>
                                                    </div>
                                                    <div class="zForm-wrap">
                                                        <label for="asFirstName" class="sf-form-label">{{__('Width')}}</label>
                                                        <input type="number" name="admin_signature_width" class="adminSignaturePositionWidth form-control sf-form-control sf-form-control-2 h-50">
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-12">
                                    <ul class="mb-10 p-12 bg-scroll-thumb rounded-3">
                                        <li>
                                            <a href="#" class="d-flex align-items-center cg-10" data-bs-toggle="collapse" data-bs-target="#collapseSetting10" aria-expanded="true" aria-controls="collapseExample">
                                              <span class="fw-500 fs-15 text-info-emphasis">{{__('Signature Title - 2')}}</span>
                                            </a>
                                            <div class="collapse" id="collapseSetting10" data-bs-parent="#sidebaCertificate">
                                                <div class="p-12 bg-positive-blue rounded-3">
                                                    <div class="zForm-wrap pb-15">
                                                        <label for="asFirstName" class="sf-form-label">{{__('Signature Title -2')}}</label>
                                                        <input type="text" name="signature_title_2" class="form-control sf-form-control sf-form-control-2 h-50 signatureTitle2Input" placeholder="{{__('Signature Title -2')}}">
                                                    </div>
                                                    <div class="d-flex g-10">
                                                        <div class="zForm-wrap pb-15">
                                                            <label for="asFirstName" class="sf-form-label">{{__('Position - X')}}</label>
                                                            <input type="number" name="signature_2_position_x" class="signatureTitle2PositionX form-control sf-form-control sf-form-control-2 h-50">
                                                        </div>
                                                        <div class="zForm-wrap pb-15">
                                                            <label for="asFirstName" class="sf-form-label">{{__('Position - Y')}}</label>
                                                            <input type="number" name="signature_2_position_y" class="signatureTitle2PositionY form-control sf-form-control sf-form-control-2 h-50">
                                                        </div>
                                                    </div>
                                                    <div class="d-flex g-10">
                                                        <div class="zForm-wrap w-50">
                                                            <label for="asFirstName" class="sf-form-label">{{__('Font Size')}}</label>
                                                            <input type="number" name="signature_2_font_size" class="signatureTitle2FontSize form-control sf-form-control sf-form-control-2 h-50">
                                                        </div>
                                                        <div class="zForm-wrap w-50">
                                                            <label for="asFirstName" class="sf-form-label">{{__('Font color')}}</label>
                                                            <input type="color" name="signature_2_font_color" class="signatureTitle2Color form-control sf-form-control sf-form-control-2 h-50">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="float-right">
                                    <button type="submit" class="py-13 px-20 bd-one bd-ra-4 bd-c-primary-color bg-primary-color text-white fs-14 fw-600 lh-14">{{__('Save Now')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-7 col-lg-7 col-xl-8">
                <div class="sticky-top">
                    <div class="certificate-box text-center">
                        <img class="certificate-img" src="{{ asset('assets/images/certificate-1.png')}}" alt="certificate">
                        <img class="certificate-logo" src="{{ getFileLink('app_logo')}}" alt="">
                        <p class="certificate-num">{{__('Certificate-No')}}</p>
                        <h4 class="certificate-title">{{__('XYZ Driving School')}}</h4>
                        <h6 class="certificate-date">{{__('20 May 2024')}}</h6>
                        <h5 class="student-name">{{__('Student Name')}}</h5>
                        <div class="certificate-body">
                            <div class="d-flex justify-content-center">
                                <p class="certificate-body-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took.</p>
                            </div>
                        </div>
                        <img class="instructor-signature" src="{{ asset('assets/images/signature.png')}}" alt="">
                        <img class="admin-signature" src="{{ asset('assets/images/signature.png')}}" alt="">
                        <p class="signature-title-1">{{__('Instructor')}}</p>
                        <p class="signature-title-2">{{__('Administrator')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{asset('assets/custom/admin/js/certificate.js')}}"></script>
@endpush
