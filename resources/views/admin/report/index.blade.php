@extends('layouts.app')
@push('title')
    {{$pageTitle}}
@endpush

@section('content')
    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">
        <div class="row rg-20">
            <div class="col-12">
                <div class="bd-ra-15 bg-white p-sm-30 p-15 mb-30">
                    <!-- Top -->
                    <div class="d-flex justify-content-between align-items-center bd-b-one bd-c-stroke pb-20 mb-20">
                        <h4 class="fs-18 fw-600 lh-18 text-main-color">{{__('Generate Report')}}</h4>
                    </div>
                    <!--  -->
                    <form class="ajax-request" action="{{route('admin.report.generation')}}" method="POST"
                          data-handler="reportGenerationResponse">
                        @csrf
                        <div class="row rg-20 pb-25">
                            <div
                                class="d-flex justify-content-center justify-content-md-start justify-content-xxl-center align-items-center align-self-stretch flex-wrap flex-md-nowrap g-10 flex-grow-1">
                                <div class="align-items-center align-self-stretch bd-ra-8 flex-grow-1 max-w-190">
                                    <select class="sf-select-without-search" name="module_name" id="module_name">
                                        <option value="">{{__("Select Module")}}</option>
                                        @foreach(moduleList() as $key=>$module)
                                            <option value="{{$key}}">{{__($module)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="align-items-center align-self-stretch bd-ra-8 flex-grow-1 max-w-190">
                                    <select class="sf-select-without-search" name="duration" id="duration">
                                        <option value="{{REPORT_DURATION_ALL}}">{{__('All')}}</option>
                                        <option value="{{REPORT_DURATION_MONTHLY}}">{{__('Monthly')}}</option>
                                        <option value="{{REPORT_DURATION_YEARLY}}">{{__('Yearly')}}</option>
                                        <option value="{{REPORT_DURATION_CUSTOM}}">{{__('Custom')}}</option>
                                    </select>
                                </div>
                                <div id="start_date_section"
                                    class="d-none d-flex align-items-center align-self-stretch g-8 bg-white px-16 bd-one bd-c-stroke bd-ra-8">
                                    <div class="flex-shrink-0 d-flex"><img
                                            src="{{asset('assets/images/icon/calendar-datePicker.svg')}}" alt=""/></div>
                                    <input type="text" name="start_date" id="start_date"
                                           class="form-control px-0 rounded-0 border-0 shadow-none date-time-picker"
                                           placeholder="{{__("Start Date")}}"/>
                                </div>
                                <div id="end_date_section"
                                    class="d-none d-flex align-items-center align-self-stretch g-8 bg-white px-16 bd-one bd-c-stroke bd-ra-8">
                                    <div class="flex-shrink-0 d-flex"><img
                                            src="{{asset('assets/images/icon/calendar-datePicker.svg')}}" alt=""/></div>
                                    <input type="text" name="end_date" id="end_date"
                                           class="form-control px-0 rounded-0 border-0 shadow-none date-time-picker"
                                           placeholder="{{__("End Date")}}"/>
                                </div>
{{--                                <div class="align-items-center align-self-stretch bd-ra-8 flex-grow-1 max-w-190">--}}
{{--                                    <select class="sf-select-without-search" name="status" id="status">--}}
{{--                                        <option>{{__("Status")}}</option>--}}
{{--                                        <option value="{{USER_STATUS_ACTIVE}}">{{__('Active')}}</option>--}}
{{--                                        <option value="{{USER_STATUS_INACTIVE}}">{{__('Inactive')}}</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
                                <button type="submit"
                                    class="flex-shrink-0 w-42 h-42 d-flex justify-content-center align-items-center bg-primary text-white bd-ra-6">
                                    <i class="fa-solid fa-long-arrow-right"></i></button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="row rg-20 d-none" id="report-result-section">
            <div class="col-12">
                <div class="bd-ra-15 bg-white p-sm-30 p-15 mb-30" >
                        <a href="add-task.html" class="py-13 pr-15 pl-10 bd-one bd-c-primary-color bg-primary-color bd-ra-4 fs-14 fw-500 lh-14 text-white">{{__("Print & Download")}}</a>
                    <div id="report-content-section">

                    </div>

                </div>
            </div>
        </div>
    </div>
    {{--    <input type="hidden" id="notice-list-route" value="{{route('admin.notice.list')}}">--}}
@endsection
@push('script')
    <script src="{{asset('assets/custom/admin/js/report.js')}}"></script>
@endpush
