<!-- Top -->
<div class="d-flex justify-content-between align-items-center bd-b-one bd-c-stroke pb-20 mb-20">
    <h4 class="fs-18 fw-600 lh-18 text-main-color">{{__('Expense Details')}}</h4>
    <button type="button" class="border-0 p-0 bg-transparent text-para-text" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i></button>
</div>

<!--  -->
<div class="row rg-20 mx-0">
    <div class="w-100 bg-secondary px-20 pt-20 pb-8 rounded-1">
        <div class="zForm-wrap pb-15 d-flex align-items-center g-12">
            <h4 class="fs-18 fw-600">{{__("Voucher No")}}:</h4>
            <p class="fs-16 fw-600">{{$income_expense_data->voucher_no}}</p>
        </div>
        <div class="zForm-wrap pb-10 d-flex align-items-center g-12">
            <h4 class="fs-18 fw-600">{{__("Purpose")}}: </h4>
            <p class="p-5 fs-16 fw-600">{{$income_expense_data->purpose}}</p>
        </div>
        <div class="zForm-wrap pb-10 d-flex align-items-center g-12">
            <h4 class="fs-18 fw-600">{{__("Amount")}}: </h4>
            <p class="p-5 fs-16 fw-600">{{showCurrency($income_expense_data->amount)}}</p>
        </div>
        <div class="zForm-wrap pb-10">
            <h4 class="fs-18 fw-600">{{__("Note")}}: </h4>
            <p class="p-5 fs-15">{{$income_expense_data->note}}</p>
        </div>
        <div class="col-12">
            <div class="zForm-wrap zImage-upload-details">
                <div class="upload-img-box">
                    <img src="{{getFileLink($income_expense_data->image)}}" />
                </div>
            </div>
        </div>
        <div class="zForm-wrap py-10 d-flex align-items-center g-5">
            <h4 class="fs-18 fw-600">{{__("Date")}}: </h4>
            <p class="fs-16">{{$income_expense_data->date}}</p>
        </div>
    </div>
</div>
