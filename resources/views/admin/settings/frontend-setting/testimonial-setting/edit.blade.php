<!-- Top -->
<div class="d-flex justify-content-between align-items-center bd-b-one bd-c-stroke pb-20 mb-20">
    <h4 class="fs-18 fw-600 lh-18 text-main-color">{{__('Add Testimonial')}}</h4>
    <button type="button" class="border-0 p-0 bg-transparent text-para-text" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i></button>
  </div>
  <!--  -->
  <form class="ajax-request reset" action="{{route('admin.setting.frontend-setting.testimonial.store')}}" method="POST"
  data-handler="commonResponse" enctype="multipart/form-data">
  @csrf

    <input type="hidden" name="id" value="{{encrypt($testimonial->id)}}">
    <div class="row rg-20 pb-25">
      <div class="col-12">
          <label for="addRoleName" class="sf-form-label">{{__('Quotation Text')}}</label>
          <input type="text" value="{{$testimonial->quotation_text}}" name="quotation_text" class="form-control sf-form-control" placeholder="{{__('Enter Quotation Text')}}" />
      </div>
      <div class="col-12">
        <label for="addRoleName" class="sf-form-label">{{__('Title')}} <span class="text-red">*</span></label>
        <input type="text" value="{{$testimonial->title}}" name="title" class="form-control sf-form-control" placeholder="{{__('Enter Faq Title')}}" />
      </div>
      <div class="col-12">
          <label for="addRoleName" class="sf-form-label">{{__('Comment')}} <span class="text-red">*</span></label>
          <textarea name="comment" type="text"
          class="form-control sf-form-control" placeholder="{{__("Write your comment")}}">{{$testimonial->comment}}</textarea>
      </div>
      <div class="d-flex g-28">
           <div class="form-check">
              <input type="radio" {{$testimonial->student_type == 1 ? 'checked' : ''}} name="student_type" value="1"  class="studentType form-check-input zForm-all-checkbox h-20 w-20 mt-2 border-dark">
              <label class="form-check-label" for="flexRadioDefault1">
                {{__('Existing Student')}}
              </label>
            </div>
            <div class="form-check">
              <input type="radio" {{$testimonial->student_type == 2 ? 'checked' : ''}} name="student_type" value="2" class="studentType form-check-input zForm-all-checkbox h-20 w-20 mt-2 border-dark">
              <label class="form-check-label" for="flexRadioDefault2">
                  {{__('Custom Student')}}
              </label>
            </div>
      </div>

        <div class="col-12 existingStudent {{$testimonial->student_type != 1 ? 'd-none' : ''}}">
            <label for="addRoleStatus" class="sf-form-label">{{__('Student')}} <span class="text-red">*</span></label>
            <select class="sf-select-without-search" name="student_id">
            <option value="">{{__("Select Student")}}</option>
            @foreach ($allStudent as $student)
                <option {{$testimonial->student_id == $student->id ? 'selected' : ''}} value="{{$student->id}}">{{$student->name}}</option>
            @endforeach
            </select>
        </div>
        <div class="customStudent {{$testimonial->student_type != 2 ? 'd-none' : ''}}">
            <div class="col-12">
                <label for="addRoleName" class="sf-form-label">{{__('Name')}} <span class="text-red">*</span></label>
                <input type="text" value="{{$testimonial->name}}" name="name" class="form-control sf-form-control" placeholder="{{__('Enter Name')}}" />
            </div>
            <div class="col-12">
                <div class="zForm-wrap zImage-upload-details pt-20">
                <div class="zImage-inside">
                    <div class="d-flex pb-12"><img src="assets/images/icon/cloud-upload.svg" alt="" /></div>
                    <p class="fs-15 fw-500 lh-16 text-1b1c17">{{__('Drag & drop files here')}}</p>
                </div>
                <label for="zImageUpload" class="sf-form-label">{{__('Image')}}</label>
                <div class="upload-img-box">
                    <img src="{{getFileLink($testimonial->image)}}" />
                    <input type="file" name="image" id="zImageUpload" accept="image/*,video/*" onchange="previewFile(this)" />
                </div>
                </div>
            </div>
        </div>

      <div class="col-12">
        <label for="addRoleStatus" class="sf-form-label">{{__('Status')}}</label>
        <select class="sf-select-without-search" name="status">
          <option {{$testimonial->status == STATUS_ACTIVE ? 'selected' : ''}} value="{{STATUS_ACTIVE}}">{{__("Active")}}</option>
          <option {{$testimonial->status == STATUS_DEACTIVATE ? 'selected' : ''}} value="{{STATUS_DEACTIVATE}}">{{__('Deactive')}}</option>
        </select>
      </div>
    </div>
    <div class="bd-t-one bd-c-stroke pt-17 d-flex g-10">
      <button type="button" data-bs-dismiss="modal" aria-label="Close" class="py-13 px-20 bd-one bd-ra-4 bd-c-main-color bg-white text-main-color fs-14 fw-600 lh-14">{{__('Cancel')}}</button>
      <button type="submit" class="py-13 px-20 bd-one bd-ra-4 bd-c-primary-color bg-primary-color text-white fs-14 fw-600 lh-14">{{__('Save')}}</button>
    </div>
  </form>
