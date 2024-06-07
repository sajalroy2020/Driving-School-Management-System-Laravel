@extends('layouts.app')
@push('title')
   {{$pageTitle}}
@endpush

@section('content')
    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">
        <div class="p-sm-30 p-15 bd-one bd-c-stroke bd-ra-10 bg-white">

            <ul class="nav nav-tabs zTab-reset task-chat-tab pl-0 d-flex justify-content-center" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="true">
                        {{__('Profile')}}
                    </button>
                </li>
                <li class="nav-item ml-5" role="presentation">
                    <button class="nav-link" id="password-tab" data-bs-toggle="tab" data-bs-target="#password-tab-pane" type="button" role="tab" aria-controls="password-tab-pane" aria-selected="false">
                        {{__('Password Update')}}
                    </button>
                </li>
            </ul>
            <div class="tab-content pt-20">
                <div class="tab-pane fade active show bg-secondary rounded-4" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                    <form class="ajax-request" action="{{route('student.profile.update')}}" method="POST" enctype="multipart/form-data" data-handler="commonResponse">
                        @csrf
                        <div class="p-sm-25 p-15  bd-ra-10">
                            <!-- Photo -->
                            <div class="pb-30">
                                <div class="upload-img-box profileImage-upload">
                                    <div class="icon">
                                        <img src="{{asset('assets/images/icon/camera.svg')}}" alt="" />
                                    </div>
                                    <img src="{{getFileLink($profile->picture)}}" />
                                    <input type="file" name="image" id="zImageUpload" accept="image/*" onchange="previewFile(this)" />
                                </div>
                            </div>
                            <div>
                                <!-- Inputs -->
                                <div class="row rg-20">
                                    <div class="col-md-6">
                                        <div class="zForm-wrap">
                                        <label for="asFirstName" class="sf-form-label">{{__('Full Name')}} <span class="text-danger">*</span></label>
                                        <input value="{{$profile->name}}" type="text" name="name" class="form-control sf-form-control sf-form-control-2" placeholder="{{__('Enter Full Name')}}" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="zForm-wrap">
                                        <label for="asEmailAddress" class="sf-form-label">{{__('Email Address')}} <span class="text-danger">*</span></label>
                                        <input disabled value="{{$profile->email}}" type="email" name="email" class="form-control sf-form-control sf-form-control-2" placeholder="{{__('Enter Email Address')}}" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="zForm-wrap">
                                        <label for="asWhatsAppNumber" class="sf-form-label">{{__('Phone Number')}} <span class="text-danger">*</span></label>
                                        <input value="{{$profile->phone}}" type="number" name="number" class="form-control sf-form-control sf-form-control-2" placeholder="{{__('Enter WhatsApp Number')}}" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="zForm-wrap">
                                            <label for="asZipCode" class="sf-form-label">{{__('Date of Birth')}}<span class="text-danger">*</span></label>
                                            <input value="{{$profile->dob}}" type="date" name="date_of_birth" class="form-control sf-form-control sf-form-control-2" />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="zForm-wrap">
                                            <label for="asPricing" class="sf-form-label">{{__('Gender')}} <span class="text-danger">*</span></label>
                                            <select class="sf-select-without-search" name="gender">
                                                <option>{{__("Select Gender")}}</option>
                                                <option {{$profile->gender == GENDER_MALE ? 'selected' : ''}} value="{{GENDER_MALE}}">{{__('Male')}}</option>
                                                <option {{$profile->gender == GENDER_FEMALE ? 'selected' : ''}} value="{{GENDER_FEMALE}}">{{__('Female')}}</option>
                                                <option {{$profile->gender == GENDER_OTHERS ? 'selected' : ''}} value="{{GENDER_OTHERS}}">{{__('Others')}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="zForm-wrap">
                                            <label for="asCountry" class="sf-form-label">{{__('Country')}} <span class="text-danger">*</span></label>
                                            <input value="{{$profile->country}}" type="text" name="country" class="form-control sf-form-control sf-form-control-2" id="asCountry" placeholder="{{__('Enter Country')}}" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="zForm-wrap">
                                            <label for="asState" class="sf-form-label">{{__('State')}} </label>
                                            <input value="{{$profile->state}}" type="text" name="state" class="form-control sf-form-control sf-form-control-2" id="asState" placeholder="{{__('Enter State')}}" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="zForm-wrap">
                                            <label for="asCity" class="sf-form-label">{{__('City')}} <span class="text-danger">*</span></label>
                                            <input value="{{$profile->city}}" type="text" name="city" class="form-control sf-form-control sf-form-control-2" id="asCity" placeholder="{{__('Enter City')}}" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="zForm-wrap">
                                        <label for="asZipCode" class="sf-form-label">{{__('Zip Code')}} </label>
                                        <input value="{{$profile->zip}}" type="text" name="zip_code" class="form-control sf-form-control sf-form-control-2" id="asZipCode" placeholder="{{__('Enter Zip Code')}}" />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="zForm-wrap">
                                            <label for="asDescription" class="sf-form-label">{{__('Address')}} <span class="text-danger">*</span></label>
                                            <textarea name="address" class="form-control sf-form-control sf-form-control-2" placeholder="{{__('Enter Your Address')}}">{{$profile->address}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center cg-10 pt-30">
                                    <button type="submit" class="border-0 bd-ra-12 py-13 px-25 bg-primary-color fs-16 fw-600 lh-19 text-white">{{__('Save Now')}}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade bg-secondary rounded-4" id="password-tab-pane" role="tabpanel" aria-labelledby="password-tab" tabindex="1">
                    <form class="ajax-request" action="{{route('student.profile.password-update')}}" method="POST" data-handler="passwordChangeResponse">
                        @csrf
                        <div class="row p-30">
                            <h4 class="fs-18 fw-700 lh-24 text-main-color pb-25">{{__('Change Password')}} :</h4>
                            <div class="col-md-6">
                                <div class="pb-30 passShowHide">
                                    <label for="inputPassword" class="sf-form-label">{{__("Current Password")}} <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control sf-form-control passShowHideInput @error('password') is-invalid @enderror" id="inputPassword" placeholder="{{__("Enter your password")}}"  name="current_password"/>
                                    <button type="button" toggle=".passShowHideInput" class="toggle-password fa-solid fa-eye"></button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="pb-30 passShowHide">
                                    <label for="inputNewPassword" class="sf-form-label">{{__("New Password")}} <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control sf-form-control passNewShowHideInput @error('password') is-invalid @enderror" id="inputNewPassword" placeholder="{{__("Enter your password")}}"  name="password"/>
                                    <button type="button" toggle=".passNewShowHideInput" class="toggle-password fa-solid fa-eye"></button>
                                </div>
                            </div>
                            <div class="d-flex align-items-center cg-10 pt-30">
                                <button type="submit" class="border-0 bd-ra-12 py-13 px-25 bg-primary-color fs-16 fw-600 lh-19 text-white">{{__('Save Now')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" value="{{route('login')}}" id="login-route">
@endsection

@push('script')
    <script src="{{asset('assets/custom/student/js/profile.js')}}"></script>
@endpush
