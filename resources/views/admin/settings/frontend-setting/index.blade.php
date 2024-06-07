@extends('layouts.app')
@push('title')
    {{$pageTitle}}
@endpush

@section('content')
    <!-- Content -->
    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">
        <div class="p-20 bd-one bd-c-stroke bd-ra-12 bg-white overflow-hidden min-vh-h-88">
            <div class="zTab-vertical-wrap">
                <!-- Left -->
                <div class="left">
                    <ul class="nav nav-tabs zTab-reset zTab-two" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link d-flex align-items-center g-12 active" id="sectionSettings-tab"
                                    data-bs-toggle="tab" data-bs-target="#sectionSettings-tab-pane" type="button"
                                    role="tab" aria-controls="sectionSettings-tab-pane" aria-selected="true">
                                <div class="icon d-flex">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12.0156 17.25C9.12562 17.25 6.76562 14.9 6.76562 12C6.76562 9.1 9.12562 6.75 12.0156 6.75C14.9056 6.75 17.2656 9.1 17.2656 12C17.2656 14.9 14.9056 17.25 12.0156 17.25ZM12.0156 8.25C9.94563 8.25 8.26562 9.93 8.26562 12C8.26562 14.07 9.94563 15.75 12.0156 15.75C14.0856 15.75 15.7656 14.07 15.7656 12C15.7656 9.93 14.0856 8.25 12.0156 8.25Z"
                                            fill="#8F96B2"/>
                                        <path
                                            d="M7.01562 12.75H2.01562C1.60563 12.75 1.26562 12.41 1.26562 12C1.26562 11.59 1.60563 11.25 2.01562 11.25H7.01562C7.42562 11.25 7.76562 11.59 7.76562 12C7.76562 12.41 7.42562 12.75 7.01562 12.75Z"
                                            fill="#8F96B2"/>
                                        <path
                                            d="M22.0156 12.75H17.0156C16.6056 12.75 16.2656 12.41 16.2656 12C16.2656 11.59 16.6056 11.25 17.0156 11.25H22.0156C22.4256 11.25 22.7656 11.59 22.7656 12C22.7656 12.41 22.4256 12.75 22.0156 12.75Z"
                                            fill="#8F96B2"/>
                                    </svg>
                                </div>
                                <span>{{__("Section Settings")}}</span>
                            </button>
                            <span><i class="fa-solid fa-angle-right"></i></span>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link d-flex align-items-center g-12" id="aboutUsSettings-tab"
                                    data-bs-toggle="tab" data-bs-target="#aboutUsSettings-tab-pane" type="button"
                                    role="tab" aria-controls="aboutUsSettings-tab-pane" aria-selected="true">
                                <div class="icon d-flex">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12.0156 17.25C9.12562 17.25 6.76562 14.9 6.76562 12C6.76562 9.1 9.12562 6.75 12.0156 6.75C14.9056 6.75 17.2656 9.1 17.2656 12C17.2656 14.9 14.9056 17.25 12.0156 17.25ZM12.0156 8.25C9.94563 8.25 8.26562 9.93 8.26562 12C8.26562 14.07 9.94563 15.75 12.0156 15.75C14.0856 15.75 15.7656 14.07 15.7656 12C15.7656 9.93 14.0856 8.25 12.0156 8.25Z"
                                            fill="#8F96B2"/>
                                        <path
                                            d="M7.01562 12.75H2.01562C1.60563 12.75 1.26562 12.41 1.26562 12C1.26562 11.59 1.60563 11.25 2.01562 11.25H7.01562C7.42562 11.25 7.76562 11.59 7.76562 12C7.76562 12.41 7.42562 12.75 7.01562 12.75Z"
                                            fill="#8F96B2"/>
                                        <path
                                            d="M22.0156 12.75H17.0156C16.6056 12.75 16.2656 12.41 16.2656 12C16.2656 11.59 16.6056 11.25 17.0156 11.25H22.0156C22.4256 11.25 22.7656 11.59 22.7656 12C22.7656 12.41 22.4256 12.75 22.0156 12.75Z"
                                            fill="#8F96B2"/>
                                    </svg>
                                </div>
                                <span>{{__("About Us")}}</span>
                            </button>
                            <span><i class="fa-solid fa-angle-right"></i></span>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link d-flex align-items-center g-12" id="achievementSettings-tab"
                                    data-bs-toggle="tab" data-bs-target="#achievementSettings-tab-pane" type="button"
                                    role="tab" aria-controls="achievementSettings-tab-pane" aria-selected="true">
                                <div class="icon d-flex">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12.0156 17.25C9.12562 17.25 6.76562 14.9 6.76562 12C6.76562 9.1 9.12562 6.75 12.0156 6.75C14.9056 6.75 17.2656 9.1 17.2656 12C17.2656 14.9 14.9056 17.25 12.0156 17.25ZM12.0156 8.25C9.94563 8.25 8.26562 9.93 8.26562 12C8.26562 14.07 9.94563 15.75 12.0156 15.75C14.0856 15.75 15.7656 14.07 15.7656 12C15.7656 9.93 14.0856 8.25 12.0156 8.25Z"
                                            fill="#8F96B2"/>
                                        <path
                                            d="M7.01562 12.75H2.01562C1.60563 12.75 1.26562 12.41 1.26562 12C1.26562 11.59 1.60563 11.25 2.01562 11.25H7.01562C7.42562 11.25 7.76562 11.59 7.76562 12C7.76562 12.41 7.42562 12.75 7.01562 12.75Z"
                                            fill="#8F96B2"/>
                                        <path
                                            d="M22.0156 12.75H17.0156C16.6056 12.75 16.2656 12.41 16.2656 12C16.2656 11.59 16.6056 11.25 17.0156 11.25H22.0156C22.4256 11.25 22.7656 11.59 22.7656 12C22.7656 12.41 22.4256 12.75 22.0156 12.75Z"
                                            fill="#8F96B2"/>
                                    </svg>
                                </div>
                                <span>{{__("Achievement")}}</span>
                            </button>
                            <span><i class="fa-solid fa-angle-right"></i></span>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link d-flex align-items-center g-12" id="ourGallerySettings-tab"
                                    data-bs-toggle="tab" data-bs-target="#ourGallerySettings-tab-pane" type="button"
                                    role="tab" aria-controls="ourGallerySettings-tab-pane" aria-selected="true">
                                <div class="icon d-flex">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12.0156 17.25C9.12562 17.25 6.76562 14.9 6.76562 12C6.76562 9.1 9.12562 6.75 12.0156 6.75C14.9056 6.75 17.2656 9.1 17.2656 12C17.2656 14.9 14.9056 17.25 12.0156 17.25ZM12.0156 8.25C9.94563 8.25 8.26562 9.93 8.26562 12C8.26562 14.07 9.94563 15.75 12.0156 15.75C14.0856 15.75 15.7656 14.07 15.7656 12C15.7656 9.93 14.0856 8.25 12.0156 8.25Z"
                                            fill="#8F96B2"/>
                                        <path
                                            d="M7.01562 12.75H2.01562C1.60563 12.75 1.26562 12.41 1.26562 12C1.26562 11.59 1.60563 11.25 2.01562 11.25H7.01562C7.42562 11.25 7.76562 11.59 7.76562 12C7.76562 12.41 7.42562 12.75 7.01562 12.75Z"
                                            fill="#8F96B2"/>
                                        <path
                                            d="M22.0156 12.75H17.0156C16.6056 12.75 16.2656 12.41 16.2656 12C16.2656 11.59 16.6056 11.25 17.0156 11.25H22.0156C22.4256 11.25 22.7656 11.59 22.7656 12C22.7656 12.41 22.4256 12.75 22.0156 12.75Z"
                                            fill="#8F96B2"/>
                                    </svg>
                                </div>
                                <span>{{__("Our Gallery")}}</span>
                            </button>
                            <span><i class="fa-solid fa-angle-right"></i></span>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link d-flex align-items-center g-12" id="faqSettings-tab"
                                    data-bs-toggle="tab" data-bs-target="#faqSettings-tab-pane" type="button"
                                    role="tab" aria-controls="faqSettings-tab-pane" aria-selected="true">
                                <div class="icon d-flex">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12.0156 17.25C9.12562 17.25 6.76562 14.9 6.76562 12C6.76562 9.1 9.12562 6.75 12.0156 6.75C14.9056 6.75 17.2656 9.1 17.2656 12C17.2656 14.9 14.9056 17.25 12.0156 17.25ZM12.0156 8.25C9.94563 8.25 8.26562 9.93 8.26562 12C8.26562 14.07 9.94563 15.75 12.0156 15.75C14.0856 15.75 15.7656 14.07 15.7656 12C15.7656 9.93 14.0856 8.25 12.0156 8.25Z"
                                            fill="#8F96B2"/>
                                        <path
                                            d="M7.01562 12.75H2.01562C1.60563 12.75 1.26562 12.41 1.26562 12C1.26562 11.59 1.60563 11.25 2.01562 11.25H7.01562C7.42562 11.25 7.76562 11.59 7.76562 12C7.76562 12.41 7.42562 12.75 7.01562 12.75Z"
                                            fill="#8F96B2"/>
                                        <path
                                            d="M22.0156 12.75H17.0156C16.6056 12.75 16.2656 12.41 16.2656 12C16.2656 11.59 16.6056 11.25 17.0156 11.25H22.0156C22.4256 11.25 22.7656 11.59 22.7656 12C22.7656 12.41 22.4256 12.75 22.0156 12.75Z"
                                            fill="#8F96B2"/>
                                    </svg>
                                </div>
                                <span>{{__("Faq")}}</span>
                            </button>
                            <span><i class="fa-solid fa-angle-right"></i></span>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link d-flex align-items-center g-12" id="testimonialsSettings-tab"
                                    data-bs-toggle="tab" data-bs-target="#testimonialsSettings-tab-pane" type="button"
                                    role="tab" aria-controls="testimonialsSettings-tab-pane" aria-selected="true">
                                <div class="icon d-flex">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12.0156 17.25C9.12562 17.25 6.76562 14.9 6.76562 12C6.76562 9.1 9.12562 6.75 12.0156 6.75C14.9056 6.75 17.2656 9.1 17.2656 12C17.2656 14.9 14.9056 17.25 12.0156 17.25ZM12.0156 8.25C9.94563 8.25 8.26562 9.93 8.26562 12C8.26562 14.07 9.94563 15.75 12.0156 15.75C14.0856 15.75 15.7656 14.07 15.7656 12C15.7656 9.93 14.0856 8.25 12.0156 8.25Z"
                                            fill="#8F96B2"/>
                                        <path
                                            d="M7.01562 12.75H2.01562C1.60563 12.75 1.26562 12.41 1.26562 12C1.26562 11.59 1.60563 11.25 2.01562 11.25H7.01562C7.42562 11.25 7.76562 11.59 7.76562 12C7.76562 12.41 7.42562 12.75 7.01562 12.75Z"
                                            fill="#8F96B2"/>
                                        <path
                                            d="M22.0156 12.75H17.0156C16.6056 12.75 16.2656 12.41 16.2656 12C16.2656 11.59 16.6056 11.25 17.0156 11.25H22.0156C22.4256 11.25 22.7656 11.59 22.7656 12C22.7656 12.41 22.4256 12.75 22.0156 12.75Z"
                                            fill="#8F96B2"/>
                                    </svg>
                                </div>
                                <span>{{__("Testimonials")}}</span>
                            </button>
                            <span><i class="fa-solid fa-angle-right"></i></span>
                        </li>
                    </ul>
                </div>
                <!-- Right -->
                <div class="right">
                    <div class="tab-content" id="myTabContent">
                        <!-- Section Settings -->
                        <div class="tab-pane fade show active" id="sectionSettings-tab-pane" role="tabpanel"
                             aria-labelledby="sectionSettings-tab" tabindex="0">
                            <div>
                                <table class="table zTable zTable-last-item-right" id="sectionConfigurationDataTable">
                                    <thead>
                                    <tr>
                                        <th>
                                            <div>{{__('Section Name')}}</div>
                                        </th>
                                        <th>
                                            <div>{{__('Custom Name')}}</div>
                                        </th>
                                        <th>
                                            <div>{{__('Title')}}</div>
                                        </th>
                                        <th>
                                            <div class="text-nowrap">{{__('Background Image')}}</div>
                                        </th>
                                        <th>
                                            <div>{{__('Status')}}</div>
                                        </th>
                                        <th>
                                            <div>{{__('Action')}}</div>
                                        </th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="aboutUsSettings-tab-pane" role="tabpanel"
                             aria-labelledby="aboutUsSettings-tab" tabindex="0">
                             <form class="ajax-request" action="{{ route('admin.setting.frontend-setting.update') }}"
                                  method="POST"
                                  enctype="multipart/form-data" data-handler="commonResponse">
                                @csrf
                                <input type="hidden" name="id" value="{{encrypt($settingData->id)}}">
                                <input type="hidden" name="about_us" value="about us update">

                                <h4 class="fs-18 fw-700 lh-24 text-main-color pb-19 mb-19 bd-b-one bd-c-stroke">{{__("About Us Update")}}</h4>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="zForm-wrap pb-20">
                                            <label for="name" class="sf-form-label">{{__("About Us Point - 1")}}</label>
                                            <input type="text" class="form-control sf-form-control sf-form-control-2"
                                                name="about_point_1" placeholder="{{__("Enter About Us Point - 1")}}"
                                                value="{{$settingData->about_point_1}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="zForm-wrap pb-20">
                                            <label for="name" class="sf-form-label">{{__("About Us Point - 2")}}</label>
                                            <input type="text" class="form-control sf-form-control sf-form-control-2"
                                                name="about_point_2" placeholder="{{__("Enter About Us Point - 2")}}"
                                                value="{{$settingData->about_point_2}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="zForm-wrap pb-20">
                                            <label for="name" class="sf-form-label">{{__("About Us Point - 3")}}</label>
                                            <input type="text" class="form-control sf-form-control sf-form-control-2"
                                                name="about_point_3" placeholder="{{__("Enter About Us Point - 3")}}"
                                                value="{{$settingData->about_point_3}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="zForm-wrap pb-20">
                                            <label for="asEmailAddress"
                                                class="sf-form-label">{{__("Video Embed Link")}}</label>
                                            <input type="link" class="form-control sf-form-control sf-form-control-2"
                                                name="about_video_link" placeholder="{{__("Video Embed Link")}}"
                                                value="{{$settingData->about_video_link}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="zForm-wrap pb-20">
                                            <label for="asEmailAddress"
                                                class="sf-form-label">{{__("Year of Experience")}}</label>
                                            <input type="number" class="form-control sf-form-control sf-form-control-2"
                                                name="about_year_of_exp" placeholder="{{__("Experience Year")}}"
                                                value="{{$settingData->about_year_of_exp}}"/>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="zForm-wrap pb-20">
                                            <label for="eInputBody" class="sf-form-label">{{__("Learn More")}}</label>
                                            <textarea name="about_learn_more" type="text"
                                                      class="form-control sf-form-control summernoteOne"
                                                      placeholder="{{__("Write Your Learn More Content")}}">{{$settingData->about_learn_more}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="zForm-wrap zImage-upload-details">
                                          <div class="zImage-inside">
                                            <div class="d-flex pb-12"><img src="assets/images/icon/cloud-upload.svg" alt="" /></div>
                                            <p class="fs-15 fw-500 lh-16 text-1b1c17">{{__('Drag & drop files here')}}</p>
                                          </div>
                                          <label for="zImageUpload" class="sf-form-label">{{__('About Right Image')}}</label>
                                          <div class="upload-img-box">
                                            <img src="{{getFileLink($settingData->about_right_image)}}" />
                                            <input type="file" name="about_right_image" id="zImageUpload" accept="image/*,video/*" onchange="previewFile(this)" />
                                          </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center cg-10 mt-15">
                                    <button type="submit" class="border-0 bd-ra-12 py-13 px-25 bg-primary-color fs-16 fw-600 lh-19 text-white">{{__("Update Now")}}</button>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="achievementSettings-tab-pane" role="tabpanel"
                             aria-labelledby="achievementSettings-tab" tabindex="0">
                             <form class="ajax-request" action="{{ route('admin.setting.frontend-setting.update') }}"
                                  method="POST" data-handler="commonResponse">
                                @csrf
                                <input type="hidden" name="id" value="{{encrypt($settingData->id)}}">

                                <h4 class="fs-18 fw-700 lh-24 text-main-color pb-19 mb-19 bd-b-one bd-c-stroke">{{__("Achievement Update")}}</h4>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="zForm-wrap pb-20">
                                            <label for="asEmailAddress"
                                                class="sf-form-label">{{__("Course Completed")}} </label>
                                            <input type="number" class="form-control sf-form-control sf-form-control-2"
                                                name="achiev_course_completed" placeholder="{{__("Experience Year")}}"
                                                value="{{$settingData->achiev_course_completed}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="zForm-wrap pb-20">
                                            <label for="asEmailAddress"
                                                class="sf-form-label">{{__("Driving Learner")}} </label>
                                            <input type="number" class="form-control sf-form-control sf-form-control-2"
                                                name="achiev_driving_learner" placeholder="{{__("Driving Learner")}}"
                                                value="{{$settingData->achiev_driving_learner}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="zForm-wrap pb-20">
                                            <label for="asEmailAddress"
                                                class="sf-form-label">{{__("Experience Instructor")}}</label>
                                            <input type="number" class="form-control sf-form-control sf-form-control-2"
                                                name="achiev_experience_instructor" placeholder="{{__("Experience Instructor")}}"
                                                value="{{$settingData->achiev_experience_instructor}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="zForm-wrap pb-20">
                                            <label for="asEmailAddress"
                                                class="sf-form-label">{{__("Award Winner")}}</label>
                                            <input type="number" class="form-control sf-form-control sf-form-control-2"
                                                name="achiev_award_winner" placeholder="{{__("Award Winner")}}"
                                                value="{{$settingData->achiev_award_winner}}"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center cg-10 mt-15">
                                    <button type="submit" class="border-0 bd-ra-12 py-13 px-25 bg-primary-color fs-16 fw-600 lh-19 text-white">{{__("Update Now")}}</button>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="ourGallerySettings-tab-pane" role="tabpanel"
                             aria-labelledby="ourGallerySettings-tab" tabindex="0">
                             <div>
                                <div class="d-flex justify-content-between align-items-center bd-b-one bd-c-stroke pb-20 mb-20">
                                    <h4 class="fs-18 fw-600 lh-18 text-main-color">{{__('Gallery List')}}</h4>
                                    <div class="">
                                        <button class="py-13 pr-15 pl-10 bd-one bd-c-primary-color bg-primary-color bd-ra-4 fs-14 fw-500 lh-14 text-white" data-bs-toggle="modal" data-bs-target="#showGalleryCategoryModal">{{__('Show Category')}}</button>
                                        <button class="py-13 pr-15 pl-10 bd-one bd-c-primary-color bg-primary-color bd-ra-4 fs-14 fw-500 lh-14 text-white" data-bs-toggle="modal" data-bs-target="#addGalleryModal">+ {{__('Add Gallery')}}</button>
                                    </div>
                                </div>
                                <table class="table zTable zTable-last-item-right" id="galleryDataTable">
                                    <thead>
                                    <tr>
                                        <th>
                                            <div>{{__('Image')}}</div>
                                        </th>
                                        <th>
                                            <div>{{__('Category Name')}}</div>
                                        </th>
                                        <th>
                                            <div>{{__('Title')}}</div>
                                        </th>
                                        <th>
                                            <div>{{__('Status')}}</div>
                                        </th>
                                        <th>
                                            <div>{{__('Action')}}</div>
                                        </th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="faqSettings-tab-pane" role="tabpanel"
                             aria-labelledby="faqSettings-tab" tabindex="0">
                             <div>
                                <div class="d-flex justify-content-between align-items-center bd-b-one bd-c-stroke pb-20 mb-20">
                                    <h4 class="fs-18 fw-600 lh-18 text-main-color">{{__('Faq List')}}</h4>
                                    <button class="py-13 pr-15 pl-10 bd-one bd-c-primary-color bg-primary-color bd-ra-4 fs-14 fw-500 lh-14 text-white" data-bs-toggle="modal" data-bs-target="#addFaqModal">+ {{__('Add Faq')}}</button>
                                </div>
                                <table class="table zTable zTable-last-item-right" id="faqDataTable">
                                    <thead>
                                    <tr>
                                        <th>
                                            <div>{{__('Title')}}</div>
                                        </th>
                                        <th>
                                            <div>{{__('Status')}}</div>
                                        </th>
                                        <th>
                                            <div>{{__('Action')}}</div>
                                        </th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="testimonialsSettings-tab-pane" role="tabpanel"
                             aria-labelledby="testimonialsSettings-tab" tabindex="0">
                             <div>
                                <div class="d-flex justify-content-between align-items-center bd-b-one bd-c-stroke pb-20 mb-20">
                                    <h4 class="fs-18 fw-600 lh-18 text-main-color">{{__('Testimonial List')}}</h4>
                                    <button class="py-13 pr-15 pl-10 bd-one bd-c-primary-color bg-primary-color bd-ra-4 fs-14 fw-500 lh-14 text-white" data-bs-toggle="modal" data-bs-target="#addTestimonialModal">+ {{__('Add Testimonial')}}</button>
                                </div>
                                <table class="table zTable zTable-last-item-right" id="testimonialDataTable">
                                    <thead>
                                    <tr>
                                        <th>
                                            <div>{{__('Image')}}</div>
                                        </th>
                                        <th>
                                            <div>{{__('Student Name')}}</div>
                                        </th>
                                        <th>
                                            <div>{{__('Title')}}</div>
                                        </th>
                                        <th>
                                            <div>{{__('Status')}}</div>
                                        </th>
                                        <th>
                                            <div>{{__('Action')}}</div>
                                        </th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Edit Section Settings -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="addRoleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content border-0 bd-ra-4 p-20">

            </div>
        </div>
    </div>

     <!-- Add Faq Modal  -->
     <div class="modal fade" id="addFaqModal" tabindex="-1" aria-labelledby="addFaqModal" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
          <div class="modal-content border-0 bd-ra-4 p-20">
            <!-- Top -->
            <div class="d-flex justify-content-between align-items-center bd-b-one bd-c-stroke pb-20 mb-20">
              <h4 class="fs-18 fw-600 lh-18 text-main-color">{{__('Add Faq')}}</h4>
              <button type="button" class="border-0 p-0 bg-transparent text-para-text" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i></button>
            </div>
            <!--  -->
            <form class="ajax-request reset" action="{{route('admin.setting.frontend-setting.faq.store')}}" method="POST"
            data-handler="commonResponse">
            @csrf
              <div class="row rg-20 pb-25">
                <div class="col-12">
                  <label for="addRoleName" class="sf-form-label">{{__('Title')}} <span class="text-red">*</span></label>
                  <input type="text" name="title" class="form-control sf-form-control" placeholder="{{__('Enter Faq Title')}}" />
                </div>
                <div class="col-12">
                    <label for="addRoleName" class="sf-form-label">{{__('Description')}} <span class="text-red">*</span></label>
                    <textarea name="description" type="text"
                    class="form-control sf-form-control" placeholder="{{__("Write your description")}}"></textarea>                </div>
                <div class="col-12">
                  <label for="addRoleStatus" class="sf-form-label">{{__('Status')}}</label>
                  <select class="sf-select-without-search" name="status">
                    <option value="{{STATUS_ACTIVE}}">{{__("Active")}}</option>
                    <option value="{{STATUS_DEACTIVATE}}">{{__('Deactive')}}</option>
                  </select>
                </div>
              </div>
              <div class="bd-t-one bd-c-stroke pt-17 d-flex g-10">
                <button type="button" data-bs-dismiss="modal" aria-label="Close" class="py-13 px-20 bd-one bd-ra-4 bd-c-main-color bg-white text-main-color fs-14 fw-600 lh-14">{{__('Cancel')}}</button>
                <button type="submit" class="py-13 px-20 bd-one bd-ra-4 bd-c-primary-color bg-primary-color text-white fs-14 fw-600 lh-14">{{__('Save')}}</button>
              </div>
            </form>
          </div>
        </div>
    </div>

    <!-- show Gallry Category Modal  -->
    <div class="modal fade" id="showGalleryCategoryModal" tabindex="-1" aria-labelledby="showGalleryCategoryModal" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 bd-ra-4 p-20">
                <!-- Top -->
                <div class="d-flex justify-content-between border-0 align-items-center bd-b-one bd-c-stroke pb-20 mb-20">
                    <div class=""></div>
                    <button type="button" class="border-0 p-0 bg-transparent text-para-text" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i></button>
                </div>
                <div>
                    <div class="d-flex justify-content-between align-items-center bd-b-one bd-c-stroke pb-20 mb-20">
                        <h4 class="fs-18 fw-600 lh-18 text-main-color">{{__('Category List')}}</h4>
                        <button class="py-13 pr-15 pl-10 bd-one bd-c-primary-color bg-primary-color bd-ra-4 fs-14 fw-500 lh-14 text-white" data-bs-toggle="modal" data-bs-target="#addGalleryCategoryModal">+ {{__('Add Category')}}</button>
                    </div>
                    <table class="table zTable zTable-last-item-right" id="galleryCategoryDataTable">
                        <thead>
                            <tr>
                                <th>
                                    <div>{{__('Category Name')}}</div>
                                </th>
                                <th>
                                    <div>{{__('Status')}}</div>
                                </th>
                                <th>
                                    <div>{{__('Action')}}</div>
                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Add gallery category Modal  -->
    <div class="modal fade" id="addGalleryCategoryModal" tabindex="-1" aria-labelledby="addGalleryCategoryModal" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
          <div class="modal-content border-0 bd-ra-4 p-20">
            <!-- Top -->
            <div class="d-flex justify-content-between align-items-center bd-b-one bd-c-stroke pb-20 mb-20">
              <h4 class="fs-18 fw-600 lh-18 text-main-color">{{__('Add Faq')}}</h4>
              <button type="button" class="border-0 p-0 bg-transparent text-para-text" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i></button>
            </div>
            <!--  -->
            <form class="ajax-request reset" action="{{route('admin.setting.frontend-setting.gallery-category.store')}}" method="POST"
            data-handler="commonResponse">
            @csrf
              <div class="row rg-20 pb-25">
                <div class="col-12">
                  <label for="addRoleName" class="sf-form-label">{{__('Category Name')}} <span class="text-red">*</span></label>
                  <input type="text" name="category_name" class="form-control sf-form-control" placeholder="{{__('Enter Category Name')}}" />
                </div>
                <div class="col-12">
                  <label for="addRoleStatus" class="sf-form-label">{{__('Status')}}</label>
                  <select class="sf-select-without-search" name="status">
                    <option value="{{STATUS_ACTIVE}}">{{__("Active")}}</option>
                    <option value="{{STATUS_DEACTIVATE}}">{{__('Deactive')}}</option>
                  </select>
                </div>
              </div>
              <div class="bd-t-one bd-c-stroke pt-17 d-flex g-10">
                <button type="button" data-bs-dismiss="modal" aria-label="Close" class="py-13 px-20 bd-one bd-ra-4 bd-c-main-color bg-white text-main-color fs-14 fw-600 lh-14">{{__('Cancel')}}</button>
                <button type="submit" class="py-13 px-20 bd-one bd-ra-4 bd-c-primary-color bg-primary-color text-white fs-14 fw-600 lh-14">{{__('Save')}}</button>
              </div>
            </form>
          </div>
        </div>
    </div>

    <!-- Add Gallry Modal  -->
    <div class="modal fade" id="addGalleryModal" tabindex="-1" aria-labelledby="addGalleryModal" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content border-0 bd-ra-4 p-20">
                <!-- Top -->
                <div class="d-flex justify-content-between align-items-center bd-b-one bd-c-stroke pb-20 mb-20">
                    <h4 class="fs-18 fw-600 lh-18 text-main-color">{{__('Add Gallery')}}</h4>
                    <button type="button" class="border-0 p-0 bg-transparent text-para-text" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i></button>
                </div>
                <!--  -->
                <form class="ajax-request reset" action="{{route('admin.setting.frontend-setting.gallery.store')}}" method="POST"
                data-handler="commonResponse">
                @csrf
                <div class="row rg-20 pb-25">
                    <div class="col-12">
                        <label for="addRoleName" class="sf-form-label">{{__('Title')}} <span class="text-red">*</span></label>
                        <input type="text" name="title" class="form-control sf-form-control" placeholder="{{__('Enter Faq Title')}}" />
                    </div>
                    <div class="col-12 existingStudent">
                        <label for="addRoleStatus" class="sf-form-label">{{__('Category')}} <span class="text-red">*</span></label>
                        <select class="sf-select-without-search" name="category_id">
                        <option value="">{{__("Select Category")}}</option>
                        @foreach ($galleryCategory as $data)
                            <option value="{{$data->id}}">{{$data->category_name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <div class="zForm-wrap zImage-upload-details pt-20">
                        <div class="zImage-inside">
                            <div class="d-flex pb-12"><img src="assets/images/icon/cloud-upload.svg" alt="" /></div>
                            <p class="fs-15 fw-500 lh-16 text-1b1c17">{{__('Drag & drop files here')}}</p>
                        </div>
                        <label for="zImageUpload" class="sf-form-label">{{__('Gallery Image')}} <span class="text-red">*</span></label>
                        <div class="upload-img-box">
                            <img src="" />
                            <input type="file" name="image" id="zImageUpload" accept="image/*,video/*" onchange="previewFile(this)" />
                        </div>
                        </div>
                    </div>
                    <div class="col-12">
                    <label for="addRoleStatus" class="sf-form-label">{{__('Status')}}</label>
                    <select class="sf-select-without-search" name="status">
                        <option value="{{STATUS_ACTIVE}}">{{__("Active")}}</option>
                        <option value="{{STATUS_DEACTIVATE}}">{{__('Deactive')}}</option>
                    </select>
                    </div>
                </div>
                <div class="bd-t-one bd-c-stroke pt-17 d-flex g-10">
                    <button type="button" data-bs-dismiss="modal" aria-label="Close" class="py-13 px-20 bd-one bd-ra-4 bd-c-main-color bg-white text-main-color fs-14 fw-600 lh-14">{{__('Cancel')}}</button>
                    <button type="submit" class="py-13 px-20 bd-one bd-ra-4 bd-c-primary-color bg-primary-color text-white fs-14 fw-600 lh-14">{{__('Save')}}</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add testimonial Modal  -->
    <div class="modal fade" id="addTestimonialModal" tabindex="-1" aria-labelledby="addTestimonialModal" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
          <div class="modal-content border-0 bd-ra-4 p-20">
            <!-- Top -->
            <div class="d-flex justify-content-between align-items-center bd-b-one bd-c-stroke pb-20 mb-20">
              <h4 class="fs-18 fw-600 lh-18 text-main-color">{{__('Add Testimonial')}}</h4>
              <button type="button" class="border-0 p-0 bg-transparent text-para-text" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i></button>
            </div>
            <!--  -->
            <form class="ajax-request reset" action="{{route('admin.setting.frontend-setting.testimonial.store')}}" method="POST"
            data-handler="commonResponse" enctype="multipart/form-data">
            @csrf
              <div class="row rg-20 pb-25">
                <div class="col-12">
                    <label for="addRoleName" class="sf-form-label">{{__('Quotation Text')}}</label>
                    <input type="text" name="quotation_text" class="form-control sf-form-control" placeholder="{{__('Enter Quotation Text')}}" />
                </div>
                <div class="col-12">
                  <label for="addRoleName" class="sf-form-label">{{__('Title')}} <span class="text-red">*</span></label>
                  <input type="text" name="title" class="form-control sf-form-control" placeholder="{{__('Enter Faq Title')}}" />
                </div>
                <div class="col-12">
                    <label for="addRoleName" class="sf-form-label">{{__('Comment')}} <span class="text-red">*</span></label>
                    <textarea name="comment" type="text"
                    class="form-control sf-form-control" placeholder="{{__("Write your comment")}}"></textarea>
                </div>
                <div class="d-flex g-28">
                     <div class="form-check">
                        <input type="radio" name="student_type" value="1" checked class="studentType form-check-input zForm-all-checkbox h-20 w-20 mt-2 border-dark">
                        <label class="form-check-label" for="flexRadioDefault1">
                          {{__('Existing Student')}}
                        </label>
                      </div>
                      <div class="form-check">
                        <input type="radio" name="student_type" value="2" class="studentType form-check-input zForm-all-checkbox h-20 w-20 mt-2 border-dark">
                        <label class="form-check-label" for="flexRadioDefault2">
                            {{__('Custom Student')}}
                        </label>
                      </div>
                </div>

                <div class="col-12 existingStudent">
                    <label for="addRoleStatus" class="sf-form-label">{{__('Student')}} <span class="text-red">*</span></label>
                    <select class="sf-select-without-search" name="student_id">
                      <option value="">{{__("Select Student")}}</option>
                      @foreach ($allStudent as $student)
                        <option value="{{$student->id}}">{{$student->name}}</option>
                      @endforeach
                    </select>
                </div>

                <div class="customStudent">
                    <div class="col-12">
                        <label for="addRoleName" class="sf-form-label">{{__('Name')}} <span class="text-red">*</span></label>
                        <input type="text" name="name" class="form-control sf-form-control" placeholder="{{__('Enter Name')}}" />
                    </div>
                    <div class="col-12">
                        <div class="zForm-wrap zImage-upload-details pt-20">
                          <div class="zImage-inside">
                            <div class="d-flex pb-12"><img src="assets/images/icon/cloud-upload.svg" alt="" /></div>
                            <p class="fs-15 fw-500 lh-16 text-1b1c17">{{__('Drag & drop files here')}}</p>
                          </div>
                          <label for="zImageUpload" class="sf-form-label">{{__('Image')}}</label>
                          <div class="upload-img-box">
                            <img src="" />
                            <input type="file" name="image" id="zImageUpload" accept="image/*,video/*" onchange="previewFile(this)" />
                          </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                  <label for="addRoleStatus" class="sf-form-label">{{__('Status')}}</label>
                  <select class="sf-select-without-search" name="status">
                    <option value="{{STATUS_ACTIVE}}">{{__("Active")}}</option>
                    <option value="{{STATUS_DEACTIVATE}}">{{__('Deactive')}}</option>
                  </select>
                </div>
              </div>
              <div class="bd-t-one bd-c-stroke pt-17 d-flex g-10">
                <button type="button" data-bs-dismiss="modal" aria-label="Close" class="py-13 px-20 bd-one bd-ra-4 bd-c-main-color bg-white text-main-color fs-14 fw-600 lh-14">{{__('Cancel')}}</button>
                <button type="submit" class="py-13 px-20 bd-one bd-ra-4 bd-c-primary-color bg-primary-color text-white fs-14 fw-600 lh-14">{{__('Save')}}</button>
              </div>
            </form>
          </div>
        </div>
    </div>

    <input type="hidden" id="section-setting-route" value="{{route('admin.setting.frontend-setting.section-configuration.list')}}">
    <input type="hidden" id="faq-route" value="{{route('admin.setting.frontend-setting.faq.list')}}">
    <input type="hidden" id="testimonial-route" value="{{route('admin.setting.frontend-setting.testimonial.list')}}">
    <input type="hidden" id="gallery-category-route" value="{{route('admin.setting.frontend-setting.gallery-category.list')}}">
    <input type="hidden" id="gallery-list-route" value="{{route('admin.setting.frontend-setting.gallery.list')}}">


@endsection

@push('script')
    <script src="{{ asset('assets/custom/admin/js/section-configuration.js') }}"></script>
    <script src="{{ asset('assets/custom/admin/js/faq.js') }}"></script>
    <script src="{{ asset('assets/custom/admin/js/testimonial.js') }}"></script>
    <script src="{{ asset('assets/custom/admin/js/gallery-category.js') }}"></script>
    <script src="{{ asset('assets/custom/admin/js/gallery.js') }}"></script>
@endpush

