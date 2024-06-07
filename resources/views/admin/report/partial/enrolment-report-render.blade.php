<div class="invoice-content">
    @include('admin.report.partial.report-common-section')
    <div class="">
        <h4 class="fs-18 fw-600 lh-28 text-main-color text-center pt-10 pb-10">{{__('Enrolment Report')}}</h4>
    </div>
    <table class="table zTable zTable-last-item-right zTable-last-item-border">
        <thead>
        <tr>
            <th>
                <div>{{__('SN')}}</div>
            </th>
            <th>
                <div>{{__('Reg. Id')}}</div>
            </th>
            <th>
                <div>{{__('Student Name')}}</div>
            </th>
            <th>
                <div>{{__('Package Name')}}</div>
            </th>
            <th>
                <div>{{__('Price')}}</div>
            </th>
            <th>
                <div>{{__('Start Date')}}</div>
            </th>
            <th>
                <div>{{__('Slot')}}</div>
            </th>
            <th>
                <div>{{__('Date')}}</div>
            </th>
            <th>
                <div>{{__('Status')}}</div>
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($enrolment_data as $data)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$data->register_id}}</td>
                <td>{{$data->student =! null?$data->student->name:'N/A'}}</td>
                <td>{{$data->package =! null?$data->package->package_name:'N/A'}}</td>
                <td>{{$data->payable_amount}}</td>
                <td>{{date('d-m-Y',strtotime($data->start_date))}}</td>
                <td>{{$data->slot != null?$data->slot->start_time.'-'.$data->slot->end_time:'N/A'}}</td>
                <td>{{$data->created_at}}</td>
                @if($data->status == STATUS_ACTIVE)
                    <td>{{__("Active")}}</td>
                @elseif($data->status == STATUS_INACTIVE)
                    <td>{{__("Inactive")}}</td>
                @else
                    <td>{{__("N/A")}}</td>
                @endif

            </tr>
        @endforeach
        </tbody>
    </table>
</div>

