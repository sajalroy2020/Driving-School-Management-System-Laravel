<div class="invoice-content">
    @include('admin.report.partial.report-common-section')
    <div class="">
        <h4 class="fs-18 fw-600 lh-28 text-main-color text-center pt-10 pb-10">{{__('Payment Report')}}</h4>
    </div>
    <!--  -->
    <table class="table zTable zTable-last-item-right zTable-last-item-border">
        <thead>
        <tr>
            <th>
                <div>{{__('SN')}}</div>
            </th>
            <th>
                <div>{{__('Payment Id')}}</div>
            </th>
            <th>
                <div>{{__('Student Name')}}</div>
            </th>
            <th>
                <div>{{__('Package Name')}}</div>
            </th>
            <th>
                <div>{{__('Amount')}}</div>
            </th>            <th>
                <div>{{__('Payment Type')}}</div>
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
        @foreach($payment_data as $data)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$data->payment_id}}</td>
                <td>{{$data->student =! null?$data->student->name:'N/A'}}</td>
                <td>{{$data->package =! null?$data->package->package_name:'N/A'}}</td>
                <td>{{showCurrency($data->amount)}}</td>
                <td>{{$data->payment_type == PAYMENT_TYPE_OFFLINE?'Offline':'Online'}}</td>
                <td>{{$data->created_at}}</td>
                @if($data->status == PAYMENT_STATUS_SUCCESS)
                    <td>{{__("Success")}}</td>
                @elseif($data->status == PAYMENT_STATUS_PENDING)
                    <td>{{__("Pending")}}</td>
                @elseif($data->status == PAYMENT_STATUS_CANCEL)
                    <td>{{__("Cancel")}}</td>
                @else
                    <td>{{__("N/A")}}</td>
                @endif

            </tr>
        @endforeach
        </tbody>
    </table>
</div>

