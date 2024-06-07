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
                                <input type="text" placeholder="{{__("Search here...")}}" id="dataTableSearch"/>
                            </div>
                        </div>
                        <button
                            class="py-13 pr-15 pl-10 bd-one bd-c-primary-color bg-primary-color bd-ra-4 fs-14 fw-500 lh-14 text-white"
                            data-bs-toggle="modal" data-bs-target="#addPackagesModal">+ {{__('Add Packages')}}</button>
                    </div>
                    <table class="table zTable zTable-last-item-right" id="packagesDataTable">
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

    {{-- Add packages model --}}
    <div class="modal fade" id="addPackagesModal" tabindex="-1" aria-labelledby="addRoleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content border-0 bd-ra-4 p-20">
                <!-- Top -->
                <div class="d-flex justify-content-between align-items-center bd-b-one bd-c-stroke pb-20 mb-20">
                    <h4 class="fs-18 fw-600 lh-18 text-main-color">{{__('Add Packages')}}</h4>
                    <button type="button" class="border-0 p-0 bg-transparent text-para-text" data-bs-dismiss="modal"
                            aria-label="Close"><i class="fa-solid fa-times"></i></button>
                </div>
                <!--  -->
                <form class="ajax-request reset" action="{{route('admin.packages.store')}}" method="POST"
                      data-handler="commonResponse" enctype="multipart/form-data">
                    @csrf
                    <div class="row rg-20 pb-25">
                        <div class="col-12">
                            <label for="addRoleStatus" class="sf-form-label">{{__('Category Name')}} <span
                                    class="text-red">*</span></label>
                            <select class="sf-select-without-search" name="category">
                                <option value="">{{__("Select Category")}}</option>
                                @foreach ($category as $data)
                                    <option value="{{$data->id}}">{{$data->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="package_name" class="sf-form-label">{{__('Package Name')}} <span
                                    class="text-red">*</span></label>
                            <input type="text" name="package_name" class="form-control sf-form-control" id="package_name"
                                   placeholder="{{__("Package Name")}}"/>
                        </div>
                        <div class="col-12">
                            <label for="price" class="sf-form-label">{{__('Package Cost')}} <span
                                    class="text-red">*</span></label>
                            <input type="number" name="price" class="form-control sf-form-control" id="price"
                                   placeholder="0"/>
                        </div>
                        <div class="col-6">
                            <label for="duration_time" class="sf-form-label">{{__('Duration')}} <span
                                    class="text-red">*</span></label>
                            <input type="number" name="duration_time" class="form-control sf-form-control"
                                   id="duration_time" placeholder="{{__("Enter Duration")}}"/>
                        </div>
                        <div class="col-6">
                            <label for="duration_type" class="sf-form-label">{{__('Duration Type')}} <span
                                    class="text-red">*</span></label>
                            <select class="sf-select-without-search" name="duration_type">
                                <option value="">{{__("Select Duration Type")}}</option>
                                <option value="{{DURATION_TYPE_DAY}}">{{__("Day")}}</option>
                                <option value="{{DURATION_TYPE_MONTH}}">{{__('Month')}}</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="addRoleName" class="sf-form-label">{{__('Add Instructor')}} <span
                                    class="text-red">*</span></label>
                            <div
                                class="flex-shrink-0 flex-grow-1 w-100 h-42 d-flex align-items-center align-self-stretch g-8 bg-white px-16 bd-one bd-c-stroke bd-ra-8">
                                <div class="flex-shrink-0 d-flex">
                                    <img src="{{asset('assets/images/icon/project-members.svg')}}" alt=""/>
                                </div>
                                <div class="dropdown dropdown-three w-100">
                                    <button class="dropdown-toggle p-0 rounded-0 border-0" type="button"
                                            data-bs-toggle="dropdown" data-bs-auto-close="outside"
                                            aria-expanded="false">{{__('Select Instructor')}}</button>
                                    <ul class="dropdown-menu">
                                        @foreach ($instructor as $data)
                                            <li>
                                                <div class="dropdown-item">
                                                    <div class="d-flex align-items-center g-10">
                                                        <input type="checkbox" name="instructors[]"
                                                               value="{{$data->id}}"
                                                               class="form-check-input mt-0 shadow-none"
                                                               id="assignSpecialApproval1"/>
                                                        <label for="assignSpecialApproval1">
                                                            <div class="d-flex align-items-center g-8">
                                                                <div
                                                                    class="flex-shrink-0 w-25 h-25 rounded-circle overflow-hidden">
                                                                    <img src="{{getFileLink($data->picture)}}" alt=""/>
                                                                </div>
                                                                <div class="content">
                                                                    <p class="fs-12 fw-600 lh-16 text-textBlack">{{$data->name}}</p>
                                                                    <p class="fs-12 fw-600 lh-13 text-para-text">{{__('Instructor')}}</p>
                                                                </div>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="instructors_id"></div>
                        </div>
                        <div class="col-12">
                            <label for="eInputBody" class="sf-form-label">{{__("Description")}}</label>
                            <textarea name="description" type="text"
                                      class="form-control sf-form-control summernoteOne" id="eInputBody"
                                      placeholder="{{__("Write your description")}}"></textarea>
                        </div>
                        <div class="col-12">
                            <div class="zForm-wrap zImage-upload-details">
                                <div class="zImage-inside">
                                    <div class="d-flex pb-12"><img src="{{asset('assets/images/icon/cloud-upload.svg')}}" alt=""/>
                                    </div>
                                    <p class="fs-15 fw-500 lh-16 text-1b1c17">{{__('Drag & drop files here')}}</p>
                                </div>
                                <label for="zImageUpload" class="sf-form-label">{{__('Add Image')}}</label>
                                <div class="upload-img-box">
                                    <img src=""/>
                                    <input type="file" name="image" id="zImageUpload" accept="image/*"
                                           onchange="previewFile(this)"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="status" class="sf-form-label">{{__('Status')}}</label>
                            <select class="sf-select-without-search" name="status">
                                <option value="{{STATUS_ACTIVE}}">{{__("Active")}}</option>
                                <option value="{{STATUS_DEACTIVATE}}">{{__('Deactivate')}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="bd-t-one bd-c-stroke pt-17 d-flex g-10">
                        <button type="button" data-bs-dismiss="modal" aria-label="Close"
                                class="py-13 px-20 bd-one bd-ra-4 bd-c-main-color bg-white text-main-color fs-14 fw-600 lh-14">{{__('Cancel')}}</button>
                        <button type="submit"
                                class="py-13 px-20 bd-one bd-ra-4 bd-c-primary-color bg-primary-color text-white fs-14 fw-600 lh-14">{{__('Save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Edit packages model --}}
    <div class="modal fade" id="edit-modal" tabindex="-1" aria-labelledby="addRoleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content border-0 bd-ra-4 p-20">
            </div>
        </div>
    </div>

    <input type="hidden" id="package-list-route" value="{{route('admin.packages.list')}}">
@endsection
@push('script')
    <script src="{{asset('assets/custom/admin/js/packages.js')}}"></script>
@endpush
