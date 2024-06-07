 <!-- Top -->
<div class="d-flex justify-content-between align-items-center bd-b-one bd-c-stroke pb-20 mb-20">
    <h4 class="fs-18 fw-600 lh-18 text-main-color">{{$pageTitle}}</h4>
    <button type="button" class="border-0 p-0 bg-transparent text-para-text" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i></button>
</div>
  <!--  -->
<form class="ajax-request reset" action="{{route('admin.setting.frontend-setting.section-configuration.update')}}" method="POST"
  data-handler="commonResponse" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="id" value="{{encrypt($section->id)}}">
  <input type="hidden" name="slug" value="{{$section->slug}}">

  @if ($section->slug == 'hero section')
    <div class="row rg-20 pb-25">
        <div class="col-12">
            <label for="addRoleName" class="sf-form-label">{{__('Title')}} <span class="text-red">*</span></label>
            <input value="{{$section->title}}" type="text" name="title" class="form-control sf-form-control" placeholder="{{__('Title')}}" />
        </div>
        <div class="col-12">
            <label for="eInputBody" class="sf-form-label">{{__("Description")}} <span class="text-red">*</span></label>
            <textarea name="description" type="text" rows="7"
                      class="form-control sf-form-control" id="eInputBody"
                      placeholder="{{__("Write your description")}}">{!! $section->description !!}</textarea>
        </div>
        <div class="col-12">
            <div class="zForm-wrap zImage-upload-details">
              <div class="zImage-inside">
                <div class="d-flex pb-12"><img src="assets/images/icon/cloud-upload.svg" alt="" /></div>
                <p class="fs-15 fw-500 lh-16 text-1b1c17">{{__('Drag & drop files here')}}</p>
              </div>
              <label for="zImageUpload" class="sf-form-label">{{__('Background Image')}}</label>
              <div class="upload-img-box">
                <img src="{{getFileLink($section->background_image)}}" />
                <input type="file" name="background_image" id="zImageUpload" accept="image/*,video/*" onchange="previewFile(this)" />
              </div>
            </div>
          </div>
        <div class="col-12">
            <label for="addRoleStatus" class="sf-form-label">{{__('Status')}}</label>
            <select class="sf-select-without-search" name="is_section_show">
                <option {{$section->is_section_show == STATUS_ACTIVE ? 'selected' : ''}} value="{{STATUS_ACTIVE}}">{{__("Show")}}</option>
                <option {{$section->is_section_show == STATUS_DEACTIVATE ? 'selected' : ''}} value="{{STATUS_DEACTIVATE}}">{{__('Hide')}}</option>
            </select>
        </div>
    </div>
  @elseif ($section->slug == 'about us')
    <div class="row rg-20 pb-25">
        <div class="col-12">
            <label for="addRoleName" class="sf-form-label">{{__('Section Name')}} <span class="text-red">*</span></label>
            <input type="text" value="{{$section->section_name}}" name="section_name" class="form-control sf-form-control" placeholder="{{__('Section Name')}}" />
        </div>
        <div class="col-12">
            <label for="addRoleName" class="sf-form-label">{{__('Title')}} <span class="text-red">*</span></label>
            <input value="{{$section->title}}" type="text" name="title" class="form-control sf-form-control" placeholder="{{__('Title')}}" />
        </div>
        <div class="col-12">
            <label for="eInputBody" class="sf-form-label">{{__("Description")}} <span class="text-red">*</span></label>
            <textarea name="description" type="text" rows="7"
                      class="form-control sf-form-control" id="eInputBody"
                      placeholder="{{__("Write your description")}}">{!! $section->description !!}</textarea>
        </div>
        <div class="col-12">
            <div class="zForm-wrap zImage-upload-details">
              <div class="zImage-inside">
                <div class="d-flex pb-12"><img src="assets/images/icon/cloud-upload.svg" alt="" /></div>
                <p class="fs-15 fw-500 lh-16 text-1b1c17">{{__('Drag & drop files here')}}</p>
              </div>
              <label for="zImageUpload" class="sf-form-label">{{__('Background Image')}}</label>
              <div class="upload-img-box">
                <img src="{{getFileLink($section->background_image)}}" />
                <input type="file" name="background_image" id="zImageUpload" accept="image/*,video/*" onchange="previewFile(this)" />
              </div>
            </div>
          </div>
        <div class="col-12">
            <label for="addRoleStatus" class="sf-form-label">{{__('Status')}}</label>
            <select class="sf-select-without-search" name="is_section_show">
                <option {{$section->is_section_show == STATUS_ACTIVE ? 'selected' : ''}} value="{{STATUS_ACTIVE}}">{{__("Show")}}</option>
                <option {{$section->is_section_show == STATUS_DEACTIVATE ? 'selected' : ''}} value="{{STATUS_DEACTIVATE}}">{{__('Hide')}}</option>
            </select>
        </div>
    </div>
  @elseif ($section->slug == 'achievement')
    <div class="row rg-20 pb-25">
        <div class="col-12">
            <div class="zForm-wrap zImage-upload-details">
              <div class="zImage-inside">
                <div class="d-flex pb-12"><img src="assets/images/icon/cloud-upload.svg" alt="" /></div>
                <p class="fs-15 fw-500 lh-16 text-1b1c17">{{__('Drag & drop files here')}}</p>
              </div>
              <label for="zImageUpload" class="sf-form-label">{{__('Background Image')}}</label>
              <div class="upload-img-box">
                <img src="{{getFileLink($section->background_image)}}" />
                <input type="file" name="background_image" id="zImageUpload" accept="image/*,video/*" onchange="previewFile(this)" />
              </div>
            </div>
          </div>
        <div class="col-12">
            <label for="addRoleStatus" class="sf-form-label">{{__('Status')}}</label>
            <select class="sf-select-without-search" name="is_section_show">
                <option {{$section->is_section_show == STATUS_ACTIVE ? 'selected' : ''}} value="{{STATUS_ACTIVE}}">{{__("Show")}}</option>
                <option {{$section->is_section_show == STATUS_DEACTIVATE ? 'selected' : ''}} value="{{STATUS_DEACTIVATE}}">{{__('Hide')}}</option>
            </select>
        </div>
    </div>
  @elseif ($section->slug == 'our courses' || $section->slug == 'our gallery')
    <div class="row rg-20 pb-25">
        <div class="col-12">
            <label for="addRoleName" class="sf-form-label">{{__('Section Name')}} <span class="text-red">*</span></label>
            <input type="text" value="{{$section->section_name}}" name="section_name" class="form-control sf-form-control" placeholder="{{__('Section Name')}}" />
        </div>
        <div class="col-12">
            <label for="addRoleName" class="sf-form-label">{{__('Title')}} <span class="text-red">*</span></label>
            <input value="{{$section->title}}" type="text" name="title" class="form-control sf-form-control" placeholder="{{__('Title')}}" />
        </div>
        <div class="col-12">
            <label for="eInputBody" class="sf-form-label">{{__("Description")}} <span class="text-red">*</span></label>
            <textarea name="description" type="text" rows="7"
                    class="form-control sf-form-control" id="eInputBody"
                    placeholder="{{__("Write your description")}}">{!! $section->description !!}</textarea>
        </div>
        <div class="col-12">
            <label for="addRoleStatus" class="sf-form-label">{{__('Status')}}</label>
            <select class="sf-select-without-search" name="is_section_show">
                <option {{$section->is_section_show == STATUS_ACTIVE ? 'selected' : ''}} value="{{STATUS_ACTIVE}}">{{__("Show")}}</option>
                <option {{$section->is_section_show == STATUS_DEACTIVATE ? 'selected' : ''}} value="{{STATUS_DEACTIVATE}}">{{__('Hide')}}</option>
            </select>
        </div>
    </div>
  @elseif ($section->slug == 'our instructor')
  <div class="row rg-20 pb-25">
        <div class="col-12">
            <label for="addRoleName" class="sf-form-label">{{__('Title')}} <span class="text-red">*</span></label>
            <input value="{{$section->title}}" type="text" name="title" class="form-control sf-form-control" placeholder="{{__('Title')}}" />
        </div>
        <div class="col-12">
            <label for="eInputBody" class="sf-form-label">{{__("Description")}} <span class="text-red">*</span></label>
            <textarea name="description" type="text" rows="7"
                      class="form-control sf-form-control" id="eInputBody"
                      placeholder="{{__("Write your description")}}">{!! $section->description !!}</textarea>
        </div>
        <div class="col-12">
            <div class="zForm-wrap zImage-upload-details">
              <div class="zImage-inside">
                <div class="d-flex pb-12"><img src="assets/images/icon/cloud-upload.svg" alt="" /></div>
                <p class="fs-15 fw-500 lh-16 text-1b1c17">{{__('Drag & drop files here')}}</p>
              </div>
              <label for="zImageUpload" class="sf-form-label">{{__('Background Image')}}</label>
              <div class="upload-img-box">
                <img src="{{getFileLink($section->background_image)}}" />
                <input type="file" name="background_image" id="zImageUpload" accept="image/*,video/*" onchange="previewFile(this)" />
              </div>
            </div>
          </div>
        <div class="col-12">
            <label for="addRoleStatus" class="sf-form-label">{{__('Status')}}</label>
            <select class="sf-select-without-search" name="is_section_show">
                <option {{$section->is_section_show == STATUS_ACTIVE ? 'selected' : ''}} value="{{STATUS_ACTIVE}}">{{__("Show")}}</option>
                <option {{$section->is_section_show == STATUS_DEACTIVATE ? 'selected' : ''}} value="{{STATUS_DEACTIVATE}}">{{__('Hide')}}</option>
            </select>
        </div>
    </div>
  @elseif ($section->slug == 'faq')
  <div class="row rg-20 pb-25">
        <div class="col-12">
            <label for="addRoleName" class="sf-form-label">{{__('Title')}} <span class="text-red">*</span></label>
            <input value="{{$section->title}}" type="text" name="title" class="form-control sf-form-control" placeholder="{{__('Title')}}" />
        </div>
        <div class="col-12">
            <label for="eInputBody" class="sf-form-label">{{__("Description")}} <span class="text-red">*</span></label>
            <textarea name="description" type="text" rows="7"
                      class="form-control sf-form-control" id="eInputBody"
                      placeholder="{{__("Write your description")}}">{!! $section->description !!}</textarea>
        </div>
        <div class="col-12">
            <label for="addRoleStatus" class="sf-form-label">{{__('Status')}}</label>
            <select class="sf-select-without-search" name="is_section_show">
                <option {{$section->is_section_show == STATUS_ACTIVE ? 'selected' : ''}} value="{{STATUS_ACTIVE}}">{{__("Show")}}</option>
                <option {{$section->is_section_show == STATUS_DEACTIVATE ? 'selected' : ''}} value="{{STATUS_DEACTIVATE}}">{{__('Hide')}}</option>
            </select>
        </div>
    </div>
  @elseif ($section->slug == 'testimonials' || $section->slug == 'contact us')
    <div class="row rg-20 pb-25">
        <div class="col-12">
            <label for="addRoleName" class="sf-form-label">{{__('Section Name')}} <span class="text-red">*</span></label>
            <input type="text" value="{{$section->section_name}}" name="section_name" class="form-control sf-form-control" placeholder="{{__('Section Name')}}" />
        </div>
        <div class="col-12">
            <label for="addRoleName" class="sf-form-label">{{__('Title')}} <span class="text-red">*</span></label>
            <input value="{{$section->title}}" type="text" name="title" class="form-control sf-form-control" placeholder="{{__('Title')}}" />
        </div>
        <div class="col-12">
            <label for="eInputBody" class="sf-form-label">{{__("Description")}} <span class="text-red">*</span></label>
            <textarea name="description" type="text" rows="7"
                      class="form-control sf-form-control" id="eInputBody"
                      placeholder="{{__("Write your description")}}">{!! $section->description !!}</textarea>
        </div>
        <div class="col-12">
            <label for="addRoleStatus" class="sf-form-label">{{__('Status')}}</label>
            <select class="sf-select-without-search" name="is_section_show">
                <option {{$section->is_section_show == STATUS_ACTIVE ? 'selected' : ''}} value="{{STATUS_ACTIVE}}">{{__("Show")}}</option>
                <option {{$section->is_section_show == STATUS_DEACTIVATE ? 'selected' : ''}} value="{{STATUS_DEACTIVATE}}">{{__('Hide')}}</option>
            </select>
        </div>
    </div>
  @endif
    <div class="bd-t-one bd-c-stroke pt-17 d-flex g-10">
      <button type="button" data-bs-dismiss="modal" aria-label="Close" class="py-13 px-20 bd-one bd-ra-4 bd-c-main-color bg-white text-main-color fs-14 fw-600 lh-14">{{__('Cancel')}}</button>
      <button type="submit" class="py-13 px-20 bd-one bd-ra-4 bd-c-primary-color bg-primary-color text-white fs-14 fw-600 lh-14">{{__('Update')}}</button>
    </div>
</form>
