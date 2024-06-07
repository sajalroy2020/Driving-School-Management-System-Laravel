<!-- Top -->
<div class="d-flex justify-content-between align-items-center bd-b-one bd-c-stroke pb-20 mb-20">
    <h4 class="fs-18 fw-600 lh-18 text-main-color">{{__('Mark Assign')}}</h4>
    <button type="button" class="border-0 p-0 bg-transparent text-para-text" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i></button>
</div>
<!--  -->
<form class="ajax-request reset" action="{{route('admin.exam.mark-update')}}" method="POST"
data-handler="commonResponse">
    @csrf

    <input type="hidden" name="id" value="{{encrypt($marking->id)}}">
    <div class="row rg-20 pb-25">
        <div class="col-12">
            <label for="addRoleName" class="sf-form-label">{{__('Mark Assign')}} <span class="text-red">*</span></label>
            <input required type="number" value="{{$marking->assign_mark}}" name="assign_mark" class="form-control sf-form-control" placeholder="0" />
        </div>
    </div>
    <div class="bd-t-one bd-c-stroke pt-17 d-flex g-10">
        <button type="button" data-bs-dismiss="modal" aria-label="Close" class="py-13 px-20 bd-one bd-ra-4 bd-c-main-color bg-white text-main-color fs-14 fw-600 lh-14">{{__('Cancel')}}</button>
        <button type="submit" class="py-13 px-20 bd-one bd-ra-4 bd-c-primary-color bg-primary-color text-white fs-14 fw-600 lh-14">{{__('Update')}}</button>
    </div>
</form>
