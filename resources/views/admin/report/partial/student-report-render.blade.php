<div class="invoice-content">
    @include('admin.report.partial.report-common-section')
    <div class="">
        <h4 class="fs-18 fw-600 lh-28 text-main-color text-center pt-10 pb-10">{{__('Student Report')}}</h4>
    </div>
    <table class="table zTable zTable-last-item-right zTable-last-item-border">
        <thead>
        <tr>
            <th>
                <div>{{__('SN')}}</div>
            </th>
            <th>
                <div>{{__('Student ID')}}</div>
            </th>
            <th>
                <div>{{__('Student Name')}}</div>
            </th>
            <th>
                <div>{{__('Email')}}</div>
            </th>
            <th>
                <div>{{__('Phone')}}</div>
            </th>
            <th>
                <div>{{__('Package')}}</div>
            </th>
            <th>
                <div>{{__('Enrolment Date')}}</div>
            </th>
            <th>
                <div>{{__('Status')}}</div>
            </th>

        </tr>
        </thead>
        <tbody>
        @foreach($student_data as $std)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$std->student_id}}</td>
                <td>{{$std->name}}</td>
                <td>{{$std->email}}</td>
                <td>{{$std->phone !=null?$std->phone:'N/A'}}</td>
                <td>{{$std->stdPackages != null?$std->stdPackages->package_name:'N/A'}}</td>
                <td>{{$std->created_at}}</td>
                @if($std->status !=null)
                    @if($std->status == ENROLMENT_PENDING)
                        <td>{{__("Pending")}}</td>
                    @elseif($std->status == ENROLMENT_APPROVED)
                        <td>{{__("Approved")}}</td>
                    @elseif($std->status == ENROLMENT_RUNNING)
                        <td>{{__("Running")}}</td>
                    @elseif($std->status == ENROLMENT_CANCEL)
                        <td>{{__("Cancel")}}</td>
                    @elseif($std->status == ENROLMENT_COMPLEATE)
                        <td>{{__("Completed")}}</td>
                    @elseif($std->status == ENROLMENT_CLOSE)
                        <td>{{__("Close")}}</td>
                    @else
                    @endif
                @else
                    <td>{{__("Pending")}}</td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

