<!DOCTYPE html>
<html lang="arabic">

<head>
    <meta charset="UTF-8">
    <title> صفحة الفرع</title>
    <link rel="stylesheet" href="{{ asset('../assets/css/sakany(branch).css') }}">

    @include('layouts.css_links')
</head>

<body>

    <!--------------------------- navigation bar -------------------------->


    @include('layouts.nav')


    <!-------------------------------------page content--------------------------------------->


    <!---------------------- main-page ------------------------------>

    <div class="main-page">

        <!--------------------links_list------------------------>


        <div class="container2" style="position: fixed;width: 85%;margin-top: 55px;margin-left: 100px;margin-right: 40px;height:55px;z-index:10 !important; ">
            <div class="about">
                <a href="{{ route('branch_problem.show',$Branch->id) }}" class="orange">
                    <p>تقديم اقتراح او مشكله</p>
                </a>
            </div>
            @can('التواصل مع المدير')
                <div class="about">
                    <a href="{{route('chat.index')}}" class="orange">
                        <p>تواصل مع مدير الفرع</p>
                    </a>
                </div>
            @endcan

            <div class="about">
                <a href="{{ route('landing') }}#help" class="orange">
                    <p>مساعدة</p>
                </a>
            </div>
            <div class="about">
                <div class="dropdown">
                    <a  class="orange">
                        <p>طالبات</p>
                    </a>
                    <div class="dropdown-content">
                        <a >
                            <form action="{{route('filter_by_Type')}}" method="post">
                                   @csrf
                                   @method('get')
                                   <input type="hidden" name="branch_id" value="{{$Branch->id}}">
                                   <input type="hidden" name="type" value="طلاب">

                           <button type="submit" style="border: none;background:transparent"><p> طلاب </p></button>
                        </form>

                        </a>
                        <a >
                            <form action="{{route('filter_by_Type')}}" method="post">
                                   @csrf
                                   @method('get')
                                   <input type="hidden" name="branch_id" value="{{$Branch->id}}">
                                   <input type="hidden" name="type" value="طالبات">

                           <button type="submit" style="border: none;background:transparent"><p> طالبات </p></button>
                        </form>

                        </a>
                    </div>
                </div>
            </div>
            <div class="about">
                <div class="dropdown">
                    <a href="" class="orange">
                        <p>المناطق</p>
                    </a>
                    <div class="dropdown-content">
                        @foreach ($regions as $region)
                        <a >
                            <form action="{{route('filter_by_region')}}" method="post">
                                   @csrf
                                   @method('get')
                                   <input type="hidden" name="branch_id" value="{{$Branch->id}}">
                                   <input type="hidden" name="region_id" value="{{ $region->id }}">

                           <button type="submit" style="border: none;background:transparent"><p> {{ $region->name }} </p></button>
                        </form>

                        </a>

                        @endforeach
                    </div>
                </div>
            </div>


        </div>

        <!------------------branch_name------------------------->

        <div class="branch_name" style="margin-top: 130px;">
            <p>فرع {{ $Branch->name }}</p>
        </div>

        <!------------------- searsh par ---------------------->
        @can('انشاء بوست')
            <div class="search-par">
                <button data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">
                    <input type="text" placeholder="بماذا تفكر؟"></button>
                <a href=" {{ route('show_profile', Auth::user()->id)  }}" ><img src="../profiles/{{ Auth::user()->image_path }}" alt="" style="border-radius:50%;"></a>
                <hr>
                <button class="d-md-block d-xl-none fs-2">نشر</button>
                <button class="d-md-none d-xl-block fs-5">نشر</button>
            </div>
        @endcan
        <!----------------------left-side---------------------->
        <!----------------------- post ------------------------>
        @foreach ($posts as $post)
        <div class="container1">
            <div class="user-info">
                <div class="dropdown">
                    @can('التحكم فى البوست')
                    @if(Auth::user()->id == $post->User->id)
                    <a href=""><img src="{{ asset('assets/images/more icon.png') }}" alt=""></a>

                        <div class="dropdown-content">
                            <a class="d-md-none d-xl-block fs-5 pointer-event" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop{{ $post->id }}">
                                <p> تعديل المنشور </p>
                            </a>
                            <a class="d-md-none d-xl-block fs-5 pointer-event">
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="B" value="2">
                                    <input type="hidden" name="branch_id" value="{{ $Branch->id }}">
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
                    <a href="{{ route('show_profile', $post->User->id)}}"><img
                            src="../profiles/{{  $post->User->image_path }}" alt="" style="border-radius:50%;"></a>
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
                        @foreach ($picture as $pic)
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

                                            <input type='file' name='photos[]'
                                                id="real-file13" hidden="hidden"  accept="image/*"  multiple="multiple" />
                                            <img src="{{ asset('assets/images/uploadImage.jpg') }}"
                                                id="custom-button13" />
                                            <span id="custom-text13"></span>
                                            <span class="">أضاف الى منشوراتك</span>
                                            <input type="hidden" name="B" value="2">

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

        {{-- ///////////////////////////add post////////////////////// --}}
        <div class="modal fade" id="exampleModalToggle2" aria-hidden="true"
            aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
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
                                        <select name="type" class="form-select @error('type') is-invalid @enderror "
                                            aria-label="Default select example" style="border-radius: 20px;">
                                            <option selected disabled>النوع:</option>
                                            <option value="طلاب">طلاب</option>
                                            <option value="طالبات">طالبات</option>
                                        </select>
                                        @error('type')
                                        <div class="alert alert-danger text-danger"
                                            style="background: white;border:none ;margin-bottom:0px;font-size:12px">{{ $message }}
                                        </div>
                                        <?php $error = true; ?>
                                    @enderror
                                    </div>
                                    <div class="col-md-3 col-12 my-2">
                                        <select name="branch_id" class="form-select SlectBox @error('branch_id') is-invalid @enderror"
                                            aria-label="Default select example" style="border-radius: 20px;"
                                            {{-- onclick="console.log($(this).val())"
                                 onchange="console.log('change is firing')"> --}}>
                                            <option selected disabled>الفرع:</option>
                                            {{-- @foreach ($branches as $branch) --}}
                                            <option value="{{ $Branch->id }}">{{ $Branch->name }}</option>
                                            {{-- @endforeach --}}

                                        </select>
                                        @error('branch_id')
                                        <div class="alert alert-danger text-danger"
                                            style="background: white;border:none ;margin-bottom:0px;font-size:12px">{{ $message }}
                                        </div>
                                        <?php $error = true; ?>
                                    @enderror
                                    </div>
                                    <div class="col-md-3 col-12 my-2">
                                        <select id="product" name="region_id" class="form-select form-control @error('region_id') is-invalid @enderror"
                                            aria-label="Default select example" style="border-radius: 20px;">
                                            <option selected disabled>المنطقه:</option>
                                            @foreach ($regions as $region)
                                                <option value="{{ $region->id }}">{{ $region->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('region_id')
                                        <div class="alert alert-danger text-danger"
                                            style="background: white;border:none ;margin-bottom:0px;font-size:12px">{{ $message }}
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
                                        <div class="alert alert-danger text-danger"
                                            style="background: white;border:none ;margin-bottom:0px;font-size:12px">{{ $message }}
                                        </div>
                                        <?php $error = true; ?>
                                    @enderror
                                    </div>
                                    <div class="col-md-5 col-12 my-2">
                                        <input type="text" name="price" id="placeLink" class="form-control @error('price') is-invalid @enderror"
                                            placeholder="السعر : ">
                                            @error('price')
                                        <div class="alert alert-danger text-danger"
                                            style="background: white;border:none ;margin-bottom:0px;font-size:12px">{{ $message }}
                                        </div>
                                        <?php $error = true; ?>
                                    @enderror
                                    </div>
                                    <div class="row gap-3 enter my-3 choose">
                                        <div class="col-md-1 col-6">ادخل:</div>
                                        <div class="col-md-5 col-12 my-2 m-md-auto">

                                            <input type="text" name="contact" id="placeLink" class="form-control @error('contact') is-invalid @enderror"
                                                placeholder="وسيلة التواصل  : ">
                                                @error('contact')
                                        <div class="alert alert-danger text-danger"
                                            style="background: white;border:none ;margin-bottom:0px;font-size:12px">{{ $message }}
                                        </div>
                                        <?php $error = true; ?>
                                    @enderror
                                        </div>
                                        <div class="col-md-5 col-12 my-2">

                                            <input type="text" name="location" id="placeLink"
                                                class="form-control" placeholder=" رابط المكان : ">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div
                                        class="col-10 m-auto p-3 enterPic d-flex justify-content-between flex-row-reverse align-items-center">

                                        <input type='file' name='photos[]' multiple="multiple" id="real-file12"
                                            hidden="hidden" accept="image/*" />
                                        <img src="{{ asset('assets/images/uploadImage.jpg') }}"
                                            id="custom-button12" />
                                        <span id="custom-text12"></span>
                                        <span class="">أضاف الى منشوراتك</span>
                                        <input type="hidden" name="B" value="2">

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
    <script type="text/javascript" src="{{URL::asset('assets/js/bootstrap.js')}}"></script>

</body>

</html>
