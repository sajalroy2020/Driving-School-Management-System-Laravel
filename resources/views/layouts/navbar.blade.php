<div data-aos="fade-down" data-aos-duration="1000" class="main-header">
    <!-- Left -->
    <div class="d-flex align-items-center cg-20">
        <!-- Mobile Menu Button -->
        <div class="mobileMenu">
            <button
                class="bd-one bd-c-title-color rounded-circle w-30 h-30 d-flex justify-content-center align-items-center text-title-color p-0 bg-transparent">
                <i class="fa-solid fa-bars"></i></button>
        </div>
        <!--  -->
        <h4 class="fs-18 fw-600 lh-18 text-main-color">{{@$pageTitle}}</h4>

    </div>
    <!-- Right -->
    <div class="right d-flex justify-content-end align-items-center cg-12">
        <!-- Language - Message - Notify -->
        <div class="d-flex align-items-center cg-12">
            <!-- Language switcher -->
            @if (!empty(getSetting('language_switcher_status')) && getSetting('language_switcher_status') == STATUS_ACTIVE)
                <div class="dropdown lanDropdown">
                    <button class="dropdown-toggle p-0 border-0 bg-transparent d-flex align-items-center cg-8"
                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ getFileLink(selectedLanguage()?->flag_image) }}" alt=""/>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end dropdownItem-one">
                        @foreach (appLanguages() as $app_lang)
                            <li>
                                <a class="d-flex align-items-center cg-8"
                                   href="{{ url('/admin/local/' . $app_lang->iso_code) }}">
                                    <div class="d-flex">
                                        <img src="{{ getFileLink($app_lang->flag_image) }}" alt="" class="max-w-26"/>
                                    </div>
                                    <p class="fs-14 fw-500 lh-16 text-707070">{{ $app_lang->language }}</p>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
        @endif
        <!-- Notify - Message -->
            <div class="d-flex align-items-center cg-12">
                <!-- Notify -->
                <div class="dropdown notifyDropdown">
                    <button
                        class="p-0 w-41 h-41 bd-one bd-c-stroke rounded-circle bg-white-200 d-flex justify-content-center align-items-center dropdown-toggle"
                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{asset('assets')}}/images/icon/bell.svg" alt=""/>
                        <span class="notify_no">{{count(getNotification(NOTIFICATION_STATUS_UNSEEN))}}</span>
                    </button>
                    <div class="dropdown-menu">
                        <div class="d-flex justify-content-between align-items-center bd-b-one bd-c-stroke pb-8 mb-8">
                            <h4 class="fs-15 fw-600 lh-32 text-main-color">
                                @if (count(getNotification()) > 0)
                                    {{ __('Today') }}
                                @else
                                    {{ __('Notification Not Found!') }}
                                @endif
                            </h4>
                            @if (count(getNotification(NOTIFICATION_STATUS_UNSEEN)) > 0)
                                <a href="{{ route('admin.notification.notification-mark-all-as-read') }}"
                                   class="fs-12 fw-600 lh-20 text-main-color text-decoration-underline border-0 p-0 bg-transparent hover-color-main-color">
                                    {{__("Mark all as read")}}
                                </a>
                            @endif
                        </div>
                        <ul class="notify-list">
                            @foreach (getNotification() as $key => $item)
                                <li class="d-flex align-items-start cg-15">
                                    <div
                                        class="flex-grow-0 flex-shrink-0 w-32 h-32 rounded-circle d-flex justify-content-center align-items-center bg-main-color">
                                        <img src="{{asset('assets/images/icon/bell-white.svg')}}" alt=""/></div>
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between align-items-center pb-8">
                                            @if($item->seen_id == null)
                                                <p class="fs-13 fw-500 lh-20 text-main-color fw-700">{{$item->title}}</p>
                                            @else
                                                <p class="fs-13 fw-500 lh-20 text-main-color">{{$item->title}}</p>
                                            @endif
                                            <p class="fs-10 fw-400 lh-20 text-para-text">{{ $item->created_at?->diffForHumans() }}</p>
                                        </div>
                                        @if($item->seen_id == null)
                                            <p class="fs-12 fw-400 lh-17 text-para-text max-w-220 fw-700">{!! substr($item->details, 0,  60) !!}
                                                <a href="{{route('admin.notification.view',$item->id)}}" class="text-main-color text-decoration-underline hover-color-main-color">{{__("See More")}}</a></p>
                                        @else
                                            <p class="fs-12 fw-400 lh-17 text-para-text max-w-220">{!! substr($item->details, 0,  60) !!}
                                                <a href="{{route('admin.notification.view',$item->id)}}" class="text-main-color text-decoration-underline hover-color-main-color">{{__("See More")}}</a></p>
                                        @endif
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <!-- User -->
        <div class="dropdown headerUserDropdown">
            <button class="dropdown-toggle p-0 border-0 bg-transparent d-flex align-items-center cg-8" type="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                <div class="user-content">
                    <div class="wrap">
                        <div class="img">
                            <img src="{{getFileLink(auth()->user()->picture)}}" alt="" class="rounded-circle"/>
                        </div>
                    </div>
                    <h4 class="text-start d-none d-md-block fs-13 fw-600 lh-16 text-title-color">{{auth()->user()->name}}</h4>
                </div>
            </button>
            <ul class="dropdown-menu dropdownItem-one">
                <li>
                    @if (auth()->user()->role == USER_ROLE_INSTRUCTOR)
                        <a class="d-flex align-items-center cg-12" href="{{route('instructor.profile.index')}}">
                            <div class="d-flex">
                                <svg width="14" height="19" viewBox="0 0 14 19" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.63336 5.00033C9.63336 6.45468 8.45437 7.63366 7.00002 7.63366V9.03366C9.22757 9.03366 11.0334 7.22787 11.0334 5.00033H9.63336ZM7.00002 7.63366C5.54567 7.63366 4.36669 6.45468 4.36669 5.00033H2.96669C2.96669 7.22787 4.77247 9.03366 7.00002 9.03366V7.63366ZM4.36669 5.00033C4.36669 3.54598 5.54567 2.36699 7.00002 2.36699V0.966992C4.77247 0.966992 2.96669 2.77278 2.96669 5.00033H4.36669ZM7.00002 2.36699C8.45437 2.36699 9.63336 3.54598 9.63336 5.00033H11.0334C11.0334 2.77278 9.22757 0.966992 7.00002 0.966992V2.36699ZM4.50002 11.5337H9.50002V10.1337H4.50002V11.5337ZM9.50002 16.8003H4.50002V18.2003H9.50002V16.8003ZM4.50002 16.8003C3.04567 16.8003 1.86669 15.6213 1.86669 14.167H0.466687C0.466687 16.3945 2.27247 18.2003 4.50002 18.2003V16.8003ZM12.1334 14.167C12.1334 15.6213 10.9544 16.8003 9.50002 16.8003V18.2003C11.7276 18.2003 13.5334 16.3945 13.5334 14.167H12.1334ZM9.50002 11.5337C10.9544 11.5337 12.1334 12.7126 12.1334 14.167H13.5334C13.5334 11.9394 11.7276 10.1337 9.50002 10.1337V11.5337ZM4.50002 10.1337C2.27247 10.1337 0.466687 11.9394 0.466687 14.167H1.86669C1.86669 12.7126 3.04567 11.5337 4.50002 11.5337V10.1337Z"
                                        fill="#7881A4"></path>
                                </svg>
                            </div>
                            <p class="fs-14 fw-500 lh-17 text-para-text">{{__("Profile")}}</p>
                        </a>
                    @elseif (auth()->user()->role == USER_ROLE_STUDENT)
                        <a class="d-flex align-items-center cg-12" href="{{route('student.profile.index')}}">
                            <div class="d-flex">
                                <svg width="14" height="19" viewBox="0 0 14 19" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.63336 5.00033C9.63336 6.45468 8.45437 7.63366 7.00002 7.63366V9.03366C9.22757 9.03366 11.0334 7.22787 11.0334 5.00033H9.63336ZM7.00002 7.63366C5.54567 7.63366 4.36669 6.45468 4.36669 5.00033H2.96669C2.96669 7.22787 4.77247 9.03366 7.00002 9.03366V7.63366ZM4.36669 5.00033C4.36669 3.54598 5.54567 2.36699 7.00002 2.36699V0.966992C4.77247 0.966992 2.96669 2.77278 2.96669 5.00033H4.36669ZM7.00002 2.36699C8.45437 2.36699 9.63336 3.54598 9.63336 5.00033H11.0334C11.0334 2.77278 9.22757 0.966992 7.00002 0.966992V2.36699ZM4.50002 11.5337H9.50002V10.1337H4.50002V11.5337ZM9.50002 16.8003H4.50002V18.2003H9.50002V16.8003ZM4.50002 16.8003C3.04567 16.8003 1.86669 15.6213 1.86669 14.167H0.466687C0.466687 16.3945 2.27247 18.2003 4.50002 18.2003V16.8003ZM12.1334 14.167C12.1334 15.6213 10.9544 16.8003 9.50002 16.8003V18.2003C11.7276 18.2003 13.5334 16.3945 13.5334 14.167H12.1334ZM9.50002 11.5337C10.9544 11.5337 12.1334 12.7126 12.1334 14.167H13.5334C13.5334 11.9394 11.7276 10.1337 9.50002 10.1337V11.5337ZM4.50002 10.1337C2.27247 10.1337 0.466687 11.9394 0.466687 14.167H1.86669C1.86669 12.7126 3.04567 11.5337 4.50002 11.5337V10.1337Z"
                                        fill="#7881A4"></path>
                                </svg>
                            </div>
                            <p class="fs-14 fw-500 lh-17 text-para-text">{{__("Profile")}}</p>
                        </a>
                    @else
                        <a class="d-flex align-items-center cg-12" href="{{route('admin.setting.index')}}">
                            <div class="d-flex">
                                <svg width="14" height="19" viewBox="0 0 14 19" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.63336 5.00033C9.63336 6.45468 8.45437 7.63366 7.00002 7.63366V9.03366C9.22757 9.03366 11.0334 7.22787 11.0334 5.00033H9.63336ZM7.00002 7.63366C5.54567 7.63366 4.36669 6.45468 4.36669 5.00033H2.96669C2.96669 7.22787 4.77247 9.03366 7.00002 9.03366V7.63366ZM4.36669 5.00033C4.36669 3.54598 5.54567 2.36699 7.00002 2.36699V0.966992C4.77247 0.966992 2.96669 2.77278 2.96669 5.00033H4.36669ZM7.00002 2.36699C8.45437 2.36699 9.63336 3.54598 9.63336 5.00033H11.0334C11.0334 2.77278 9.22757 0.966992 7.00002 0.966992V2.36699ZM4.50002 11.5337H9.50002V10.1337H4.50002V11.5337ZM9.50002 16.8003H4.50002V18.2003H9.50002V16.8003ZM4.50002 16.8003C3.04567 16.8003 1.86669 15.6213 1.86669 14.167H0.466687C0.466687 16.3945 2.27247 18.2003 4.50002 18.2003V16.8003ZM12.1334 14.167C12.1334 15.6213 10.9544 16.8003 9.50002 16.8003V18.2003C11.7276 18.2003 13.5334 16.3945 13.5334 14.167H12.1334ZM9.50002 11.5337C10.9544 11.5337 12.1334 12.7126 12.1334 14.167H13.5334C13.5334 11.9394 11.7276 10.1337 9.50002 10.1337V11.5337ZM4.50002 10.1337C2.27247 10.1337 0.466687 11.9394 0.466687 14.167H1.86669C1.86669 12.7126 3.04567 11.5337 4.50002 11.5337V10.1337Z"
                                        fill="#7881A4"></path>
                                </svg>
                            </div>
                            <p class="fs-14 fw-500 lh-17 text-para-text">{{__("Profile")}}</p>
                        </a>
                    @endif
                </li>
                <li>
                    <a class="headerUserLogout d-flex align-items-center cg-8" href="{{ route('logout') }}"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <div class="d-flex max-w-18">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25"
                                 fill="none">
                                <path
                                    d="M12.5003 20.8333C10.2902 20.8333 8.17057 19.9553 6.60777 18.3925C5.04497 16.8297 4.16699 14.7101 4.16699 12.5C4.16699 10.2899 5.04497 8.17024 6.60777 6.60743C8.17057 5.04463 10.2902 4.16666 12.5003 4.16666"
                                    stroke="#7881A4" stroke-opacity="0.7" stroke-width="1.5" stroke-linecap="round"/>
                                <path d="M10.417 12.5H20.8337M20.8337 12.5L17.7087 9.375M20.8337 12.5L17.7087 15.625"
                                      stroke="#7881A4" stroke-opacity="0.7" stroke-width="1.5" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <p class="fs-14 fw-500 lh-17 text-para-text">{{__("Logout")}}</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
