<div class="invoice-content">
    @include('admin.report.partial.report-common-section')
    <div class="">
        <h4 class="fs-18 fw-600 lh-28 text-main-color text-center pt-10 pb-10">{{__('Staff Report')}}</h4>
    </div>
    <!--  -->
    <table class="table zTable zTable-last-item-right zTable-last-item-border">
        <thead>
        <tr>
            <th>
                <div>{{__('SN')}}</div>
            </th>
            <th>
                <div>{{__('Staff Name')}}</div>
            </th>
            <th>
                <div>{{__('Email')}}</div>
            </th>
            <th>
                <div>{{__('Phone')}}</div>
            </th>
            <th>
                <div>{{__('Permissions')}}</div>
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
        @foreach($staff_data as $user)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone !=null?$user->phone:'N/A'}}</td>
                <td>
                    @forelse($user->permissions as $item)
                        <li>{{$item.' '}}</li>
                    @empty
                        {{"N/A"}}
                    @endforelse
                </td>
                <td>{{$user->created_at}}</td>
                @if($user->status == USER_STATUS_ACTIVE)
                    <td>{{__("Active")}}</td>
                @elseif($user->status == USER_STATUS_INACTIVE)
                    <td>{{__("Inactive")}}</td>
                @elseif($user->status == USER_STATUS_UNVERIFIED)
                    <td>{{__("Unverified")}}</td>
                @else
                    <td>{{__("N/A")}}</td>
                @endif

            </tr>
        @endforeach
        </tbody>
    </table>
</div>

