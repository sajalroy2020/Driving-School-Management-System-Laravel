<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{__('.')}}</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/dataTables.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/dataTables.responsive.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/summernote/summernote-lite.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/aos.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/plugins.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/scss/style.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/common/css/common.css')}}" />
</head>
<body class="bg-white">

    <div id="printableArea">
        <div class="py-5">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content border-0 bd-ra-4 p-25 invoice-content-wrap">
                    <div class="invoice-content">
                        <div class="text-center mt-30">
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
                                        <p class="d-flex justify-content-md-between"><strong>{{$key+1}}. {{$data->question_title}}</strong> <span class="fs-15">{{__('Qustion simple text')}} - {{__('Mark')}} ({{$data->question_mark}})</span></p>
                                        <div class="pt-8 pl-20">
                                            <textarea disabled name="description" cols="10" rows="3" type="text"
                                            class="form-control border-0 sf-form-control bg-light-subtle" id="eInputBody"></textarea>
                                        </div>
                                    </div>
                                    @elseif($data->question_type == QUESTION_TYPE_SELECT_ONE)
                                    <div class="pt-20">
                                        <p class="d-flex justify-content-md-between"><strong>{{$key+1}}. {{$data->question_title}}</strong> <span class="fs-15">{{__('Qustion Select One')}} - {{__('Mark')}} ({{$data->question_mark}})</span></p>
                                        @foreach ($data->questionsOption as $items)
                                            <div class="d-flex align-items-center pt-6 pl-20">
                                                <input disabled class="form-check-input h4 mr-5" name="right_ans[]" type="radio" value="{{$key}}">
                                                <p>{{$items->question_option}}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                    @elseif($data->question_type == QUESTION_TYPE_SELECT_MANY)
                                    <div class="pt-20">
                                        <p class="d-flex justify-content-md-between"><strong>{{$key+1}}. {{$data->question_title}}</strong> <span class="fs-15">{{__('Qustion Select Many')}} - {{__('Mark')}} ({{$data->question_mark}})</span></p>
                                        @foreach ($data->questionsOption as $items)
                                            <div class="d-flex align-items-center pt-6 pl-20">
                                                <input disabled class="form-check-input h4 mr-5" name="right_ans[]" type="checkbox" value="{{$key}}">
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
    </div>

    <script src="{{asset('assets/js/jquery-3.7.0.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins.js')}}"></script>
    <script src="{{asset('assets/js/dataTables.js')}}"></script>
    <script src="{{asset('assets/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/js/aos.js')}}"></script>
    <script src="{{asset('assets/css/summernote/summernote-lite.min.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="{{asset('assets/common/js/print.js')}}"></script>
    <script src="{{ asset('assets/common/js/common_function.js') }}"></script>

</body>
</html>
