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
                        <button class="py-13 pr-15 pl-10 bd-one bd-c-primary-color bg-primary-color bd-ra-4 fs-14 fw-500 lh-14 text-white" data-bs-toggle="modal" data-bs-target="#addModal">+ {{__('Add Exam')}}</button>
                    </div>
                    <table class="table zTable zTable-last-item-right" id="examDataTable">
                        <thead>
                        <tr>
                            <th>
                                <div class="text-nowrap">{{__('Exam Title')}}</div>
                            </th>
                            <th>
                                <div class="text-nowrap">{{__('Date')}}</div>
                            </th>
                            <th>
                                <div class="text-nowrap">{{__('Exam Type')}}</div>
                            </th>
                            <th>
                                <div class="text-nowrap">{{__('Total Mark')}}</div>
                            </th>
                            <th>
                                <div class="text-nowrap">{{__('Number of Studnt')}}</div>
                            </th>
                            <th>
                                <div class="text-nowrap">{{__('Number of Question')}}</div>
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
            <h4 class="fs-18 fw-600 lh-18 text-main-color">{{__('Add Exam')}}</h4>
            <button type="button" class="border-0 p-0 bg-transparent text-para-text" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i></button>
          </div>
          <!--  -->
          <form class="ajax-request reset" action="{{route('instructor.exam.store')}}" method="POST"
          data-handler="commonResponse">
          @csrf
            <div class="row rg-20 pb-25">
              <div class="col-12">
                <label for="addRoleName" class="sf-form-label">{{__('Exam Title')}} <span class="text-red">*</span></label>
                <input type="text" name="exam_title" class="form-control sf-form-control" placeholder="{{__('Enter Exam Title')}}" />
              </div>
              <div class="col-12">
                <label for="addRoleStatus" class="sf-form-label">{{__('Exam Type')}} <span class="text-red">*</span></label>
                <select class="sf-select-without-search examType" name="exam_type">
                  <option value="">{{__("Select Exam")}}</option>
                  <option value="{{EXAM_TYPE_PRACTICAL}}">{{__('Practical')}}</option>
                  <option value="{{EXAM_TYPE_THEORETICAL}}">{{__("Theoretical")}}</option>
                </select>
              </div>
              <div class="col-12">
                    <label for="addRoleStatus" class="sf-form-label">{{__('Select Package')}} <span class="text-red">*</span></label>
                    <select class="sf-select-without-search getPackageByStd" name="package_id">
                        <option value="">{{__("Select Package")}}</option>
                        @foreach ($package as $data)
                            <option value="{{$data->id}}">{{$data->package_name}}</option>
                        @endforeach
                    </select>
              </div>
              <div class="col-12">
                <label for="addRoleName" class="sf-form-label">{{__('Assign Student')}} <span class="text-red">*</span></label>
                <div class="flex-shrink-0 flex-grow-1 w-100 h-42 d-flex align-items-center align-self-stretch g-8 bg-white px-16 bd-one bd-c-stroke bd-ra-8">
                    <div class="flex-shrink-0 d-flex">
                        <img src="{{asset('assets/images/icon/project-members.svg')}}" alt="" />
                    </div>
                    <div class="dropdown dropdown-three w-100">
                      <button class="dropdown-toggle p-0 rounded-0 border-0" type="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">{{__('Select Student')}}</button>
                      <ul class="dropdown-menu packageStudent">

                      </ul>
                    </div>
                </div>
                <div class="student_assign"></div>
              </div>
              <div class="col-12 onlineOption">
                <label for="addRoleName" class="sf-form-label">{{__('Add Question')}} <span class="text-red">*</span></label>
                <div class="flex-shrink-0 flex-grow-1 w-100 h-42 d-flex align-items-center align-self-stretch g-8 bg-white px-16 bd-one bd-c-stroke bd-ra-8">
                    <div class="dropdown dropdown-three w-100">
                      <button class="dropdown-toggle p-0 rounded-0 border-0" type="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">{{__('Select Question')}}</button>
                      <ul class="dropdown-menu">
                        @foreach ($question as $data)
                            <li>
                                <div class="dropdown-item">
                                    <div class="d-flex align-items-center g-10">
                                    <input type="checkbox" name="question_assign[]" data-mark="{{$data->question_mark}}" value="{{$data->id}}" class="inputBox form-check-input mt-0 shadow-none" id="assignSpecialApproval1" />
                                    <label for="assignSpecialApproval1">
                                        <div class="d-flex align-items-center g-8">
                                            <div class="content">
                                                <p class="fs-12 fw-600 lh-16 text-textBlack">{{$data->question_title}}</p>
                                                <p class="fs-12 fw-600 lh-13 text-para-text">
                                                    @if ($data->question_type == QUESTION_TYPE_TEXT)
                                                        {{__("Simple Text")}}
                                                    @elseif($data->question_type == QUESTION_TYPE_SELECT_ONE)
                                                        {{__("Select One")}}
                                                    @else
                                                        {{__("Select Many")}}
                                                    @endif
                                                </p>
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
                <div class="question_assign"></div>
              </div>
              <div class="zForm-wrap pb-15">
                <label for="noticeTitle" class="sf-form-label">{{__('Exam Date')}} <span
                        class="text-red">*</span></label>
                <input type="datetime-local" name="exam_date" class="form-control sf-form-control" id="dateTime"
                       placeholder="{{__("Exam Date Time")}}"/>
              </div>
              <div class="col-12">
                <label for="addRoleStatus" class="sf-form-label">{{__('Exam Duration Time (Min)')}} <span class="text-red">*</span></label>
                <input type="number" name="duration_time" class="form-control sf-form-control" placeholder="{{__('Exam Duration Time Minute')}}" />
              </div>
              <div class="col-12">
                <label for="addRoleName" class="sf-form-label">{{__('Total Mark')}} <span class="text-red">*</span></label>
                <input type="number" name="total_mark" class="totalMark totalMarkDisable form-control sf-form-control" placeholder="{{__('Enter Total Mark')}}" />
                <input type="hidden" name="total_mark" class="totalMark inputBox" />
              </div>
              <div class="col-12">
                <label for="addRoleStatus" class="sf-form-label">{{__('Status')}}</label>
                <select class="sf-select-without-search" name="status">
                  <option value="{{EXAM_PENDING}}">{{__("Pending")}}</option>
                  <option value="{{EXAM_CANCEL}}">{{__('Cancel')}}</option>
                  <option value="{{EXAM_RUNNING}}">{{__('Running')}}</option>
                  <option value="{{EXAM_COMPLETED}}">{{__('Completed')}}</option>
                  <option value="{{EXAM_IN_REVIEW}}">{{__('In Review')}}</option>
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

    <input type="hidden" id="exam-list-route" value="{{route('admin.exam.list')}}">
    <input type="hidden" id="get-std-route" value="{{route('admin.exam.get-student')}}">
@endsection
@push('script')
    <script src="{{asset('assets/custom/admin/js/exam.js')}}"></script>
@endpush
