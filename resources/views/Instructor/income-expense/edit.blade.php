<!-- Top -->
<div class="d-flex justify-content-between align-items-center bd-b-one bd-c-stroke pb-20 mb-20">
    <h4 class="fs-18 fw-600 lh-18 text-main-color">{{__('Edit Income/Expense')}}</h4>
    <button type="button" class="border-0 p-0 bg-transparent text-para-text" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i></button>
</div>
<!--  -->
<form class="ajax-request reset" action="{{route('admin.income-expense.store')}}" method="POST"
      data-handler="commonResponse" enctype="multipart/form-data">
    @csrf
    <div class="row rg-20 pb-25">
        <div class="col-md-12">
            <div class="zForm-wrap">
                <input type="hidden" name="id" value="{{encrypt($income_expense_data->id)}}">
                <input type="hidden" name="type" value="{{INCOME_EXPENSE_TYPE_EXPENSE}}">
            </div>
        </div>

        <div class="col-12">
            <label for="addRoleName" class="sf-form-label">{{__('Voucher No')}} </label>
            <input value="{{$income_expense_data->voucher_no}}" type="text" name="voucher_no" class="form-control sf-form-control" placeholder="{{__("Voucher No")}}"/>
        </div>
        <div class="col-12">
            <label for="addRoleName" class="sf-form-label">{{__('Purpose')}} <span class="text-red">*</span></label>
            <input value="{{$income_expense_data->purpose}}" type="text" name="purpose" class="form-control sf-form-control" placeholder="{{__("Purpose")}}"/>
        </div>

        <div class="col-12">
            <label for="addRoleName" class="sf-form-label">{{__('Amount')}} <span class="text-red">*</span></label>
            <input value="{{$income_expense_data->amount}}" type="number" name="amount" class="form-control sf-form-control" min="1" placeholder="00.00"/>
        </div>

        <div class="col-12">
            <label for="addRoleName" class="sf-form-label">{{__('Date')}} <span class="text-red">*</span></label>
            <input value="{{$income_expense_data->date}}" type="date" name="date" class="form-control sf-form-control"  placeholder=""/>
        </div>

        <div class="col-12">
            <label for="eInputBody" class="sf-form-label">{{__("Note")}} </label>
            <textarea name="note" type="text"
                      class="form-control sf-form-control" id="eInputBody"
                      placeholder="{{__("Write your note")}}">{{$income_expense_data->note}}</textarea>
        </div>
        <div class="col-12">
            <div class="zForm-wrap zImage-upload-details">
                <div class="zImage-inside">
                    <div class="d-flex pb-12"><img src="{{asset('assets/images/icon/cloud-upload.svg')}}" alt="" /></div>
                    <p class="fs-15 fw-500 lh-16 text-1b1c17">{{__('Drag & drop files here')}}</p>
                </div>
                <label for="zImageUpload" class="sf-form-label">{{__('Document')}}</label>
                <div class="upload-img-box">
                    <img src="{{getFileLink($income_expense_data->image)}}" />
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
