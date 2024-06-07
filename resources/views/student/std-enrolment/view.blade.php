@extends('layouts.app')
@push('title')
    {{$pageTitle}}
@endpush

@section('content')
    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">
        <div class="row rg-20">
            <div class="col-12">
                <div class="bd-ra-15 bg-white p-sm-30 p-15 mb-30">
                    <div class="">
                        <h4 class="fs-18 fw-600 lh-28 text-main-color pt-10 pb-10">{{__('Enrolment Details')}}</h4>
                        <div class="bd-ra-10 bg-body-bg mb-30 border p-25">
                            <div class="d-flex justify-content-between invoice-item">
                              <div class="item">
                                <p class="fs-14 fw-600 lh-24 text-para-text">{{__('Student Information')}}:</p>
                                <p class="fs-14 fw-400 lh-24 text-para-text pt-8"> <span class="fs-14 fw-500">{{__('Name')}} : </span> {{$enrolment->student->name ? $enrolment->student->name : __('N/A')}}</p>
                                <p class="fs-14 fw-400 lh-24 text-para-text"> <span class="fs-14 fw-500">{{__('Email')}} : </span> {{$enrolment->student->email ? $enrolment->student->email : __('N/A')}}</p>
                                <p class="fs-14 fw-400 lh-24 text-para-text"> <span class="fs-14 fw-500">{{__('Phone')}} : </span> {{$enrolment->student->phone ? $enrolment->student->phone : __('N/A')}}</p>
                                <p class="fs-14 fw-400 lh-24 text-para-text"> <span class="fs-14 fw-500">{{__('Gender')}} : </span>
                                  @if ($enrolment->student->gender == GENDER_MALE)
                                      {{__('Male')}}
                                  @elseif($enrolment->student->gender == GENDER_FEMALE)
                                      {{__('Female')}}
                                  @else
                                      {{__('Others')}}
                                  @endif
                                </p>
                                <p class="fs-14 fw-400 lh-24 text-para-text"> <span class="fs-14 fw-500">{{__('Birth-Day')}} : </span> {{$enrolment->student->dob ? $enrolment->student->dob : __('N/A')}}</p>
                                <p class="fs-14 fw-400 lh-24 text-para-text"> <span class="fs-14 fw-500">{{__('Address')}} : </span> {{$enrolment->student->address ? $enrolment->student->address : __('N/A')}}</p>
                              </div>

                              <div class="item border border-end-0 border-3"></div>
                              <div class="item">
                                  <p class="fs-14 fw-600 lh-24 text-para-text">{{__('Package Information')}}:</p>
                                  <p class="fs-14 fw-400 lh-24 text-para-text pt-8"> <span class="fs-14 fw-500">{{__('Package Name')}} : </span> {{$enrolment->package->package_name ? $enrolment->package->package_name  : __('N/A')}}</p>
                                  <p class="fs-14 fw-400 lh-24 text-para-text"> <span class="fs-14 fw-500">{{__('Duration')}} : </span>
                                      @if ($enrolment->duration_time == null )
                                          {{$enrolment->package->duration_time}}
                                      @else
                                          {{$enrolment->duration_time}}
                                      @endif
                                      @if($enrolment->duration_type == null )
                                          @if ($enrolment->package->duration_type == DURATION_TYPE_DAY)
                                              {{__('Day')}}
                                          @elseif($enrolment->package->duration_type == DURATION_TYPE_MONTH)
                                              {{__('Month')}}
                                          @endif
                                      @else
                                          @if($enrolment->duration_type == DURATION_TYPE_DAY)
                                              {{__('Day')}}
                                          @elseif($enrolment->duration_type == DURATION_TYPE_MONTH)
                                              {{__('Month')}}
                                          @endif
                                      @endif
                                  </p>
                                  <p class="fs-14 fw-400 lh-24 text-para-text"> <span class="fs-14 fw-500">{{__('Start Date')}} : </span> {{$enrolment->start_date ? $enrolment->start_date : __('N/A')}}</p>
                                  <p class="fs-14 fw-400 lh-24 text-para-text"> <span class="fs-14 fw-500">{{__('Preferred Time')}} : </span>
                                    {{\Carbon\Carbon::parse($enrolment->timeSchedule->start_time)->format('g:i A')}} - {{$enrolment->timeSchedule->end_time ? \Carbon\Carbon::parse($enrolment->timeSchedule->end_time)->format('g:i A') : __('N/A')}}
                                  </p>
                                  <p class="fs-14 fw-400 lh-24 text-para-text"> <span class="fs-14 fw-500">{{__('Price')}} : </span> {{$enrolment->total_amount ? showCurrency($enrolment->total_amount) : 0.00}}</p>
                                  <p class="fs-14 fw-400 lh-24 text-para-text"> <span class="fs-14 fw-500">{{__('Discount')}} : </span> {{$enrolment->discount_amount ? showCurrency($enrolment->discount_amount) : 0.00}}</p>
                                  <p class="fs-14 fw-400 lh-24 text-para-text"> <span class="fs-14 fw-500">{{__('Total Amount')}} : </span> {{$enrolment->payable_amount ? showCurrency($enrolment->payable_amount) : 0.00}}</p>
                                </div>
                                <div class="item border border-end-0 border-3"></div>
                                <div class="item">
                                    <p class="fs-14 fw-600 lh-24 text-para-text">{{__('Instructor Information')}}:</p>
                                    @foreach ($instructors as $instructor)
                                        <p class="fs-14 fw-400 lh-24 text-para-text pt-8"> <span class="fs-14 fw-500">{{__('Name')}} : </span> {{$instructor->name ? $instructor->name : __('N/A')}}</p>
                                        <p class="fs-14 fw-400 lh-24 text-para-text"> <span class="fs-14 fw-500">{{__('Email')}} : </span> {{$instructor->email ? $instructor->email :  __('N/A')}}</p>
                                        <p class="fs-14 fw-400 lh-24 text-para-text"> <span class="fs-14 fw-500">{{__('Phone')}} : </span> {{$instructor->phone ? $instructor->phone :  __('N/A')}}</p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
