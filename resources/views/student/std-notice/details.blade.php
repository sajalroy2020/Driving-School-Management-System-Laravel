<!-- Top -->
<div class="d-flex justify-content-between align-items-center bd-b-one bd-c-stroke pb-20 mb-20">
    <h4 class="fs-18 fw-600 lh-18 text-main-color">{{$pageTitle}}</h4>
    <button type="button" class="border-0 p-0 bg-transparent text-para-text" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i></button>
</div>
<!--  -->
<div class="row rg-20 mx-0">
    <div class="w-100 bg-secondary px-20 pt-20 pb-8 rounded-1">
        <div class="zForm-wrap pb-15 d-flex align-items-center g-12">
            <h4 class="fs-18 fw-600">{{__("Notice Title")}}:</h4>
            <p class="fs-16 fw-600">{{$notice->notice_title}}</p>
        </div>
        <div class="zForm-wrap pb-10">
            <h4 class="fs-18 fw-600">{{__("Description")}}: </h4>
            <p class="p-5 fs-16 fw-600">{!! $notice->notice_description !!}</p>
        </div>

        <div class="zForm-wrap pb-10 d-flex align-items-center g-5">
            <h4 class="fs-18 fw-600">{{__("Created At")}}: </h4>
            <p class="fs-16 fw-600">{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',
                $notice->created_at)->format('jS F, h:i:s A')}}</p>
        </div>
    </div>

</div>
