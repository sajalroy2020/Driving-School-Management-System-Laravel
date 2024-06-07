@extends('layouts.app')
@push('title')
    {{$pageTitle}}
@endpush

@section('content')
    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <div class="p-20 bd-one bd-c-stroke bd-ra-12 bg-white">
                    <div class="table-wrap-one">
                        <div
                            class="table-wrapTop d-flex align-items-center justify-content-center justify-content-md-between flex-wrap g-10 pb-18">
                            <div class="d-flex justify-content-center justify-content-sm-start g-10 flex-wrap">
                                <div class="search-one flex-grow-1 max-w-207">
                                    <h4 class="fs-18 fw-600 lh-18 text-main-color role-form-title">{{__("Add Role")}}</h4>
                                </div>
                            </div>
                        </div>
                        <form class="ajax-request reset" action="{{route('admin.role-and-permission.store')}}"
                              method="POST"
                              enctype="multipart/form-data" data-handler="roleFormResponse">
                            @csrf
                            <div class="row rg-20 pb-25">
                                <input type="hidden" name="id" value="" id="roleId">
                                <div class="col-lg-12">
                                    <label for="roleName" class="sf-form-label">{{__("Role Name")}} <span
                                            class="text-red">*</span></label>
                                    <input type="text" name="name" class="form-control sf-form-control" id="roleName"
                                           placeholder="{{__("Enter Role Name")}}"/>
                                </div>
                            </div>
                            <div class="row rg-20 pb-25">
                                <div class="col-lg-12">
                                    <label for="roleStatus" class="sf-form-label">{{__("Role Status")}} <span
                                            class="text-red">*</span></label>
                                    <select class="sf-select-without-search" name="status" id="roleStatus">
                                        <option value="{{STATUS_ACTIVE}}">{{__("Active")}}</option>
                                        <option value="{{STATUS_INACTIVE}}">{{__("Inactive")}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="bd-t-one bd-c-stroke pt-17 d-flex g-10">
                                <button type="button"
                                        class="py-13 px-20 bd-one bd-ra-4 bd-c-main-color bg-white text-main-color fs-14 fw-600 lh-14 d-none role-form-cancel-btn">{{__("Cancel")}}</button>
                                <button type="submit"
                                        class="py-13 px-20 bd-one bd-ra-4 bd-c-primary-color bg-primary-color text-white fs-14 fw-600 lh-14 role-form-btn">{{__("Save")}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="p-20 bd-one bd-c-stroke bd-ra-12 bg-white">
                    <div class="table-wrap-one">
                        <div class="table-wrapTop d-flex float-end flex-wrap g-10 pb-18">
                            <div class="d-flex justify-content-center justify-content-sm-start g-10 flex-wrap">
                                <div class="search-one flex-grow-1 max-w-207">
                                    <button class="icon"><img src="{{asset('assets/images/icon/search.svg')}}" alt=""/>
                                    </button>
                                    <input type="text" placeholder="{{__("Search here")}}..."
                                           id="rolePermissionListTableSearch"/>
                                </div>
                            </div>
                        </div>
                        <table class="table zTable zTable-last-item-right" id="roleAndPermissionListTable">
                            <thead>
                            <tr>
                                <th>
                                    <div class="text-nowrap">{{__("Role Name")}}</div>
                                </th>
                                <th>
                                    <div>{{__("Status")}}</div>
                                </th>
                                <th>
                                    <div>{{__("Action")}}</div>
                                </th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Add Permission Modal -->
    <div class="modal fade" id="addPermissionModal" tabindex="-1" aria-labelledby="addPermissionModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 bd-ra-4 p-20">

            </div>
        </div>
    </div>
    <input type="hidden" value="{{route('admin.role-and-permission.index')}}" id="rolePermissionListRoute">
@endsection

@push('script')
    <script src="{{ asset('assets/custom/admin/js/role_and_permission.js') }}"></script>
@endpush

