<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.header')
<body class="bg-white">

<div id="printableArea">
    <div class="py-5">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content border-0 bd-ra-4 p-25 invoice-content-wrap">
                <div class="invoice-content">
                    <div class="pb-50 text-center">
                        <div class="max-w-167"><img src="{{getFileLink(getSetting('app_logo'))}}" alt=""></div>
                        <h4 class="fs-32 fw-600 lh-40 text-main-color pt-10">{{getSetting('app_name')}}</h4>
                        <p><span class="fs-14 fw-500">{{__('Address')}} : </span> {{getSetting('app_location')}}</p>
                        <p><span class="fs-14 fw-500">{{__('Phone')}} : </span> {{getSetting('app_contact_number')}},
                            <span class="fs-14 fw-500">{{__('Email')}} : </span> {{getSetting('app_email')}}</p>
                    </div>
                    <!--  -->
                    <div class="">
                        <h4 class="fs-18 fw-600 lh-28 text-main-color text-center pt-10 pb-10">{{__('Enrolment Details')}}</h4>
                        <div class="bd-ra-10 bg-body-bg mb-30 border p-25">
                            <div class="d-flex justify-content-between invoice-item">
                                <div class="item">
                                    <p class="fs-14 fw-600 lh-24 text-para-text">{{__('Student Information')}}:</p>
                                    <p class="fs-14 fw-400 lh-24 text-para-text"><span class="fs-14 fw-500">{{__('Name')}} : </span> {{$enrolment->student->name}}
                                    </p>
                                    <p class="fs-14 fw-400 lh-24 text-para-text"><span class="fs-14 fw-500">{{__('Email')}} : </span> {{$enrolment->student->email}}
                                    </p>
                                    <p class="fs-14 fw-400 lh-24 text-para-text"><span class="fs-14 fw-500">{{__('Phone')}} : </span> {{$enrolment->student->phone}}
                                    </p>
                                    <p class="fs-14 fw-400 lh-24 text-para-text"><span class="fs-14 fw-500">{{__('Gender')}} : </span>
                                        @if ($enrolment->student->gender == GENDER_MALE)
                                            {{__('Male')}}
                                        @elseif($enrolment->student->gender == GENDER_FEMALE)
                                            {{__('Female')}}
                                        @else
                                            {{__('Others')}}
                                        @endif
                                    </p>
                                    <p class="fs-14 fw-400 lh-24 text-para-text"><span class="fs-14 fw-500">{{__('Birth-Day')}} : </span> {{$enrolment->student->dob}}
                                    </p>
                                    <p class="fs-14 fw-400 lh-24 text-para-text"><span class="fs-14 fw-500">{{__('Address')}} : </span> {{$enrolment->student->address}}
                                    </p>
                                </div>

                                <div class="item border border-end-0 border-3"></div>
                                <div class="item">
                                    <p class="fs-14 fw-600 lh-24 text-para-text">{{__('Package Information')}}:</p>
                                    <p class="fs-14 fw-400 lh-24 text-para-text"><span class="fs-14 fw-500">{{__('Package Name')}} : </span> {{$enrolment->package->package_name}}
                                    </p>
                                    <p class="fs-14 fw-400 lh-24 text-para-text"><span class="fs-14 fw-500">{{__('Duration')}} : </span>
                                        @if ($enrolment->duration_time == null )
                                            {{$enrolment->package->duration_time}}
                                        @else
                                            {{$enrolment->duration_time}}
                                        @endif
                                        -
                                        @if($enrolment->duration_type == null )
                                            @if ($enrolment->package->duration_type == DURATION_TYPE_DAY)
                                                {{__('Day')}}
                                            @elseif($enrolment->package->duration_type == DURATION_TYPE_MONTH)
                                                {{__('Month')}}
                                            @else
                                                {{__('Year')}}
                                            @endif
                                        @else
                                            @if($enrolment->duration_type == DURATION_TYPE_DAY)
                                                {{__('Day')}}
                                            @elseif($enrolment->duration_type == DURATION_TYPE_MONTH)
                                                {{__('Month')}}
                                            @else
                                                {{__('Year')}}
                                            @endif
                                        @endif
                                    </p>
                                    <p class="fs-14 fw-400 lh-24 text-para-text"><span class="fs-14 fw-500">{{__('Start Date')}} : </span> {{$enrolment->start_date}}
                                    </p>
                                    <p class="fs-14 fw-400 lh-24 text-para-text"><span class="fs-14 fw-500">{{__('Preferred Time')}} : </span>
                                        {{\Carbon\Carbon::parse($enrolment->timeSchedule->start_time)->format('g:i A')}}
                                        - {{__('to')}}
                                        - {{\Carbon\Carbon::parse($enrolment->timeSchedule->end_time)->format('g:i A')}}
                                    </p>
                                    <p class="fs-14 fw-400 lh-24 text-para-text"><span class="fs-14 fw-500">{{__('Package Price')}} : </span> {{showCurrency($enrolment->total_amount)}}
                                    </p>
                                    <p class="fs-14 fw-400 lh-24 text-para-text"><span class="fs-14 fw-500">{{__('Payable Amount')}} : </span> {{showCurrency($enrolment->payable_amount)}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                    <h4 class="fs-18 fw-600 lh-28 text-main-color pb-15 pt-20">{{__('Transaction Details')}}</h4>
                    <table class="table zTable zTable-last-item-right zTable-last-item-border">
                        <thead>
                        <tr>
                            <th>
                                <div>{{__('Date')}}</div>
                            </th>
                            <th>
                                <div>{{__('Payment Gateway')}}</div>
                            </th>
                            <th>
                                <div>{{__('Transaction ID')}}</div>
                            </th>
                            <th>
                                <div>{{__('Amount')}}</div>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($payments as $payment)
                            <tr>
                                <td>{{$payment->created_at}}</td>
                                <td>{{$payment->paymentGateway?->title}}</td>
                                <td>{{$payment->payment_id}}</td>
                                <td>{{showCurrency($payment->total)}}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="4">{{ __('No data found') }}</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.script')

<script src="{{ asset('assets/common/js/print.js') }}"></script>
</body>
</html>
