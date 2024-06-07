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
            <input type="hidden" value="{{encrypt($paymentInfo->id)}}" name="id">
            <input type="hidden" value="" id="payableAmount">
            <input type="hidden" value="" id="dueAmount">
            <label for="addRoleStatus" class="sf-form-label">{{__('Enrolled Student')}}</label>
            <select class="sf-select-without-search" name="enrolled_student" id="enrolmentStudent">
                <option >{{__("Select Enrolled Student")}}</option>
                @foreach($enrolmentList as $enrolment)
                    <option value="{{$enrolment->id}}" {{$paymentInfo->enrolment_id == $enrolment->id?'selected':''}} data-payable="{{$enrolment->payable_amount}}">{{$enrolment->register_id.'-'.$enrolment->student->name}}</option>
                @endforeach
            </select>
            <p class="text-info fs-13 text-end" id="amountInfoShow"></p>
        </div>
        <div class="col-12">
            <label for="amount" class="sf-form-label">{{__('Amount')}} <span class="text-red">*</span></label>
            <input type="number" name="amount" class="form-control sf-form-control" id="amount" placeholder="0"  value="{{$paymentInfo->amount}}"/>
        </div>
        <div class="col-12">
            <label for="addRoleStatus" class="sf-form-label">{{__('Payment Type')}}</label>
            <select class="sf-select-without-search" name="payment_type">
                <option value="{{PAYMENT_TYPE_OFFLINE}}" {{$paymentInfo->payment_type == PAYMENT_TYPE_OFFLINE?'selected':''}}>{{__("Cash")}}</option>
                <option value="{{PAYMENT_TYPE_ONLINE}}" {{$paymentInfo->payment_type == PAYMENT_TYPE_ONLINE?'selected':''}}>{{__('Online')}}</option>
            </select>
        </div>
        <div class="col-12">
            <label for="addRoleStatus" class="sf-form-label">{{__('Status')}}</label>
            <select class="sf-select-without-search" name="status">
                <option value="{{PAYMENT_STATUS_PENDING}}" {{$paymentInfo->status == PAYMENT_STATUS_PENDING?'selected':''}}>{{__("Pending")}}</option>
                <option value="{{PAYMENT_STATUS_SUCCESS}}" {{$paymentInfo->status == PAYMENT_STATUS_SUCCESS?'selected':''}}>{{__('Paid')}}</option>
                <option value="{{PAYMENT_STATUS_CANCEL}}" {{$paymentInfo->status == PAYMENT_STATUS_CANCEL?'selected':''}}>{{__('Canceled')}}</option>
            </select>
        </div>
        <div class="col-12">
            <label for="amount" class="sf-form-label">{{__('Note')}} </label>
            <textarea name="note" class="form-control sf-form-control" id="note" placeholder="{{__("Write something")}}" >{{$paymentInfo->description}}</textarea>
        </div>
    </div>
    <div class="bd-t-one bd-c-stroke pt-17 d-flex g-10">
        <button type="button" data-bs-dismiss="modal" aria-label="Close" class="py-13 px-20 bd-one bd-ra-4 bd-c-main-color bg-white text-main-color fs-14 fw-600 lh-14">{{__('Cancel')}}</button>
        <button type="submit" class="py-13 px-20 bd-one bd-ra-4 bd-c-primary-color bg-primary-color text-white fs-14 fw-600 lh-14">{{__('Save')}}</button>
    </div>
</form>
