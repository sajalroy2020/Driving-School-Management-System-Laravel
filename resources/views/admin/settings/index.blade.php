@extends('layouts.app')
@push('title')
    {{$pageTitle}}
@endpush

@section('content')
    <!-- Content -->
    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">
        <div class="p-20 bd-one bd-c-stroke bd-ra-12 bg-white overflow-hidden min-vh-h-88">
            <div class="zTab-vertical-wrap">
                <!-- Left -->
                <div class="left">
                    <ul class="nav nav-tabs zTab-reset zTab-two" id="myTab" role="tablist">
                        <!-- Account Settings -->
                        <li class="nav-item" role="presentation">
                            <button class="nav-link d-flex align-items-center g-12 active" id="accountSettings-tab"
                                    data-bs-toggle="tab" data-bs-target="#accountSettings-tab-pane" type="button"
                                    role="tab" aria-controls="accountSettings-tab-pane" aria-selected="true">
                                <div class="icon d-flex">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12.0156 17.25C9.12562 17.25 6.76562 14.9 6.76562 12C6.76562 9.1 9.12562 6.75 12.0156 6.75C14.9056 6.75 17.2656 9.1 17.2656 12C17.2656 14.9 14.9056 17.25 12.0156 17.25ZM12.0156 8.25C9.94563 8.25 8.26562 9.93 8.26562 12C8.26562 14.07 9.94563 15.75 12.0156 15.75C14.0856 15.75 15.7656 14.07 15.7656 12C15.7656 9.93 14.0856 8.25 12.0156 8.25Z"
                                            fill="#8F96B2"/>
                                        <path
                                            d="M7.01562 12.75H2.01562C1.60563 12.75 1.26562 12.41 1.26562 12C1.26562 11.59 1.60563 11.25 2.01562 11.25H7.01562C7.42562 11.25 7.76562 11.59 7.76562 12C7.76562 12.41 7.42562 12.75 7.01562 12.75Z"
                                            fill="#8F96B2"/>
                                        <path
                                            d="M22.0156 12.75H17.0156C16.6056 12.75 16.2656 12.41 16.2656 12C16.2656 11.59 16.6056 11.25 17.0156 11.25H22.0156C22.4256 11.25 22.7656 11.59 22.7656 12C22.7656 12.41 22.4256 12.75 22.0156 12.75Z"
                                            fill="#8F96B2"/>
                                    </svg>

                                </div>
                                <span>{{__("Profile Settings")}}</span>
                            </button>
                            <span><i class="fa-solid fa-angle-right"></i></span>
                        </li>
                    @can('application-setting')
                        <!-- Application Setting -->
                            <li class="nav-item" role="presentation">
                                <button class="nav-link d-flex align-items-center g-12" id="applicationSetting-tab"
                                        data-bs-toggle="tab" data-bs-target="#applicationSetting-tab-pane" type="button"
                                        role="tab" aria-controls="applicationSetting-tab-pane" aria-selected="true">
                                    <div class="icon d-flex">
                                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12.0156 17.25C9.12562 17.25 6.76562 14.9 6.76562 12C6.76562 9.1 9.12562 6.75 12.0156 6.75C14.9056 6.75 17.2656 9.1 17.2656 12C17.2656 14.9 14.9056 17.25 12.0156 17.25ZM12.0156 8.25C9.94563 8.25 8.26562 9.93 8.26562 12C8.26562 14.07 9.94563 15.75 12.0156 15.75C14.0856 15.75 15.7656 14.07 15.7656 12C15.7656 9.93 14.0856 8.25 12.0156 8.25Z"
                                                fill="#8F96B2"/>
                                            <path
                                                d="M7.01562 12.75H2.01562C1.60563 12.75 1.26562 12.41 1.26562 12C1.26562 11.59 1.60563 11.25 2.01562 11.25H7.01562C7.42562 11.25 7.76562 11.59 7.76562 12C7.76562 12.41 7.42562 12.75 7.01562 12.75Z"
                                                fill="#8F96B2"/>
                                            <path
                                                d="M22.0156 12.75H17.0156C16.6056 12.75 16.2656 12.41 16.2656 12C16.2656 11.59 16.6056 11.25 17.0156 11.25H22.0156C22.4256 11.25 22.7656 11.59 22.7656 12C22.7656 12.41 22.4256 12.75 22.0156 12.75Z"
                                                fill="#8F96B2"/>
                                        </svg>

                                    </div>
                                    <span>{{__("Application Setting")}}</span>
                                </button>
                                <span><i class="fa-solid fa-angle-right"></i></span>
                            </li>
                    @endcan
                    @can('configuration-setting')
                        <!-- Configuration  Settings -->
                            <li class="nav-item" role="presentation">
                                <button class="nav-link d-flex align-items-center g-12" id="configurationSettings-tab"
                                        data-bs-toggle="tab" data-bs-target="#configurationSettings-tab-pane"
                                        type="button"
                                        role="tab" aria-controls="configurationSettings-tab-pane" aria-selected="true">
                                    <div class="icon d-flex">
                                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12.0156 17.25C9.12562 17.25 6.76562 14.9 6.76562 12C6.76562 9.1 9.12562 6.75 12.0156 6.75C14.9056 6.75 17.2656 9.1 17.2656 12C17.2656 14.9 14.9056 17.25 12.0156 17.25ZM12.0156 8.25C9.94563 8.25 8.26562 9.93 8.26562 12C8.26562 14.07 9.94563 15.75 12.0156 15.75C14.0856 15.75 15.7656 14.07 15.7656 12C15.7656 9.93 14.0856 8.25 12.0156 8.25Z"
                                                fill="#8F96B2"/>
                                            <path
                                                d="M7.01562 12.75H2.01562C1.60563 12.75 1.26562 12.41 1.26562 12C1.26562 11.59 1.60563 11.25 2.01562 11.25H7.01562C7.42562 11.25 7.76562 11.59 7.76562 12C7.76562 12.41 7.42562 12.75 7.01562 12.75Z"
                                                fill="#8F96B2"/>
                                            <path
                                                d="M22.0156 12.75H17.0156C16.6056 12.75 16.2656 12.41 16.2656 12C16.2656 11.59 16.6056 11.25 17.0156 11.25H22.0156C22.4256 11.25 22.7656 11.59 22.7656 12C22.7656 12.41 22.4256 12.75 22.0156 12.75Z"
                                                fill="#8F96B2"/>
                                        </svg>
                                    </div>
                                    <span>{{__("Configuration Settings")}}</span>
                                </button>
                                <span><i class="fa-solid fa-angle-right"></i></span>
                            </li>
                    @endcan
                    @can('maintenance-mode-setting')
                        <!-- Maintenance Mode Settings -->
                            <li class="nav-item" role="presentation">
                                <button class="nav-link d-flex align-items-center g-12" id="maintenanceModeSettings-tab"
                                        data-bs-toggle="tab" data-bs-target="#maintenanceModeSettings-tab-pane"
                                        type="button"
                                        role="tab" aria-controls="maintenanceModeSettings-tab-pane"
                                        aria-selected="true">
                                    <div class="icon d-flex">
                                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12.0156 17.25C9.12562 17.25 6.76562 14.9 6.76562 12C6.76562 9.1 9.12562 6.75 12.0156 6.75C14.9056 6.75 17.2656 9.1 17.2656 12C17.2656 14.9 14.9056 17.25 12.0156 17.25ZM12.0156 8.25C9.94563 8.25 8.26562 9.93 8.26562 12C8.26562 14.07 9.94563 15.75 12.0156 15.75C14.0856 15.75 15.7656 14.07 15.7656 12C15.7656 9.93 14.0856 8.25 12.0156 8.25Z"
                                                fill="#8F96B2"/>
                                            <path
                                                d="M7.01562 12.75H2.01562C1.60563 12.75 1.26562 12.41 1.26562 12C1.26562 11.59 1.60563 11.25 2.01562 11.25H7.01562C7.42562 11.25 7.76562 11.59 7.76562 12C7.76562 12.41 7.42562 12.75 7.01562 12.75Z"
                                                fill="#8F96B2"/>
                                            <path
                                                d="M22.0156 12.75H17.0156C16.6056 12.75 16.2656 12.41 16.2656 12C16.2656 11.59 16.6056 11.25 17.0156 11.25H22.0156C22.4256 11.25 22.7656 11.59 22.7656 12C22.7656 12.41 22.4256 12.75 22.0156 12.75Z"
                                                fill="#8F96B2"/>
                                        </svg>
                                    </div>
                                    <span>{{__("Maintenance Mode")}}</span>
                                </button>
                                <span><i class="fa-solid fa-angle-right"></i></span>
                            </li>
                    @endcan
                    @can('storage-setting')
                        <!-- Storage Settings -->
                            <li class="nav-item" role="presentation">
                                <button class="nav-link d-flex align-items-center g-12" id="storageSettings-tab"
                                        data-bs-toggle="tab" data-bs-target="#storageSettings-tab-pane" type="button"
                                        role="tab" aria-controls="storageSettings-tab-pane" aria-selected="true">
                                    <div class="icon d-flex">
                                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12.0156 17.25C9.12562 17.25 6.76562 14.9 6.76562 12C6.76562 9.1 9.12562 6.75 12.0156 6.75C14.9056 6.75 17.2656 9.1 17.2656 12C17.2656 14.9 14.9056 17.25 12.0156 17.25ZM12.0156 8.25C9.94563 8.25 8.26562 9.93 8.26562 12C8.26562 14.07 9.94563 15.75 12.0156 15.75C14.0856 15.75 15.7656 14.07 15.7656 12C15.7656 9.93 14.0856 8.25 12.0156 8.25Z"
                                                fill="#8F96B2"/>
                                            <path
                                                d="M7.01562 12.75H2.01562C1.60563 12.75 1.26562 12.41 1.26562 12C1.26562 11.59 1.60563 11.25 2.01562 11.25H7.01562C7.42562 11.25 7.76562 11.59 7.76562 12C7.76562 12.41 7.42562 12.75 7.01562 12.75Z"
                                                fill="#8F96B2"/>
                                            <path
                                                d="M22.0156 12.75H17.0156C16.6056 12.75 16.2656 12.41 16.2656 12C16.2656 11.59 16.6056 11.25 17.0156 11.25H22.0156C22.4256 11.25 22.7656 11.59 22.7656 12C22.7656 12.41 22.4256 12.75 22.0156 12.75Z"
                                                fill="#8F96B2"/>
                                        </svg>
                                    </div>
                                    <span>{{__("Storage Settings")}}</span>
                                </button>
                                <span><i class="fa-solid fa-angle-right"></i></span>
                            </li>
                    @endcan
                    @can('cache-setting')
                        <!-- Cache Setting -->
                            <li class="nav-item" role="presentation">
                                <button class="nav-link d-flex align-items-center g-12" id="cacheSettings-tab"
                                        data-bs-toggle="tab" data-bs-target="#cacheSettings-tab-pane" type="button"
                                        role="tab" aria-controls="cacheSettings-tab-pane" aria-selected="true">
                                    <div class="icon d-flex">
                                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12.0156 17.25C9.12562 17.25 6.76562 14.9 6.76562 12C6.76562 9.1 9.12562 6.75 12.0156 6.75C14.9056 6.75 17.2656 9.1 17.2656 12C17.2656 14.9 14.9056 17.25 12.0156 17.25ZM12.0156 8.25C9.94563 8.25 8.26562 9.93 8.26562 12C8.26562 14.07 9.94563 15.75 12.0156 15.75C14.0856 15.75 15.7656 14.07 15.7656 12C15.7656 9.93 14.0856 8.25 12.0156 8.25Z"
                                                fill="#8F96B2"/>
                                            <path
                                                d="M7.01562 12.75H2.01562C1.60563 12.75 1.26562 12.41 1.26562 12C1.26562 11.59 1.60563 11.25 2.01562 11.25H7.01562C7.42562 11.25 7.76562 11.59 7.76562 12C7.76562 12.41 7.42562 12.75 7.01562 12.75Z"
                                                fill="#8F96B2"/>
                                            <path
                                                d="M22.0156 12.75H17.0156C16.6056 12.75 16.2656 12.41 16.2656 12C16.2656 11.59 16.6056 11.25 17.0156 11.25H22.0156C22.4256 11.25 22.7656 11.59 22.7656 12C22.7656 12.41 22.4256 12.75 22.0156 12.75Z"
                                                fill="#8F96B2"/>
                                        </svg>
                                    </div>
                                    <span>{{__("Cache Setting")}}</span>
                                </button>
                                <span><i class="fa-solid fa-angle-right"></i></span>
                            </li>
                    @endcan
                    @can('language-setting')
                        <!-- Language  Settings -->
                            <li class="nav-item" role="presentation">
                                <button class="nav-link d-flex align-items-center g-12" id="languageSettings-tab"
                                        data-bs-toggle="tab" data-bs-target="#languageSettings-tab-pane" type="button"
                                        role="tab" aria-controls="languageSettings-tab-pane" aria-selected="true">
                                    <div class="icon d-flex">
                                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12.0156 17.25C9.12562 17.25 6.76562 14.9 6.76562 12C6.76562 9.1 9.12562 6.75 12.0156 6.75C14.9056 6.75 17.2656 9.1 17.2656 12C17.2656 14.9 14.9056 17.25 12.0156 17.25ZM12.0156 8.25C9.94563 8.25 8.26562 9.93 8.26562 12C8.26562 14.07 9.94563 15.75 12.0156 15.75C14.0856 15.75 15.7656 14.07 15.7656 12C15.7656 9.93 14.0856 8.25 12.0156 8.25Z"
                                                fill="#8F96B2"/>
                                            <path
                                                d="M7.01562 12.75H2.01562C1.60563 12.75 1.26562 12.41 1.26562 12C1.26562 11.59 1.60563 11.25 2.01562 11.25H7.01562C7.42562 11.25 7.76562 11.59 7.76562 12C7.76562 12.41 7.42562 12.75 7.01562 12.75Z"
                                                fill="#8F96B2"/>
                                            <path
                                                d="M22.0156 12.75H17.0156C16.6056 12.75 16.2656 12.41 16.2656 12C16.2656 11.59 16.6056 11.25 17.0156 11.25H22.0156C22.4256 11.25 22.7656 11.59 22.7656 12C22.7656 12.41 22.4256 12.75 22.0156 12.75Z"
                                                fill="#8F96B2"/>
                                        </svg>
                                    </div>
                                    <span>{{__("Language  Settings")}}</span>
                                </button>
                                <span><i class="fa-solid fa-angle-right"></i></span>
                            </li>
                    @endcan
                    @can('template-setting')
                        <!-- Template Settings -->
                            <li class="nav-item" role="presentation">
                                <button class="nav-link d-flex align-items-center g-12" id=templateSettings-tab"
                                        data-bs-toggle="tab" data-bs-target="#templateSettings-tab-pane"
                                        type="button"
                                        role="tab" aria-controls="templateSettings-tab-pane" aria-selected="true">
                                    <div class="icon d-flex">
                                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12.0156 17.25C9.12562 17.25 6.76562 14.9 6.76562 12C6.76562 9.1 9.12562 6.75 12.0156 6.75C14.9056 6.75 17.2656 9.1 17.2656 12C17.2656 14.9 14.9056 17.25 12.0156 17.25ZM12.0156 8.25C9.94563 8.25 8.26562 9.93 8.26562 12C8.26562 14.07 9.94563 15.75 12.0156 15.75C14.0856 15.75 15.7656 14.07 15.7656 12C15.7656 9.93 14.0856 8.25 12.0156 8.25Z"
                                                fill="#8F96B2"/>
                                            <path
                                                d="M7.01562 12.75H2.01562C1.60563 12.75 1.26562 12.41 1.26562 12C1.26562 11.59 1.60563 11.25 2.01562 11.25H7.01562C7.42562 11.25 7.76562 11.59 7.76562 12C7.76562 12.41 7.42562 12.75 7.01562 12.75Z"
                                                fill="#8F96B2"/>
                                            <path
                                                d="M22.0156 12.75H17.0156C16.6056 12.75 16.2656 12.41 16.2656 12C16.2656 11.59 16.6056 11.25 17.0156 11.25H22.0156C22.4256 11.25 22.7656 11.59 22.7656 12C22.7656 12.41 22.4256 12.75 22.0156 12.75Z"
                                                fill="#8F96B2"/>
                                        </svg>
                                    </div>
                                    <span>{{__("Template Settings")}}</span>
                                </button>
                                <span><i class="fa-solid fa-angle-right"></i></span>
                            </li>
                    @endcan
                    @can('currency-setting')
                        <!-- Currency Settings -->
                            <li class="nav-item" role="presentation">
                                <button class="nav-link d-flex align-items-center g-12" id="currencySettings-tab"
                                        data-bs-toggle="tab" data-bs-target="#currencySettings-tab-pane"
                                        type="button"
                                        role="tab" aria-controls="currencySettings-tab-pane" aria-selected="true">
                                    <div class="icon d-flex">
                                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12.0156 17.25C9.12562 17.25 6.76562 14.9 6.76562 12C6.76562 9.1 9.12562 6.75 12.0156 6.75C14.9056 6.75 17.2656 9.1 17.2656 12C17.2656 14.9 14.9056 17.25 12.0156 17.25ZM12.0156 8.25C9.94563 8.25 8.26562 9.93 8.26562 12C8.26562 14.07 9.94563 15.75 12.0156 15.75C14.0856 15.75 15.7656 14.07 15.7656 12C15.7656 9.93 14.0856 8.25 12.0156 8.25Z"
                                                fill="#8F96B2"/>
                                            <path
                                                d="M7.01562 12.75H2.01562C1.60563 12.75 1.26562 12.41 1.26562 12C1.26562 11.59 1.60563 11.25 2.01562 11.25H7.01562C7.42562 11.25 7.76562 11.59 7.76562 12C7.76562 12.41 7.42562 12.75 7.01562 12.75Z"
                                                fill="#8F96B2"/>
                                            <path
                                                d="M22.0156 12.75H17.0156C16.6056 12.75 16.2656 12.41 16.2656 12C16.2656 11.59 16.6056 11.25 17.0156 11.25H22.0156C22.4256 11.25 22.7656 11.59 22.7656 12C22.7656 12.41 22.4256 12.75 22.0156 12.75Z"
                                                fill="#8F96B2"/>
                                        </svg>
                                    </div>
                                    <span>{{__("Currency Settings")}}</span>
                                </button>
                                <span><i class="fa-solid fa-angle-right"></i></span>
                            </li>
                    @endcan
                    @can('payment-setting')
                        <!-- Payment Settings -->
                            <li class="nav-item" role="presentation">
                                <button class="nav-link d-flex align-items-center g-12" id="paymentSettings-tab"
                                        data-bs-toggle="tab" data-bs-target="#paymentSettings-tab-pane"
                                        type="button"
                                        role="tab" aria-controls="paymentSettings-tab-pane" aria-selected="true">
                                    <div class="icon d-flex">
                                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12.0156 17.25C9.12562 17.25 6.76562 14.9 6.76562 12C6.76562 9.1 9.12562 6.75 12.0156 6.75C14.9056 6.75 17.2656 9.1 17.2656 12C17.2656 14.9 14.9056 17.25 12.0156 17.25ZM12.0156 8.25C9.94563 8.25 8.26562 9.93 8.26562 12C8.26562 14.07 9.94563 15.75 12.0156 15.75C14.0856 15.75 15.7656 14.07 15.7656 12C15.7656 9.93 14.0856 8.25 12.0156 8.25Z"
                                                fill="#8F96B2"/>
                                            <path
                                                d="M7.01562 12.75H2.01562C1.60563 12.75 1.26562 12.41 1.26562 12C1.26562 11.59 1.60563 11.25 2.01562 11.25H7.01562C7.42562 11.25 7.76562 11.59 7.76562 12C7.76562 12.41 7.42562 12.75 7.01562 12.75Z"
                                                fill="#8F96B2"/>
                                            <path
                                                d="M22.0156 12.75H17.0156C16.6056 12.75 16.2656 12.41 16.2656 12C16.2656 11.59 16.6056 11.25 17.0156 11.25H22.0156C22.4256 11.25 22.7656 11.59 22.7656 12C22.7656 12.41 22.4256 12.75 22.0156 12.75Z"
                                                fill="#8F96B2"/>
                                        </svg>

                                    </div>
                                    <span>{{__("Payment Settings")}}</span>
                                </button>
                                <span><i class="fa-solid fa-angle-right"></i></span>
                            </li>
                    @endcan
                    {{-- @can('time-schedule-settings') --}}
                    <!-- Time Schedule Settings  -->
                        <li class="nav-item" role="presentation">
                            <button class="nav-link d-flex align-items-center g-12" id="timeScheduleSettings-tab"
                                    data-bs-toggle="tab" data-bs-target="#timeScheduleSettings-tab-pane"
                                    type="button"
                                    role="tab" aria-controls="timeScheduleettings-tab-pane" aria-selected="true">
                                <div class="icon d-flex">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12.0156 17.25C9.12562 17.25 6.76562 14.9 6.76562 12C6.76562 9.1 9.12562 6.75 12.0156 6.75C14.9056 6.75 17.2656 9.1 17.2656 12C17.2656 14.9 14.9056 17.25 12.0156 17.25ZM12.0156 8.25C9.94563 8.25 8.26562 9.93 8.26562 12C8.26562 14.07 9.94563 15.75 12.0156 15.75C14.0856 15.75 15.7656 14.07 15.7656 12C15.7656 9.93 14.0856 8.25 12.0156 8.25Z"
                                            fill="#8F96B2"/>
                                        <path
                                            d="M7.01562 12.75H2.01562C1.60563 12.75 1.26562 12.41 1.26562 12C1.26562 11.59 1.60563 11.25 2.01562 11.25H7.01562C7.42562 11.25 7.76562 11.59 7.76562 12C7.76562 12.41 7.42562 12.75 7.01562 12.75Z"
                                            fill="#8F96B2"/>
                                        <path
                                            d="M22.0156 12.75H17.0156C16.6056 12.75 16.2656 12.41 16.2656 12C16.2656 11.59 16.6056 11.25 17.0156 11.25H22.0156C22.4256 11.25 22.7656 11.59 22.7656 12C22.7656 12.41 22.4256 12.75 22.0156 12.75Z"
                                            fill="#8F96B2"/>
                                    </svg>
                                </div>
                                <span>{{__("Time Schedule Settings")}}</span>
                            </button>
                            <span><i class="fa-solid fa-angle-right"></i></span>
                        </li>
                        {{-- @endcan --}}
                    </ul>
                </div>
                <!-- Right -->
                <div class="right">
                    <div class="tab-content" id="myTabContent">
                        <!-- Account Settings -->
                        <div class="tab-pane fade show active" id="accountSettings-tab-pane" role="tabpanel"
                             aria-labelledby="accountSettings-tab" tabindex="0">

                             <ul class="nav nav-tabs zTab-reset task-chat-tab pl-0 d-flex justify-content-center" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="true">
                                        {{__('Profile')}}
                                    </button>
                                </li>
                                <li class="nav-item ml-5" role="presentation">
                                    <button class="nav-link" id="password-tab" data-bs-toggle="tab" data-bs-target="#password-tab-pane" type="button" role="tab" aria-controls="password-tab-pane" aria-selected="false">
                                        {{__('Password Update')}}
                                    </button>
                                </li>
                            </ul>

                            <div class="tab-content pt-20">
                                <div class="tab-pane fade active show rounded-4" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                                    <form class="ajax-request" action="{{ route('admin.setting.profile.update') }}"
                                        method="POST"
                                        enctype="multipart/form-data" data-handler="commonResponse">
                                        @csrf
                                        <h4 class="fs-18 fw-700 lh-24 text-main-color pb-19 mb-19 bd-b-one bd-c-stroke">{{__("Personal
                                            Information")}}</h4>
                                        <!-- Photo -->
                                        <div class="pb-30">
                                            <div class="upload-img-box profileImage-upload">
                                                <div class="icon"><img src="{{asset("assets/images/icon/camera.svg")}}" alt=""/>
                                                </div>
                                                <img src="{{getFileLink(auth()->user()->picture)}}"/>
                                                <input type="file" name="image" id="zImageUpload" accept="image/*"
                                                    onchange="previewFile(this)"/>
                                            </div>
                                        </div>
                                        <!-- Inputs -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="zForm-wrap pb-20">
                                                    <label for="name" class="sf-form-label">{{__("Full Name")}}</label>
                                                    <input type="text" class="form-control sf-form-control sf-form-control-2"
                                                        id="name" name="name" placeholder="{{__("Enter Your Name")}}"
                                                        value="{{ auth()->user()->name }}"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="zForm-wrap pb-20">
                                                    <label for="asEmailAddress"
                                                        class="sf-form-label">{{__("Email Address")}}</label>
                                                    <input type="email" class="form-control sf-form-control sf-form-control-2"
                                                        id="asEmailAddress" name="email"
                                                        placeholder="{{__("Email Address")}}"
                                                        value="{{ auth()->user()->email }}"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="zForm-wrap">
                                                <label for="asWhatsAppNumber" class="sf-form-label">{{__('Phone Number')}} <span class="text-danger">*</span></label>
                                                <input value="{{auth()->user()->phone}}" type="number" name="number" class="form-control sf-form-control sf-form-control-2" placeholder="{{__('Enter WhatsApp Number')}}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="zForm-wrap">
                                                    <label for="asZipCode" class="sf-form-label">{{__('Date of Birth')}}<span class="text-danger">*</span></label>
                                                    <input value="{{auth()->user()->dob}}" type="date" name="date_of_birth" class="form-control sf-form-control sf-form-control-2" />
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="zForm-wrap">
                                                    <label for="asPricing" class="sf-form-label">{{__('Gender')}} <span class="text-danger">*</span></label>
                                                    <select class="sf-select-without-search" name="gender">
                                                        <option>{{__("Select Gender")}}</option>
                                                        <option {{auth()->user()->gender == GENDER_MALE ? 'selected' : ''}} value="{{GENDER_MALE}}">{{__('Male')}}</option>
                                                        <option {{auth()->user()->gender == GENDER_FEMALE ? 'selected' : ''}} value="{{GENDER_FEMALE}}">{{__('Female')}}</option>
                                                        <option {{auth()->user()->gender == GENDER_OTHERS ? 'selected' : ''}} value="{{GENDER_OTHERS}}">{{__('Others')}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="zForm-wrap">
                                                    <label for="asCountry" class="sf-form-label">{{__('Country')}} <span class="text-danger">*</span></label>
                                                    <input value="{{auth()->user()->country}}" type="text" name="country" class="form-control sf-form-control sf-form-control-2" id="asCountry" placeholder="{{__('Enter Country')}}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="zForm-wrap">
                                                    <label for="asState" class="sf-form-label">{{__('State')}} </label>
                                                    <input value="{{auth()->user()->state}}" type="text" name="state" class="form-control sf-form-control sf-form-control-2" id="asState" placeholder="{{__('Enter State')}}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="zForm-wrap">
                                                    <label for="asCity" class="sf-form-label">{{__('City')}} <span class="text-danger">*</span></label>
                                                    <input value="{{auth()->user()->city}}" type="text" name="city" class="form-control sf-form-control sf-form-control-2" id="asCity" placeholder="{{__('Enter City')}}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="zForm-wrap">
                                                <label for="asZipCode" class="sf-form-label">{{__('Zip Code')}} </label>
                                                <input value="{{auth()->user()->zip}}" type="text" name="zip_code" class="form-control sf-form-control sf-form-control-2" id="asZipCode" placeholder="{{__('Enter Zip Code')}}" />
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="zForm-wrap">
                                                    <label for="asDescription" class="sf-form-label">{{__('Address')}} <span class="text-danger">*</span></label>
                                                    <textarea name="address" class="form-control sf-form-control sf-form-control-2" placeholder="{{__('Enter Your Address')}}">{{auth()->user()->address}}</textarea>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- Buttons -->
                                        <div class="d-flex align-items-center cg-10">
                                            <button type="submit"
                                                    class="border-0 bd-ra-12 py-13 px-25 bg-primary-color fs-16 fw-600 lh-19 text-white">{{__("Save Now")}}</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade rounded-4" id="password-tab-pane" role="tabpanel" aria-labelledby="password-tab" tabindex="1">
                                    <form class="ajax-request" action="{{route('admin.setting.password-update')}}" method="POST" data-handler="passwordChangeResponse">
                                        @csrf
                                        <div class="row">
                                            <h4 class="fs-18 fw-700 lh-24 text-main-color pb-19 mb-19 bd-b-one bd-c-stroke">{{__("Change Password")}}</h4>
                                            <div class="col-md-6">
                                                <div class="pb-30 passShowHide">
                                                    <label for="inputPassword" class="sf-form-label">{{__("Current Password")}} <span class="text-danger">*</span></label>
                                                    <input type="password" class="form-control sf-form-control passShowHideInput @error('password') is-invalid @enderror" id="inputPassword" placeholder="{{__("Enter your password")}}"  name="current_password"/>
                                                    <button type="button" toggle=".passShowHideInput" class="toggle-password fa-solid fa-eye"></button>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="pb-30 passShowHide">
                                                    <label for="newPassShowHide" class="sf-form-label">{{__("New Password")}} <span class="text-danger">*</span></label>
                                                    <input type="password" class="form-control sf-form-control newPassShowHideInput @error('password') is-invalid @enderror" id="newPassShowHide" placeholder="{{__("Enter your password")}}"  name="password"/>
                                                    <button type="button" toggle=".newPassShowHideInput" class="toggle-password fa-solid fa-eye"></button>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center cg-10">
                                                <button type="submit" class="border-0 bd-ra-12 py-13 px-25 bg-primary-color fs-16 fw-600 lh-19 text-white">{{__('Save Now')}}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Application Setting -->
                        <div class="tab-pane fade" id="applicationSetting-tab-pane" role="tabpanel"
                             aria-labelledby="applicationSetting-tab" tabindex="0">
                            <form class="ajax-request" action="{{ route('admin.setting.application.setting') }}"
                                  method="POST"
                                  enctype="multipart/form-data" data-handler="commonResponse">
                                @csrf
                                <h4 class="fs-18 fw-700 lh-24 text-main-color pb-19 mb-19 bd-b-one bd-c-stroke">{{__("Application Setting")}}</h4>

                                <!-- Inputs -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="zForm-wrap pb-20">
                                            <label for="app_name" class="sf-form-label">{{__("App Name")}}</label>
                                            <input type="text" class="form-control sf-form-control sf-form-control-2"
                                                   id="app_name" name="app_name"
                                                   placeholder="{{__("Application Name")}}"
                                                   value="{{getSetting('app_name')}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="zForm-wrap pb-20">
                                            <label for="app_email"
                                                   class="sf-form-label">{{__("App Email")}}</label>
                                            <input type="email" class="form-control sf-form-control sf-form-control-2"
                                                   id="app_email" name="app_email"
                                                   placeholder="{{__("Email Address")}}"
                                                   value="{{getSetting('app_email')}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="zForm-wrap pb-20">
                                            <label for="app_contact_number"
                                                   class="sf-form-label">{{__("App Contact Number")}}</label>
                                            <input type="text" class="form-control sf-form-control sf-form-control-2"
                                                   id="app_contact_number" name="app_contact_number"
                                                   placeholder="{{__("Contact Number")}}"
                                                   value="{{getSetting('app_contact_number')}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="zForm-wrap pb-20">
                                            <label for="app_location"
                                                   class="sf-form-label">{{__("App Location")}}</label>
                                            <input type="text" class="form-control sf-form-control sf-form-control-2"
                                                   id="app_location" name="app_location"
                                                   placeholder="{{__("Location")}}"
                                                   value="{{getSetting('app_location')}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="zForm-wrap pb-20">
                                            <label for="app_copyright"
                                                   class="sf-form-label">{{__("App Copyright")}}</label>
                                            <input type="text" class="form-control sf-form-control sf-form-control-2"
                                                   id="app_copyright" name="app_copyright"
                                                   value="{{getSetting('app_copyright')}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="zForm-wrap pb-20">
                                            <label for="asDesignation"
                                                   class="sf-form-label">{{__("App Timezone")}}</label>
                                            <select class="sf-select-without-search" name="app_timezone">
                                                @foreach ($timezones as $timezone)
                                                    <option value="{{ $timezone }}" {{ $timezone==getSetting('app_timezone')
                                                    ? 'selected' : '' }}>
                                                        {{ $timezone }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="zForm-wrap zImage-upload-details">
                                            <div class="zImage-inside">
                                                <div class="d-flex pb-12"><img
                                                        src="{{asset('assets/images/icon/cloud-upload.svg')}}" alt="">
                                                </div>
                                                <p class="fs-15 fw-500 lh-16 text-1b1c17">{{__("Drag")}}
                                                    &amp; {{__("drop files here")}}</p>
                                            </div>
                                            <label for="zImageUpload"
                                                   class="sf-form-label">{{__("App Preloader")}}</label>
                                            <div class="upload-img-box">
                                                @if(getSetting('app_preloader'))
                                                    <img src="{{ getFileLink(getSetting('app_preloader')) }}"/>
                                                @else
                                                    <img src="">
                                                @endif
                                                <input type="file" name="app_preloader" id="zImageUpload1"
                                                       accept="image/*" onchange="previewFile(this)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="zForm-wrap zImage-upload-details">
                                            <div class="zImage-inside">
                                                <div class="d-flex pb-12"><img
                                                        src="{{asset('assets/images/icon/cloud-upload.svg')}}" alt="">
                                                </div>
                                                <p class="fs-15 fw-500 lh-16 text-1b1c17">{{__("Drag")}}
                                                    &amp; {{__("drop files here")}}</p>
                                            </div>
                                            <label for="zImageUpload" class="sf-form-label">{{__("App Logo")}}</label>
                                            <div class="upload-img-box">
                                                @if(getSetting('app_logo'))
                                                    <img src="{{ getFileLink(getSetting('app_logo')) }}"/>
                                                @else
                                                    <img src="">
                                                @endif
                                                <input type="file" name="app_logo" id="zImageUpload2" accept="image/*"
                                                       onchange="previewFile(this)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="zForm-wrap zImage-upload-details">
                                            <div class="zImage-inside">
                                                <div class="d-flex pb-12"><img
                                                        src="{{asset('assets/images/icon/cloud-upload.svg')}}" alt="">
                                                </div>
                                                <p class="fs-15 fw-500 lh-16 text-1b1c17">{{__("Drag")}}
                                                    &amp; {{__("drop files here")}}</p>
                                            </div>
                                            <label for="zImageUpload"
                                                   class="sf-form-label">{{__("App Fav Icon")}}</label>
                                            <div class="upload-img-box">
                                                @if(getSetting('app_fav_icon'))
                                                    <img src="{{ getFileLink(getSetting('app_fav_icon')) }}"/>
                                                @else
                                                    <img src="">
                                                @endif
                                                <input type="file" name="app_fav_icon" id="zImageUpload3"
                                                       accept="image/*" onchange="previewFile(this)">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- Buttons -->
                                <div class="d-flex align-items-center cg-10">
                                    <button type="submit"
                                            class="border-0 bd-ra-12 py-13 px-25 bg-primary-color fs-16 fw-600 lh-19 text-white">{{__("Save Now")}}</button>
                                    {{--                                    <button class="border-0 bd-ra-12 py-13 px-25 bg-cancel fs-16 fw-600 lh-19 text-main-color">Cancel Now</button>--}}
                                </div>
                            </form>
                        </div>
                        <!-- Configuration  Settings -->
                        <div class="tab-pane fade" id="configurationSettings-tab-pane" role="tabpanel"
                             aria-labelledby="configurationSettings-tab" tabindex="0">
                            <h4 class="fs-18 fw-700 lh-24 text-main-color pb-30">{{__("Configuration Settings")}}</h4>
                            <ul class="zList-pb-bottom-20 zList-pb-top-20 zList-border-1">
                                <li>
                                    <div class="d-flex justify-content-between align-items-center flex-wrap g-10">
                                        <div class="">
                                            <h5 class="fs-14 fw-500 lh-17 text-main-color pb-7">{{__("E-mail credentials")}}</h5>
                                            <p class="fs-12 fw-400 lh-15 text-para-text">{{__("If you enable this. The system will enable for sending email")}}</p>
                                        </div>
                                        <!-- Switch - Configure -->
                                        <div class="d-flex align-items-center flex-wrap cg-47 rg-10">
                                            <!-- Switch -->
                                            <div class="zCheck form-check form-switch">
                                                <input class="form-check-input config-status-change" type="checkbox"
                                                       role="switch" id="emailSetup"
                                                       data-config_key="email_config_status" {{getSetting('email_config_status') == STATUS_ACTIVE?'checked':''}}/>
                                            </div>
                                            <!-- Configure -->
                                            <a href="#"
                                               class="fs-14 fw-500 lh-17 text-primary-color text-decoration-underline config-data-update-action"
                                               data-render_name="email_config_modal">{{__("Configure")}}</a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex justify-content-between align-items-center flex-wrap g-10">
                                        <div class="">
                                            <h5 class="fs-14 fw-500 lh-17 text-main-color pb-7">{{__("Google Analytics")}}</h5>
                                            <p class="fs-12 fw-400 lh-15 text-para-text">{{__("If you enable this. The system will enable for google analytics.")}}</p>
                                        </div>
                                        <!-- Switch - Configure -->
                                        <div class="d-flex align-items-center flex-wrap cg-47 rg-10">
                                            <!-- Switch -->
                                            <div class="zCheck form-check form-switch">
                                                <input class="form-check-input config-status-change" type="checkbox"
                                                       role="switch" id="googleAnalytics"
                                                       data-config_key="google_analytics_status" {{getSetting('google_analytics_status') == STATUS_ACTIVE?'checked':''}}/>
                                            </div>
                                            <!-- Configure -->
                                            <a href="#"
                                               class="fs-14 fw-500 lh-17 text-primary-color text-decoration-underline config-data-update-action"
                                               data-render_name="google_analytics_config_modal">{{__("Configure")}}</a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex justify-content-between align-items-center flex-wrap g-10">
                                        <div class="">
                                            <h5 class="fs-14 fw-500 lh-17 text-main-color pb-7">{{__("Cookie Consent")}}</h5>
                                            <p class="fs-12 fw-400 lh-15 text-para-text">{{__("If you enable this. The system will enable for cookie consent settings. User Can manage cookie consent setting ")}}</p>
                                        </div>
                                        <!-- Switch - Configure -->
                                        <div class="d-flex align-items-center flex-wrap cg-47 rg-10">
                                            <!-- Switch -->
                                            <div class="zCheck form-check form-switch">
                                                <input class="form-check-input config-status-change" type="checkbox"
                                                       role="switch" id="cookieConsent"
                                                       data-config_key="cookie_consent_status" {{getSetting('cookie_consent_status') == STATUS_ACTIVE?'checked':''}}/>
                                            </div>
                                            <!-- Configure -->
                                            <a href="#"
                                               class="fs-14 fw-500 lh-17 text-primary-color text-decoration-underline config-data-update-action"
                                               data-render_name="cookie_consent_config_modal">{{__("Configure")}}</a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex justify-content-between align-items-center flex-wrap g-10">
                                        <div class="">
                                            <h5 class="fs-14 fw-500 lh-17 text-main-color pb-7">{{__("Preloader")}}</h5>
                                            <p class="fs-12 fw-400 lh-15 text-para-text">{{__("If you enable preloader, the preloader will be show before load the content.")}}</p>
                                        </div>
                                        <!-- Switch - Configure -->
                                        <div class="d-flex align-items-center flex-wrap cg-47 rg-10">
                                            <!-- Switch -->
                                            <div class="zCheck form-check form-switch">
                                                <input class="form-check-input config-status-change" type="checkbox"
                                                       role="switch"
                                                       id="preloaderStatus"
                                                       data-config_key="preloader_status" {{getSetting('preloader_status') == STATUS_ACTIVE?'checked':''}}/>
                                            </div>
                                            <!-- Configure -->
                                            <div
                                                class="fs-14 fw-500 lh-17 text-primary-color text-decoration-underline"></div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex justify-content-between align-items-center flex-wrap g-10">
                                        <div class="">
                                            <h5 class="fs-14 fw-500 lh-17 text-main-color pb-7">{{__("Language Switcher")}}</h5>
                                            <p class="fs-12 fw-400 lh-15 text-para-text">{{__("If you enable this. The system will enable for show language switcher. By wearing it you will know how this setting works.")}}</p>
                                        </div>
                                        <!-- Switch - Configure -->
                                        <div class="d-flex align-items-center flex-wrap cg-47 rg-10">
                                            <!-- Switch -->
                                            <div class="zCheck form-check form-switch">
                                                <input class="form-check-input config-status-change" type="checkbox"
                                                       role="switch"
                                                       id="languageSwitcher"
                                                       data-config_key="language_switcher_status" {{getSetting('language_switcher_status') == STATUS_ACTIVE?'checked':''}}/>
                                            </div>
                                            <!-- Configure -->
                                            <div
                                                class="fs-14 fw-500 lh-17 text-primary-color text-decoration-underline"></div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex justify-content-between align-items-center flex-wrap g-10">
                                        <div class="">
                                            <h5 class="fs-14 fw-500 lh-17 text-main-color pb-7">{{__("Email Verification")}}</h5>
                                            <p class="fs-12 fw-400 lh-15 text-para-text">{{__("If you enable this. The system will enable for show language switcher. By wearing it you will know how this setting works.")}}</p>
                                        </div>
                                        <!-- Switch - Configure -->
                                        <div class="d-flex align-items-center flex-wrap cg-47 rg-10">
                                            <!-- Switch -->
                                            <div class="zCheck form-check form-switch">
                                                <input class="form-check-input config-status-change" type="checkbox"
                                                       role="switch"
                                                       id="emailVerification"
                                                       data-config_key="email_verification_status" {{getSetting('email_verification_status') == STATUS_ACTIVE?'checked':''}}/>
                                            </div>
                                            <!-- Configure -->
                                            <div
                                                class="fs-14 fw-500 lh-17 text-primary-color text-decoration-underline"></div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex justify-content-between align-items-center flex-wrap g-10">
                                        <div class="">
                                            <h5 class="fs-14 fw-500 lh-17 text-main-color pb-7">{{__("Signup Page Show/Hide")}}</h5>
                                            <p class="fs-12 fw-400 lh-15 text-para-text">{{__("If you enable this. The system will enable for show language switcher. By wearing it you will know how this setting works.")}}</p>
                                        </div>
                                        <!-- Switch - Configure -->
                                        <div class="d-flex align-items-center flex-wrap cg-47 rg-10">
                                            <!-- Switch -->
                                            <div class="zCheck form-check form-switch">
                                                <input class="form-check-input config-status-change" type="checkbox"
                                                       role="switch"
                                                       id="signupPage"
                                                       data-config_key="signup_page_status" {{getSetting('signup_page_status') == STATUS_ACTIVE?'checked':''}}/>
                                            </div>
                                            <!-- Configure -->
                                            <div
                                                class="fs-14 fw-500 lh-17 text-primary-color text-decoration-underline"></div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex justify-content-between align-items-center flex-wrap g-10">
                                        <div class="">
                                            <h5 class="fs-14 fw-500 lh-17 text-main-color pb-7">{{__("App Debug")}}</h5>
                                            <p class="fs-12 fw-400 lh-15 text-para-text">{{__("If you enable this.No warning message will be shown for any error. By wearing it you will know how this setting works.")}}</p>
                                        </div>
                                        <!-- Switch - Configure -->
                                        <div class="d-flex align-items-center flex-wrap cg-47 rg-10">
                                            <!-- Switch -->
                                            <div class="zCheck form-check form-switch">
                                                <input class="form-check-input config-status-change" type="checkbox"
                                                       role="switch"
                                                       id="appDebug"
                                                       data-config_key="app_debug_status" {{getSetting('app_debug_status') == STATUS_ACTIVE?'checked':''}}/>
                                            </div>
                                            <!-- Configure -->
                                            <div
                                                class="fs-14 fw-500 lh-17 text-primary-color text-decoration-underline"></div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- Maintenance Mode Settings -->
                        <div class="tab-pane fade" id="maintenanceModeSettings-tab-pane" role="tabpanel"
                             aria-labelledby="maintenanceModeSettings-tab" tabindex="0">
                            <form class="ajax-request" action="{{ route('admin.setting.maintenance.mode.update') }}"
                                  method="POST"
                                  enctype="multipart/form-data" data-handler="commonResponse">
                                @csrf
                                <h4 class="fs-18 fw-700 lh-24 text-main-color pb-19 mb-19 bd-b-one bd-c-stroke">{{__("Maintenance Mode")}}</h4>

                                <!-- Inputs -->
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="zForm-wrap pb-20">
                                            <label for="asDesignation"
                                                   class="sf-form-label">{{__("Status")}}</label>
                                            <select class="sf-select-without-search" name="maintenance_mode_status"
                                                    id="maintenanceModeChange">
                                                <option
                                                    value="1" {{getSetting('maintenance_mode_status') == 1 ? 'selected':''}}>{{__("Live")}}</option>
                                                <option
                                                    value="2" {{getSetting('maintenance_mode_status') == 2 ? 'selected':''}}>{{__("Maintenance Mode")}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div
                                    class="row maintenance-mode-secret-key-section {{getSetting('maintenance_mode_status') == 1 ? 'd-none':''}}">
                                    <div class="col-md-10">
                                        <div class="zForm-wrap pb-20">
                                            <label for="maintenanceModeSecretKeyField"
                                                   class="sf-form-label">{{__("Secret Key")}}</label>
                                            <input type="text" class="form-control sf-form-control sf-form-control-2"
                                                   id="maintenanceModeSecretKeyField" data-base_url="{{env('APP_URL')}}"
                                                   name="maintenance_mode_secret_key"
                                                   value="{{getSetting('maintenance_mode_secret_key')}}"/>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="row maintenance-mode-alert-section {{getSetting('maintenance_mode_status') == 1 ? 'd-none':''}}">
                                    <div class="col-md-10">
                                        <div class="zForm-wrap pb-20">
                                            <input type="hidden" class="form-control sf-form-control sf-form-control-2"
                                                   id="maintenanceModeAlert"
                                                   value="{{getSetting('maintenance_mode_secret_url')}}"
                                                   name="maintenance_mode_secret_url"/>
                                            <p class="alert alert-warning">{{__("When site in maintenance mode, then you can access your site using only this url : ")}}
                                                <span
                                                    class="maintenance-mode-alert">{{getSetting('maintenance_mode_secret_url')?getSetting('maintenance_mode_secret_url'):__("[ If you want url please fill up secret key field ]")}}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Buttons -->
                                <div class="d-flex align-items-center cg-10">
                                    <button type="submit"
                                            class="border-0 bd-ra-12 py-13 px-25 bg-primary-color fs-16 fw-600 lh-19 text-white">{{__("Update")}}</button>
                                </div>
                            </form>
                        </div>
                        <!-- Storage Settings -->
                        <div class="tab-pane fade" id="storageSettings-tab-pane" role="tabpanel"
                             aria-labelledby="storageSettings-tab" tabindex="0">
                            <form class="ajax-request" action="{{ route('admin.setting.storage.driver.update') }}"
                                  method="POST"
                                  enctype="multipart/form-data" data-handler="commonResponse">
                                @csrf
                                <h4 class="fs-18 fw-700 lh-24 text-main-color pb-19 mb-19 bd-b-one bd-c-stroke">{{__("Storage Driver Settings")}}</h4>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="zForm-wrap pb-20">
                                            <p class="alert alert-light">{{__("After change storage driver, please click this button")}}
                                                <a href="{{ route('admin.setting.storage.link') }}"
                                                   class="btn btn-dark">{{__("Storage Link")}}</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Inputs -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="zForm-wrap pb-20">
                                            <label for="storageDriver"
                                                   class="sf-form-label">{{__("Storage Driver")}}</label>
                                            <select class="sf-select-without-search" name="STORAGE_DRIVER"
                                                    id="storageDriver">
                                                <option
                                                    value="{{STORAGE_DRIVER_PUBLIC}}" {{getSetting('STORAGE_DRIVER') == STORAGE_DRIVER_PUBLIC ? 'selected':''}}>{{__("Public")}}</option>
                                                <option
                                                    value="{{STORAGE_DRIVER_AWS}}" {{getSetting('STORAGE_DRIVER') == STORAGE_DRIVER_AWS ? 'selected':''}}>{{__("AWS")}}</option>
                                                <option
                                                    value="{{STORAGE_DRIVER_VULTR}}" {{getSetting('STORAGE_DRIVER') == STORAGE_DRIVER_VULTR ? 'selected':''}}>{{__("Vultr")}}</option>
                                                <option
                                                    value="{{STORAGE_DRIVER_WASABI}}" {{getSetting('STORAGE_DRIVER') == STORAGE_DRIVER_WASABI ? 'selected':''}}>{{__("Wasabi")}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div
                                    class="row storage-driver-others-section {{(getSetting('STORAGE_DRIVER') == STORAGE_DRIVER_PUBLIC || getSetting('STORAGE_DRIVER') == NULL) ? 'd-none':''}}">
                                    <div class="col-md-6">
                                        <div class="zForm-wrap pb-20">
                                            <label for="accessKeyId"
                                                   class="sf-form-label">{{__("Access Key ID")}}</label>
                                            <input type="text" class="form-control sf-form-control sf-form-control-2"
                                                   id="accessKeyId" name="ACCESS_KEY_ID"
                                                   value="{{getSetting('ACCESS_KEY_ID')}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="zForm-wrap pb-20">
                                            <label for="secretAccessKey"
                                                   class="sf-form-label">{{__("Secret Access Key")}}</label>
                                            <input type="text" class="form-control sf-form-control sf-form-control-2"
                                                   id="secretAccessKey" name="SECRET_ACCESS_KEY"
                                                   value="{{getSetting('SECRET_ACCESS_KEY')}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="zForm-wrap pb-20">
                                            <label for="defaultRegion"
                                                   class="sf-form-label">{{__("Default Region")}}</label>
                                            <input type="text" class="form-control sf-form-control sf-form-control-2"
                                                   id="defaultRegion" name="DEFAULT_REGION"
                                                   value="{{getSetting('DEFAULT_REGION')}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="zForm-wrap pb-20">
                                            <label for="bucket" class="sf-form-label">{{__("Bucket")}}</label>
                                            <input type="text" class="form-control sf-form-control sf-form-control-2"
                                                   id="bucket" name="BUCKET" value="{{getSetting('BUCKET')}}"/>
                                        </div>
                                    </div>
                                </div>
                                <!-- Buttons -->
                                <div class="d-flex align-items-center cg-10">
                                    <button type="submit"
                                            class="border-0 bd-ra-12 py-13 px-25 bg-primary-color fs-16 fw-600 lh-19 text-white">{{__("Update")}}</button>
                                </div>
                            </form>
                        </div>
                        <!-- Cache Settings -->
                        <div class="tab-pane fade" id="cacheSettings-tab-pane" role="tabpanel"
                             aria-labelledby="cacheSettings-tab" tabindex="0">

                            <h4 class="fs-18 fw-700 lh-24 text-main-color pb-19 mb-19 bd-b-one bd-c-stroke">{{__("Cache Clear Settings")}}</h4>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="zForm-wrap pb-20">
                                        <p class="alert alert-light">{{__("If you need to clear the cache of your system, please click on specific button.")}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- Buttons -->
                            <div class="d-flex align-items-center cg-10">
                                <a href="{{route('admin.setting.cache.clear', CLEAR_ROUTE_CACHE)}}"
                                   class="border-0 bd-ra-12 py-13 px-25 bg-primary-color fs-16 fw-600 lh-19 text-white">{{__("Route Cache")}}</a>
                                <a href="{{route('admin.setting.cache.clear', CLEAR_VIEW_CACHE)}}"
                                   class="border-0 bd-ra-12 py-13 px-25 bg-primary-color fs-16 fw-600 lh-19 text-white">{{__("View Cache")}}</a>
                                <a href="{{route('admin.setting.cache.clear',CLEAR_CONFIG_CACHE)}}"
                                   class="border-0 bd-ra-12 py-13 px-25 bg-primary-color fs-16 fw-600 lh-19 text-white">{{__("Config Cache")}}</a>
                                <a href="{{route('admin.setting.cache.clear', CLEAR_APPLICATION_CACHE)}}"
                                   class="border-0 bd-ra-12 py-13 px-25 bg-primary-color fs-16 fw-600 lh-19 text-white">{{__("Application Cache")}}</a>
                                <a href="{{route('admin.setting.cache.clear', CLEAR_ALL_CACHE)}}"
                                   class="border-0 bd-ra-12 py-13 px-25 bg-primary-color fs-16 fw-600 lh-19 text-white">{{__("All Cache")}}</a>
                            </div>

                        </div>
                        <!-- Language Settings -->
                        <div class="tab-pane fade" id="languageSettings-tab-pane" role="tabpanel"
                             aria-labelledby="languageSettings-taLanguageb" tabindex="0">
                            <h4 class="fs-18 fw-700 lh-24 text-main-color pb-19 mb-19 bd-b-one bd-c-stroke">{{__("Language Settings")}}
                                <button type="submit"
                                        class="border-0 bd-ra-12 float-end py-13 px-25 bg-primary-color fs-16 fw-600 lh-19 text-white"
                                        data-bs-toggle="modal" data-bs-target="#addLanguageModal">
                                    + {{__("Add Language")}}</button>
                            </h4>

                            <div class="row rg-20">
                                @if(!empty($languageList))
                                    @foreach($languageList as $language)
                                        <div class="col-lg-4">
                                            <div class="dropdown dropdown-one">
                                                <button
                                                    class="dropdown-toggle p-10 bg-transparent bd-one bd-c-stroke bd-ra-8 w-100 d-flex justify-content-between align-items-center g-10"
                                                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <div class="d-flex align-items-center cg-8">
                                                        <div class="d-flex">
                                                            <img src="{{getFileLink($language->flag_image)}}" alt=""
                                                                 class="max-w-26 w-100">
                                                        </div>
                                                        <p class="fs-13 fw-500 lh-16 text-main-color">{{$language->language}}</p>
                                                    </div>
                                                    <span><i class="fa-solid fa-ellipsis-vertical"></i></span>
                                                </button>
                                                <ul class="dropdown-menu dropdownItem-one" style="">
                                                    <li>
                                                        <button
                                                            onclick="editCommonModal('{{route('admin.setting.languages.edit', $language->id)}}','{{'#editLanguageModal'}}')"
                                                            class="border-0 bg-transparent p-0 d-flex align-items-center cg-8">
                                                            <div class="d-flex">
                                                                <svg width="14" height="14" viewBox="0 0 14 14"
                                                                     fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M2.37405 12.3634L2.66794 11.9589L2.37405 12.3634ZM1.63661 11.626L2.04112 11.3321L1.63661 11.626ZM12.3634 11.626L11.9589 11.3321L12.3634 11.626ZM11.626 12.3634L11.3321 11.9589L11.626 12.3634ZM11.626 1.63661L11.3321 2.04112L11.626 1.63661ZM12.3634 2.37405L11.9589 2.66794L12.3634 2.37405ZM2.37405 1.63661L2.66794 2.04112L2.37405 1.63661ZM1.63661 2.37405L2.04112 2.66794L1.63661 2.37405ZM5 6.5C4.72386 6.5 4.5 6.72386 4.5 7C4.5 7.27614 4.72386 7.5 5 7.5V6.5ZM9 7.5C9.27614 7.5 9.5 7.27614 9.5 7C9.5 6.72386 9.27614 6.5 9 6.5V7.5ZM6.5 9C6.5 9.27614 6.72386 9.5 7 9.5C7.27614 9.5 7.5 9.27614 7.5 9H6.5ZM7.5 5C7.5 4.72386 7.27614 4.5 7 4.5C6.72386 4.5 6.5 4.72386 6.5 5H7.5ZM7 12.5C5.73895 12.5 4.83333 12.4993 4.13203 12.4233C3.44009 12.3484 3.00661 12.2049 2.66794 11.9589L2.08016 12.7679C2.61771 13.1585 3.24729 13.3333 4.02432 13.4175C4.79198 13.5007 5.76123 13.5 7 13.5V12.5ZM0.5 7C0.5 8.23877 0.499314 9.20802 0.582485 9.97568C0.666671 10.7527 0.841549 11.3823 1.2321 11.9198L2.04112 11.3321C1.79506 10.9934 1.65163 10.5599 1.57667 9.86797C1.50069 9.16667 1.5 8.26105 1.5 7H0.5ZM2.66794 11.9589C2.42741 11.7841 2.21588 11.5726 2.04112 11.3321L1.2321 11.9198C1.46854 12.2453 1.75473 12.5315 2.08016 12.7679L2.66794 11.9589ZM12.5 7C12.5 8.26105 12.4993 9.16667 12.4233 9.86797C12.3484 10.5599 12.2049 10.9934 11.9589 11.3321L12.7679 11.9198C13.1585 11.3823 13.3333 10.7527 13.4175 9.97568C13.5007 9.20802 13.5 8.23877 13.5 7H12.5ZM7 13.5C8.23877 13.5 9.20802 13.5007 9.97568 13.4175C10.7527 13.3333 11.3823 13.1585 11.9198 12.7679L11.3321 11.9589C10.9934 12.2049 10.5599 12.3484 9.86797 12.4233C9.16667 12.4993 8.26105 12.5 7 12.5V13.5ZM11.9589 11.3321C11.7841 11.5726 11.5726 11.7841 11.3321 11.9589L11.9198 12.7679C12.2453 12.5315 12.5315 12.2453 12.7679 11.9198L11.9589 11.3321ZM7 1.5C8.26105 1.5 9.16667 1.50069 9.86797 1.57667C10.5599 1.65163 10.9934 1.79506 11.3321 2.04112L11.9198 1.2321C11.3823 0.841549 10.7527 0.666671 9.97568 0.582485C9.20802 0.499314 8.23877 0.5 7 0.5V1.5ZM13.5 7C13.5 5.76123 13.5007 4.79198 13.4175 4.02432C13.3333 3.24729 13.1585 2.61771 12.7679 2.08016L11.9589 2.66794C12.2049 3.00661 12.3484 3.44009 12.4233 4.13203C12.4993 4.83333 12.5 5.73895 12.5 7H13.5ZM11.3321 2.04112C11.5726 2.21588 11.7841 2.42741 11.9589 2.66794L12.7679 2.08016C12.5315 1.75473 12.2453 1.46854 11.9198 1.2321L11.3321 2.04112ZM7 0.5C5.76123 0.5 4.79198 0.499314 4.02432 0.582485C3.24729 0.666671 2.61771 0.841549 2.08016 1.2321L2.66794 2.04112C3.00661 1.79506 3.44009 1.65163 4.13203 1.57667C4.83333 1.50069 5.73895 1.5 7 1.5V0.5ZM1.5 7C1.5 5.73895 1.50069 4.83333 1.57667 4.13203C1.65163 3.44009 1.79506 3.00661 2.04112 2.66794L1.2321 2.08016C0.841549 2.61771 0.666671 3.24729 0.582485 4.02432C0.499314 4.79198 0.5 5.76123 0.5 7H1.5ZM2.08016 1.2321C1.75473 1.46854 1.46854 1.75473 1.2321 2.08016L2.04112 2.66794C2.21588 2.42741 2.42741 2.21588 2.66794 2.04112L2.08016 1.2321ZM5 7.5H9V6.5H5V7.5ZM7.5 9V5H6.5V9H7.5Z"
                                                                        fill="#4C40F7"></path>
                                                                </svg>
                                                            </div>
                                                            <p class="fs-14 fw-500 lh-19 text-main-color">{{__("Edit")}}</p>
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <button
                                                            onclick="deleteCommonMethod('{{route('admin.setting.languages.delete', $language->id)}}')"
                                                            class="border-0 bg-transparent p-0 d-flex align-items-center cg-8">
                                                            <div class="d-flex">
                                                                <svg width="14" height="14" viewBox="0 0 14 14"
                                                                     fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M2.37405 12.3634L2.66794 11.9589L2.37405 12.3634ZM1.63661 11.626L2.04112 11.3321L1.63661 11.626ZM12.3634 11.626L11.9589 11.3321L12.3634 11.626ZM11.626 12.3634L11.3321 11.9589L11.626 12.3634ZM11.626 1.63661L11.3321 2.04112L11.626 1.63661ZM12.3634 2.37405L11.9589 2.66794L12.3634 2.37405ZM2.37405 1.63661L2.66794 2.04112L2.37405 1.63661ZM1.63661 2.37405L2.04112 2.66794L1.63661 2.37405ZM5 6.5C4.72386 6.5 4.5 6.72386 4.5 7C4.5 7.27614 4.72386 7.5 5 7.5V6.5ZM9 7.5C9.27614 7.5 9.5 7.27614 9.5 7C9.5 6.72386 9.27614 6.5 9 6.5V7.5ZM6.5 9C6.5 9.27614 6.72386 9.5 7 9.5C7.27614 9.5 7.5 9.27614 7.5 9H6.5ZM7.5 5C7.5 4.72386 7.27614 4.5 7 4.5C6.72386 4.5 6.5 4.72386 6.5 5H7.5ZM7 12.5C5.73895 12.5 4.83333 12.4993 4.13203 12.4233C3.44009 12.3484 3.00661 12.2049 2.66794 11.9589L2.08016 12.7679C2.61771 13.1585 3.24729 13.3333 4.02432 13.4175C4.79198 13.5007 5.76123 13.5 7 13.5V12.5ZM0.5 7C0.5 8.23877 0.499314 9.20802 0.582485 9.97568C0.666671 10.7527 0.841549 11.3823 1.2321 11.9198L2.04112 11.3321C1.79506 10.9934 1.65163 10.5599 1.57667 9.86797C1.50069 9.16667 1.5 8.26105 1.5 7H0.5ZM2.66794 11.9589C2.42741 11.7841 2.21588 11.5726 2.04112 11.3321L1.2321 11.9198C1.46854 12.2453 1.75473 12.5315 2.08016 12.7679L2.66794 11.9589ZM12.5 7C12.5 8.26105 12.4993 9.16667 12.4233 9.86797C12.3484 10.5599 12.2049 10.9934 11.9589 11.3321L12.7679 11.9198C13.1585 11.3823 13.3333 10.7527 13.4175 9.97568C13.5007 9.20802 13.5 8.23877 13.5 7H12.5ZM7 13.5C8.23877 13.5 9.20802 13.5007 9.97568 13.4175C10.7527 13.3333 11.3823 13.1585 11.9198 12.7679L11.3321 11.9589C10.9934 12.2049 10.5599 12.3484 9.86797 12.4233C9.16667 12.4993 8.26105 12.5 7 12.5V13.5ZM11.9589 11.3321C11.7841 11.5726 11.5726 11.7841 11.3321 11.9589L11.9198 12.7679C12.2453 12.5315 12.5315 12.2453 12.7679 11.9198L11.9589 11.3321ZM7 1.5C8.26105 1.5 9.16667 1.50069 9.86797 1.57667C10.5599 1.65163 10.9934 1.79506 11.3321 2.04112L11.9198 1.2321C11.3823 0.841549 10.7527 0.666671 9.97568 0.582485C9.20802 0.499314 8.23877 0.5 7 0.5V1.5ZM13.5 7C13.5 5.76123 13.5007 4.79198 13.4175 4.02432C13.3333 3.24729 13.1585 2.61771 12.7679 2.08016L11.9589 2.66794C12.2049 3.00661 12.3484 3.44009 12.4233 4.13203C12.4993 4.83333 12.5 5.73895 12.5 7H13.5ZM11.3321 2.04112C11.5726 2.21588 11.7841 2.42741 11.9589 2.66794L12.7679 2.08016C12.5315 1.75473 12.2453 1.46854 11.9198 1.2321L11.3321 2.04112ZM7 0.5C5.76123 0.5 4.79198 0.499314 4.02432 0.582485C3.24729 0.666671 2.61771 0.841549 2.08016 1.2321L2.66794 2.04112C3.00661 1.79506 3.44009 1.65163 4.13203 1.57667C4.83333 1.50069 5.73895 1.5 7 1.5V0.5ZM1.5 7C1.5 5.73895 1.50069 4.83333 1.57667 4.13203C1.65163 3.44009 1.79506 3.00661 2.04112 2.66794L1.2321 2.08016C0.841549 2.61771 0.666671 3.24729 0.582485 4.02432C0.499314 4.79198 0.5 5.76123 0.5 7H1.5ZM2.08016 1.2321C1.75473 1.46854 1.46854 1.75473 1.2321 2.08016L2.04112 2.66794C2.21588 2.42741 2.42741 2.21588 2.66794 2.04112L2.08016 1.2321ZM5 7.5H9V6.5H5V7.5ZM7.5 9V5H6.5V9H7.5Z"
                                                                        fill="#4C40F7"></path>
                                                                </svg>
                                                            </div>
                                                            <p class="fs-14 fw-500 lh-19 text-main-color">{{__("Delete")}}</p>
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <button
                                                            onclick="editCommonModal('{{route('admin.setting.languages.translate', $language->id)}}','{{'#translateLanguageModal'}}')"
                                                            class="border-0 bg-transparent p-0 d-flex align-items-center cg-8">
                                                            <div class="d-flex">
                                                                <svg width="14" height="14" viewBox="0 0 14 14"
                                                                     fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M2.37405 12.3634L2.66794 11.9589L2.37405 12.3634ZM1.63661 11.626L2.04112 11.3321L1.63661 11.626ZM12.3634 11.626L11.9589 11.3321L12.3634 11.626ZM11.626 12.3634L11.3321 11.9589L11.626 12.3634ZM11.626 1.63661L11.3321 2.04112L11.626 1.63661ZM12.3634 2.37405L11.9589 2.66794L12.3634 2.37405ZM2.37405 1.63661L2.66794 2.04112L2.37405 1.63661ZM1.63661 2.37405L2.04112 2.66794L1.63661 2.37405ZM5 6.5C4.72386 6.5 4.5 6.72386 4.5 7C4.5 7.27614 4.72386 7.5 5 7.5V6.5ZM9 7.5C9.27614 7.5 9.5 7.27614 9.5 7C9.5 6.72386 9.27614 6.5 9 6.5V7.5ZM6.5 9C6.5 9.27614 6.72386 9.5 7 9.5C7.27614 9.5 7.5 9.27614 7.5 9H6.5ZM7.5 5C7.5 4.72386 7.27614 4.5 7 4.5C6.72386 4.5 6.5 4.72386 6.5 5H7.5ZM7 12.5C5.73895 12.5 4.83333 12.4993 4.13203 12.4233C3.44009 12.3484 3.00661 12.2049 2.66794 11.9589L2.08016 12.7679C2.61771 13.1585 3.24729 13.3333 4.02432 13.4175C4.79198 13.5007 5.76123 13.5 7 13.5V12.5ZM0.5 7C0.5 8.23877 0.499314 9.20802 0.582485 9.97568C0.666671 10.7527 0.841549 11.3823 1.2321 11.9198L2.04112 11.3321C1.79506 10.9934 1.65163 10.5599 1.57667 9.86797C1.50069 9.16667 1.5 8.26105 1.5 7H0.5ZM2.66794 11.9589C2.42741 11.7841 2.21588 11.5726 2.04112 11.3321L1.2321 11.9198C1.46854 12.2453 1.75473 12.5315 2.08016 12.7679L2.66794 11.9589ZM12.5 7C12.5 8.26105 12.4993 9.16667 12.4233 9.86797C12.3484 10.5599 12.2049 10.9934 11.9589 11.3321L12.7679 11.9198C13.1585 11.3823 13.3333 10.7527 13.4175 9.97568C13.5007 9.20802 13.5 8.23877 13.5 7H12.5ZM7 13.5C8.23877 13.5 9.20802 13.5007 9.97568 13.4175C10.7527 13.3333 11.3823 13.1585 11.9198 12.7679L11.3321 11.9589C10.9934 12.2049 10.5599 12.3484 9.86797 12.4233C9.16667 12.4993 8.26105 12.5 7 12.5V13.5ZM11.9589 11.3321C11.7841 11.5726 11.5726 11.7841 11.3321 11.9589L11.9198 12.7679C12.2453 12.5315 12.5315 12.2453 12.7679 11.9198L11.9589 11.3321ZM7 1.5C8.26105 1.5 9.16667 1.50069 9.86797 1.57667C10.5599 1.65163 10.9934 1.79506 11.3321 2.04112L11.9198 1.2321C11.3823 0.841549 10.7527 0.666671 9.97568 0.582485C9.20802 0.499314 8.23877 0.5 7 0.5V1.5ZM13.5 7C13.5 5.76123 13.5007 4.79198 13.4175 4.02432C13.3333 3.24729 13.1585 2.61771 12.7679 2.08016L11.9589 2.66794C12.2049 3.00661 12.3484 3.44009 12.4233 4.13203C12.4993 4.83333 12.5 5.73895 12.5 7H13.5ZM11.3321 2.04112C11.5726 2.21588 11.7841 2.42741 11.9589 2.66794L12.7679 2.08016C12.5315 1.75473 12.2453 1.46854 11.9198 1.2321L11.3321 2.04112ZM7 0.5C5.76123 0.5 4.79198 0.499314 4.02432 0.582485C3.24729 0.666671 2.61771 0.841549 2.08016 1.2321L2.66794 2.04112C3.00661 1.79506 3.44009 1.65163 4.13203 1.57667C4.83333 1.50069 5.73895 1.5 7 1.5V0.5ZM1.5 7C1.5 5.73895 1.50069 4.83333 1.57667 4.13203C1.65163 3.44009 1.79506 3.00661 2.04112 2.66794L1.2321 2.08016C0.841549 2.61771 0.666671 3.24729 0.582485 4.02432C0.499314 4.79198 0.5 5.76123 0.5 7H1.5ZM2.08016 1.2321C1.75473 1.46854 1.46854 1.75473 1.2321 2.08016L2.04112 2.66794C2.21588 2.42741 2.42741 2.21588 2.66794 2.04112L2.08016 1.2321ZM5 7.5H9V6.5H5V7.5ZM7.5 9V5H6.5V9H7.5Z"
                                                                        fill="#4C40F7"></path>
                                                                </svg>
                                                            </div>
                                                            <p class="fs-14 fw-500 lh-19 text-main-color">{{__("Translate")}}</p>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p>{{__("No Data Found!")}}</p>
                                @endif
                            </div>
                        </div>
                        <!-- Template Settings -->
                        <div class="tab-pane fade" id="templateSettings-tab-pane" role="tabpanel"
                             aria-labelledby="languageSettings-taLanguageb" tabindex="0">
                            <h4 class="fs-18 fw-700 lh-24 text-main-color pb-19 mb-19 bd-b-one bd-c-stroke">{{__("Language Settings")}}
                                <button type="submit"
                                        class="border-0 bd-ra-12 float-end py-13 px-25 bg-primary-color fs-16 fw-600 lh-19 text-white"
                                        data-bs-toggle="modal" data-bs-target="#addLanguageModal">
                                    + {{__("Add Language")}}</button>
                            </h4>

                            <div class="row rg-20">
                                @if(!empty($languageList))
                                    @foreach($languageList as $language)
                                        <div class="col-lg-4">
                                            <div class="dropdown dropdown-one">
                                                <button
                                                    class="dropdown-toggle p-10 bg-transparent bd-one bd-c-stroke bd-ra-8 w-100 d-flex justify-content-between align-items-center g-10"
                                                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <div class="d-flex align-items-center cg-8">
                                                        <div class="d-flex">
                                                            <img src="{{getFileLink($language->flag_image)}}" alt=""
                                                                 class="max-w-26 w-100">
                                                        </div>
                                                        <p class="fs-13 fw-500 lh-16 text-main-color">{{$language->language}}</p>
                                                    </div>
                                                    <span><i class="fa-solid fa-ellipsis-vertical"></i></span>
                                                </button>
                                                <ul class="dropdown-menu dropdownItem-one" style="">
                                                    <li>
                                                        <button
                                                            onclick="editCommonModal('{{route('admin.setting.languages.edit', $language->id)}}','{{'#editLanguageModal'}}')"
                                                            class="border-0 bg-transparent p-0 d-flex align-items-center cg-8">
                                                            <div class="d-flex">
                                                                <svg width="14" height="14" viewBox="0 0 14 14"
                                                                     fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M2.37405 12.3634L2.66794 11.9589L2.37405 12.3634ZM1.63661 11.626L2.04112 11.3321L1.63661 11.626ZM12.3634 11.626L11.9589 11.3321L12.3634 11.626ZM11.626 12.3634L11.3321 11.9589L11.626 12.3634ZM11.626 1.63661L11.3321 2.04112L11.626 1.63661ZM12.3634 2.37405L11.9589 2.66794L12.3634 2.37405ZM2.37405 1.63661L2.66794 2.04112L2.37405 1.63661ZM1.63661 2.37405L2.04112 2.66794L1.63661 2.37405ZM5 6.5C4.72386 6.5 4.5 6.72386 4.5 7C4.5 7.27614 4.72386 7.5 5 7.5V6.5ZM9 7.5C9.27614 7.5 9.5 7.27614 9.5 7C9.5 6.72386 9.27614 6.5 9 6.5V7.5ZM6.5 9C6.5 9.27614 6.72386 9.5 7 9.5C7.27614 9.5 7.5 9.27614 7.5 9H6.5ZM7.5 5C7.5 4.72386 7.27614 4.5 7 4.5C6.72386 4.5 6.5 4.72386 6.5 5H7.5ZM7 12.5C5.73895 12.5 4.83333 12.4993 4.13203 12.4233C3.44009 12.3484 3.00661 12.2049 2.66794 11.9589L2.08016 12.7679C2.61771 13.1585 3.24729 13.3333 4.02432 13.4175C4.79198 13.5007 5.76123 13.5 7 13.5V12.5ZM0.5 7C0.5 8.23877 0.499314 9.20802 0.582485 9.97568C0.666671 10.7527 0.841549 11.3823 1.2321 11.9198L2.04112 11.3321C1.79506 10.9934 1.65163 10.5599 1.57667 9.86797C1.50069 9.16667 1.5 8.26105 1.5 7H0.5ZM2.66794 11.9589C2.42741 11.7841 2.21588 11.5726 2.04112 11.3321L1.2321 11.9198C1.46854 12.2453 1.75473 12.5315 2.08016 12.7679L2.66794 11.9589ZM12.5 7C12.5 8.26105 12.4993 9.16667 12.4233 9.86797C12.3484 10.5599 12.2049 10.9934 11.9589 11.3321L12.7679 11.9198C13.1585 11.3823 13.3333 10.7527 13.4175 9.97568C13.5007 9.20802 13.5 8.23877 13.5 7H12.5ZM7 13.5C8.23877 13.5 9.20802 13.5007 9.97568 13.4175C10.7527 13.3333 11.3823 13.1585 11.9198 12.7679L11.3321 11.9589C10.9934 12.2049 10.5599 12.3484 9.86797 12.4233C9.16667 12.4993 8.26105 12.5 7 12.5V13.5ZM11.9589 11.3321C11.7841 11.5726 11.5726 11.7841 11.3321 11.9589L11.9198 12.7679C12.2453 12.5315 12.5315 12.2453 12.7679 11.9198L11.9589 11.3321ZM7 1.5C8.26105 1.5 9.16667 1.50069 9.86797 1.57667C10.5599 1.65163 10.9934 1.79506 11.3321 2.04112L11.9198 1.2321C11.3823 0.841549 10.7527 0.666671 9.97568 0.582485C9.20802 0.499314 8.23877 0.5 7 0.5V1.5ZM13.5 7C13.5 5.76123 13.5007 4.79198 13.4175 4.02432C13.3333 3.24729 13.1585 2.61771 12.7679 2.08016L11.9589 2.66794C12.2049 3.00661 12.3484 3.44009 12.4233 4.13203C12.4993 4.83333 12.5 5.73895 12.5 7H13.5ZM11.3321 2.04112C11.5726 2.21588 11.7841 2.42741 11.9589 2.66794L12.7679 2.08016C12.5315 1.75473 12.2453 1.46854 11.9198 1.2321L11.3321 2.04112ZM7 0.5C5.76123 0.5 4.79198 0.499314 4.02432 0.582485C3.24729 0.666671 2.61771 0.841549 2.08016 1.2321L2.66794 2.04112C3.00661 1.79506 3.44009 1.65163 4.13203 1.57667C4.83333 1.50069 5.73895 1.5 7 1.5V0.5ZM1.5 7C1.5 5.73895 1.50069 4.83333 1.57667 4.13203C1.65163 3.44009 1.79506 3.00661 2.04112 2.66794L1.2321 2.08016C0.841549 2.61771 0.666671 3.24729 0.582485 4.02432C0.499314 4.79198 0.5 5.76123 0.5 7H1.5ZM2.08016 1.2321C1.75473 1.46854 1.46854 1.75473 1.2321 2.08016L2.04112 2.66794C2.21588 2.42741 2.42741 2.21588 2.66794 2.04112L2.08016 1.2321ZM5 7.5H9V6.5H5V7.5ZM7.5 9V5H6.5V9H7.5Z"
                                                                        fill="#4C40F7"></path>
                                                                </svg>
                                                            </div>
                                                            <p class="fs-14 fw-500 lh-19 text-main-color">{{__("Edit")}}</p>
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <button
                                                            onclick="deleteCommonMethod('{{route('admin.setting.languages.delete', $language->id)}}')"
                                                            class="border-0 bg-transparent p-0 d-flex align-items-center cg-8">
                                                            <div class="d-flex">
                                                                <svg width="14" height="14" viewBox="0 0 14 14"
                                                                     fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M2.37405 12.3634L2.66794 11.9589L2.37405 12.3634ZM1.63661 11.626L2.04112 11.3321L1.63661 11.626ZM12.3634 11.626L11.9589 11.3321L12.3634 11.626ZM11.626 12.3634L11.3321 11.9589L11.626 12.3634ZM11.626 1.63661L11.3321 2.04112L11.626 1.63661ZM12.3634 2.37405L11.9589 2.66794L12.3634 2.37405ZM2.37405 1.63661L2.66794 2.04112L2.37405 1.63661ZM1.63661 2.37405L2.04112 2.66794L1.63661 2.37405ZM5 6.5C4.72386 6.5 4.5 6.72386 4.5 7C4.5 7.27614 4.72386 7.5 5 7.5V6.5ZM9 7.5C9.27614 7.5 9.5 7.27614 9.5 7C9.5 6.72386 9.27614 6.5 9 6.5V7.5ZM6.5 9C6.5 9.27614 6.72386 9.5 7 9.5C7.27614 9.5 7.5 9.27614 7.5 9H6.5ZM7.5 5C7.5 4.72386 7.27614 4.5 7 4.5C6.72386 4.5 6.5 4.72386 6.5 5H7.5ZM7 12.5C5.73895 12.5 4.83333 12.4993 4.13203 12.4233C3.44009 12.3484 3.00661 12.2049 2.66794 11.9589L2.08016 12.7679C2.61771 13.1585 3.24729 13.3333 4.02432 13.4175C4.79198 13.5007 5.76123 13.5 7 13.5V12.5ZM0.5 7C0.5 8.23877 0.499314 9.20802 0.582485 9.97568C0.666671 10.7527 0.841549 11.3823 1.2321 11.9198L2.04112 11.3321C1.79506 10.9934 1.65163 10.5599 1.57667 9.86797C1.50069 9.16667 1.5 8.26105 1.5 7H0.5ZM2.66794 11.9589C2.42741 11.7841 2.21588 11.5726 2.04112 11.3321L1.2321 11.9198C1.46854 12.2453 1.75473 12.5315 2.08016 12.7679L2.66794 11.9589ZM12.5 7C12.5 8.26105 12.4993 9.16667 12.4233 9.86797C12.3484 10.5599 12.2049 10.9934 11.9589 11.3321L12.7679 11.9198C13.1585 11.3823 13.3333 10.7527 13.4175 9.97568C13.5007 9.20802 13.5 8.23877 13.5 7H12.5ZM7 13.5C8.23877 13.5 9.20802 13.5007 9.97568 13.4175C10.7527 13.3333 11.3823 13.1585 11.9198 12.7679L11.3321 11.9589C10.9934 12.2049 10.5599 12.3484 9.86797 12.4233C9.16667 12.4993 8.26105 12.5 7 12.5V13.5ZM11.9589 11.3321C11.7841 11.5726 11.5726 11.7841 11.3321 11.9589L11.9198 12.7679C12.2453 12.5315 12.5315 12.2453 12.7679 11.9198L11.9589 11.3321ZM7 1.5C8.26105 1.5 9.16667 1.50069 9.86797 1.57667C10.5599 1.65163 10.9934 1.79506 11.3321 2.04112L11.9198 1.2321C11.3823 0.841549 10.7527 0.666671 9.97568 0.582485C9.20802 0.499314 8.23877 0.5 7 0.5V1.5ZM13.5 7C13.5 5.76123 13.5007 4.79198 13.4175 4.02432C13.3333 3.24729 13.1585 2.61771 12.7679 2.08016L11.9589 2.66794C12.2049 3.00661 12.3484 3.44009 12.4233 4.13203C12.4993 4.83333 12.5 5.73895 12.5 7H13.5ZM11.3321 2.04112C11.5726 2.21588 11.7841 2.42741 11.9589 2.66794L12.7679 2.08016C12.5315 1.75473 12.2453 1.46854 11.9198 1.2321L11.3321 2.04112ZM7 0.5C5.76123 0.5 4.79198 0.499314 4.02432 0.582485C3.24729 0.666671 2.61771 0.841549 2.08016 1.2321L2.66794 2.04112C3.00661 1.79506 3.44009 1.65163 4.13203 1.57667C4.83333 1.50069 5.73895 1.5 7 1.5V0.5ZM1.5 7C1.5 5.73895 1.50069 4.83333 1.57667 4.13203C1.65163 3.44009 1.79506 3.00661 2.04112 2.66794L1.2321 2.08016C0.841549 2.61771 0.666671 3.24729 0.582485 4.02432C0.499314 4.79198 0.5 5.76123 0.5 7H1.5ZM2.08016 1.2321C1.75473 1.46854 1.46854 1.75473 1.2321 2.08016L2.04112 2.66794C2.21588 2.42741 2.42741 2.21588 2.66794 2.04112L2.08016 1.2321ZM5 7.5H9V6.5H5V7.5ZM7.5 9V5H6.5V9H7.5Z"
                                                                        fill="#4C40F7"></path>
                                                                </svg>
                                                            </div>
                                                            <p class="fs-14 fw-500 lh-19 text-main-color">{{__("Delete")}}</p>
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <button
                                                            onclick="editCommonModal('{{route('admin.setting.languages.translate', $language->id)}}','{{'#translateLanguageModal'}}')"
                                                            class="border-0 bg-transparent p-0 d-flex align-items-center cg-8">
                                                            <div class="d-flex">
                                                                <svg width="14" height="14" viewBox="0 0 14 14"
                                                                     fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M2.37405 12.3634L2.66794 11.9589L2.37405 12.3634ZM1.63661 11.626L2.04112 11.3321L1.63661 11.626ZM12.3634 11.626L11.9589 11.3321L12.3634 11.626ZM11.626 12.3634L11.3321 11.9589L11.626 12.3634ZM11.626 1.63661L11.3321 2.04112L11.626 1.63661ZM12.3634 2.37405L11.9589 2.66794L12.3634 2.37405ZM2.37405 1.63661L2.66794 2.04112L2.37405 1.63661ZM1.63661 2.37405L2.04112 2.66794L1.63661 2.37405ZM5 6.5C4.72386 6.5 4.5 6.72386 4.5 7C4.5 7.27614 4.72386 7.5 5 7.5V6.5ZM9 7.5C9.27614 7.5 9.5 7.27614 9.5 7C9.5 6.72386 9.27614 6.5 9 6.5V7.5ZM6.5 9C6.5 9.27614 6.72386 9.5 7 9.5C7.27614 9.5 7.5 9.27614 7.5 9H6.5ZM7.5 5C7.5 4.72386 7.27614 4.5 7 4.5C6.72386 4.5 6.5 4.72386 6.5 5H7.5ZM7 12.5C5.73895 12.5 4.83333 12.4993 4.13203 12.4233C3.44009 12.3484 3.00661 12.2049 2.66794 11.9589L2.08016 12.7679C2.61771 13.1585 3.24729 13.3333 4.02432 13.4175C4.79198 13.5007 5.76123 13.5 7 13.5V12.5ZM0.5 7C0.5 8.23877 0.499314 9.20802 0.582485 9.97568C0.666671 10.7527 0.841549 11.3823 1.2321 11.9198L2.04112 11.3321C1.79506 10.9934 1.65163 10.5599 1.57667 9.86797C1.50069 9.16667 1.5 8.26105 1.5 7H0.5ZM2.66794 11.9589C2.42741 11.7841 2.21588 11.5726 2.04112 11.3321L1.2321 11.9198C1.46854 12.2453 1.75473 12.5315 2.08016 12.7679L2.66794 11.9589ZM12.5 7C12.5 8.26105 12.4993 9.16667 12.4233 9.86797C12.3484 10.5599 12.2049 10.9934 11.9589 11.3321L12.7679 11.9198C13.1585 11.3823 13.3333 10.7527 13.4175 9.97568C13.5007 9.20802 13.5 8.23877 13.5 7H12.5ZM7 13.5C8.23877 13.5 9.20802 13.5007 9.97568 13.4175C10.7527 13.3333 11.3823 13.1585 11.9198 12.7679L11.3321 11.9589C10.9934 12.2049 10.5599 12.3484 9.86797 12.4233C9.16667 12.4993 8.26105 12.5 7 12.5V13.5ZM11.9589 11.3321C11.7841 11.5726 11.5726 11.7841 11.3321 11.9589L11.9198 12.7679C12.2453 12.5315 12.5315 12.2453 12.7679 11.9198L11.9589 11.3321ZM7 1.5C8.26105 1.5 9.16667 1.50069 9.86797 1.57667C10.5599 1.65163 10.9934 1.79506 11.3321 2.04112L11.9198 1.2321C11.3823 0.841549 10.7527 0.666671 9.97568 0.582485C9.20802 0.499314 8.23877 0.5 7 0.5V1.5ZM13.5 7C13.5 5.76123 13.5007 4.79198 13.4175 4.02432C13.3333 3.24729 13.1585 2.61771 12.7679 2.08016L11.9589 2.66794C12.2049 3.00661 12.3484 3.44009 12.4233 4.13203C12.4993 4.83333 12.5 5.73895 12.5 7H13.5ZM11.3321 2.04112C11.5726 2.21588 11.7841 2.42741 11.9589 2.66794L12.7679 2.08016C12.5315 1.75473 12.2453 1.46854 11.9198 1.2321L11.3321 2.04112ZM7 0.5C5.76123 0.5 4.79198 0.499314 4.02432 0.582485C3.24729 0.666671 2.61771 0.841549 2.08016 1.2321L2.66794 2.04112C3.00661 1.79506 3.44009 1.65163 4.13203 1.57667C4.83333 1.50069 5.73895 1.5 7 1.5V0.5ZM1.5 7C1.5 5.73895 1.50069 4.83333 1.57667 4.13203C1.65163 3.44009 1.79506 3.00661 2.04112 2.66794L1.2321 2.08016C0.841549 2.61771 0.666671 3.24729 0.582485 4.02432C0.499314 4.79198 0.5 5.76123 0.5 7H1.5ZM2.08016 1.2321C1.75473 1.46854 1.46854 1.75473 1.2321 2.08016L2.04112 2.66794C2.21588 2.42741 2.42741 2.21588 2.66794 2.04112L2.08016 1.2321ZM5 7.5H9V6.5H5V7.5ZM7.5 9V5H6.5V9H7.5Z"
                                                                        fill="#4C40F7"></path>
                                                                </svg>
                                                            </div>
                                                            <p class="fs-14 fw-500 lh-19 text-main-color">{{__("Translate")}}</p>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p>{{__("No Data Found!")}}</p>
                                @endif
                            </div>
                        </div>
                        <!-- Currency Settings -->
                        <div class="tab-pane fade" id="currencySettings-tab-pane" role="tabpanel"
                             aria-labelledby="languageSettings-taLanguageb" tabindex="0">
                            <h4 class="fs-18 fw-700 lh-24 text-main-color pb-19 mb-19 bd-b-one bd-c-stroke">{{__("Currency Settings")}}
                                <button type="submit"
                                        class="border-0 bd-ra-12 float-end py-13 px-25 bg-primary-color fs-16 fw-600 lh-19 text-white"
                                        data-bs-toggle="modal" data-bs-target="#addCurrencyModal">
                                    + {{__("Add Currency")}}</button>
                            </h4>

                            <div class="row rg-20">
                                <div class="table-wrap-one">
                                    <table class="table zTable zTable-last-item-right" id="currencyListTable">
                                        <thead>
                                        <tr>
                                            <th>
                                                <div>{{ __("Currency Code") }}</div>
                                            </th>
                                            <th>
                                                <div>{{ __("Symbol") }}</div>
                                            </th>
                                            <th>
                                                <div>{{ __("Placement") }}</div>
                                            </th>
                                            <th>
                                                <div class="text-center">{{ __("Action") }}</div>
                                            </th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Payment Settings -->
                        <div class="tab-pane fade" id="paymentSettings-tab-pane" role="tabpanel"
                             aria-labelledby="languageSettings-taLanguageb" tabindex="0">
                            <h4 class="fs-18 fw-700 lh-24 text-main-color pb-19 mb-19 bd-b-one bd-c-stroke">{{__("Payment Settings")}}</h4>

                            <div class="d-flex flex-wrap rg-16 cg-19">
                                @if(!empty($paymentGatewayList))
                                    @foreach($paymentGatewayList as $item)
                                        <div class="payment-item">
                                            <div class="img"><img
                                                    src="{{$item->payment_gateways?getFileLink($item->payment_gateways) : asset($item->image)}}"
                                                    alt=""></div>
                                            {{--                                            <button onclick="editCommonModal('{{route('admin.setting.gateway.edit', $item->id)}}','{{'#editPaymentGatewayModal'}}')" class="link">{{__("Update")}}</button>--}}
                                            <button
                                                onclick="editCommonModal('{{route('admin.setting.gateway.edit', $item->id)}}','{{'#editPaymentGatewayModal'}}')"
                                                class="fs-14 fw-500 lh-17   btn btn-outline-success">{{__("Configure")}}</button>
                                        </div>
                                    @endforeach
                                @else
                                    <p>{{__("No Data Found!")}}</p>
                                @endif
                            </div>
                        </div>

                        <!-- Time Schedule Settings -->
                        <div class="tab-pane fade" id="timeScheduleSettings-tab-pane" role="tabpanel"
                             aria-labelledby="languageSettings-taLanguageb" tabindex="0">
                            <div class="w-100">
                                <h4 class="fs-18 fw-700 lh-24 text-main-color pb-19 mb-19 bd-b-one bd-c-stroke">{{__("Time Schedule Settings")}}</h4>
                                <button type="submit"
                                        class="addMore border-0 bd-ra-12 float-end py-13 px-25 bg-primary-color fs-16 fw-600 lh-19 text-white">
                                    + {{__("Add")}}</button>
                            </div>
                            <form class="ajax-request reset" action="{{route('admin.setting.time-schedule.store')}}"
                                  method="POST"
                                  data-handler="responseWithPageLoad">
                                @csrf
                                @forelse ($timeSchedule as $time)
                                    <div class="row w-100 removeSingleRow">
                                        <div class="col-md-5">
                                            <div class="zForm-wrap pb-20">
                                                <label for="noticeTitle"
                                                       class="sf-form-label">{{__('Start Time')}}</label>
                                                <input value="{{$time->start_time}}" type="time" name="start_time[]"
                                                       class="form-control sf-form-control"/>
                                            </div>
                                            <div class="start_time"></div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="zForm-wrap pb-20">
                                                <label for="noticeTitle"
                                                       class="sf-form-label">{{__('End Time')}}</label>
                                                <input value="{{$time->end_time}}" type="time" name="end_time[]"
                                                       class="form-control sf-form-control"/>
                                            </div>
                                            <div class="end_time"></div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="pt-5">
                                                <button
                                                    class="border-0 bd-ra-12 py-13 px-20 mt-30 bg-cancel fs-16 fw-600 lh-19 text-danger removeSlot">
                                                    <i class="fa-solid fa-trash"></i>
                                                    </a>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="row w-100 removeSingleRow">
                                        <div class="col-md-6">
                                            <div class="zForm-wrap pb-20">
                                                <label for="noticeTitle"
                                                       class="sf-form-label">{{__('Start Time')}}</label>
                                                <input type="time" name="start_time[]"
                                                       class="form-control sf-form-control"/>
                                            </div>
                                            <div class="start_time"></div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="zForm-wrap pb-20">
                                                <label for="noticeTitle"
                                                       class="sf-form-label">{{__('End Time')}}</label>
                                                <input type="time" name="end_time[]"
                                                       class="form-control sf-form-control"/>
                                            </div>
                                            <div class="end_time"></div>
                                        </div>
                                    </div>
                                @endforelse

                                <div class="w-100" id="addMoreSlottDiv">

                                </div>
                                <div class="">
                                    <button type="submit"
                                            class="border-0 bd-ra-12 py-13 px-20 mt-30 bg-cancel fs-16 fw-600 lh-19 text-dark removeSlot">
                                        {{__('Save Now')}}
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Configure Modal -->
    <div class="modal fade" id="configureModal" tabindex="-1" aria-labelledby="configureModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bd-c-stroke-color bd-ra-12 py-25 px-20">

            </div>
        </div>
    </div>

    <!--Mail Test Modal -->
    <div class="modal fade" id="configureMailTestModal" tabindex="-1" aria-labelledby="configureMailTestModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bd-c-stroke-color bd-ra-12 py-25 px-20">
                <div class="">
                    <!--  -->
                    <h4 class="fs-18 fw-700 lh-24 text-textBlack pb-27">{{__("Send A Mail")}}</h4>
                    <form class="ajax-request" action="{{ route('admin.setting.configuration.test.email') }}"
                          method="POST" data-handler="commonResponse">
                        @csrf
                        <div class="zForm-wrap pb-20">
                            <input type="hidden" name="config_type" value="email_test">
                            <label for="emailAddress" class="sf-form-label">{{__("Email Address")}}</label>
                            <input type="email" class="form-control sf-form-control" id="emailAddress"
                                   placeholder="{{__("Email Address")}}" name="email_address"/>
                        </div>
                        <div class="zForm-wrap pb-20">
                            <input type="hidden" name="config_type" value="email_test">
                            <label for="eInputEmailSubject" class="sf-form-label">{{__("Email Subject")}}</label>
                            <input type="text" class="form-control sf-form-control" id="eInputEmailSubject"
                                   placeholder="{{__("Email Subject")}}" name="email_subject"/>
                        </div>
                        <div class="zForm-wrap pb-20">
                            <label for="eInputBody" class="sf-form-label">{{__("Body")}}</label>
                            <textarea type="text" class="form-control sf-form-control summernoteOne" id="eInputBody"
                                      placeholder="{{__("Write Something")}}" name="email_body"></textarea>
                        </div>
                        <div class="d-flex align-items-center cg-10">
                            <button type="submit"
                                    class="py-13 px-20 bd-one bd-ra-4 bd-c-primary-color bg-primary-color text-white fs-14 fw-600 lh-14">{{__("Send")}}</button>
                            <button type="button"
                                    class="py-13 px-20 bd-one bd-ra-4 bd-c-main-color bg-white text-main-color fs-14 fw-600 lh-14"
                                    data-bs-dismiss="modal">{{__("Cancel Now")}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--Add Language -->
    <div class="modal fade" id="addLanguageModal" tabindex="-1" aria-labelledby="addLanguageModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content bd-c-stroke-color bd-ra-12 py-25 px-20">
                <div class="">
                    <!--  -->
                    <h4 class="fs-18 fw-700 lh-24 text-textBlack pb-27">{{__("Add New Language")}}</h4>
                    <form class="ajax-request" action="{{ route('admin.setting.languages.store') }}"
                          method="POST" data-handler="commonResponse">
                        @csrf
                        <div class="zForm-wrap pb-20">
                            <label for="languageName" class="sf-form-label">{{__("Language Name")}}</label>
                            <input type="text" class="form-control sf-form-control" id="languageName"
                                   placeholder="{{__("Language Name")}}" name="language_name"/>
                        </div>
                        <div class="zForm-wrap pb-20">
                            <label for="isoCode"
                                   class="sf-form-label">{{__("Language ISO Code")}}</label>
                            <select class="sf-select-without-search" name="iso_code" id="isoCode">
                                @foreach (languageIsoCode() as $code => $isoCountryName)
                                    <option value="{{ $code }}">
                                        {{ $isoCountryName . '(' . $code . ')' }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="zForm-wrap pb-20">
                            <label for="applicableFont" class="sf-form-label">{{__("Applicable Font")}}</label>
                            <input type="file" class="form-control sf-form-control" id="applicableFont"
                                   placeholder="{{__("Applicable Font")}}" name="applicable_font"/>
                        </div>
                        <div class="zForm-wrap pb-20">
                            <label for="rtlEnable" class="sf-form-label">{{__("RTL Enable")}}</label>
                            <select class="sf-select-without-search" name="rtl_enable" id="rtlEnable">
                                <option value="{{LANGUAGE_RTL_OFF}}">{{__("No")}}</option>
                                <option value="{{LANGUAGE_RTL_ON}}">{{__("Yes")}}</option>
                            </select>
                        </div>
                        <div class="zForm-wrap pb-20 zImage-upload-details">
                            <div class="zImage-inside">
                                <div class="d-flex pb-12"><img
                                        src="{{asset('assets/images/icon/cloud-upload.svg')}}" alt="">
                                </div>
                                <p class="fs-15 fw-500 lh-16 text-1b1c17">{{__("Drag")}}
                                    &amp; {{__("drop files here")}}</p>
                            </div>
                            <label for="zImageUpload" class="sf-form-label">{{__("Flag Image")}}</label>
                            <div class="upload-img-box">
                                <img src="">
                                <input type="file" name="flag_image" id="zImageUpload2" accept="image/*"
                                       onchange="previewFile(this)">
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="zForm-wrap pb-20">
                                <div class="zCheck form-check form-switch">
                                    <label for="defaultLanguage"
                                           class="sf-form-label px-14 my-20">{{__(" Make As Default Language")}}</label>
                                    <input class="form-check-input my-17" type="checkbox"
                                           role="switch" id="defaultLanguage" name="default_language" value="0"
                                    />
                                </div>
                            </div>
                        </div>


                        <div class="d-flex align-items-center cg-10">
                            <button type="submit"
                                    class="py-13 px-20 bd-one bd-ra-4 bd-c-primary-color bg-primary-color text-white fs-14 fw-600 lh-14">{{__("Save Now")}}</button>
                            <button type="button"
                                    class="py-13 px-20 bd-one bd-ra-4 bd-c-main-color bg-white text-main-color fs-14 fw-600 lh-14"
                                    data-bs-dismiss="modal">{{__("Cancel Now")}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--Edit Language -->
    <div class="modal fade" id="editLanguageModal" tabindex="-1" aria-labelledby="editLanguageModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bd-c-stroke-color bd-ra-12 py-25 px-20">

            </div>
        </div>
    </div>

    <!--Translate Language -->
    <div class="modal fade" id="translateLanguageModal" tabindex="-1" aria-labelledby="translateLanguageModalModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bd-c-stroke-color bd-ra-12 py-25 px-20">

            </div>
        </div>
    </div>

    <!--Add Currency -->
    <div class="modal fade" id="addCurrencyModal" tabindex="-1" aria-labelledby="addCurrencyModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content bd-c-stroke-color bd-ra-12 py-25 px-20">
                <div class="">
                    <!--  -->
                    <h4 class="fs-18 fw-700 lh-24 text-textBlack pb-27">{{__("Add New Currency")}}</h4>
                    <form class="ajax-request" action="{{ route('admin.setting.currency.store') }}"
                          method="POST" data-handler="commonResponse">
                        @csrf
                        <div class="zForm-wrap pb-20">
                            <label for="currencyCode"
                                   class="sf-form-label">{{__("Currency ISO Code")}}</label>
                            <select class="sf-select-without-search" name="currency_code" id="currencyCode">
                                <option value="">{{ __('Select') }}</option>
                                @foreach(getCurrency() as $code => $currencyItem)
                                    <option value="{{$code}}">{{$currencyItem}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="zForm-wrap pb-20">
                            <label for="CurrencySymbol" class="sf-form-label pt-24">{{__("Currency Symbol")}}</label>
                            <input type="text" class="form-control sf-form-control" id="CurrencySymbol"
                                   placeholder="{{__("Symbol")}}" name="currency_symbol"/>
                        </div>
                        <div class="zForm-wrap pb-20">
                            <label for="currencyPlacement" class="sf-form-label">{{__("Currency Placement")}}</label>
                            <select class="sf-select-without-search" name="currency_placement" id="currencyPlacement">
                                <option value="">{{ __('Select') }}</option>
                                <option value="{{CURRENCY_PLACEMENT_BEFORE}}">{{ __('Before Amount') }}</option>
                                <option value="{{CURRENCY_PLACEMENT_AFTER}}">{{ __('After Amount') }}</option>
                            </select>
                        </div>

                        <div class="col-md-12 pt-10">
                            <div class="zForm-wrap pb-20">
                                <div class="zCheck form-check form-switch">
                                    <label for="defaultCurrency"
                                           class="sf-form-label px-14 mt-20">{{__(" Default Currency")}}</label>
                                    <input class="form-check-input mt-17" type="checkbox"
                                           role="switch" id="defaultCurrency" name="default_currency"
                                    />
                                </div>
                            </div>
                        </div>


                        <div class="d-flex align-items-center cg-10">
                            <button type="submit"
                                    class="py-13 px-20 bd-one bd-ra-4 bd-c-primary-color bg-primary-color text-white fs-14 fw-600 lh-14">{{__("Save Now")}}</button>
                            <button type="button"
                                    class="py-13 px-20 bd-one bd-ra-4 bd-c-main-color bg-white text-main-color fs-14 fw-600 lh-14"
                                    data-bs-dismiss="modal">{{__("Cancel Now")}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--Edit Currency -->
    <div class="modal fade" id="editCurrencyModal" tabindex="-1" aria-labelledby="editCurrencyModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content bd-c-stroke-color bd-ra-12 py-25 px-20">

            </div>
        </div>
    </div>

    <!--Edit Payment Gateway -->
    <div class="modal fade" id="editPaymentGatewayModal" tabindex="-1" aria-labelledby="editPaymentGatewayModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bd-c-stroke-color bd-ra-12 py-25 px-20">

            </div>
        </div>
    </div>

    <input type="hidden" value="{{route('login')}}" id="login-route">
    <input type="hidden" value="{{route('admin.setting.currency.index')}}" id="currencyListRoute">
    <input type="hidden" id="getCurrencySymbol" value="{{ getCurrencySymbol() }}">
    <input type="hidden" id="allCurrency" value="{{ json_encode(getCurrency()) }}">
@endsection

@push('script')
    <script src="{{asset('assets/custom/admin/js/profile.js')}}"></script>
    <script src="{{ asset('assets/custom/admin/js/setting.js') }}"></script>
    <script src="{{ asset('assets/custom/admin/js/language.js') }}"></script>
    <script src="{{ asset('assets/custom/admin/js/currency.js') }}"></script>
    <script src="{{ asset('assets/custom/admin/js/gateway.js') }}"></script>
@endpush

