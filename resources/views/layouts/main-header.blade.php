<main class="main-content">
    <div class="position-relative iq-banner">
        <!--Nav Start-->
        <nav class="nav navbar navbar-expand-lg navbar-light iq-navbar">
            <div class="container-fluid navbar-inner">
                <a href="#" class="navbar-brand">
                    <!--Logo start-->
                    <svg width="30" class="text-primary" viewBox="0 0 30 30" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2"
                            transform="rotate(-45 -0.757324 19.2427)" fill="currentColor" />
                        <rect x="7.72803" y="27.728" width="28" height="4" rx="2"
                            transform="rotate(-45 7.72803 27.728)" fill="currentColor" />
                        <rect x="10.5366" y="16.3945" width="16" height="4" rx="2"
                            transform="rotate(45 10.5366 16.3945)" fill="currentColor" />
                        <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2"
                            transform="rotate(45 10.5562 -0.556152)" fill="currentColor" />
                    </svg>
                    <!--logo End-->
                    <h4 class="logo-title">Sakeny</h4>
                </a>
                <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
                    <i class="icon">
                        <svg width="20px" height="20px" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" />
                        </svg>
                    </i>
                </div>
                {{-- <div class="input-group search-input">
                    <span class="input-group-text" id="search-input">
                        <svg width="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="11.7669" cy="11.7666" r="8.98856" stroke="currentColor"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></circle>
                            <path d="M18.0186 18.4851L21.5426 22" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </span>
                    {{-- <input type="search" class="form-control" placeholder="Search..."> 
                </div> --}}
                {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <span class="mt-2 navbar-toggler-bar bar1"></span>
                        <span class="navbar-toggler-bar bar2"></span>
                        <span class="navbar-toggler-bar bar3"></span>
                    </span>
                </button> --}}
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="mb-2 navbar-nav ms-auto align-items-center navbar-list mb-lg-0">

                        <li class="nav-item dropdown ">
                            <a href="#" class="nav-link " id="notification-drop" data-bs-toggle="dropdown">
                                <svg width="30" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19.7695 11.6453C19.039 10.7923 18.7071 10.0531 18.7071 8.79716V8.37013C18.7071 6.73354 18.3304 5.67907 17.5115 4.62459C16.2493 2.98699 14.1244 2 12.0442 2H11.9558C9.91935 2 7.86106 2.94167 6.577 4.5128C5.71333 5.58842 5.29293 6.68822 5.29293 8.37013V8.79716C5.29293 10.0531 4.98284 10.7923 4.23049 11.6453C3.67691 12.2738 3.5 13.0815 3.5 13.9557C3.5 14.8309 3.78723 15.6598 4.36367 16.3336C5.11602 17.1413 6.17846 17.6569 7.26375 17.7466C8.83505 17.9258 10.4063 17.9933 12.0005 17.9933C13.5937 17.9933 15.165 17.8805 16.7372 17.7466C17.8215 17.6569 18.884 17.1413 19.6363 16.3336C20.2118 15.6598 20.5 14.8309 20.5 13.9557C20.5 13.0815 20.3231 12.2738 19.7695 11.6453Z"
                                        fill="currentColor"></path>
                                    <path opacity="0.4"
                                        d="M14.0088 19.2283C13.5088 19.1215 10.4627 19.1215 9.96275 19.2283C9.53539 19.327 9.07324 19.5566 9.07324 20.0602C9.09809 20.5406 9.37935 20.9646 9.76895 21.2335L9.76795 21.2345C10.2718 21.6273 10.8632 21.877 11.4824 21.9667C11.8123 22.012 12.1482 22.01 12.4901 21.9667C13.1083 21.877 13.6997 21.6273 14.2036 21.2345L14.2026 21.2335C14.5922 20.9646 14.8734 20.5406 14.8983 20.0602C14.8983 19.5566 14.4361 19.327 14.0088 19.2283Z"
                                        fill="currentColor"></path>
                                </svg>
                                <span class="bg-danger dots">{{ Auth::User()->unreadNotifications->count() }}</span>
                            </a>
                            <div class="p-0 sub-drop dropdown-menu dropdown-menu-end "
                                aria-labelledby="notification-drop" style="background:#BD5D14 !important;">
                                <div class="m-0 shadow-none card">
                                    <div class="py-3 card-header d-flex justify-content-between bg-primary" style="background:#BD5D14 !important;" >
                                        <div class="header-title" style="background:#BD5D14 !important;">
                                            <h5 class="mb-0 text-white">الأشعارات </h5>
                                            @can('مشكلات المدير')
                                            <a
                                                class="mb-0 text-white"href="{{ route('branch_problem.edit', 'markAll') }}">قراءة
                                                الكل
                                            </a>
                                        @endcan
                                            @can('مشكلات الأدمن')
                                                <a
                                                    class="mb-0 text-white"href="{{ route('AdminProblems.edit', 'markAll') }}">قراءة
                                                    الكل
                                                </a>
                                            @endcan

                                        </div>
                                    </div>
                                    @foreach (Auth::User()->unreadNotifications as $notification)
                                    @if (isset($notification->data['type']) && $notification->data['type'] == 'message')

                                    <div class="p-0 card-body">

                                        <a href="{{ route('chat.show', $notification->data['message_id']) }}"
                                            class="iq-sub-card">

                                                <div class="d-flex align-items-center">
                                                    <img class="p-1 avatar-40 rounded-pill bg-soft-primary"
                                                        src="../profiles/{{ $image = \App\Models\User::where('id', $notification->data['sender_id'])->first()->image_path }}"
                                                        alt="">
                                                    <div class="ms-3 w-100">
                                                            <h6 class="mb-0 ">
                                                                قام
                                                                {{ \App\Models\User::where('id', $notification->data['sender_id'])->first()->name }}
                                                                بارسال رسالة جديدة
                                                            </h6>

                                                        <div
                                                            class="d-flex justify-content-between align-items-center">
                                                            {{-- <p class="mb-0">{{ $notification->data['content'] }}</p><br> --}}
                                                            <small class="float-end font-size-12">بتاريخ
                                                                {{ $notification->created_at }}</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                    </div>
                                    @elseif (isset($notification->data['problem_id']))

                                        <div class="p-0 card-body">
                                            @can('مشكلات المدير')
                                            <a href="{{ route('asRead', $notification->data['problem_id']) }}"
                                                class="iq-sub-card">
                                         @endcan
                                            @can('مشكلات الأدمن')
                                                <a href="{{ route('AdminProblems.show', $notification->data['problem_id']) }}"
                                                    class="iq-sub-card">
                                            @endcan

                                                    <div class="d-flex align-items-center">
                                                        <img class="p-1 avatar-40 rounded-pill bg-soft-primary"
                                                            src="{{ asset('assets/images/user icon 3.png') }}"
                                                            alt="">
                                                        <div class="ms-3 w-100">
                                                            @can('مشكلات المدير')
                                                                <h6 class="mb-0 ">
                                                                    قام
                                                                    {{ \App\Models\User::where('id', $notification->data['user_id'])->first()->name }}
                                                                    بارسال مشكلة جديدة
                                                                </h6>
                                                            @endcan
                                                            @can('مشكلات الأدمن')
                                                                <h6 class="mb-0 ">
                                                                    قام
                                                                    {{ $notification->data['user_name'] }}
                                                                    بارسال مشكلة جديدة
                                                                </h6>
                                                            @endcan

                                                            <div>
                                                                {{ $notification->data['content'] }}
                                                            </div>
                                                            <div
                                                                class="d-flex justify-content-between align-items-center">
                                                                {{-- <p class="mb-0">{{ $notification->data['content'] }}</p><br> --}}
                                                                <small class="float-end font-size-12">بتاريخ
                                                                    {{ $notification->created_at }}</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="py-0 nav-link d-flex align-items-center" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('../assets/images/avatars/01.png') }}" alt="User-Profile"
                                    class="theme-color-default-img img-fluid avatar avatar-50 avatar-rounded">
                                <img src="{{ asset('../assets/images/avatars/avtar_1.png') }}" alt="User-Profile"
                                    class="theme-color-purple-img img-fluid avatar avatar-50 avatar-rounded">
                                <img src="{{ asset('../assets/images/avatars/avtar_2.png') }}" alt="User-Profile"
                                    class="theme-color-blue-img img-fluid avatar avatar-50 avatar-rounded">
                                <img src="{{ asset('../assets/images/avatars/avtar_4.png') }}" alt="User-Profile"
                                    class="theme-color-green-img img-fluid avatar avatar-50 avatar-rounded">
                                <img src="{{ asset('../assets/images/avatars/avtar_5.png') }}" alt="User-Profile"
                                    class="theme-color-yellow-img img-fluid avatar avatar-50 avatar-rounded">
                                <img src="{{ asset('../assets/images/avatars/avtar_3.png') }}" alt="User-Profile"
                                    class="theme-color-pink-img img-fluid avatar avatar-50 avatar-rounded">
                                <div class="caption ms-3 d-none d-md-block ">
                                    <h6 class="mb-0 caption-title">{{ Auth::user()->name }}</h6>
                                    <p class="mb-0 caption-sub-title">{{ Auth::user()->roles_name }}</p>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end " aria-labelledby="navbarDropdown">
                                {{-- <li><button class="dropdown-item" type="button" class="btn btn" data-toggle="modal"
                                        data-target="#exampleModalCenterupd">
                                        <!-- <a class="btn btn-sm btn-icon btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"> -->
                                        تغيير الصورة
                                        <!-- </a>  -->
                                    </button>
                                </li> --}}


                                {{-- <li>
                                    <hr class="dropdown-divider">
                                </li> --}}
                                <li><a class="dropdown-item" href="{{ url('/' . ($page = 'logout')) }}"
                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">تسجيل
                                        خروج</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>

            </div>
            <div class="modal fade" id="exampleModalCenterupd" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">تعديل </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-row endd">

                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn ripple btn-warning endd" type="submit">تعديل</button>
                                    <button class="btn ripple btn-secondary" data-dismiss="modal"
                                        type="button">الغاء</button>
                                </div>
                                <!-- <button type="submit" class="btn btn-primary endd">اضافة</button> -->
                            </form>
                        </div>

                    </div>
                </div>

            </div>

        </nav> <!-- Nav Header Component Start -->
        <div class="iq-navbar-header" style="height: 215px;">
            <div class="container-fluid iq-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="flex-wrap d-flex justify-content-between align-items-center">
                            <div>
                                <h1>مرحبا</h1>
                                <p>موقع سكنى يساعد الطلاب على ايجاد سكن مناسب</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="iq-header-img">
                <img src="{{ asset('../assets/images/dashboard/top-header.png') }}" alt="header"
                    class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX">
                <img src="{{ asset('../assets/images/dashboard/top-header1.png') }}" alt="header"
                    class="theme-color-purple-img img-fluid w-100 h-100 animated-scaleX">
                <img src="{{ asset('../assets/images/dashboard/top-header2.png') }}" alt="header"
                    class="theme-color-blue-img img-fluid w-100 h-100 animated-scaleX">
                <img src="{{ asset('../assets/images/dashboard/top-header3.png') }}" alt="header"
                    class="theme-color-green-img img-fluid w-100 h-100 animated-scaleX">
                <img src="{{ asset('../assets/images/dashboard/top-header4.png') }}" alt="header"
                    class="theme-color-yellow-img img-fluid w-100 h-100 animated-scaleX">
                <img src="{{ asset('../assets/images/dashboard/top-header5.png') }}"alt="header"
                    class="theme-color-pink-img img-fluid w-100 h-100 animated-scaleX">
            </div>
        </div> <!-- Nav Header Component End -->
        <!--Nav End-->
    </div>
