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
                        <button class="py-13 pr-15 pl-10 bd-one bd-c-primary-color bg-primary-color bd-ra-4 fs-14 fw-500 lh-14 text-white" data-bs-toggle="modal" data-bs-target="#addModal">+ {{__('Add Question')}}</button>
                    </div>
                    <table class="table zTable zTable-last-item-right" id="questionDataTable">
                        <thead>
                        <tr>
                            <th>
                                <div class="text-nowrap">{{__('Question Name')}}</div>
                            </th>
                            <th>
                                <div class="text-nowrap">{{__('Question Type')}}</div>
                            </th>
                            <th>
                                <div class="text-nowrap">{{__('Mark')}}</div>
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
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addRoleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content border-0 bd-ra-4 p-20">
          <!-- Top -->
          <div class="d-flex justify-content-between align-items-center bd-b-one bd-c-stroke pb-20 mb-20">
            <h4 class="fs-18 fw-600 lh-18 text-main-color">{{__('Add Question')}}</h4>
            <button type="button" class="border-0 p-0 bg-transparent text-para-text" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i></button>
          </div>
          <!--  -->
          <form class="ajax-request reset" action="{{route('admin.question.store')}}" method="POST"
          data-handler="commonResponse">
          @csrf
            <div class="row rg-20 pb-25">
              <div class="col-12">
                <label for="addRoleName" class="sf-form-label">{{__('Question Title')}} <span class="text-red">*</span></label>
                <input type="text" name="question_title" class="form-control sf-form-control" placeholder="{{__('Enter Question Title')}}" />
              </div>
              <div class="col-12">
                <label for="addRoleStatus" class="sf-form-label">{{__('Question Type')}} <span class="text-red">*</span></label>
                <select class="sf-select-without-search questionType" name="question_type">
                  <option value="">{{__("Select Question Type")}}</option>
                  <option value="{{QUESTION_TYPE_TEXT}}">{{__("Simple Text")}}</option>
                  <option value="{{QUESTION_TYPE_SELECT_ONE}}">{{__('Select One')}}</option>
                  <option value="{{QUESTION_TYPE_SELECT_MANY}}">{{__('Select Many')}}</option>
                </select>
              </div>

                <span class="allAnsOption">
                    <div class="d-flex justify-content-between align-items-center addMoreDiv">
                        <p>{{__('Question Option')}}</p>
                        <button class="border-0 bd-ra-12 py-13 px-25 bg-cancel fs-16 fw-600 lh-19 text-main-color addMore">{{__('Add More')}}</button>
                    </div>
                    <div class="col-12 singleRow">
                        <div class="d-flex justify-content-between align-items-center pt-20">
                            <input class="form-check-input h4 mr-5 questionOption rightAns" name="right_ans[]" type="radio" value="0">
                            <div class="right_ans"></div>
                            <input type="text" name="question_option[]" class="form-control sf-form-control questionOption" placeholder="{{__('Enter Question Answare')}}" />
                            <div class="pl-5">
                                <button class="border-0 bd-ra-12 py-13 px-17 bg-cancel fs-16 fw-600 lh-19 text-danger removeAddMore">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </div>
                        <div class="question_option"></div>
                    </div>
                    <div id="addMoreDiv"></div>
                </span>

              <div class="col-12">
                <label for="addRoleName" class="sf-form-label">{{__('Question Mark')}} <span class="text-red">*</span></label>
                <input type="number" name="question_mark" class="form-control sf-form-control" placeholder="{{__('Enter Question Mark')}}" />
              </div>
              <div class="col-12">
                <label for="addRoleStatus" class="sf-form-label">{{__('Status')}}</label>
                <select class="sf-select-without-search" name="status">
                  <option value="{{STATUS_ACTIVE}}">{{__("Active")}}</option>
                  <option value="{{STATUS_DEACTIVATE}}">{{__('Deactivate')}}</option>
                </select>
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
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 bd-ra-4 p-20">
            </div>
        </div>
    </div>

    <input type="hidden" id="question-list-route" value="{{route('admin.question.list')}}">
@endsection
@push('script')
    <script src="{{asset('assets/custom/admin/js/question.js')}}"></script>
@endpush
