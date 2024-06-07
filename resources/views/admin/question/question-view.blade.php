 <!-- Top -->
 <div class="d-flex justify-content-between align-items-center bd-b-one bd-c-stroke pb-20 mb-20">
    <h4 class="fs-18 fw-600 lh-18 text-main-color">{{__('Question View')}}</h4>
    <button type="button" class="border-0 p-0 bg-transparent text-para-text" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i></button>
  </div>
  <!--  -->
<div class="row rg-15">
    <div class="text-center">
        <p><strong>{{__('Question Type')}}</strong> -
            @if ($question->question_type == QUESTION_TYPE_TEXT)
                {{__("Simple Text")}}
            @elseif ($question->question_type == QUESTION_TYPE_SELECT_ONE)
                {{__('Select One')}}
            @elseif ($question->question_type == QUESTION_TYPE_SELECT_MANY)
                {{__('Select Many')}}
            @endif
        </p>
        <p class="pb-5"><strong>{{__('Question Mark')}}</strong> - {{$question->question_mark}}</p>
    </div>
    <div class="col-12">
        <label for="addRoleName" class="sf-form-label"><strong>1.</strong> {{$question->question_title}}</label>
    </div>



    <div class="row g-10 pl-28">
        @if ($question->question_type == QUESTION_TYPE_TEXT)
            <textarea disabled class="form-control sf-form-control sf-form-control-2"
         placeholder="{{__('Enter Your Question Answer')}}"></textarea>
        @elseif ($question->question_type == QUESTION_TYPE_SELECT_ONE)
            @foreach ($option as $key => $data)
                <div class="col-12 singleRow">
                    <div class="d-flex align-items-center">
                        <input disabled {{$data->is_ans == 1 ? 'checked' : ''}} class="border-primary border-3 form-check-input h4 mr-5 questionOption rightAns" name="right_ans[]" type="radio" value="{{$key}}">
                        <p>{{$data->question_option}}</p>
                    </div>
                </div>
            @endforeach
        @elseif ($question->question_type == QUESTION_TYPE_SELECT_MANY)
            @foreach ($option as $key => $data)
                <div class="col-12 singleRow">
                    <div class="d-flex align-items-center">
                        <input disabled {{$data->is_ans == 1 ? 'checked' : ''}} class="border-primary border-3 form-check-input h4 mr-5 questionOption rightAns" name="right_ans[]" type="checkbox" value="{{$key}}">
                        <p>{{$data->question_option}}</p>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>

