<!DOCTYPE html>
<html lang="arabic">

<head>
    <meta charset="UTF-8">
    @section('title')
        صفحة البروفايل
    @endsection
    {{-- <link rel="stylesheet" href="{{asset('assets/css/rating.css')}}"> --}}
    {{-- @include('layouts.feedback_style') --}}
    @include('layouts.css_links')


    <style>
        .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
            display: flex;

        }
        .font{
            font-size:12px;
        }

        .rate:not(:checked)>input {
            position: absolute;
            display: none;
        }

        .rate:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rated:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rate:not(:checked)>label:before {
            content: '★ ';
        }

        .rate>input:checked~label {
            color: #ffc700;
        }

        .rate:not(:checked)>label:hover,
        .rate:not(:checked)>label:hover~label {
            color: #deb217;
        }

        .rate>input:checked+label:hover,
        .rate>input:checked+label:hover~label,
        .rate>input:checked~label:hover,
        .rate>input:checked~label:hover~label,
        .rate>label:hover~input:checked~label {
            color: #c59b08;
        }

        .star-rating-complete {
            color: #c59b08;
        }

        .rating-container .form-control:hover,
        .rating-container .form-control:focus {
            background: #fff;
            border: 1px solid #ced4da;
        }

        .rating-container textarea:focus,
        .rating-container input:focus {
            color: #000;
        }

        .rated {
            float: left;
            height: 46px;
            padding: 0 10px;
        }

        .rated:not(:checked)>input {
            position: absolute;
            display: none;
        }

        .rated:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ffc700;
        }

        .rated:not(:checked)>label:before {
            content: '★ ';
        }

        .rated>input:checked~label {
            color: #ffc700;
        }

        .rated:not(:checked)>label:hover,
        .rated:not(:checked)>label:hover~label {
            color: #deb217;
        }

        .rated>input:checked+label:hover,
        .rated>input:checked+label:hover~label,
        .rated>input:checked~label:hover,
        .rated>input:checked~label:hover~label,
        .rated>label:hover~input:checked~label {
            color: #c59b08;
        }
    </style>

</head>

