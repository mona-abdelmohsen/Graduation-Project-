<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        href="https://fonts.googleapis.com/css2?family=Lobster&family=Lobster+Two:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="{{ asset('assets/images/logo sakany.png') }}">
    <title>سكنى </title>
    <style>

    </style>
</head>

<body>
    <div class="cont">
        <div class="bar"style="z-index:100 !important;" >
             <div class="toggle">
                <div class="icon">
                    <button id="ico"><i class="fa-sharp fa-solid fa-list" ></i></button>
                </div>
            </div>
            <ul id="list" class="hhhh"style="height:250px">
                <li style="height:30px"><a href="{{ route('home') }}">الرئسية</a></li>
                <li style="height:30px"><a href="#we">من نحن</a> </li>
                <li style="height:30px"><a href="#posts">المنشورات</a></li>
                <li style="height:30px"><a href="#help">المساعدة</a></li>
                <li style="height:30px"><a href="#feedback">الاراء</a></li>
                <li style="height:30px"><a href="#phone"> التواصل معنا</a> </li>

            </ul>

            {{-- <div style="width:100%;height:50px; background: #BD5D14;">
              <button id="buuuu"style="background: #BD5D14; border:none"><i class="fa-solid fa-rectangle-list " style="font-size:30px;color:white"></i></button>
                <button><i class="fa-solid fa-rectangle-list " style="font-size:30px"></i></button>
            </div>

             <ul id="listt" class="hhhh" >
                <li><a>الرئسية</a></li>
                <li><a>من نحن</a> </li>
                <li><a>المنشورات</a></li>
                <li><a>المساعدة</a></li>
                <li><a>الاراء</a></li>
                <li><a> التواصل معنا</a> </li>

          </ul> --}}
            <!-- </button> -->
            <div class="btn3 ">
                <ul class="nav nav-pills  ">
                    <li class="nav-item act">
                        <a class="nav-link link-light ">انشاء حساب</a>
                    </li>
                    <li class="nav-item border rounded-pill">
                        <a class="nav-link link-light  " href="{{ route('login') }}">تسجيل الدخول</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container lii">
            <ul class="nav nav-pills oooo">
                <li class="nav-item act">
                    <a class="nav-link link-light" href="{{ route('register') }}">انشاء حساب</a>
                </li>
                <li class="nav-item border rounded-pill">
                    <a class="nav-link link-light " href="{{ route('login') }}">تسجيل الدخول</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-light" href="#phone">التواصل معانا</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-light" href="#feedback" tabindex="-1" aria-disabled="true">الاراء</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-light" href="#help">المساعدة</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-light" href="#posts">المنشورات</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-light" href="#we" tabindex="-1" aria-disabled="true">من
                        نحن</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-light" href="{{ route('home') }}">الرئسية</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#" tabindex="-1" aria-disabled="true">
                        <div><img src="{{ asset('assets/images/Rectangle30.png') }}" class="image1" alt="">
                            <img src="{{ asset('assets/images/Rectangle31.png') }}" class="image" alt="">
                            <img src="{{ asset('assets/images/Rectangle27.png') }}" alt="">
                        </div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="center">
            <div class="img">
                <img src="{{ asset('assets/images/pngegg(97).png') }}"id="phooto" alt="">
            </div>
            <div id="left">
                <div class="text" >
                    <p>سكني يساعد الطلاب </p>
                    <p>علي ايجاد</p>
                    <p>أفضل الأماكن المناسبة</p>
                </div>
                <div class="bbttnn">
                    <button id="btn1" type="submit" class="border rounded-pill"><a href="#help" style="color:white;text-decoration:none">مشاهدة فديو</a> </button><i
                        class="fa-sharp fa-solid fa-video"></i>
                    <button id="btn2"><a href="#phone" style="color:white;text-decoration:none" >تواصل معنا</a></button><i class="fa-sharp fa-solid fa-phone"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="card-group">
                <div class="card twooo">
                    <span class="too"><img src="{{ asset('assets/images/l.jpeg') }}" class="card-img-top too"
                            alt="..."></span>
                    <div class="card-body">
                        <p class="text1">انشاء حساب</p>
                        <p class="text2">أولا عليك انشاء </p>
                        <p class="text2">حساب هنا</p>
                    </div>
                </div>
                <div class="card twooo">
                    <span class="too"><img src="{{ asset('assets/images/s.jpeg') }}"class="card-img-top too"
                            alt="..."></span>
                    <div class="card-body">
                        <p class="text1">ابحث عن سكن</p>
                        <p class="text2">اعثر علي أفضل أماكن</p>
                        <p class="text2">لإقامة المستقلة هنا</p>
                    </div>
                </div>
                <div class="card twooo">
                    <span class="too"><img src="{{ asset('assets/images/c.jpeg') }}" class="card-img-top too"
                            alt="..."></span>
                    <div class="card-body">
                        <p class="text1">تواصل مع المالك</p>
                        <p class="text2">يمكن التواصل مع المالك </p>
                        <p class="text2">لحجز الإقامة</p>
                    </div>
                </div>
            </div>
        </div>


        <p class="txt">من نحن</p>
        <div class="how" id="we">
            <div class="ddd">
                <img class='imgwho' src="{{ asset('assets/images/Polygon4.png') }}" alt="">
                <img class="imgline" src="{{ asset('assets/images/Vector209.png') }}" alt="">
            </div>
            <div class="howtext">
                <div class="photos">
                    <img class="imgup" src="{{ asset('assets/images/Vector(1).png') }}"alt="">
                    <span>سكني</span>
                    <br>
                    <img class="imgdown" src="{{ asset('assets/images/Vector(2).png') }}" alt="">
                </div>
                <div class="textwho">
                    <p>يواجه الطلاب العديد من المشاكل في العثور على سكن مناسب لهم أثناء الدراسة منها أرتفاع أسعار السكن
                        .علي الرغم من أن السكن لايساوي المبلغ لمطلوب
                        ،الا أن السماسرة يستفدون من الطلاب الدوليين و نحاول مساعدتهم في توفير موقع يمكنهم من العثور على
                        سكن مناسب و سعر مناسب لهمز و بدون استغلالهم فهذة المشكلة ليست فقط للطلاب و بل لمن يحتاجون إلى
                        سكن خارجى، و معظم من يواجهون هذة المشكلة هم من الطالبات لأنهن يواجهون صعوبهة في النزول و البحث
                        عن سكن مناسب لهن
                    </p>
                </div>
            </div>
        </div>

    </div>
    <div class="content" id="posts">
        <img class="img1" src="{{ asset('assets/images/Frame23.png') }}" alt="">
        <span>بعض المشورات والاماكن</span>
        <img class="img2" src="{{ asset('assets/images/Frame23.png') }}" alt="">
    </div>



    <div class="container posts">
        {{-- @for($i=0;$i<3;$i++) --}}
        <div class="row">
          @foreach ($posts as $post )
            <div class="col-lg-4 p-1 ">

               <div class="card shadow-sm p-3 mb-5 bg-body rounded-5 m-2 exoo" style="border-radius:20px !important;">
                   <?php $i=1 ?>

                    @foreach ( $picture as  $pic)
                    @if($pic->post_id == $post->id )
                    @if($i==1)
                    <img src="images/{{ $pic->picture_path }}"
                    class="card-img-top rounded-3 two" style="border-radius:20px !important;" alt="...">
                    <?php $i++ ?>

                    @endif
                    @else
                    <?php $i=1 ?>
                    @endif
                    @endforeach


                    <div class="card-body">
                        <p class="card-text pra"> الفرع:
                            {{ $post->Appartment->Branch->name }}
                        </p>

                        <p class="card-text pra">المنطقة:
                            {{ $post->Appartment->Region->name }}
                        </p>
                        <p class="card-text pra">السعر:
                            {{ $post->Appartment->price }}
                        </p>
                        <p class="card-text pra">
                        @foreach ( $owner_rate as $rate )
                            @if($rate->user_id == $post->user_id)

                            @for ($j=0;$j<max($rate->star_rating,0);$j++)
                              ⭐
                            @endfor
                             <?php break; ?>
                            @endif
                        @endforeach

                        </p>
                        <a href="{{ route('home') }}/#{{$post->id  }}" style="font-family:Cairo;text-decoration: none !important;;">عرض المزيد</a>

                    </div>

                </div>

            </div>
            @endforeach
        </div>
        {{-- @endfor --}}
      </div>
    <div class="container" id="help">
        <p class="txt hel">المساعدة</p>
        <div>
            <p class="help">هذا الفيديو لمعرفه كيفيه استخدام الموقع هذا الفيديو لمعرفه كيفيه استخدام الموقع هذا
                الفيديو لمعرفه كيفيه استخدام الموقع</p>
            <div class="hig">
                <video class="viduo" controls>
                    <source src="{{ asset('assets/images/viduo.mp4') }}" type="video/mp4">
                    <source src="{{ asset('assets/images/viduo.ogg') }}" type="video/ogg">

                </video>
            </div>
        </div>
    </div>
    <p class="txt hel ">بعض أراء العملاء</p>
    <div class="think" id="feedback">
        <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        @foreach ($comments as $comment)
                            <div class="col thinking thinking1">
                                <div class="card ">
                                    <div class="images">
                                        <img src="{{ asset('assets/images/Vector(3).png') }}"
                                            class="card-img-top toop" alt="...">
                                        <img src="{{ asset('assets/images/Vector(3).png') }}"
                                            class="card-img-top toop" alt="...">
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text coment">{{ $comment->comments }}</p>
                                        <p class="card-text ico">
                                            @for ($i = 1; $i <= $comment->star_rating; $i++)
                                                {{-- ⭐ --}}
                                                <img onClick="rate()"  height="20px !important" width="20px" class="star" id="1" src="{{ asset('assets/images/star.png') }}" />
                                            @endfor

                                        </p>
                                    </div>
                                    <img src="profiles/{{ $comment->User->image_path }} "
                                        class="card-img-top toop bottom" alt="...">
                                    <span class="name" style="padding-left:20px">{{ $comment->User->name }}</span>

                                </div>

                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="carousel-item">
                <img src="..." class="d-block w-100" alt="...">lokkk
              </div>
              <div class="carousel-item">
                <img src="..." class="d-block w-100" alt="...">
              </div>

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </div>




    <div >
        <img class="phone" src="{{ asset('assets/images/phone.jpeg') }}"alt="">
    </div>
    <div class="contact" id="phone">
        <p class="txt con">دعنا نجيب على استفساراتك</p>
        <form action="{{ route('problems.store') }} " method="POST">
            @csrf
            <div class="left">
                <textarea name="content"  placeholder="اكتب مشكلتلك او استفسارك" id="area" cols="30" rows="10" class="@error('content') is-invalid @enderror"></textarea>
                <br>
                @error('content')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="butt"><button type="submit" class="bttn">ارسال</button></div>
            </div>
            <div class="right">
                <div class="yy" >
                    <p class="info">الاسم الاول</p>
                    <input type="text" name="first_name" class="@error('first_name') is-invalid @enderror">
                    @error('first_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="xx yy" >
                    <p class="info">الاسم الثاني </p>
                    <input type="text" name="last_name" class="@error('last_name') is-invalid @enderror">
                    @error('last_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class=" xx yy" >
                    <p class="info">البريد الالكتروني</p>
                    <input type="email" name="email" class="@error('email') is-invalid @enderror">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                {{-- <div class="xx yy">
                    <p class="info" >رقم التلفون </p>
                    <input type="text" name="phone">
            </div> --}}
            </div>


        </form>
    </div>

<script>
               let icon=document.querySelector("#ico");
              let list=document.querySelector(".hhhh");


                // $("#ico").click(function(){
                    // $(".hhhh").show(500);
                    // $("#list").hide(500);

                // })


                // console.log(list);


                // icon.addEventListener("click",()=>
                // {
                //    console.log(list);
                //     list.classList.toggle('open') ;

                // })
                // icon.addEventListener("click",function()
                // {

                //     // list.style.display="none";

                // })
               icon.addEventListener("click",function()
                {
                    console.log("aaaa");
                    list.style.display="block";

                })
                icon.addEventListener("dblclick",function()
                {
                    console.log("aaaa");
                    list.style.display="none";

                })
    </script>
    <script src="{{ url('assets/js/jquery-3.6.1.min.js') }}"></script>

    <script src="{{ url('assets/js/landing.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.js') }}"></script>
    <script src="{{ url('assets/js/popper.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

     @include('layouts.js_links')
</body>

</html>
