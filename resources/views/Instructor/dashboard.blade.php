@extends('layouts.app')
@push('title')
{{--    {{$pageTitle}}--}}
@endpush

@section('content')
    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">
        <!--  -->
        <div class="bd-ra-15 bg-white p-sm-30 p-15 mb-30">
            <h4 class="fs-18 fw-500 lh-24 text-main-color pb-24">{{__('Overall Summery')}}</h4>
            <div class="row rg-20">
                <div class="col-xl-3 col-sm-6">
                    <div class="dashboard-card-wrap">
                        <div class="dashboard-card-content">
                            <div class="icon"><img src="{{asset('assets')}}/images/icon/calendar-employees.svg"
                                                   alt=""/></div>
                            <h4 class="title">{{$runningStudent}}</h4>
                            <p class="info">{{__('Running Student')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="dashboard-card-wrap">
                        <div class="dashboard-card-content">
                            <div class="icon"><img src="{{asset('assets')}}/images/icon/calendar-departments.svg"
                                                   alt=""/></div>
                            <h4 class="title">{{$completedStudent}}</h4>
                            <p class="info">{{__('Completed Student')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="dashboard-card-wrap">
                        <div class="dashboard-card-content">
                            <div class="icon"><img src="{{asset('assets')}}/images/icon/calendar-division.svg"
                                                   alt=""/></div>
                            <h4 class="title">{{$pendingExam}}</h4>
                            <p class="info">{{__('Pending Exam')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="dashboard-card-wrap">
                        <div class="dashboard-card-content">
                            <div class="icon"><img src="{{asset('assets')}}/images/icon/calendar-year.svg" alt=""/>
                            </div>
                            <h4 class="title">{{$activeNotice}}</h4>
                            <p class="info">{{__('Active Notice')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h4 class="title pb-15 pt-20 text-body fw-600">{{__(' Events')}}</h4>
        <div class="bd-one bd-c-stroke bd-ra-20 bg-white overflow-hidden">
            <div id="ctFullCalendar"></div>
        </div>
        <!--  -->
    </div>

    <input type="hidden" id="event-list-route" value="{{route('instructor.event.index')}}">

@endsection
@push('script')
    <script src="{{asset('assets/custom/instructor/js/event.js')}}"></script>
@endpush
