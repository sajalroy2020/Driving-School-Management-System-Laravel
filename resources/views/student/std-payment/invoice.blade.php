
<div class="bd-b-one bd-c-stroke pb-25 mb-25 d-flex justify-content-between align-items-center flex-wrap">
    <button type="button" class="d-inline-flex align-items-center cg-13 fs-18 fw-500 lh-22 text-primary-color bg-transparent border-0" data-bs-dismiss="modal" aria-label="Close">
        <i class="fa-solid fa-long-arrow-left"></i>
        {{__('Back To List')}}
    </button>
    <button type="button" class="border-0 p-0 bg-transparent text-para-text" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i></button>
    {{-- <button class="d-inline-flex align-items-center cg-10 border-0 bd-ra-4 py-5 px-10 bg-primary-color fs-14 fw-500 lh-20 text-white">
        {{__('Download')}}
        <img src="{{asset('assets/images/icon/download.svg')}}" alt="">
    </button> --}}
</div>
<!--  -->
<div class="d-flex justify-content-between align-items-center pb-50">
<!--  -->
<div class="max-w-167"><img src="{{getFileLink(getSetting('app_logo'))}}" alt=""></div>
<!--  -->
<div class="d-flex align-items-center cg-10">
    @if ($payment->status == PAYMENT_STATUS_SUCCESS)
        <p class="zBadge zBadge-active">{{__('Paid')}}</p>
    @elseif ($payment->status == PAYMENT_STATUS_CANCEL)
        <p class="zBadge zBadge-deactivate">{{__('Canceled')}}</p>
    @elseif ($payment->status == PAYMENT_STATUS_PENDING)
        <p class="zBadge zBadge-pending">{{__('Pending')}}</p>
    @endif
</div>
</div>
<!--  -->
<div class="bd-ra-10 bg-body-bg p-25 mb-30">
<div class="d-flex justify-content-between invoice-item">
    <div class="item">
        <h4 class="fs-32 fw-600 lh-40 text-main-color pb-10">{{__('Invoice')}}</h4>
        <p class="fs-15 fw-500 lh-20 text-main-color">{{$payment->payment_id}}</p>
    </div>

    <div class="item">
        <p class="fs-14 fw-600 lh-24 text-para-text">{{__('Invoice From')}}:</p>
        <p class="fs-14 fw-400 lh-24 text-para-text">{{getSetting('app_name')}}</p>
        <p class="fs-14 fw-400 lh-24 text-para-text">{{getSetting('app_email')}}</p>
        <p class="fs-14 fw-400 lh-24 text-para-text">{{getSetting('app_contact_number')}}</p>
    </div>
    <div class="item">
    <p class="fs-14 fw-600 lh-24 text-para-text">{{__('Invoice To')}}:</p>
    <p class="fs-14 fw-400 lh-24 text-para-text">{{$payment->student->name}}</p>
    <p class="fs-14 fw-400 lh-24 text-para-text">{{$payment->student->email}}</p>
    <p class="fs-14 fw-400 lh-24 text-para-text">{{$payment->student->phone}}</p>
    </div>
</div>
</div>
<!--  -->
<div class="pb-30">
<h4 class="fs-18 fw-600 lh-28 text-main-color pb-15">{{__('Invoice Items')}}</h4>
<table class="table zTable zTable-last-item-right zTable-last-item-border">
    <thead>
        <tr>
            <th><div>{{__('Payment Type')}}</div></th>
            <th><div>{{__('Payable Amount')}}</div></th>
            <th><div>{{__('Paid Amount')}}</div></th>
            <th><div>{{__('Due Amount')}}</div></th>
            <th><div>{{__('Payment Date')}}</div></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @if ($payment->payment_type == PAYMENT_TYPE_OFFLINE)
                <td>{{__("Cash")}}</td>
            @else
                <td>{{__('Online')}}</td>
            @endif
            <td>{{showCurrency(getPayableAmountByPaymentId($payment->id, $payment->enrolment_id, $payment->student_id))}}</td>
            <td>{{showCurrency($payment->amount)}}</td>
            <td>{{showCurrency(getDueAmountByPaymentId($payment->id, $payment->enrolment_id, $payment->student_id))}}</td>

            <td>{{ $payment->created_at->format('d-m-Y H:i:s') }}</td>
        </tr>
    </tbody>
</table>
</div>
<!--  -->
{{-- <div class="max-w-190 w-100 ms-auto mb-30 text-end">
<ul class="zList-pb-15">
    <li>
        <div class="row align-items-center">
            <div class="col-6"><p class="fs-14 fw-500 lh-17 text-para-text">{{__('Due')}}:</p></div>
            <div class="col-6"><p class="fs-14 fw-400 lh-17 text-main-color">{{showCurrency($payment->package->price - $payment->amount)}}</p></div>
        </div>
    </li>
</ul>
</div> --}}
<!--  -->
{{-- <h4 class="fs-18 fw-600 lh-28 text-main-color pb-15">{{__('Transaction Details')}}</h4>
<table class="table zTable zTable-last-item-right zTable-last-item-border">
    <thead>
        <tr>
        <th><div>{{__('Date')}}</div></th>
        <th><div>{{__('Payment Type')}}</div></th>
        <th><div>{{__('Transaction ID')}}</div></th>
        <th><div>{{__('Amount')}}</div></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transaction as $data)
            <tr>
                <td>{{ $data->created_at->format('d-m-Y') }}</td>
                @if ($data->payment_type == PAYMENT_TYPE_OFFLINE)
                    <td>{{__("Cash")}}</td>
                @else
                    <td>{{__('Online')}}</td>
                @endif
                <td>{{$data->payment_id}}</td>
                <td>{{showCurrency($data->amount)}}</td>
            </tr>
        @endforeach
    </tbody>
</table> --}}

