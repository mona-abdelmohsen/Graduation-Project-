<!DOCTYPE html>
<html lang="arabic">

<head>

    <meta charset="UTF-8">
    <title>الصفحة الرئيسية </title>
    @include('layouts/css_links')
    <link rel="stylesheet" href="{{ asset('assets/css/sakany(home).css') }}">

    @if (Auth::user()->roles_name == 'مستخدم')
        <style>
            .mrs {
                margin-top: -530px;
            }

            .font {
                font-size: 12px !important;
            }

            .container {
                margin-top: 68px !important;
            }
        </style>
    @endif






</head>

<body>

    <!--------------------------- navigation bar -------------------------->

    <!--------------------------- navigation bar -------------------------->

    <nav class="navbar bg-body-tertiary" style="position: fixed;width: 100%;margin-top: 0px; z-index:10 !important;">
        <div class="container-fluid" style="margin-top: 0px; padding-top: 0px;">
            <div class="left-side" style="display:flex">
                <a href="{{ url('/' . ($page = 'logout')) }}"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="fa-sharp fa-solid fa-arrow-left"></i>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </a>
                @if (Auth::user()->roles_name == 'صاحب السكن')
                <a class="navbar-brand"
                    href="{{ route('show_profile', Auth::user()->id) }}">{{ Auth::user()->name }}
                </a>
                <a href="{{ route('show_profile', Auth::user()->id) }}"> <img
                        src="../profiles/{{Auth::user()->image_path}}" alt="" style="border-radius:50%;">
                </a>
            @else
                <a class="navbar-brand">{{ Auth::user()->name }} </a>
                <a> <img src="../profiles/{{Auth::user()->image_path}}" alt="" style="border-radius:50%;" >
                </a>
            @endif


                
                
                
            </div>
            

            {{-- @can('مستخدم') --}}
            <div class="nav-item dropdown">
                    <a href="#pp" class="nav-link" id="notification-drop" data-bs-toggle="dropdown"
                        style="color:#BD5D14;margin-left:120px;">
                        <svg width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M19.7695 11.6453C19.039 10.7923 18.7071 10.0531 18.7071 8.79716V8.37013C18.7071 6.73354 18.3304 5.67907 17.5115 4.62459C16.2493 2.98699 14.1244 2 12.0442 2H11.9558C9.91935 2 7.86106 2.94167 6.577 4.5128C5.71333 5.58842 5.29293 6.68822 5.29293 8.37013V8.79716C5.29293 10.0531 4.98284 10.7923 4.23049 11.6453C3.67691 12.2738 3.5 13.0815 3.5 13.9557C3.5 14.8309 3.78723 15.6598 4.36367 16.3336C5.11602 17.1413 6.17846 17.6569 7.26375 17.7466C8.83505 17.9258 10.4063 17.9933 12.0005 17.9933C13.5937 17.9933 15.165 17.8805 16.7372 17.7466C17.8215 17.6569 18.884 17.1413 19.6363 16.3336C20.2118 15.6598 20.5 14.8309 20.5 13.9557C20.5 13.0815 20.3231 12.2738 19.7695 11.6453Z"
                                fill="currentColor"></path>
                            <path opacity="0.4"
                                d="M14.0088 19.2283C13.5088 19.1215 10.4627 19.1215 9.96275 19.2283C9.53539 19.327 9.07324 19.5566 9.07324 20.0602C9.09809 20.5406 9.37935 20.9646 9.76895 21.2335L9.76795 21.2345C10.2718 21.6273 10.8632 21.877 11.4824 21.9667C11.8123 22.012 12.1482 22.01 12.4901 21.9667C13.1083 21.877 13.6997 21.6273 14.2036 21.2345L14.2026 21.2335C14.5922 20.9646 14.8734 20.5406 14.8983 20.0602C14.8983 19.5566 14.4361 19.327 14.0088 19.2283Z"
                                fill="currentColor"></path>
                        </svg>
                        <span class="bg-danger dots"
                            style="margin-left:124px">{{ Auth::User()->unreadNotifications->count() }}</span>
                    </a>
                    <div class="p-0 sub-drop dropdown-menu dropdown-menu-end" aria-labelledby="notification-drop"
                        style="background:#BD5D14 !important; border-radius:10px;overflow-y: scroll; height:430px;overflow-x: hidden;">
                        <div class="m-0 shadow-none card" style="width: 300px;background:#BD5D14 !important;">
                            <div
                                class="py-3 card-header d-flex justify-content-between bg-primary"style="background:#BD5D14 !important;">
                                <div class="header-title" style="display:flex">
                                    <h5 class="mb-0 text-white" style="margin-left:170px;width:150px "> <i
                                            class="fa-regular fa-bell"></i> الأشعارات </h5>



                                </div>
                            </div>
                            @foreach (Auth::User()->unreadNotifications as $notification)
                                @if (isset($notification->data['type']) && $notification->data['type'] == 'message')
                                    <div class="p-0 card-body"
                                        style="border: 1px solid #c9c6c6; margin-bottom:10px;background:white !important; border-radius:10px">
                                        <a href="{{ route('chat.show', $notification->data['message_id']) }}"
                                            class="iq-sub-card" style="text-decoration: none;color:black">

                                            <div class="d-flex align-items-center">
                                                <div class="">
                                                    <h6 class="mb-0 "
                                                        style="margin-top:10px;font-family: cairo; padding-left: 25px;padding-top:10px;">

                                                        <span style="font-size:20px; ">
                                                            تم إرسال رسالة جديدة بواسطة
                                                        </span>
                                                        <span style="margin-left:100px">
                                                            {{ \App\Models\User::where('id', $notification->data['sender_id'])->first()->name }}
                                                        </span>
                                                    </h6>
                                                    <div
                                                        class="d-flex justify-content-between align-items-center"style="margin-left:70px">
                                                        <small class="float-end font-size-12">بتاريخ
                                                            {{ $notification->created_at }}</small>
                                                    </div>
                                                </div>

                                                <img class="p-1 avatar-40 rounded-pill bg-soft-primary"
                                                    style="border-radius:50%;width:40px;heigth:40px; margin-right:10px"
                                                    src="../profiles/{{ $image = \App\Models\User::where('id', $notification->data['sender_id'])->first()->image_path }}"
                                                    alt="" style="border-radius:50%;">

                                            </div>
                                        </a>
                                    </div>
                                @elseif (isset($notification->data['post_id']))
                                    <div class="p-0 card-body"
                                        style="border: 1px solid #c9c6c6; margin-bottom:10px;background:white !important; border-radius:10px">
                                        <a href="{{ route('notify.show', $notification->data['post_id']) }}"
                                            class="iq-sub-card" style="text-decoration: none;color:black">

                                            <div class="d-flex align-items-center">
                                                <div class="">
                                                    <h6 class="mb-0 "
                                                        style="margin-top:10px;font-family: cairo; padding-left: 25px;padding-top:10px;">

                                                        <span style="font-size:20px; ">
                                                            تم اضافة منشور جديد بواسطة
                                                        </span>
                                                        <span style="margin-left:100px">
                                                            {{ \App\Models\User::where('id', $notification->data['user_id'])->first()->name }}
                                                        </span>
                                                    </h6>
                                                    <div
                                                        class="d-flex justify-content-between align-items-center"style="margin-left:70px">
                                                        <small class="float-end font-size-12">بتاريخ
                                                            {{ $notification->created_at }}</small>
                                                    </div>
                                                </div>

                                                <img class="p-1 avatar-40 rounded-pill bg-soft-primary"
                                                    style="border-radius:50%;width:40px;heigth:40px; margin-right:10px"
                                                    src="../profiles/{{ $image = \App\Models\User::where('id', $notification->data['user_id'])->first()->image_path }}"
                                                    alt="" style="border-radius:50%;">

                                            </div>
                                        </a>
                                    </div>
                                @endif
                            @endforeach



                            <a class="mb-0 text-white"href="{{ route('notify.edit', 'markAll') }}">قراءة الكل </a>
                        </div>
                    </div>
                </div>
            {{-- @endcan --}}


            <div style="padding-top:10px !important;margin-left:-330px"><a href="{{ route('chat.index') }}"><i class="fa-solid fa-message"
                 style="color:#BD5D14; font-size:23px ;margin-bottom:-10px !important"></i></a>
            </div>

            {{-- search --}}
            <livewire:search />
        </div>
    </nav>


    <!---------------------- main-page ------------------------------>

    <div class="main-page">


        <!------------------- searsh par ---------------------->
        @can('انشاء بوست')
            <div class="search-par" style="width: 70%;margin-top: 65px;margin-right: 40px;height:150px;">
                <button data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">
                    <input type="text" placeholder="بماذا تفكر؟"></button>
                <a href=" {{ route('show_profile', Auth::user()->id) }}"><img
                        src="profiles/{{ Auth::user()->image_path }}" alt="" style="border-radius:50%;"></a>
                <hr>
                <button class="d-md-block d-xl-none fs-2">نشر</button>
                <button class="d-md-none d-xl-block fs-5">نشر</button>
            </div>
        @endcan
        <!----------------------left-side---------------------->

        <!-------------------- post1 -------------------------->
        @foreach ($posts as $post)
            <div class="container" id="{{ $post->id }}" style="margin-top:-5px">
                <div class="user-info">
                    <div class="dropdown">
                        @can('التحكم فى البوست')
                            @if (Auth::user()->id == $post->User->id)
                                <a href=""><img src="{{ asset('assets/images/more icon.png') }}"
                                        alt=""></a>

                                <div class="dropdown-content">

                                    <a class="d-md-none d-xl-block fs-5 pointer-event" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop{{ $post->id }}">
                                        <p> تعديل المنشور </p>

                                    </a>

                                    <a class="d-md-none d-xl-block fs-5 pointer-event">
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" style="border: none; background:inherit;color:inherit">
                                                <p>حذف المنشور</p>
                                            </button>
                                        </form>
                                    </a>
                                </div>
                            @endif
                        @endcan

                    </div>

                    <div class="right-side">
                        <a href="{{ route('show_profile', $post->User->id) }}"
                            style="text-decoration: none ;color:black">
                            <p>{{ $post->User->name }}</p>
                        </a>
                        <a href="{{ route('show_profile', $post->User->id) }}"><img
                                src="profiles/{{ $post->User->image_path }}" alt=""
                                style="border-radius:50%;"></a>
                    </div>
                    <div class="data"><span> {{ $post->created_at }} </span></div>
                </div>

                <div class="post-discreption">
                    <p>{{ $post->description }}</p>
                </div>
                <div class="post-info">
                    <div class="left">
                        <div class="button-1">
                            <p>طريقة التواصل : {{ $post->Appartment->contact }}</p>
                        </div>
                        <div class="button-2">
                            <p>المنطقة : {{ $post->Appartment->Region->name }}</p>
                        </div>
                        <div class="button-3">
                            <p>السعر : {{ $post->Appartment->price }}</p>
                        </div>
                        <div class="button-4">
                            <p>النوع : {{ $post->Appartment->type }}</p>
                        </div>
                        <div class="button-5">
                            <p>العدد : {{ $post->Appartment->room_num }}</p>
                        </div>
                        <div class="button-6">
                            <p><a href="">رابط المكان :
                                    @if ($post->Appartment->location)
                                        {{ $post->Appartment->location }}
                                    @else
                                        لا يوجد رابط
                                    @endif
                                </a></p>
                        </div>
                    </div>
                    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <?php $i = 1; ?>
                            @foreach ($pictures as $pic)
                                @if ($post->id == $pic->post_id)
                                    <div class="carousel-item @if ($i++ == 1) active @endif"
                                        data-bs-interval="5000">
                                        <img src="../images/{{ $pic->picture_path }}" class="d-block w-100"
                                            alt="...">
                                    </div>
                                @endif
                            @endforeach

                        </div>
                        <button class="carousel-control-prev" type="button"
                            data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button"
                            data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                </div>

            </div>
            {{-- /////////////////////update post////////////////////////// --}}
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" id="edit{{ $post->id }}">
                <div class="modal fade" id="staticBackdrop{{ $post->id }}" data-bs-backdrop="static"
                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class=" userName">
                                    <span dir="rtl">
                                        تعديل منشور
                                    </span>
                                </div>
                                <div class=""><button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                            </div>
                            <form action="{{ route('posts.update', $post->id) }}" method="post"
                                enctype='multipart/form-data'>
                                @csrf
                                @method('patch')
                                <div class="modal-body ">

                                    <div class="update">
                                        <div class="alert alert-warning d-flex align-items-center" role="alert">

                                            <div>
                                                قم بملء جميع الحقول المطلوبة حتى يتم تعديل المنشور
                                            </div>
                                        </div>

                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control"
                                                placeholder="أكتب ملاحظاتك حول موضوع النشر .." aria-label="Username"
                                                aria-describedby="basic-addon1" name="description"
                                                value="{{ $post->description }}">
                                        </div>

                                        <br>
                                        <hr><br>
                                        <div class="row gap-4 choose">
                                            <div class="col-md-1 col-6 ">أختار: </div>
                                            <div class="col-md-3 col-12 my-2">
                                                <select name="type" class="form-select "
                                                    aria-label="Default select example" style="border-radius: 20px;">
                                                    <option selected>{{ $post->Appartment->type }}</option>
                                                    <option value="طلاب">طلاب</option>
                                                    <option value="طالبات">طالبات</option>
                                                </select>

                                            </div>
                                            <div class="col-md-3 col-12 my-2">
                                                <select name="branch_id" class="form-select SlectBox "
                                                    aria-label="Default select example" style="border-radius: 20px;"
                                                    onclick="console.log($(this).val())"
                                                    onchange="console.log('change is firing')">
                                                    <option value="{{ $post->Appartment->Branch->id }}">
                                                        {{ $post->Appartment->Branch->name }}</option>
                                                    @foreach ($branches as $branch)
                                                        <option value="{{ $branch->id }}">{{ $branch->name }}
                                                        </option>
                                                    @endforeach

                                                </select>

                                            </div>
                                            <div class="col-md-3 col-12 my-2">
                                                <select id="product" name="region_id"
                                                    class="form-select form-control "
                                                    aria-label="Default select example" style="border-radius: 20px;">
                                                    <option value="{{ $post->Appartment->Region->id }}" selected>
                                                        {{ $post->Appartment->Region->name }}</option>

                                                </select>

                                            </div>

                                        </div>
                                        <div class="row gap-3 enter my-3 choose">
                                            <div class="col-md-1 col-6"> أدخل: </div>
                                            <div class="col-md-5 col-12 my-2">
                                                <input type="text" name="room_num" id="placeLink"
                                                    class="form-control " placeholder=" العدد : "
                                                    value="{{ $post->Appartment->room_num }}">

                                            </div>
                                            <div class="col-md-5 col-12 my-2">
                                                <input type="text" name="price" id="placeLink"
                                                    class="form-control " placeholder="السعر : "
                                                    value="{{ $post->Appartment->price }}">

                                            </div>
                                            <div class="row gap-3 enter my-3 choose">
                                                <div class="col-md-1 col-6">ادخل:</div>
                                                <div class="col-md-5 col-12 my-2 m-md-auto">

                                                    <input type="text" name="contact" id="placeLink"
                                                        class="form-control " placeholder="وسيلة التواصل  : "
                                                        value="{{ $post->Appartment->contact }}">

                                                </div>
                                                <div class="col-md-5 col-12 my-2">

                                                    <input type="text" name="location" id="placeLink"
                                                        class="form-control"
                                                        placeholder=" رابط المكان(ان وجد): "value="{{ $post->Appartment->location }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div
                                                class="col-10 m-auto p-3 enterPic d-flex justify-content-between flex-row-reverse align-items-center">



                                                {{-- <input type='file' name='photos[]' id="real-file13"
                                                hidden="hidden"  accept="image/*" multiple="multiple" />
                                                <img src="{{ asset('assets/images/uploadImage.jpg') }}"
                                                    id="custom-button13" />
                                                <span id="custom-text13"></span>
                                                <span class="">أضاف الى منشوراتك</span> --}}
                                                <input type='file' name='photos[]' id="real-file13"
                                                    accept="image/*" multiple="multiple" />
                                                {{-- <img src="{{ asset('assets/images/uploadImage.jpg') }}"
                                                    id="custom-button13" /> --}}
                                                <span id="custom-text13"></span>
                                                <span class="">أضاف الى منشوراتك</span>

                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <div class="col-10 d-flex justify-content-center m-auto">
                                        <button type="submit" id="post" class="w-100 py-3 rounded-4"> نشر
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach


        <!-------------------------right-side---------------------->

        <div class="mrs" style="position: fixed;width: 23%;margin-top: 55px;margin-left: 70%;height:400px; ">
            <div class="main-right-side">
                <div class="branch-list">
                    <div class="branch-icon">
                        <a href=""><i class="fa-sharp fa-solid fa-bars"></i></a>
                    </div>
                    <div class="branch-name" style="margin-bottom:-5px">
                        <a href="">
                            <p class="p-1">الفروع</p>
                        </a>
                    </div>
                    <hr>
                    @foreach ($branches as $branch)
                        <div class="branch-icon">
                            <a href="{{ route('branches.show', $branch->id) }}"><i class="fa-solid fa-house"></i></a>
                        </div>
                        <div class="branch-name">
                            <a href="{{ route('branches.show', $branch->id) }}">
                                <p>{{ $branch->name }}</p>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
            <hr>
            <div class="main-right-side" style="height:60px;">
                <div class="branch-list">
                    <div class="branch-icon">
                        <a href="{{ route('feedback.create') }}"><i
                                class="fa-sharp fa-solid fa-triangle-exclamation"></i></a>
                    </div>
                    <div class="branch-name">
                        <a href="{{ route('feedback.create') }}">
                            <p class="p2">قيمنا برأيك</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="main-right-side" style="height:60px;">
                <div class="branch-list">
                    <div class="branch-icon">
                        <a href="{{ route('landing') }}#help"><i class="fa-solid fa-handshake-angle"></i></a>
                    </div>
                    <div class="branch-name">
                        <a href="{{ route('landing') }}#help">
                            <p class="p2">مساعدة</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="main-right-side" style="height:60px;">
                <div class="branch-list">
                    <div class="branch-icon" style="margin-top:20px !important">
                        <a href="{{ url('/' . ($page = 'logout')) }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                class="fa-solid fa-arrow-right-from-bracket" ></i>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </a>
                    </div>
                    <div class="branch-name">
                        <a href="{{ url('/' . ($page = 'logout')) }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <p class="p2">تسجيل الخروج</p>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- ------------------------------------------------------------------------------------------------------------------------------------- ----------------- --}}
    {{-- ///////////////////////////add post////////////////////// --}}
    <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">

                    <div class=" userName">
                        <span dir="rtl">
                            إنشاء منشور
                        </span>
                    </div>
                    <div class=""><button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                </div>
                <form action="{{ route('posts.store') }}" method="post" enctype='multipart/form-data'>
                    @csrf
                    <div class="modal-body ">

                        <div class="update">
                            <div class="alert alert-warning d-flex align-items-center" role="alert">

                                <div>
                                    قم بملء جميع الحقول المطلوبة حتى يتم إنشاء المنشور
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <input type="text" class="form-control"
                                    placeholder="أكتب ملاحظاتك حول موضوع النشر .." aria-label="Username"
                                    aria-describedby="basic-addon1" name="description">
                            </div>

                            <br>
                            <hr><br>
                            <?php $error = false; ?>
                            <div class="row gap-4 choose">
                                <div class="col-md-1 col-6 ">أختار: </div>
                                <div class="col-md-3 col-12 my-2">
                                    <select name="type" class="form-select @error('type') is-invalid @enderror"
                                        aria-label="Default select example" style="border-radius: 20px;">
                                        <option selected disabled>النوع:</option>
                                        <option value="طلاب">طلاب</option>
                                        <option value="طالبات">طالبات</option>
                                    </select>
                                    @error('type')
                                        <div class="alert alert-danger text-danger font"
                                            style="background: white;border:none ;margin-bottom:0px;font-size:12px">
                                            {{ $message }}
                                        </div>
                                        <?php $error = true; ?>
                                    @enderror
                                </div>
                                <div class="col-md-3 col-12 my-2">
                                    <select name="branch_id"
                                        class="form-select SlectBox @error('branch_id') is-invalid @enderror"
                                        aria-label="Default select example" style="border-radius: 20px;"
                                        onclick="console.log($(this).val())"
                                        onchange="console.log('change is firing')">
                                        <option selected disabled>الفرع:</option>
                                        @foreach ($branches as $branch)
                                            <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                        @endforeach

                                    </select>
                                    @error('branch_id')
                                        <div class="alert alert-danger text-danger font"
                                            style="background: white;border:none ;margin-bottom:0px;font-size:12px">
                                            {{ $message }}
                                        </div>
                                        <?php $error = true; ?>
                                    @enderror
                                </div>
                                <div class="col-md-3 col-12 my-2">
                                    <select id="product" name="region_id"
                                        class="form-select form-control @error('region_id') is-invalid @enderror"
                                        aria-label="Default select example" style="border-radius: 20px;margin-top:5px;padding-top:5px">
                                        <option selected disabled >المنطقه:</option>

                                    </select>
                                    @error('region_id')
                                        <div class="alert alert-danger text-danger font"
                                            style="background: white;border:none ;margin-bottom:0px;font-size:12px">
                                            {{ $message }}
                                        </div>
                                        <?php $error = true; ?>
                                    @enderror
                                </div>

                            </div>
                            <div class="row gap-3 enter my-3 choose">
                                <div class="col-md-1 col-6"> أدخل: </div>
                                <div class="col-md-5 col-12 my-2">
                                    <input type="text" name="room_num" id="placeLink"
                                        class="form-control @error('room_num') is-invalid @enderror"
                                        placeholder=" العدد : ">
                                    @error('room_num')
                                        <div class="alert alert-danger text-danger font"
                                            style="background: white;border:none ;margin-bottom:0px;font-size:12px">
                                            {{ $message }}
                                        </div>
                                        <?php $error = true; ?>
                                    @enderror
                                </div>
                                <div class="col-md-5 col-12 my-2">
                                    <input type="text" name="price" id="placeLink"
                                        class="form-control @error('price') is-invalid @enderror"
                                        placeholder="السعر : ">
                                    @error('price')
                                        <div class="alert alert-danger text-danger font"
                                            style="background: white;border:none ;margin-bottom:0px ;font-size:12px">
                                            {{ $message }}
                                        </div>
                                        <?php $error = true; ?>
                                    @enderror
                                </div>
                                <div class="row gap-3 enter my-3 choose">
                                    <div class="col-md-1 col-6">ادخل:</div>
                                    <div class="col-md-5 col-12 my-2 m-md-auto">

                                        <input type="text" name="contact" id="placeLink"
                                            class="form-control @error('contact') is-invalid @enderror"
                                            placeholder="وسيلة التواصل  : ">
                                        @error('contact')
                                            <div class="alert alert-danger text-danger font"
                                                style="background: white;border:none ;margin-bottom:0px;font-size:12px">
                                                {{ $message }}</div>
                                            <?php $error = true; ?>
                                        @enderror
                                    </div>
                                    <div class="col-md-5 col-12 my-2">

                                        <input type="text" name="location" id="placeLink" class="form-control"
                                            placeholder=" رابط المكان : ">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div
                                    class="col-10 m-auto p-3 enterPic d-flex justify-content-between flex-row-reverse align-items-center">

                                    <input type='file' name='photos[]' multiple="multiple" id="real-file12"
                                        hidden="hidden" accept="image/*" />
                                    <img src="{{ asset('assets/images/uploadImage.jpg') }}" id="custom-button12" />
                                    <span id="custom-text12"></span>
                                    <span class="">أضاف الى منشوراتك</span>

                                </div>
                            </div>

                        </div>

                    </div>
                    {{ $error }}
                    <div class="modal-footer">
                        <div class="col-10 d-flex justify-content-center m-auto">
                            <button @if ($error) disabled @endif type="submit" id="post"
                                class="w-100 py-3 rounded-4"> نشر </button>

                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <script src="{{ url('assets/js/update2.js') }}"></script>
    @include('layouts.js_links')
    <script>
        $(document).ready(function() {
            $('select[name="branch_id"]').on('change', function() {
                var branchId = $(this).val();
                if (branchId) {
                    $.ajax({
                        url: "{{ URL::to('post') }}/" + branchId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="region_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="region_id"]').append('<option value="' +
                                    key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/bootstrap.js') }}"></script>
    @include('layouts.js_links')


</body>

</html>
