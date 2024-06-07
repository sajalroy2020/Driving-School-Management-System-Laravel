<!-- Top -->
<div class="d-flex justify-content-between align-items-center bd-b-one bd-c-stroke pb-20 mb-20">
    <h4 class="fs-18 fw-600 lh-18 text-main-color">{{__('Edit Enrolment Student')}}</h4>
    <button type="button" class="border-0 p-0 bg-transparent text-para-text" data-bs-dismiss="modal"
            aria-label="Close"><i class="fa-solid fa-times"></i></button>
</div>
<!--  -->
<form class="ajax-request reset" action="{{route('admin.enrolment.store')}}" method="POST"
      data-handler="commonResponse">
    @csrf
    <input type="hidden" name="orginal_price" class="orginalPrice" value="{{$enrolment->total_amount}}">
    <input type="hidden" name="id" value="{{encrypt($enrolment->id)}}">

    <div class="row pb-25">
        <div class="zForm-wrap pb-20">
            <label for="addRoleStatus" class="sf-form-label">{{__('Student Name')}} <span
                    class="text-red">*</span></label>
            <select class="sf-select-without-search" name="student">
                <option value="">{{__("Select Student")}}</option>
                @foreach ($students as $data)
                    <option
                        {{$enrolment->student_id == $data->id ? 'selected' : ''}} value="{{$data->id}}">{{$data->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="zForm-wrap pb-20">
            <label for="addRoleStatus" class="sf-form-label">{{__('Package Name')}} <span
                    class="text-red">*</span></label>
            <select class="sf-select-without-search singlePackage" name="package">
                <option value="">{{__("Select Package")}}</option>
                @foreach ($packages as $data)
                    <option {{$enrolment->package_id == $data->id ? 'selected' : ''}} data-price="{{$data->price}}"
                            value="{{$data->id}}">{{$data->package_name}} - {{showCurrency($data->price)}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-6 pb-20">
            <label for="addRoleName" class="sf-form-label">{{__('Discount Amount')}}</label>
            <input value="{{$enrolment?->discount_amount}}" type="number"  name="discount_amount"
                   class="form-control sf-form-control" placeholder="0"/>
        </div>
        <div class="col-6 pb-20">
            <label for="addRoleStatus" class="sf-form-label">{{__('Discount Type')}}</label>
            <select class="sf-select-without-search" name="discount_type">
                <option value="">{{__("Select Discount Type")}}</option>
                <option
                    {{$enrolment->discount_type == DISCOUNT_TYPE_FLOAT ? 'selected' : ''}} value="{{DISCOUNT_TYPE_FLOAT}}">{{__("Flat")}}</option>
                <option
                    {{$enrolment->discount_type == DISCOUNT_TYPE_PARCENT ? 'selected' : ''}} value="{{DISCOUNT_TYPE_PARCENT}}">{{__('Percentage')}}</option>
            </select>
        </div>
        <div class="col-12 pb-20">
            <div class="zForm-wrap">
                <label for="asZipCode" class="sf-form-label">{{__('Start Date')}} <span
                        class="text-danger">*</span></label>
                <input type="date" value="{{$enrolment->start_date}}" name="start_date"
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
                        {{$enrolment->slot_id == $data->id ? 'selected' : ''}} value="{{$data->id}}">{{\Carbon\Carbon::parse($data->start_time)->format('g:i A')}}
                        - {{\Carbon\Carbon::parse($data->end_time)->format('g:i A')}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-6">
            <label for="addRoleName" class="sf-form-label">{{__('Duration Time')}}</label>
            <input type="number" value="{{$enrolment->duration_time}}" name="duration_time"
                   class="form-control sf-form-control" placeholder="{{__("Enter Duration Time")}}"/>
        </div>
        <div class="col-6 pb-20">
            <label for="addRoleStatus" class="sf-form-label">{{__('Duration Type')}}</label>
            <select class="sf-select-without-search" name="duration_type">
                <option value="">{{__("Select Duration Type")}}</option>
                <option
                    {{$enrolment->duration_type == DURATION_TYPE_DAY ? 'selected' : ''}} value="{{DURATION_TYPE_DAY}}">{{__("Day")}}</option>
                <option
                    {{$enrolment->duration_type == DURATION_TYPE_MONTH ? 'selected' : ''}} value="{{DURATION_TYPE_MONTH}}">{{__('Month')}}</option>
            </select>
        </div>
        <div class="zForm-wrap pb-20">
            <label for="addRoleStatus" class="sf-form-label">{{__('Status')}}</label>
            <select class="sf-select-without-search" name="status">
                <option
                    {{$enrolment->status == ENROLMENT_PENDING ? 'selected' : ''}} value="{{ENROLMENT_PENDING}}">{{__('Pending')}}</option>
                <option
                    {{$enrolment->status == ENROLMENT_APPROVED ? 'selected' : ''}} value="{{ENROLMENT_APPROVED}}">{{__("Approved")}}</option>
                <option
                    {{$enrolment->status == ENROLMENT_RUNNING ? 'selected' : ''}} value="{{ENROLMENT_RUNNING}}">{{__('Running')}}</option>
                <option
                    {{$enrolment->status == ENROLMENT_CANCEL ? 'selected' : ''}} value="{{ENROLMENT_CANCEL}}">{{__('Cancel')}}</option>
                <option
                    {{$enrolment->status == ENROLMENT_COMPLEATE ? 'selected' : ''}} value="{{ENROLMENT_COMPLEATE}}">{{__('Completed')}}</option>
                <option
                    {{$enrolment->status == ENROLMENT_CLOSE ? 'selected' : ''}} value="{{ENROLMENT_CLOSE}}">{{__('Close')}}</option>
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
