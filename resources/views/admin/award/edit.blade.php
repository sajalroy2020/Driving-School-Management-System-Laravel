<!-- Top -->
<div class="d-flex justify-content-between align-items-center bd-b-one bd-c-stroke pb-20 mb-20">
    <h4 class="fs-18 fw-600 lh-18 text-main-color">{{__('Edit Award')}}</h4>
    <button type="button" class="border-0 p-0 bg-transparent text-para-text" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i></button>
  </div>
  <!--  -->
  <form class="ajax-request reset" action="{{route('admin.award.store')}}" method="POST"
  data-handler="commonResponse" enctype="multipart/form-data">
  @csrf
    <div class="row rg-20 pb-25">
        <input type="hidden" name="id" value="{{encrypt($award->id)}}">
        <div class="col-12">
            <label for="addRoleName" class="sf-form-label">{{__('Award Title')}} <span class="text-red">*</span></label>
            <input value="{{$award->title}}" type="text" name="title" class="form-control sf-form-control" placeholder="{{__('Award Title')}}" />
        </div>

        <div class="col-12">
            <label for="eInputBody" class="sf-form-label">{{__("Description")}} <span class="text-red">*</span></label>
            <textarea name="description" type="text"
                      class="form-control sf-form-control summernoteOne" id="eInputBody"
                      placeholder="{{__("Write your description")}}">{{$award->description}}</textarea>
        </div>
        <div class="col-12">
            <div class="zForm-wrap zImage-upload-details">
              <div class="zImage-inside">
                <div class="d-flex pb-12"><img src="assets/images/icon/cloud-upload.svg" alt="" /></div>
                <p class="fs-15 fw-500 lh-16 text-1b1c17">{{__('Drag & drop files here')}}</p>
              </div>
              <label for="zImageUpload" class="sf-form-label">{{__('Add Image')}}</label>
              <div class="upload-img-box">
                <img src="{{getFileLink($award->image)}}" />
                <input type="file" name="image" id="zImageUpload" accept="image/*,video/*" onchange="previewFile(this)" />
              </div>
            </div>
        </div>
    </div>
    <div class="bd-t-one bd-c-stroke pt-17 d-flex g-10">
      <button type="button" data-bs-dismiss="modal" aria-label="Close" class="py-13 px-20 bd-one bd-ra-4 bd-c-main-color bg-white text-main-color fs-14 fw-600 lh-14">{{__('Cancel')}}</button>
      <button type="submit" class="py-13 px-20 bd-one bd-ra-4 bd-c-primary-color bg-primary-color text-white fs-14 fw-600 lh-14">{{__('Update')}}</button>
    </div>
  </form>
