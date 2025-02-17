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
                        <div class="d-flex justify-content-center justify-content-sm-start g-10 flex-wrap">
                            <div class="search-one flex-grow-1 max-w-207">
                              <button class="icon"><img src="{{asset('assets/images/icon/search.svg')}}" alt="" /></button>
                              <input type="text" placeholder="Search here..." id="paymentDataTableSearch" />
                            </div>
                        </div>
                        <button class="py-13 pr-15 pl-10 bd-one bd-c-primary-color bg-primary-color bd-ra-4 fs-14 fw-500 lh-14 text-white" data-bs-toggle="modal" data-bs-target="#addPaymentModal">+ {{__('Make Payment')}}</button>
                    </div>
                    <table class="table zTable zTable-last-item-right" id="paymentDataTable">
                        <thead>
                        <tr>
                            <th>
                                <div class="text-nowrap">{{__('Payment Id')}}</div>
                            </th>
                            <th>
                                <div class="text-nowrap">{{__('Student Name')}}</div>
                            </th>
                            <th>
                                <div class="text-nowrap">{{__('Payable Amount')}}</div>
                            </th>
                            <th>
                                <div class="text-nowrap">{{__('Paid Amount')}}</div>
                            </th>
                            <th>
                                <div class="text-nowrap">{{__('Due Amount')}}</div>
                            </th>
                            <th>
                                <div>{{__('Created At')}}</div>
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

    {{-- Add payment model --}}
    <div class="modal fade" id="addPaymentModal" tabindex="-1" aria-labelledby="addRoleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content border-0 bd-ra-4 p-20">
          <!-- Top -->
          <div class="d-flex justify-content-between align-items-center bd-b-one bd-c-stroke pb-20 mb-20">
            <h4 class="fs-18 fw-600 lh-18 text-main-color">{{__('Add Payment')}}</h4>
            <button type="button" class="border-0 p-0 bg-transparent text-para-text" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i></button>
          </div>
          <!--  -->
          <form class="ajax-request reset" action="{{route('admin.payment.store')}}" method="POST"
          data-handler="commonResponse">
          @csrf
            <div class="row rg-20 pb-25">
                <div class="col-12">
                    <input type="hidden" value="" id="payableAmount">
                    <input type="hidden" value="" id="dueAmount">
                    <label for="addRoleStatus" class="sf-form-label">{{__('Enrolled Student')}}</label>
                    <select class="sf-select-without-search" name="enrolled_student" id="enrolmentStudent">
                        <option >{{__("Select Enrolled Student")}}</option>
                        @foreach($enrolmentList as $enrolment)
                        <option value="{{$enrolment->id}}" data-payable="{{$enrolment->payable_amount}}">{{$enrolment->register_id.'-'.$enrolment->student->name}}</option>
                        @endforeach
                    </select>
                    <p class="text-info fs-13 text-end" id="amountInfoShow"></p>
                </div>
              <div class="col-12">
                <label for="amount" class="sf-form-label">{{__('Amount')}} <span class="text-red">*</span></label>
                <input type="number" name="amount" class="form-control sf-form-control" id="amount" placeholder="0" />
              </div>
              <div class="col-12">
                <label for="addRoleStatus" class="sf-form-label">{{__('Payment Type')}}</label>
                <select class="sf-select-without-search" name="payment_type">
                  <option value="{{PAYMENT_TYPE_OFFLINE}}">{{__("Cash")}}</option>
                  <option value="{{PAYMENT_TYPE_ONLINE}}">{{__('Online')}}</option>
                </select>
              </div>
                <div class="col-12">
                    <label for="amount" class="sf-form-label">{{__('Note')}} </label>
                    <textarea name="note" class="form-control sf-form-control" id="note" placeholder="{{__("Write something")}}" ></textarea>
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

    {{-- Edit payment model --}}
    <div class="modal fade" id="edit-modal" tabindex="-1" aria-labelledby="addRoleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content border-0 bd-ra-4 p-20">
            </div>
        </div>
      </div>

    <input type="hidden" id="payment-list-route" value="{{route('admin.payment.list')}}">
    <input type="hidden" id="get-total-paid-amount-route" value="{{route('admin.payment.get-total-paid-amount')}}">
@endsection
@push('script')
    <script src="{{asset('assets/custom/admin/js/payment.js')}}"></script>
@endpush
