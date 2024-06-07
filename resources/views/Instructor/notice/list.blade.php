@extends('layouts.app')
@push('title')
    {{$pageTitle}}
@endpush

@section('content')
    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">
        <div class="row rg-20">
            <div class="col-12">
                <div class="bd-ra-15 bg-white p-sm-30 p-15 mb-30">
                    <div
                        class="table-wrapTop d-flex align-items-center justify-content-center justify-content-md-between flex-wrap g-10 pb-18">
                        <div class="d-flex justify-content-center justify-content-sm-start g-10 flex-wrap">
                            <div class="search-one flex-grow-1 max-w-207">
                                <button class="icon"><img src="{{asset('assets/images/icon/search.svg')}}" alt=""/>
                                </button>
                                <input type="text" placeholder="Search here..." id="dataTableSearch"/>
                            </div>
                        </div>
                    </div>
                    <table class="table zTable zTable-last-item-right" id="noticeDataTable">
                        <thead>
                        <tr>
                            <th>
                                <div class="text-nowrap">{{__('Title')}}</div>
                            </th>
                            <th>
                                <div>{{__('Notice For')}}</div>
                            </th>
                            <th>
                                <div>{{__('Created Time')}}</div>
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

    {{-- Details notice model --}}
    <div class="modal fade" id="details-modal" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 bd-ra-4 p-20">
            </div>
        </div>
    </div>

    <input type="hidden" id="notice-list-route" value="{{route('instructor.notice.list')}}">
@endsection
@push('script')
    <script src="{{asset('assets/custom/admin/js/notice.js')}}"></script>
@endpush
