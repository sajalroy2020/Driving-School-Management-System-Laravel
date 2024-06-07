<!-- Top -->
<div class="d-flex justify-content-between align-items-center bd-b-one bd-c-stroke pb-20 mb-20">
    <h4 class="fs-18 fw-600 lh-18 text-main-color">{{__('Edit Packages')}}</h4>
    <button type="button" class="border-0 p-0 bg-transparent text-para-text" data-bs-dismiss="modal" aria-label="Close">
        <i class="fa-solid fa-times"></i></button>
</div>
<!--  -->
<form class="ajax-request reset" action="{{route('admin.packages.store')}}" method="POST"
      data-handler="commonResponse" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{encrypt($packages->id)}}">
    <div class="row rg-20 pb-25">
        <div class="col-12">
            <label for="addRoleStatus" class="sf-form-label">{{__('Category Name')}} <span
                    class="text-red">*</span></label>
            <select class="sf-select-without-search" name="category">
                <option value="">{{__("Select Category")}}</option>
                @foreach ($category as $data)
                    <option
                        {{$packages->category_id == $data->id ? 'selected' : ''}} value="{{$data->id}}">{{$data->category_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-12">
            <label for="package_name" class="sf-form-label">{{__('Package Name')}} <span
                    class="text-red">*</span></label>
            <input type="text" value="{{$packages->package_name}}" name="package_name"
                   class="form-control sf-form-control" id="package_name" placeholder="Package Name"/>
        </div>
        <div class="col-12">
            <label for="price" class="sf-form-label">{{__('Package Cost')}} <span class="text-red">*</span></label>
            <input value="{{$packages->price}}" type="number" name="price" class="form-control sf-form-control"
                   id="price" placeholder="0.00"/>
        </div>
        <div class="col-6">
            <label for="duration_time" class="sf-form-label">{{__('Duration')}} <span
                    class="text-red">*</span></label>
            <input type="number" value="{{$packages->duration_time}}" name="duration_time"
                   class="form-control sf-form-control" id="duration_time" placeholder="{{__("Enter Duration")}}"/>
        </div>
        <div class="col-6">
            <label for="duration_type" class="sf-form-label">{{__('Duration Type')}} <span
                    class="text-red">*</span></label>
            <select class="sf-select-without-search" name="duration_type">
                <option value="">{{__("Select Duration Type")}}</option>
                <option
                    {{$packages->duration_type == DURATION_TYPE_DAY ? 'selected' : ''}} value="{{DURATION_TYPE_DAY}}">{{__("Day")}}</option>
                <option
                    {{$packages->duration_type == DURATION_TYPE_MONTH ? 'selected' : ''}} value="{{DURATION_TYPE_MONTH}}">{{__('Month')}}</option>
            </select>
        </div>
        <div class="col-12">
            <label for="addRoleName" class="sf-form-label">{{__('Add Instructor')}} <span
                    class="text-red">*</span></label>
            <div
                class="flex-shrink-0 flex-grow-1 w-190 h-42 d-flex align-items-center align-self-stretch g-8 bg-white px-16 bd-one bd-c-stroke bd-ra-8">
                <div class="flex-shrink-0 d-flex">
                    <img src="{{asset('assets/images/icon/project-members.svg')}}" alt=""/>
                </div>
                <div class="dropdown dropdown-three w-100">
                    <button class="dropdown-toggle p-0 rounded-0 border-0" type="button" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" aria-expanded="false">{{__('Select Instructor')}}</button>
                    <ul class="dropdown-menu">
                        @foreach ($instructor as $data)
                            <li>
                                <div class="dropdown-item">
                                    <div class="d-flex align-items-center g-10">
                                        <input
                                            {{ in_array($data->id, json_decode($packages->instructors_id)) ? 'checked' : '' }} type="checkbox"
                                            name="instructors[]" value="{{$data->id}}"
                                            class="form-check-input mt-0 shadow-none" id="assignSpecialApproval1"/>
                                        <label for="assignSpecialApproval1">
                                            <div class="d-flex align-items-center g-8">
                                                <div class="flex-shrink-0 w-25 h-25 rounded-circle overflow-hidden"><img
                                                        src="{{getFileLink($data->picture)}}" alt=""/></div>
                                                <div class="content">
                                                    <p class="fs-12 fw-600 lh-16 text-textBlack">{{$data->name}}</p>
                                                    <p class="fs-12 fw-600 lh-13 text-para-text">{{__('Instructor')}}</p>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="instructors_id"></div>
        </div>
        <div class="col-12">
            <label for="eInputBody" class="sf-form-label">{{__("Description")}}</label>
            <textarea name="description" type="text"
                      class="form-control sf-form-control summernoteOne" id="eInputBody"
                      placeholder="{{__("Write your description")}}">{!! $packages->description !!}</textarea>
        </div>
        <div class="col-12">
            <div class="zForm-wrap zImage-upload-details">
                <div class="zImage-inside">
                    <div class="d-flex pb-12"><img src="{{asset("assets/images/icon/cloud-upload.svg")}}" alt=""/></div>
                    <p class="fs-15 fw-500 lh-16 text-1b1c17">{{__('Drag & drop files here')}}</p>
                </div>
                <label for="zImageUpload" class="sf-form-label">{{__('Add Image')}}</label>
                <div class="upload-img-box">
                    <img src="{{getFileLink($packages->image)}}"/>
                    <input type="file" name="image" id="zImageUpload" accept="image/*"
                           onchange="previewFile(this)"/>
                </div>
            </div>
        </div>
        <div class="col-12">
            <label for="addRoleStatus" class="sf-form-label">{{__('Status')}}</label>
            <select class="sf-select-without-search" name="status">
                <option
                    {{$packages->status == STATUS_ACTIVE ? 'selected' : ''}} value="{{STATUS_ACTIVE}}">{{__("Active")}}</option>
                <option
                    {{$packages->status == STATUS_DEACTIVATE ? 'selected' : ''}} value="{{STATUS_DEACTIVATE}}">{{__('Deactivate')}}</option>
            </select>
        </div>
    </div>
    <div class="bd-t-one bd-c-stroke pt-17 d-flex g-10">
        <button type="button" data-bs-dismiss="modal" aria-label="Close"
                class="py-13 px-20 bd-one bd-ra-4 bd-c-main-color bg-white text-main-color fs-14 fw-600 lh-14">{{__('Cancel')}}</button>
        <button type="submit"
                class="py-13 px-20 bd-one bd-ra-4 bd-c-primary-color bg-primary-color text-white fs-14 fw-600 lh-14">{{__('Update')}}</button>
    </div>
</form>
