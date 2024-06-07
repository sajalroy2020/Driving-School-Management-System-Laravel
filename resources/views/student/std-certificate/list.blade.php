@extends('layouts.app')
@push('title')
   {{$pageTitle}}
@endpush

@section('content')
    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">
        <div class="row rg-20">
            <div class="col-12">
                <div class="bd-ra-15 bg-white p-sm-30 p-15 mb-30">
                    <table class="table zTable zTable-last-item-right" id="certificateDataTable">
                        <thead>
                        <tr>
                            <th>
                                <div class="text-nowrap">{{__('Certificate Number')}}</div>
                            </th>
                            <th>
                                <div class="text-nowrap">{{__('Created Date')}}</div>
                            </th>
                            <th>
                                <div>{{__('Status')}}</div>
                            </th>
                            <th>
                                <div>{{__('Action')}}</div>
                            </th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" id="certificate-list-route" value="{{route('student.certificate.index')}}">
@endsection
@push('script')
    <script src="{{asset('assets/custom/student/js/std-certificate.js')}}"></script>
@endpush
