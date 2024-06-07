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
                            <a href="{{ url()->previous() }}" class="py-13 pr-15 pl-10 bd-one bd-c-primary-color bg-primary-color bd-ra-4 fs-14 fw-500 lh-14 text-white d-flex align-items-center"> <i class="fa-solid fa-long-arrow-left mr-10"></i> {{__('Back')}}</a>
                        </div>
                    </div>
                    <div class="text-center pb-20">
                        <h4>{{$exam->exam_title}}</h4>
                        <p class="py-5"><strong>{{__('Total Mark')}}</strong>: {{$exam->total_mark}}</p>
                        <p>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',
                            $exam->exam_date)->format('jS F, h:i:s A')}}</p>
                    </div>
                    <div class="pt-20">
                        <table class="table zTable zTable-last-item-right" id="markAssignDataTable">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="text-nowrap">{{__('Student name')}}</div>
                                    </th>
                                    <th>
                                        <div class="text-nowrap">{{__('Question Name')}}</div>
                                    </th>
                                    <th>
                                        <div class="text-nowrap">{{__('Question Mark')}}</div>
                                    </th>
                                    <th>
                                        <div class="text-nowrap">{{__('Mark Assign')}}</div>
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

     {{-- Edit model --}}
     <div class="modal fade" id="edit-modal" tabindex="-1" aria-labelledby="addRoleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content border-0 bd-ra-4 p-20">
            </div>
        </div>
    </div>

    <input type="hidden" id="mark-list-route" value="{{route('admin.exam.mark-assign', $examId)}}">

@endsection
@push('script')
    <script src="{{asset('assets/custom/admin/js/mark-assign.js')}}"></script>
@endpush
