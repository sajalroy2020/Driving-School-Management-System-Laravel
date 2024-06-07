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
                    <div class="dashboard-card-content">
                        <form class="ajax-request reset" action="{{route('admin.certificate.store')}}" method="POST"
                            data-handler="commonResponse" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{encrypt($certificate->id)}}">
                            <div class="row">
                                <div class="col-12">
                                    <div class="zForm-wrap pb-15">
                                        <label for="asUploadClientDocuments" class="sf-form-label">{{__('Certificate Background')}} <span class="text-red">*</span></label>
                                        <input type="file" name="certificate_img" class="certificate_img_input form-control sf-form-control sf-form-control-2 h-50" accept="image/*">
                                    </div>
                                </div>
                                <hr>
                                <div class="col-12">
                                    <div class="zForm-wrap pb-15">
                                        <label for="asUploadClientDocuments" class="sf-form-label">{{__('Certificate Logo')}}</label>
                                        <input type="file" name="certificate_logo" class="certificate_logo_input form-control sf-form-control sf-form-control-2 h-50" accept="image/*">
                                    </div>
                                    <div class="d-flex g-10">
                                        <div class="zForm-wrap pb-15">
                                            <label for="asFirstName" class="sf-form-label">{{__('Position - X')}}</label>
                                            <input type="number" value="{{$certificate->logo_position_x}}" name="logo_position_x" class="certificateLogoPositionX form-control sf-form-control sf-form-control-2 h-50">
                                        </div>
                                        <div class="zForm-wrap pb-15">
                                            <label for="asFirstName" class="sf-form-label">{{__('Position - Y')}}</label>
                                            <input type="number" value="{{$certificate->logo_position_y}}" name="logo_position_y" class="certificateLogoPositionY form-control sf-form-control sf-form-control-2 h-50">
                                        </div>
                                    </div>
                                    <div class="zForm-wrap pb-15">
                                        <label for="asFirstName" class="sf-form-label">{{__('Width')}}</label>
                                        <input type="number" value="{{$certificate->logo_width}}" name="logo_width" class="certificateLogoPositionWidth form-control sf-form-control sf-form-control-2 h-50">
                                    </div>
                                </div>
                                <hr>
                                <div class="col-12">
                                    <div class="zForm-wrap pb-15 d-flex">
                                        <label for="asFirstName" class="sf-form-label">{{__('Certificate Number Show')}}</label>
                                        <input type="checkbox" {{$certificate->certificate_num_type == ACTIVE ? 'checked' : ''}} name="certificate_num_type" value="{{ACTIVE}}" class="certificateNumberInput h-22 w-22 ml-10 border-dark">
                                    </div>
                                    <div class="d-flex g-10">
                                        <div class="zForm-wrap pb-15">
                                            <label for="asFirstName" class="sf-form-label">{{__('Position - X')}}</label>
                                            <input type="number" value="{{$certificate->number_position_x}}" name="number_position_x" class="certificateNumberPositionX form-control sf-form-control sf-form-control-2 h-50">
                                        </div>
                                        <div class="zForm-wrap pb-15">
                                            <label for="asFirstName" class="sf-form-label">{{__('Position - Y')}}</label>
                                            <input type="number" value="{{$certificate->number_position_y}}" name="number_position_y" class="certificateNumberPositionY form-control sf-form-control sf-form-control-2 h-50">
                                        </div>
                                    </div>
                                    <div class="d-flex g-10">
                                        <div class="zForm-wrap pb-15 w-50">
                                            <label for="asFirstName" class="sf-form-label">{{__('Font Size')}}</label>
                                            <input type="number" value="{{$certificate->number_font_size}}" name="number_font_size" class="certificateNumberFontSize form-control sf-form-control sf-form-control-2 h-50">
                                        </div>
                                        <div class="zForm-wrap pb-15 w-50">
                                            <label for="asFirstName" class="sf-form-label">{{__('Font color')}}</label>
                                            <input type="color" value="{{$certificate->number_font_color}}" name="number_font_color" class="certificateNumberColor form-control sf-form-control sf-form-control-2 h-50">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-12">
                                    <div class="zForm-wrap pb-15">
                                        <label for="asFirstName" class="sf-form-label">{{__('Certificate Title')}} <span class="text-red">*</span></label>
                                        <input type="text" value="{{$certificate->certificate_title}}" name="certificate_title" class="form-control sf-form-control sf-form-control-2 h-50 certificateTitleInput" placeholder="{{__('Certificate Title')}}">
                                    </div>
                                    <div class="d-flex g-10">
                                        <div class="zForm-wrap pb-15">
                                            <label for="asFirstName" class="sf-form-label">{{__('Position - X')}}</label>
                                            <input type="number" value="{{$certificate->title_position_x}}" name="title_position_x" class="certificateTitlePositionX form-control sf-form-control sf-form-control-2 h-50">
                                        </div>
                                        <div class="zForm-wrap pb-15">
                                            <label for="asFirstName" class="sf-form-label">{{__('Position - Y')}}</label>
                                            <input type="number" value="{{$certificate->title_position_y}}" name="title_position_y" class="certificateTitlePositionY form-control sf-form-control sf-form-control-2 h-50">
                                        </div>
                                    </div>
                                    <div class="d-flex g-10">
                                        <div class="zForm-wrap pb-15 w-50">
                                            <label for="asFirstName" class="sf-form-label">{{__('Font Size')}}</label>
                                            <input type="number" value="{{$certificate->title_font_size}}" name="title_font_size" class="certificateTitleFontSize form-control sf-form-control sf-form-control-2 h-50">
                                        </div>
                                        <div class="zForm-wrap pb-15 w-50">
                                            <label for="asFirstName" class="sf-form-label">{{__('Font color')}}</label>
                                            <input type="color" value="{{$certificate->title_font_color}}" name="title_font_color" class="certificateTitleColor form-control sf-form-control sf-form-control-2 h-50">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-12">
                                    <div class="zForm-wrap pb-15">
                                        <label for="asFirstName" class="sf-form-label">{{__('Certificate Date')}} <span class="text-red">*</span></label>
                                        <input type="date" value="{{$certificate->certificate_date}}" name="certificate_date" class="form-control sf-form-control sf-form-control-2 h-50 certificateDateInput">
                                    </div>
                                    <div class="d-flex g-10">
                                        <div class="zForm-wrap pb-15">
                                            <label for="asFirstName" class="sf-form-label">{{__('Position - X')}}</label>
                                            <input type="number" value="{{$certificate->date_position_x}}" name="date_position_x" class="certificateDatePositionX form-control sf-form-control sf-form-control-2 h-50">
                                        </div>
                                        <div class="zForm-wrap pb-15">
                                            <label for="asFirstName" class="sf-form-label">{{__('Position - Y')}}</label>
                                            <input type="number" value="{{$certificate->date_position_y}}" name="date_position_y" class="certificateDatePositionY form-control sf-form-control sf-form-control-2 h-50">
                                        </div>
                                    </div>
                                    <div class="d-flex g-10">
                                        <div class="zForm-wrap pb-15 w-50">
                                            <label for="asFirstName" class="sf-form-label">{{__('Font Size')}}</label>
                                            <input type="number" value="{{$certificate->date_font_size}}" name="date_font_size" class="certificateDateFontSize form-control sf-form-control sf-form-control-2 h-50">
                                        </div>
                                        <div class="zForm-wrap pb-15 w-50">
                                            <label for="asFirstName" class="sf-form-label">{{__('Font color')}}</label>
                                            <input type="color" value="{{$certificate->date_font_color}}" name="date_font_color" class="certificateDateColor form-control sf-form-control sf-form-control-2 h-50">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-12">
                                    <div class="zForm-wrap pb-15 w-100">
                                        <label for="asFirstName" class="sf-form-label">{{__('Student Name')}} <span class="text-red">*</span></label>
                                        <select class="sf-select-without-search studentNameInput" name="student_id">
                                            <option value="">{{__('Select Student')}}</option>
                                            @foreach ($students as $student)
                                                <option {{$certificate->student_id == $student->id ? 'selected' : ''}} value="{{$student->id}}">{{$student->student->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="d-flex g-10 w-100 pt-15">
                                        <div class="zForm-wrap pb-15 w-50">
                                            <label for="asFirstName" class="sf-form-label">{{__('Position - X')}}</label>
                                            <input type="number" value="{{$certificate->std_name_position_x}}" name="std_name_position_x" class="studentNamePositionX form-control sf-form-control sf-form-control-2 h-50">
                                        </div>
                                        <div class="zForm-wrap pb-15 w-50">
                                            <label for="asFirstName" class="sf-form-label">{{__('Position - Y')}}</label>
                                            <input type="number" value="{{$certificate->std_name_position_y}}" name="std_name_position_y" class="studentNamePositionY form-control sf-form-control sf-form-control-2 h-50">
                                        </div>
                                    </div>
                                    <div class="d-flex g-10">
                                        <div class="zForm-wrap pb-15 w-50">
                                            <label for="asFirstName" class="sf-form-label">{{__('Font Size')}}</label>
                                            <input type="number" value="{{$certificate->std_name_font_size}}" name="std_name_font_size" class="studentNameFontSize form-control sf-form-control sf-form-control-2 h-50">
                                        </div>
                                        <div class="zForm-wrap pb-15 w-50">
                                            <label for="asFirstName" class="sf-form-label">{{__('Font color')}}</label>
                                            <input type="color" value="{{$certificate->std_name_font_color}}" name="std_name_font_color" class="studentNameColor form-control sf-form-control sf-form-control-2 h-50">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-12">
                                    <div class="zForm-wrap pb-15">
                                        <label for="asFirstName" class="sf-form-label">{{__('Certificate Body')}} <span class="text-red">*</span></label>
                                        <textarea class="form-control sf-form-control sf-form-control-2 h-50 certificateBodyInput" placeholder="{{__('Certificate Body')}}" name="certificate_body" cols="10" rows="6">{{$certificate->certificate_body}}</textarea>
                                    </div>
                                    <div class="d-flex g-10">
                                        <div class="zForm-wrap pb-15">
                                            <label for="asFirstName" class="sf-form-label">{{__('Position - X')}}</label>
                                            <input type="number" value="{{$certificate->body_position_x}}" name="body_position_x" class="certificateBodyPositionX form-control sf-form-control sf-form-control-2 h-50">
                                        </div>
                                        <div class="zForm-wrap pb-15">
                                            <label for="asFirstName" class="sf-form-label">{{__('Position - Y')}}</label>
                                            <input type="number" value="{{$certificate->body_position_y}}" name="body_position_y" class="certificateBodyPositionY form-control sf-form-control sf-form-control-2 h-50">
                                        </div>
                                    </div>
                                    <div class="d-flex g-10">
                                        <div class="zForm-wrap pb-15 w-50">
                                            <label for="asFirstName" class="sf-form-label">{{__('Font Size')}}</label>
                                            <input type="number" value="{{$certificate->body_font_size}}" name="body_font_size" class="certificateBodyFontSize form-control sf-form-control sf-form-control-2 h-50">
                                        </div>
                                        <div class="zForm-wrap pb-15 w-50">
                                            <label for="asFirstName" class="sf-form-label">{{__('Font color')}}</label>
                                            <input type="color" value="{{$certificate->body_font_color}}" name="body_font_color" class="certificateBodyColor form-control sf-form-control sf-form-control-2 h-50">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-12">
                                    <div class="zForm-wrap pb-15">
                                        <label for="asFirstName" class="sf-form-label">{{__('Instructor Signature')}}</label>
                                        <input type="file" name="instructor_signature_img" class="instructor_signature_input form-control sf-form-control sf-form-control-2 h-50" accept="image/*">
                                    </div>
                                    <div class="d-flex g-10">
                                        <div class="zForm-wrap pb-15">
                                            <label for="asFirstName" class="sf-form-label">{{__('Position - X')}}</label>
                                            <input type="number" value="{{$certificate->instructor_signature_position_x}}" name="instructor_signature_position_x" class="instructorSignaturePositionX form-control sf-form-control sf-form-control-2 h-50">
                                        </div>
                                        <div class="zForm-wrap pb-15">
                                            <label for="asFirstName" class="sf-form-label">{{__('Position - Y')}}</label>
                                            <input type="number" value="{{$certificate->instructor_signature_position_y}}" name="instructor_signature_position_y" class="instructorSignaturePositionY form-control sf-form-control sf-form-control-2 h-50">
                                        </div>
                                    </div>
                                    <div class="zForm-wrap pb-15">
                                        <label for="asFirstName" class="sf-form-label">{{__('Width')}}</label>
                                        <input type="number" value="{{$certificate->instructor_signature_width}}" name="instructor_signature_width" class="instructorSignaturePositionWidth form-control sf-form-control sf-form-control-2 h-50">
                                    </div>
                                </div>
                                <hr>
                                <div class="col-12">
                                    <div class="zForm-wrap pb-15">
                                        <label for="asFirstName" class="sf-form-label">{{__('Signature Title -1')}}</label>
                                        <input type="text" value="{{$certificate->signature_title_1}}" name="signature_title_1" class="form-control sf-form-control sf-form-control-2 h-50 signatureTitle1Input" placeholder="{{__('Signature Title -1')}}">
                                    </div>
                                    <div class="d-flex g-10">
                                        <div class="zForm-wrap pb-15">
                                            <label for="asFirstName" class="sf-form-label">{{__('Position - X')}}</label>
                                            <input type="number" value="{{$certificate->signature_1_position_x}}" name="signature_1_position_x" class="signatureTitle1PositionX form-control sf-form-control sf-form-control-2 h-50">
                                        </div>
                                        <div class="zForm-wrap pb-15">
                                            <label for="asFirstName" class="sf-form-label">{{__('Position - Y')}}</label>
                                            <input type="number" value="{{$certificate->signature_1_position_y}}" name="signature_1_position_y" class="signatureTitle1PositionY form-control sf-form-control sf-form-control-2 h-50">
                                        </div>
                                    </div>
                                    <div class="d-flex g-10">
                                        <div class="zForm-wrap pb-15 w-50">
                                            <label for="asFirstName" class="sf-form-label">{{__('Font Size')}}</label>
                                            <input type="number" value="{{$certificate->signature_1_font_size}}" name="signature_1_font_size" class="signatureTitle1FontSize form-control sf-form-control sf-form-control-2 h-50">
                                        </div>
                                        <div class="zForm-wrap pb-15 w-50">
                                            <label for="asFirstName" class="sf-form-label">{{__('Font color')}}</label>
                                            <input type="color" value="{{$certificate->signature_1_font_color}}" name="signature_1_font_color" class="signatureTitle1Color form-control sf-form-control sf-form-control-2 h-50">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-12">
                                    <div class="zForm-wrap pb-15">
                                        <label for="asFirstName" class="sf-form-label">{{__('Administrator Signature')}}</label>
                                        <input type="file" name="admin_signature_img" class="admin_signature_input form-control sf-form-control sf-form-control-2 h-50" accept="image/*">
                                    </div>
                                    <div class="d-flex g-10">
                                        <div class="zForm-wrap pb-15">
                                            <label for="asFirstName" class="sf-form-label">{{__('Position - X')}}</label>
                                            <input type="number" value="{{$certificate->admin_signature_position_x}}" name="admin_signature_position_x" class="adminSignaturePositionX form-control sf-form-control sf-form-control-2 h-50">
                                        </div>
                                        <div class="zForm-wrap pb-15">
                                            <label for="asFirstName" class="sf-form-label">{{__('Position - Y')}}</label>
                                            <input type="number" value="{{$certificate->admin_signature_position_y}}" name="admin_signature_position_y" class="adminSignaturePositionY form-control sf-form-control sf-form-control-2 h-50">
                                        </div>
                                    </div>
                                    <div class="zForm-wrap pb-15">
                                        <label for="asFirstName" class="sf-form-label">{{__('Width')}}</label>
                                        <input type="number" value="{{$certificate->admin_signature_width}}" name="admin_signature_width" class="adminSignaturePositionWidth form-control sf-form-control sf-form-control-2 h-50">
                                    </div>
                                </div>
                                <hr>
                                <div class="col-12">
                                    <div class="zForm-wrap pb-15">
                                        <label for="asFirstName" class="sf-form-label">{{__('Signature Title -2')}}</label>
                                        <input type="text" value="{{$certificate->signature_title_2}}" name="signature_title_2" class="form-control sf-form-control sf-form-control-2 h-50 signatureTitle2Input" placeholder="{{__('Signature Title -2')}}">
                                    </div>
                                    <div class="d-flex g-10">
                                        <div class="zForm-wrap pb-15">
                                            <label for="asFirstName" class="sf-form-label">{{__('Position - X')}}</label>
                                            <input type="number" value="{{$certificate->signature_2_position_x}}" name="signature_2_position_x" class="signatureTitle2PositionX form-control sf-form-control sf-form-control-2 h-50">
                                        </div>
                                        <div class="zForm-wrap pb-15">
                                            <label for="asFirstName" class="sf-form-label">{{__('Position - Y')}}</label>
                                            <input type="number" value="{{$certificate->signature_2_position_y}}" name="signature_2_position_y" class="signatureTitle2PositionY form-control sf-form-control sf-form-control-2 h-50">
                                        </div>
                                    </div>
                                    <div class="d-flex g-10">
                                        <div class="zForm-wrap pb-15 w-50">
                                            <label for="asFirstName" class="sf-form-label">{{__('Font Size')}}</label>
                                            <input type="number" value="{{$certificate->signature_2_font_size}}" name="signature_2_font_size" class="signatureTitle2FontSize form-control sf-form-control sf-form-control-2 h-50">
                                        </div>
                                        <div class="zForm-wrap pb-15 w-50">
                                            <label for="asFirstName" class="sf-form-label">{{__('Font color')}}</label>
                                            <input type="color" value="{{$certificate->signature_2_font_color}}" name="signature_2_font_color" class="signatureTitle2Color form-control sf-form-control sf-form-control-2 h-50">
                                        </div>
                                    </div>
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
                        <img class="certificate-img" src="{{ getFileLink($certificate->certificate_img)}}" alt="">
                        <img class="certificate-logo" src="{{ getFileLink($certificate->certificate_logo)}}" alt="">
                        <p class="certificate-num">{{$certificate->certificate_number}}</p>
                        <h4 class="certificate-title">{{$certificate->certificate_title}}</h4>
                        <h6 class="certificate-date">
                            {{\Carbon\Carbon::createFromFormat('Y-m-d', $certificate->certificate_date)->format('jS F Y')}}
                        </h6>
                        @foreach ($students as $student)
                            <h5 class="student-name"> {{$certificate->student_id == $student->id ? $student->student->name : ''}}</h5>
                        @endforeach
                        <div class="certificate-body">
                            <div class="d-flex justify-content-center">
                                <p class="certificate-body-text">{{$certificate->certificate_body}}</p>
                            </div>
                        </div>
                        <img class="instructor-signature" src="{{getFileLink($certificate->instructor_signature_img)}}" alt="">
                        <img class="admin-signature" src="{{getFileLink($certificate->admin_signature_img)}}" alt="">
                        <p class="signature-title-1">{{$certificate->signature_title_1}}</p>
                        <p class="signature-title-2">{{$certificate->signature_title_2}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{asset('assets/custom/admin/js/certificate.js')}}"></script>
@endpush
