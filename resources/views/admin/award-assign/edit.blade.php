 <!-- Top -->
 <div class="d-flex justify-content-between align-items-center bd-b-one bd-c-stroke pb-20 mb-20">
    <h4 class="fs-18 fw-600 lh-18 text-main-color">{{__('Assign Award')}}</h4>
    <button type="button" class="border-0 p-0 bg-transparent text-para-text" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i></button>
  </div>
  <!--  -->
  <form class="ajax-request reset" action="{{route('admin.award-assign.store')}}" method="POST"
  data-handler="commonResponse">
  @csrf
  <input type="hidden" name="id" value="{{encrypt($stdAwards->id)}}">

    <div class="row rg-20 pb-25">
        <div class="col-12">
            <label for="addRoleStatus" class="sf-form-label">{{__('Student Name')}} <span class="text-red">*</span></label>
            <select class="sf-select-without-search" name="student_id">
              <option value="">{{__("Select Student")}}</option>
              @foreach ($students as $data)
                <option {{$stdAwards->student_id == $data->id ? 'selected' : ''}} value="{{$data->id}}">{{$data->name}} - {{$data->student_id}}</option>
              @endforeach
            </select>
        </div>
        <div class="col-12">
            <label for="addRoleStatus" class="sf-form-label">{{__('Select Award')}} <span class="text-red">*</span></label>
            <select class="sf-select-without-search" name="award_id">
              <option value="">{{__("Select Award")}}</option>
              @foreach ($awards as $data)
                <option {{$stdAwards->award_id == $data->id ? 'selected' : ''}} value="{{$data->id}}">{{$data->title}}</option>
              @endforeach
            </select>
        </div>
        <div class="col-6">
            <label for="addRoleStatus" class="sf-form-label">{{__('Prize Type')}}</label>
            <select class="sf-select-without-search" name="prize_type">
                <option value="">{{__("Select Prize Type")}}</option>
                <option {{$stdAwards->prize_type == AWARD_TYPE_MONEY ? 'selected' : ''}}  value="{{AWARD_TYPE_MONEY}}">{{__("Money")}}</option>
                <option {{$stdAwards->prize_type == AWARD_TYPE_OTHERS ? 'selected' : ''}}  value="{{AWARD_TYPE_OTHERS}}">{{__('Others')}}</option>
            </select>
        </div>
        <div class="col-6">
            <label for="addRoleName" class="sf-form-label">{{__('Prize')}}</label>
            <input type="text" value="{{$stdAwards->award_prize}}" name="prize" class="form-control sf-form-control" id="addRoleName" placeholder="Enter Prize" />
        </div>

        <div class="col-12">
            <label for="addRoleStatus" class="sf-form-label">{{__('Status')}}</label>
            <select class="sf-select-without-search" name="status">
                <option {{$stdAwards->status == AWARD_PENDING ? 'selected' : ''}} value="{{AWARD_PENDING}}">{{__("Pending")}}</option>
                <option {{$stdAwards->status == AWARD_GIVEN ? 'selected' : ''}} value="{{AWARD_GIVEN}}">{{__('Given')}}</option>
                <option {{$stdAwards->status == AWARD_CANCEL ? 'selected' : ''}} value="{{AWARD_CANCEL}}">{{__('Cancel')}}</option>
            </select>
        </div>
    </div>
    <div class="bd-t-one bd-c-stroke pt-17 d-flex g-10">
      <button type="button" data-bs-dismiss="modal" aria-label="Close" class="py-13 px-20 bd-one bd-ra-4 bd-c-main-color bg-white text-main-color fs-14 fw-600 lh-14">{{__('Cancel')}}</button>
      <button type="submit" class="py-13 px-20 bd-one bd-ra-4 bd-c-primary-color bg-primary-color text-white fs-14 fw-600 lh-14">{{__('Save')}}</button>
    </div>
  </form>
