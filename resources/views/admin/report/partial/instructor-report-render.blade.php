<div class="invoice-content">
    @include('admin.report.partial.report-common-section')
    <div class="">
        <h4 class="fs-18 fw-600 lh-28 text-main-color text-center pt-10 pb-10">{{__('Instructor Report')}}</h4>
    </div>
    <!--  -->
    <table class="table zTable zTable-last-item-right zTable-last-item-border">
        <thead>
        <tr>
            <th>
                <div>{{__('SN')}}</div>
            </th>
            <th>
                <div>{{__('Instructor ID')}}</div>
            </th>
            <th>
                <div>{{__('Instructor Name')}}</div>
            </th>
            <th>
                <div>{{__('Email')}}</div>
            </th>
            <th>
                <div>{{__('Phone')}}</div>
            </th>
            <th>
                <div>{{__('Assign Package')}}</div>
            </th>
            <th>
                <div>{{__('Join Date')}}</div>
            </th>
            <th>
                <div>{{__('Status')}}</div>
            </th>

        </tr>
        </thead>
        <tbody>
        @foreach($instructor_data as $user)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$user->instructor_id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone !=null?$user->phone:'N/A'}}</td>
                <td>
                    @forelse($user->packages as $pkg)
                        <li>{{$pkg->package_name.' '}}</li>
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

