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
                        class="table-wrapTop d-flex align-items-center justify-content-center justify-content-md-between flex-wrap g-10 pb-18">
                        <div class="d-flex justify-content-center justify-content-sm-start g-10 flex-wrap">
                            <div class="search-one flex-grow-1 max-w-207">
                                <button class="icon"><img src="{{asset('assets/images/icon/search.svg')}}" alt=""/>
                                </button>
                                <input type="text" placeholder="{{__("Search here")}}..." id="dataTableSearch"/>
                            </div>
                        </div>
                        <button
                            class="py-13 pr-15 pl-10 bd-one bd-c-primary-color bg-primary-color bd-ra-4 fs-14 fw-500 lh-14 text-white"
                            data-bs-toggle="modal" data-bs-target="#addModal">+ {{__('Add Enrolment')}}</button>
                    </div>
                    <table class="table zTable zTable-last-item-right" id="enrolmentDataTable">
                        <thead>
                        <tr>
                            <th>
                                <div class="text-nowrap">{{__('Enrolment Id')}}</div>
                            </th>
                            <th>
                                <div class="text-nowrap">{{__('Student Name')}}</div>
                            </th>
                            <th>
                                <div class="text-nowrap">{{__('Package Name')}}</div>
                            </th>
                            <th>
                                <div>{{__('Created Date')}}</div>
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

    {{-- Add Enrolment model --}}
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addRoleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content border-0 bd-ra-4 p-20">
                <!-- Top -->
                <div class="d-flex justify-content-between align-items-center bd-b-one bd-c-stroke pb-20 mb-20">
                    <h4 class="fs-18 fw-600 lh-18 text-main-color">{{__('Add Enrolment Student')}}</h4>
                    <button type="button" class="border-0 p-0 bg-transparent text-para-text" data-bs-dismiss="modal"
                            aria-label="Close"><i class="fa-solid fa-times"></i></button>
                </div>
                <!--  -->
                <form class="ajax-request reset" action="{{route('admin.enrolment.store')}}" method="POST"
                      data-handler="commonResponse">
                    @csrf
                    <input type="hidden" name="orginal_price" class="orginalPrice" value="">
                    <div class="row pb-25">
                        <div class="zForm-wrap pb-20">
                            <label for="addRoleStatus" class="sf-form-label">{{__('Student Name')}} <span
                                    class="text-red">*</span></label>
                            <select class="sf-select-without-search" name="student">
                                <option value="">{{__("Select Student")}}</option>
                                @foreach ($students as $data)
                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="zForm-wrap pb-20">
                            <label for="addRoleStatus" class="sf-form-label">{{__('Package Name')}} <span
                                    class="text-red">*</span></label>
                            <select class="sf-select-without-search singlePackage" name="package">
                                <option value="">{{__("Select Package")}}</option>
                                @foreach ($packages as $data)
                                    <option data-price="{{$data->price}}" value="{{$data->id}}">{{$data->package_name}}
                                        - {{showCurrency($data->price)}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6 pb-20">
                            <label for="addRoleName" class="sf-form-label">{{__('Discount Amount')}}</label>
                            <input type="number" name="discount_amount" class="form-control sf-form-control"
                                   placeholder="0.00"/>
                        </div>
                        <div class="col-6 pb-20">
                            <label for="addRoleStatus" class="sf-form-label">{{__('Discount Type')}}</label>
                            <select class="sf-select-without-search" name="discount_type">
                                <option value="">{{__("Select Discount Type")}}</option>
                                <option value="{{DISCOUNT_TYPE_FLOAT}}">{{__("Flat")}}</option>
                                <option value="{{DISCOUNT_TYPE_PARCENT}}">{{__('Percentage')}}</option>
                            </select>
                        </div>
                        <div class="col-12 pb-20">
                            <div class="zForm-wrap">
                                <label for="asZipCode" class="sf-form-label">{{__('Start Date')}} <span
                                        class="text-danger">*</span></label>
                                <input type="date" name="start_date"
                                       class="form-control sf-form-control sf-form-control-2" id="asZipCode"
                                       placeholder="{{__("Start Date")}}"/>
                            </div>
                        </div>
                        <div class="zForm-wrap pb-20">
                            <label for="addRoleStatus" class="sf-form-label">{{__('Select Slot')}} <span
                                    class="text-red">*</span></label>
                            <select class="sf-select-without-search" name="slot">
                                <option value="">{{__("Select Slot")}}</option>
                                @foreach ($timeSlots as $data)
                                    <option
                                        value="{{$data->id}}">{{\Carbon\Carbon::parse($data->start_time)->format('g:i A')}}
                                        - {{\Carbon\Carbon::parse($data->end_time)->format('g:i A')}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="addRoleName" class="sf-form-label">{{__('Duration')}}</label>
                            <input type="number" name="duration_time" class="form-control sf-form-control"
                                   placeholder="{{__("Duration")}}"/>
                        </div>
                        <div class="col-6 pb-20">
                            <label for="addRoleStatus" class="sf-form-label">{{__('Duration Type')}}</label>
                            <select class="sf-select-without-search" name="duration_type">
                                <option value="">{{__("Select Duration Type")}}</option>
                                <option value="{{DURATION_TYPE_DAY}}">{{__("Day")}}</option>
                                <option value="{{DURATION_TYPE_MONTH}}">{{__('Month')}}</option>
                            </select>
                        </div>
                        <div class="zForm-wrap pb-20">
                            <label for="addRoleStatus" class="sf-form-label">{{__('Status')}}</label>
                            <select class="sf-select-without-search" name="status">
                                <option value="{{ENROLMENT_PENDING}}">{{__('Pending')}}</option>
                                <option value="{{ENROLMENT_APPROVED}}">{{__("Approved")}}</option>
                                <option value="{{ENROLMENT_RUNNING}}">{{__('Running')}}</option>
                                <option value="{{ENROLMENT_CANCEL}}">{{__('Cancel')}}</option>
                                <option value="{{ENROLMENT_COMPLEATE}}">{{__('Completed')}}</option>
                                <option value="{{ENROLMENT_CLOSE}}">{{__('Close')}}</option>
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

    {{-- Edit Enrolment model --}}
    <div class="modal fade" id="edit-modal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content border-0 bd-ra-4 p-20">
            </div>
        </div>
    </div>

    <input type="hidden" id="enrolment-list-route" value="{{route('admin.enrolment.list')}}">
@endsection

@push('script')
    <script src="{{asset('assets/custom/admin/js/enrolment.js')}}"></script>
@endpush