<body>
    <!--------------------------- navigation bar -------------------------->
    @include('layouts.nav')
    <!-------------------------------------page content--------------------------------------->
    <!-------- Profile------ -->

    <section class="prof">
        <div class="container_profile">
            <div class="row d-flex justify-content-between flex-row-reverse my-5">
                <div class="col-4 image" style="margin-top:100px;">
                    @if ($owner->image_path)
                        <img src="../profiles/{{ $owner->image_path }}" alt="" width="40%"
                            style="margin-left: 80px;border-radius:50%;">
                    @else
                        <img src="{{ asset('assets/images/avatars/avtar_2.png') }}" alt="" width="40%"
                            style="margin-left: 80px;border-radius:50%;">
                    @endif

                    <h3 class="my-2 d-md-none d-xl-block fs-4">{{ $owner->name }}</h3>
                    {{-- <h3 class="my-2 d-md-block d-xl-none fs-1">{{$owner->name }}</h3> --}}
                    <div style="">
                        @can('تعديل البيانات')
                            @if (Auth::user()->id == $owner->id)
                                <button class="editInfo my-2" data-bs-target="#exampleModalToggle"
                                    data-bs-toggle="modal">تعديل
                                    التفاصيل</button>
                            @endif
                        @endcan
                    </div>


                    {{-- <a class="btn editInfo my-2" data-bs-target="#exampleModalCenteradd" data-toggle="modal"  href="">تقيم صاحب السكن </a> --}}
                    @can('مستخدم')
                        <button class="editInfo my-2" data-bs-target="#exampleModalCenteradd" data-bs-toggle="modal">تقيم
                            صاحب السكن </button>
                    @endcan
                    <div class="modal fade" id="exampleModalCenteradd" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <p class="modal-title quistin-1" id="exampleModalCenterTitle"> ما رايك في صاحب
                                        السكن؟؟ </p>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="container" action="{{ route('owner_feedback') }}" style="box-shadow: 0 0 10px 0 #ddd;"
                                        method="POST" autocomplete="off">
                                          @csrf

                                        <div class="rate rating" style="margin-right:150px;">
                                            <input type="radio" id="star5" class="rate " name="rating"
                                                value="5" />
                                            <label for="star5" title="text">5 stars</label>
                                            <input type="radio" id="star4" class="rate" name="rating"
                                                value="4" />
                                            <label for="star4" title="text" style="margin-right:20px;">4
                                                stars</label>
                                            <input type="radio" id="star3" class="rate" name="rating"
                                                value="3" />
                                            <label for="star3" title="text" style="margin-right:20px;">3
                                                stars</label>
                                            <input type="radio" id="star2" class="rate" name="rating"
                                                value="2">
                                            <label for="star2" title="text" style="margin-right:20px;">2
                                                stars</label>
                                            <input type="radio" id="star1" class="rate" name="rating"
                                                value="1" />
                                            <label for="star1" title="text" style="margin-right:20px;">1
                                                star</label>
                                        </div>
                                            <input type="hidden" name="user_id" value="{{ $owner->id }}">
                                        <button class=" send" type="submit"
                                            style="width:80px;margin-right:150px;margin-top:40px;background:#BD5D14; border:none; border-radius:20px;color:white">ارسال</button>
                                        <img src="{{ asset('assets/imeges/img (2).png') }}" alt=""
                                            class="img1">

                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-6 info d-flex justify-content-end align-items-end flex-column"
                    style="margin-top:-20px;">
                    <div id="stars" class="my-5">
                      
                    </div>
                    <ul class="list-group" style="border: none;">
                        <li class="list-group-item d-flex justify-content-between align-items-center"
                        style="border: none;">

                        <p style="padding-right:10px;">@if($owner_rate)
                            @for ($i=0;$i<$owner_rate->star_rating;$i++)

                        <img onClick="rate()" class="star" id="1" src="{{ asset('assets/images/star.png') }}" />

                            @endfor
                            @endif </p>
                        <p style="font-size: 20px;color:chocolate">  : التقييم </p>
                    </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center"
                            style="border: none;">

                            <p style="padding-right:10px;">{{ $owner->phone }} </p>
                            <p style="font-size: 20px;color:chocolate">: وسيلة التواصل </p>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center"
                            style="border: none;">

                            <p style="padding-right:10px;">
                                {{ $owner->address }}
                            </p>
                            <p style="font-size: 20px;color:chocolate;">: العنوان </p>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center"
                            style="border: none;">

                            <p style="padding-right:10px;">
                                {{ $owner->roles_name }}
                            </p>
                            <p style="font-size: 20px;color:chocolate">: نوع المستخدم </p>
                        </li>


                    </ul>


                </div>
            </div>
        </div>
    </section>
    <hr class="hrr">

    <!---------------------- main-page ------------------------------>


    <div class="main-page">
        <!-------- Profile------ -->

        <!------------------- searsh par ---------------------->
        @can('انشاء بوست')
            <div class="search-par">
                <button data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">
                    <input type="text" placeholder="بماذا تفكر؟"></button>
                <a href=" {{ route('show_profile', Auth::user()->id) }}"><img src="../profiles/{{ $owner->image_path }}"
                        alt="" style="border-radius:50%;"></a>
                <hr>
                <button class="d-md-block d-xl-none fs-2">نشر</button>
                <button class="d-md-none d-xl-block fs-5">نشر</button>
            </div>
        @endcan
        @foreach ($posts as $post)
            <div class="container1">
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
                                src="../profiles/{{ $post->User->image_path }}" alt=""
                                style="border-radius:50%;"></a>
                    </div>
                    <div class="data"><span> {{ $post->created_at }} </span></div>
                </div>
                <div class="post-discreption">
                    <p class="d-md-none d-xl-block fs-4">
                        {{ $post->description }}
                    </p>

                </div>
                <div class="post-info">
                    <div class="left">
                        <div class="button-1">
                            <p class="d-md-block d-xl-block fs-2">طريقة التواصل : {{ $post->Appartment->contact }}</p>
                        </div>
                        <div class="button-2">
                            <p class="d-md-none d-xl-block fs-4">المنطقة : {{ $post->Appartment->Region->name }}</p>
                        </div>
                        <div class="button-3">
                            <p class="d-md-none d-xl-block fs-4">السعر : {{ $post->Appartment->price }}</p>
                        </div>
                        <div class="button-4">
                            <p class="d-md-none d-xl-block fs-4">النوع : {{ $post->Appartment->type }}</p>
                        </div>
                        <div class="button-5">
                            <p class="d-md-none d-xl-block fs-4">العدد : {{ $post->Appartment->room_num }}</p>
                        </div>
                        <div class="button-6">

                            <p class="d-md-block d-xl-block fs-2">
                                <a href="">رابط المكان : @if ($post->Appartment->location)
                                        {{ $post->Appartment->location }}
                                    @else
                                        لا يوجد رابط
                                    @endif
                                </a>
                            </p>

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
                                        تعديل منشور{{ $post->id }}
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
                                                <select name="branch_id" class="form-select SlectBox"
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
                                                    class="form-select form-control"
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
                                                    class="form-control" placeholder=" العدد : "
                                                    value="{{ $post->Appartment->room_num }}">
                                            </div>
                                            <div class="col-md-5 col-12 my-2">
                                                <input type="text" name="price" id="placeLink"
                                                    class="form-control" placeholder="السعر : "
                                                    value="{{ $post->Appartment->price }}">
                                            </div>
                                            <div class="row gap-3 enter my-3 choose">
                                                <div class="col-md-1 col-6">ادخل:</div>
                                                <div class="col-md-5 col-12 my-2 m-md-auto">

                                                    <input type="text" name="contact" id="placeLink"
                                                        class="form-control" placeholder="وسيلة التواصل  : "
                                                        value="{{ $post->Appartment->contact }}">
                                                </div>
                                                <div class="col-md-5 col-12 my-2">

                                                    <input type="text" name="location" id="placeLink"
                                                        class="form-control"
                                                        placeholder=" رابط المكان : "value="{{ $post->Appartment->location }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div
                                                class="col-10 m-auto p-3 enterPic d-flex justify-content-between flex-row-reverse align-items-center">

                                                <input type='file' name='photos[]' id="real-file2"
                                                    hidden="hidden" accept="image/*" multiple="multiple" />
                                                <img src="{{ asset('assets/images/uploadImage.jpg') }}"
                                                    id="custom-button2" />
                                                <span id="custom-text2"></span>
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

    </div>

    {{-- ///////////////////////////////update profile////////////// --}}
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">
                <div class="modal-header">
                    <div class=" userName">
                        <span dir="rtl"><img src="imeges/person-circle.svg" alt=""> اسم المستخدم </span>
                    </div>
                    <div class=""><button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button></div>
                </div>
                <div class="update">
                    <div class="alert alert-warning d-flex align-items-center" role="alert">

                        <div>
                         قم بملء جميع الحقول المطلوبة حتى يتم تعديل المنشور
                      </div>
                    </div>
                    <div class="container">
                        <div class="whatDoYouThink my-3 mx-4"> تعديل التفاصيل</div>
                        <form action="{{ route('owner_update') }}" method="post" enctype='multipart/form-data'>
                            @csrf
                            @method('PUT')
                            <div class="row gap-3 enter my-3 mx-auto">
                                <div class="col-md-6 col-12 my-2 rounded-3">
                                    <input type="text" name="name" value="{{ $owner->name }}" id="placeLink"
                                        class="form-control" placeholder=" تغير الاسم :">
                                    <input type="hidden" name="owner_id" value="{{ $owner->id }}" />

                                </div>
                                <div class="col-md-5 col-12 my-2 rounded-3">
                                    <input type="text" name="address" value="{{ $owner->address }}"
                                        id="placeLink" class="form-control" placeholder="العنوان : ">
                                </div>


                                <div class="col-md-11 col-12 my-2 rounded-3">
                                    <input type="text" name="phone" value="{{ $owner->phone }}" id="placeLink"
                                        class="form-control" placeholder="ادخل وسيلة التواصل  :  ">
                                </div>
                            </div>
                            <div class="row">
                                <div
                                    class="col-10 m-auto p-3 enterPic d-flex justify-content-between flex-row-reverse align-items-center">

                                    <input type="file" name="image" id="real-file" hidden="hidden" />
                                    <img src="{{ asset('assets/images/uploadImage.jpg') }}" id="custom-button" />
                                    <span id="custom-text"></span>
                                    <span class=""> تغير الصورة</span>

                                </div>
                            </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="post" class="w-100 py-3 rounded-4"> حفظ </button>
                </div>
            </div>
            </form>

        </div>
    </div>
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
                            <div class="row gap-4 choose">
                                <div class="col-md-1 col-6 ">أختار: </div>
                                <div class="col-md-3 col-12 my-2">
                                    <select name="type" class="form-select @error('type') is-invalid @enderror " aria-label="Default select example "
                                        style="border-radius: 20px;">
                                        <option selected disabled>النوع:</option>
                                        <option value="طلاب">طلاب</option>
                                        <option value="طالبات">طالبات</option>
                                    </select>
                                    @error('type')
                                    <div class="alert alert-danger text-danger font"
                                        style="background: white;border:none ;margin-bottom:0px">{{ $message }}
                                    </div>
                                    <?php $error = true; ?>
                                @enderror
                                </div>
                                <div class="col-md-3 col-12 my-2">
                                    <select name="branch_id" class="form-select SlectBox @error('branch_id') is-invalid @enderror"
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
                                            style="background: white;border:none ;margin-bottom:0px">{{ $message }}
                                        </div>
                                        <?php $error = true; ?>
                                    @enderror
                                </div>
                                <div class="col-md-3 col-12 my-2">
                                    <select id="product" name="region_id" class="form-select form-control @error('region_id') is-invalid @enderror"
                                        aria-label="Default select example" style="border-radius: 20px;">
                                        <option selected disabled>المنطقه:</option>

                                    </select>
                                    @error('region_id')
                                    <div class="alert alert-danger text-danger font"
                                        style="background: white;border:none ;margin-bottom:0px">{{ $message }}
                                    </div>
                                    <?php $error = true; ?>
                                @enderror
                                </div>

                            </div>
                            <div class="row gap-3 enter my-3 choose">
                                <div class="col-md-1 col-6"> أدخل: </div>
                                <div class="col-md-5 col-12 my-2">
                                    <input type="text" name="room_num" id="placeLink" class="form-control @error('room_num') is-invalid @enderror"
                                        placeholder=" العدد : ">
                                        @error('room_num')
                                        <div class="alert alert-danger text-danger font"
                                            style="background: white;border:none ;margin-bottom:0px">{{ $message }}
                                        </div>
                                        <?php $error = true; ?>
                                    @enderror
                                </div>
                                <div class="col-md-5 col-12 my-2">
                                    <input type="text" name="price" id="placeLink" class="form-control"
                                        placeholder="السعر : ">
                                        @error('price')
                                        <div class="alert alert-danger text-danger font"
                                            style="background: white;border:none ;margin-bottom:0px">{{ $message }}
                                        </div>
                                        <?php $error = true; ?>
                                    @enderror
                                </div>
                                <div class="row gap-3 enter my-3 choose">
                                    <div class="col-md-1 col-6">ادخل:</div>
                                    <div class="col-md-5 col-12 my-2 m-md-auto">

                                        <input type="text" name="contact" id="placeLink" class="form-control @error('contact') is-invalid @enderror "
                                            placeholder="وسيلة التواصل  : ">
                                            @error('contact')
                                            <div class="alert alert-danger text-danger font"
                                                style="background: white;border:none ;margin-bottom:0px">
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

                                    <input type='file' name='photos[]' multiple="multiple" id="real-file1"
                                        hidden="hidden" accept="image/*" />
                                    <img src="{{ asset('assets/images/uploadImage.jpg') }}" id="custom-button1" />
                                    <span id="custom-text1"></span>
                                    <span class="">أضاف الى منشوراتك</span>

                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <div class="col-10 d-flex justify-content-center m-auto">
                            <button type="submit" id="post" class="w-100 py-3 rounded-4"> نشر </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script src="{{ url('assets/js/update.js') }}"></script>
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
</body>

</html>
