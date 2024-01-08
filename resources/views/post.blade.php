<!DOCTYPE html>
<html lang="arabic">
<head>
    @include('layouts/css_links')
    <meta charset="UTF-8">
    <title>صفحة المنشور</title>
    <link rel="stylesheet" href="{{asset('assets/css/sakany(post).css')}}">

</head>
<body>

    <!----------------------- navigation bar --------------------------->

    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <div class="left-side">
                <a href=""><i class="fa-sharp fa-solid fa-arrow-left"></i></a>
                <a href=""> <img src="assets/images/user icon2.png" alt=""></a>
                <a class="navbar-brand">تسجيل الخروج </a>
            </div>
            <form class="d-flex" role="search">
                <button><i class="fa-solid fa-magnifying-glass"></i></button>
                <input class="form-control me-2" type="search" placeholder="بحث" aria-label="Search" >
                <img src="assets/images/WhatsApp_Image_2022-11-05_at_10.22.15_PM-removebg-preview.png" alt="">
            </form>
        </div>
    </nav>

    <!------------------------------ postes ------------------------------>

    <div class="container">
        <div class="user-info">
            <div class="dropdown">
                <a href=""><img src="assets/images/more icon.png" alt=""></a>
                <div class="dropdown-content">
                    <a href="#"><p> تعديل المنشور </p></a>
                    <a href="#"> <p> حذف المنشور </p></a>
                </div>
                
            </div>        
            <div class="right-side">
                <p>اسم المستخدم </p>
                <a href=""><img src="assets/images/user icon 3.png" alt=""></a>
            </div>
            <div class="data"><span> 2:00 pm 7/3/2023 </span></div>
        </div>
        <div class="post-discreption">
            <p>يواجه الطلاب العديد من المشاكل في العثور على سكن مناسب لهم أثناء الدراسة منها
                ارتفاع أسعار السكن. على الرغم من أن السكن واجه الطلاب
                العديد من المشاكل في العثور على سكن مناسب لهم أثناء
                الدراسة منها ارتفاع أسعار السكن. على الرغم من أن السكن 
                لا يساوي المبلغ المطلوب 
            </p>
        </div>
        <div class="post-info">
            <div class="left">
                <div class="button-1">
                    <p>طريقة التواصل  :  01147056186</p>
                </div>
                <div class="button-2">
                    <p>المنطقة : سيد</p>
                </div>
                <div class="button-3">
                    <p>السعر : 600</p>
                </div>
                <div class="button-4">
                    <p>النوع : طلاب</p>
                </div>
                <div class="button-5">
                    <p>العدد : 7</p>
                </div>
                <div class="button-6">
                    <p><a href="">رابط المكان : hhht/sdijsdkl.csdio.com</a></p>
                </div>
            </div>
            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="10000">
                        <img src="assets/images/istockphoto-511061090-612x612.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img src="assets/images/0eb212d5cb6923cc5a91087831297778-o_a.webp" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/images/709934422-Buildings-Facts-IC-1920x1080.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
    <!-------------------------------- post ---------------------------->
    <div class="container">
        <div class="user-info">
            <div class="dropdown">
                <a href=""><img src="assets/images/more icon.png" alt=""></a>
                <div class="dropdown-content">
                    <a href="#"><p> تعديل المنشور </p></a>
                    <a href="#"> <p> حذف المنشور </p></a>
                </div>
            </div>        
            <div class="right-side">
                <p>اسم المستخدم </p>
                <a href=""><img src="assets/images/user icon 3.png" alt=""></a>
            </div>
            <div class="data"><span> 2:00 pm 7/3/2023 </span></div>
        </div>
        <div class="post-discreption">
            <p>يواجه الطلاب العديد من المشاكل في العثور على سكن مناسب لهم أثناء الدراسة منها
                ارتفاع أسعار السكن. على الرغم من أن السكن واجه الطلاب
                العديد من المشاكل في العثور على سكن مناسب لهم أثناء
                الدراسة منها ارتفاع أسعار السكن. على الرغم من أن السكن 
                لا يساوي المبلغ المطلوب 
            </p>
        </div>
        <div class="post-info">
            <div class="left">
                <div class="button-1">
                    <p>طريقة التواصل  :  01147056186</p>
                </div>
                <div class="button-2">
                    <p>المنطقة : سيد</p>
                </div>
                <div class="button-3">
                    <p>السعر : 600</p>
                </div>
                <div class="button-4">
                    <p>النوع : طلاب</p>
                </div>
                <div class="button-5">
                    <p>العدد : 7</p>
                </div>
                <div class="button-6">
                    <p><a href="">رابط المكان : hhht/sdijsdkl.csdio.com</a></p>
                </div>
            </div>
            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="10000">
                        <img src="assets/images/photo-1534237710431-e2fc698436d0.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img src="assets/images/703 MADISON_RENDERINGS_10.08.2020 Page 002.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/images/WilderBuildingSummerSolstice.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
    @include('layouts.js_links')
</body>
</html>