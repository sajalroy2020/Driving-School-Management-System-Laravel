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
                        <div></div>
                        <a href="{{ url()->previous() }}" class="py-13 pr-15 pl-10 bd-one bd-c-primary-color bg-primary-color bd-ra-4 fs-14 fw-500 lh-14 text-white d-flex align-items-center"> <i class="fa-solid fa-long-arrow-left mr-10"></i> {{__('Back')}}</a>
                    </div>
                    <div class="text-center">
                        <h4>{{$exam->exam_title}}</h4>
                        <p class="py-5"><strong>{{__('Total Mark')}}</strong>: {{$exam->total_mark}}</p>
                        <p>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',
                            $exam->exam_date)->format('jS F, h:i:s A')}}</p>
                    </div>
                    <div class="pt-20">
                        @if (isset($question))
                            @foreach ($question as $key => $data)
                                @if ($data->question_type == QUESTION_TYPE_TEXT)
                                <div class="pt-20">
                                    <p><strong>{{$key+1}}. {{$data->question_title}}</strong></p>
                                    <div class="pt-8 pl-20">
                                        <textarea disabled name="description" type="text"
                                        class="form-control sf-form-control" id="eInputBody"></textarea>
                                    </div>
                                </div>
                                @elseif($data->question_type == QUESTION_TYPE_SELECT_ONE)
                                <div class="pt-20">
                                    <p><strong>{{$key+1}}. {{$data->question_title}}</strong></p>
                                    @foreach ($data->questionsOption as $items)
                                        <div class="d-flex align-items-center pt-6 pl-20">
                                            <input disabled {{$items->is_ans == 1 ? 'checked' : ''}} class="form-check-input h4 mr-5" name="right_ans[]" type="radio" value="{{$key}}">
                                            <p>{{$items->question_option}}</p>
                                        </div>
                                    @endforeach
                                </div>
                                @elseif($data->question_type == QUESTION_TYPE_SELECT_MANY)
                                <div class="pt-20">
                                    <p><strong>{{$key+1}}. {{$data->question_title}}</strong></p>
                                    @foreach ($data->questionsOption as $items)
                                        <div class="d-flex align-items-center pt-6 pl-20">
                                            <input disabled {{$items->is_ans == 1 ? 'checked' : ''}} class="form-check-input h4 mr-5" name="right_ans[]" type="checkbox" value="{{$key}}">
                                            <p>{{$items->question_option}}</p>
                                        </div>
                                    @endforeach
                                </div>
                                @endif
                            @endforeach
                        @else
                            <div class="text-center py-20">
                                <p class="fs-3">{{__('Off Line Exam')}}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('script')
    <script src="{{asset('assets/custom/admin/js/exam.js')}}"></script>
@endpush
