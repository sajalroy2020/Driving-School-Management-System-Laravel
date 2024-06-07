<div class="d-flex justify-content-between align-items-center bd-b-one bd-c-stroke pb-20 mb-20">
    <h4 class="fs-18 fw-600 lh-18 text-main-color">{{__('Exam Edit')}}</h4>
    <button type="button" class="border-0 p-0 bg-transparent text-para-text" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i></button>
  </div>
  <!--  -->
  <form class="ajax-request reset" action="{{route('instructor.exam.store')}}" method="POST"
  data-handler="commonResponse">
  @csrf

  <input type="hidden" name="id" value="{{encrypt($exam->id)}}">
    <div class="row rg-20 pb-25">
      <div class="col-12">
        <label for="addRoleName" class="sf-form-label">{{__('Exam Title')}} <span class="text-red">*</span></label>
        <input type="text" value="{{$exam->exam_title}}" name="exam_title" class="form-control sf-form-control" placeholder="{{__('Enter Exam Title')}}" />
      </div>
      <div class="col-12">
        <label for="addRoleStatus" class="sf-form-label">{{__('Exam Type')}} <span class="text-red">*</span></label>
        <select class="sf-select-without-search examType" name="exam_type">
          <option value="">{{__("Select Exam")}}</option>
          <option {{$exam->exam_type == EXAM_TYPE_THEORETICAL? 'selected' : ''}} value="{{EXAM_TYPE_THEORETICAL}}">{{__('Theoretical')}}</option>
          <option {{$exam->exam_type == EXAM_TYPE_PRACTICAL ? 'selected' : ''}} value="{{EXAM_TYPE_PRACTICAL}}">{{__("Practical")}}</option>
        </select>
      </div>
      <div class="col-12">
        <label for="addRoleStatus" class="sf-form-label">{{__('Select Package')}} <span class="text-red">*</span></label>
        <select class="sf-select-without-search getPackageByStd" name="package_id">
            <option value="">{{__("Select Package")}}</option>
            @foreach ($package as $data)
                <option {{$data->id == $exam->package_id ? 'selected' : ''}} value="{{$data->id}}">{{$data->package_name}}</option>
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
                @if(count($student)>0)
                    @foreach ($student as $item)
                        <li>
                            <div class="dropdown-item">
                                <div class="d-flex align-items-center g-10">
                                <input {{ in_array($item->student->id, json_decode($exam->student_assign)) ? 'checked' : '' }} type="checkbox" name="student_assign[]" value="{{$item->student->id}}" class="form-check-input mt-0 shadow-none" id="assignSpecialApproval{{$item->student->id}}" />
                                <label for="assignSpecialApproval{{$item->student->id}}">
                                    <div class="d-flex align-items-center g-8">
                                        <div class="flex-shrink-0 w-25 h-25 rounded-circle overflow-hidden"><img src="{{getFileLink($item->student->picture)}}" alt="" /></div>
                                        <div class="content">
                                            <p class="fs-12 fw-600 lh-16 text-textBlack">{{$item->student->name}}</p>
                                            <p class="fs-12 fw-600 lh-13 text-para-text">{{$item->student->email}}</p>
                                        </div>
                                    </div>
                                </label>
                                </div>
                            </div>
                        </li>
                    @endforeach
                @endif
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
                                @if ($exam->question_assign != 'null')
                                    <input data-mark="{{$data->question_mark}}" {{ in_array($data->id, json_decode($exam->question_assign)) ? 'checked' : '' }} type="checkbox" name="question_assign[]" value="{{$data->id}}" class="editInputBox form-check-input mt-0 shadow-none" id="assignSpecialApproval1" />
                                @else
                                    <input data-mark="{{$data->question_mark}}" type="checkbox" name="question_assign[]" value="{{$data->id}}" class="editInputBox form-check-input mt-0 shadow-none" id="assignSpecialApproval1" />
                                @endif
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

      <div class="zForm-wrap pb-20">
        <label for="noticeTitle" class="sf-form-label">{{__('Exam Date')}} <span
                class="text-red">*</span></label>
        <input type="datetime-local" value="{{$exam->exam_date}}" name="exam_date" class="form-control sf-form-control" id="dateTime"
               placeholder="{{__("Exam Date Time")}}"/>
      </div>
      <div class="col-12">
        <label for="addRoleStatus" class="sf-form-label">{{__('Exam Duration Time (Min)')}} <span class="text-red">*</span></label>
        <input type="number" value="{{$exam->duration_time}}" name="duration_time" class="totalMarkDisable form-control sf-form-control" placeholder="{{__('Exam Duration Time Minute')}}" />
      </div>
      <div class="col-12">
        <label for="addRoleName" class="sf-form-label">{{__('Total Mark')}} <span class="text-red">*</span></label>
        <input type="number" value="{{$exam->total_mark}}" name="total_mark" {{$exam->exam_type == EXAM_TYPE_THEORETICAL ? 'disabled' : ''}} class="totalMarkEdit totalMarkDisable form-control sf-form-control" placeholder="{{__('Enter Total Mark')}}" />
        <input type="hidden" name="total_mark" class="totalMark inputBox" value="{{$exam->exam_type == EXAM_TYPE_THEORETICAL ? $exam->total_mark : ''}}" {{$exam->exam_type == EXAM_TYPE_PRACTICAL ? 'disabled' : ''}} />
      </div>
      <div class="col-12">
        <label for="addRoleStatus" class="sf-form-label">{{__('Status')}}</label>
        <select class="sf-select-without-search" name="status">
          <option {{$exam->status == EXAM_PENDING ? 'selected' : ''}} value="{{EXAM_PENDING}}">{{__("Pending")}}</option>
          <option {{$exam->status == EXAM_CANCEL ? 'selected' : ''}} value="{{EXAM_CANCEL}}">{{__('Cancel')}}</option>
          <option {{$exam->status == EXAM_RUNNING ? 'selected' : ''}} value="{{EXAM_RUNNING}}">{{__('Running')}}</option>
          <option {{$exam->status == EXAM_COMPLETED ? 'selected' : ''}} value="{{EXAM_COMPLETED}}">{{__('Compleate')}}</option>
          <option {{$exam->status == EXAM_IN_REVIEW ? 'selected' : ''}} value="{{EXAM_IN_REVIEW}}">{{__('In Review')}}</option>
        </select>
      </div>
    </div>
    <div class="bd-t-one bd-c-stroke pt-17 d-flex g-10">
      <button type="button" data-bs-dismiss="modal" aria-label="Close" class="py-13 px-20 bd-one bd-ra-4 bd-c-main-color bg-white text-main-color fs-14 fw-600 lh-14">{{__('Cancel')}}</button>
      <button type="submit" class="py-13 px-20 bd-one bd-ra-4 bd-c-primary-color bg-primary-color text-white fs-14 fw-600 lh-14">{{__('Update')}}</button>
    </div>
  </form>
