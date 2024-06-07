@extends('layouts.app')
@push('title')
   {{$pageTitle}}
@endpush

@section('content')

    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">
        <div class="row rg-20">
            <div class="col-12">
                <div class="bd-ra-15 bg-white p-sm-30 p-15 mb-30">
                    <div class="table-wrapTop d-flex align-items-center justify-content-center justify-content-md-between flex-wrap g-10 pb-18">
                        <div class="d-flex justify-content-center justify-content-sm-start g-10 flex-wrap">
                            <div class="search-one flex-grow-1 max-w-207">
                              <button class="icon"><img src="{{asset('assets/images/icon/search.svg')}}" alt="" /></button>
                              <input type="text" placeholder="Search here..." id="dataTableSearch" />
                            </div>
                        </div>
                        <button class="py-13 pr-15 pl-10 bd-one bd-c-primary-color bg-primary-color bd-ra-4 fs-14 fw-500 lh-14 text-white" data-bs-toggle="modal" data-bs-target="#addIncomeExpenseModal">+ {{__('Add Expense')}}</button>
                    </div>
                    <table class="table zTable zTable-last-item-right" id="incomeExpenseDataTable">
                        <thead>
                            <tr>
                                <th>
                                    <div class="text-nowrap">{{__('Expense Id')}}</div>
                                </th>
                                <th>
                                    <div class="text-nowrap">{{__('Type')}}</div>
                                </th>
                                <th>
                                    <div class="text-nowrap">{{__('Purpose')}}</div>
                                </th>
                                <th>
                                    <div class="text-nowrap">{{__('Amount')}}</div>
                                </th>
                                <th>
                                    <div class="text-nowrap">{{__('Date')}}</div>
                                </th>
                                <th>
                                    <div>{{__('Status')}}</div>
                                </th>
                                <th>
                                    <div>{{__('Action')}}</div>
                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Add model --}}
    <div class="modal fade" id="addIncomeExpenseModal" tabindex="-1" aria-labelledby="addRoleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content border-0 bd-ra-4 p-20">
            <!-- Top -->
            <div class="d-flex justify-content-between align-items-center bd-b-one bd-c-stroke pb-20 mb-20">
                <h4 class="fs-18 fw-600 lh-18 text-main-color">{{__('Add Income/Expense')}}</h4>
                <button type="button" class="border-0 p-0 bg-transparent text-para-text" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i></button>
            </div>
            <!--  -->
            <form class="ajax-request reset" action="{{route('admin.income-expense.store')}}" method="POST"
                  data-handler="commonResponse" enctype="multipart/form-data">
                @csrf
                <div class="row rg-20 pb-25">
                    <input type="hidden" name="type" value="{{INCOME_EXPENSE_TYPE_EXPENSE}}">

                    <div class="col-12">
                        <label for="addRoleName" class="sf-form-label">{{__('Voucher No')}} </label>
                        <input value="" type="text" name="voucher_no" class="form-control sf-form-control" placeholder="{{__("Voucher No")}}"/>
                    </div>
                    <div class="col-12">
                        <label for="addRoleName" class="sf-form-label">{{__('Purpose')}} <span class="text-red">*</span></label>
                        <input value="" type="text" name="purpose" class="form-control sf-form-control" placeholder="{{__("Purpose")}}"/>
                    </div>

                    <div class="col-12">
                        <label for="addRoleName" class="sf-form-label">{{__('Amount')}} <span class="text-red">*</span></label>
                        <input value="" type="number" name="amount" class="form-control sf-form-control" min="1" placeholder="00.00"/>
                    </div>
                    <div class="col-12">
                        <label for="addRoleName" class="sf-form-label">{{__('Date')}} <span class="text-red">*</span></label>
                        <input value="" type="date" name="date" class="form-control sf-form-control"  placeholder=""/>
                    </div>

                    <div class="col-12">
                        <label for="eInputBody" class="sf-form-label">{{__("Note")}} </label>
                        <textarea name="note" type="text"
                                  class="form-control sf-form-control" id="eInputBody"
                                  placeholder="{{__("Write your note")}}"></textarea>
                    </div>
                    <div class="col-12">
                        <div class="zForm-wrap zImage-upload-details">
                            <div class="zImage-inside">
                                <div class="d-flex pb-12"><img src="{{asset('assets/images/icon/cloud-upload.svg')}}" alt="" /></div>
                                <p class="fs-15 fw-500 lh-16 text-1b1c17">{{__('Drag & drop files here')}}</p>
                            </div>
                            <label for="zImageUpload" class="sf-form-label">{{__('Document')}}</label>
                            <div class="upload-img-box">
                                <img src="" />
                                <input type="file" name="image" id="zImageUpload" accept="image/*,video/*" onchange="previewFile(this)" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bd-t-one bd-c-stroke pt-17 d-flex g-10">
                    <button type="button" data-bs-dismiss="modal" aria-label="Close" class="py-13 px-20 bd-one bd-ra-4 bd-c-main-color bg-white text-main-color fs-14 fw-600 lh-14">{{__('Cancel')}}</button>
                    <button type="submit" class="py-13 px-20 bd-one bd-ra-4 bd-c-primary-color bg-primary-color text-white fs-14 fw-600 lh-14">{{__('Save')}}</button>
                </div>
            </form>

        </div>
      </div>
    </div>

    {{-- Edit model --}}
    <div class="modal fade" id="edit-modal" tabindex="-1" aria-labelledby="addRoleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content border-0 bd-ra-4 p-20">
            </div>
        </div>
    </div>

    {{-- view model --}}
    <div class="modal fade" id="view-modal" tabindex="-1" aria-labelledby="addRoleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content border-0 bd-ra-4 p-20">
            </div>
        </div>
    </div>

    <input type="hidden" id="income-expense-route" value="{{route('instructor.expense.list')}}">
@endsection
@push('script')
    <script src="{{asset('assets/custom/admin/js/income_expense.js')}}"></script>
@endpush
