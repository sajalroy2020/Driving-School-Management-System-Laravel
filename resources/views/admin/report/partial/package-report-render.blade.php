<div class="invoice-content">
    @include('admin.report.partial.report-common-section')
    <div class="">
        <h4 class="fs-18 fw-600 lh-28 text-main-color text-center pt-10 pb-10">{{__('Package Report')}}</h4>
    </div>
    <!--  -->
    <table class="table zTable zTable-last-item-right zTable-last-item-border">
        <thead>
        <tr>
            <th>
                <div>{{__('SN')}}</div>
            </th>
            <th>
                <div>{{__('Category Name')}}</div>
            </th>
            <th>
                <div>{{__('Package Name')}}</div>
            </th>
            <th>
                <div>{{__('Price')}}</div>
            </th>
            <th>
                <div>{{__('Assigned Instructors')}}</div>
            </th>
            <th>
                <div>{{__('No Of Student')}}</div>
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
        @foreach($package_data as $data)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$data->category =! null?$data->category->category_name:'N/A'}}</td>
                <td>{{$data->package_name}}</td>
                <td>{{$data->price}}</td>
                <td>{{!empty($data->stdPackages)?$data->stdPackages->count():'N/A'}}</td>
                <td>{{!$data->instructors}}</td>
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

