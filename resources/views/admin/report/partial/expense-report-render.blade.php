<div class="invoice-content">
    @include('admin.report.partial.report-common-section')
    <div class="">
        <h4 class="fs-18 fw-600 lh-28 text-main-color text-center pt-10 pb-10">{{__('Expense Report')}}</h4>
    </div>
    <!--  -->
    <table class="table zTable zTable-last-item-right zTable-last-item-border">
        <thead>
        <tr>
            <th>
                <div>{{__('SN')}}</div>
            </th>
            <th>
                <div>{{__('ID')}}</div>
            </th>
            <th>
                <div>{{__('Purpose')}}</div>
            </th>
            <th>
                <div>{{__('Amount')}}</div>
            </th>
            <th>
                <div>{{__('Voucher No')}}</div>
            </th>
            <th>
                <div>{{__('Note')}}</div>
            </th>
            <th>
                <div>{{__('Document')}}</div>
            </th>
            <th>
                <div>{{__('Date')}}</div>
            </th>
            <th>
                <div>{{__('Created At')}}</div>
            </th>
            <th>
                <div>{{__('Status')}}</div>
            </th>

        </tr>
        </thead>
        <tbody>
        @foreach($expense_data as $data)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$data->income_expenses_id}}</td>
                <td>{{$data->purpose}}</td>
                <td>{{showCurrency($data->amount)}}</td>
                <td>{{!is_null($data->voucher_no)?$data->voucher_no:'N/A'}}</td>
                <td>{{!is_null($data->note)?$data->note:'N/A'}}</td>
                <td>
                    @if(!is_null($data->image))
                        <a href="{{getFileLink($data->image)}}" target="_blank">
                            <img src="{{getFileLink($data->image)}}" class="max-w-18 max-h-35 img-thumbnail">
                        </a>
                    @else
                        {{"N/A"}}
                    @endif
                </td>
                <td>{{$data->date}}</td>
                <td>{{$data->created_at}}</td>
                @if($data->status == PAYMENT_STATUS_PENDING)
                    <td>{{__("Pending")}}</td>
                @elseif($data->status == PAYMENT_STATUS_SUCCESS)
                    <td>{{__("Success")}}</td>
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

