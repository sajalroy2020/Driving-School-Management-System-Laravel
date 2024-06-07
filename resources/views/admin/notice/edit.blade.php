    <!-- Top -->
    <div class="d-flex justify-content-between align-items-center bd-b-one bd-c-stroke pb-20 mb-20">
      <h4 class="fs-18 fw-600 lh-18 text-main-color">{{$pageTitle}}</h4>
      <button type="button" class="border-0 p-0 bg-transparent text-para-text" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i></button>
    </div>
    <!--  -->
    <form class="ajax-request reset" action="{{route('admin.notice.store')}}" method="POST"
    data-handler="commonResponse">
    @csrf
    <input type="hidden" name="id" value="{{encrypt($notice->id)}}">

        <div class="row rg-20 pb-25">
            <div class="zForm-wrap pb-20">
                <label for="noticeTitle" class="sf-form-label">{{__('Notice Title')}} <span class="text-red">*</span></label>
                <input type="text" name="notice_title" value="{{$notice->notice_title}}" class="form-control sf-form-control" id="noticeTitle" placeholder="{{__("Notice Title")}}" />
            </div>
            <div class="zForm-wrap pb-20">
                <label for="eInputBody" class="sf-form-label">{{__("Description")}}</label>
                <textarea name="notice_description" type="text" class="form-control sf-form-control summernoteOne" id="eInputBody" placeholder="{{__("Write your notice content")}}">
                    {{$notice->notice_description}}
                </textarea>
            </div>
            <div class="zForm-wrap pb-20">
                <label for="addRoleStatus" class="sf-form-label">{{__('Notice For')}}</label>
                <select class="sf-select-without-search" name="notice_for">
                    <option value="{{NOTICE_FOR_ALL}}" {{$notice->notice_for == NOTICE_FOR_ALL ? 'selected' : ''}}>{{__("All")}}</option>
                    <option value="{{NOTICE_FOR_STUDENT}}" {{$notice->notice_for == NOTICE_FOR_STUDENT ? 'selected' : ''}}>{{__('Student')}}</option>
                    <option value="{{NOTICE_FOR_INSTRUCTOR}}" {{$notice->notice_for == NOTICE_FOR_INSTRUCTOR ? 'selected' : ''}}>{{__('Instructor')}}</option>
                </select>
            </div>
            <div class="zForm-wrap pb-20">
                <label for="addRoleStatus" class="sf-form-label">{{__('Status')}}</label>
                <select class="sf-select-without-search" name="status">
                    <option value="{{STATUS_ACTIVE}}" {{$notice->status == STATUS_ACTIVE ? 'selected' : ''}}>{{__("Active")}}</option>
                    <option value="{{STATUS_DEACTIVATE}}" {{$notice->status == STATUS_DEACTIVATE ? 'selected' : ''}}>{{__('Deactivate')}}</option>
                </select>
            </div>
        </div>
      <div class="bd-t-one bd-c-stroke pt-17 d-flex g-10">
        <button type="button" data-bs-dismiss="modal" aria-label="Close" class="py-13 px-20 bd-one bd-ra-4 bd-c-main-color bg-white text-main-color fs-14 fw-600 lh-14">{{__('Cancel')}}</button>
        <button type="submit" class="py-13 px-20 bd-one bd-ra-4 bd-c-primary-color bg-primary-color text-white fs-14 fw-600 lh-14">{{__('Update')}}</button>
      </div>
    </form>
