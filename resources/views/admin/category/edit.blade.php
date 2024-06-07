    <!-- Top -->
    <div class="d-flex justify-content-between align-items-center bd-b-one bd-c-stroke pb-20 mb-20">
      <h4 class="fs-18 fw-600 lh-18 text-main-color">{{$pageTitle}}</h4>
      <button type="button" class="border-0 p-0 bg-transparent text-para-text" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i></button>
    </div>
    <!--  -->
    <form class="ajax-request reset" action="{{route('admin.category.store')}}" method="POST"
    data-handler="commonResponse">
    @csrf
    <input type="hidden" name="id" value="{{encrypt($category->id)}}">

      <div class="row rg-20 pb-25">
        <div class="col-12">
          <label for="addRoleName" class="sf-form-label">{{__('Category Name')}} <span class="text-red">*</span></label>
          <input type="text" value="{{$category->category_name}}" name="category_name" class="form-control sf-form-control" id="addRoleName" placeholder="Enter Category Name" />
        </div>
        <div class="col-12">
          <label for="addRoleStatus" class="sf-form-label">{{__('Status')}}</label>
          <select class="sf-select-without-search" name="status">
            <option {{$category->status == STATUS_ACTIVE ? 'selected' : ''}} value="{{STATUS_ACTIVE}}">{{__("Active")}}</option>
            <option {{$category->status == STATUS_DEACTIVATE ? 'selected' : ''}} value="{{STATUS_DEACTIVATE}}">{{__('Deactivate')}}</option>
          </select>
        </div>
      </div>
      <div class="bd-t-one bd-c-stroke pt-17 d-flex g-10">
        <button type="button" data-bs-dismiss="modal" aria-label="Close" class="py-13 px-20 bd-one bd-ra-4 bd-c-main-color bg-white text-main-color fs-14 fw-600 lh-14">{{__('Cancel')}}</button>
        <button type="submit" class="py-13 px-20 bd-one bd-ra-4 bd-c-primary-color bg-primary-color text-white fs-14 fw-600 lh-14">{{__('Update')}}</button>
      </div>
    </form>
