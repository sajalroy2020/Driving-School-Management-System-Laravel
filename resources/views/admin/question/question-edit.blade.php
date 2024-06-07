 <!-- Top -->
 <div class="d-flex justify-content-between align-items-center bd-b-one bd-c-stroke pb-20 mb-20">
    <h4 class="fs-18 fw-600 lh-18 text-main-color">{{__('Add Question')}}</h4>
    <button type="button" class="border-0 p-0 bg-transparent text-para-text" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i></button>
  </div>
  <!--  -->
  <form class="ajax-request reset" action="{{route('admin.question.store')}}" method="POST"
  data-handler="commonResponse">
  @csrf

    <input type="hidden" name="id" value="{{encrypt($question->id)}}">
    <div class="row rg-20 pb-25">
      <div class="col-12">
        <label for="addRoleName" class="sf-form-label">{{__('Question Title')}} <span class="text-red">*</span></label>
        <input type="text" value="{{$question->question_title}}" name="question_title" class="form-control sf-form-control" placeholder="{{__('Enter Question Title')}}" />
      </div>
      <div class="col-12">
        <label for="addRoleStatus" class="sf-form-label">{{__('Question Type')}} <span class="text-red">*</span></label>
        <select class="sf-select-without-search questionType" name="question_type">
          <option value="">{{__("Select Question Type")}}</option>
          <option {{$question->question_type == QUESTION_TYPE_TEXT ? 'selected' : ''}} value="{{QUESTION_TYPE_TEXT}}">{{__("Simple Text")}}</option>
          <option {{$question->question_type == QUESTION_TYPE_SELECT_ONE ? 'selected' : ''}} value="{{QUESTION_TYPE_SELECT_ONE}}">{{__('Select One')}}</option>
          <option {{$question->question_type == QUESTION_TYPE_SELECT_MANY ? 'selected' : ''}} value="{{QUESTION_TYPE_SELECT_MANY}}">{{__('Select Many')}}</option>
        </select>
      </div>

      <span class="allAnsOption">
        <div class="d-flex align-items-center justify-content-between addMoreDiv editAddMore d-none">
            <p>{{__('Question Option')}}</p>
            <button class="border-0 bd-ra-12 py-13 px-25 bg-cancel fs-16 fw-600 lh-19 text-main-color addMore">{{__('Add More')}}</button>
        </div>

        @if ($question->question_type == QUESTION_TYPE_SELECT_ONE)
            @foreach ($option as $key => $data)
                <div class="col-12 singleRow">
                    <div class="d-flex justify-content-between align-items-center pt-20">
                        <input {{$data->is_ans == 1 ? 'checked' : ''}} class="form-check-input h4 mr-5 questionOption rightAns" name="right_ans[]" type="radio" value="{{$key}}">
                        <input value="{{$data->question_option}}" type="text" name="question_option[]" class="form-control sf-form-control questionOption" placeholder="{{__('Enter Question Answare')}}" />
                        <div class="pl-5">
                            <button class="border-0 bd-ra-12 py-13 px-17 bg-cancel fs-16 fw-600 lh-19 text-danger removeAddMore">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </div>
                    <div class="question_option"></div>
                </div>
            @endforeach
        @elseif ($question->question_type == QUESTION_TYPE_SELECT_MANY)
            @foreach ($option as $key => $data)
                <div class="col-12 singleRow">
                    <div class="d-flex justify-content-between align-items-center pt-20">
                        <input {{$data->is_ans == 1 ? 'checked' : ''}} class="form-check-input h4 mr-5 questionOption rightAns" name="right_ans[]" type="checkbox" value="{{$key}}">
                        <input value="{{$data->question_option}}" type="text" name="question_option[]" class="form-control sf-form-control questionOption" placeholder="{{__('Enter Question Answare')}}" />
                        <div class="pl-5">
                            <button class="border-0 bd-ra-12 py-13 px-17 bg-cancel fs-16 fw-600 lh-19 text-danger removeAddMore">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </div>
                    <div class="question_option"></div>
                </div>
            @endforeach
        @endif

        <div id="addMoreDiv"></div>
      </span>

      <div class="col-12">
        <label for="addRoleName" class="sf-form-label">{{__('Question Mark')}} <span class="text-red">*</span></label>
        <input value="{{$question->question_mark}}" type="number" name="question_mark" class="form-control sf-form-control" placeholder="{{__('Enter Question Mark')}}" />
      </div>
      <div class="col-12">
        <label for="addRoleStatus" class="sf-form-label">{{__('Status')}}</label>
        <select class="sf-select-without-search" name="status">
          <option {{$question->status == STATUS_ACTIVE ? 'selected' : ''}} value="{{STATUS_ACTIVE}}">{{__("Active")}}</option>
          <option {{$question->status == STATUS_DEACTIVATE ? 'selected' : ''}} value="{{STATUS_DEACTIVATE}}">{{__('Deactivate')}}</option>
        </select>
      </div>
    </div>
    <div class="bd-t-one bd-c-stroke pt-17 d-flex g-10">
      <button type="button" data-bs-dismiss="modal" aria-label="Close" class="py-13 px-20 bd-one bd-ra-4 bd-c-main-color bg-white text-main-color fs-14 fw-600 lh-14">{{__('Cancel')}}</button>
      <button type="submit" class="py-13 px-20 bd-one bd-ra-4 bd-c-primary-color bg-primary-color text-white fs-14 fw-600 lh-14">{{__('Save')}}</button>
    </div>
</form>
