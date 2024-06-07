<div class="invoice-content">
    @include('admin.report.partial.report-common-section')
    <!--  -->
    <div class="">
        <h4 class="fs-18 fw-600 lh-28 text-main-color text-center pt-10 pb-10">{{__('Awards Report')}}</h4>
    </div>
    <!--  -->
    <table class="table zTable zTable-last-item-right zTable-last-item-border">
        <thead>
        <tr>
            <th>
                <div>{{__('SN')}}</div>
            </th>
            <th>
                <div>{{__('Student Name')}}</div>
            </th>
            <th>
                <div>{{__('Award Name')}}</div>
            </th>
            <th>
                <div>{{__('Price Value')}}</div>
            </th>
            <th>
                <div>{{__('Assign Date')}}</div>
            </th>
            <th>
                <div>{{__('Status')}}</div>
            </th>

        </tr>
        </thead>
        <tbody>
        @foreach($award_data as $data)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$data->student->name}}</td>
                <td>{{$data->awards->title}}</td>
                <td>{{$data->prize_type == AWARD_TYPE_MONEY?'Money':'Others'}}</td>
                <td>{{$data->created_at}}</td>
                @if($data->status == STATUS_ACTIVE)
                    <td>{{__("Published")}}</td>
                @elseif($data->status == STATUS_INACTIVE)
                    <td>{{__("Unpublished")}}</td>
                @else
                    <td>{{__("N/A")}}</td>
                @endif

            </tr>
        @endforeach
        </tbody>
    </table>
</div>

