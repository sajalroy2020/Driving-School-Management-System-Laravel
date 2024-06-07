@extends('layouts.app')
@push('title')
    {{$pageTitle}}
@endpush

@section('content')
    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">
        <!-- Details -->
        <div class="row rg-15">
            <div class="col-xl-3 col-md-4">
                <div class="p-sm-25 p-15 bg-white bd-one bd-c-stroke bd-ra-10">
                    <h4 class="fs-18 fw-400 lh-22 text-main-color pb-16 mb-16 bd-b-one bd-c-stroke">{{__("Package Info")}}</h4>
                    <ul class="zList-pb-17">
                        <li>
                            <h4 class="fs-14 fw-400 lh-17 text-main-color pb-7">{{__("Image")}}:</h4>
                            <div class="multiImages-third">
                                <img class="h-auto w-auto max-w-150 rounded-1"
                                     src="{{getFileLink($packages->image)}}" alt="{{__("Profile Picture")}}"/>
                            </div>
                        </li>
                        <li>
                            <h4 class="fs-14 fw-400 lh-17 text-main-color pb-7">{{__("Package Name")}}:</h4>
                            <p class="fs-13 fw-400 lh-15 text-para-text">{{$packages->package_name}}</p>
                        </li>
                        <li>
                            <h4 class="fs-14 fw-400 lh-17 text-main-color pb-7">{{__("Category")}}:</h4>
                            <p class="fs-13 fw-400 lh-15 text-para-text">{{$packages->category->category_name}}</p>
                        </li>
                        <li>
                            <h4 class="fs-14 fw-400 lh-17 text-main-color pb-7">{{__("Price")}}:</h4>
                            <p class="fs-13 fw-400 lh-15 text-para-text">{{showCurrency($packages->price)}}</p>
                        </li>
                        <li>
                            <h4 class="fs-14 fw-400 lh-17 text-main-color pb-7">{{__("Duration")}}:</h4>
                            <p class="fs-13 fw-400 lh-15 text-para-text">{{$packages->duration_time}} {{$packages->duration_time == DURATION_TYPE_DAY?'Day':'Month'}}</p>
                        </li>
                        <li>
                            <h4 class="fs-14 fw-400 lh-17 text-main-color pb-7">{{__("Instructor")}}:</h4>
                            <div class="multiImages-third">
                                @foreach (json_decode($packages->instructors_id) as $data)
                                    <img src="{{getFileLink(getUserData($data)?->picture)}}"
                                         alt="{{getUserData($data)?->name}}" title="{{getUserData($data)?->name}}">
                                @endforeach
                                @if(count(json_decode($packages->instructors_id)) > 2)
                                    <div class="iconPlus">
                                        <span><i class="fa-solid fa-plus"></i></span>
                                    </div>
                                @endif
                            </div>
                        </li>
                        <li>
                            <h4 class="fs-14 fw-400 lh-17 text-main-color pb-7">{{__("Status")}}:</h4>
                            @if($packages->status == STATUS_ACTIVE)
                                <p class="fs-13 fw-400 lh-15 text-para-text text-primary">{{__("Active")}}</p>
                            @else
                                <p class="fs-13 fw-400 lh-15 text-para-text text-danger">{{__("Deactivate")}}</p>
                                @endif
                        </li>
                        <li>
                            <h4 class="fs-14 fw-400 lh-17 text-main-color pb-7">{{__("Created At")}}:</h4>
                            <p class="fs-13 fw-400 lh-15 text-para-text">{{$packages->created_at}}</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-9 col-md-8">
                <div class="p-sm-25 p-15 bg-white bd-one bd-c-stroke bd-ra-10 h-100">
                    <h4 class="fs-18 fw-400 lh-22 text-main-color pb-11">{{__("Package Description")}}</h4>
                    {!! $packages->description !!}
                </div>
            </div>
        </div>
    </div>
@endsection


