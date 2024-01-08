<!DOCTYPE html>
<html lang="arabic">
<head>
    @include('layouts/css_links')
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('assets/css/sakany(feedback).css')}}">
    <style>
        .back{
    color: white;
    background: #bd5d14;
    border-radius: 80px;
    height: 30px;
    text-align: center;
    text-decoration: none;
    margin-top:10px;
    }
    .error{
    /* margin-bottom: 20px; */
    display: grid;
    grid-column: 4/9;
    }
    </style>
    <title>تقييم</title>
</head>
<body>

        <form action="{{route('branch_problem.store')}}" method="POST" class="container">
            <a href="{{ route('home') }}"  class="back">رجوع</a>
            @csrf
            <p class="quistin-1"> هل هناك مشكلة تواجهك؟</p>
            <input type="hidden" value="{{ $id }}" name="branch_id">
            <textarea name="content" id="" cols="30" rows="10" class="@error('content') is-invalid @enderror text" placeholder="اترك رساله لنا"></textarea>
            @error('content')
            <span class="invalid-feedback error"  role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <button class="send" type="submit">ارسال</button>
            <img src="imeges/img (2).png" alt="" class="img1">
        </form>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/all.min.js"></script>
</body>
</html> 