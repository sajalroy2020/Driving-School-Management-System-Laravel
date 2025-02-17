
@extends('layouts.app')
@push('title')
    {{$pageTitle}}
@endpush

@section('content')
    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">
        <div class="row rg-20">
            <div class="col-12">
                <div class="bd-ra-15 bg-white p-sm-30 p-15 mb-30">
                    <div class="table-wrapTop d-flex align-items-center justify-content-center justify-content-md-between flex-wrap g-10 pb-18">
                        <div></div>
                        <div class="">
                            <a href="{{ url()->previous() }}" class="py-13 pr-15 pl-10 bd-one bd-c-primary-color bg-primary-color bd-ra-4 fs-14 fw-500 lh-14 text-white"><i class="fa-solid fa-long-arrow-left pr-8"></i> {{__('Back')}}</a>
                        </div>
                    </div>
                    <div class="text-center pb-20">
                        <h4>{{$exam->exam_title}}</h4>
                        <p class="py-5"><strong>{{__('Total Mark')}}</strong>: {{$exam->total_mark}}</p>
                        <p>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',
                            $exam->exam_date)->format('jS F, h:i:s A')}}</p>
                    </div>
                    <p class="py-5 text-end"><strong>{{__('Obtained Mark')}}</strong>: {{$exam->total_mark}}</p>
                    <div class="pt-20">
                        <table class="table zTable zTable-last-item-right" id="markAssignDataTable">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="text-nowrap">{{__('SN')}}</div>
                                    </th>
                                    <th>
                                        <div class="text-nowrap">{{__('Question Name')}}</div>
                                    </th>
                                    <th>
                                        <div class="text-nowrap">{{__('Total Mark')}}</div>
                                    </th>
                                    <th>
                                        <div class="text-nowrap">{{__('Assigned Mark')}}</div>
                                    </th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" id="mark-list-route" value="{{route('student.exam.view', $examId)}}">

@endsection
@push('script')
    <script src="{{asset('assets/custom/student/js/std-mark-assign.js')}}"></script>
@endpush






