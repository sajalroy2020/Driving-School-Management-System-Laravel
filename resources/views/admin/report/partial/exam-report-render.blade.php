<div class="invoice-content">
    @include('admin.report.partial.report-common-section')
    <div class="">
        <h4 class="fs-18 fw-600 lh-28 text-main-color text-center pt-10 pb-10">{{__('Exam Report')}}</h4>
    </div>
    <!--  -->
    <table class="table zTable zTable-last-item-right zTable-last-item-border">
        <thead>
        <tr>
            <th>
                <div>{{__('SN')}}</div>
            </th>
            <th>
                <div>{{__('Exam Title')}}</div>
            </th>
            <th>
                <div>{{__('Type')}}</div>
            </th>
            <th>
                <div>{{__('Number of Student')}}</div>
            </th>
            <th>
                <div>{{__('Number of Question')}}</div>
            </th>
            <th>
                <div>{{__('Date Time')}}</div>
            </th>
            <th>
                <div>{{__('Duration(Min)')}}</div>
            </th>
            <th>
                <div>{{__('Total Mark')}}</div>
            </th>
            <th>
                <div>{{__('Status')}}</div>
            </th>

        </tr>
        </thead>
        <tbody>
        @foreach($exam_data as $data)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$data->exam_title}}</td>
                <td>{{$data->exam_type == EXAM_TYPE_THEORETICAL?'Theoretical':'Practical'}}</td>
                <td>{{$data->student_assign !=null? count(json_decode($data->student_assign)):'N/A'}}</td>
                <td>{{$data->exam_type == EXAM_TYPE_THEORETICAL? count(json_decode($data->question_assign)):'N/A'}}</td>
                <td>{{date('d-m-Y H:i:s',strtotime($data->exam_date))}}</td>
                <td>{{$data->duration_time}}</td>
                <td>{{$data->total_mark}}</td>
                @if($data->status == EXAM_PENDING)
                    <td>{{__("Pending")}}</td>
                @elseif($data->status == EXAM_CANCEL)
                    <td>{{__("Cancel")}}</td>
                @elseif($data->status == EXAM_PROCESSING)
                    <td>{{__("Processing")}}</td>
                @elseif($data->status == EXAM_COMPLETED)
                    <td>{{__("Completed")}}</td>
                @elseif($data->status == EXAM_IN_REVIEW)
                    <td>{{__("Review")}}</td>
                @else
                    <td>{{__("N/A")}}</td>
                @endif

            </tr>
        @endforeach
        </tbody>
    </table>
</div>

