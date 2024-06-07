<div class="invoice-content">
@include('admin.report.partial.report-common-section')
    <div class="">
        <h4 class="fs-18 fw-600 lh-28 text-main-color text-center pt-10 pb-10">{{__('Certificate Report')}}</h4>
    </div>
    <table class="table zTable zTable-last-item-right zTable-last-item-border">
        <thead>
        <tr>
            <th>
                <div>{{__('SN')}}</div>
            </th>
            <th>
                <div>{{__('Certificate Number')}}</div>
            </th>
            <th>
                <div>{{__('Student Name')}}</div>
            </th>
            <th>
                <div>{{__('Generated Date')}}</div>
            </th>
            <th>
                <div>{{__('Status')}}</div>
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($certificate_data as $data)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$data->certificate_number}}</td>
                <td>{{$data->certificateStudent =! null?$data->certificateStudent->name:'N/A'}}</td>
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
