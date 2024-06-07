@extends('layouts.app')
@push('title')
   {{$pageTitle}}
@endpush

@section('content')
    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">
        <div class="row rg-20">
            <div class="col-12">
                <div class="bd-ra-15 bg-white p-sm-30 p-15 mb-30">
                    <div class="table-wrapTop d-flex align-items-center justify-content-center justify-content-md-between flex-wrap g-10 pb-18">

                        <div class="w-100">
                            <ul class="nav nav-tabs zTab-reset task-chat-tab pl-0" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active packagesStatusTab" id="allPackage-tab" data-bs-toggle="tab" data-bs-target="#allPackage-tab-pane" type="button" role="tab" aria-controls="allPackage-tab-pane" aria-selected="true" data-status="all">
                                        {{__('All Package')}}
                                    </button>
                                </li>
                                <li class="nav-item ml-5" role="presentation">
                                    <button class="nav-link packagesStatusTab" id="myPackage-tab" data-bs-toggle="tab" data-bs-target="#myPackage-tab-pane" type="button" role="tab" aria-controls="myPackage-tab-pane" aria-selected="false" data-status="1">
                                        {{__('My Assign Package')}}
                                    </button>
                                </li>
                            </ul>

                            <div class="tab-content pt-20">
                                <div class="tab-pane fade active show " id="allPackage-tab-pane" role="tabpanel" aria-labelledby="allPackage-tab" tabindex="0">
                                    <div class="d-flex justify-content-center justify-content-sm-start g-10 flex-wrap">
                                        <div class="search-one flex-grow-1 max-w-383 mb-15">
                                            <button class="icon">
                                                <img src="{{asset('assets/images/icon/search.svg')}}" alt="" />
                                            </button>
                                            <input type="text" placeholder="Search here..." id="dataTableSearch" />
                                        </div>
                                    </div>
                                    <div class="">
                                        <table class="table zTable zTable-last-item-right" id="packagesDataTable-all">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <div class="text-nowrap">{{__('Image')}}</div>
                                                    </th>
                                                    <th>
                                                        <div class="text-nowrap">{{__('Category Name')}}</div>
                                                    </th>
                                                    <th>
                                                        <div class="text-nowrap">{{__('Package Name')}}</div>
                                                    </th>
                                                    <th>
                                                        <div>{{__('Duration Time')}}</div>
                                                    </th>
                                                    <th>
                                                        <div>{{__('Price')}}</div>
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

                                <div class="tab-pane fade" id="myPackage-tab-pane" role="tabpanel" aria-labelledby="myPackage-tab" tabindex="1">
                                    <div class="d-flex justify-content-center justify-content-sm-start g-10 flex-wrap">
                                        <div class="search-one flex-grow-1 max-w-383 mb-15">
                                            <button class="icon">
                                                <img src="{{asset('assets/images/icon/search.svg')}}" alt="" />
                                            </button>
                                            <input type="text" placeholder="Search here..." id="dataTableSearch" />
                                        </div>
                                    </div>
                                    <table class="table zTable zTable-last-item-right" id="packagesDataTable-1">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <div class="text-nowrap">{{__('Image')}}</div>
                                                </th>
                                                <th>
                                                    <div class="text-nowrap">{{__('Category Name')}}</div>
                                                </th>
                                                <th>
                                                    <div class="text-nowrap">{{__('Package Name')}}</div>
                                                </th>
                                                <th>
                                                    <div>{{__('Duration Time')}}</div>
                                                </th>
                                                <th>
                                                    <div>{{__('Price')}}</div>
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
                </div>
            </div>
        </div>
    </div>

    {{-- view packages model --}}
    <div class="modal fade" id="view-modal" tabindex="-1" aria-labelledby="addRoleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content border-0 bd-ra-4 p-20">
            </div>
        </div>
    </div>

    <input type="hidden" id="package-list-route" value="{{route('instructor.packages.list')}}">
@endsection
@push('script')
    <script src="{{asset('assets/custom/instructor/js/packages.js')}}"></script>
@endpush
