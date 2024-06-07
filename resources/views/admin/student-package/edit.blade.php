 <!-- Top -->
 <div class="d-flex justify-content-between align-items-center bd-b-one bd-c-stroke pb-20 mb-20">
    <h4 class="fs-18 fw-600 lh-18 text-main-color">{{__('Assign Package')}}</h4>
    <button type="button" class="border-0 p-0 bg-transparent text-para-text" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i></button>
  </div>
  <!--  -->
  <form class="ajax-request reset" action="{{route('admin.student-packages.store')}}" method="POST"
  data-handler="commonResponse">
  @csrf
  <input type="hidden" name="id" value="{{encrypt($packages->id)}}">
    <div class="row rg-20 pb-25">
        <div class="col-12">
            <label for="addRoleStatus" class="sf-form-label">{{__('Student')}} <span class="text-red">*</span></label>
            <select class="sf-select-without-search" name="student_id">
              <option value="">{{__("Select Student Mail")}}</option>
              @foreach ($students as $data)
                <option {{$packages->student_id == $data->id ? 'selected' : ''}} value="{{$data->id}}">{{$data->email}}</option>
              @endforeach
            </select>
        </div>
        <div class="col-12">
            <label for="addRoleStatus" class="sf-form-label">{{__('Package')}} <span class="text-red">*</span></label>
            <select class="sf-select-without-search" name="package_id">
              <option value="">{{__("Select Package")}}</option>
              @foreach ($Packages as $data)
                <option {{$packages->package_id == $data->id ? 'selected' : ''}} value="{{$data->id}}">{{$data->category->category_name}}</option>
              @endforeach
            </select>
        </div>
        <div class="col-12">
            <label for="addRoleStatus" class="sf-form-label">{{__('Payment Gateway')}} <span class="text-red">*</span></label>
            <select class="sf-select-without-search" name="payment_id">
              <option value="">{{__("Select Payment Gateway")}}</option>
              @foreach ($getway as $data)
                <option {{$packages->payment_id == $data->id ? 'selected' : ''}} value="{{$data->id}}">{{$data->title}}</option>
              @endforeach
            </select>
        </div>
        <div class="col-12">
            <label for="addRoleStatus" class="sf-form-label">{{__('Status')}}</label>
            <select class="sf-select-without-search" name="status">
                <option {{$packages->status == STATUS_ACTIVE ? 'selected' : ''}} value="{{STATUS_ACTIVE}}">{{__("Active")}}</option>
                <option {{$packages->status == STATUS_DEACTIVATE ? 'selected' : ''}} value="{{STATUS_DEACTIVATE}}">{{__('Deactivate')}}</option>
            </select>
        </div>
    </div>
    <div class="bd-t-one bd-c-stroke pt-17 d-flex g-10">
      <button type="button" data-bs-dismiss="modal" aria-label="Close" class="py-13 px-20 bd-one bd-ra-4 bd-c-main-color bg-white text-main-color fs-14 fw-600 lh-14">{{__('Cancel')}}</button>
      <button type="submit" class="py-13 px-20 bd-one bd-ra-4 bd-c-primary-color bg-primary-color text-white fs-14 fw-600 lh-14">{{__('Update')}}</button>
    </div>
  </form>
