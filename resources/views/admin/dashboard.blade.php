@extends('layouts.app')
@push('title')
    {{$pageTitle}}
@endpush

@section('content')
    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">
        <!--  -->
        <div class="bd-ra-15 bg-white p-sm-30 p-15 mb-30">
            <h4 class="fs-18 fw-500 lh-24 text-main-color pb-24">{{__("Overall Summery")}}</h4>
            <div class="row rg-20">
                <div class="col-xl-3 col-sm-6">
                    <div class="dashboard-card-wrap">
                        <div class="dashboard-card-content">
                            <div class="icon">
                                <img src="{{asset('assets/images/icon/student.svg')}}"
                                     alt="{{__("Total Student")}}"/></div>

                            <h4 class="title">{{$overallSummery['total_student']}}</h4>
                            <p class="info">{{__("Total Student")}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="dashboard-card-wrap">
                        <div class="dashboard-card-content">
                            <div class="icon"><img src="{{asset('assets/images/icon/users.svg')}}"
                                                   alt="{{__("Total Instructor")}}"/></div>
                            <h4 class="title">{{$overallSummery['total_instructor']}}</h4>
                            <p class="info">{{__("Total Instructor")}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="dashboard-card-wrap">
                        <div class="dashboard-card-content">
                            <div class="icon"><img src="{{asset('assets/images/icon/users.svg')}}"
                                                   alt="{{__("Total Staff")}}"/></div>
                            <h4 class="title">{{$overallSummery['total_staff']}}</h4>
                            <p class="info">{{__("Total Staff")}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="dashboard-card-wrap">
                        <div class="dashboard-card-content">
                            <div class="icon"><img src="{{asset('assets/images/icon/car.svg')}}"
                                                   alt="{{__("Total Category")}}"/>
                            </div>
                            <h4 class="title">{{$overallSummery['total_category']}}</h4>
                            <p class="info">{{__("Total Category")}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="dashboard-card-wrap">
                        <div class="dashboard-card-content">
                            <div class="icon"><img src="{{asset('assets/images/icon/package.svg')}}"
                                                   alt="{{__("Total Package")}}"/></div>
                            <h4 class="title">{{$overallSummery['total_package']}}</h4>
                            <p class="info">{{__("Total Package")}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="dashboard-card-wrap">
                        <div class="dashboard-card-content">
                            <div class="icon"><img src="{{asset('assets/images/icon/pending-enrolment.svg')}}"
                                                   alt="{{__("Pending Enrolment")}}"/></div>
                            <h4 class="title">{{$overallSummery['pending_enrolment']}}</h4>
                            <p class="info">{{__("Pending Enrolment")}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="dashboard-card-wrap">
                        <div class="dashboard-card-content">
                            <div class="icon"><img src="{{asset('assets/images/icon/running-student.svg')}}"
                                                   alt="{{__("Running Student")}}"/></div>
                            <h4 class="title">{{$overallSummery['running_student']}}</h4>
                            <p class="info">{{__("Running Student")}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="dashboard-card-wrap">
                        <div class="dashboard-card-content">
                            <div class="icon"><img src="{{asset('assets/images/icon/completed-student.svg')}}"
                                                   alt="{{__("Completed Student")}}"/>
                            </div>
                            <h4 class="title">{{$overallSummery['completed_student']}}</h4>
                            <p class="info">{{__("Completed Student")}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row rg-20">
            <div class="col-lg-7">
                <div class="bd-ra-15 bg-white p-sm-30 p-15 mb-30 chart-max-height">
                    <h4 class="fs-18 fw-500 lh-24 text-main-color pb-24">{{__("Revenue Overview")}}</h4>
                    <div id="revenueOverviewChart"></div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="bd-ra-15 bg-white p-sm-30 p-15 mb-30 ">
                    <h4 class="fs-18 fw-500 lh-24 text-main-color pb-24">{{__("Student Overview")}}</h4>
                    <div id="studentOverviewChart"></div>
                </div>
            </div>
        </div>
        <div class="row rg-20">
            <div class="col-lg-6">
                <div class="bd-ra-15 bg-white p-sm-30 p-15 mb-30">
                    <h4 class="fs-18 fw-500 lh-24 text-main-color pb-24">{{__("Recent Enrolment History")}}</h4>
                    <table class="table zTable zTable-last-item-right" id="recentEnrolmentHistoryTable">
                        <thead>
                        <tr>
                            <th>
                                <div class="text-nowrap">{{__("Enrolment Id")}}</div>
                            </th>
                            <th>
                                <div class="text-nowrap">{{__("Student")}}</div>
                            </th>
                            <th>
                                <div class="text-nowrap">{{__("Package")}}</div>
                            </th>
                            <th>
                                <div>{{__("Status")}}</div>
                            </th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="bd-ra-15 bg-white p-sm-30 p-15 mb-30">
                    <h4 class="fs-18 fw-500 lh-24 text-main-color pb-24">{{__("Recent Payment History")}}</h4>
                    <table class="table zTable zTable-last-item-right" id="recentPaymentHistoryTable">
                        <thead>
                        <tr>
                            <th>
                                <div class="text-nowrap">{{__("Payment Id")}}</div>
                            </th>
                            <th>
                                <div>{{__("Student")}}</div>
                            </th>
                            <th>
                                <div class="text-nowrap">{{__("Amout")}}</div>
                            </th>
                            <th>
                                <div>{{__("Status")}}</div>
                            </th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="revenueOverviewChartRoute" value="{{route('admin.revenue-chart')}}">
    <input type="hidden" id="studentOverviewChartRoute" value="{{route('admin.student-chart')}}">
    <input type="hidden" id="recent-enrolment-history-route" value="{{route('admin.recent-enrolment-history')}}">
    <input type="hidden" id="recent-payment-history-route" value="{{route('admin.recent-payment-history')}}">
@endsection

@push('script')
    <script src="{{ asset('assets/common/js/apexcharts.min.js') }}"></script>
    <script src="{{asset('assets/custom/admin/js/dashboard.js')}}"></script>
@endpush

