@extends('layouts.app')
@push('title')
   {{$pageTitle}}
@endpush

@section('content')
    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">
        <div class="p-sm-30 p-15 bd-one bd-c-stroke bd-ra-10 bg-white">
            <!-- Client Information -->
            <div class="right">
                <div class="tab-content" id="myTabContent">
                    <!-- Account Settings -->
                    <div class="tab-pane fade show active p-30 rounded-3">
                        <div class="d-flex justify-content-between align-items-center pb-19 mb-19 border-bottom border-light-subtle">
                            <h4 class="fs-18 fw-700 lh-24 text-main-color ">{{$pageTitle}}</h4>
                            <div>
                                <a href="{{route('instructor.student.list')}}" class="ml-10 py-10 px-20 bd-one bd-ra-4 bd-c-main-color bg-white text-main-color fs-14 fw-600 d-flex align-items-center">
                                    <i class="fa-solid fa-long-arrow-left mr-10"></i>
                                    {{__('Back')}}
                                </a>
                            </div>
                        </div>
                        <!-- Photo -->
                        <div class="pb-30">
                            <div class="upload-img-box profileImage-upload">
                                <img src="{{getFileLink($student->picture)}}">
                            </div>
                        </div>

                        <!-- details -->
                        <div class="row pt-15">
                            <div class="col-2"><strong>{{__('Name:')}}</strong></div>
                            <div class="col-10">{{$student->name ? $student->name : __('N/A')}}</div>
                        </div>
                        <div class="row pt-15">
                            <div class="col-2"><strong>{{__('Email:')}}</strong></div>
                            <div class="col-10">{{$student->email ? $student->email : __('N/A')}}</div>
                        </div>
                        <div class="row pt-15">
                            <div class="col-2"><strong>{{__('Phone:')}}</strong></div>
                            <div class="col-10">{{$student->phone ? $student->phone : __('N/A')}}</div>
                        </div>
                        <div class="row pt-15">
                            <div class="col-2"><strong>{{__('Date of Birth:')}}</strong></div>
                            <div class="col-10">
                                {{$student->dob ? \Carbon\Carbon::createFromFormat('Y-m-d', $student->dob)->format('d-m-Y') : __('N/A')}}
                            </div>

                        </div>
                        <div class="row pt-15">
                            <div class="col-2"><strong>{{__('Gender:')}}</strong></div>
                            <div class="col-10">
                                @if ($student->gender == GENDER_MALE)
                                    {{__('Male')}}
                                @elseif($student->gender == GENDER_FEMALE)
                                    {{__('Female')}}
                                @elseif($student->gender == GENDER_OTHERS)
                                    {{__('Others')}}
                                @else
                                    {{__('N/A')}}
                                @endif
                            </div>
                        </div>
                        <div class="row pt-15">
                            <div class="col-2"><strong>{{__('City:')}}</strong></div>
                            <div class="col-10">{{$student->city ? $student->city : __('N/A')}}</div>
                        </div>
                        <div class="row pt-15">
                            <div class="col-2"><strong>{{__('State:')}}</strong></div>
                            <div class="col-10">{{$student->state ? $student->state :__('N/A')}}</div>
                        </div>
                        <div class="row pt-15">
                            <div class="col-2"><strong>{{__('Zip Code:')}}</strong></div>
                            <div class="col-10">{{$student->zip ? $student->zip : __('N/A')}}</div>
                        </div>
                        <div class="row pt-15">
                            <div class="col-2"><strong>{{__('Country:')}}</strong></div>
                            <div class="col-10">{{$student->country ? $student->country : __('N/A')}}</div>
                        </div>
                        <div class="row pt-15">
                            <div class="col-2"><strong>{{__('Address:')}}</strong></div>
                            <div class="col-10">{{$student->address ? $student->address : __('N/A')}}</div>
                        </div>
                        <div class="row pt-15">
                            <div class="col-2"><strong>{{__('Created Date:')}}</strong></div>
                            <div class="col-10">{{$student->created_at ? $student->created_at->format('d/m/Y') : __('N/A')}}</div>
                        </div>
                        <div class="row pt-15">
                            <div class="col-2"><strong>{{__('Updated Date:')}}</strong></div>
                            <div class="col-10">{{$student->updated_at ? $student->updated_at->format('d/m/Y') : __('N/A')}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

