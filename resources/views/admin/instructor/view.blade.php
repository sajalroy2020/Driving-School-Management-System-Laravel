@extends('layouts.app')
@push('title')
    {{$pageTitle}}
@endpush

@section('content')
    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">
        <!-- Details -->
        <div class="row rg-15">
            <div class="col-xl-3 col-md-4">
                <div class="p-sm-25 p-15 bg-white bd-one bd-c-stroke bd-ra-10">
                    <h4 class="fs-18 fw-400 lh-22 text-main-color pb-16 mb-16 bd-b-one bd-c-stroke">{{__("User Info")}}</h4>
                    <ul class="zList-pb-17">
                        <li>
                            <h4 class="fs-14 fw-400 lh-17 text-main-color pb-7">{{__("Picture")}}:</h4>
                            <div class="multiImages-third">
                                <img class="border-1 h-auto w-auto max-w-150 border-black rounded-5"
                                     src="{{getFileLink($instructor->picture)}}" alt="{{__("Profile Picture")}}"/>
                            </div>
                        </li>
                        <li>
                            <h4 class="fs-14 fw-400 lh-17 text-main-color pb-7">{{__("Role")}}:</h4>
                            <p class="fs-12 fw-400 lh-15 text-para-text">
                                @if($instructor->role == USER_ROLE_STUDENT)
                                    {{__("Student")}}
                                @elseif($instructor->role == USER_ROLE_INSTRUCTOR)
                                    {{__("Instructor")}}
                                @elseif($instructor->role == USER_ROLE_STAFF)
                                    {{__("Staff")}}
                                @elseif($instructor->role == USER_ROLE_ADMIN)
                                    {{__("Admin")}}
                                @else
                                    {{"N/A"}}
                                @endif
                            </p>
                        </li>
                        <li>
                            <h4 class="fs-14 fw-400 lh-17 text-main-color pb-7">{{__("Name")}}:</h4>
                            <p class="fs-12 fw-400 lh-15 text-para-text">{{$instructor->name}}</p>
                        </li>
                        <li>
                            <h4 class="fs-14 fw-400 lh-17 text-main-color pb-7">{{__("Email")}}:</h4>
                            <p class="fs-12 fw-400 lh-15 text-para-text">{{$instructor->email}}</p>
                        </li>
                        <li>
                            <h4 class="fs-14 fw-400 lh-17 text-main-color pb-7">{{__("Phone")}}:</h4>
                            <p class="fs-12 fw-400 lh-15 text-para-text">{{$instructor->phone}}</p>
                        </li>
                        <li>
                            <h4 class="fs-14 fw-400 lh-17 text-main-color pb-7">{{__("Gender")}}:</h4>
                            <p class="fs-12 fw-400 lh-15 text-para-text">
                                @if($instructor->gender == GENDER_MALE)
                                    {{__("Male")}}
                                @elseif($instructor->gender == GENDER_FEMALE)
                                    {{__("Female")}}
                                @else
                                    {{__("Others")}}
                                @endif
                            </p>
                        </li>
                        <li>
                            <h4 class="fs-14 fw-400 lh-17 text-main-color pb-7">{{__("Date of Birth")}}:</h4>
                            <p class="fs-12 fw-400 lh-15 text-para-text">{{$instructor->dob}}</p>
                        </li>
                        <li>
                            <h4 class="fs-14 fw-400 lh-17 text-main-color pb-7">{{__("City")}}:</h4>
                            <p class="fs-12 fw-400 lh-15 text-para-text">{{$instructor->city??'N/A'}}</p>
                        </li>
                        <li>
                            <h4 class="fs-14 fw-400 lh-17 text-main-color pb-7">{{__("State")}}:</h4>
                            <p class="fs-12 fw-400 lh-15 text-para-text">{{$instructor->state??'N/A'}}</p>
                        </li>
                        <li>
                            <h4 class="fs-14 fw-400 lh-17 text-main-color pb-7">{{__("Zip")}}:</h4>
                            <p class="fs-12 fw-400 lh-15 text-para-text">{{$instructor->zip??'N/A'}}</p>
                        </li>
                        <li>
                            <h4 class="fs-14 fw-400 lh-17 text-main-color pb-7">{{__("Country")}}:</h4>
                            <p class="fs-12 fw-400 lh-15 text-para-text">{{$instructor->country??'N/A'}}</p>
                        </li>
                        <li>
                            <h4 class="fs-14 fw-400 lh-17 text-main-color pb-7">{{__("Address")}}:</h4>
                            <p class="fs-12 fw-400 lh-15 text-para-text">{{$instructor->address}}</p>
                        </li>
                        <li>
                            <h4 class="fs-14 fw-400 lh-17 text-main-color pb-7">{{__("Driving License Number")}}:</h4>
                            <p class="fs-12 fw-400 lh-15 text-para-text">{{$instructor->instructor->license_number??'N/A'}}</p>
                        </li>
                        <li>
                            <h4 class="fs-14 fw-400 lh-17 text-main-color pb-7">{{__("Driving Experience")}}:</h4>
                            <p class="fs-12 fw-400 lh-15 text-para-text">{{$instructor->instructor->driving_experience??'N/A'}}</p>
                        </li>
                        <li>
                            <h4 class="fs-14 fw-400 lh-17 text-main-color pb-7">{{__("Educational Qualification")}}:</h4>
                            <p class="fs-12 fw-400 lh-15 text-para-text">{{$instructor->instructor->educational_qualification??'N/A'}}</p>
                        </li>
                    </ul>
                </div>
                <div class="p-sm-25 p-15 bg-white bd-one bd-c-stroke bd-ra-10 mt-20">
                    <h4 class="fs-18 fw-400 lh-22 text-main-color pb-16 mb-16 bd-b-one bd-c-stroke">{{__("Emergency Contact")}}</h4>
                    <ul class="zList-pb-17">
                        <li>
                            <h4 class="fs-14 fw-400 lh-17 text-main-color pb-7">{{__("Name:")}}:</h4>
                            <p class="fs-12 fw-400 lh-15 text-para-text">{{$instructor->instructor !=null?$instructor->instructor->contact_person:'N/A'}}</p>
                        </li>
                        <li>
                            <h4 class="fs-14 fw-400 lh-17 text-main-color pb-7">{{__("Phone:")}}:</h4>
                            <p class="fs-12 fw-400 lh-15 text-para-text">{{$instructor->instructor !=null?$instructor->instructor->contact_phone:'N/A'}}</p>
                        </li>
                        <li>
                            <h4 class="fs-14 fw-400 lh-17 text-main-color pb-7">{{__("Relation:")}}
                                :</h4>
                            <p class="fs-12 fw-400 lh-15 text-para-text">{{$instructor->instructor !=null?$instructor->instructor->contact_relation:'N/A'}}</p>
                        </li>
                        <li>
                            <h4 class="fs-14 fw-400 lh-17 text-main-color pb-7">{{__("Address:")}}
                                :</h4>
                            <p class="fs-12 fw-400 lh-15 text-para-text">{{$instructor->instructor !=null?$instructor->instructor->contact_address:'N/A'}}</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-9 col-md-8">
                <div class="p-sm-25 p-15 bg-white bd-one bd-c-stroke bd-ra-10">
                    <h4 class="fs-18 fw-400 lh-22 text-main-color pb-11">{{__("Necessary Document")}}</h4>
                    <table class="table zTable zTable-last-item-right mt-12" id="userDocumentListTable">
                        <thead>
                        <tr>
                            <th>
                                <div class="text-nowrap">{{__("Document Type")}}</div>
                            </th>
                            <th>
                                <div class="text-nowrap">{{__("Document Name")}}</div>
                            </th>
                            <th>
                                <div class="text-nowrap">{{__("File")}}</div>
                            </th>
                        </tr>
                        </thead>
                    </table>
                </div>

                <div class="p-sm-25 p-15 bg-white bd-one bd-c-stroke bd-ra-10 mt-20">
                    <h4 class="fs-18 fw-400 lh-22 text-main-color pb-11">{{__("Activity Log")}}</h4>
                    <table class="table zTable zTable-last-item-right mt-12" id="userActivityLogTable">
                        <thead>
                        <tr>
                            <th>
                                <div class="text-nowrap">{{__("Activity")}}</div>
                            </th>
                            <th>
                                <div class="text-nowrap">{{__("Source")}}</div>
                            </th>
                            <th>
                                <div class="text-nowrap">{{__("IP Address")}}</div>
                            </th>
                            <th>
                                <div class="text-nowrap">{{__("Location")}}</div>
                            </th>
                            <th>
                                <div class="text-nowrap">{{__("DateTime")}}</div>
                            </th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="user-document-list-route" value="{{route('admin.common.user-document-list')}}">
    <input type="hidden" id="user-activity-log-route" value="{{route('admin.common.user-activity-log')}}">
    <input type="hidden" id="user-id" value="{{encrypt($instructor->id)}}">
@endsection
@push('script')
    <script src="{{asset('assets/custom/admin/js/instructor.js')}}"></script>
@endpush

