@extends('layouts.app')
@push('title')
    {{$pageTitle}}
@endpush

@section('content')
    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">
        <div class="row rg-20">
            <div class="col-12">
                <div class="bd-ra-15 bg-white p-sm-30 p-15 mb-30">
                    <div
                        class="d-flex justify-content-between align-items-center flex-wrap g-10 pb-20 mb-20 bd-b-one bd-c-stroke">
                        <div>
                            <a href="{{ route('admin.event.index') }}" class="ml-10 py-10 px-20 bd-one bd-ra-4 bd-c-main-color bg-white text-main-color fs-14 fw-600 d-flex align-items-center">
                                <i class="fa-solid fa-long-arrow-left mr-10"></i>
                                {{__('Back')}}
                            </a>
                        </div>
                        <div class="d-flex align-items-center">
                            <button class="py-10 px-20 bd-one bd-c-primary-color bg-primary-color bd-ra-4 fs-14 fw-500 lh-14 text-white d-flex justify-content-center align-items-center g-8"
                                data-bs-toggle="modal" data-bs-target="#edit-modal">
                                <i class="fa-solid fa-pen"></i>
                                <p class="fs-14 fw-500 lh-19 text-white text-nowrap">{{ __("Edit")}}</p>
                            </button>
                            <button
                            onclick="deleteCommonMethod('{{route('admin.event.delete', encrypt($event->id))}}' , 'no','{{route('admin.event.index')}}')"
                            class="ml-10 py-10 px-20 bd-one bd-ra-4 bd-c-main-color bg-white text-main-color fs-14 fw-600 d-flex align-items-center">
                                <i class="fa-solid fa-trash text-danger"></i>
                                <p class="fs-14 fw-500 lh-19 text-red text-nowrap pl-10">{{ __("Delete")}}</p>
                            </button>
                        </div>
                    </div>
                    <div class="">
                        <h4 class="fs-18 fw-600 lh-18 text-main-color">{{$event->event_title}}</h4>
                        <p class="fs-14 fw-400 lh-24 text-green d-flex align-items-end gap-2"><i class="fa-solid fa-location-dot fs-21 pt-10 text-body-secondary"></i>{{$event->location}}</p>
                        <p class="fs-14 fw-400 lh-24 text-green pb-14 d-flex align-items-end gap-2"><i class="fa-solid fa-calendar fs-19 mb-3 text-body-secondary"></i> <span class="pt-10">{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',
                            $event->date_time)->format('jS F, h:i:s A')}}</span></p>
                        <div class="row rg-20">
                            <div class="col-12">
                                <div class="h-100 bd-ra-4 overflow-hidden">
                                    <img src="{{getFileLink($event->image)}}" alt="" class="w-100 h-100 object-fit-cover">
                                </div>
                            </div>
                        </div>
                        <p class="fs-14 fw-400 lh-24 text-para-text pb-14">{!! $event->description !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Add event model --}}
    <div class="modal fade" id="edit-modal" tabindex="-1" aria-labelledby="addRoleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content border-0 bd-ra-4 p-20">
                <!-- Top -->
                <div class="d-flex justify-content-between align-items-center bd-b-one bd-c-stroke pb-20 mb-20">
                    <h4 class="fs-18 fw-600 lh-18 text-main-color">{{__('Add Event')}}</h4>
                    <button type="button" class="border-0 p-0 bg-transparent text-para-text" data-bs-dismiss="modal"
                            aria-label="Close"><i class="fa-solid fa-times"></i></button>
                </div>
                <!--  -->
                <form class="ajax-request reset" action="{{route('admin.event.store')}}" method="POST"
                      enctype="multipart/form-data" data-handler="responseWithPageLoad">
                    @csrf
                    <input type="hidden" name="id" value="{{encrypt($event->id)}}">

                    <div class="row pb-25">
                        <div class="zForm-wrap pb-20">
                            <label for="noticeTitle" class="sf-form-label">{{__('Event Title')}} <span
                                    class="text-red">*</span></label>
                            <input value="{{$event->event_title}}" type="text" name="event_title" class="form-control sf-form-control" id="eventTitle"
                                   placeholder="{{__("Event Title")}}"/>
                        </div>
                        <div class="zForm-wrap pb-20">
                            <label for="noticeTitle" class="sf-form-label">{{__('Date Time')}} <span
                                    class="text-red">*</span></label>
                            <input value="{{$event->date_time}}" type="date_time" name="date_time" class="form-control sf-form-control" id="dateTime"
                                   placeholder="{{__("Event Date Time")}}"/>
                        </div>
                        <div class="zForm-wrap pb-20">
                            <label for="noticeTitle" class="sf-form-label">{{__('Event Location')}} <span
                                    class="text-red">*</span></label>
                            <input value="{{$event->location}}" type="text" name="location" class="form-control sf-form-control" id="location"
                                   placeholder="{{__("Event Location")}}"/>
                        </div>
                        <div class="zForm-wrap pb-20">
                            <label for="eInputBody" class="sf-form-label">{{__("Description")}}</label>
                            <textarea name="description" type="text"
                                      class="form-control sf-form-control summernoteOne" id="eInputBody"
                                      placeholder="{{__("Write your notice content")}}">{{$event->description}}</textarea>
                        </div>
                        <div class="col-12">
                            <div class="zForm-wrap zImage-upload-details">
                              <div class="zImage-inside">
                                <div class="d-flex pb-12"><img src="assets/images/icon/cloud-upload.svg" alt="" /></div>
                                <p class="fs-15 fw-500 lh-16 text-1b1c17">{{__('Drag & drop files here')}}</p>
                              </div>
                              <label for="zImageUpload" class="sf-form-label">{{__('Add Image')}}</label>
                              <div class="upload-img-box">
                                <img src="{{getFileLink($event->image)}}" />
                                <input type="file" name="image" id="zImageUpload" accept="image/*,video/*" onchange="previewFile(this)" />
                              </div>
                            </div>
                        </div>
                        <div class="zForm-wrap pb-20">
                            <label for="addRoleStatus" class="sf-form-label">{{__('Status')}}</label>
                            <select class="sf-select-without-search" name="status">
                                <option {{$event->status == STATUS_ACTIVE ? 'selected' : ''}} value="{{STATUS_ACTIVE}}">{{__("Active")}}</option>
                                <option {{$event->status == STATUS_DEACTIVATE ? 'selected' : ''}} value="{{STATUS_DEACTIVATE}}">{{__('Deactivate')}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="bd-t-one bd-c-stroke pt-17 d-flex g-10">
                        <button type="button" data-bs-dismiss="modal" aria-label="Close"
                                class="py-13 px-20 bd-one bd-ra-4 bd-c-main-color bg-white text-main-color fs-14 fw-600 lh-14">{{__('Cancel')}}</button>
                        <button type="submit"
                                class="py-13 px-20 bd-one bd-ra-4 bd-c-primary-color bg-primary-color text-white fs-14 fw-600 lh-14">{{__('Save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <input type="hidden" id="event-list-route" value="{{route('admin.event.index')}}">
@endsection

@push('script')
    <script src="{{asset('assets/custom/admin/js/event.js')}}"></script>
@endpush
